<?php

namespace App\Http\Controllers;

use App\Parameter;
use Illuminate\Http\Request;

class ParameterController extends Controller
{
    //

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }




    public function index(){

      $par=Parameter::all();


        return view('admin.parameter.index',compact('par'));


    }


    public function create(){


        return view('admin.parameter.create');
    }

    public function store(Request $request)
    {
        //
       // dd($request->all());


          // Validation
          $validatedData = $request->validate([

            'raison_sociale' => 'required|max:255',
            'nom_societe'=> 'required|max:255',
            'RC_soc'=>'required',
            'IF_soc'=>'required',
            'patente_soc'=>'required',
            'cnss_soc'=>'required',
            'ICE_soc'=>'required',
            'capitale_soc'=>'required',
            'taille_soc'=>'required',
            'secteur_activite_soc'=>'required',
            'nom_bank_soc'=>'required',
            'RIB_soc'=>'required',
            'adresse'=>'required',
            'email'=>'required',
            'GSM'=>'required',
            'fax'=>'required',
            'webSite'=>'required',
            'photo'=>'required',
            'cp'=>'required',
            'ville'=>'required',
            'pays'=>'required'


        ]);

        // array liste

        $data=array();

        $data['raison_sociale']=$request->raison_sociale;
        $data['nom_societe']=$request->nom_societe;
        $data['RC_soc']=$request->RC_soc;
        $data['IF_soc']=$request->IF_soc;
        $data['patente_soc']=$request->patente_soc;
        $data['cnss_soc']=$request->cnss_soc;
        $data['ICE_soc']=$request->ICE_soc;
        $data['capitale_soc']=$request->capitale_soc;
        $data['taille_soc']=$request->taille_soc;
        $data['secteur_activite_soc']=$request->secteur_activite_soc;
        $data['nom_bank_soc']=$request->nom_bank_soc;
        $data['RIB_soc']=$request->RIB_soc;
        $data['adresse']=$request->adresse;
        $data['email']=$request->email;
        $data['cp']=$request->cp;
        $data['GSM']=$request->GSM;
        $data['fax']=$request->fax;
        $data['webSite']=$request->webSite;
        $data['logo']=$request->photo->getClientOriginalName();
        $data['cp']=$request->cp;
        $data['ville']=$request->ville;
        $data['pays']=$request->pays;


      //  $data['']
     //   $data['nom']=$request->nom;
    //    dd($data);

        // image upload
          if($request->hasFile('photo')){

            $image=$request->photo;
            $image->move('uploads', $image->getClientOriginalName());

          }

        // flash seesion

        $show = Parameter::create($data);

        $show->save();

       // $request->session()->flash('status','Employer  est Cree');


        // rediraction

        return redirect('/admin/parameter')->withToastSuccess('information societe est cree avec sucess !');






    }

    public function edit($id)
    {
        //
        $par=Parameter::findOrfail($id);
        return view('admin.parameter.edit',compact('par'));

    }


    public function update(Request $request,  $id)
    {
        //

         //  dd($request->all());


            $par=Parameter::findOrFail($id);


            $data=array();

            $data['raison_sociale']=$par->raison_sociale=$request->input('raison_sociale');
            $data['nom_societe']=$par->nom_societe=$request->input('nom_societe');
            $data['RC_soc']=$par->RC_soc=$request->input('RC_soc');
            $data['IF_soc']=$par->IF_soc=$request->input('IF_soc');
            $data['patente_soc']=$par->patente_soc=$request->input('patente_soc');
            $data['cnss_soc']=$par->cnss_soc=$request->input('cnss_soc');
            $data['ICE_soc']=$par->ICE_soc=$request->input('ICE_soc');
            $data['capitale_soc']=$par->capitale_soc=$request->input('capitale_soc');
            $data['taille_soc']=$par->taille_soc=$request->input('taille_soc');
            $data['secteur_activite_soc']=$par->secteur_activite_soc=$request->input('secteur_activite_soc');
            $data['nom_bank_soc']=$par->nom_bank_soc=$request->input('nom_bank_soc');
            $data['RIB_soc']=$par->RIB_soc=$request->input('RIB_soc');
            $data['adresse']=$par->adresse=$request->input('adresse');
            $data['email']=$par->email=$request->input('email');
            $data['cp']=$par->cp=$request->input('cp');
            $data['GSM']=$par->GSM=$request->input('GSM');
            $data['fax']=$par->fax=$request->input('fax');
            $data['webSite']=$par->webSite=$request->input('webSite');

            $data['ville']=$par->ville=$request->input('ville');
            $data['pays']=$par->pays=$request->input('pays');

          //  $data['']
         //   $data['nom']=$request->nom;
        //    dd($data);

         // image upload

        if($request->hasFile('photo')){

               if(file_exists(public_path('uploads').$par->logo)){

                unlink(public_path('uploads').$par->logo);

               }

            $image=$request->photo;


         $image->move('uploads', $image->getClientOriginalName());


         $data['logo']=$par->logo=$request->photo->getClientOriginalName();


         }




            // flash seesion
            $par->save();



            return redirect('/admin/parameter')->withToastSuccess(' Modifier avec sucess !');











    }


    public function destroy(Request $request,$id)
    {
        //

        Parameter::destroy($id);


      //  $request->session()->flash('status','Client est supprimer ');


        return redirect('/admin/parameter')->withToastSuccess('Supprimer avec sucess !');;


    }






}
