<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Request Entity
 *
 * @property int $id
 * @property string $status
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 * @property bool $deleted
 * @property int|null $modified_by
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
        'status' => true,
        'created' =>false,
        'modified' =>false,
        'deleted' =>false,
        'modified_by' =>false,
        'user_id' =>false,
        'procedure_id' =>false,
        'user' =>false,
        'procedure' =>false,
        'requestrequirements' =>false,
    ];
}
