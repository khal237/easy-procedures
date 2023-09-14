<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * RequestrequirementproprietiesFixture
 */
class RequestrequirementproprietiesFixture extends TestFixture
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
                'value' => 'Lorem ipsum dolor sit amet',
                'created' => '2023-09-04 10:51:55',
                'modified' => '2023-09-04 10:51:55',
                'deleted' => 1,
                'requirementpropriety_id' => 1,
                'requestrequirement_id' => 1,
            ],
        ];
        parent::init();
    }
}
