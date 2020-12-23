@extends('admin.layouts.master')

    @section('title')

        Produits

    @endsection

@section('content')


<h1 class="text-center">Liste de Produits</h1>

<div class="row">
    <div class="col-md">
        <div class="card o-hidden mb-4">
            <div class="card-header d-flex align-item-s-center">
                <h3 class="w-50 float-left card-title m-0">Ajouter  Nouveau Produits</h3>

                <div class="w-50 float-left">
                    <form action="{{  route('produit.search') }}" method="post">
                        @csrf
                    <label for="firstName1">Date Achats :</label>
                    <input type="date" name='date_deb'>
                    <label for="firstName1">- jusqu'a -</label>
                    <input type="date" name="date_fin">

                    <input class="btn btn-success ripple m-1" type="submit" value='Rechercher'>
                    </form>
                </div>

            <div class="w-50 float-left">

                    <label>restore archive :</label>

           <a  href="{{ route('produit.archive') }}" class="btn btn-primary btn-sm m-1" type="submit" style="background-color: #74b9ff;" ><i class="fas fa-archive"></i></a>
                   <label>Tous produits :</label>

            <a  href="{{  route('produit.all')}}" class="btn btn-primary btn-sm m-1" type="submit" style="background-color:#95afc0;" ><i class="i-Repeat-2"></i></a>

            </div>

            <div class="dropdown dropleft text-right w-50 float-right">
              <button class="btn bg-gray-100" id="dropdownMenuButton_table1" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="nav-icon i-Gear-2"></i>
                </button>
       <div class="dropdown-menu" aria-labelledby="dropdownMenuButton_table1">
       <a href="{{route('produit.create')}}" class="dropdown-item" ><i class="fas fa-plus"></i> Ajouter Produits    </a>
        </div>
            </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table dataTable-collapse" id="user_table" >
                        <thead>
                            <tr>
                                <th scope="col">Refrence</th>
                                <th scope="col">Categorie</th>
                                <th scope="col">Produit</th>
                                <th scope="col">Q.rest</th>
                                <th scope="col">Q.stock</th>
                                <th scope="col">P.achat</th>
                                <th scope="col">P.vente</th>
                                <th scope="col"> photo   </th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($produits as $item)
                            <tr>
                                <td>{{ $item->reference_prod }}</td>
                                <td>{{ $item->nom_cat}} </td>
                                <td>{{$item->name }}</td>
                                <td>
                                    @if($item->quantite_rest==0)

                                             {{ '0' }}

                                            @else
                                             {{$item->quantite_rest }}
                                     @endif
                                </td>
                                <td>{{$item->quantite_init}}</td>
                                <td>{{$item->prix_ht_achat }}</td>
                                <td>{{$item->prix_ht_vente }}</td>
                                <td><img src="{{ URL('uploads').'/'.$item->photo_prod }}" alt="photo" style="width: 80px; height:80px;"/> </td>
                                <td>


          <a  href="{{route('produit.edit',$item->id)}}" class="btn btn-success btn-sm m-1" type="submit" alt="modifier"><i class="fas fa-edit"></i></a>





          <a  href="" class="btn btn-info btn-sm m-1" data-toggle="modal" data-target="#exampleModalCenter"  type="button"><i class="fas fa-chart-pie"></i></a>

          <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle-2" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalCenterTitle-2">Etat de produit {{$item->name}}</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                    </div>
                    <form action="" method="post">
                        @csrf
                    <div class="modal-body">


                        <label for="firstName1">Date debut :</label>
                        <input type="date" name='date_deb'>
                        <label for="firstName1">-Date fin  -</label>
                        <input type="date" name="date_fin">
                        <label for="firstName1">-Type -</label>

                        <label class="radio radio-success">
                            <input type="radio" name="radio"  />
                            <span>Achat</span><span class="checkmark"></span>
                        </label>
                        <label class="radio radio-warning">
                            <input type="radio" name="radio"  />
                            <span>vente</span><span class="checkmark">
                            </span>
                        </label>



                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
                        <button class="btn btn-success ml-2" type="submit">Afficher</button>
                    </div>
                 </form>
                </div>
            </div>
        </div>


          @if(!$item->deleted_at)

             <form method="POST"  action="{{route('produit.destroy',$item->id)}}">
                @csrf
                @method('DELETE')

                <button  class="btn btn-danger btn-sm m-1" type="submit"    onclick="return confirm('Voulez-vous vraimment supprimer ?');"      ><i class="fas fa-trash-alt"></i></button>

             </form>


            @else

                <form method="POST"  action="{{route('produit.restore',$item->id)}}">
                    @csrf
                    @method('PATCH')

                    <button  class="btn btn-danger btn-sm m-1" type="submit" onclick="return confirm('Voulez-vous vraimment restore   ?');"

                    style="background-color: #eb4d4b;"

                    ><i class="i-Inbox-Out"></i></button>

                </form>


                <form method="POST"  action="{{route('produit.forcedelete',$item->id)}}">
                    @csrf
                    @method('DELETE')

                    <button  class="btn btn-danger btn-sm m-1" type="submit"    onclick="return confirm('Voulez-vous vraimment supprimer ?');"      ><i class="fas fa-trash-alt"></i></button>

                </form>






            @endif














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
