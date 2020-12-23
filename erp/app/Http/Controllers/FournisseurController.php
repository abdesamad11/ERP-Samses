<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use App\c;
use App\Model\GP\Fournisseur;
use Illuminate\Http\Request;

class FournisseurController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $fournisseurs=Fournisseur::all();

        return view('admin.GP.fornisseurs.index',compact('fournisseurs'));


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.GP.fornisseurs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
       // dd($request->all());
         $validatedData = $request->validate([

            'type_compte'=>'required|max:255',
            'nom_f'=>'required|max:255',
            'raison_social'=>'required|max:255',
            'tele'=>'required',
            'email'=>'required',
            'ICE'=>'required',
            'secteur_activite'=>'required',
            'adresse_f'=>'required',
            'logo'=>'',
            'nom_banck'=>'',
            'num_compte'=>'',


        ]);

        // array liste

        $data=array();

        $data['type_compte']=$request->type_compte;
        $data['nom_f']=$request->nom_f;
        $data['raison_social']=$request->raison_social;
        $data['tele']=$request->tele;
        $data['email']=$request->email;
        $data['ICE']=$request->ICE;
        $data['secteur_activite']=$request->secteur_activite;
        $data['adresse_f']=$request->adresse_f;
        $data['nom_banck']=$request->nom_banck;
        $data['num_compte']=$request->num_compte;
        $data['logo']=$request->photo->getClientOriginalName();




        if($request->hasFile('photo')){

            $image=$request->photo;
            $image->move('uploads', $image->getClientOriginalName());

                     }

      $fournisseurs=Fournisseur::create($data);
      $fournisseurs->save();


      return redirect('/admin/GP/fornisseurs')->withToastSuccess('fornisseurs est cree avec sucess !');


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\c  $c
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\c  $c
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
               // dd($id);

           $fournisseur=Fournisseur::findOrFail($id);


            return view('admin.GP.fornisseurs.edit',compact('fournisseur'));


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\c  $c
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        //

      //  dd($id,$request->all());

        $fournisseur=Fournisseur::findOrFail($id);


        $data=array();

        $data['type_compte']=$fournisseur->type_compte=$request->input('type_compte');
        $data['nom_f']=$fournisseur->nom_f=$request->input('nom_f');
        $data['raison_social']=$fournisseur->raison_social=$request->input('raison_social');
        $data['tele']=$fournisseur->tele=$request->input('tele');
        $data['email']=$fournisseur->email=$request->input('email');
        $data['ICE']=$fournisseur->ICE=$request->input('ICE');
        $data['secteur_activite']=$fournisseur->secteur_activite=$request->input('secteur_activite');
        $data['adresse_f']=$fournisseur->adresse_f=$request->input('adresse_f');
        $data['nom_banck']=$fournisseur->nom_banck=$request->input('nom_banck');
        $data['num_compte']=$fournisseur->num_compte=$request->input('num_compte');


      //  $data['']
     //   $data['nom']=$request->nom;
    //    dd($data);

        // image upload
        if($request->hasFile('photo')){

            if(file_exists(public_path('uploads').$fournisseur->photo)){

             unlink(public_path('uploads').$fournisseur->photo);

                                        }

            $image=$request->photo;


            $image->move('uploads', $image->getClientOriginalName());


                $data['logo']=$fournisseur->logo=$request->photo->getClientOriginalName();


        }


        // flash seesion


        $fournisseur->save();


        return redirect('/admin/GP/fornisseurs')->withToastSuccess('fornisseurs est Modifier avec sucess !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\c  $c
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //

        $fournisseur=Fournisseur::findOrFail($id);


        $fournisseur->destroy($id);


        $fournisseur->save();


        return redirect('/admin/GP/fornisseurs')->withToastSuccess('fornisseurs est Supprimer avec sucess !');


    }
}
