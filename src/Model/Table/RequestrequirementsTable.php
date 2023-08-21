<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Requestrequirements Model
 *
 * @property \App\Model\Table\ProcedurerequirementsTable&\Cake\ORM\Association\BelongsTo $Procedurerequirements
 * @property \App\Model\Table\RequestsTable&\Cake\ORM\Association\BelongsTo $Requests
 * @property \App\Model\Table\RequestrequirementproprietiesTable&\Cake\ORM\Association\HasMany $Requestrequirementproprieties
 *
 * @method \App\Model\Entity\Requestrequirement newEmptyEntity()
 * @method \App\Model\Entity\Requestrequirement newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Requestrequirement[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Requestrequirement get($primaryKey, $options = [])
 * @method \App\Model\Entity\Requestrequirement findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Requestrequirement patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Requestrequirement[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Requestrequirement|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Requestrequirement saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Requestrequirement[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Requestrequirement[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Requestrequirement[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Requestrequirement[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class RequestrequirementsTable extends Table
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

        $this->setTable('requestrequirements');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Procedurerequirements', [
            'foreignKey' => 'procedurerequirement_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Requests', [
            'foreignKey' => 'request_id',
            'joinType' => 'INNER',
        ]);
        $this->hasMany('Requestrequirementproprieties', [
            'foreignKey' => 'requestrequirement_id',
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
            ->scalar('value')
            ->maxLength('value', 250)
            ->allowEmptyString('value');

        $validator
            ->scalar('status')
            ->maxLength('status', 20)
            ->requirePresence('status', 'create')
            ->notEmptyString('status');

        $validator
            ->scalar('raison')
            ->maxLength('raison', 500)
            ->requirePresence('raison', 'create')
            ->notEmptyString('raison');

        $validator
            ->integer('procedurerequirement_id')
            ->notEmptyString('procedurerequirement_id');

        $validator
            ->integer('request_id')
            ->notEmptyString('request_id');

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
        $rules->add($rules->existsIn('procedurerequirement_id', 'Procedurerequirements'), ['errorField' => 'procedurerequirement_id']);
        $rules->add($rules->existsIn('request_id', 'Requests'), ['errorField' => 'request_id']);

        return $rules;
    }
}
