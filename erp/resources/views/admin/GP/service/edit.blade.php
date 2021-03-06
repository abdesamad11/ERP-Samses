@extends('admin.layouts.master')

    @section('title')

        Service

    @endsection

@section('content')
<div class="breadcrumb">
    <h1>GP ET GS </h1>
    <ul>
        <li><a href="#">Service</a></li>
        <li>Modifier</li>
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
                <div class="card-title mb-3">           </div>
             <form method="POST" action="{{route('service.update',$service->id)}}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                 <div class="row">
            <div class="col-md-6 form-group mb-3">
                <label for="firstName1">Nom Service</label>
                <input class="form-control" " type="text" name="nom_serv" value="{{ $service->nom_serv }}" />
            </div>
            <div class="col-md-6 form-group mb-3">
                <label for="firstName1">Prix </label>
                <input class="form-control"  type="text" name="prix" value="{{ $service->prix_serv }}"/>
            </div>
            <div class="col-md-6 form-group mb-3">
                <label for="firstName1">Description </label>
                <textarea   class="form-control" name="description" id="" cols="30" rows="10" >
                   {{ $service->decription }}
                </textarea>

            </div>


                 <div class="col-md-12">
                        <button class="btn btn-success"><i class="fa fa-edit"></i>Modifier </button>
                        </div>
                    </div>
                 </form>

                    </div>
                        </div>
                    </div>
                </div>


























@endsection
