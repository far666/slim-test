<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    protected $table = 'persons';


    public function descriptions()
    {
        return $this->hasMany('App\Models\Person_description');
    }
}
