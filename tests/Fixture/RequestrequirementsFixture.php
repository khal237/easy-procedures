<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * RequestrequirementsFixture
 */
class RequestrequirementsFixture extends TestFixture
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
                'created' => '2023-08-04 06:24:59',
                'modified' => '2023-08-04 06:24:59',
                'status' => 'Lorem ipsum dolor ',
                'raison' => 'Lorem ipsum dolor sit amet',
                'procedurerequirement_id' => 1,
                'request_id' => 1,
            ],
        ];
        parent::init();
    }
}
