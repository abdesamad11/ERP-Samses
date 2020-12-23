@extends('admin.layouts.master')

    @section('title')

       Notation


    @endsection

@section('content')
<div class="breadcrumb">
    <h1>Gestion Notations </h1>
    <ul>
        <li><a href="#">Notations  </a></li>
        <li>Modifer </li>
    </ul>
</div>
<div class="separator-breadcrumb border-top"></div>
                <div class="row">
                    <div class="col-md-8">
                        <div class="card mb-4">
                            @if ($errors->any())
                            <div class="alert alert-danger">
                              <ul>
                                  @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                  @endforeach
                              </ul>
                            </div><br/>
                            @endif
                <div class="card-body">
                <div class="card-title mb-3"> Modifier Notations </div>
                <form method="POST" action="{{route('notations.update',$evaluation->id)}}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
            <div class="row">
            <div class="col-md-4 form-group mb-3">
                 <label for="firstName1">Nom de l'employer </label>
                  <select class="form-control" name="employer_id" id="">
                    <option value="{{ $evaluation->employer_id }}" selected>{{ $evaluation->employer->nom }}</option>
                      @foreach ($employer as $item)
                      <option value="{{$item->id}}">{{$item->nom}}</option>
                      @endforeach
                  </select>
            </div>

            <div class="col-md-3 form-group mb-3">
                <label for="firstName1">organisation(0-10 point):</label>
         <input class="form-control"  type="number" name="organisation" value="{{   $evaluation->organisation   }}" />
            </div>

            <div class="col-md-3 form-group mb-3">
                <label for="firstName1">depalcement(0-10 point):</label>
         <input class="form-control"  type="number" name="depalcement"   value="{{   $evaluation->depalcement   }}" />
            </div>

            <div class="col-md-3 form-group mb-3">
                <label for="firstName1">integration(0-10 point):</label>
         <input class="form-control"  type="number" name="integration"  value="{{   $evaluation->integration   }}"  />
            </div>


            <div class="col-md-3 form-group mb-3">
                <label for="firstName1">missions(0-10 point):</label>
         <input class="form-control"  type="number" name="missions"  value="{{   $evaluation->missions   }}"  />
            </div>









             <div class="col-md-12">
             <button class="btn btn-success"><i class="fas fa-edit"></i> Modifier </button>
                 </div>
             </div>
                 </form>

                    </div>
                        </div>
                    </div>
                </div>






@endsection
