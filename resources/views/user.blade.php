@extends('layout')
@section('title', "Admin : ".$user->name)
@section('styles')
@endsection
@section('scripts')
@endsection
@section('content')
<div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor">
    <!-- begin:: Subheader -->
    <div class="kt-subheader   kt-grid__item" id="kt_subheader">
        <div class="kt-subheader__main">
            <h3 class="kt-subheader__title">
                Utilisateurs </h3>
            <span class="kt-subheader__separator kt-hidden"></span>
            <div class="kt-subheader__breadcrumbs">
                <a href="{{url()->previous() }}" class="kt-subheader__breadcrumbs-home"><i class="flaticon2-shelter"></i></a>
                <span class="kt-subheader__breadcrumbs-separator"></span>
                <a href="{{ url('/dashboard') }}" class="kt-subheader__breadcrumbs-link">
                    General </a>
                <span class="kt-subheader__breadcrumbs-separator"></span>
                <a href="{{ url()->previous() }}" class="kt-subheader__breadcrumbs-link">
                    Utilisateur </a>

                <!-- <span class="kt-subheader__breadcrumbs-link kt-subheader__breadcrumbs-link--active">Active link</span> -->
            </div>
        </div>
        <div class="kt-subheader__toolbar">
            <div class="kt-subheader__wrapper">
                <a href="#" class="btn kt-subheader__btn-primary">
                    Actions &nbsp;

                    <!--<i class="flaticon2-calendar-1"></i>-->
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon kt-svg-icon--sm">
                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                            <rect id="bound" x="0" y="0" width="24" height="24" />
                            <rect id="Rectangle-8" fill="#000000" x="4" y="5" width="16" height="3" rx="1.5" />
                            <path d="M7.5,11 L16.5,11 C17.3284271,11 18,11.6715729 18,12.5 C18,13.3284271 17.3284271,14 16.5,14 L7.5,14 C6.67157288,14 6,13.3284271 6,12.5 C6,11.6715729 6.67157288,11 7.5,11 Z M10.5,17 L13.5,17 C14.3284271,17 15,17.6715729 15,18.5 C15,19.3284271 14.3284271,20 13.5,20 L10.5,20 C9.67157288,20 9,19.3284271 9,18.5 C9,17.6715729 9.67157288,17 10.5,17 Z" id="Combined-Shape" fill="#000000" opacity="0.3" />
                        </g>
                    </svg> </a>
                <div class="dropdown dropdown-inline" data-toggle="kt-tooltip" title="Quick actions" data-placement="left">
                    <a href="#" class="btn btn-icon" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon kt-svg-icon--success kt-svg-icon--md">
                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <polygon id="Shape" points="0 0 24 0 24 24 0 24" />
                                <path d="M5.85714286,2 L13.7364114,2 C14.0910962,2 14.4343066,2.12568431 14.7051108,2.35473959 L19.4686994,6.3839416 C19.8056532,6.66894833 20,7.08787823 20,7.52920201 L20,20.0833333 C20,21.8738751 19.9795521,22 18.1428571,22 L5.85714286,22 C4.02044787,22 4,21.8738751 4,20.0833333 L4,3.91666667 C4,2.12612489 4.02044787,2 5.85714286,2 Z" id="Combined-Shape" fill="#000000" fill-rule="nonzero" opacity="0.3" />
                                <path d="M11,14 L9,14 C8.44771525,14 8,13.5522847 8,13 C8,12.4477153 8.44771525,12 9,12 L11,12 L11,10 C11,9.44771525 11.4477153,9 12,9 C12.5522847,9 13,9.44771525 13,10 L13,12 L15,12 C15.5522847,12 16,12.4477153 16,13 C16,13.5522847 15.5522847,14 15,14 L13,14 L13,16 C13,16.5522847 12.5522847,17 12,17 C11.4477153,17 11,16.5522847 11,16 L11,14 Z" id="Combined-Shape" fill="#000000" />
                            </g>
                        </svg>

                        <!--<i class="flaticon2-plus"></i>-->
                    </a>
                    <div class="dropdown-menu dropdown-menu-fit dropdown-menu-md dropdown-menu-right">

                        <!--begin::Nav-->
                        <ul class="kt-nav">
                            <li class="kt-nav__head">
                                Add anything or jump to:
                                <i class="flaticon2-information" data-toggle="kt-tooltip" data-placement="right" title="Click to learn more..."></i>
                            </li>
                            <li class="kt-nav__separator"></li>
                            <li class="kt-nav__item">
                                <a href="{{ url('/AddProduct/0') }}" class="kt-nav__link">
                                    <i class="kt-nav__link-icon flaticon2-drop"></i>
                                    <span class="kt-nav__link-text">Ajouter Produit</span>
                                </a>
                            </li>
                            <li class="kt-nav__item">
                                <a href="#" data-toggle="modal" data-target="#userModel" class="kt-nav__link">
                                    <i class="kt-nav__link-icon flaticon2-user"></i>
                                    <span class="kt-nav__link-text">Ajouter Utilisateur</span>
                                </a>
                            </li>
                            <li class="kt-nav__item">
                                <a href="#" data-toggle="modal" data-target="#clientModel"  class="kt-nav__link">
                                    <i class="kt-nav__link-icon flaticon2-group"></i>
                                    <span class="kt-nav__link-text">Ajouter Client</span>
                                </a>
                            </li>
                            <li class="kt-nav__item">
                                <a href="#" class="kt-nav__link">
                                    <i class="kt-nav__link-icon flaticon2-new-email"></i>
                                    <span class="kt-nav__link-text">Support Case</span>
                                    <span class="kt-nav__link-badge">
                                        <span class="kt-badge kt-badge--success">5</span>
                                    </span>
                                </a>
                            </li>
                            <li class="kt-nav__separator"></li>
                            <li class="kt-nav__foot">
                                <a class="btn btn-label-brand btn-bold btn-sm" href="#">Upgrade plan</a>
                                <a class="btn btn-clean btn-bold btn-sm" href="#" data-toggle="kt-tooltip" data-placement="right" title="Click to learn more...">Learn more</a>
                            </li>
                        </ul>

                        <!--end::Nav-->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    <div class="kt-content  kt-grid__item kt-grid__item--fluid" id="kt_content">
        <!--Begin::Section-->
        <div class="row">
            <div class="col-xl-12">
                <div class="kt-portlet kt-portlet--height-fluid kt-portlet--mobile ">
                    <div class="kt-portlet__head kt-portlet__head--lg kt-portlet__head--noborder kt-portlet__head--break-sm">
                        <div class="kt-portlet__head-label">
                            <h3 class="kt-portlet__head-title">
                                Utilisateur
                            </h3>
                        </div>
                    </div>
                    <div class="container kt-widget3__item">
                        <div class="kt-widget3__header">
                            <div class="kt-widget3__user-img">
                                <img class="kt-widget3__img" src="./assets/media/users/user1.jpg" alt="">
                            </div>
                            <div class="kt-widget3__info ">
                                <strong  class="kt-font-info kt-widget3__username">
                                    Nom & prénom : {{$user->name}}
                                </strong>

                            <strong class="kt-widget3__status kt-font-info pull-right">
                                nom d'utlisatuer : {{$user->userName}}
                            </strong>
                            </div>
                        </div>
                        <div class="kt-widget3__body">
                            <br>
                            <strong class="kt-widget3__text">
                                N° téléphonne : {{$user->telephone}}
                            </strong >
                            <br><br>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-12">
                <div class="kt-portlet kt-portlet--height-fluid kt-portlet--mobile " style="padding-bottom:20px;">
                    <div class="kt-portlet__head kt-portlet__head--lg" style="margin-bottom: 20px;">
                            <div class="kt-portlet__head-label">
                                <span class="kt-portlet__head-icon">
                                    <i class="kt-font-brand flaticon-list-1"></i>
                                </span>
                                <h3 class="kt-portlet__head-title">
                                    Liste Des transaction
                                </h3>
                            </div>
                    </div>

                    <div class="container kt-portlet__body kt-portlet__body--fit">
                        <!--begin: Datatable -->
                            <div class="table-responsive">
                                <table class="table " id="trasactionTable" >
                                    <thead >
                                        <tr >
                                            <th >Type</th>
                                            <th >Montant</th>
                                            <th >Client (Fournisseur)</th>
                                            <th >Date</th>
                                        </tr>
                                    </thead>
                                    <tbody  >
                                        @foreach($Trasactions as $Trasaction)
                                            <tr >
                                                <td>
                                                @if($Trasaction->idOrder != '0')
                                                    @if($Trasaction->Order != null && $Trasaction->type == "Commande")
                                                        <a href="{{ url('order/'.$Trasaction->idOrder) }}">{{$Trasaction->type.' - '.$Trasaction->Order->hash}}</a>
                                                    @elseif($Trasaction->OrderProvider != null && $Trasaction->type == "Commande d'achat")
                                                        <a href="{{ url('providerDetails/'.$Trasaction->idOrder) }}">{{$Trasaction->type.' - '.$Trasaction->OrderProvider->hash}}</a>
                                                    @else
                                                        Commande a ete supprimé
                                                    @endif
                                                @else
                                                    {{$Trasaction->type}}
                                                @endif
                                               
                                                </td>
                                                <td ><h4>{{abs($Trasaction->amount).',00 DA'}}</h4></td>
                                                    @if($Trasaction->Client != null && $Trasaction->idClient != '0')
                                                        @if($Trasaction->type == "Commande d'achat" ||$Trasaction->type == "Versement Fournisseur")
                                                            <td><a href="{{ url('provider/'.$Trasaction->Provider->id) }}">{{$Trasaction->Provider->name}}</a></td>
                                                        @elseif($Trasaction->type == 'Commande' || $Trasaction->type == 'Versement')
                                                            <td><a href="{{ url('client/'.$Trasaction->Client->id) }}">{{$Trasaction->Client->name}}</a></td>
                                                         @elseif($Trasaction->type == 'Magasin')
                                                            <td><a href="{{ url('store/'.$Trasaction->Client->id) }}">{{$Trasaction->Store->name}}</a></td>
                                                        @endif
                                                    @else
                                                        @if($Trasaction->type == "Commande d'achat")
                                                            <td>aucun fournisseur</td>
                                                        @elseif($Trasaction->type == 'Commande')
                                                            <td>Pas un client</td>
                                                        @else
                                                            <td>well</td>
                                                        @endif
                                                    @endif
                                                <td >{{\Carbon\Carbon::parse($Trasaction->created_at)->format('j - m - Y / h:i')}}</td>

                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        <!--end: Datatable -->
                    </div>
                </div>
            </div>
        </div>
        @if($user->Stock != null)
        <div class="row">
            <div class="col-xl-12">
                <div class="kt-portlet kt-portlet--height-fluid kt-portlet--mobile " style="padding-bottom:20px;">
                    <div class="kt-portlet__head kt-portlet__head--lg" style="margin-bottom: 20px;">
                            <div class="kt-portlet__head-label">
                                <span class="kt-portlet__head-icon">
                                    <i class="kt-font-brand flaticon-list-1"></i>
                                </span>
                                <h3 class="kt-portlet__head-title">
                                    Liste Des Stocks
                                </h3>
                            </div>
                    </div>
                    <div class="container kt-portlet__body kt-portlet__body--fit">
                        <!--begin: Datatable -->
                            <div class="table-responsive">
                                <table class="table " id="stockTable" >
                                    <thead >
                                        <tr >
                                            <th data-field="RecordID" class="kt-datatable__cell kt-datatable__cell--sort">
                                                <span >
                                                <label class="kt-checkbox kt-checkbox--single kt-checkbox--all kt-checkbox--solid">Type</span></th>
                                            <th data-field="ShipName" data-autohide-disabled="false" class="kt-datatable__cell kt-datatable__cell--sort">
                                                <span >Ancien quantité</span>
                                            </th>
                                            <th data-field="ShipDate" class="kt-datatable__cell kt-datatable__cell--sort"><span >Nouvelle quantité</span></th>
                                            <th data-field="Status" class="kt-datatable__cell kt-datatable__cell--sort"><span >Quantité</span></th>
                                            <th data-field="Type" class="kt-datatable__cell kt-datatable__cell--sort"><span >Servir par</span></th>
                                            <th data-field="Type" class="kt-datatable__cell kt-datatable__cell--sort"><span >Date et heur</span></th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody  >
                                        @foreach($user->Stock as $stock)
                                            <tr data-row="0" id="tr'.{{$stock->id}}.'" >
                                                <td class="kt-datatable__cell" data-field="RecordID">
                                                    <strong >
                                                        {{$stock->type}}
                                                    </strong>
                                                </td>
                                                <td >
                                                    <div class="kt-user-card-v2__details"> 
                                                        <input class="form-control"   type="text" value="{{$stock->oldQty}}"  disabled="disabled">
                                                    </div>
                                                </td>
                                                <td >
                                                    <div class="kt-user-card-v2__details"> 
                                                        <input class="form-control"   type="text" value="{{$stock->newQty}}"  disabled="disabled">
                                                    </div>
                                                </td>
                                                <td >
                                                    <div class="kt-user-card-v2__details"> 
                                                        <input class="form-control"  type="text" value="{{$stock->Qty}}"  disabled="disabled">
                                                    </div>
                                                </td>
                                                <td >
                                                    <span >
                                                        <div class="kt-user-card-v2">                           
                                                            <div class="kt-user-card-v2__pic">                              
                                                                <div class="kt-badge kt-badge--xl kt-badge--brand">{{($stock->user->name)[0]}}</div>  
                                                            </div>                          
                                                            <div class="kt-user-card-v2__details">                              
                                                                <a class="kt-user-card-v2__name" href="#">{{$stock->user->name}}</a>  
                                                                <span class="kt-user-card-v2__desc">Admin</span>        
                                                            </div>                      
                                                        </div>
                                                    </span>
                                                </td>
                                                <td class="kt-datatable__cell" data-field="RecordID">
                                                    <strong >
                                                        {{\Carbon\Carbon::parse($stock->created_at)->format('j - m - Y / h:i')}}
                                                    </strong>
                                                </td>
                                                
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        <!--end: Datatable -->
                    </div>
                </div>
            </div>
        </div>
        @endif
        @if($user->productUpdate != null)
        <div class="row">
            <div class="col-xl-12">
                <div class="kt-portlet kt-portlet--height-fluid kt-portlet--mobile " style="padding-bottom:20px;">
                    <div class="kt-portlet__head kt-portlet__head--lg" style="margin-bottom: 20px;">
                            <div class="kt-portlet__head-label">
                                <span class="kt-portlet__head-icon">
                                    <i class="kt-font-brand flaticon-list-1"></i>
                                </span>
                                <h3 class="kt-portlet__head-title">
                                    Liste Des Mises a jours
                                </h3>
                            </div>
                    </div>
                    <div class="container kt-portlet__body kt-portlet__body--fit">
                        <!--begin: Datatable -->
                            <div class="table-responsive">
                                <table class="table " id="updateTable" >
                                    <thead >
                                        <tr >
                                            <th data-field="RecordID" class="kt-datatable__cell kt-datatable__cell--sort">
                                                <span >
                                                <label class="kt-checkbox kt-checkbox--single kt-checkbox--all kt-checkbox--solid">Type</span></th>
                                            <th data-field="ShipName" data-autohide-disabled="false" class="kt-datatable__cell kt-datatable__cell--sort">
                                                <span >Produit</span>
                                            </th>
                                            
                                            <th data-field="Type" class="kt-datatable__cell kt-datatable__cell--sort"><span >Servir par</span></th>
                                            <th data-field="Type" class="kt-datatable__cell kt-datatable__cell--sort"><span >Date et heur</span></th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody  >
                                        @foreach($user->productUpdate as $productUpdate)
                                            @if($productUpdate->type=="add")
                                                <?php 
                                                    $class = "table-primary"; 
                                                    $type  = "Ajouter";
                                                ?>
                                            @elseif($productUpdate->type=="update")
                                                <?php 
                                                    $class = "table-success"; 
                                                    $type  = "Modifier";
                                                ?>
                                            @elseif($productUpdate->type=="remove")
                                                <?php 
                                                    $class = "table-danger"; 
                                                    $type  = "Supprimé";
                                                ?>
                                            @endif
                                            @if($productUpdate->oldProduct != null)
                                                <?php 
                                                    $oldProduct = json_decode($productUpdate->oldProduct,true);
                                                ?>
                                            @endif
                                            @if($productUpdate->newProduct != null)
                                                <?php 
                                                    $newProduct = json_decode($productUpdate->newProduct,true);
                                                ?>
                                            @endif
                                            <tr data-row="0" id="tr'.{{$productUpdate->id}}.'" class="{{$class}}">
                                                <td class="kt-datatable__cell center" data-field="RecordID" >
                                                    <strong >
                                                        {{$type}}
                                                    </strong>
                                                </td>
                                                <td class="kt-datatable__cell center" data-field="RecordID">
                                                    {{$newProduct['bareCode'].' - '.$newProduct['name'].' - '.$newProduct['priceA'].' - '.$newProduct['priceV'].' - '.$newProduct['descp']}}<br>
                                                    @if($productUpdate->type!="add")
                                                    {{$oldProduct['bareCode'].' - '.$oldProduct['name'].' - '.$oldProduct['priceA'].' - '.$oldProduct['priceV'].' - '.$oldProduct['descp']}}
                                                    @endif
                                                </td>
                                                
                                                <td >
                                                    <span >
                                                        <div class="kt-user-card-v2">                           
                                                            <div class="kt-user-card-v2__pic">                              
                                                                <div class="kt-badge kt-badge--xl kt-badge--danger">{{($stock->user->name)[0]}}</div>  
                                                            </div>                          
                                                            <div class="kt-user-card-v2__details">                              
                                                                <a class="kt-user-card-v2__name" href="#">{{$stock->user->name}}</a>  
                                                                <span class="kt-user-card-v2__desc">Admin</span>        
                                                            </div>                      
                                                        </div>
                                                    </span>
                                                </td>
                                                <td class="kt-datatable__cell" data-field="RecordID">
                                                    <strong >
                                                        {{\Carbon\Carbon::parse($productUpdate->created_at)->format('j - m - Y / h:i')}}
                                                    </strong>
                                                </td>
                                                
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        <!--end: Datatable -->
                    </div>
                </div>

            </div>
        </div>
        @endif

        <!--End::Section-->
    </div>
    <!--begin::Modal-->
    <div class="modal fade" id="kt_modal_5" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modifier L'utilisateur</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <input type="hidden" class="form-control" id="id">
                        <div class="form-group" >
                            <label for="recipient-name" class="form-control-label">User Name :</label>
                            <input type="text" class="form-control" id="username"  disabled="disabled">
                        </div>
                        <div class="form-group" >
                            <label for="recipient-name" class="form-control-label">Nom & Prénom :</label>
                            <input type="text" class="form-control" id="name"  >
                        </div>
                        <div class="form-group" >
                            <label for="recipient-name" class="form-control-label">Mote de pass :</label>
                            <input type="text" class="form-control" id="password"  value="******">
                        </div>
                        <div class="form-group" >
                            <label for="recipient-name" class="form-control-label">Téléphonne :</label>
                            <input type="text" class="form-control" id="phone"  >
                        </div>
                        
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" id="closeUserUpdateModal" data-dismiss="modal">Close</button>
                    <button type="button" id="updateUser" class="btn btn-primary">Ajouter</button>
                </div>
            </div>
        </div>
    </div>

    <!--end::Modal-->

