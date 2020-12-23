@extends('admin.layouts.master')

    @section('title')

       Notation


    @endsection

@section('content')
<div class="breadcrumb">
    <h1>Gestion Notations </h1>
    <ul>
        <li><a href="#">Notations  </a></li>
        <li>Ajouter </li>
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
                <div class="card-title mb-3">Nouvelle Notations </div>
                <form method="POST" action="{{route('notations.store')}}" enctype="multipart/form-data">
                    @csrf
            <div class="row">
            <div class="col-md-4 form-group mb-3">
                 <label for="firstName1">Nom de l'employer </label>
                  <select class="form-control" name="employer_id" id="">
                    <option value="0">--Selection Nom de l'employer--</option>
                      @foreach ($employer as $item)
                      <option value="{{$item->id}}">{{$item->nom}}</option>
                      @endforeach
                  </select>
            </div>

            <div class="col-md-3 form-group mb-3">
                <label for="firstName1">organisation(0-10 point):</label>
         <input class="form-control"  type="number" name="organisation"  />
            </div>

            <div class="col-md-3 form-group mb-3">
                <label for="firstName1">depalcement(0-10 point):</label>
         <input class="form-control"  type="number" name="depalcement"  />
            </div>

            <div class="col-md-3 form-group mb-3">
                <label for="firstName1">integration(0-10 point):</label>
         <input class="form-control"  type="number" name="integration"  />
            </div>


            <div class="col-md-3 form-group mb-3">
                <label for="firstName1">missions(0-10 point):</label>
         <input class="form-control"  type="number" name="missions"  />
            </div>










             <div class="col-md-12">
             <button class="btn btn-primary"><i class="fas fa-plus"></i> Ajouter </button>
                 </div>
             </div>
                 </form>

                    </div>
                        </div>
                    </div>
                </div>

























@endsection
