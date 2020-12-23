<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bon Commande</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <style>
        #invoice{
    padding: 30px;
}

.invoice {
    position: relative;
    background-color: #FFF;
    min-height: 680px;
    padding: 15px
}

.invoice header {
    padding: 10px 0;
    margin-bottom: 20px;
    border-bottom: 1px solid #3989c6
}

.invoice .company-details {
    text-align: right
}

.invoice .company-details .name {
    margin-top: 0;
    margin-bottom: 0
}

.invoice .contacts {
    margin-bottom: 20px
}

.invoice .invoice-to {
    text-align: left
}

.invoice .invoice-to .to {
    margin-top: 0;
    margin-bottom: 0
}

.invoice .invoice-details {
    text-align: right
}

.invoice .invoice-details .invoice-id {
    margin-top: 0;
    color: #3989c6
}

.invoice main {
    padding-bottom: 50px
}

.invoice main .thanks {
    margin-top: -100px;
    font-size: 2em;
    margin-bottom: 50px
}

.invoice main .notices {
    padding-left: 6px;
    border-left: 6px solid #3989c6
}

.invoice main .notices .notice {
    font-size: 1.2em
}

.invoice table {
    width: 100%;
    border-collapse: collapse;
    border-spacing: 0;
    margin-bottom: 20px
}

.invoice table td,.invoice table th {
    padding: 15px;
    background: #eee;
    border-bottom: 1px solid #fff
}

.invoice table th {
    white-space: nowrap;
    font-weight: 400;
    font-size: 16px
}

.invoice table td h3 {
    margin: 0;
    font-weight: 400;
    color: #3989c6;
    font-size: 1.2em
}

.invoice table .qty,.invoice table .total,.invoice table .unit {
    text-align: right;
    font-size: 1.2em
}

.invoice table .no {
    color: #fff;
    font-size: 1.6em;
    background: #3989c6
}

.invoice table .unit {
    background: #ddd
}

.invoice table .total {
    background: #3989c6;
    color: #fff
}

.invoice table tbody tr:last-child td {
    border: none
}

.invoice table tfoot td {
    background: 0 0;
    border-bottom: none;
    white-space: nowrap;
    text-align: right;
    padding: 10px 20px;
    font-size: 1.2em;
    border-top: 1px solid #aaa
}

.invoice table tfoot tr:first-child td {
    border-top: none
}

.invoice table tfoot tr:last-child td {
    color: #3989c6;
    font-size: 1.4em;
    border-top: 1px solid #3989c6
}

.invoice table tfoot tr td:first-child {
    border: none
}

.invoice footer {
    width: 100%;
    text-align: center;
    color: #777;
    border-top: 1px solid #aaa;
    padding: 8px 0
}

@media print {
    .invoice {
        font-size: 11px!important;
        overflow: hidden!important
    }

    .invoice footer {
        position: absolute;
        bottom: 10px;
        page-break-after: always
    }

    .invoice>div:last-child {
        page-break-before: always
    }
}


    </style>
</head>
<body>

<div id="invoice">
    <div class="invoice overflow-auto">
        <div style="min-width: 600px">
            <header>
                @foreach ($parameter as $os)
                <div class="row">
                    <div class="col">

             <img src="{{ public_path() . $os->logo }}" alt="photo" style="width: 80px; height:80px;"
             />

                    </div>
                    <div class="col company-details">
                        <h2 class="name">
                            <a target="_blank" href="">
                                {{$os->nom_societe}}
                            </a>
                        </h2>
                        <div>{{$os->adresse}}-ville:{{$os->ville }}-{{$os->cp}}</div>
                        <div>{{$os->GSM}}</div>
                        <div>{{$os->email}}</div>
                    </div>
                @endforeach


                </div>
            </header>
            <main>



                     <div class="row contacts">
                    <div class="col invoice-to">
                        <div class="text-gray-light">Bon de commande  Fournisseurs :</div>
                        <h2 class="to">  {{$achats->nom_f}}       </h2>
                        <div class="address"> {{$achats->adresse_f }}     </div>
                        <div class="email"><a href="mailto:">
                            {{$achats->email}}
                        </a></div>
                    </div>


                    <div class="col invoice-details">
                        <h1 class="invoice-id"> Refrenece code  : {{$nocomd->no_commande}} </h1>

                        <div class="date">Date Commande : {{$today}} </div>

                        <div class="date">Fin  Date Comamande :{{$dor}} </div>
                    </div>
                </div>


                <table border="0" cellspacing="0" cellpadding="0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th class="text-left">Quantite</th>
                            <th class="text-right">Description</th>
                            <th class="text-right">Prix Unitaire</th>
                            <th class="text-right">TOTAL</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($achatProd as $item)
                        <tr>
             <td class="no">{{$item->no_commande}}</td>
            <td class="text-left"><h3>
                  {{$item->name}}
             </h3>
                  {{$item->remarque}}
             </td>
                            <td class="unit">
                              {{ $item->prix  }} DH
                            </td>
                            <td class="qty">{{$item->qte}}</td>
                            <td class="total">{{$item->total}} DH</td>
                        </tr>

                    @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="2"></td>
                            <td colspan="2">Sous Total </td>
                            <td>-------</td>
                        </tr>
                        <tr>
                            <td colspan="2"></td>
                            <td colspan="2">TVA </td>
                            <td>--------</td>
                        </tr>
                        <tr>
                            <td colspan="2"></td>
                            <td colspan="2">Global TOTAL</td>
                            <td>-----------</td>
                        </tr>
                    </tfoot>
                </table>
                <div class="thanks">Merci !</div>
                <div class="notices">
                    <div>Remarque :</div>
                    <div class="notice">
                     Envoyer Trois Copies de votre Facture <br>
                    </div>
                </div>
            </main>
            <footer>

            </footer>
        </div>
        <!--DO NOT DELETE THIS div. IT is responsible for showing footer always at the bottom-->
        <div></div>
    </div>
</div>


</body>
</html>
