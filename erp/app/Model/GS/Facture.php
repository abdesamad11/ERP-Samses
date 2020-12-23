<?php

namespace App\Model\GS;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Facture extends Model
{
    //
    use SoftDeletes;
    protected $fillable=[

        'vservices_id','num_f','date_f','date_exp','etat','condition'

    ];


    public function Vservices(){

        return $this->hasMany('App\Model\GS\Vservice');


    }




}
