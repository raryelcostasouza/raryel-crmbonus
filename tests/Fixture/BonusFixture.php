<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * BonusFixture
 */
class BonusFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public $table = 'bonus';
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'id' => 1,
                'customer_id' => 1,
                'user_id' => 1,
                'total_bonus' => 1.5,
                'total' => 1.5,
                'used' => 1,
                'date_used' => '2022-09-09 13:15:54',
                'validity_start' => '2022-09-09 13:15:54',
                'validity_end' => '2022-09-09 13:15:54',
                'created' => '2022-09-09 13:15:54',
                'modified' => '2022-09-09 13:15:54',
            ],
        ];
        parent::init();
    }
}
