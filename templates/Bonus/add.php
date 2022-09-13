<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Bonus $bonus
 * @var \Cake\Collection\CollectionInterface|string[] $customers
 * @var \Cake\Collection\CollectionInterface|string[] $users
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Bonus'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="bonus form content">
            <?= $this->Form->create($bonus) ?>
            <fieldset>/
                <legend><?= __('Registrar venda') ?></legend>
                <?php
                    echo $this->Form->control('customer_id', ['options' => $customers, 'empty' => true]);
                    echo $this->Form->control('user_id', ['options' => $users, 'empty' => true]);
                    echo $this->Form->control('total', ['style' => 'color:red;']);
                    echo $this->Form->control('desconto_bonus_anterior', ['readonly' =>true, 'style' => 'color:green;']);
                    echo $this->Form->hidden('previous_bonus_id');
                    echo $this->Form->control('valor_a_pagar', ['readonly' =>true, 'style' => 'color:blue;']);
                    echo $this->Form->hidden('used', ['default' => 0]);
                    echo $this->Form->hidden('date_used', ['empty' => true]);
                    echo $this->Form->control('total_bonus');

                    $dt1 = new DateTime();
                    $today = $dt1->format("Y-m-d");

                    $dt2 = new DateTime("+1 month");
                    $oneMonthFromNow = $dt2->format("Y-m-d");
                    echo $this->Form->control('validity_start', ['empty' => true, "default" => $today]);
                    echo $this->Form->control('validity_end', ['empty' => true, "default" => $oneMonthFromNow]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type=text/javascript>
        // when country dropdown changes
        $('#customer-id').change(listenerSelectCustomerAndUser);
        $("#user-id").change(listenerSelectCustomerAndUser);

        function listenerSelectCustomerAndUser()
        {
            var selected_customer_id = $(this).val();
            var selected_user_id = $("#user-id").val()
           
            if (selected_customer_id && selected_user_id) 
            {
                $.ajax({
                    type: "GET",
                    url: "/get-previous-unused-bonus",
                    data: {
                        customer_id: selected_customer_id,
                        user_id: selected_user_id
                    },
                    success: function(res) {
                        var data = JSON.parse(res);
                        //se encontrou algum bonus anterior nao utilizado
                        //salva o id e o valor no campo correspondente
                        if (res != "0") 
                        {
                           $("#desconto-bonus-anterior").val(data[0].total_bonus);
                           $("input[name='previous_bonus_id']").val(data[0].id);
                        } 
                        else 
                        {
                            $("#desconto-bonus-anterior").val(0);
                            $("input[name='previous_bonus_id']").val(0);
                        }
                    }
                });
            }    
        }

        //listener para o preenchimento do valor total da venda
        //e calcular o desconto a ser aplicado
        $("#total").change(function ()
        {
            var valor_total = $(this).val();
            //se o valor total da compra foi preenchido
            if (valor_total)
            {
                //calcula o valor a pagar considerando o desconto de compras anteriores
                var desconto = $("#desconto-bonus-anterior").val();
                var valor_final = valor_total - desconto;
                if (valor_final < 0)
                {
                    $("#valor-a-pagar").val(0);
                }
                else
                {
                    $("#valor-a-pagar").val(valor_final);
                }
            }
        });
        
    </script>
