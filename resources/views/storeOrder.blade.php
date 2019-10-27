@extends('layout')
@section('title', "Commandes")
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
                Commandes </h3>
            <span class="kt-subheader__separator kt-hidden"></span>
            <div class="kt-subheader__breadcrumbs">
                <a href="{{ url()->previous() }}" class="kt-subheader__breadcrumbs-home"><i class="flaticon2-shelter"></i></a>
                <span class="kt-subheader__breadcrumbs-separator"></span>
                <a href="{{ url('/dashboard') }}" class="kt-subheader__breadcrumbs-link">
                    General </a>
                <span class="kt-subheader__breadcrumbs-separator"></span>
                <a href="{{ url()->previous()}}" class="kt-subheader__breadcrumbs-link">
                    Commandes </a>

                <!-- <span class="kt-subheader__breadcrumbs-link kt-subheader__breadcrumbs-link--active">Active link</span> -->
            </div>
        </div>
        <!-- end:: Subheader -->
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
<!--end::Nav menus-->
    <div class="kt-content  kt-grid__item kt-grid__item--fluid" id="kt_content">
        <!--Begin::Section-->
        <div class="row ">
                <div class="col ">
                    @if(isset($err) && $err)
                        <div class="alert alert-danger" role="alert">une erreur s'est produite veuillez réessayer</div>
                    @endif
                    <div class="kt-portlet kt-portlet--height-fluid kt-portlet--mobile header-command" style="background-image: url({{ asset('assets/media/bg/bg-6.jpg') }}); background-position: center center; background-repeat:no-repeat; background-size:cover;">
                        <div class="kt-portlet__head kt-portlet__head--lg kt-portlet__head--noborder kt-portlet__head--break-sm">
                           
                        </div>

                        <div class="container kt-widget3__item">
                            <div class="kt-widget3__header">
                                <div class="kt-widget3__user-img">
                                        <div class="form-group row">
                                            <div class="col-lg-9 col-xl-6">
                                                <div class="kt-avatar kt-avatar--outline kt-avatar--circle" id="kt_apps_user_add_avatar">
                                                    <div class="kt-avatar__holder" style="background-image: url({{ asset('image/store/'.$orders[0]->Order->Store->img) }})"></div>
                                                
                                                    <span class="kt-avatar__cancel" data-toggle="kt-tooltip" title="" data-original-title="Cancel avatar">
                                                        <i class="fa fa-times"></i>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                </div>


                                <div class="kt-user-card__name">
                                 <p><strong  class="commande-header-profil name-st">
                                     {{$orders[0]->Order->Store->name}}
                                    </strong></p>

                                    <p><strong  class="commande-header-profil">
                                    {{$orders[0]->Order->Store->telephonne}}
                                    </strong></p>

                                    <p><strong class="commande-header-profil">
                                    {{$orders[0]->Order->Store->adress}}
                                    </strong></p>

                                </div>

                                <div class="kt-widget3__status kt-font-info pull-right">
                                    <?php /* $disabled = ""; ?>
                                <div class="client-btn-st">
                                    
                                    @if(0 == (int)$store->credit )
                                        <?php $disabled = "disabled"; ?>
                                    @endif
                                    <button type="button" data-toggle="modal" data-target="#versModal" data-credit="{{$store->credit}}" data-id="{{$store->id}}" id="btnVerse" class="btn btn-brand" {{$disabled}}>
                                        <i class="flaticon-coins"></i> Verser
                                    </button>
                                     
                                </div>
                                <?php */ ?>
                                <div class="client-st">
                                    <p class="command-prix total">
                                     Crédit : <strong>  {{$orders[0]->Order->Store->credit}} ,00  DA </strong>
                                    </p></div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

        </div>
            @if ($errors->any())
                <div class="alert alert-danger">
                    Une erreur est survenu veuillez réessayer svp!
                </div>
            @endif
            @if (\Session::has('err'))
                @if(\Session::get('err'))
                    <div class="alert alert-danger">
                        Une erreur est survenu veuillez réessayer svp!
                    </div>
                @else
                    <div class="alert alert-success">
                        La commande a été bien enregistré
                    </div>
                @endif
            @endif 
        <!-- begin table -->
        <div class="row">
            <div class="col">
                <div class="kt-portlet kt-portlet--height-fluid kt-portlet--mobile">
                    
                    <div class="kt-portlet__head kt-portlet__head--lg providers-st">
                                    <div class="kt-portlet__head-label">
                                        <span class="kt-portlet__head-icon">
                                            <i class="kt-font-brand flaticon-list-1"></i>
                                        </span>
                                        <h3 class="kt-portlet__head-title">
                                            Commande Détaillé
                                        </h3>
                                    </div>
                                    <div class="kt-portlet__head-toolbar">
                                        <div class="kt-portlet__head-wrapper ">
                                            <div class="kt-portlet__head-actions">
                                                <?php $disabled = ""; ?>
                                @if(0 == (int)$orders[0]->Order->Credit->staid )
                                    <?php $disabled = "disabled"; ?>
                                @endif
                                <button type="button" data-toggle="modal" data-target="#versOrder" data-order="{{$orders[0]->Order->id}}"  data-total="{{$orders[0]->Order->total}}" data-staid="{{$orders[0]->Order->Credit->staid}}" data-paid="{{$orders[0]->Order->Credit->paid}}"  data-id="{{$orders[0]->Order->Store->id}}" class="btn btn-brand" id="btnPaye" {{$disabled}}>
                                    <i class="flaticon-coins"></i>Payé la commande
                                </button>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                    <div class="container table-responsive" style="padding-top: 20px;">
                        <!--begin: Datatable -->
                                <table class="table table-striped table-bordered "  id="userTable"  style="width:100%">
                                    <thead >
                                        <tr >
                                            <th data-field="ShipName" data-autohide-disabled="false" class="kt-datatable__cell kt-datatable__cell--sort">
                                                <span >#</span>
                                            </th>
                                            <th data-field="ShipName" data-autohide-disabled="false" class="kt-datatable__cell kt-datatable__cell--sort">
                                                <span >Nom de produit</span>
                                            </th>
                                            <th data-field="ShipName" data-autohide-disabled="false" class="kt-datatable__cell kt-datatable__cell--sort">
                                                <span >Prix d'uniter</span>
                                            </th>
                                            <th data-field="ShipDate" class="kt-datatable__cell kt-datatable__cell--sort"><span >Quantité</span></th>
                                            <th data-field="ShipDate" class="kt-datatable__cell kt-datatable__cell--sort"><span >Total</span></th>
                                            <th data-field="ShipName" data-autohide-disabled="false" class="kt-datatable__cell kt-datatable__cell--sort">
                                                <span >Prix de vente</span>
                                            </th>
                                            <th data-field="ShipName" data-autohide-disabled="false" class="kt-datatable__cell kt-datatable__cell--sort">
                                                <span >Total vente</span>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody  > <?php $totalVente = 0; ?>
                                        @foreach($orders as $order)
                                            <tr data-row="0" id="tr'.{{$order->id}}.'" style="left: 0px;">
                                                <td class="kt-datatable__cell" data-field="RecordID">
                                                    <span >
                                                        <label><strong>
                                                        @if($order->Product == null)
                                                            le produit a été supprimé
                                                        @else
                                                            {{$order->Product->bareCode}}
                                                        @endif
                                                        </strong></label>
                                                    </span>
                                                </td>
                                                <td class="kt-datatable__cell" data-field="RecordID">
                                                    <span >
                                                        <label><strong>
                                                        @if($order->Product == null)
                                                            le produit a été supprimé
                                                        @else
                                                            {{$order->Product->name}}
                                                        @endif
                                                        </strong></label>
                                                    </span>
                                                </td>
                                                <td class="kt-datatable__cell" data-field="RecordID">
                                                    <span >
                                                       
                                                            <label ><strong>{{$order->priceV}},00 DA</strong></label>
                                                    </span>
                                                </td>
                                                <td data-field="ShipDate" class="kt-datatable__cell" style="text-align: center;">
                                                    <span >
                                                        <span class="kt-font-bold">{{$order->qty}} </span>
                                                    </span>
                                                </td>
                                                <td class="kt-datatable__cell" >
                                                    <span >
                                                       <strong>{{$order->priceV*$order->qty.',00  DA'}} </strong>
                                                    </span>
                                                </td>
                                                <td data-field="ShipDate" class="kt-datatable__cell" style="text-align: center;">
                                                    <span >
                                                        @if($order->Product->StoreProduct != null)
                                                        <span class="kt-font-bold">{{$order->Product->StoreProduct->priceV.',00  DA'}} </span>
                                                        @else
                                                            <span class="kt-font-bold">00  DA </span>
                                                        @endif
                                                    </span>
                                                </td>
                                                <td data-field="ShipDate" class="kt-datatable__cell" style="text-align: center;">
                                                    <span >
                                                        @if($order->Product->StoreProduct != null)
                                                        <span class="kt-font-bold">{{(int)$order->Product->StoreProduct->priceV*(int)$order->qty.',00  DA'}} </span>
                                                        <?php $totalVente = $totalVente + (((int)$order->Product->StoreProduct->priceV)*(int)$order->qty); ?>
                                                        @else
                                                            <span class="kt-font-bold">00  DA </span>
                                                        @endif
                                                    </span>
                                                </td>
                                                
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
</div>
                                <!--begin:: Widgets/Applications/User/Profile3-->
                                <div class="container">
										<div class="kt-portlet__body">
											<div class="kt-widget kt-widget--user-profile-3">
												<div class="kt-widget__bottom">
													<div class="kt-widget__item">
														<div class="kt-widget__icon">
															<i class="la la-money"></i>
														</div>
														<div class="kt-widget__details">
															<span class="kt-widget__title">Payé</span>
															<span class="kt-widget__value">{{$orders[0]->Order->Credit->paid}},00<span> DA</span> </span>
														</div>
													</div>
													<div class="kt-widget__item">
														<div class="kt-widget__icon">
															<i class="la la-dollar"></i>
														</div>
														<div class="kt-widget__details">
															<span class="kt-widget__title">Restant</span>
                                                            <span class="kt-widget__value">{{$orders[0]->Order->Credit->staid}},00<span> DA</span></span>
														</div>
													</div>
													<div class="kt-widget__item">
														<div class="kt-widget__icon">
															<i class="flaticon-list"></i>
														</div>
														<div class="kt-widget__details">
															<span class="kt-widget__title">Total de la commande </span>
                                                            <span class="kt-widget__value">{{$orders[0]->Order->total}},00<span>  DA</span></span>
														</div>
                                                    </div>
                                                    <div class="kt-widget__item">
														<div class="kt-widget__icon">
															<i class="flaticon-business"></i>
														</div>
														<div class="kt-widget__details">
															<span class="kt-widget__title">Total du magasin</span>
                                                            <span class="kt-widget__value">{{$totalVente}},00<span>  DA</span></span>
														</div>
                                                    </div>
                                                    <div class="kt-widget__item">
														<div class="kt-widget__icon">
															<i class="flaticon-confetti"></i>
														</div>
														<div class="kt-widget__details">
															<span class="kt-widget__title">Bénéfice</span>
															<span class="kt-widget__value">{{(int)$totalVente-(int)$orders[0]->Order->total}},00<span>  DA</span></span>
														</div>
													</div>
													
												</div>
											</div>
										</div>
                                </div>

                        <!--end: Datatable -->
                    
                </div>
            </div>
        </div>

        <!--End::Section-->
    </div>
    <!--begin::Modal-->
    <div class="modal fade" id="kt_modal_5" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modifier le Client</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <input type="hidden" class="form-control" id="id">
                        <div class="form-group" >
                            <label for="recipient-name" class="form-control-label">Nom & Prénom :</label>
                            <input type="text" class="form-control" id="name"  >
                        </div>
                        <div class="form-group" >
                            <label for="recipient-name" class="form-control-label">Adress :</label>
                            <input type="text" class="form-control" id="adress"  >
                        </div>
                        <div class="form-group" >
                            <label for="recipient-name" class="form-control-label">Téléphonne :</label>
                            <input type="text" class="form-control" id="telephonne"  >
                        </div>
                        
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" id="closeClientUpdateModal" data-dismiss="modal">Close</button>
                    <button type="button" id="updateClient" class="btn btn-primary">Ajouter</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="versModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Versement</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    </button>
                </div>
                <form method="POST" action="{{ url('/addCreditStore') }}" id="addCreditstoreForm">
                    <div class="modal-body">



                            @csrf
                            <input type="hidden" id="idStore" name="idStore">
                            <div class="form-group" >
                                <label for="recipient-name" class="form-control-label">Credit:</label>
                                <input type="text" class="form-control" id="credit" name="credit"  disabled="disabled">
                            </div>
                            <div class="form-group" >
                                <label for="recipient-name" class="form-control-label">Versement :</label>
                                <input type="number" class="form-control" min="0" max="{{$orders[0]->Order->Store->credit}}" id="verse" name="verse"  required="required">
                            </div>
                            <div class="form-group" >
                                <label for="recipient-name" class="form-control-label">Reste :</label>
                                <input type="text" class="form-control" id="rest"  name="rest"  disabled="disabled">
                            </div>
                            
                        
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" id="closeUserUpdateModal" data-dismiss="modal">Close</button>
                        <input type="submit"  class="btn btn-primary" value="Ajouter"> 
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="versOrder" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Versement</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    </button>
                </div>
                <form method="POST" action="{{ url('/paidOrderStore') }}" id="addCreditstoreForm">
                    <div class="modal-body">
                            @csrf
                            <input type="hidden" id="storeID" name="storeID">
                            <input type="hidden" id="idOrder" name="idOrder">
                            <div class="form-group" >
                                <label for="recipient-name" class="form-control-label">Total:</label>
                                <input type="text" class="form-control" id="totalOrder" name="totalOrder"  disabled="disabled">
                            </div>
                            <div class="form-group" >
                                <label for="recipient-name" class="form-control-label">Payé  :</label>
                                <input type="text" class="form-control" id="paidOrder"  name="paidOrder"  disabled="disabled">
                            </div>
                            <div class="form-group" >
                                <label for="recipient-name" class="form-control-label">Reste :</label>
                                <input type="text" class="form-control" id="restOrder"  name="restOrder"  disabled="disabled">
                            </div>
                            <div class="form-group" >
                                <label for="recipient-name" class="form-control-label">Versement :</label>
                                <input type="number" class="form-control" min="0" max="{{$orders[0]->Order->total}}" id="verseOrder" name="verseOrder"  required="required">
                            </div>
                            <div class="form-group" >
                                <label for="recipient-name" class="form-control-label">Total Reste :</label>
                                <input type="text" class="form-control" id="restTotal"  name="restTotal"  disabled="disabled">
                            </div>
                            
                        
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" id="closeUserUpdateModal" data-dismiss="modal">Close</button>
                        <input type="submit"  class="btn btn-primary" value="Ajouter"> 
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!--end::Modal-->

