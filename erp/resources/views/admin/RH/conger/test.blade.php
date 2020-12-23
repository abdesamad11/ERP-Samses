<!DOCTYPE html>
<html lang="en" dir="">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Ficher </title>
    <link href="https://fonts.googleapis.com/css?family=Nunito:300,400,400i,600,700,800,900" rel="stylesheet" />
    <link href="../../dist-assets/css/themes/lite-purple.min.css" rel="stylesheet" />
    <link href="../../dist-assets/css/plugins/perfect-scrollbar.min.css" rel="stylesheet" />
</head>

<body class="text-left">
    <div class="app-admin-wrap layout-sidebar-large">

<h1 class="text-cemter "> Attestation de Conger   </h1>
    @foreach ($conger as $item)

    <div id="print-area">
        <div class="row">
            <div class="col-md-6">
                <label for="">Nom de l'employer :</label>
                <h1 class="font-weight-bold">{{$item->employer->nom}}</h1>
            </div>
            <div class="col-md-6 text-sm-right">
                   <h4> Date : {{date('Y-m-d H:i:s')}}   </h4>
            </div>
        </div>
        <div class="mt-3 mb-4 border-top"></div>
        <div class="row mb-5">
        </div>
        <div class="row">
            <div class="col-md-12 table-responsive">
                <table class="table table-hover mb-4">
                    <thead class="bg-gray-300">
                        <tr>
                            <th scope="col">Motif</th>
                            <th scope="col">Dates</th>
                            <th scope="col">nombre de jours par annéerestant</th>
                            <th scope="col">nombre de jours de votre conger </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>

                            <td>


                                <div class="input-group">

                                    <textarea class="form-control" aria-label="With textarea">
                             {{ $item->cause }}
                                    </textarea>
                                </div>


                            </td>
                            <td>
         <h5>{{ $item->date_debut }}</h5><h6><span>à</span></h6><h5> {{ $item->date_fin }}</h5>

                            </td>

                            <td>

                           <h5> {{ ($item->employer->conger) - ($item->restjr) }} <span>Jrous</span>
                        </h5>
                            </td>

                            <td>

                                <h5> {{ $item->restjr }} <span>Jrous</span>
                             </h5>
                                 </td>

                        </tr>

                    </tbody>
                </table>
            </div>
            <div class="col-md-12">
                <div class="invoice-summary">

                       <table class="table mb-2 ">
                           <thead>
                               <tr>
                                   <td scope="col">Signature du collaborateur</td>
                                   <td scope="col">Signature du responsable hiérarchique</td>

                               </tr>
                           </thead>
                           <tbody>
                               <tr>
                                   <td scope="row">------------------------------- </td>
                                   <td>------------------------------------------ -----------</td>

                               </tr>

                           </tbody>
                       </table>





                </div>
            </div>

        </div>
    </div>
    <!-- ==== / Print Area =====-->
</div>
</div>
@endforeach

    <!-- ============ Search UI End ============= -->
    <script src="../../dist-assets/js/plugins/jquery-3.3.1.min.js"></script>
    <script src="../../dist-assets/js/plugins/bootstrap.bundle.min.js"></script>
    <script src="../../dist-assets/js/plugins/perfect-scrollbar.min.js"></script>
    <script src="../../dist-assets/js/scripts/script.min.js"></script>
    <script src="../../dist-assets/js/scripts/sidebar.large.script.min.js"></script>
</body>
</html>
