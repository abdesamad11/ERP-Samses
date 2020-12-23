<?php

namespace App\Model\RH;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Evaluation extends Model
{
    //
    use SoftDeletes;



    protected $fillable=[

        'note','organisation','depalcement','integration','missions','Montant','etat','employer_id'
    ];


    public function Employer(){


        return  $this->belongsTo('App\Model\RH\Employer');


    }




}
