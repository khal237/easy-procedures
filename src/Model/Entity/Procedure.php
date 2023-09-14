<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Procedure Entity
 *
 * @property int $id
 * @property string $name
 * @property string $type
 * @property string|null $image
 * @property string $description
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 * @property bool $deleted
 * @property int|null $modified_by
 *
 * @property \App\Model\Entity\Procedurerequirement[] $procedurerequirements
 * @property \App\Model\Entity\Request[] $requests
 */
class Procedure extends Entity
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
        'image' => true,
        'description' => true,
        'created' => true,
        'modified' => true,
        'deleted' => true,
        'modified_by' => true,
        'procedurerequirements' => true,
        'requests' => true,
    ];
}
