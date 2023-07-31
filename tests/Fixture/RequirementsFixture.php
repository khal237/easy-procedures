<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * RequirementsFixture
 */
class RequirementsFixture extends TestFixture
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
                'name' => 'Lorem ipsum dolor sit amet',
                'status' => 'Lorem ipsum dolor sit amet',
                'created' => '2023-07-31 13:43:22',
                'modified' => '2023-07-31 13:43:22',
                'deleted' => 1,
                'modified_by' => 1,
                'requirementtype_id' => 1,
            ],
        ];
        parent::init();
    }
}
