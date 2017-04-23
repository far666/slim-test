<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Relationship extends Model
{
    const HASH_SALT = "Relationship";
    protected $table = 'relationship';

    protected $fillable = array("person_A_id", "person_B_id", "hash", "relationship_type_id", "deleted_at");

    public function relationship_type()
    {
        return $this->hasOne("App\Models\RelationshipType");
    }

    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope('all', function (\Illuminate\Database\Eloquent\Builder $builder) {
            $builder->select(array("id", "person_A_id", "person_B_id", "hash", "relationship_type_id", "created_at", "updated_at"))->whereNull('deleted_at');
        });
        static::addGlobalScope('find', function (\Illuminate\Database\Eloquent\Builder $builder) {
            $builder->select(array("id", "person_A_id", "person_B_id", "hash", "relationship_type_id", "created_at", "updated_at"))->whereNull('deleted_at');
        });

    }

    public static function create($attributes)
    {
        $model = new static($attributes);
        $model->hash = self::getHash($attributes);

        $model->save();
        return $model;
    }

    private static function getHash($params)
    {
        // 依照 id 大小排序
        $A_id = ($params['person_A_id'] < $params['person_B_id']) ? $params['person_A_id'] : $params['person_B_id'];
        $B_id = ($params['person_A_id'] < $params['person_B_id']) ? $params['person_B_id'] : $params['person_A_id'];

        $hash = substr(md5(self::HASH_SALT . $A_id . "-" . $B_id), 0, 10);
        return $hash;
   }
}
