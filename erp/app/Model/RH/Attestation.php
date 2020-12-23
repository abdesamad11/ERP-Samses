<?php

namespace App\Model\RH;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Attestation extends Model
{
    //
    use SoftDeletes;

    protected $fillable=[

        'type','date_dm','etat','employer_id',

    ];


    public function employer(){

        return $this->belongsTo('App\Model\RH\Employer');


    }

}
