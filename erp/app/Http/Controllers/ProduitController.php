<?php

namespace App\Http\Controllers;

use App\c;
use App\Model\GP\Categorie;
use App\Model\GP\Produit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use phpDocumentor\Reflection\Types\Null_;

class ProduitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //


        $produits=DB::table('produits')
                    ->join('categories','produits.cat_id','=','categories.id')
                    ->whereNull('deleted_at')
                    ->get();




               //    dd($produits);
             return view ('admin.GP.produit.index',compact('produits'));
    }


    public function archive(){


     //   $produits=Produit::onlyTrashed()->with('Categorie')->get();

        $produits=DB::table('produits')
                    ->join('categories','produits.cat_id','=','categories.id')
                    ->whereNotNull('deleted_at')
                    ->get();

      //  dd($produits);
        return view('admin.GP.produit.index',compact('produits'));
    }


    public function all(){


      //  $produits=Produit::withTrashed()->with('Categorie')->get();
      $produits=DB::table('produits')
      ->join('categories','produits.cat_id','=','categories.id')
      ->get();



        return view('admin.GP.produit.index',compact('produits'));


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $categorie=Categorie::all();

        return view ('admin.GP.produit.create',compact('categorie'));

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
        $validatedData = $request->validate([

            'reference_prod'=>'required|unique:produits|max:255',
            'cat_id'=>'required',
            'name'=>'required|max:255',
            'designation'=>'required|max:255',
            'prix_ht_achat'=>'required',
            'prix_ht_vente'=>'required',
            'Unite'=>'required',
            'poid'=>'required',
            'quantite_init'=>'required',
            'date_entree'=>'required',
            'photo_prod'=>'',
            'tva'=>'required',
            'poid'=>'required',
            'emplacement'=>'required',

        ]);

        // array liste

        $data=array();

        $data['reference_prod']=$request->reference_prod;
        $data['name']=$request->name;
        $data['cat_id']=$request->cat_id;
        $data['tele']=$request->tele;
        $data['designation']=$request->designation;
        $data['cin']=$request->cin;
        $data['prix_ht_achat']=$request->prix_ht_achat;
        $data['prix_ht_vente']=$request->prix_ht_vente;
        $data['Unite']=$request->Unite;
        $data['poid']=$request->poid;
        $data['quantite_init']=$request->quantite_init;
        $data['quantite_rest']=$request->quantite_init;
        $data['date_entree']=$request->date_entree;
        $data['tva']=$request->tva;
        $data['photo_prod']=$request->photo->getClientOriginalName();
        $data['poid']=$request->poid;
        $data['emplacement']=$request->emplacement;



        if($request->hasFile('photo')){

            $image=$request->photo;
            $image->move('uploads', $image->getClientOriginalName());

                     }

      $prod=Produit::create($data);
      $prod->save();


      return redirect('/admin/GP/produit')->withToastSuccess('produit est cree avec sucess !');

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

        $produits=Produit::findOrFail($id);
        $categories=Categorie::all('nom_cat','id');

        return view('admin.GP.produit.edit',compact('produits','categories'));


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\c  $c
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $produits=Produit::findOrFail($id);


        $data=array();



        $data['reference_prod']=$produits->reference_prod=$request->input('reference_prod');
        $data['name']=$produits->name=$request->input('name');
        $data['cat_id']=$produits->cat_id=$request->input('cat_id');
        $data['designation']=$produits->designation=$request->input('designation');
        $data['prix_ht_achat']=$produits->prix_ht_achat=$request->input('prix_ht_achat');
        $data['prix_ht_vente']=$produits->prix_ht_vente=$request->input('prix_ht_vente');
        $data['Unite']=$produits->Unite=$request->input('Unite');
        $data['poid']=$produits->poid=$request->input('poid');
        $data['quantite_init']=$produits->quantite_init=$request->input('quantite_init');
        $data['quantite_rest']=$produits->quantite_rest=$request->input('quantite_rest');
        $data['date_entree']=$produits->date_entree=$request->input('date_entree');
        $data['tva']=$produits->tva=$request->input('tva');
        $data['poid']=$produits->poid=$request->input('poid');
        $data['emplacement']=$produits->emplacement=$request->input('emplacement');




      //  $data['']
     //   $data['nom']=$request->nom;
    //    dd($data);

        // image upload
        if($request->hasFile('photo')){

            if(file_exists(public_path('uploads').$produits->photo_prod)){

             unlink(public_path('uploads').$produits->photo_prod);

            }

                     $image=$request->photo;


                $image->move('uploads', $image->getClientOriginalName());


                $data['photo_prod']=$produits->photo_prod=$request->photo->getClientOriginalName();


                       }




        // flash seesion


        $produits->save();



        return redirect('/admin/GP/produit')->withToastSuccess('Produits est Modifier avec sucess !');


    }



    public function search(Request $request){

      //  dd($request->all());


        $de=$request->input('date_deb');
        $fi=$request->input('date_fin');


        $produits=Produit::with('Categorie')
                    ->whereBetween('date_entree',[$de,$fi])->get();




       return view('admin.GP.produit.index', compact('produits'));





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

        $produits=Produit::findOrFail($id);

            $produits->delete();

            $produits->save();


         return redirect('/admin/GP/produit')->withToastSuccess('conger est Supprimer avec sucess !');



    }



    public function restore($id){

        //   dd($id);

           $produits=Produit::onlyTrashed()->where('id',$id)->first();


          // dd($attestation);

          $produits->restore();


          return redirect('/admin/GP/produit')->withToastSuccess('Attestation est Restore avec sucess !');;




       }




       public function forcedelete($id)
       {
           //

           $produits=Produit::onlyTrashed()->where('id',$id)->first();


               $produits->forceDelete();




            return redirect('/admin/GP/produit')->withToastSuccess('conger est Supprimer avec sucess !');



       }










}
