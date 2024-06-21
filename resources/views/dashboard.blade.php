@include('Layout.Header')
				
			<!-- NFTmax Dashboard -->
			<section class="nftmax-adashboard nftmax-show">
				<div class="container">
					<div class="row">	
						<div class="col-xxl-9 col-12 nftmax-main__column">
							<div class="nftmax-body">
								<section class="breadcrumbs">
									@include('Layout._includes.breadcrumbs')
								</section>
								<!-- Dashboard Inner -->
								<div class="nftmax-dsinner">
									<!-- Dashboard Slider -->
									<div class="dashboard-banner nftmax-bg-cover mg-top-40" style="background-image:url('assets/img/banner-bg.png')">
										<div class="row">
											<div class="col-12">
												<div class="dashboard-banner__main">
													<div class="dashboard-banner__column dashboard-banner__column--one">
														<!-- Dashboard Content -->
														<div class="dashboard-banner__content">
															<h2 class="dashboard-banner__title nftmax-font-regular nftmax-lspacing">Kendali Mutu SIMAPIP</h2>
															{{-- <p class="dashboard-banner__text nftmax-lspacing">Selamat Datang! : {{ Auth::user()->username }}</p> --}}
														</div>															
														<div class="nftmax-header__author nftmax-header__author-two ">
															<div class="nftmax-header__author-img"><img src="{{ asset('photo/' . Auth::user()->foto) }}" alt="#"></div>
															<div class="nftmax-header__author-content ">
																<h4 class="nftmax-header__author-title nftmax-header__author-title--two nftmax-lspacing">{{ Auth::user()->username }}</h4>
																<p class="nftmax-header__author-text nftmax-header__author-text--two"><a href="#" class="nftmax-font-regular nftmax-lspacing">{{ Auth::user()->email }}</a></p>
															</div>
														</div>
														
														<div class="dashboard-banner__bids">
															<div class="dashboard-banner__bid">
																<!-- Single Bid -->
																<div class="dashboard-banner__group">
																	{{-- <p class="dashboard-banner__group-small">Current Bid</p>
																	<h3 class="dashboard-banner__group-title">{{ $CurrentBid['bids'] }} ETH</h3>
																	<p class="dashboard-banner__group-small">{{ $CurrentBid['usd'] }} <span>USD</span></p> --}}
																</div>
																<!-- End Single Bid -->
																<div class="dashboard-banner__middle-border"></div>
																<!-- Single Bid -->
																<div class="dashboard-banner__group">
																	{{-- <p class="dashboard-banner__group-small">Remaing Time</p>
																	<h3 class="dashboard-banner__group-title" data-countdown="{{ $CurrentBid['count_down_from'] }}"></h3>
																	<p class="dashboard-banner__group-small nftmax-timing"><span>Hrs</span> <span>Min</span> <span>Sec</span></p> --}}
																</div>
																<!-- End Single Bid -->
															</div>
														</div>
														
														<!-- Dashboard Banner Button -->
														<div class="dashboard-banner__button">
															<div class="dashboard-banner__single-btn">
																<a class="dashboard-banner__heart"><i class="fa-solid fa-heart"></i></a>
															</div>
															<div class="dashboard-banner__single-btn dashboard-banner__main-btn">
																<a href="{{url('/template/active-bids')}}" class="nftmax-btn nftmax-btn__secondary radius">Place a Bid</a>
															</div>
															<div class="dashboard-banner__single-btn">
															<a href="{{url('/template/market-place')}}" class="nftmax-btn trs-white">View Art Work</a>
															</div>
														</div>
														<!-- End Dashboard Banner Button -->
													</div>
													<div class="dashboard-banner__column dashboard-banner__column--two">
                                                        <div class="dashboard-banner__slider">
                                                        @foreach($sliderBanner as $sliderBanner)
															<div class="dashboard-banner__single-slider">
																<img src="{{ asset($sliderBanner) }}" alt="#">
															</div>
                                                        @endforeach   
                                                        </div> 
													</div>
												</div>
											</div>
										</div>
									</div>	
									<!-- End Dashboard Slider -->
									
									<!-- Welcome CTA -->
									<div class="welcome-cta mg-top-40">
										<div class="welcome-cta__heading">
											<h2 class="welcome-cta__title">Create your own NFT and extraordinary get lot of Sell..</h2>
											<p class="welcome-cta__text nftmax-lspacing">Buy and sell NFTs from the world’s top artists</p>
										</div>
										<div class="welcome-cta__button">
											<a href="{{url('/template/upload-product')}}" class="nftmax-btn nftmax-btn__bordered bg radius">Upload Products</a>
											<a href="{{url('/template/market-place')}}" class="nftmax-btn trs-white bl-color">View Art Work</a>
										</div>
									</div>
									<!-- End Welcome CTA -->
									
									<!-- Trending Action -->
									<div class="trending-action mg-top-40">
										<h2 class="trending-action__heading">Trending Action</h2>
										<div class="row">
											<div class="col-12">
												<div class="trending-action__slider">
													<!-- Treadning Single -->
													@foreach($TrendingAction as $TrendingAction)
													<div class="trending-action__single">
														<!-- Trending Head -->
														<div class="trending-action__head">
															<div class="trending-action__button">
																<a class="trending-action__btn heart-icon"><i class="fa-solid fa-heart"></i></a>
																<a class="trending-action__btn"><i class="fa-solid fa-ellipsis-vertical"></i></a>
															</div>
															<img src="{{asset($TrendingAction['0'])}}" alt="#">
														</div>
														<!-- Trending Body -->
														<div class="trending-action__body">
															<div class="trending-action__author-meta">
																<div class="trending-action__author-img"><img src="{{asset($TrendingAction['1'])}}" alt="#"></div>
																<p class="trending-action__author-name">Owned by <a href="profile.html">{{ $TrendingAction['2'] }}</a></p>
															</div>
															<h2 class="trending-action__title"><a href="active-bids.html">{{ $TrendingAction['3'] }}</a></h2>
															<div class="dashboard-banner__bid dashboard-banner__bid-v2">
																<!-- Single Bid -->
																<div class="dashboard-banner__group dashboard-banner__group-v2">
																	<p class="dashboard-banner__group-small">Current Bid</p>
																	<h3 class="dashboard-banner__group-title">{{ $TrendingAction['4'] }} ETH</h3>
																</div>
																<!-- End Single Bid -->
																<div class="dashboard-banner__middle-border"></div>
																<!-- Single Bid -->
																<div class="dashboard-banner__group dashboard-banner__group-v2">
																	<p class="dashboard-banner__group-small">Remaining Time</p>
																	<h3 class="dashboard-banner__group-title" data-countdown="{{ $TrendingAction['5'] }}"></h3>
																</div>
																<!-- End Single Bid -->
															</div>
														</div>
														<div class="dashboard-banner__button trending-action__bottom">
															<a href="{{url('/template/active-bids')}}" class="nftmax-btn nftmax-btn__secondary radius">Place a Bid</a>
															<a href="{{url('/template/market-place')}}" class="nftmax-btn trs-white">View Art Work</a>
														</div>
													</div>
													@endforeach
													<!-- End Treadning Single -->
													<!-- End Treadning Single -->
												</div>
											</div>
										</div>
									</div>
									<!-- End Trending Action -->
								</div>
								<!-- End Dashboard Inner -->
							</div>
						</div>
