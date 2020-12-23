@extends('admin.layouts.master')

    @section('title')

          Services

    @endsection

@section('content')
<div class="breadcrumb">
    <h1>Gestion Service</h1>
    <ul>
        <li><a href="#">Services </a></li>
        <li>Modifier </li>
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

                <div class="card-title mb-3">Modifier Services </div>
                <form method="POST" action="{{route('serviices.update',$service->id)}}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                 <div class="row">
            <div class="col-md-6 form-group mb-3">
                <label for="firstName1">Nom de Service</label>
                <input class="form-control" id="categorie" type="text" name="nom" value="{{ $service->nom }}" />
            </div>
            <div class="col-md-6 form-group mb-3">
                <label for="firstName1">Description</label>
               <textarea
                 class="form-control" name="description" id="" cols="30" rows="10">
                 {{ $service->description }}
                </textarea>
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