<script type="text/javascript">
    $(document).ready(function() {
        $('#stockTable').DataTable().order( [ 5, 'desc' ] ).draw();
        $('#trasactionTable').DataTable().order( [ 3, 'desc' ] ).draw();
        $('#updateTable').DataTable().order( [ 3, 'desc' ] ).draw();
    });
</script>
<script type="text/javascript">
    function delete_User(id) {
            swal.fire({
                title: 'Êtes-vous sûr?',
                text: "Vous ne pourrez pas revenir en arrière!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Oui, supprimez-le!',
                cancelButtonText: 'Non, annulez!',
                reverseButtons: true
            }).then(function(result){
                if (result.value) {
                    $.ajax({
                      type: "POST",
                      url: "{{URL::to('/deleteUser') }}",
                      dataType: "json",
                      data:{'id':id},
                      headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                      success:function(data){
                        if(data){
                            swal.fire(
                                'Eroor',
                                "une erreur s'est produite veuillez réessayer svp.",
                                'error'
                            )
                        }else{
                            $('#tr'+id).remove();
                            swal.fire(
                                'Supprimé!',
                                "L'utilisateur a été supprimé.",
                                'success'
                            )
                        }
                      }

                    })
                    
                    // result.dismiss can be 'cancel', 'overlay',
                    // 'close', and 'timer'
                } else if (result.dismiss === 'cancel') {
                    swal.fire(
                        'Annulé',
                        'Votre produit est en sécurité :)',
                        'error'
                    )

                }
            });
    }

    $('.editUser').on('click',function(){
        $('#id').val("");
        $('#username').val("");
        $('#name').val("");
        $('#phone').val("");
        $('#id').val($(this).data('id'));
        $('#username').val($(this).data('username'));
        $('#name').val($(this).data('name'));
        $('#phone').val($(this).data('telephone'));
    })
        
    $('#updateUser').on('click',function () {
        var id        = $('#id').val();
        var password  = $('#password').val();
        var name      = $('#name').val();
        var telephone = $('#phone').val();
        if ((password.length < 4) || (name.length == 0)||(telephone.length == 0)) {
            swal.fire(
                'Eroor',
                "une erreur s'est produite veuillez vérifier tout les champ.",
                'error'
            )
        }else{
            $.ajax({
              type: "POST",
              url: "{{URL::to('/editUser') }}",
              dataType: "json",
              data:{  
                'id'        :id,
                'password'  :password,
                'name'      :name,
                'telephone' :telephone
                },
              headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
              success:function(data){
                if(data){
                    swal.fire(
                        'Eroor',
                        "une erreur s'est produite veuillez réessayer svp.",
                        'error'
                    )
                }else{
                    $('#closeUserUpdateModal').click();
                    swal.fire(
                        'Modifier!',
                        "l'Utilisateur a été Modifier.",
                        'success'
                    )

                }
              }

            })
        }
        
    })

    
</script>
@endsection
