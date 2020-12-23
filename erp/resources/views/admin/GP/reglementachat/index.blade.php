@extends('admin.layouts.master')

    @section('title')

       Reglement

    @endsection

@section('content')
<h1 class="text-center">Liste des Reglememnt Fournisseurs</h1>
<div class="row">
    <div class="col-md">
        <div class="card o-hidden mb-4">
            <div class="card-header d-flex align-item-s-center">
                <h3 class="w-50 float-left card-title m-0">Liste Paimenet  Regler Achat </h3>
            <div class="dropdown dropleft text-right w-50 float-right">
              <button class="btn bg-gray-100" id="dropdownMenuButton_table1" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="nav-icon i-Gear-2"></i>
                </button>
       <div class="dropdown-menu" aria-labelledby="dropdownMenuButton_table1">
       <a href="" class="dropdown-item" ><i class="fas fa-plus"></i> Ajouter Reglement  </a>
        </div>
            </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table dataTable-collapse" id="user_table" >
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Mode</th>
                                <th scope="col">Numero</th>
                                <th scope="col">Date reglement</th>
                                <th scope="col">Remarque</th>
                                <th scope="col">Montant</th>
                                <th scope="col">Rester</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($reglement as $item)


                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->Mode}} </td>
                                <td>{{$item->numero}}</td>
                                <td>{{$item->date_reglemant}}</td>
                                <td>{{$item->remarque}}</td>
                                <td>{{$item->Montant}}</td>
                                <td>{{$item->nrest}}</td>
                                <td>

             <form method="POST"  action="{{route('reglementachat.destroy',$item->id)}}">
                @csrf
                @method('DELETE')

        <button  class="btn btn-danger btn-sm m-1" type="submit"    onclick="return confirm('Voulez-vous vraimment supprimer ?');"      ><i class="fas fa-trash-alt"></i></button>

            </form>




                                </td>
                            </tr>
                            @endforeach
                        </tbody>

                    </table>


                </div>
                <div class="df">
                    <span class="badge badge-pill badge-success m-2">
                        <h4>Total : {{ $regl }}.00 DH </h4>
                    </span>
                </div>
            </div>
        </div>
    </div>
    <!-- end of col-->
 </div>





















@endsection
