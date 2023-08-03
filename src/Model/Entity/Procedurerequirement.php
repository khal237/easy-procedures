<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Procedurerequirement Entity
 *
 * @property int $id
 * @property string $name
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 * @property bool|null $deleted
 * @property int|null $modified_by
 * @property int $procedure_id
 * @property int $requirement_id
 *
 * @property \App\Model\Entity\Procedure $procedure
 * @property \App\Model\Entity\Requirement $requirement
 * @property \App\Model\Entity\Requestrequirement[] $requestrequirements
 */
class Procedurerequirement extends Entity
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
        'created' => true,
        'modified' => true,
        'deleted' => true,
        'modified_by' => true,
        'procedure_id' => true,
        'requirement_id' => true,
        'procedure' => true,
        'requirement' => true,
        'requestrequirements' => true,
    ];
}
