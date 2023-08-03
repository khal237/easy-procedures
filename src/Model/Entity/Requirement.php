<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Requirement Entity
 *
 * @property int $id
 * @property string $name
 * @property string $description
 * @property string|null $example
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 * @property bool|null $deleted
 * @property int|null $modified_by
 * @property int $requirementtype_id
 *
 * @property \App\Model\Entity\Requirementtype $requirementtype
 * @property \App\Model\Entity\Procedurerequirement[] $procedurerequirements
 * @property \App\Model\Entity\Requirementpropriety[] $requirementproprieties
 */
class Requirement extends Entity
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
        'description' => true,
        'example' => true,
        'created' => true,
        'modified' => true,
        'deleted' => true,
        'modified_by' => true,
        'requirementtype_id' => true,
        'requirementtype' => true,
        'procedurerequirements' => true,
        'requirementproprieties' => true,
    ];
}
