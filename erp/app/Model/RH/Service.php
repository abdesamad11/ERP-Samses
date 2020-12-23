<?php

namespace App\Model\RH;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    //

    protected $fillable=[
        'nom','description'
    ];


    public function Employer(){


        return $this->belongsTo('App\Model\RH\Employer');
    }




}
