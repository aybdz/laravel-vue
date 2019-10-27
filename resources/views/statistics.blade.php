@extends('layout')

@section('title', "Statistics")
@section('styles')
@endsection
@section('scripts')
@endsection
@section('content')
<?php $now = Carbon\Carbon::now(); 
?>

    <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor">

    <!-- begin:: Subheader -->
    <div class="kt-subheader   kt-grid__item" id="kt_subheader">
        <div class="kt-subheader__main">
            <h3 class="kt-subheader__title">
                Dashboard </h3>
            <span class="kt-subheader__separator kt-hidden"></span>
            <div class="kt-subheader__breadcrumbs">
                <a href="{{ url('/home') }}" class="kt-subheader__breadcrumbs-home"><i class="flaticon2-shelter"></i></a>
                <span class="kt-subheader__breadcrumbs-separator"></span>
                <a href="" class="kt-subheader__breadcrumbs-link">
                    General </a>
                <span class="kt-subheader__breadcrumbs-separator"></span>
                <a href="" class="kt-subheader__breadcrumbs-link">
                    Dashboard </a>

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
                                <a href="#" class="kt-nav__link">
                                    <i class="kt-nav__link-icon flaticon2-drop"></i>
                                    <span class="kt-nav__link-text">Order</span>
                                </a>
                            </li>
                            <li class="kt-nav__item">
                                <a href="#" class="kt-nav__link">
                                    <i class="kt-nav__link-icon flaticon2-calendar-8"></i>
                                    <span class="kt-nav__link-text">Ticket</span>
                                </a>
                            </li>
                            <li class="kt-nav__item">
                                <a href="#" class="kt-nav__link">
                                    <i class="kt-nav__link-icon flaticon2-link"></i>
                                    <span class="kt-nav__link-text">Goal</span>
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
			<div class="col-xl-7">
				<!--begin:: Widgets/User Progress -->
				<div class="kt-portlet kt-portlet--height-fluid">
					<div class="kt-portlet__head">
						<div class="kt-portlet__head-label">
							<h3 class="kt-portlet__head-title">
								Recette utilisateur
							</h3>
						</div>
						<div class="kt-portlet__head-toolbar">
							<ul class="nav nav-pills nav-pills-sm nav-pills-label nav-pills-bold" role="tablist">
								<li class="nav-item">
									<a class="nav-link active" data-toggle="tab" href="#today" role="tab">
										Aujourd'hui
									</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" data-toggle="tab" href="#yesterday" role="tab">
										Hier
									</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" data-toggle="tab" href="#week" role="tab">
										Cette semaine
									</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" data-toggle="tab" href="#month" role="tab">
										Ce mois-ci
									</a>
								</li>
							</ul>
						</div>
					</div>
					<div class="kt-portlet__body">
						<div class="tab-content">
							<div class="tab-pane active" id="today">
								<div class="kt-widget31">
									@foreach ($transactions as $val)
										<div class="kt-widget31__item">
											<div class="kt-widget31__content">
												<div class="kt-widget12__info">
													<h5 class="kt-widget31__username">
														<a href="{{ url('user/'.$val['idUser']) }}">
														{{$val['name'].' ( '.$val['userName'].' ) '}}
														</a>
													</h5>
												</div>
											</div>
											<div class="kt-widget31__content">
												<div class="kt-widget31__info">
													<div class="kt-widget31__username">
														{{$val['telephone']}}
													</div>
												</div>
												<div class="kt-widget12__info">												
													<h5 class="kt-widget31__username">{{$val['amount']}}.00 DA </h5>
												</div>
												<div class="kt-widget12__info">												
													<h5 class="kt-widget31__username">{{abs((int)$val['amountProvider'])}}.00 DA </h5>
												</div>
												<div class="kt-widget12__info">												
													<h5 class="kt-widget31__username">{{(int)$val['amount']-abs((int)$val['amountProvider'])}}.00 DA </h5>
												</div>
											</div>
										</div>
									@endforeach
								</div>
							</div>
							<div class="tab-pane" id="yesterday">
								<div class="kt-widget31">
									@foreach ($tranYesterday as $val)
										<div class="kt-widget31__item">
											<div class="kt-widget31__content">
												<div class="kt-widget12__info">
													<h5 class="kt-widget31__username">
														<a href="{{ url('user/'.$val['idUser']) }}">
														{{$val['name'].' ( '.$val['userName'].' ) '}}
														</a>
													</h5>
												</div>
											</div>
											<div class="kt-widget31__content">
												<div class="kt-widget31__info">
													<div class="kt-widget31__username">
														{{$val['telephone']}}
													</div>
												</div>
												<div class="kt-widget12__info">												
													<h5 class="kt-widget31__username">{{$val['amount']}}.00 DA </h5>
												</div>
												<div class="kt-widget12__info">												
													<h5 class="kt-widget31__username">{{abs((int)$val['amountProvider'])}}.00 DA </h5>
												</div>
												<div class="kt-widget12__info">												
													<h5 class="kt-widget31__username">{{(int)$val['amount']-abs((int)$val['amountProvider'])}}.00 DA </h5>
												</div>
											</div>
										</div>
									@endforeach
								</div>
							</div>
							<div class="tab-pane" id="week">
								<div class="kt-widget31">
									@foreach ($tranWeek as $val)
										<div class="kt-widget31__item">
											<div class="kt-widget31__content">
												<div class="kt-widget12__info">
													<h5 class="kt-widget31__username">
														<a href="{{ url('user/'.$val['idUser']) }}">
														{{$val['name'].' ( '.$val['userName'].' ) '}}
														</a>
													</h5>
												</div>
											</div>
											<div class="kt-widget31__content">
												<div class="kt-widget31__info">
													<div class="kt-widget31__username">
														{{$val['telephone']}}
													</div>
												</div>
												<div class="kt-widget12__info">												
													<h5 class="kt-widget31__username">{{$val['amount']}}.00 DA </h5>
												</div>
												<div class="kt-widget12__info">												
													<h5 class="kt-widget31__username">{{abs((int)$val['amountProvider'])}}.00 DA </h5>
												</div>
												<div class="kt-widget12__info">												
													<h5 class="kt-widget31__username">{{(int)$val['amount']-abs((int)$val['amountProvider'])}}.00 DA </h5>
												</div>
											</div>
										</div>
									@endforeach
								</div>
							</div>
							<div class="tab-pane" id="month">
								<div class="kt-widget31">
									@foreach ($tranMonth as $val)
										<div class="kt-widget31__item">
											<div class="kt-widget31__content">
												<div class="kt-widget12__info">
													<h5 class="kt-widget31__username">
														<a href="{{ url('user/'.$val['idUser']) }}">
														{{$val['name'].' ( '.$val['userName'].' ) '}}
														</a>
													</h5>
												</div>
											</div>
											<div class="kt-widget31__content">
												<div class="kt-widget31__info">
													<div class="kt-widget31__username">
														{{$val['telephone']}}
													</div>
												</div>
												<div class="kt-widget12__info">												
													<h5 class="kt-widget31__username">{{$val['amount']}}.00 DA </h5>
												</div>
												<div class="kt-widget12__info">												
													<h5 class="kt-widget31__username">{{abs((int)$val['amountProvider'])}}.00 DA </h5>
												</div>
												<div class="kt-widget12__info">												
													<h5 class="kt-widget31__username">{{(int)$val['amount']-abs((int)$val['amountProvider'])}}.00 DA </h5>
												</div>
											</div>
										</div>
									@endforeach
								</div>
							</div>
						</div>
					</div>
				</div>

				<!--end:: Widgets/User Progress -->
			</div>
			<div class="col-xl-5">
				<!--begin:: Widgets/Order Statistics-->
				<div class="kt-portlet kt-portlet--height-fluid">
					<div class="kt-portlet__head">
						<div class="kt-portlet__head-label">
							<h3 class="kt-portlet__head-title">
								Statistics
							</h3>
						</div>
						
					</div>
					<div class="kt-portlet__body kt-portlet__body--fluid">
						<div class="kt-widget12">
							<div class="kt-widget12__content">
								<div class="kt-widget12__item">
									<div class="kt-widget12__info">
										<span class="kt-widget12__desc">Recettes :</span>
										<span class="kt-widget12__value">{{$state['CapiteOfMonth']}}.00 DA</span>
									</div>
									<div class="kt-widget12__info">
										<span class="kt-widget12__desc">à partir de la Date :</span>
										<span class="kt-widget12__value">{{Carbon\Carbon::now()->startOfMonth()->toDateString()}}</span>
									</div>
								</div>
								<div class="kt-widget12__item">
									<div class="kt-widget12__info">
										<span class="kt-widget12__desc">Gagner :</span>
										<span class="kt-widget12__value">{{$state['benefitSample']+$state['benefitClient']}}.00 DA  </span>
									</div>
									<div class="kt-widget12__info">
										<span class="kt-widget12__desc">Commandes :</span>
										<span class="kt-widget12__value">{{$state['OrderOfMonth']}}</span>
									</div>
								</div>
								
							</div>	
						</div>
					</div>
				</div>

				<!--end:: Widgets/Order Statistics-->
			</div>
		</div>

		<div class="row">
			<div class="kt-portlet">
				<div class="kt-portlet__body  kt-portlet__body--fit">
					<div class="row row-no-padding row-col-separator-xl">
						<div class="col-md-12 col-lg-6 col-xl-3">

							<!--begin::Total Profit-->
							<div class="kt-widget24">
								<div class="kt-widget24__details">
									<div class="kt-widget24__info">
										<h4 class="kt-widget24__title">
											Total 
										</h4>
										<span class="kt-widget24__desc">
											Capital
										</span>
									</div>
									<span class="kt-widget24__stats kt-font-brand">
										{{$capital}}.00 DA 
									</span>
								</div>
							</div>

							<!--end::Total Profit-->
						</div>
						<div class="col-md-12 col-lg-6 col-xl-3">

							<!--begin::New Feedbacks-->
							<div class="kt-widget24">
								<div class="kt-widget24__details">
									<div class="kt-widget24__info">
										<h4 class="kt-widget24__title">
											Produis
										</h4>
										<span class="kt-widget24__desc">
											Nombre de produis
										</span>
									</div>
									<span class="kt-widget24__stats kt-font-warning">
										{{$state['productNbr']}}
									</span>
								</div>
								
							</div>

							<!--end::New Feedbacks-->
						</div>
						<div class="col-md-12 col-lg-6 col-xl-3">

							<!--begin::New Orders-->
							<div class="kt-widget24">
								<div class="kt-widget24__details">
									<div class="kt-widget24__info">
										<h4 class="kt-widget24__title">
											Commande
										</h4>
										<span class="kt-widget24__desc">
											Nombre de commandes
										</span>
									</div>
									<span class="kt-widget24__stats kt-font-danger">
										{{$state['ordersNbr']}}
									</span>
								</div>
								
							</div>

							<!--end::New Orders-->
						</div>
						<div class="col-md-12 col-lg-6 col-xl-3">

							<!--begin::New Users-->
							<div class="kt-widget24">
								<div class="kt-widget24__details">
									<div class="kt-widget24__info">
										<h4 class="kt-widget24__title">
											Clients
										</h4>
										<span class="kt-widget24__desc">
											Nombre de client
										</span>
									</div>
									<span class="kt-widget24__stats kt-font-success">
										{{$state['clientNbr'] }}
									</span>
								</div>
								
							</div>

							<!--end::New Users-->
						</div>
					</div>

				</div>
			</div>
		</div>
		<div class="row">
			<div class="kt-portlet">
				<div class="kt-portlet__body  kt-portlet__body--fit">
					<div class="row row-no-padding row-col-separator-xl">
						<div class="col-md-12 col-lg-6 col-xl-3">

							<!--begin::Total Profit-->
							<div class="kt-widget24">
								<div class="kt-widget24__details">
									<div class="kt-widget24__info">
										<h4 class="kt-widget24__title">
											Credit
										</h4>
										<span class="kt-widget24__desc">
											Total Credit
										</span>
									</div>
									<span class="kt-widget24__stats kt-font-brand">
										{{$state['CreditTotal']}}.00 DA 
									</span>
								</div>
							</div>

							<!--end::Total Profit-->
						</div>
						<div class="col-md-12 col-lg-6 col-xl-3">

							<!--begin::New Feedbacks-->
							<div class="kt-widget24">
								<div class="kt-widget24__details">
									<div class="kt-widget24__info">
										<h4 class="kt-widget24__title">
											Transaction
										</h4>
										<span class="kt-widget24__desc">
											Nombre de Transactions
										</span>
									</div>
									<span class="kt-widget24__stats kt-font-warning">
										{{$state['transactionNbr']}}
									</span>
								</div>
								
							</div>

							<!--end::New Feedbacks-->
						</div>
						<div class="col-md-12 col-lg-6 col-xl-3">

							<!--begin::New Orders-->
							<div class="kt-widget24">
								<div class="kt-widget24__details">
									<div class="kt-widget24__info">
										<h4 class="kt-widget24__title">
											Nombre de commandes
										</h4>
										<span class="kt-widget24__desc">
											Fresh Order Amount
										</span>
									</div>
									<span class="kt-widget24__stats kt-font-danger">
										{{$state['ordersNbr']}}
									</span>
								</div>
								
							</div>

							<!--end::New Orders-->
						</div>
						<div class="col-md-12 col-lg-6 col-xl-3">

							<!--begin::New Users-->
							<div class="kt-widget24">
								<div class="kt-widget24__details">
									<div class="kt-widget24__info">
										<h4 class="kt-widget24__title">
											New Users
										</h4>
										<span class="kt-widget24__desc">
											Joined New User
										</span>
									</div>
									<span class="kt-widget24__stats kt-font-success">
										{{$state['clientNbr'] }}
									</span>
								</div>
								
							</div>

							<!--end::New Users-->
						</div>
					</div>
					
				</div>
			</div>
		</div>

		<!--End::Section-->
    </div>
@endsection
