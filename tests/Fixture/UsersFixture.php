<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * UsersFixture
 */
class UsersFixture extends TestFixture
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
                'surname' => 'Lorem ipsum dolor sit amet',
                'email' => 'Lorem ipsum dolor sit amet',
                'phonenumber' => 1,
                'password' => 'Lorem ipsum dolor sit amet',
                'created' => '2023-08-10 13:14:03',
                'modified' => '2023-08-10 13:14:03',
                'deleted' => 1,
                'modified_by' => 1,
                'id_role' => 1,
                'token' => 'Lorem ipsum dolor sit amet',
                'Verifications' => 1,
            ],
        ];
        parent::init();
    }
}
