<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Bonus[]|\Cake\Collection\CollectionInterface $bonus
 */
?>
<div class="bonus index content">
    <?= $this->Html->link(__('Nova Venda'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Vendas') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('customer_id') ?></th>
                    <th><?= $this->Paginator->sort('user_id') ?></th>
                    <th><?= $this->Paginator->sort('total_bonus') ?></th>
                    <th><?= $this->Paginator->sort('total') ?></th>
                    <th><?= $this->Paginator->sort('used') ?></th>
                    <th><?= $this->Paginator->sort('date_used') ?></th>
                    <th><?= $this->Paginator->sort('validity_start') ?></th>
                    <th><?= $this->Paginator->sort('validity_end') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <th><?= $this->Paginator->sort('modified') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($bonus as $bonus): ?>
                <tr>
                    <td><?= $this->Number->format($bonus->id) ?></td>
                    <td><?= $bonus->has('customer') ? $this->Html->link($bonus->customer->company, ['controller' => 'Customers', 'action' => 'view', $bonus->customer->id]) : '' ?></td>
                    <td><?= $bonus->has('user') ? $this->Html->link($bonus->user->name, ['controller' => 'Users', 'action' => 'view', $bonus->user->id]) : '' ?></td>
                    <td><?= $bonus->total_bonus === null ? '' : $this->Number->format($bonus->total_bonus) ?></td>
                    <td><?= $bonus->total === null ? '' : $this->Number->format($bonus->total) ?></td>
                    <td><?= $bonus->used == 0 ? "Not" : "Yes" ?></td>
                    <td><?= h($bonus->date_used) ?></td>
                    <td><?= h($bonus->validity_start) ?></td>
                    <td><?= h($bonus->validity_end) ?></td>
                    <td><?= h($bonus->created) ?></td>
                    <td><?= h($bonus->modified) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $bonus->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $bonus->id], ['confirm' => __('Are you sure you want to delete # {0}?', $bonus->id)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>
