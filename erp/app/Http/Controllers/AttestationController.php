<?php

namespace App\Http\Controllers;

use App\c;
use App\Model\RH\Employer;
use App\Model\RH\Attestation;
use App\Parameter;
use PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AttestationController extends Controller
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
         $attestation=Attestation::with('Employer')->get();

         return view('admin.RH.attestation.index',compact('attestation'));
      //  dd($attestation);
    }


    public function archive(){


        $attestation=Attestation::onlyTrashed()->with('Employer')->get();

     //   dd($attestation);

       return view('admin.RH.attestation.index',compact('attestation'));
    }


    public function all(){


        $attestation=Attestation::withTrashed()->with('Employer')->get();


        return view('admin.RH.attestation.index',compact('attestation'));


    }


    public function search(Request $request){

        //   dd($request->all());

        $de=$request->input('date_deb');
        $fi=$request->input('date_fin');

         //  $attestation=DB::table('attestations')
             //       ->join('employers', 'employers.id', '=', 'attestations.employer_id')
             //        ->whereBetween('attestations.date_dm', [$de,$fi])
               //      ->get();
        $attestation=Attestation::with('Employer')
                    ->whereBetween('date_dm',[$de,$fi])->get();
       // dd($attestation->all());
       return view('admin.RH.attestation.index', compact('attestation'));

       }

       public function etat(Request $request,$id){


             //   dd($request->all(),$id);

                $attestation=Attestation::findOrFail($id);


                if($attestation->etat==0){

                    DB::table('attestations')->where('id',$id)->update(['etat'=>1]);

                    return redirect('/admin/RH/attestation')->withToastSuccess('attestation est accepter avec sucess !');


                }else
                {


                    DB::table('attestations')->where('id',$id)->update(['etat'=>0]);



                    return redirect('/admin/RH/attestation')->withToastSuccess('attestation est refuse  avec sucess !');

                }



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

        return view('admin.RH.attestation.create',compact('employer'));

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

            'employer_id' => 'required',
            'type' => 'required',
            'date_dm' => 'required'
                ]);
                $data=array();

                $data['employer_id']=$request->employer_id;
                $data['type']=$request->type;
                $data['date_dm']=$request->date_dm;
               $show = Attestation::create($data);
               $show->save();

         return redirect('/admin/RH/attestation')->withToastSuccess('attestation est Modifier avec sucess !');

        //  dd($request->all());

    }


    public function print(Request $request,$id){

      //  dd($request->all(),$id);


        $attestation=Attestation::with('Employer')->where('id','=',$id)->get();

        $parameter=Parameter::all();




      $pdf = PDF::loadView('admin.RH.attestation.print',compact('attestation','parameter'));

      return  $pdf->download('attestation.pdf');




       // return view('admin.RH.attestation.print');

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

        $attestation=Attestation::with('Employer')->where('id','=',$id)->get();


        return view('admin.RH.attestation.show',compact('attestation'));



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
     // $attestation=Attestation::with('Employer')->where('id','=',$id)->get();
        $employer=Employer::all()->where('id','<>',$id);
        $attestation=Attestation::findOrFail($id);
     // dd($employer);
        return view('admin.RH.attestation.edit',compact('attestation','employer'));


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
       // dd($request->all());

        // select Model

        $attestation=Attestation::findOrFail($id);

        // array() pour Model input

        $data=array();
        $data['type']=$attestation->type=$request->input('type');
        $data['date_dm']=$attestation->date_dm=$request->input('date_dm');
        $data['employer_id']=$attestation->employer_id=$request->input('employer_id');

          // dd($data);

        // flash seesion et redirect vers home

        $attestation->save();

        return redirect('/admin/RH/attestation')->withToastSuccess('Attestation est Modifier avec sucess !');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\c  $c
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       // Attestation::destroy($id);
       //  $request->session()->flash('status','Client est supprimer ');
        $attestation=Attestation::findOrFail($id);
       if($attestation->etat==0){

           return redirect('/admin/RH/attestation')->withToastWarning('Verifier Etat de Attestation avant supprimer ');


        }else {

        $attestation->delete();
        $attestation->save();
        return redirect('/admin/RH/attestation')->withToastSuccess('Attestation est Supprimer avec sucess !');;

          }


    }


    public function restore($id){

     //   dd($id);

        $attestation=Attestation::onlyTrashed()->where('id',$id)->first();


       // dd($attestation);

       $attestation->restore();


       return redirect('/admin/RH/attestation')->withToastSuccess('Attestation est Restore avec sucess !');;




    }









}
