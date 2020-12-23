@extends('admin.layouts.master')

    @section('title')

          Services

    @endsection

@section('content')
<div class="breadcrumb">
    <h1>Gestion Service</h1>
    <ul>
        <li><a href="#">Services </a></li>
        <li>Ajouter </li>
    </ul>
</div>
<div class="separator-breadcrumb border-top"></div>
                <div class="row">
                    <div class="col-md-12">
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

                <div class="card-title mb-3">Nouvelle Services </div>
                <form method="POST" action="{{route('serviices.store')}}" enctype="multipart/form-data">
                    @csrf
                 <div class="row">
            <div class="col-md-6 form-group mb-3">
                <label for="firstName1">Nom de Service</label>
                <input class="form-control" id="categorie" type="text" name="nom" placeholder="Nom Service... " />
            </div>
            <div class="col-md-6 form-group mb-3">
                <label for="firstName1">Description</label>
               <textarea  class="form-control" name="description" id="" cols="30" rows="10"></textarea>
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
