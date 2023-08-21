<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Requestrequirement Entity
 *
 * @property int $id
 * @property string|null $value
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 * @property string $status
 * @property string $raison
 * @property int $procedurerequirement_id
 * @property int $request_id
 *
 * @property \App\Model\Entity\Procedurerequirement $procedurerequirement
 * @property \App\Model\Entity\Request $request
 * @property \App\Model\Entity\Requestrequirementpropriety[] $requestrequirementproprieties
 */
class Requestrequirement extends Entity
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
        'created' => true,
        'modified' => true,
        'status' => true,
        'raison' => true,
        'procedurerequirement_id' => true,
        'request_id' => true,
        'procedurerequirement' => true,
        'request' => true,
        'requestrequirementproprieties' => true,
    ];
}
