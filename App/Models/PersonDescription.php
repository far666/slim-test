<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PersonDescription extends Model
{
    protected $table = 'person_description';

    public function person()
    {
        return $this->belongsTo('App\Models\Person');
    }
}
