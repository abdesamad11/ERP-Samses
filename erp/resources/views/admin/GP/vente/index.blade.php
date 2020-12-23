@extends('admin.layouts.master')

    @section('title')

       Vente

    @endsection

@section('content')
 <h1 class="text-center">Liste des Ventes  </h1>
 <div class="row">
    <div class="col-md">
        <div class="card o-hidden mb-4">
            <div class="card-header d-flex align-items-center">
                <h3 class="w-50 float-left card-title m-0">Ventes </h3>



            <div class="w-50 float-left">
                <form action="{{route('ventes.search')}}" method="post">
                    @csrf
                <label for="firstName1">Periode d'Ventes  :</label>
                <input type="date" name='date_deb'>
                <label for="firstName1">- jusqu'a -</label>
                <input type="date" name="date_fin">
                <input class="btn btn-success ripple m-1" type="submit" value="Rechercher">
                </form>
             </div>
            <div class="dropdown dropleft text-right w-50 float-right">
              <button class="btn bg-gray-100" id="dropdownMenuButton_table1" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="nav-icon i-Gear-2"></i>
                </button>
       <div class="dropdown-menu" aria-labelledby="dropdownMenuButton_table1">
       <a href="{{route('vente.create')}}" class="dropdown-item" ><i class="fas fa-plus"></i> Ajouter Ventes   </a>
        </div>
            </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table dataTable-collapse" id="user_table" >
                        <thead>
                            <tr>
                               <th scope="col">ID</th>
                               <th scope="col">Nom Clients </th>
                               <th scope="col">Date Vente</th>
                               <th scope="col">Nom Produit</th>
                               <th scope="col">Total</th>
                               <th scope="col">Rest</th>
                               <th scope="col">Remarque</th>
                               <th scope="col">Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($vente as $item)
                            <tr>
                                <th scope="row">{{$item->id}}</th>
                                <td>
            <span class="badge badge-pill badge-success m-2">{{$client->nom_cl }}</span>
                               </td>
                                <td>{{$item->date_v }}</td>
                                <td>
                                    <ul>
                                        @foreach($item->produits as $ite)
                                        <li>{{ $ite->name }}</li>
                                      @endforeach

                                    </ul>

                                </td>

                                <td>{{$item->total }}.00 DH</td>
                                <td>
                                    @if($item->rest==null)

                                     0.00 DH

                                    @else

                                         {{$item->rest}}.00 DH

                                    @endif
                                </td>
                                <td>{{$item->remarque }}</td>

                       <td>




                <a  href="{{route('vente.reglement',$item->clients_id)}}" class="btn btn-success btn-sm m-1" type="submit" title="reglemen
                 paiment avec Client">
                    <i class="i-Money-2"></i>
                 </a>

               @if( $item->bon_livr==0)

                <a  href="{{route('vente.bl',$item->id)}}" class="btn btn-info btn-sm m-1" type="submit" title="imprimer Bon livraison">
                    <i class="i-Billing"></i>
                 </a>


                 <a  href="" class="btn btn-success btn-sm m-1" type="submit" title="Facture vente"
                 style="background-color: darkcyan;"
                 >

                 <i class="fas fa-file-invoice-dollar"></i>
                 </a>



               @endif

                <a  href="" class="btn btn-primary btn-sm m-1" type="submit" title="details">
                    <i class="i-Align-Left"></i>
                 </a>
                 <form method="POST"  action="">
                    @csrf
                    @method('DELETE')

                    <button  class="btn btn-danger btn-sm m-1"  onclick="return confirm('Voulez-vous vraimment supprimer ?');" type="submit" title="supprimer"><i class="fas fa-trash-alt"></i></button>

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
