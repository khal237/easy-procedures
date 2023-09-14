<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Requirementpropriety Entity
 *
 * @property int $id
 * @property string $type
 * @property string $name
 * @property string|null $description
 * @property string|null $default_value
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 * @property bool $deleted
 * @property int $requirement_id
 *
 * @property \App\Model\Entity\Requirement $requirement
 * @property \App\Model\Entity\Requestrequirementpropriety[] $requestrequirementproprieties
 */
class Requirementpropriety extends Entity
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
        'type' => true,
        'name' => true,
        'description' => true,
        'default_value' => true,
        'created' => true,
        'modified' => true,
        'deleted' => true,
        'requirement_id' => true,
        'requirement' => true,
        'requestrequirementproprieties' => true,
    ];
}
