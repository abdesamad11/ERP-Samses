<?php

namespace App\Model\GS;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Vservice extends Model
{
    //
    use SoftDeletes;
    protected $fillable=[

      'clients_id',
      'date_ser',
     'num_vs',
     'remarque',
     'total',
      'rest',
       'active',
       'status',

    ];

    public function Activites(){

        return $this->belongsToMany('App\Model\GS\Activite')->wherePivot('prix_vs')->withTimestamps();
      }

      public function Reglementservices(){



                return $this->hasMany('App\Model\GS\Reglementservice');



      }

      public function Facture(){


        return $this->belongsTo('App\Model\GS\Facture','Vservice_id');


      }


}
