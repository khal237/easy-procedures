<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Requestrequirementproprieties Model
 *
 * @property \App\Model\Table\RequirementproprietiesTable&\Cake\ORM\Association\BelongsTo $Requirementproprieties
 * @property \App\Model\Table\RequestrequirementsTable&\Cake\ORM\Association\BelongsTo $Requestrequirements
 *
 * @method \App\Model\Entity\Requestrequirementpropriety newEmptyEntity()
 * @method \App\Model\Entity\Requestrequirementpropriety newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Requestrequirementpropriety[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Requestrequirementpropriety get($primaryKey, $options = [])
 * @method \App\Model\Entity\Requestrequirementpropriety findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Requestrequirementpropriety patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Requestrequirementpropriety[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Requestrequirementpropriety|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Requestrequirementpropriety saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Requestrequirementpropriety[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Requestrequirementpropriety[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Requestrequirementpropriety[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Requestrequirementpropriety[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class RequestrequirementproprietiesTable extends Table
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

        $this->setTable('requestrequirementproprieties');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Requirementproprieties', [
            'foreignKey' => 'requirementpropriety_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Requestrequirements', [
            'foreignKey' => 'requestrequirement_id',
            'joinType' => 'INNER',
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
            ->maxLength('name', 250)
            ->requirePresence('name', 'create')
            ->notEmptyString('name');

        $validator
            ->scalar('value')
            ->maxLength('value', 50)
            ->requirePresence('value', 'create')
            ->notEmptyString('value');

        $validator
            ->boolean('deleted')
            ->requirePresence('deleted', 'create')
            ->notEmptyString('deleted');

        $validator
            ->integer('requirementpropriety_id')
            ->notEmptyString('requirementpropriety_id');

        $validator
            ->integer('requestrequirement_id')
            ->notEmptyString('requestrequirement_id');

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
        $rules->add($rules->existsIn('requirementpropriety_id', 'Requirementproprieties'), ['errorField' => 'requirementpropriety_id']);
        $rules->add($rules->existsIn('requestrequirement_id', 'Requestrequirements'), ['errorField' => 'requestrequirement_id']);

        return $rules;
    }
}
