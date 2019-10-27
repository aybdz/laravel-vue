@extends('layout')
@section('title', "Fournisseurs")
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
                Fournisseurs </h3>
            <span class="kt-subheader__separator kt-hidden"></span>
            <div class="kt-subheader__breadcrumbs">
                <a href="{{ url('/providers') }}" class="kt-subheader__breadcrumbs-home"><i class="flaticon2-shelter"></i></a>
                <span class="kt-subheader__breadcrumbs-separator"></span>
                <a href="{{ url('/dashboard') }}" class="kt-subheader__breadcrumbs-link">
                    General </a>
                <span class="kt-subheader__breadcrumbs-separator"></span>
                <a href="{{ url()->previous() }}" class="kt-subheader__breadcrumbs-link">
                    Fournisseur </a>

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

        <!-- begin:: Content -->
                        <div class="kt-content  kt-grid__item kt-grid__item--fluid" id="kt_content">
                            <div class="kt-portlet kt-portlet--mobile">
                                <div class="kt-portlet__head kt-portlet__head--lg providers-st">
                                    <div class="kt-portlet__head-label">
                                        <span class="kt-portlet__head-icon">
                                            <i class="kt-font-brand flaticon2-shopping-cart-1"></i>
                                        </span>
                                        <h3 class="kt-portlet__head-title">
                                            Fournisseurs
                                        </h3>
                                    </div>
                                    <div class="kt-portlet__head-toolbar">
                                        <div class="kt-portlet__head-wrapper " style="margin-right: 10px;">
                                            <div class="kt-portlet__head-actions" >
                                                <a href="{{ url('/provider/0') }}" class="btn btn-secondary" >
                                                    <i class="fa flaticon-list-1"></i>
                                                    details d'achat ( sans fournisseurs) 
                                                </a>
                                            </div>
                                        </div> 

                                        <div class="kt-portlet__head-wrapper ">
                                            <div class="kt-portlet__head-actions">
                                                <a href="#" rel="nofollow" data-toggle="modal" data-target="#addProvider" class="btn btn-small btn-brand">
                                                    <i class="la la-plus"></i>
                                                    Ajouter Fournisseurs
                                                </a>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="kt-portlet__body table-responsive">

                                    <!--begin: Datatable -->
                                    <table class="table table-striped- table-bordered table-hover table-checkable" id="productTable">
                                        <thead>

                                            <tr>
                                                <th >Nom</th>
                                                <th >Téléphonne</th>
                                                <th >Adress</th>
                                                <th >status</th>
                                                <th >Crédit</th>
                                                <th >Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($providers as $provider)
                                                <tr id="tr'.{{$provider->id}}.'">
                                                    <td ><a href="{{ url('/provider/'.$provider->id) }}">
                                                        <div class="kt-user-card-v2"> 
                                                            <div class="kt-user-card-v2__pic">                                
                                                                <img alt="photo" src=" {{ asset('image/provider/'.$provider->img) }}">                            
                                                            </div>                            
                                                            <div class="kt-user-card-v2__details">                                
                                                                <div class="kt-user-card-v2__name">{{$provider->name}}
                                                                </div>                                
                                                            </div>                        
                                                        </div></a>
                                                    </td>  
                                                    <td> {{$provider->telephonne}}</td>                                                  
                                                    <td> {{$provider->adress}} </td>  
                                                    <td>
                                                        @if($provider->status == '1')
                                                        <span class="btn btn-bold btn-sm btn-font-sm  btn-label-success">activer</span>
                                                        @else
                                                        <span class="btn btn-bold btn-sm btn-font-sm  btn-label-danger">désactiver</span>
                                                        @endif
                                                    </td>  
                                                   
                                                    <td><div class="kt-user-card-v2"> <div class="kt-user-card-v2__details">    
                                                        <div class="kt-user-card-v2__name"  id="pCredit{{$provider->credit}}">{{$provider->credit}} DA</div>
                                                        </div> </div>
                                                    </td>

                                                    <td > <span style="overflow: visible; position: relative;  " >
                                                        <button type="button" class="btn btn-clean btn-sm btn-icon btn-icon-md" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            <i class="flaticon-more-1"></i>
                                                        </button>
                                                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-md dropdown-menu-fit">
                                                            <ul class="kt-nav">
                                                                <li class="kt-nav__head">
                                                                    Export Options
                                                                    <i class="flaticon2-information" data-toggle="kt-tooltip" data-placement="right" title="Click to learn more..."></i>
                                                                </li>
                                                                <li class="kt-nav__separator"></li>
                                                                <li class="kt-nav__item">
                                                                    @if($provider->status == '1')
                                                                    <a href="#"  onclick="delete_Provider({{$provider->id}},'0')"   class="kt-nav__link" >
                                                                        <i class="kt-nav__link-icon flaticon2-delete"></i>
                                                                        <span class="kt-nav__link-text">Désactiver</span>
                                                                    </a>
                                                                    @else
                                                                    <a href="#"  onclick="delete_Provider({{$provider->id}},'1')"   class="kt-nav__link" >
                                                                        <i class="kt-nav__link-icon flaticon2-delete"></i>
                                                                        <span class="kt-nav__link-text">Activer</span>
                                                                    </a>
                                                                    @endif
                                                                </li>
                                                                <li class="kt-nav__item">
                                                                    <a href="{{ url('/AddProvider/'.$provider->id) }}"  class="kt-nav__link">
                                                                        <i class="kt-nav__link-icon  flaticon-visible"></i>
                                                                        <span class="kt-nav__link-text">Modifier</span>
                                                                    </a>
                                                                </li>
                                                                <li class="kt-nav__item">
                                                                    <a href="{{ url('/provider/'.$provider->id) }}"  class="kt-nav__link">
                                                                        <i class="kt-nav__link-icon  flaticon-plus"></i>
                                                                        <span class="kt-nav__link-text">Plus de détails</span>
                                                                    </a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </span>
                                                    </td>
                                                </tr>
                                            @endforeach 
                                        </tbody>
                                    </table>

                                    <!--end: Datatable -->
                                </div>
                            </div>
                        </div>

                        <!-- end:: Content -->
       <!-- begin:: Content -->
						
                        <!-- end:: Content -->
                        




    <!--begin::Modal-->
    <div class="modal fade" id="addProvider" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5  class="modal-title" id="exampleModalLabel">Ajouter Fournisseurs</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div id="errProvider"></div>
                        <div class="form-group" >
                            <label for="name" class="form-control-label">Nom et Prénom :</label>
                            <input type="text" class="form-control" id="name"  >
                        </div>
                        <div class="form-group" >
                            <label for="phone" class="form-control-label">téléphonne :</label>
                            <input type="text" class="form-control" id="phone"  >
                        </div>
                        <div class="form-group" >
                            <label for="adress" class="form-control-label">Adresse :</label>
                            <input type="text" class="form-control" id="adress"  >
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" id="closeModal" data-dismiss="modal">Close</button>
                    <button type="button" id="newProvider" class="btn btn-primary">Ajouter</button>
                </div>
            </div>
        </div>
    </div>

    <!--end::Modal-->

