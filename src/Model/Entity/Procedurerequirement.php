<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Procedurerequirement Entity
 *
 * @property int $id
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 * @property int|null $modified_by
 * @property int $procedure_id
 * @property int $requirement_id
 * @property boolean $deleted
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
        'created' => false,
        'modified' => false,
        'modified_by' => false,
        'procedure_id' => true,
        'requirement_id' => true,
        'procedure' => false,
        'requirement' => false,
        'requestrequirements' => false,
    ];
}
