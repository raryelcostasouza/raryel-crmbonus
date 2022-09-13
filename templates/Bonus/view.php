<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Bonus $bonus
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(__('Delete Venda'), ['action' => 'delete', $bonus->id], ['confirm' => __('Are you sure you want to delete # {0}?', $bonus->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Vendas'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Venda'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="bonus view content">
            <h3><?= h($bonus->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Customer') ?></th>
                    <td><?= $bonus->has('customer') ? $this->Html->link($bonus->customer->id, ['controller' => 'Customers', 'action' => 'view', $bonus->customer->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('User') ?></th>
                    <td><?= $bonus->has('user') ? $this->Html->link($bonus->user->name, ['controller' => 'Users', 'action' => 'view', $bonus->user->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($bonus->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Total Bonus') ?></th>
                    <td><?= $bonus->total_bonus === null ? '' : $this->Number->format($bonus->total_bonus) ?></td>
                </tr>
                <tr>
                    <th><?= __('Total') ?></th>
                    <td><?= $bonus->total === null ? '' : $this->Number->format($bonus->total) ?></td>
                </tr>
                <tr>
                    <th><?= __('Date Used') ?></th>
                    <td><?= h($bonus->date_used) ?></td>
                </tr>
                <tr>
                    <th><?= __('Validity Start') ?></th>
                    <td><?= h($bonus->validity_start) ?></td>
                </tr>
                <tr>
                    <th><?= __('Validity End') ?></th>
                    <td><?= h($bonus->validity_end) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($bonus->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($bonus->modified) ?></td>
                </tr>
                <tr>
                    <th><?= __('Used') ?></th>
                    <td><?= $bonus->used ? __('Yes') : __('No'); ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
