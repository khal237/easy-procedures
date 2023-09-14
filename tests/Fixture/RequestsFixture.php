<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * RequestsFixture
 */
class RequestsFixture extends TestFixture
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
                'status' => 'Lorem ipsum dolor ',
                'created' => '2023-08-30 07:10:59',
                'modified' => '2023-08-30 07:10:59',
                'deleted' => 1,
                'modified_by' => 1,
                'user_id' => 1,
                'procedure_id' => 1,
            ],
        ];
        parent::init();
    }
}
