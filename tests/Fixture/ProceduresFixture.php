<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ProceduresFixture
 */
class ProceduresFixture extends TestFixture
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
                'Id' => 1,
                'name' => 'Lorem ipsum dolor sit amet',
                'type' => 'Lorem ipsum dolor sit amet',
                'status' => 'Lorem ipsum dolor sit amet',
                'created' => '2023-08-03 11:59:23',
                'modified' => '2023-08-03 11:59:23',
                'deleted' => 1,
                'modified_by' => 1,
            ],
        ];
        parent::init();
    }
}
