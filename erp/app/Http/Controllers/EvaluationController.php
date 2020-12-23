<?php

namespace App\Http\Controllers;

use App\c;
use App\Model\RH\Employer;
use App\Model\RH\Evaluation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

use function GuzzleHttp\Promise\all;

class EvaluationController extends Controller
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

        $evaluation=Evaluation::with('Employer')->get();

      return view('admin.RH.notations.index',compact('evaluation'));

      //  dd($evaluation);
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

        return view('admin.RH.notations.create',compact('employer'));
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

        'employer_id' => 'required|Max:20',
        'organisation' => 'required|Max:20',
        'depalcement' => 'required|Max:20',
        'integration'=>'required|Max:20',
        'missions'=>'required|Max:20'

            ]);


            $data=array();

            $data['employer_id']=$request->employer_id;
            $data['organisation']=$request->organisation;
            $data['depalcement']=$request->depalcement;
            $data['integration']=$request->integration;
            $data['missions']=$request->missions;


            $or=$request->organisation;
            $dp=$request->depalcement;
            $ing=$request->integration;
            $mi=$request->missions;

            $note=floatval((($or+$dp+$ing+$mi)/4));

            $data['note']=$note;



           $show =Evaluation::create($data);
           $show->save();

     return redirect('/admin/RH/notations')->withToastSuccess('note employer est ajouter avec sucess !');










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






    public function etat(Request $request,$id){


       // dd($request->all(),$id);

        $evaluation=Evaluation::findOrFail($id);

        $score=$evaluation->note;



        if($score == 10 and $evaluation->etat==0 ){

            DB::table('evaluations')->where('id',$id)->update(['Montant'=>350],['etat'=>1]);

            return redirect('/admin/RH/notations')->withToastSuccess('note employer est approve avec sucess !');




        }elseif($score==9 and $evaluation->etat==0){


            DB::table('evaluations')->where('id',$id)->update(['Montant'=>300],['etat'=>1]);

            return redirect('/admin/RH/notations')->withToastSuccess('note employer est approve avec sucess !');


        }elseif($score==8 and $evaluation->etat==0){


            DB::table('evaluations')->where('id',$id)->update(['Montant'=>250],['etat'=>1]);

            return redirect('/admin/RH/notations')->withToastSuccess('note employer est approve avec sucess !');


        }elseif($score==7 and $evaluation->etat==0){

            DB::table('evaluations')->where('id',$id)->update(['Montant'=>200],['etat'=>1]);

            return redirect('/admin/RH/notations')->withToastSuccess('note employer est approve avec sucess !');



        }elseif($score==6 and $evaluation->etat==0){


            DB::table('evaluations')->where('id',$id)->update(['Montant'=>150],['etat'=>1]);

            return redirect('/admin/RH/notations')->withToastSuccess('note employer est approve avec sucess !');




        }elseif($score==5 and $evaluation->etat==0){


            DB::table('evaluations')->where('id',$id)->update(['Montant'=>100],['etat'=>1]);

            return redirect('/admin/RH/notations')->withToastSuccess('note employer est approve avec sucess !');


        }elseif($score<=5 and $evaluation->etat==0){

            DB::table('evaluations')->where('id',$id)->update(['Montant'=>0],['etat'=>1]);

            return redirect('/admin/RH/notations')->withToastSuccess('note employer est approve avec sucess !');


        }











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
        $employer=Employer::all()->where('id','<>',$id);
        $evaluation=Evaluation::findOrFail($id);

        return view('admin.RH.notations.edit',compact('evaluation','employer'));



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
        //dd($request->all(),$id);

        $evaluation=Evaluation::findOrFail($id);

        // array() pour Model input
            $data=array();
            $data['employer_id']=$evaluation->employer_id=$request->input('employer_id');
            $data['organisation']=$evaluation->organisation=$request->input('organisation');
            $data['depalcement']=$evaluation->depalcement=$request->input('depalcement');
            $data['integration']=$evaluation->integration=$request->input('integration');
            $data['missions']=$evaluation->missions=$request->input('missions');


            $or=$evaluation->organisation=$request->organisation;
            $dp=$evaluation->depalcement=$request->depalcement;
            $ing=$evaluation->integration=$request->integration;
            $mi=$evaluation->missions=$request->missions;

            $note=floatval((($or+$dp+$ing+$mi)/4));

            $data['note']=$note;




            $evaluation->save();




          // dd($data);

        // flash seesion et redirect vers home


        return redirect('/admin/RH/notations')->withToastSuccess('Notations est Modifier avec sucess !');





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
            $evaluation=Evaluation::findOrFail($id);
            $evaluation->destroy($id);
            $evaluation->save();


            return redirect('/admin/RH/notations')->withToastSuccess('Notations est Supprimer  avec sucess !');







    }
}
