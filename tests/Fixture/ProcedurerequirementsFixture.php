<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ProcedurerequirementsFixture
 */
class ProcedurerequirementsFixture extends TestFixture
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
                'created' => '2023-08-07 06:11:15',
                'modified' => '2023-08-07 06:11:15',
                'deleted' => 1,
                'modified_by' => 1,
                'procedure_id' => 1,
                'requirement_id' => 1,
            ],
        ];
        parent::init();
    }
}
