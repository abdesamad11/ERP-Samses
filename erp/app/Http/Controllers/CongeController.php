<?php

namespace App\Http\Controllers;

use App\Model\RH\Conge;
use App\Model\RH\Employer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDF;

class CongeController extends Controller
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
        $conger=Conge::with('Employer')->get();
      //  $conger=Conge::with('employers');

     // dd($conger);

      return view('admin.RH.conger.index',compact('conger'));

    }

    public function search(Request $request){

        $de=$request->input('date_deb');
        $fi=$request->input('date_fin');

        $conger=Conge::with('Employer')
                    ->whereBetween('created_at',[$de,$fi])->get();
       // dd($attestation->all());
       return view('admin.RH.conger.index', compact('conger'));

    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $employer=Employer::all();

            //dd($employer);

        return view('admin.RH.conger.create', compact('employer'));

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

    'date_debut' => 'required',
    'date_fin' => 'required',
      'cause' => 'required',
      'emp_id'=>'required'

        ]);

          $date1 =$request->date_debut;
          $date2 = $request->date_fin;
// On transforme les 2 dates en timestamp
        $date3 = strtotime($date1);
        $date4 = strtotime($date2);

// On récupère la différence de timestamp entre les 2 précédents
    $nbJoursTimestamp = $date4 - $date3;

// ** Pour convertir le timestamp (exprimé en secondes) en jours **
// On sait que 1 heure = 60 secondes * 60 minutes et que 1 jour = 24 heures donc :
    $nbJours = $nbJoursTimestamp/86400; // 86 400 = 60*60*24

       // $idemp=$request->emp_id;

       if($nbJours>30){

            $nb=0;

        return back()->with('toast_error', 'Error ! Entre date conger exacte < 30 jr ')->withInput();


       }

       // $nb=$nbJours;
        $data=array();

        $data['date_debut']=$request->date_debut;
        $data['date_fin']=$request->date_fin;
        $data['cause']=$request->cause;
        $data['restjr']=$nbJours;
        $data['employer_id']=$request->emp_id;


    //    dd($request->all(),$nb);

      $show = Conge::create($data);

      $show->save();

      return redirect('/admin/RH/conger')->withToastSuccess('Employers est Modifier avec sucess !');



    }

    /**
     * Display the specified resource.
     *
     * @param  \App\c  $c
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

     //   $conger=Conge::findOrFail($id);
     //**
  //   $conger=Conge::with('Employer')->get();
    $conger=Conge::with('Employer')->where('id','=',$id)->get();

       // $conf=Conge::all();

     //  dd($conger);

     //   $tab=Response()->json(['conges' => $conger]);


      return view('admin.RH.conger.show',compact('conger'));


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
            $conger=Conge::findOrFail($id);
            $employer=Employer::all()->where('id','<>',$id);

            return view('admin.RH.conger.edit',compact('conger','employer'));

    }


    public function etat(Request $request,$id){


        //dd($request->all(),$id);

        $conger=Conge::findOrFail($id);


        if($conger->etat==0){

            DB::table('conges')->where('id',$id)->update(['etat'=>1]);

            return redirect('/admin/RH/conger')->withToastSuccess('conger est accepter avec sucess !');


        }else
        {


            DB::table('conges')->where('id',$id)->update(['etat'=>0]);



            return redirect('/admin/RH/conger')->withToastSuccess('conger est refuse  avec sucess !');

        }





    }


    public function pdfview(Request $request,$id){

       $conger=Conge::with('Employer')->where('id','=',$id)->get();

       $pdf = PDF::loadView('admin.RH.conger.print',compact('conger'));


       return  $pdf->download('conger.pdf');


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

     //   dd($request->all());

        // select Model
        $conger=Conge::findOrFail($id);

        // array() pour Model input

        $data=array();
        $data['date_debut']=$conger->date_debut=$request->input('date_debut');
        $data['date_fin']=$conger->date_fin=$request->input('date_fin');
        $data['cause']=$conger->cause=$request->input('cause');


          // dd($data);



        // flash seesion et redirect vers home

        $conger->save();


        return redirect('/admin/RH/conger')->withToastSuccess('conger est Modifier avec sucess !');





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
        $conger=Conge::findOrFail($id);


        if($conger->etat==0){


              return redirect('/admin/RH/conger')->withToastWarning('Verifier Etat de conger');

        }else {


            $conger->delete();

            $conger->save();


         return redirect('/admin/RH/conger')->withToastSuccess('conger est Supprimer avec sucess !');


        }




    }
}
