<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Requirementtype Entity
 *
 * @property int $id
 * @property string $type
 * @property string $name
 * @property string $Description
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 * @property bool|null $deleted
 *
 * @property \App\Model\Entity\Requirement[] $requirements
 */
class Requirementtype extends Entity
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
        'Description' => true,
        'created' => true,
        'modified' => true,
        'deleted' => true,
        'requirements' => true,
    ];
}
