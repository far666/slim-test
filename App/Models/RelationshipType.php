<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RelationshipType extends Model
{
    protected $table = 'relationship_type';

    protected $fillable = array("name");

    public function relationship_type()
    {
        return $this->hasMany("App\Models\Relationship");
    }
}
