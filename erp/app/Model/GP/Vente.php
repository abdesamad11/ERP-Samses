<?php

namespace App\Model\GP;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Vente extends Model
{
    //
    use SoftDeletes;


    protected $fillable=[

      'clients_id',
      'num_facture',
      'date_v',
       'bon_livr',
      'num_bl',
      'remarque',
       'total',
       'rest',
      'active',
      'status',

    ];


    public function Clients(){


        return $this->hasMany('App\Model\GP\Client','clients_id');

    }


    public function produits(){


        return $this->belongsToMany('App\Model\GP\Produit')->withTimestamps();


      }



    public function ReglementVente(){


        return $this->hasMany('App\Model\GP\ReglementVente','vente_id');

    }






}
