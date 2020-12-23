@extends('admin.layouts.master')

    @section('title')

       Clients

    @endsection

@section('content')
 <h1 class="text-center">Liste des Client </h1>

 <div class="row">
    <div class="col-md">
        <div class="card o-hidden mb-4">
            <div class="card-header d-flex align-items-center">
                <h3 class="w-50 float-left card-title m-0">Ajouter  Nouveau Clients</h3>
            <div class="dropdown dropleft text-right w-50 float-right">
              <button class="btn bg-gray-100" id="dropdownMenuButton_table1" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="nav-icon i-Gear-2"></i>
                </button>
       <div class="dropdown-menu" aria-labelledby="dropdownMenuButton_table1">
       <a href="{{route('clients.create')}}" class="dropdown-item" ><i class="fas fa-user-plus"></i> Ajouter Clients   </a>
        </div>
            </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table dataTable-collapse" id="user_table" >
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Decription</th>
                                <th scope="col">Date insertion</th>
                                <th scope="col">Telephone</th>
                                <th scope="col">Email</th>
                                <th scope="col">photo</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($clients as $item)
                            <tr>
                                <th scope="row">{{$item->id}}</th>
                                <td>
                                    <ul>
                                        <li>Nom:{{$item->nom_cl}}</li>
                                        <li>Raison social : {{$item->raison_social}}</li>
                                        <li>ICE: {{$item->ICE}}</li>
                                    </ul>
                                </td>
                                <td>{{$item->created_at->format('Y-m-d')}}</td>
                                <td>{{$item->tele}}</td>
                                <td>{{$item->email}}</td>
                                <td><img src="{{ URL('uploads').'/'.$item->logo }}" alt="photo" style="width: 80px; height:80px;"/> </td>


                    <td>

                 <a  href="{{route('clients.edit',$item->id )}}" class="btn btn-success btn-sm m-1" type="submit" title="modifier"><i class="fas fa-edit"></i></a>


                 <a  href="" class="btn btn-primary btn-sm m-1" type="submit"  title="Reglement payement"><i class="i-Money1"></i></a>



                 <a  href="{{route('clients.edit',$item->id )}}" class="btn btn-danger btn-sm m-1" type="submit" title="Archive"
                    style="
    background-color: coral;
    border-color: coral;"
                    ><i class="fas fa-archive"></i></a>


                 <a  href="{{route('clients.edit',$item->id )}}" class="btn btn-warning btn-sm m-1" type="submit" title="Facture"><i class="fas fa-file-invoice"></i></a>

                <a  href="" class="btn btn-info btn-sm m-1" data-toggle="modal" data-target="#exampleModalCenter"  type="button" title="etat vente "><i class="fas fa-chart-pie"></i></a>
                <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle-2" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalCenterTitle-2">Etat de Vente {{$item->nom_cl}}</h5>
                                <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                            </div>
                            <form action="" method="post">
                                @csrf
                            <input type="hidden" name="id" value="{{$item->id}}">
                            <div class="modal-body">
                                <label for="firstName1">Date debut :</label>
                                <input type="date" name='date_deb'>
                                <label for="firstName1">-Date fin  -</label>
                                <input type="date" name="date_fin">

                            </div>
                            <div class="modal-footer">
                                <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
                                <button class="btn btn-success ml-2" type="submit">Afficher</button>
                            </div>
                         </form>
                        </div>
                         </div>
                         </div>






                    <form method="POST"  action="{{route('clients.destroy',$item->id)}}">
                    @csrf
                    @method('DELETE')

                    <button  class="btn btn-danger btn-sm m-1" type="submit" onclick="return confirm('Voulez-vous vraimment supprimer ?');"   title="Supprimer"><i class="fas fa-trash-alt"></i></button>

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
