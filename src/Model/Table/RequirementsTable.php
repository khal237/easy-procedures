<?php

declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Requirements Model
 *
 * @property \App\Model\Table\RequirementtypesTable&\Cake\ORM\Association\BelongsTo $Requirementtypes
 * @property \App\Model\Table\ProcedurerequirementsTable&\Cake\ORM\Association\HasMany $Procedurerequirements
 * @property \App\Model\Table\RequirementproprietiesTable&\Cake\ORM\Association\HasMany $Requirementproprieties
 *
 * @method \App\Model\Entity\Requirement newEmptyEntity()
 * @method \App\Model\Entity\Requirement newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Requirement[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Requirement get($primaryKey, $options = [])
 * @method \App\Model\Entity\Requirement findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Requirement patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Requirement[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Requirement|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Requirement saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Requirement[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Requirement[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Requirement[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Requirement[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class RequirementsTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('requirements');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Requirementtypes', [
            'foreignKey' => 'requirementtype_id',
            'joinType' => 'INNER',
        ]);
        $this->hasMany('Procedurerequirements', [
            'foreignKey' => 'requirement_id',
        ]);
        $this->hasMany('Requirementproprieties', [
            'foreignKey' => 'requirement_id',
        ])->setConditions(['Requirementproprieties.deleted' => false]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->scalar('name')
            ->maxLength('name', 250)
            ->requirePresence('name', 'create')
            ->notEmptyString('name');

        $validator
            ->scalar('description')
            ->maxLength('description', 250)
            ->requirePresence('description', 'create')
            ->notEmptyString('description');

        $validator
            ->scalar('status')
            ->maxLength('status', 30)
            ->notEmptyString('status');

        $validator
            ->scalar('example')
            ->maxLength('example', 255)
            ->allowEmptyString('example');

        $validator
            ->boolean('deleted')
            ->requirePresence('deleted', 'create')
            ->notEmptyString('deleted');

        $validator
            ->integer('modified_by')
            ->allowEmptyString('modified_by');

        $validator
            ->integer('requirementtype_id')
            ->notEmptyString('requirementtype_id');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules): RulesChecker
    {
        $rules->add($rules->existsIn('requirementtype_id', 'Requirementtypes'), ['errorField' => 'requirementtype_id']);

        return $rules;
    }
}
