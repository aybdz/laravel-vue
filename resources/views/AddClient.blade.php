@extends('layout')

@section('title', "Frounisseur")
@section('styles')
@endsection
@section('scripts')
@endsection
@section('content')
<?php
$disabled= "";
if ($id != 0) { $disabled= "disabled";}

if(isset($id))
{
	$id = $id;
}else{
	$id = "";
}

$name       = "";
$telephonne = "";
$adress     = "";
$img        = "";

if($data != null && !empty($data))
{
    $name       = $data["name"];
    $telephonne = $data["telephonne"];
    $adress     = $data["adress"];
    $img        = $data["img"];
}
?>
<div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor">
    <!-- begin:: Subheader -->
    <div class="kt-subheader   kt-grid__item" id="kt_subheader">
        <div class="kt-subheader__main">
            <h3 class="kt-subheader__title">
                Clients </h3>
            <span class="kt-subheader__separator kt-hidden"></span>
            <div class="kt-subheader__breadcrumbs">
                <a href="{{ url('/clients') }}" class="kt-subheader__breadcrumbs-home"><i class="flaticon2-shelter"></i></a>
                <span class="kt-subheader__breadcrumbs-separator"></span>
                <a href="{{ url('/dashboard') }}" class="kt-subheader__breadcrumbs-link">
                    General </a>
                <span class="kt-subheader__breadcrumbs-separator"></span>
                <a href="{{  url()->previous() }}" class="kt-subheader__breadcrumbs-link">
                    Client </a>

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
                                <a href="#" class="kt-nav__link">
                                    <i class="kt-nav__link-icon flaticon2-link"></i>
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
			<!--begin::Portlet-->
			<div class="kt-portlet">
				<div class="kt-portlet__head">
					<div class="kt-portlet__head-label">
						<h3 class="kt-portlet__head-title">
							Produits
						</h3>
					</div>
				</div>
				@if( isset($err))
					@if($err)
						<div class="alert alert-danger" role="alert">
						  {{$message}}
						</div>
					@else
						<div class="alert alert-success" role="alert">
						  {{$message}}
						</div>
					@endif
				@endif
                @if (\Session::has('err'))
                    @if(\Session::get('err'))
                        <div class="alert alert-danger">
                            Une erreur est survenu veuillez réessayer svp!
                        </div>
                    @else
                        <div class="alert alert-success">
                            Le crédit a été bien enregistré
                        </div>
                    @endif
                @endif
				<!--begin::Form-->
				<form class="kt-form" method="POST" action="{{ url('/updateClient') }}" enctype="multipart/form-data">
					{{ csrf_field() }}
					<div class="kt-portlet__body">
						<input type="hidden" name="idp" id="idp" value="{{$id}}">
						
						<div class="form-group ">
							<div class="input-group ">
								<div class="input-group-prepend">
									<span class="input-group-text  btn btn-primary">Nom </span>
								</div>
								<input type="text" name="name" id="name" class="form-control" value="{{$name}}" placeholder="titre de produit" aria-describedby="basic-addon1" required>
							</div>
						</div>
						<div class="form-group">
							<label>Navigateur de fichiers</label>
							<div></div>
							<div class="custom-file">
								<input type="file" class="custom-file-input" accept="image/x-png,image/jpeg" name="photo" id="customFile">
								<label class="custom-file-label" for="customFile">Choisir le fichier</label>
							</div>
						</div>
						<div class="form-group ">
							<div class="input-group">
								<div class="input-group-prepend">
									<span class="input-group-text  btn btn-primary">telephonne</span>
								</div>
								<input type="text" class="form-control" name="telephonne" value="{{$telephonne}}"  required>
								<div class="input-group-prepend">
									<span class="input-group-text flaticon2 flaticon2-phone"></span>
								</div>
							</div>
						</div>
						<div class="form-group ">
							<div class="input-group ">
								<div class="input-group-prepend">
									<span class="input-group-text  btn btn-primary">Adress</span>
								</div>
								<input type="text" class="form-control" name="adress" value="{{$adress}}" aria-label="Amount (to the nearest dollar)" required>
								<div class="input-group-prepend">
									<span class="input-group-text   flaticon flaticon-map-location"></span>
								</div>
							</div>
						</div>
						
					</div>
					<div class="kt-portlet__foot">
						<div class="kt-form__actions">
							<button type="Submit" class="btn btn-primary">Submit</button>
							<a href="{{ url('/clients') }}" class="btn btn-secondary">Cancel</a>
						</div>
					</div>
				</form>
				<!--end::Form-->
			</div>

			<!--end::Portlet--
		</div>
    </div>
@endsection
