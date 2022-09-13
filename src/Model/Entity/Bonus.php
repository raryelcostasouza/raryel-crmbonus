<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Bonus Entity
 *
 * @property int $id
 * @property int|null $customer_id
 * @property int|null $user_id
 * @property string|null $total_bonus
 * @property string|null $total
 * @property bool|null $used
 * @property \Cake\I18n\FrozenTime|null $date_used
 * @property \Cake\I18n\FrozenTime|null $validity_start
 * @property \Cake\I18n\FrozenTime|null $validity_end
 * @property \Cake\I18n\FrozenTime|null $created
 * @property \Cake\I18n\FrozenTime|null $modified
 *
 * @property \App\Model\Entity\Customer $customer
 * @property \App\Model\Entity\User $user
 */
class Bonus extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array<string, bool>
     */
    protected $_accessible = [
        'customer_id' => true,
        'user_id' => true,
        'total_bonus' => true,
        'total' => true,
        'used' => true,
        'date_used' => true,
        'validity_start' => true,
        'validity_end' => true,
        'created' => true,
        'modified' => true,
        'customer' => true,
        'user' => true,
    ];
}
