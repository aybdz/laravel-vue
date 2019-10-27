@extends('layout')
@section('title', "Produit")
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
                Produits </h3>
            <span class="kt-subheader__separator kt-hidden"></span>
            <div class="kt-subheader__breadcrumbs">
                <a href="{{ url('/products') }}" class="kt-subheader__breadcrumbs-home"><i class="flaticon2-shelter"></i></a>
                <span class="kt-subheader__breadcrumbs-separator"></span>
                <a href="{{ url('/dashboard') }}" class="kt-subheader__breadcrumbs-link">
                    General </a>
                <span class="kt-subheader__breadcrumbs-separator"></span>
                <a href="{{ url('/products') }}" class="kt-subheader__breadcrumbs-link">
                    Produit </a>

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
        <!-- begin:: Content -->
                        <div class="kt-content  kt-grid__item kt-grid__item--fluid" id="kt_content">
                            
                            <div class="kt-portlet kt-portlet--mobile">
                                <div class="kt-portlet__head kt-portlet__head--lg">
                                    <div class="kt-portlet__head-label">
                                        <span class="kt-portlet__head-icon">
                                            <i class="kt-font-brand flaticon2-box"></i>
                                        </span>
                                        <h3 class="kt-portlet__head-title">
                                            Liste Des Produits 
                                        </h3>
                                    </div>
                                    <div class="kt-portlet__head-toolbar">
                                        <div class="kt-portlet__head-wrapper">
                                            <div class="kt-portlet__head-actions">
                                                <a href="{{ url('/AddProduct/0') }}" class="btn btn-brand btn-elevate btn-icon-sm">
                                                    <i class="la la-plus"></i>
                                                    Ajouter Produit
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="kt-portlet__body table-responsive">

                                    <!--begin: Datatable -->
                                    <table class="table table-striped- table-bordered table-hover " id="productTable">
                                        <thead>

                                            <tr>
                                                <th>#</th>
                                                <th >Produit</th>
                                                @if(Auth::user()->type == "su")
                                                    <th >Prix d'achat</th>
                                                @endif
                                                <th >Prix de vente</th>
                                                <th >Qty</th>
                                                <th >Servir par</th>
                                                <th >Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($products as $product)
                                                <tr data-row="{{$product->id}}" id="tr{{$product->id}}">
                                                    <td class="text-center">{{$product->bareCode}}</td>
                                                    <td class="text-center">
                                                        <div class="kt-user-card-v2"> 

                                                            <div class="kt-user-card-v2__pic">                                
                                                                <img alt="photo" src=" {{ asset('image/'.$product->img) }}">                            
                                                            </div>      

                                                            <div class="kt-user-card-v2__details">                                
                                                                <div class="kt-user-card-v2__name">{{$product->name}}
                                                                </div>                                
                                                            </div>  
                                                                                  
                                                        </div>
                                                    </td>
                                                    @if(Auth::user()->type == "su")
                                                        <td class="text-center">{{$product->priceA}} DA</td>
                                                    @endif
                                                    <td class="text-center">{{$product->priceV}} DA</td>
                                                    <td class="text-center"><strong> {{$product->qty}} </strong> </td>
                                                    <td class="text-center">  
                                                        <div class="kt-user-card-v2">                           
                                                            <div class="kt-user-card-v2__pic">                              
                                                                <div class="kt-badge kt-badge--xl kt-badge--brand">{{($product->user->name)[0]}}</div>  
                                                            </div>                          
                                                            <div class="kt-user-card-v2__details">                              
                                                                <a class="kt-user-card-v2__name" href="#">{{$product->user->name}}</a>  
                                                                <span class="kt-user-card-v2__desc">Admin</span>        
                                                            </div>                      
                                                        </div>
                                                    </td>
                                                    <td class="text-center"> <span style="overflow: visible; position: relative;  " >
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
                                                                    <a href="#"  rel="nofollow"  data-codebare="{{$product->bareCode}}" class="kt-nav__link codeBarePrint">
                                                                        <i class="kt-nav__link-icon  flaticon-edit-1"></i>
                                                                        <span class="kt-nav__link-text">imprimé code a barre</span>
                                                                    </a>
                                                                </li>
                                                                <li class="kt-nav__item">
                                                                    <a href="#"  onclick="delete_Product('{{$product->id}}')"   class="kt-nav__link" >
                                                                        <i class="kt-nav__link-icon flaticon2-delete"></i>
                                                                        <span class="kt-nav__link-text">Supprimé</span>
                                                                    </a>
                                                                </li>
                                                                <li class="kt-nav__item">
                                                                    <a href="{{ url('/AddProduct/'.$product->id) }}"  class="kt-nav__link">
                                                                        <i class="kt-nav__link-icon  flaticon-edit-1"></i>
                                                                        <span class="kt-nav__link-text">Modifier</span>
                                                                    </a>
                                                                </li>
                                                                <li class="kt-nav__item">
                                                                    <a href="{{ url('/details/'.$product->id) }}"  class="kt-nav__link">
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
                        


    </div>
