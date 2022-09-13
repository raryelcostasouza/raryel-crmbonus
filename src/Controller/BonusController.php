<?php
declare(strict_types=1);

namespace App\Controller;
use Cake\Datasource\ConnectionManager;

/**
 * Bonus Controller
 *
 * @property \App\Model\Table\BonusTable $Bonus
 * @method \App\Model\Entity\Bonus[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class BonusController extends AppController
{
    private $db;

    public function initialize() : void
    {
        parent::initialize();
        $this->db = ConnectionManager::get("default");
    }
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Customers', 'Users'],
        ];
        $bonus = $this->paginate($this->Bonus);

        $this->set(compact('bonus'));
    }

    /**
     * View method
     *
     * @param string|null $id Bonus id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $bonus = $this->Bonus->get($id, [
            'contain' => ['Customers', 'Users'],
        ]);

        $this->set(compact('bonus'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $bonus = $this->Bonus->newEmptyEntity();
        if ($this->request->is('post')) {
            
            $bonus = $this->Bonus->patchEntity($bonus, $this->request->getData());
            
            if ($this->Bonus->save($bonus) && $this->markUsedBonus($this->request) ) {
                $this->Flash->success(__('The bonus has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The bonus could not be saved. Please, try again.'));
        }
        $customers = $this->Bonus->Customers->find('list', ['limit' => 200])->all();
        $users = $this->Bonus->Users->find('list', ['limit' => 200])->all();
        $this->set(compact('bonus', 'customers', 'users'));
    }

    private function markUsedBonus($request)
    {
        $id = $request->getData("previous_bonus_id");
        if ($id != "0")
        {
            $usedBonus = $this->Bonus->get($id);
            $usedBonus->used = 1;
            $usedBonus->date_used = date('Y-m-d H:i:s');
            if ($this->Bonus->save($usedBonus))
            {
                return true;
            }
            return false;
        }
        return true;
    }

    /**
     * Delete method
     *
     * @param string|null $id Bonus id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $bonus = $this->Bonus->get($id);
        if ($this->Bonus->delete($bonus)) {
            $this->Flash->success(__('The bonus has been deleted.'));
        } else {
            $this->Flash->error(__('The bonus could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function getPreviousUnusedBonus()
    {
        if ($this->request->is("ajax"))
        {
            $customer_id = $this->request->getQuery("customer_id");
            $user_id = $this->request->getQuery("user_id");

            //verifica se há bônus não utilizados de compras anteriores
            //que estejam dentro da validade
            //para os dados usuário e loja
            //retorna o valor do bonus
            $valor_bonus = $this->db->execute("SELECT total_bonus, id from bonus " .
                                            "where customer_id = '" . $customer_id . "' AND " .
                                                    "user_id = '" . $user_id . "' AND " . 
                                                    "used = '0' AND " .
                                                    "NOW() > validity_start AND ".
                                                    "NOW() < validity_end;"
                                            )->fetchAll("assoc");
            if ($valor_bonus)
            {
                echo json_encode($valor_bonus);
            }
            else
            {
                echo "0";
            }
            
            die;
        }
    }
}
