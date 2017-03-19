<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Person_description extends Model
{
    protected $table = 'person_description';

    public function person()
    {
        return $this->hasMany('App\Models\Person_description');
    }
}
