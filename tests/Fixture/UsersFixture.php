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
                'Id' => 1,
                'Fname' => 'Lorem ipsum dolor sit amet',
                'lname' => 'Lorem ipsum dolor sit amet',
                'Email' => 'Lorem ipsum dolor sit amet',
                'Password' => 'Lorem ipsum dolor sit amet',
                'Phone' => 'Lorem ipsum dolor sit amet',
                'Gender' => 'Lorem ipsum dolor sit amet',
                'user_status' => 'Lorem ipsum dolor sit amet',
                'reset_pass' => 'Lorem ipsum dolor sit amet',
                'date' => '2023-01-05 09:19:21',
                'update' => '2023-01-05 09:19:21',
            ],
        ];
        parent::init();
    }
}
