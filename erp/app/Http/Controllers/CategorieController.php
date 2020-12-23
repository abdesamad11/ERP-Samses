<?php

namespace App\Http\Controllers;


use App\Model\GP\Categorie;
use Illuminate\Http\Request;

class CategorieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $categorie=Categorie::all();

        return view ('admin.GP.categorie.index',compact('categorie'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //


        return view ('admin.GP.categorie.create');

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

        $categorie=$request->only(['nom_cat']);

        $categorie=Categorie::create($categorie);


    //   $request->session()->flash('status','Categorie est cree  ');

        return redirect('/admin/GP/categorie')->withToastSuccess('Categorie  Ajouter  avec sucess !');
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
        $categorie=Categorie::findOrFail($id);

        return view ('admin.GP.categorie.edit',compact('categorie'));

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

        $categories=Categorie::findOrFail($id);

        $categories->nom_cat=$request->input('nom_cat');

        $categories->save();


        $request->session()->flash('status','categorie ');


        return redirect('/admin/GP/categorie')->withToastSuccess('Categorie  Modifier  avec sucess !');
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


        Categorie::destroy($id);

        return redirect('/admin/GP/categorie')->withToastSuccess('Categorie  supprimer   avec sucess !');



    }
}
