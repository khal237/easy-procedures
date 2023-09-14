<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Requests Model
 *
 * @property \App\Model\Table\UsersTable&\Cake\ORM\Association\BelongsTo $Users
 * @property \App\Model\Table\ProceduresTable&\Cake\ORM\Association\BelongsTo $Procedures
 * @property \App\Model\Table\RequestrequirementsTable&\Cake\ORM\Association\HasMany $Requestrequirements
 *
 * @method \App\Model\Entity\Request newEmptyEntity()
 * @method \App\Model\Entity\Request newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Request[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Request get($primaryKey, $options = [])
 * @method \App\Model\Entity\Request findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Request patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Request[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Request|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Request saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Request[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Request[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Request[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Request[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class RequestsTable extends Table
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

        $this->setTable('requests');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Procedures', [
            'foreignKey' => 'procedure_id',
            'joinType' => 'INNER',
        ]);
        $this->hasMany('Requestrequirements', [
            'foreignKey' => 'request_id',
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
            ->scalar('status')
            ->maxLength('status', 20)
            ->notEmptyString('status');

        $validator
            ->boolean('deleted')
            ->notEmptyString('deleted');

        $validator
            ->integer('modified_by')
            ->allowEmptyString('modified_by');

        $validator
            ->integer('user_id')
            ->notEmptyString('user_id');

        $validator
            ->integer('procedure_id')
            ->notEmptyString('procedure_id');

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
        $rules->add($rules->existsIn('user_id', 'Users'), ['errorField' => 'user_id']);
        $rules->add($rules->existsIn('procedure_id', 'Procedures'), ['errorField' => 'procedure_id']);

        return $rules;
    }
}
