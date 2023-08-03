<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Procedurerequirements Model
 *
 * @property \App\Model\Table\ProceduresTable&\Cake\ORM\Association\BelongsTo $Procedures
 * @property \App\Model\Table\RequirementsTable&\Cake\ORM\Association\BelongsTo $Requirements
 * @property \App\Model\Table\RequestrequirementsTable&\Cake\ORM\Association\HasMany $Requestrequirements
 *
 * @method \App\Model\Entity\Procedurerequirement newEmptyEntity()
 * @method \App\Model\Entity\Procedurerequirement newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Procedurerequirement[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Procedurerequirement get($primaryKey, $options = [])
 * @method \App\Model\Entity\Procedurerequirement findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Procedurerequirement patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Procedurerequirement[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Procedurerequirement|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Procedurerequirement saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Procedurerequirement[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Procedurerequirement[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Procedurerequirement[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Procedurerequirement[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class ProcedurerequirementsTable extends Table
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

        $this->setTable('procedurerequirements');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Procedures', [
            'foreignKey' => 'procedure_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Requirements', [
            'foreignKey' => 'requirement_id',
            'joinType' => 'INNER',
        ]);
        $this->hasMany('Requestrequirements', [
            'foreignKey' => 'procedurerequirement_id',
        ]);
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
            ->maxLength('name', 50)
            ->requirePresence('name', 'create')
            ->notEmptyString('name');

        $validator
            ->boolean('deleted')
            ->allowEmptyString('deleted');

        $validator
            ->integer('modified_by')
            ->allowEmptyString('modified_by');

        $validator
            ->integer('procedure_id')
            ->notEmptyString('procedure_id');

        $validator
            ->integer('requirement_id')
            ->notEmptyString('requirement_id');

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
        $rules->add($rules->existsIn('procedure_id', 'Procedures'), ['errorField' => 'procedure_id']);
        $rules->add($rules->existsIn('requirement_id', 'Requirements'), ['errorField' => 'requirement_id']);

        return $rules;
    }
}
