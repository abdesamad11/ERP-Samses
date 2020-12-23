<?php

namespace App\Model\GP;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Produit extends Model
{
    //
    use SoftDeletes;

    protected $fillable=[
        'id',
        'reference_prod',
        'cat_id',
        'name',
        'designation',
        'prix_ht_achat',
        'prix_ht_vente',
        'unite',
        'poid',
        'quantite_init',
        'quantite_rest',
        'date_entree',
        'photo_prod',
        'tva',
        'emplacement',
    ];


    public function Categorie()
    {
        return $this->belongsTo('App\Model\GP\Categorie','cat_id');
    }


    public function achats(){


       return $this->belongsTo('App\Model\GP\Achat');
    }


    public function StockIn(){

        return $this->belongsTo('App\Model\GP\StockIn');

    }



    public function Ventes(){


        return $this->belongsToMany('App\Model\GP\Vente')->wherePivot(['quantity'])->withTimestamps();
     }





}