@if(Auth::user()->type = 'su')
    <!--begin::Modal-->
    <div class="modal fade" id="kt_modal_5" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ajout de produits au stock</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <input type="hidden" class="form-control" id="idp">
                        <div class="row">
                        <div class="form-check col-4" >
                            <label for="recipient-name" class="form-control-label">Stock actuel</label>
                            <input type="number" class="form-control" id="Qty"  disabled="disabled">
                        </div>
                        <div class="form-check col-4" >
                            <label for="recipient-name" class="form-control-label">Ajout au stock</label>
                            <input type="number" class="form-control" id="addQty"  min="1" >
                        </div>
                        <div class="form-check col-4" >
                            <label for="recipient-name" class="form-control-label">Stock total</label>
                            <input type="number" class="form-control" id="newQty"  disabled="disabled">
                        </div>

                        <div class="spacer"></div>

                        <div class="form-check col-6" >
                                <label for="recipient-name" class="form-control-label">Prix d'achat:</label>
                            <div class="input-group">
                                <input type="number" class="form-control" name="prixA" id="prixA"aria-label="Amount (to the nearest dollar)" placeholder="00 DA" required>
                                <div class="input-group-prepend">
                                    <span class="input-group-text  btn btn-primary">DA</span>
                                </div>
                            </div>
                        </div>

                        <div class="form-check col-6" >
                                <label for="recipient-name" class="form-control-label">Prix d'vent:</label>
                            <div class="input-group">
                                <input type="number" class="form-control" name="prixV" id="prixV"aria-label="Amount (to the nearest dollar)" placeholder="00 DA" required>
                                <div class="input-group-prepend">
                                    <span class="input-group-text  btn btn-primary">DA</span>
                                </div>
                            </div>
                        </div>

                        <div class="spacer"></div>


                        <div class="form-check col-12" >
                            <label for="recipient-name" class="form-control-label">Choisir un fournisseur:</label>
                            <select class="form-control" id="idProvider">
                                    <option value="0" selected="selected">aucun fournisseur</option>
                                @foreach($providers as $provider)
                                    <option value="{{$provider->id}}">{{$provider->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="spacer"></div>

                        <div class="form-check col-4" >
                                <label for="recipient-name" class="form-control-label">Total :</label>
                            <div class="input-group">
                                <input type="number" class="form-control" name="totalProvider" id="totalProvider"aria-label="Amount (to the nearest dollar)" placeholder="00 DA" disabled="disabled">
                                <div class="input-group-prepend">
                                    <span class="input-group-text  btn btn-primary">DA</span>
                                </div>
                            </div>
                        </div>

                        <div class="form-check col-4" >
                                <label for="recipient-name" class="form-control-label">Verse :</label>
                            <div class="input-group">
                                <input type="number" class="form-control" name="verseProvider" id="verseProvider"aria-label="Amount (to the nearest dollar)" placeholder="00 DA" required>
                                <div class="input-group-prepend">
                                    <span class="input-group-text  btn btn-primary">DA</span>
                                </div>
                            </div>
                        </div>

                        <div class="form-check col-4" >
                                <label for="recipient-name" class="form-control-label">Reste :</label>
                            <div class="input-group">
                                <input type="number" class="form-control" name="resteProvider" id="resteProvider"aria-label="Amount (to the nearest dollar)" placeholder="00 DA" disabled="disabled">
                                <div class="input-group-prepend">
                                    <span class="input-group-text  btn btn-primary">DA</span>
                                </div>
                            </div>
                        </div>

                        
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-wide-2" id="closeModal" data-dismiss="modal">Fermer</button>
                    <button type="button" id="addStock" class="btn btn-primary btn-wide-2">Ajouter</button>
                </div>
            </div>
        </div>
    </div>
<script type="text/javascript">
    function add_Product(id,qty,priceA,priceV) {
        $('#Qty').val("")
        $('#idp').val("")
        $('#prixA').val("")
        $('#prixV').val("")
        $('#addQty').val(1)
        $('#newQty').val("")
        $('#totalProvider').val("")
        $('#verseProvider').val("")
        $('#resteProvider').val("")
        $('#Qty').val(qty)
        $('#prixA').val(priceA)
        $('#prixV').val(priceV)
        $('#Qty').attr({"min" : qty });
        $('#idp').val(id)
        $('#totalProvider').val(parseInt(priceA))
        $('#verseProvider').val(0)
        $('#resteProvider').val(parseInt(priceA))
        $('#verseProvider').attr({"max" : parseInt(priceA) });
    }

    $('#addStock').on( "click",function () {
        var id         = $('#idp').val()
        var qty        = $('#addQty').val()
        var idProvider = $('#idProvider').val()
        var prixA      = $('#prixA').val()
        var prixV      = $('#prixV').val()
        var total      = $('#totalProvider').val()
        var verse      = $('#verseProvider').val()
        if(qty !="" && (prixA != '' && prixA != 0) ){
            if (idProvider == '0' && parseInt(total) > parseInt(verse)) {
                swal.fire(
                        'Eroor',
                        "vous n'avez choisi aucun fournisseur et le montant est inférieur au total!",
                        'error'
                    )
            }else{
                $.ajax({
                      type: "POST",
                      url: "{{URL::to('/AddStock') }}",
                      dataType: "json",
                      data:{'id':id,
                            'qty':qty,
                            'idProvider':idProvider,
                            'prixA':prixA,
                            'prixV':prixV,
                            'total':total,
                            'verse':verse},
                      headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                      success:function(data){
                        if(data){
                            swal.fire(
                                'Eroor',
                                "une erreur s'est produite veuillez réessayer svp.",
                                'error'
                            )
                        }else{
                            $('#pQty'+id).val($('#newQty').val())
                            $('#closeModal').click();
                            swal.fire(
                                'Ajouter Stock',
                                'le produit a éte bien mis a joure.',
                                'success'
                            )
                        }
                      }
                })
            }
        }else{
            swal.fire(
                        'Eroor',
                        "une erreur s'est produite veuillez réessayer svp.",
                        'error'
                    )
        }
    })

    $("#addQty").on("mouseout, keyup ,change",function(){
        var qty     = $('#Qty').val();
        var addqty  = $('#addQty').val();
        var prixA   = $('#prixA').val();
        var verse   = $('#verseProvider').val();
        $('#newQty').val(parseInt(qty)+parseInt($('#addQty').val()))
        $('#totalProvider').val(parseInt(prixA) * parseInt(addqty))
        $('#resteProvider').val((parseInt(prixA) * parseInt(addqty))- verse)
    })

    $("#verseProvider").on("mouseout, keyup ,change",function(){
        var addqty  = $('#addQty').val();
        var prixA   = $('#prixA').val();
        var verse   = $('#verseProvider').val();
        var total   = parseInt(prixA) * parseInt(addqty);
        if ( parseInt(verse) > total) {
            $('#verseProvider').val('')
            $('#verseProvider').val(total)
            verse = total;
            swal.fire(
                    'Eroor',
                    "attention le montant insert est supérieur de la commande ! ",
                    'error'
                )
        }
        $('#totalProvider').val(total)
        $('#resteProvider').val(total- parseInt(verse))
    })
</script>
    <!--end::Modal-->
@endif
<div class="modal fade" id="bareCodeModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Code a bare</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div style="margin-top:22px; "> </div>
                        <div id="demo"></div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-wide-2" id="closeModal" data-dismiss="modal">Fermer</button>
                    <button type="button" id="print" class="btn btn-primary btn-wide-2">Imprimé</button>
                </div>
            </div>
        </div>
    </div>
<script type="text/javascript">
    $(document).ready(function() {
        $('#productTable').DataTable();

        var settings = {
            barWidth: 2,
            barHeight: 50,
            moduleSize: 5,
            showHRI: true,
            addQuietZone: true,
            marginHRI: 5,
            bgColor: "#FFFFFF",
            color: "#000000",
            fontSize: 10,
            output: "css",
            posX: 0,
            posY: 0
        };
        $('.codeBarePrint').on('click',function () {
            var cb = $(this).data('codebare');
            $("#demo").barcode( cb.toString(), // Value barcode (dependent on the type of barcode)
            "code93", // type (string)
            settings);
            let timerInterval
            Swal.fire({
              title: 'Chargement!',
              html: 'Ce sera fini dans <strong></stringrong> millisecondes.',
              timer: 1000,
              onBeforeOpen: () => {
                Swal.showLoading()
                timerInterval = setInterval(() => {
                  Swal.getContent().querySelector('strong')
                    .textContent = Swal.getTimerLeft()
                }, 100)
              },
              onClose: () => {
                clearInterval(timerInterval)
              }
            }).then((result) => {
              if (
                /* Read more about handling dismissals below */
                result.dismiss === Swal.DismissReason.timer
              ) {
                $('#bareCodeModal').modal('show')
              }
            })
        })
        
        $('#print').on('click',function () {
            $("#demo").print();
        })
          
        });
</script>
<script type="text/javascript">
    function delete_Product(id) {
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
                      url: "{{URL::to('/deleteProduct') }}",
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
                                'Votre Produit a été supprimé.',
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

   
    
</script>
@endsection
