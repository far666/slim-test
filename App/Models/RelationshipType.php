<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RelationshipType extends Model
{
    protected $table = 'relationship_type';

    protected $fillable = array("name");

    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope('all', function (\Illuminate\Database\Eloquent\Builder $builder) {
            $builder->select(array("id", "name", "created_at", "updated_at"))->whereNull('deleted_at');
        });
        static::addGlobalScope('find', function (\Illuminate\Database\Eloquent\Builder $builder) {
            $builder->select(array("id", "name", "created_at", "updated_at"))->whereNull('deleted_at');
        });

    }

    public function relationship_type()
    {
        return $this->hasMany("App\Models\Relationship");
    }
}
