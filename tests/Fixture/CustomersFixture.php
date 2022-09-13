<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * CustomersFixture
 */
class CustomersFixture extends TestFixture
{
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
                'company' => 'Lorem ipsum dolor sit amet',
                'email' => 'Lorem ipsum dolor sit amet',
                'cnpj' => 'Lorem ipsum dolor sit amet',
                'status' => 1,
                'created' => '2022-09-09 13:06:04',
                'modified' => '2022-09-09 13:06:04',
            ],
        ];
        parent::init();
    }
}
