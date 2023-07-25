<?php
declare(strict_types=1);

namespace App\Model\Entity;


use Cake\Auth\DefaultPasswordHasher;
use Cake\ORM\Entity;

/**
 * User Entity
 *
 * @property int $id
 * @property string $name
 * @property string $surname
 * @property string $email
 * @property int $phonenumber
 * @property string $password
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 * @property bool $deleted
 * @property int $modified_by
 * @property int $id_role
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
        'name' => true,
        'surname' => true,
        'email' => true,
        'phonenumber' => true,
        'password' => true,
        'created' => false,
        'modified' => false,
        'deleted' => false,
        'modified_by' => false,
        'id_role' => false,
    ];

    /**
     * Fields that are excluded from JSON versions of the entity.
     *
     * @var array<string>
     */
    protected $_hidden = [
        'password',
    ];
    protected function _setpassword(string $password):?string {
        if(strlen($password)>0){
            return (new DefaultPasswordHasher())->hash($password);

        }

    }
    
}
