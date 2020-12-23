<?php

namespace App\Model\RH;

use Illuminate\Database\Eloquent\Model;

class Employer extends Model
{
    //

    protected $fillable=[
        'nom','email','tele','adresse','cin','experiecne','date_embouche',
        'photo','salaire','conger','RIB','ville','affectation','service_id'
    ];


    public function Conges(){

        return $this->hasMany('App\Model\RH\Conge','employer_id');


    }

    public function Service(){

        return $this->hasOne('App\Model\RH\Service','service_id');

    }


    public function attestations(){

        return $this->hasMany('App\Model\RH\Attestation','employer_id');

    }


    public function evaluation(){


        return $this->hasMany('App\Model\RH\Evaluation','employer_id');

    }














}
