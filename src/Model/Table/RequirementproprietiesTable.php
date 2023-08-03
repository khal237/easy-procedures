<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Requirementproprieties Model
 *
 * @property \App\Model\Table\RequirementsTable&\Cake\ORM\Association\BelongsTo $Requirements
 * @property \App\Model\Table\RequestrequirementproprietiesTable&\Cake\ORM\Association\HasMany $Requestrequirementproprieties
 *
 * @method \App\Model\Entity\Requirementpropriety newEmptyEntity()
 * @method \App\Model\Entity\Requirementpropriety newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Requirementpropriety[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Requirementpropriety get($primaryKey, $options = [])
 * @method \App\Model\Entity\Requirementpropriety findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Requirementpropriety patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Requirementpropriety[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Requirementpropriety|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Requirementpropriety saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Requirementpropriety[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Requirementpropriety[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Requirementpropriety[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Requirementpropriety[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class RequirementproprietiesTable extends Table
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

        $this->setTable('requirementproprieties');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Requirements', [
            'foreignKey' => 'requirement_id',
            'joinType' => 'INNER',
        ]);
        $this->hasMany('Requestrequirementproprieties', [
            'foreignKey' => 'requirementpropriety_id',
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
            ->scalar('type')
            ->notEmptyString('type');

        $validator
            ->scalar('name')
            ->maxLength('name', 50)
            ->requirePresence('name', 'create')
            ->notEmptyString('name');

        $validator
            ->scalar('description')
            ->maxLength('description', 250)
            ->allowEmptyString('description');

        $validator
            ->scalar('default_value')
            ->maxLength('default_value', 50)
            ->allowEmptyString('default_value');

        $validator
            ->boolean('deleted')
            ->allowEmptyString('deleted');

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
        $rules->add($rules->existsIn('requirement_id', 'Requirements'), ['errorField' => 'requirement_id']);

        return $rules;
    }
}
