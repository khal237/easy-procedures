<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * RequirementproprietiesFixture
 */
class RequirementproprietiesFixture extends TestFixture
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
                'description' => 'Lorem ipsum dolor sit amet',
                'default_value' => 'Lorem ipsum dolor sit amet',
                'created' => '2023-08-24 13:53:40',
                'modified' => '2023-08-24 13:53:40',
                'deleted' => 1,
                'requirement_id' => 1,
            ],
        ];
        parent::init();
    }
}
