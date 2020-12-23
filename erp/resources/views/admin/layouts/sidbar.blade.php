<div class="side-content-wrap">
    <div class="sidebar-left open rtl-ps-none" data-perfect-scrollbar="" data-suppress-scroll-x="true">
        <ul class="navigation-left">
            <li class="nav-item" data-item="dashboard"><a class="nav-item-hold" href="#">
                <i class="nav-icon i-Dashboard"></i>
            <span class="nav-text">Tableau borad</span></a>
                <div class="triangle"></div>
            </li>
            <li class="nav-item" data-item="users"><a class="nav-item-hold" href="#"><i class="nav-icon i-Password-shopping
                "></i>
                <span class="nav-text">
                     Gestion des utilisateurs
            </span></a>
                <div class="triangle"></div>
            </li>
            <li class="nav-item" data-item="uikits"><a class="nav-item-hold" href="#"><i class="nav-icon i-Cash-Register
                "></i>
                <span class="nav-text">
                     Gestion de ventes  et Achats
            </span></a>
                <div class="triangle"></div>
            </li>
            <li class="nav-item" data-item="service"><a class="nav-item-hold" href="#"><i class="nav-icon i-Maximize-Window"></i>
                <span class="nav-text">
                     Gestion des Services
            </span></a>
                <div class="triangle"></div>
            </li>
            <li class="nav-item" data-item="extrakits"><a class="nav-item-hold" href="#"> <i class="nav-icon   i-Shop-2
                "></i>
                <span class="nav-text">Gestion de Stock</span></a>
                <div class="triangle"></div>
            </li>
            <li class="nav-item" data-item="apps"><a class="nav-item-hold" href="#"><i class="nav-icon i-Engineering"></i>
                <span class="nav-text">Gestoion RH</span></a>
                <div class="triangle"></div>
            </li>
            <li class="nav-item" data-item="widgets"><a class="nav-item-hold" href="#"><i class="nav-icon i-Computer-Secure"></i><span class="nav-text">Gestion Projet </span></a>
                <div class="triangle"></div>
            </li>
            <li class="nav-item" data-item="part"><a class="nav-item-hold" href="#"><i class="nav-icon i-Gear"></i><span class="nav-text">Parametrage</span></a>
                <div class="triangle"></div>
            </li>
        </ul>
    </div>
    <div class="sidebar-left-secondary rtl-ps-none" data-perfect-scrollbar="" data-suppress-scroll-x="true">
        <!-- Submenu Dashboards-->
        <ul class="childNav" data-parent="dashboard">
            <li class="nav-item"><a href="{{ route('admin.bord') }}"><i class="nav-icon i-Statistic"></i><span class="item-name">Tableau Bord Achats-Ventes</span></a></li>
            <li class="nav-item"><a href="{{route('admin.Ebord')}}"><i class="nav-icon i-MaleFemale"></i><span class="item-name">Tableau Bord Employers</span></a></li>
        </ul>
        <ul class="childNav" data-parent="forms">
            <li class="nav-item"><a href="form.basic.html">
             <i class="nav-icon i-File-Clipboard-Text--Image"></i>
             <span class="item-name">Basic Elements</span></a></li>
        </ul>
        <ul class="childNav" data-parent="apps">
            <li class="nav-item dropdown-sidemenu"><a href=""> <i class="far fa-address-card"></i>
             <span class="item-name">Gestion Employers</span><i class="dd-arrow i-Arrow-Down"></i></a>
                <ul class="submenu">
                    <li><a href="{{ route('gemp.index') }}">Tous employer</a></li>
                    <li><a href="{{ route('gemp.create') }}">Ajouter employer</a></li>
                </ul>
            </li>
            <li class="nav-item"><a href="{{ route('serviices.index') }}"><i class="nav-icon  fas fa-hard-hat"></i><span class="item-name">Gestion Poste  </span></a></li>
            <li class="nav-item"><a href="{{ route('conger.index') }}"> <i class="nav-icon far fa-calendar"></i> <span class="item-name">Gestion Conger</span></a></li>
            <li class="nav-item"><a href="{{ route('attestation.index') }}"><i class="nav-icon  fas fa-file-alt"></i></i><span class="item-name">Gestion Attestation</span></a></li>
            <li class="nav-item"><a href="{{ route('notations.index') }}"> <i class="nav-icon  fas fa-pen-square"></i> </i><span class="item-name">Gestion Notation</span></a></li>

        </ul>
        <ul class="childNav" data-parent="widgets">
             <li class="nav-item"><a href="{{route('Projet.index')}}"><i class="nav-icon fas fa-business-time"></i><span class="item-name">Gestion Projet</span></a></li>
             <li class="nav-item"><a href="{{route('chat.index')}}"><i class="nav-icon fas fa-comments"></i><span class="item-name">Chat </span></a></li>
        </ul>
    <!-- chartjs-->
    <ul class="childNav" data-parent="extrakits">
         <li class="nav-item"><a href="{{route('stockIn.index')}}"><i class="nav-icon  i-Inbox-Into"></i><span class="item-name">Stock Entree</span></a></li>
         <li class="nav-item"><a href="{{route('stockOut.index')}}"><i class="nav-icon i-Inbox-Out"></i><span class="item-name">Stock Sortie</span></a></li>

    </ul>
    <ul class="childNav" data-parent="uikits">
                <li class="nav-item"><a href="{{route('categorie.index')  }}"><i class="nav-icon  fas fa-tag"></i><span class="item-name">Categorie</span></a></li>
                <li class="nav-item"><a href="{{ route('produit.index')}}"><i class="nav-icon  fas fa-shopping-basket"></i><span class="item-name">Produits</span></a></li>
                <li class="nav-item"><a href="{{route('vente.index')}}"><i class="nav-icon fas fa-handshake"></i><span class="item-name">Vente Produit </span></a></li>
                <li class="nav-item"><a href="{{route('clients.index')}}"><i class="nav-icon fas fa-user-friends"></i> <span class="item-name">Clients</span></a></li>
                <li class="nav-item"><a href="{{route('fornisseurs.index')}}"><i class="nav-icon fas fa-user-friends"></i><span class="item-name">Fournisseurs</span></a></li>
                <li class="nav-item"><a href="{{route('achat.index')}}"><i class="nav-icon fas fa-shopping-cart"></i>  <span class="item-name">Achats Produit </span></a></li>
                <li class="nav-item"><a href="{{route('reglementachat.index')}}"><i class="nav-icon i-Money-2"></i>  <span class="item-name">Reglement Achat </span></a></li>
                <li class="nav-item"><a href="{{route('reglementvente.index')}}"><i class="nav-icon i-Money-2"></i>  <span class="item-name">Reglement Vente </span></a></li>

    </ul>
    <ul class="childNav" data-parent="service">

        <li class="nav-item"><a href="{{route('offre.index')}}"> <i class="nav-icon fas fa-tasks"></i><span class="item-name">Services</span></a></li>
        <li class="nav-item"><a href="{{route('vserv.index')}}"> <i class="nav-icon i-Flash-2"></i><span class="item-name">Vendu Servcice </span></a></li>
        <li class="nav-item"><a href="{{route('reglement.index')}}"> <i class="nav-icon i-Money-2"></i><span class="item-name">Reglement Servcice </span></a></li>
        <li class="nav-item"><a href="{{route('facturation.index')}}"><i class="nav-icon i-File"></i><span class="item-name">Facturation Service </span></a></li>
        <li class="nav-item"><a href="{{route('devis.index')}}"><i class="nav-icon i-File"></i><span class="item-name">Devis Service</span></a></li>
</ul>
<ul class="childNav" data-parent="users">

    <li class="nav-item"><a href="{{route('users.index')}}"> <i class="nav-icon fas fa-users"></i><span class="item-name">Utilsateur</span></a></li>

</ul>
    <ul class="childNav" data-parent="part">
        <li class="nav-item"><a href="{{route('parameter.index')}}"><i class="nav-icon  fas fa-info"></i><span class="item-name">Societe information</span></a></li>
    </ul>


    </div>
    <div class="sidebar-overlay"></div>
</div>
