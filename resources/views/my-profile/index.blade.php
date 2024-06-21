@include('Layout.Header')
			<!-- NFTmax Dashboard -->
			<section class="nftmax-adashboard nftmax-show">

				<div class="container">
					<div class="row">
						<div class="col-lg-9 col-12 nftmax-main__column">
							<div class="nftmax-body strata-body">
								<!-- Dashboard Inner -->
								<div class="nftmax-dsinner">

									<!-- NFTMax User Profile -->
									<div class="nftmax-userprofile mg-top-40">
										<div class="nftmax-userprofile__header">
											<img src="{{ $User['cover_image'] }}" alt="#">
										</div>
										<div class="nftmax-userprofile__user">
											<div class="nftmax-userprofile__content">
												<div class="container">
													<div class="row">
														<div class="col-md-4">
															<div class="nftmax-userprofile__thumb">
																<img src="{{ asset('photo/' . Auth::user()->foto) }}" class="img-fluid" alt="#"> <!-- Gunakan kelas img-fluid untuk membuat gambar responsif -->
															</div>
														</div>
													</div>
												</div
												<div class="nftmax-userprofile__info">
													<h4 class="nftmax-userprofile__info-title"> {{ Auth::user()->username }} <p class="nftmax-userprofile__info-text"> {{ Auth::user()->email }}</p></h4>
													<p class="nftmax-userprofile__info-text"> {{ $User['bio'] }} <a href="#">Read More</a></p>
												</div>
											</div>
											<div class="nftmax-userprofile__right">
												<a href="#" class="nftmax-btn nftmax-btn__primary nftmax-btn__profile radius">Ubah Profile</a>
												<a href="#" class="nftmax-btn nftmax-btn__share radius"><svg width="23" height="22" viewBox="0 0 23 22" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M12.4922 5.51801C12.4922 5.43549 12.4922 5.37668 12.4922 5.31786C12.4908 3.80698 12.4894 2.2961 12.4881 0.784769C12.4876 0.460163 12.6709 0.18525 12.97 0.0626106C13.2823 -0.0654996 13.6374 0.00562209 13.8708 0.251813C14.1079 0.50165 14.3391 0.756959 14.5725 1.00999C16.9742 3.6114 19.3723 6.216 21.7827 8.80921C22.0863 9.13564 22.0863 9.7347 21.7863 10.0579C19.1471 12.9024 16.5188 15.7568 13.8868 18.608C13.6356 18.8802 13.3069 18.9586 12.9864 18.8264C12.6668 18.6947 12.4899 18.4006 12.4899 18.0404C12.4899 16.5204 12.4844 15 12.4803 13.48C12.4803 13.449 12.4735 13.418 12.4676 13.3706C12.4092 13.3706 12.3559 13.3697 12.3021 13.3706C9.96553 13.4216 7.82231 14.1082 5.8537 15.3506C4.32002 16.3185 3.04895 17.5544 2.11206 19.1177C1.60053 19.9712 1.23261 20.8826 1.02517 21.8573C1.01788 21.8915 1.00602 21.9248 0.984596 22C0.896606 21.7821 0.818646 21.6024 0.750715 21.4196C0.0700445 19.5905 -0.16338 17.7081 0.114724 15.7728C0.385533 13.8885 1.11088 12.1857 2.25521 10.6707C4.17459 8.12899 6.70944 6.52693 9.80642 5.8107C10.6271 5.62104 11.4623 5.52804 12.3053 5.51846C12.3591 5.51755 12.4133 5.51801 12.4922 5.51801Z" fill="#374557"></path></svg></a>
											</div>
										</div>
									</div>

									<div class="nftmax-pcats">

										<!-- Profile Menu -->
										<div class="nftmax-pcats__bar">
											<div class="nftmax-pcats__list list-group " id="list-tab" role="tablist">
												{{-- <a class="list-group-item active" data-bs-toggle="list" href="#tab_1" role="tab" href="profile.html">On Sale<span class="nftmax-pcats__count">{{ count($OnSale) }}</span></a>
												<a class="list-group-item" data-bs-toggle="list" href="#tab_2" role="tab">Owned<span class="nftmax-pcats__count">{{count($Owned)}}</span></a>
												<a class="list-group-item" data-bs-toggle="list" href="#tab_3" role="tab">Created<span class="nftmax-pcats__count">{{count($CreateforSell)+count($CreateforBits)}}</span></a>
												<a class="list-group-item" data-bs-toggle="list" href="#tab_4" role="tab">Hidden<span class="nftmax-pcats__count">{{count($CreateforSellHidden)+count($CreateforBitsHidden)}}</span></a>
												<a class="list-group-item" data-bs-toggle="list" href="#tab_5" role="tab">Collections<span class="nftmax-pcats__count">{{count($collection)}}</span></a>
												<a class="list-group-item" data-bs-toggle="list" href="#tab_6" role="tab">Activity</a></li> --}}
											</div>
											{{-- <a href="{{url('/template/upload-product')}}" class="nftmax__item-button--single nftmax-btn nftmax-btn__bordered bg radius">Upload Product</a> --}}
										</div>
										<!-- End Profile Menu -->


										<div class="tab-content" id="nav-tabContent">
											<!-- Single Tab -->
											<div class="tab-pane fade show active" id="tab_1" role="tabpanel" aria-labelledby="nav-home-tab">

												<div class="row">
													<div class="col-12">
														<div class="nftmax-pptabs mg-btm-20">
															<div class="nftmax-pptabs__form">
																<form class="nftmax-header__form-inner nftmax-header__form-profile" action="#">
																	<button class="search-btn" type="submit"><img src="/assets/img/search.png" alt="#"></button>
																	<input name="s" value="" type="text" placeholder="Search items, collections...">
																</form>
															</div>
															<div class="nftmax-pptabs__main">
																<ul  class="nav nav-tabs nftmax-dropdown__list" id="nav-tab" role="tablist">
																	<li class="nav-item dropdown">
																		<a class="nftmax-sidebar_btn nftmax-heading__tabs nav-link dropdown-toggle">Recently Received <span><svg width="20" height="10" viewBox="0 0 13 6" fill="none" xmlns="http://www.w3.org/2000/svg"><path opacity="0.7" d="M12.4124 0.247421C12.3327 0.169022 12.2379 0.106794 12.1335 0.0643287C12.0291 0.0218632 11.917 0 11.8039 0C11.6908 0 11.5787 0.0218632 11.4743 0.0643287C11.3699 0.106794 11.2751 0.169022 11.1954 0.247421L7.27012 4.07837C7.19045 4.15677 7.09566 4.219 6.99122 4.26146C6.88678 4.30393 6.77476 4.32579 6.66162 4.32579C6.54848 4.32579 6.43646 4.30393 6.33202 4.26146C6.22758 4.219 6.13279 4.15677 6.05312 4.07837L2.12785 0.247421C2.04818 0.169022 1.95338 0.106794 1.84895 0.0643287C1.74451 0.0218632 1.63249 0 1.51935 0C1.40621 0 1.29419 0.0218632 1.18975 0.0643287C1.08531 0.106794 0.990517 0.169022 0.910844 0.247421C0.751218 0.404141 0.661621 0.616141 0.661621 0.837119C0.661621 1.0581 0.751218 1.2701 0.910844 1.42682L4.84468 5.26613C5.32677 5.73605 5.98027 6 6.66162 6C7.34297 6 7.99647 5.73605 8.47856 5.26613L12.4124 1.42682C12.572 1.2701 12.6616 1.0581 12.6616 0.837119C12.6616 0.616141 12.572 0.404141 12.4124 0.247421Z" fill="#374557" fill-opacity="0.6"></path></svg></span></a>
																	</li>
																</ul>
															</div>
														</div>
													</div>
												</div>

												<div class="row nftmax-gap-sq30">
												
												</div>
											</div>

											<div class="tab-pane fade" id="tab_2" role="tabpanel" aria-labelledby="nav-home-tab">
												<div class="row">
													<div class="col-12">
														<div class="nftmax-pptabs mg-btm-20">
															<div class="nftmax-pptabs__form">
																<form class="nftmax-header__form-inner nftmax-header__form-profile" action="#">
																	<button class="search-btn" type="submit"><img src="/assets/img/search.png" alt="#"></button>
																	<input name="s" value="" type="text" placeholder="Search items, collections...">
																</form>
															</div>
															<div class="nftmax-pptabs__main">
																<ul  class="nav nav-tabs nftmax-dropdown__list" id="nav-tab" role="tablist">
																	<li class="nav-item dropdown">
																		<a class="nftmax-sidebar_btn nftmax-heading__tabs nav-link dropdown-toggle">Recently Received <span><svg width="20" height="10" viewBox="0 0 13 6" fill="none" xmlns="http://www.w3.org/2000/svg"><path opacity="0.7" d="M12.4124 0.247421C12.3327 0.169022 12.2379 0.106794 12.1335 0.0643287C12.0291 0.0218632 11.917 0 11.8039 0C11.6908 0 11.5787 0.0218632 11.4743 0.0643287C11.3699 0.106794 11.2751 0.169022 11.1954 0.247421L7.27012 4.07837C7.19045 4.15677 7.09566 4.219 6.99122 4.26146C6.88678 4.30393 6.77476 4.32579 6.66162 4.32579C6.54848 4.32579 6.43646 4.30393 6.33202 4.26146C6.22758 4.219 6.13279 4.15677 6.05312 4.07837L2.12785 0.247421C2.04818 0.169022 1.95338 0.106794 1.84895 0.0643287C1.74451 0.0218632 1.63249 0 1.51935 0C1.40621 0 1.29419 0.0218632 1.18975 0.0643287C1.08531 0.106794 0.990517 0.169022 0.910844 0.247421C0.751218 0.404141 0.661621 0.616141 0.661621 0.837119C0.661621 1.0581 0.751218 1.2701 0.910844 1.42682L4.84468 5.26613C5.32677 5.73605 5.98027 6 6.66162 6C7.34297 6 7.99647 5.73605 8.47856 5.26613L12.4124 1.42682C12.572 1.2701 12.6616 1.0581 12.6616 0.837119C12.6616 0.616141 12.572 0.404141 12.4124 0.247421Z" fill="#374557" fill-opacity="0.6"></path></svg></span></a>
																	</li>
																</ul>
															</div>
														</div>
													</div>
												</div>
												<div class="row nftmax-gap-sq30 trending-action__actives">
												
												</div>
											</div>
										</div>
									</div>
								</div>
								<!-- End Dashboard Inner -->
							</div>
						</div>
{{-- @include('Layout.template.RightSidebar') --}}
@include('Layout.Footer')