@include('Layout.RightSidebar')						
@include('Layout.Footer')		
		
		{{-- <script>
			const ctx = document.getElementById('myChart_one').getContext('2d');
            var day       = @json($SellHistory[0]);
            var avgSell   = @json($SellHistory[1]);
            var totalSell = @json($SellHistory[2]);
			const myChart_one = new Chart(ctx, {
				type: 'bar',
				
				data: {
					labels: day,
					datasets: [{
						label: 'AVG Sale',
						data: avgSell,
						backgroundColor: [
							'#5356FB',
							'#5356FB',
							'#5356FB',
							'#5356FB',
							'#5356FB',
							'#5356FB',
							'#5356FB',
						],
						
						fill: true,
						tension:0.4,
						borderWidth: 0,
						borderSkipped:false,
						borderRadius:3,
						barPercentage:0.4,
						categoryPercentage:0.4,
					},{
						label: 'Total Sell',
						data: totalSell,
						backgroundColor: [
							'#F239F5',
							'#F239F5',
							'#F239F5',
							'#F239F5',
							'#F239F5',
							'#F239F5',
							'#F239F5',
						],
						borderWidth: 0,
						borderSkipped:false,
						borderRadius:3,
						categoryPercentage:0.4,
						barPercentage: 0.4
					}]
				},
				
				 options: {
					maintainAspectRatio: false,
					responsive: true,
					scales: {
						x:{
							grid:{
								display:false,
								drawBorder: false,
							},
							
						},
						y:{
							grid:{
								drawBorder: false,
							},
						},
					},
					plugins: {
					  legend: {
						position: 'top',
						display: false,
					  },
					  title: {
						display: false,
						text: 'Sell History'
					  }
					}
				}
			});
			
			const ctx_two = document.getElementById('myChart_two').getContext('2d');
            var day = @json($MarketVisitor[0]);
            var visitor = @json($MarketVisitor[1]);
			const myChart_two = new Chart(ctx_two, {
				type: 'line',
				
				data: {
					labels: day,
					datasets: [{
						label: 'Visitor',
						data:visitor,
						backgroundColor: '#FAECFF',
						borderColor:'#DE3DF8',
						pointRadius: 5,
						pointBackgroundColor: '#fff',
						pointBorderColor: '#AE8FF7',
						tension: 0.6,
						borderWidth:4,
						fill:true,
						fillColor:'#fff',
					}]
				},
				
				 options: {
					maintainAspectRatio: false,
					responsive: true,
					scales: {
						x:{
							grid:{
								display:false,
								drawBorder: false,
							},
							
						},
						y:{
							grid:{
								display:false,
								drawBorder: false,
							},
							ticks:{
								display:false
							}
						},
					},
					
					plugins: {
					  legend: {
						position: 'top',
						display: false,
					  },
					  title: {
						display: false,
						text: 'Visitor: 2k'
					  }
					}
				}
			});


			const ctx_two_monthly = document.getElementById('myChart_two_monthly').getContext('2d');
            var day = @json($MarketVisitorMonthly[0]);
            var visitor = @json($MarketVisitorMonthly[1]);
			const myChart_two_monthly = new Chart(ctx_two_monthly, {
				type: 'line',
				
				data: {
					labels: day,
					datasets: [{
						label: 'Visitor',
						data:visitor,
						backgroundColor: '#FAECFF',
						borderColor:'#DE3DF8',
						pointRadius: 5,
						pointBackgroundColor: '#fff',
						pointBorderColor: '#AE8FF7',
						tension: 0.6,
						borderWidth:4,
						fill:true,
						fillColor:'#fff',
					}]
				},
				
				 options: {
					maintainAspectRatio: false,
					responsive: true,
					scales: {
						x:{
							grid:{
								display:false,
								drawBorder: false,
							},
							
						},
						y:{
							grid:{
								display:false,
								drawBorder: false,
							},
							ticks:{
								display:false
							}
						},
					},
					
					plugins: {
					  legend: {
						position: 'top',
						display: false,
					  },
					  title: {
						display: false,
						text: 'Visitor: 2k'
					  }
					}
				}
			});
			const ctx_two_weekly = document.getElementById('myChart_two_weekly').getContext('2d');
            var day = @json($MarketVisitorWeekly[0]);
            var visitor = @json($MarketVisitorWeekly[1]);
			const myChart_two_weekly = new Chart(ctx_two_weekly, {
				type: 'line',
				
				data: {
					labels: day,
					datasets: [{
						label: 'Visitor',
						data:visitor,
						backgroundColor: '#FAECFF',
						borderColor:'#DE3DF8',
						pointRadius: 5,
						pointBackgroundColor: '#fff',
						pointBorderColor: '#AE8FF7',
						tension: 0.6,
						borderWidth:4,
						fill:true,
						fillColor:'#fff',
					}]
				},
				
				 options: {
					maintainAspectRatio: false,
					responsive: true,
					scales: {
						x:{
							grid:{
								display:false,
								drawBorder: false,
							},
							
						},
						y:{
							grid:{
								display:false,
								drawBorder: false,
							},
							ticks:{
								display:false
							}
						},
					},
					
					plugins: {
					  legend: {
						position: 'top',
						display: false,
					  },
					  title: {
						display: false,
						text: 'Visitor: 2k'
					  }
					}
				}
			});

			
			
		</script> --}}
		
	</body>
</html>