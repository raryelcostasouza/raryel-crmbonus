<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Customer $customer
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Customer'), ['action' => 'edit', $customer->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Customer'), ['action' => 'delete', $customer->id], ['confirm' => __('Are you sure you want to delete # {0}?', $customer->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Customers'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Customer'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="customers view content">
            <h3><?= h($customer->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Company') ?></th>
                    <td><?= h($customer->company) ?></td>
                </tr>
                <tr>
                    <th><?= __('Email') ?></th>
                    <td><?= h($customer->email) ?></td>
                </tr>
                <tr>
                    <th><?= __('Cnpj') ?></th>
                    <td><?= h($customer->cnpj) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($customer->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($customer->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($customer->modified) ?></td>
                </tr>
                <tr>
                    <th><?= __('Status') ?></th>
                    <td><?= $customer->status ? __('Yes') : __('No'); ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Bonus') ?></h4>
                <?php if (!empty($customer->bonus)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Customer Id') ?></th>
                            <th><?= __('User Id') ?></th>
                            <th><?= __('Total Bonus') ?></th>
                            <th><?= __('Total') ?></th>
                            <th><?= __('Used') ?></th>
                            <th><?= __('Date Used') ?></th>
                            <th><?= __('Validity Start') ?></th>
                            <th><?= __('Validity End') ?></th>
                            <th><?= __('Created') ?></th>
                            <th><?= __('Modified') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($customer->bonus as $bonus) : ?>
                        <tr>
                            <td><?= h($bonus->id) ?></td>
                            <td><?= h($bonus->customer_id) ?></td>
                            <td><?= h($bonus->user_id) ?></td>
                            <td><?= h($bonus->total_bonus) ?></td>
                            <td><?= h($bonus->total) ?></td>
                            <td><?= h($bonus->used) ?></td>
                            <td><?= h($bonus->date_used) ?></td>
                            <td><?= h($bonus->validity_start) ?></td>
                            <td><?= h($bonus->validity_end) ?></td>
                            <td><?= h($bonus->created) ?></td>
                            <td><?= h($bonus->modified) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Bonus', 'action' => 'view', $bonus->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Bonus', 'action' => 'edit', $bonus->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Bonus', 'action' => 'delete', $bonus->id], ['confirm' => __('Are you sure you want to delete # {0}?', $bonus->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
