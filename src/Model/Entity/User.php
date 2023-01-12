<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;
use Cake\Auth\DefaultPasswordHasher;
/**
 * User Entity
 *
 * @property int $Id
 * @property string $Fname
 * @property string $lname
 * @property string $Email
 * @property string $Password
 * @property string $Phone
 * @property string $Gender
 * @property string $user_status
 * @property string $reset_pass
 * @property \Cake\I18n\FrozenTime $date
 * @property \Cake\I18n\FrozenTime $update
 */
class User extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array<string, bool>
     */
    protected $_accessible = [
        'Fname' => true,
        'lname' => true,
        'Email' => true,
        'password' => true,
        'Phone' => true,
        'Gender' => true,
        'image' => true,
        'update' => true,
        'token' => true,
        'role' => true
    ];
    protected $_hidden = [
        'password',
    ];
   
}
