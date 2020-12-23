<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exports\EmployersExport;
use App\Model\RH\Employer;
use App\Model\RH\Service;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class EmployerController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $employer=Employer::all();

        return view('admin.RH.gemp.index', compact('employer'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $service=Service::all();


        return view('admin.RH.gemp.create',compact('service'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validation
        $validatedData = $request->validate([
            'nom' => 'required|max:255',
            'email' => 'required',
            'tele' => 'required|max:14',
            'adresse' => 'required',
            'cin' => 'required|max:255',
            'experiecne' => 'required|max:255',
            'date_embouche' => 'required',
            'photo' => 'required',
            'salaire' => 'required',
            'conger' => 'required',
            'RIB' => 'required',
            'ville' => 'required',
            'affectation' => 'required',
            'service_id' => 'required'
        ]);

        // array liste

        $data=array();

        $data['nom']=$request->nom;
        $data['email']=$request->email;
        $data['tele']=$request->tele;
        $data['adresse']=$request->adresse;
        $data['cin']=$request->cin;
        $data['experiecne']=$request->experiecne;
        $data['date_embouche']=$request->date_embouche;
        $data['salaire']=$request->salaire;
        $data['conger']=$request->conger;
        $data['RIB']=$request->RIB;
        $data['ville']=$request->ville;
        $data['service_id']=$request->service_id;
        $data['affectation']=$request->affectation;
        $data['photo']=$request->photo->getClientOriginalName();

      //  $data['']
     //   $data['nom']=$request->nom;
    //    dd($data);

        // image upload
          if($request->hasFile('photo')){

            $image=$request->photo;
            $image->move('uploads', $image->getClientOriginalName());

          }

        // flash seesion

        $show = Employer::create($data);

        $show->save();

       // $request->session()->flash('status','Employer  est Cree');


        // rediraction

        return redirect('/admin/RH/gemp')->withToastSuccess('Employers est cree avec sucess !');



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
            $employer=Employer::findOrfail($id);

            return view('admin.RH.gemp.show',compact('employer'));

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
        $employer=Employer::findOrfail($id);
        return view('admin.RH.gemp.edit',compact('employer'));


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\c  $c
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
        //


        $employer=Employer::findOrFail($id);


        $data=array();

        $data['nom']=$employer->nom=$request->input('nom');
        $data['email']=$employer->tele=$request->input('email');
        $data['tele']= $employer->tele=$request->input('tele');
        $data['adresse']=$employer->adresse=$request->input('adresse');
        $data['cin']=$employer->cin=$request->input('cin');
        $data['experiecne']=$employer->experiecne=$request->input('experiecne');
        $data['salaire']=$employer->salaire=$request->input('salaire');
        $data['date_embouche']=$employer->date_embouche=$request->input('date_embouche');
        $data['conger']=$employer->conger=$request->input('conger');
        $data['RIB']=$employer->RIB=$request->input('RIB');
        $data['ville']=$employer->ville=$request->input('ville');
        $data['affectation']=$employer->affectation=$request->input('affectation');
        $data['photo']=$employer->photo=$request->photo->getClientOriginalName();


      //  $data['']
     //   $data['nom']=$request->nom;
    //    dd($data);

        // image upload
          if($request->hasFile('photo')){

            $image=$request->photo;
            $image->move('uploads', $image->getClientOriginalName());

          }


        // flash seesion


        $employer->save();



        return redirect('/admin/RH/gemp')->withToastSuccess('Employers est Modifier avec sucess !');





    }


    //    public function export(){

     //  return Excel::download(new EmployersExport, 'employers.xlsx');

       // }


        public function export(){

       //  return Excel::download(new EmployersExport, 'employers.xlsx');

        //   return redirect('/admin/gemp')->withToastSuccess('Employers  avec sucess !');
        //    return view('admin.gemp');
        //    dd($request->all());

      //  $headers = array('Content-Type' => 'text/csv', );

     //   if($request->exportexcl == null){

            return Excel::download(new EmployersExport, 'employers.xlsx');

      //  }

        //if($request->input(''))

        }

        public function csv(){

                return Excel::download(new EmployersExport, 'employers.csv');
        }






        public function search(Request $request){


         //   dd($request->all());

         $de=$request->input('date_deb');
         $fi=$request->input('date_fin');

            $employer=DB::table('employers')
                      ->whereBetween('date_embouche', [$de,$fi])
                      ->get();;

        // $employer = Employer::whereBetween('date_embouche', [$de, $fi])->get();

         //   dd($employer);

          return view('admin.RH.gemp.index', compact('employer'));

        }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\c  $c
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        //

        Employer::destroy($id);


      //  $request->session()->flash('status','Client est supprimer ');


        return redirect('/admin/RH/gemp')->withToastSuccess('Employers est Supprimer avec sucess !');;


    }
}