<script type="text/javascript">
    $(document).ready(function() {
        $('#userTable').DataTable();
    });
</script>
<script type="text/javascript">
    function delete_Client(id) {
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
                      url: "{{URL::to('/deleteClient') }}",
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
                                "Le Client a été supprimé.",
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

    $('#btnVerse').on('click',function () {
        $('#credit').val($(this).data('credit'))
        $('#rest').val($(this).data('credit'))
        $('#idStore').val($(this).data('id'))
    })

    $('#verse').on('mouseut, keyup ,change',function () {
        var tc = $('#credit').val();
        var v  = parseFloat($('#verse').val());
        var t  = parseFloat(tc);
        if ($('#verse').val() == "") {
            $('#verse').val("0");
        }else
        if(v>t){
            $('#verse').val(t);
            $('#rest').val(0);
        }else{
            $('#rest').val(t-v);
        }
    })

    $('#btnPaye').on('click',function () {
        $('#totalOrder').val($(this).data('total'))
        $('#restOrder').val($(this).data('staid'))
        $('#paidOrder').val($(this).data('paid'))
        $('#restTotal').val($(this).data('staid'))
        $('#storeID').val($(this).data('id'))
        $('#idOrder').val($(this).data('order'))
    })

    $('#verseOrder').on('mouseut, keyup ,change',function () {
        var tc = $('#restOrder').val();
        var v  = parseFloat($('#verseOrder').val());
        var t  = parseFloat(tc);
        if ($('#verseOrder').val() == "") {
            $('#verseOrder').val("0");
        }else
        if(v>t){
            $('#verseOrder').val(t);
            $('#restTotal').val(0);
        }else{
            $('#restTotal').val(t-v);
        }
    })

    
</script>
@endsection
