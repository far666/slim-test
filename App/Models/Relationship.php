<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Relationship extends Model
{
    protected $table = 'relationship';

    protected $fillable = array("person_A_id", "person_B_id", "relationship_type_id", "deleted_at");

    public function relationship_type()
    {
        return $this->hasOne("App\Models\RelationshipType");
    }

    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope('all', function (\Illuminate\Database\Eloquent\Builder $builder) {
            $builder->select(array("id", "person_A_id", "person_B_id", "relationship_type", "created_at", "updated_at"))->whereNull('deleted_at');
        });
    }
}
