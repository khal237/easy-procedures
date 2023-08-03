<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Requestrequirementpropriety Entity
 *
 * @property int $id
 * @property string $value
 * @property string $name
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 * @property bool $deleted
 * @property int $requirementpropriety_id
 * @property int $requestrequirement_id
 *
 * @property \App\Model\Entity\Requirementpropriety $requirementpropriety
 * @property \App\Model\Entity\Requestrequirement $requestrequirement
 */
class Requestrequirementpropriety extends Entity
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
        'value' => true,
        'name' => true,
        'created' => true,
        'modified' => true,
        'deleted' => true,
        'requirementpropriety_id' => true,
        'requestrequirement_id' => true,
        'requirementpropriety' => true,
        'requestrequirement' => true,
    ];
}
