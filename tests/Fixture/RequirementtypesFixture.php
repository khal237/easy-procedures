<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * RequirementtypesFixture
 */
class RequirementtypesFixture extends TestFixture
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
                'type' => 'Lorem ipsum dolor sit amet',
                'name' => 'Lorem ipsum dolor sit amet',
                'Description' => 'Lorem ipsum dolor sit amet',
                'created' => '2023-07-31 10:38:18',
                'modified' => '2023-07-31 10:38:18',
                'deleted' => 1,
            ],
        ];
        parent::init();
    }
}
