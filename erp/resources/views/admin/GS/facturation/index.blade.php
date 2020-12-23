@extends('admin.layouts.master')

    @section('title')

       Facture

    @endsection

@section('content')
<h1 class="text-center">Facturation </h1>
<div class="row">
    <div class="col-md">
        <div class="card o-hidden mb-4">
            <div class="card-header d-flex align-items-center">
                <h3 class="w-50 float-left card-title m-0">Ajouter  Nouveau Facture</h3>
            <div class="dropdown dropleft text-right w-50 float-right">
              <button class="btn bg-gray-100" id="dropdownMenuButton_table1" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="nav-icon i-Gear-2"></i>
                </button>
       <div class="dropdown-menu" aria-labelledby="dropdownMenuButton_table1">
       <a href="{{route('facturation.create')}}" class="dropdown-item" ><i class="fas fa-plus"></i>
        Ajouter Facturation  </a>
        </div>
            </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table dataTable-collapse" id="user_table" >
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Facture Serie</th>
                                <th scope="col">Date Facturation</th>
                                <th scope="col">Client</th>
                                <th scope="col">Montant</th>
                                <th scope="col">Status</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($facture as $item)
                            <tr>
                                <th scope="row">{{$item->id}}</th>
                             <th scope="row">{{$item->num_f}}</th>
                              <td>{{$item->date_f}}</td>
                              <td>{{$item->nom_cl}}</td>
                              <td>{{$item->total}}.00 DH</td>

                    <td>
                        @if($item->etat==1)
                        <span class="badge badge-success">valider </span>
                         @else
                        <span class="badge badge-warning">encoure</span>
                        @endif

                    </td>


                    <td>


            <a  href="{{route('facturation.show',$item->id)}}" class="btn btn-warning btn-sm m-1" type="submit" title="facturation">
               <i class="i-Billing"></i>
            </a>


            <a  href="{{route('facturation.edit',$item->id)}}" class="btn btn-success btn-sm m-1" type="submit" title="Modifier">
               <i class="i-Pen-5"></i>
            </a>

            <form method="POST"  action="{{route('facturation.destroy',$item->id)}}">
               @csrf
               @method('DELETE')

               <button  class="btn btn-danger btn-sm m-1"  onclick="return confirm('Voulez-vous vraimment supprimer ?');" type="submit" title="supprimer"
               ><i class="nav-icon fa fa-trash"></i></button>

            </form>


                    </td>

                        </tr>
                            @endforeach


                        </tbody>

                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- end of col-->
 </div>




@endsection
