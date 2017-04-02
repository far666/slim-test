<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    protected $table = 'persons';

    protected $fillable = array("name", "sex", "birthday", "created_by", "deleted_at");

    public function descriptions()
    {
        return $this->hasMany("App\Models\PersonDescription");
    }

    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope('all', function (\Illuminate\Database\Eloquent\Builder $builder) {
            $builder->select(array("id", "name", "sex", "birthday", "created_by", "created_at", "updated_at"))->whereNull('deleted_at');
        });
    }
}