<script type="text/javascript">
    $(document).ready(function() {
        $('#productTable').DataTable();
    });
</script>
<script type="text/javascript">
    function delete_Provider(id,status) {
            swal.fire({
                title: 'Êtes-vous sûr?',
                text: "Vous ne pourrez pas revenir en arrière!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Oui!',
                cancelButtonText: 'Non, annulez!',
                reverseButtons: true
            }).then(function(result){
                if (result.value) {
                    $.ajax({
                      type: "POST",
                      url: "{{URL::to('/editProviderStatus') }}",
                      dataType: "json",
                      data:{ 'id'     : id,
                             'status' : status},
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
                                'Edit status!',
                                'Votre Produit a été désactiver.',
                                'success'
                            )
                            location.reload();
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

    $('#newProvider').on( "click",function () {
        console.log('i am here')
        var name   = $('#name').val();
        var phone  = $('#phone').val();
        var adress = $('#adress').val();
        if (name.length < 5 || phone.length == 0 || adress.length == 0 ) {
            $('#errProvider').append('<div class="alert alert-danger" role="alert">Veuillez Remplire Tous les Champs</div>')
        }else{
        $.ajax({
              type: "POST",
              url: "{{URL::to('/addProvider') }}",
              dataType: "json",
              data:{'name'  : name,
                    'phone' : phone,
                    'adress': adress},
              headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
              success:function(data){
                if(data){
                    swal.fire(
                        'Eroor',
                        "une erreur s'est produite veuillez réessayer svp.",
                        'error'
                    )
                }else{
                    $('#closeModal').click();
                    swal.fire(
                        'Ajouter Fournisseur',
                        'le Fournisseur a éte bien Ajouter.',
                        'success'
                    )
                     location.reload();
                }
              }
        })
        }
    })
    
</script>
@endsection
