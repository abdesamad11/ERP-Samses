@extends('admin.layouts.master')

    @section('title')

      Stock Entree

    @endsection

@section('content')


<h1 class="text-center">Stock Entree</h1>

<div class="row">
    <div class="col-md">
        <div class="card o-hidden mb-4">
            <div class="card-header d-flex align-item-s-center">
                <h3 class="w-50 float-left card-title m-0">Liste Stock Entree </h3>

                <div class="w-50 float-left">
                    <form action="{{route('stockIn.search')}}" method="post">
                        @csrf
                    <label for="firstName1">Date Entre :</label>
                    <input type="date" name='date_deb'>
                    <label for="firstName1">- jusqu'a -</label>
                    <input type="date" name="date_fin">

                    <input class="btn btn-success ripple m-1" type="submit" value='Rechercher'>
                    </form>
                </div>



            <div class="dropdown dropleft text-right w-50 float-right">
              <button class="btn bg-gray-100" id="dropdownMenuButton_table1" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="nav-icon i-Gear-2"></i>
                </button>
       <div class="dropdown-menu" aria-labelledby="dropdownMenuButton_table1">
       <a href="{{route('stockIn.create')}}" class="dropdown-item" ><i class="fas fa-plus"></i> Ajouter  Stock  Entree  </a>
        </div>
            </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table dataTable-collapse" id="user_table" >
                        <thead>
                            <tr>
                                <th scope="col">Categorie</th>
                                <th scope="col">Produit</th>
                                <th scope="col">Fournisseurs</th>
                                <th scope="col">Date Commande</th>
                                <th scope="col">Quantite stock Entree</th>
                                <th scope="col">Quantite stock Rester</th>
                                <th scope="col">Prix Achat</th>
                                <th scope="col">Prix Vente</th>
                                <th scope="col">Date Entree</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>

                            <tbody>

                                @foreach ($achats as $item)
                                <tr>


                                   <td> {{$item->nom_cat}}</td>
                                   <td> {{$item->name}}</td>
                                   <td> {{$item->nom_f}}</td>
                                   <td> {{$item->date_achat}}</td>
                                   <td> {{$item->qte_entree}}</td>
                                   <td> {{$item->quantite_rest}}</td>
                                   <td> {{$item->prix_ht_achat}}.00 DH </td>
                                   <td> {{$item->prix_ht_vente}}.00 DH</td>
                                   <td> {{$item->date_entree}}</td>
                                   <td>

                <a  href="{{route('stockIn.edit',$item->id)}}" class="btn btn-success btn-sm m-1" type="submit" title="Modifier"><i class="fas fa-edit"></i></a>



                <form method="POST"  action="{{route('stockIn.destroy',$item->id)}}">
                 @csrf
                @method('DELETE')

                 <button  class="btn btn-danger btn-sm m-1" type="submit" onclick="return confirm('Voulez-vous vraimment supprimer ?');" title="supprimer"><i class="fas fa-trash-alt"></i></button>

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

 <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
 <script type="text/javascript" language="javascript" >
     $(document).ready(function(){
      $('#user_table').DataTable({

       dom: 'lBfrtip',
       buttons: [
        'excel', 'csv', 'pdf', 'copy','colvis',
       ],
       "lengthMenu": [ [10, 25, 50, -1], [10, 25, 50, "All"] ]
      });

     });

    </script>






@endsection
