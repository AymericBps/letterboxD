<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Classifications Model
 *
 * @property \App\Model\Table\MoviesTable&\Cake\ORM\Association\BelongsTo $Movies
 * @property \App\Model\Table\GenresTable&\Cake\ORM\Association\BelongsTo $Genres
 *
 * @method \App\Model\Entity\Classification newEmptyEntity()
 * @method \App\Model\Entity\Classification newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Classification[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Classification get($primaryKey, $options = [])
 * @method \App\Model\Entity\Classification findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Classification patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Classification[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Classification|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Classification saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Classification[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Classification[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Classification[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Classification[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class ClassificationsTable extends Table
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

        $this->setTable('classifications');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Movies', [
            'foreignKey' => 'movie_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Genres', [
            'foreignKey' => 'genre_id',
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
            ->integer('movie_id')
            ->notEmptyString('movie_id');

        $validator
            ->integer('genre_id')
            ->notEmptyString('genre_id');

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
        $rules->add($rules->existsIn('movie_id', 'Movies'), ['errorField' => 'movie_id']);
        $rules->add($rules->existsIn('genre_id', 'Genres'), ['errorField' => 'genre_id']);

        return $rules;
    }
}
