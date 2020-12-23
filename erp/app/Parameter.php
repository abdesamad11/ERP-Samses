<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Parameter extends Model
{
    //

   protected $fillable = [
       'raison_sociale',
       'nom_societe',
       'RC_soc',
       'IF_soc',
       'patente_soc',
         'cnss_soc',
         'ICE_soc',
         'capitale_soc',
         'taille_soc',
         'secteur_activite_soc',
         'nom_bank_soc',
         'RIB_soc',
         'adresse',
         'email',
         'GSM',
         'fax',
         'webSite',
         'logo',
         'cp',
         'ville',
         'pays',

        ];



}
