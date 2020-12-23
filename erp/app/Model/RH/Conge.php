<?php

namespace App\Model\RH;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Conge extends Model
{
    //
    use SoftDeletes;

    protected $fillable=[
       'date_debut','date_fin','etat','cause','restjr','active','employer_id'
    ];



    public function employer(){

        return $this->belongsTo('App\Model\RH\Employer');


    }

}
