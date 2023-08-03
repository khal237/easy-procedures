<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Request Entity
 *
 * @property int $id
 * @property string $name
 * @property string $type
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 * @property bool $deleted
 * @property int $modified_by
 * @property int $user_id
 * @property int $procedure_id
 *
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\Procedure $procedure
 * @property \App\Model\Entity\Requestrequirement[] $requestrequirements
 */
class Request extends Entity
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
        'type' => true,
        'created' => true,
        'modified' => true,
        'deleted' => true,
        'modified_by' => true,
        'user_id' => true,
        'procedure_id' => true,
        'user' => true,
        'procedure' => true,
        'requestrequirements' => true,
    ];
}
