<!DOCTYPE html>
<html class="no-js" lang="zxx">
	<head>
		<!-- Meta Tags -->
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="keywords" content="Site keywords here">
		<meta name="description" content="#">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="csrf-token" content="{{ csrf_token() }}">

		<!-- Site Title -->
		<title>SIMAPIP Terintegrasi</title>
		
		<!-- jquery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" 
			integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" 
			crossorigin="anonymous" referrerpolicy="no-referrer"></script>

		{{-- <!-- Toast js Library -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"
        integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw=="
        crossorigin="anonymous"></script> --}}
		
		<!-- StyleSheet Script -->
		<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
		<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
		{{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" 
			integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA==" 
			crossorigin="anonymous" referrerpolicy="no-referrer" /> --}}

			
		
		<!-- Fav Icon -->
		<link rel="icon" href="/assets/img/favicon.png">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@mdi/font@5.8.55/css/materialdesignicons.min.css">

		<!-- CSS Liblaries -->
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
		<link rel="stylesheet" href="https://cdn.datatables.net/2.0.8/css/dataTables.bootstrap4.css">

		<!-- NFTMax Stylesheet -->
		
		<link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}">
		<link rel="stylesheet" href="{{asset('assets/css/iziToast.min.css')}}">
		<link rel="stylesheet" href="{{asset('assets/css/font-awesome-all.min.css')}}">
		<link rel="stylesheet" href="{{asset('assets/css/charts.min.css')}}">
		<link rel="stylesheet" href="{{asset('assets/css/slickslider.min.css')}}">
		<link rel="stylesheet" href="{{asset('assets/css/reset.css')}}">
		<link rel="stylesheet" href="{{asset('assets/style.css')}}">
		<link rel="stylesheet" href="{{asset('assets/custom.css')}}">

      @vite(['resources/js/app.js'])
	</head>
	<style>
	.profile-icon:hover path {
    	fill: white;
	}
	</style>
	<body>

		<div class="body-bg" style="background-image:url('/assets/img/body-bg.jpg')">

			<!-- NFTMax Admin Menu -->
			<div class="nftmax-smenu">
				<!-- Admin Menu -->
				<div class="admin-menu">
					<!-- Logo -->
					<div class="logo">
						<a href="{{ url('/') }}">
							<img class="nftmax-logo__main" style="width: 90%" src="/assets/img/logo-white.png" alt="#">
						</a>
						<div class="nftmax__sicon close-icon"><img src="/assets/img/menu-toggle.svg" alt="#"></div>
					</div>
					<!-- Author Details -->
					<div class="admin-menu__one">
						<h4 class="admin-menu__title nftmax-scolor">Menu</h4>
						<!-- Nav Menu -->
						<div class="menu-bar">
							<ul class="menu-bar__one">
								<li class="{{ Request::path() == 'dashboard' ? 'active' : '' }}"><a href="{{url('/')}}"><span class="menu-bar__text"><span class="nftmax-menu-icon nftmax-svg-icon__v1"><svg class="nftmax-svg-icon scroll-icon" xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16"><path d="M0.800781 2.60005V7.40005H7.40078V0.800049H2.60078C2.12339 0.800049 1.66555 0.989691 1.32799 1.32726C0.990424 1.66482 0.800781 2.12266 0.800781 2.60005H0.800781Z"></path><path d="M13.4016 0.800049H8.60156V7.40005H15.2016V2.60005C15.2016 2.12266 15.0119 1.66482 14.6744 1.32726C14.3368 0.989691 13.879 0.800049 13.4016 0.800049V0.800049Z"></path><path d="M0.800781 13.4001C0.800781 13.8775 0.990424 14.3353 1.32799 14.6729C1.66555 15.0105 2.12339 15.2001 2.60078 15.2001H7.40078V8.6001H0.800781V13.4001Z"></path><path d="M8.60156 15.2001H13.4016C13.879 15.2001 14.3368 15.0105 14.6744 14.6729C15.0119 14.3353 15.2016 13.8775 15.2016 13.4001V8.6001H8.60156V15.2001Z"></path></svg></span><span class="menu-bar__name">Dashboard</span></span></a></li>							
								<li class="{{ Request::path() == 'daftar-penugasan' ? 'active' : '' }}"><a href="{{url('/daftar-penugasan')}}"><span class="menu-bar__text"><span class="nftmax-menu-icon nftmax-svg-icon__v3"><svg class="nftmax-svg-icon scroll-icon" viewBox="0 0 13 14" xmlns="http://www.w3.org/2000/svg"><path d="M10.2704 9.42604C9.70288 9.42584 9.14549 9.27516 8.65433 8.98917C8.16317 9.27516 7.60578 9.42584 7.03831 9.42604H5.96096C5.39271 9.42532 4.83491 9.27227 4.34494 8.98267C3.85499 9.27232 3.29717 9.42537 2.72891 9.42604H2.19024C1.62228 9.42585 1.06457 9.27377 0.574219 8.98538V11.5942C0.574219 12.0254 0.744478 12.439 1.04754 12.744C1.3506 13.0489 1.76165 13.2202 2.19024 13.2202H10.809C11.2376 13.2202 11.6487 13.0489 11.9517 12.744C12.2548 12.439 12.425 12.0254 12.425 11.5942V8.98592C11.9346 9.27391 11.3769 9.42578 10.809 9.42604H10.2704Z"></path><path d="M9.20833 0V3.24641H8.125V0H4.875V3.24641H3.79167V0H1.19167L0.013 5.29327L0 5.95175C0 6.52575 0.228273 7.07624 0.634602 7.48212C1.04093 7.888 1.59203 8.11602 2.16667 8.11602H2.70833C3.01703 8.11503 3.32189 8.04774 3.60227 7.91872C3.88264 7.78971 4.13197 7.60198 4.33333 7.36827C4.5347 7.60198 4.78402 7.78971 5.0644 7.91872C5.34477 8.04774 5.64964 8.11503 5.95833 8.11602H7.04167C7.34923 8.11618 7.65329 8.05077 7.93352 7.92415C8.21375 7.79753 8.4637 7.61263 8.66667 7.38179C8.86963 7.61263 9.11958 7.79753 9.39981 7.92415C9.68004 8.05077 9.9841 8.11618 10.2917 8.11602H10.8333C11.408 8.11602 11.9591 7.888 12.3654 7.48212C12.7717 7.07624 13 6.52575 13 5.95175V5.41068L11.8083 0H9.20833Z"></path></svg></span><span class="menu-bar__name">Daftar Penugasan</span><span class="menu-bar__count ntfmax__bgc--2">{{ $SidebarInf['market_place'] }}</span></span></a></li>
								{{-- <li><a href="{{url('/unit-kerja')}}"><span class="menu-bar__text"><span class="nftmax-menu-icon nftmax-svg-icon__v5"><svg class="nftmax-svg-icon scroll-icon" viewBox="0 0 15 15" xmlns="http://www.w3.org/2000/svg"><path d="M14.1755 7.88376L11.9493 9.56253L12.7948 12.266C12.9314 12.6853 12.9331 13.1389 12.7997 13.5593C12.6663 13.9797 12.4049 14.3444 12.0544 14.5988C11.7099 14.8615 11.2925 15.0022 10.8643 15C10.436 14.9978 10.02 14.8528 9.67807 14.5866L7.50125 12.9323L5.3238 14.5846C4.97996 14.8458 4.56476 14.9876 4.13792 14.9898C3.71108 14.9919 3.29457 14.8542 2.94827 14.5966C2.60197 14.3389 2.34373 13.9745 2.21066 13.5557C2.0776 13.1369 2.07657 12.6854 2.20772 12.266L3.05318 9.56253L0.826957 7.88376C0.483556 7.62452 0.22828 7.25987 0.0975914 6.84188C-0.0330973 6.4239 -0.0325136 5.97396 0.0992584 5.55633C0.23103 5.13871 0.487251 4.77476 0.831323 4.51648C1.17539 4.25819 1.58972 4.11878 2.01511 4.11815H4.74974L5.57957 1.44762C5.71006 1.02726 5.96649 0.660548 6.31187 0.400372C6.65724 0.140196 7.07372 0 7.50125 0C7.92878 0 8.34526 0.140196 8.69064 0.400372C9.03601 0.660548 9.29244 1.02726 9.42293 1.44762L10.2528 4.11815H12.9849C13.4103 4.11878 13.8246 4.25819 14.1687 4.51648C14.5127 4.77476 14.769 5.13871 14.9007 5.55633C15.0325 5.97396 15.0331 6.4239 14.9024 6.84188C14.7717 7.25987 14.5164 7.62452 14.173 7.88376H14.1755Z"></path></svg></span><span class="menu-bar__name">Daftar Unit Kerja</span></span></a></li> --}}
								{{-- @can('View Penugasan Saya') --}}
									<li class="{{ Request::path() == 'all-saved' ? 'active' : '' }}"><a href="{{url('/all-saved')}}"><span class="menu-bar__text"><span class="nftmax-menu-icon nftmax-svg-icon__v7"><svg class="nftmax-svg-icon scroll-icon" viewBox="0 0 14 13" xmlns="http://www.w3.org/2000/svg"><path d="M3.79296 0C4.44956 0.010169 5.09184 0.192671 5.65493 0.529075C6.21803 0.86548 6.682 1.34387 7 1.91595C7.318 1.34387 7.78197 0.86548 8.34507 0.529075C8.90816 0.192671 9.55044 0.010169 10.207 0C11.2537 0.0452807 12.2399 0.501197 12.9501 1.26814C13.6602 2.03509 14.0367 3.05073 13.9972 4.09316C13.9972 8.02666 7.60875 12.5698 7.33703 12.7625L7 13L6.66297 12.7625C6.39125 12.5709 0.00282288 8.02666 0.00282288 4.09316C-0.0366831 3.05073 0.339771 2.03509 1.04994 1.26814C1.76011 0.501197 2.74626 0.0452807 3.79296 0Z"></path></svg></span><span class="menu-bar__name">Penugasan Saya</span><span class="menu-bar__count ntfmax__bgc--7">{{ $SidebarInf['saved'] }}</span></span></a></li>
								{{-- @endcan --}}
								<li class="{{ Request::path() == 'message' ? 'active' : '' }}"><a href="{{url('/message') }}"><span class="menu-bar__text"><span class="nftmax-menu-icon nftmax-svg-icon__v8"><svg class="nftmax-svg-icon scroll-icon"  viewBox="0 0 14 13" xmlns="http://www.w3.org/2000/svg"><path d="M13.9729 3L9.06236 7.82172C7.92242 8.93841 6.07703 8.93841 4.93709 7.82172L0.0267964 3C0.0185934 3.09048 0 3.17238 0 3.26232V10.1359C0.00191403 11.7168 1.30673 12.9981 2.9167 13H11.0833C12.6933 12.9981 13.9981 11.7168 14 10.1359V3.26232C13.9997 3.17238 13.9811 3.09048 13.9729 3Z"></path><path d="M8.31954 6.50593L14 1.35845C13.4403 0.517707 12.4369 0.00264136 11.353 0H2.64666C1.5631 0.00264136 0.559417 0.517707 0 1.35845L5.68046 6.50593C6.40983 7.16469 7.58988 7.16469 8.31954 6.50593Z"></path></svg></span><span class="menu-bar__name">Pelaporan</span></span></a></li>
								<li class="{{ Request::path() == 'history' ? 'active' : '' }}"><a href="{{url('/history')}}"><span class="menu-bar__text"><span class="nftmax-menu-icon nftmax-svg-icon__v9"><svg class="nftmax-svg-icon scroll-icon"  viewBox="0 0 19 19" xmlns="http://www.w3.org/2000/svg"><path d="M9.37855 15.6715C10.5752 15.6715 11.745 15.3166 12.74 14.6518C13.7349 13.987 14.5104 13.042 14.9684 11.9365C15.4263 10.8309 15.5461 9.61436 15.3127 8.4407C15.0792 7.26704 14.503 6.18896 13.6568 5.3428C12.8107 4.49664 11.7326 3.92039 10.5589 3.68694C9.38526 3.45348 8.16873 3.5733 7.06316 4.03124C5.9576 4.48918 5.01266 5.26467 4.34783 6.25966C3.683 7.25464 3.32816 8.42442 3.32816 9.62107C3.33057 11.225 3.9688 12.7625 5.10295 13.8967C6.23709 15.0308 7.77463 15.669 9.37855 15.6715ZM8.70628 7.60428C8.70628 7.42598 8.77711 7.25499 8.90318 7.12891C9.02926 7.00284 9.20025 6.93201 9.37855 6.93201C9.55684 6.93201 9.72784 7.00284 9.85391 7.12891C9.97999 7.25499 10.0508 7.42598 10.0508 7.60428V9.33872L11.2811 10.569C11.4068 10.6957 11.4772 10.8672 11.4768 11.0457C11.4765 11.2243 11.4054 11.3954 11.2791 11.5216C11.1529 11.6479 10.9817 11.719 10.8032 11.7193C10.6246 11.7197 10.4532 11.6493 10.3264 11.5236L8.90124 10.0984C8.7779 9.96987 8.70818 9.79918 8.70628 9.62107V7.60428Z"></path><path d="M9.37854 0.209365C9.20024 0.209365 9.02925 0.280193 8.90317 0.406267C8.7771 0.532342 8.70627 0.703335 8.70627 0.881631C8.70627 1.05993 8.7771 1.23092 8.90317 1.35699C9.02925 1.48307 9.20024 1.5539 9.37854 1.5539C11.2605 1.54612 13.0865 2.19384 14.5428 3.38583C15.9992 4.57782 16.9951 6.23969 17.3595 8.08605C17.7239 9.93241 17.4341 11.848 16.5398 13.504C15.6455 15.1599 14.2026 16.4528 12.4588 17.1606C10.715 17.8685 8.77918 17.9471 6.98374 17.3829C5.1883 16.8188 3.64531 15.6471 2.61973 14.0691C1.59415 12.4911 1.15 10.6053 1.36354 8.73548C1.57707 6.86565 2.43498 5.12852 3.78993 3.82239L3.74435 4.17009C3.72117 4.3469 3.76918 4.52568 3.87782 4.6671C3.98646 4.80852 4.14682 4.90099 4.32364 4.92417C4.50045 4.94734 4.67924 4.89933 4.82065 4.7907C4.96207 4.68206 5.05454 4.52169 5.07772 4.34487L5.33936 2.34515C5.35537 2.16962 5.30457 1.99451 5.19711 1.8548C5.08964 1.71508 4.93343 1.62105 4.75967 1.59148L2.75995 1.33003C2.6712 1.31592 2.58053 1.31974 2.49328 1.34127C2.40604 1.3628 2.324 1.40161 2.25201 1.45539C2.18002 1.50917 2.11954 1.57684 2.07415 1.6544C2.02876 1.73195 1.99938 1.81782 1.98775 1.90693C1.97612 1.99603 1.98247 2.08657 2.00643 2.17318C2.03038 2.25979 2.07146 2.34071 2.12723 2.41118C2.183 2.48164 2.25233 2.5402 2.33112 2.58341C2.40991 2.62662 2.49657 2.65359 2.58597 2.66273L3.00459 2.71759C1.3997 4.20681 0.365311 6.20977 0.0800858 8.38051C-0.20514 10.5512 0.27671 12.7534 1.44241 14.6067C2.6081 16.46 4.38444 17.8479 6.4646 18.5308C8.54476 19.2138 10.7981 19.1487 12.8354 18.347C14.8728 17.5453 16.5661 16.0573 17.623 14.1399C18.6799 12.2225 19.034 9.99617 18.6241 7.84549C18.2142 5.69482 17.0661 3.75482 15.378 2.3606C13.6899 0.966386 11.5679 0.205498 9.37854 0.209365Z"></path></svg></span><span class="menu-bar__name">Riwayat Penugasan</span></span></a></li>
							</ul>
						</div>
						<!-- End Nav Menu -->
					</div>

					<div class="admin-menu__two mg-top-50">
						<h4 class="admin-menu__title nftmax-scolor">Perencanaan</h4>
						<!-- Nav Menu -->
						<div class="menu-bar">
							<ul class="menu-bar__one">
								{{-- @can('View Kartu Penugasan') --}}
									<li class="{{ Request::is('kartu-penugasan') || Request::is('kartu-penugasan/create') || Request::is('kartu-penugasan/edit/*') ? 'active' : '' }}"><a href="{{url('/kartu-penugasan')}}"><span class="menu-bar__text"><span class="nftmax-menu-icon nftmax-svg-icon__v8"><svg class="nftmax-svg-icon" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-envelope-paper-fill" viewBox="0 0 16 16"><path d="M6.5 9.5 3 7.5v-6A1.5 1.5 0 0 1 4.5 0h7A1.5 1.5 0 0 1 13 1.5v6l-3.5 2L8 8.75zM1.059 3.635 2 3.133v3.753L0 5.713V5.4a2 2 0 0 1 1.059-1.765M16 5.713l-2 1.173V3.133l.941.502A2 2 0 0 1 16 5.4zm0 1.16-5.693 3.337L16 13.372v-6.5Zm-8 3.199 7.941 4.412A2 2 0 0 1 14 16H2a2 2 0 0 1-1.941-1.516zm-8 3.3 5.693-3.162L0 6.873v6.5Z"/></svg></span><span class="menu-bar__name">Kartu Penugasan</span></span></a></li>
								{{-- @endcan --}}
								@can('View PKPT')
									<li class="{{ Request::is('PKPT') || Request::is('PKPT/create') || Request::is('PKPT/edit/*') ? 'active' : '' }}"><a href="{{url('/PKPT')}}"><span class="menu-bar__text"><span class="nftmax-menu-icon nftmax-svg-icon__v8"><svg class="nftmax-svg-icon pkpt-icon" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-puzzle-fill" viewBox="0 0 16 16"><path d="M3.112 3.645A1.5 1.5 0 0 1 4.605 2H7a.5.5 0 0 1 .5.5v.382c0 .696-.497 1.182-.872 1.469a.5.5 0 0 0-.115.118l-.012.025L6.5 4.5v.003l.003.01q.005.015.036.053a.9.9 0 0 0 .27.194C7.09 4.9 7.51 5 8 5c.492 0 .912-.1 1.19-.24a.9.9 0 0 0 .271-.194.2.2 0 0 0 .036-.054l.003-.01v-.008l-.012-.025a.5.5 0 0 0-.115-.118c-.375-.287-.872-.773-.872-1.469V2.5A.5.5 0 0 1 9 2h2.395a1.5 1.5 0 0 1 1.493 1.645L12.645 6.5h.237c.195 0 .42-.147.675-.48.21-.274.528-.52.943-.52.568 0 .947.447 1.154.862C15.877 6.807 16 7.387 16 8s-.123 1.193-.346 1.638c-.207.415-.586.862-1.154.862-.415 0-.733-.246-.943-.52-.255-.333-.48-.48-.675-.48h-.237l.243 2.855A1.5 1.5 0 0 1 11.395 14H9a.5.5 0 0 1-.5-.5v-.382c0-.696.497-1.182.872-1.469a.5.5 0 0 0 .115-.118l.012-.025.001-.006v-.003l-.003-.01a.2.2 0 0 0-.036-.053.9.9 0 0 0-.27-.194C8.91 11.1 8.49 11 8 11s-.912.1-1.19.24a.9.9 0 0 0-.271.194.2.2 0 0 0-.036.054l-.003.01v.002l.001.006.012.025c.016.027.05.068.115.118.375.287.872.773.872 1.469v.382a.5.5 0 0 1-.5.5H4.605a1.5 1.5 0 0 1-1.493-1.645L3.356 9.5h-.238c-.195 0-.42.147-.675.48-.21.274-.528.52-.943.52-.568 0-.947-.447-1.154-.862C.123 9.193 0 8.613 0 8s.123-1.193.346-1.638C.553 5.947.932 5.5 1.5 5.5c.415 0 .733.246.943.52.255.333.48.48.675.48h.238z"/></svg></span><span class="menu-bar__name">PKPT</span><span class="menu-bar__count ntfmax__bgc--2">{{ $SidebarInf['market_place'] }}</span></span></a></li>
								@endcan
								@can('View RPKH')
									<li class="{{ Request::is('RPKH') || Request::is('RPKH/create') || Request::is('RPKH/edit/*') ? 'active' : '' }}"><a href="{{url('/RPKH') }}"><span class="menu-bar__text"><span class="nftmax-menu-icon nftmax-svg-icon__v8"><svg class="nftmax-svg-icon rpkh-icon" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-globe-americas" viewBox="0 0 16 16"><path d="M8 0a8 8 0 1 0 0 16A8 8 0 0 0 8 0M2.04 4.326c.325 1.329 2.532 2.54 3.717 3.19.48.263.793.434.743.484q-.121.12-.242.234c-.416.396-.787.749-.758 1.266.035.634.618.824 1.214 1.017.577.188 1.168.38 1.286.983.082.417-.075.988-.22 1.52-.215.782-.406 1.48.22 1.48 1.5-.5 3.798-3.186 4-5 .138-1.243-2-2-3.5-2.5-.478-.16-.755.081-.99.284-.172.15-.322.279-.51.216-.445-.148-2.5-2-1.5-2.5.78-.39.952-.171 1.227.182.078.099.163.208.273.318.609.304.662-.132.723-.633.039-.322.081-.671.277-.867.434-.434 1.265-.791 2.028-1.12.712-.306 1.365-.587 1.579-.88A7 7 0 1 1 2.04 4.327Z"/></svg></span><span class="menu-bar__name">RPKH</span></span></a></li>
								@endcan
								@can('View Reviu')
									<li class="{{ Request::is('Reviu') || Request::is('Reviu/create') || Request::is('Reviu/edit/*') ? 'active' : '' }}"><a href="{{url('/Reviu') }}"><span class="menu-bar__text"><span class="nftmax-menu-icon nftmax-svg-icon__v8"><svg class="nftmax-svg-icon" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chat-right-quote-fill" viewBox="0 0 16 16"><path d="M16 2a2 2 0 0 0-2-2H2a2 2 0 0 0-2 2v8a2 2 0 0 0 2 2h9.586a1 1 0 0 1 .707.293l2.853 2.853a.5.5 0 0 0 .854-.353zM7.194 4.766q.13.188.227.401c.428.948.393 2.377-.942 3.706a.446.446 0 0 1-.612.01.405.405 0 0 1-.011-.59c.419-.416.672-.831.809-1.22-.269.165-.588.26-.93.26C4.775 7.333 4 6.587 4 5.667S4.776 4 5.734 4c.271 0 .528.06.756.166l.008.004c.169.07.327.182.469.324q.128.125.227.272M11 7.073c-.269.165-.588.26-.93.26-.958 0-1.735-.746-1.735-1.666S9.112 4 10.069 4c.271 0 .528.06.756.166l.008.004c.17.07.327.182.469.324q.128.125.227.272.131.188.228.401c.428.948.392 2.377-.942 3.706a.446.446 0 0 1-.613.01.405.405 0 0 1-.011-.59c.42-.416.672-.831.81-1.22z"/></svg></span><span class="menu-bar__name">Reviu</span></span></a></li>
								@endcan
							</ul>
						</div>
						<!-- End Nav Menu -->
					</div>

					<div class="admin-menu__two mg-top-50">
						<h4 class="admin-menu__title nftmax-scolor">Referensi</h4>
						<!-- Nav Menu -->
						<div class="menu-bar">
							<ul class="menu-bar__one">
								@can('View Data Pegawai')
									<li class="{{ Request::is('pegawai') || Request::is('pegawai/create') || Request::is('pegawai/edit/*') ? 'active' : '' }}"><a href="{{url('/pegawai')}}"><span class="menu-bar__text"><span class="nftmax-menu-icon nftmax-svg-icon__v2"><svg class="nftmax-svg-icon pegawai-icon" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-lines-fill" viewBox="0 0 16 16"><path d="M6 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6m-5 6s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zM11 3.5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4a.5.5 0 0 1-.5-.5m.5 2.5a.5.5 0 0 0 0 1h4a.5.5 0 0 0 0-1zm2 3a.5.5 0 0 0 0 1h2a.5.5 0 0 0 0-1zm0 3a.5.5 0 0 0 0 1h2a.5.5 0 0 0 0-1z"/></svg></span><span class="menu-bar__name">Data Pegawai</span></span></a></li>
								@endcan
								{{-- @can('View PKPT')
									<li class="{{ Request::path() == 'PKPT/ref-PKPT' ? 'active' : '' }}"><a href="{{url('/PKPT/ref-PKPT')}}"><span class="menu-bar__text"><span class="nftmax-menu-icon nftmax-svg-icon__v8"><svg  class="nftmax-svg-icon scroll-icon" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-puzzle" viewBox="0 0 16 16"><path d="M3.112 3.645A1.5 1.5 0 0 1 4.605 2H7a.5.5 0 0 1 .5.5v.382c0 .696-.497 1.182-.872 1.469a.5.5 0 0 0-.115.118l-.012.025L6.5 4.5v.003l.003.01q.005.015.036.053a.9.9 0 0 0 .27.194C7.09 4.9 7.51 5 8 5c.492 0 .912-.1 1.19-.24a.9.9 0 0 0 .271-.194.2.2 0 0 0 .039-.063v-.009l-.012-.025a.5.5 0 0 0-.115-.118c-.375-.287-.872-.773-.872-1.469V2.5A.5.5 0 0 1 9 2h2.395a1.5 1.5 0 0 1 1.493 1.645L12.645 6.5h.237c.195 0 .42-.147.675-.48.21-.274.528-.52.943-.52.568 0 .947.447 1.154.862C15.877 6.807 16 7.387 16 8s-.123 1.193-.346 1.638c-.207.415-.586.862-1.154.862-.415 0-.733-.246-.943-.52-.255-.333-.48-.48-.675-.48h-.237l.243 2.855A1.5 1.5 0 0 1 11.395 14H9a.5.5 0 0 1-.5-.5v-.382c0-.696.497-1.182.872-1.469a.5.5 0 0 0 .115-.118l.012-.025.001-.006v-.003a.2.2 0 0 0-.039-.064.9.9 0 0 0-.27-.193C8.91 11.1 8.49 11 8 11s-.912.1-1.19.24a.9.9 0 0 0-.271.194.2.2 0 0 0-.039.063v.003l.001.006.012.025c.016.027.05.068.115.118.375.287.872.773.872 1.469v.382a.5.5 0 0 1-.5.5H4.605a1.5 1.5 0 0 1-1.493-1.645L3.356 9.5h-.238c-.195 0-.42.147-.675.48-.21.274-.528.52-.943.52-.568 0-.947-.447-1.154-.862C.123 9.193 0 8.613 0 8s.123-1.193.346-1.638C.553 5.947.932 5.5 1.5 5.5c.415 0 .733.246.943.52.255.333.48.48.675.48h.238zM4.605 3a.5.5 0 0 0-.498.55l.001.007.29 3.4A.5.5 0 0 1 3.9 7.5h-.782c-.696 0-1.182-.497-1.469-.872a.5.5 0 0 0-.118-.115l-.025-.012L1.5 6.5h-.003a.2.2 0 0 0-.064.039.9.9 0 0 0-.193.27C1.1 7.09 1 7.51 1 8s.1.912.24 1.19c.07.14.14.225.194.271a.2.2 0 0 0 .063.039H1.5l.006-.001.025-.012a.5.5 0 0 0 .118-.115c.287-.375.773-.872 1.469-.872H3.9a.5.5 0 0 1 .498.542l-.29 3.408a.5.5 0 0 0 .497.55h1.878c-.048-.166-.195-.352-.463-.557-.274-.21-.52-.528-.52-.943 0-.568.447-.947.862-1.154C6.807 10.123 7.387 10 8 10s1.193.123 1.638.346c.415.207.862.586.862 1.154 0 .415-.246.733-.52.943-.268.205-.415.39-.463.557h1.878a.5.5 0 0 0 .498-.55l-.001-.007-.29-3.4A.5.5 0 0 1 12.1 8.5h.782c.696 0 1.182.497 1.469.872.05.065.091.099.118.115l.025.012.006.001h.003a.2.2 0 0 0 .064-.039.9.9 0 0 0 .193-.27c.14-.28.24-.7.24-1.191s-.1-.912-.24-1.19a.9.9 0 0 0-.194-.271.2.2 0 0 0-.063-.039H14.5l-.006.001-.025.012a.5.5 0 0 0-.118.115c-.287.375-.773.872-1.469.872H12.1a.5.5 0 0 1-.498-.543l.29-3.407a.5.5 0 0 0-.497-.55H9.517c.048.166.195.352.463.557.274.21.52.528.52.943 0 .568-.447.947-.862 1.154C9.193 5.877 8.613 6 8 6s-1.193-.123-1.638-.346C5.947 5.447 5.5 5.068 5.5 4.5c0-.415.246-.733.52-.943.268-.205.415-.39.463-.557z"/></svg></span><span class="menu-bar__name">PKPT (Referensi)</span></span></a></li>
								@endcan --}}
								@can('View Strata Pendidikan')
									<li class="{{ Request::is('strata-pendidikan') || Request::is('strata-pendidikan/create') || Request::is('strata-pendidikan/edit/*') ? 'active' : '' }}"><a href="{{url('/strata-pendidikan')}}"><span class="menu-bar__text"><span class="nftmax-menu-icon nftmax-svg-icon__v2"><svg class="nftmax-svg-icon pendidikan-icon" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg"><path d="M8.40093 8.39892C8.07534 8.74593 7.8023 9.13874 7.59052 9.56484L13.3422 15.3165C13.4732 15.4475 13.651 15.5211 13.8362 15.5211C14.0215 15.5211 14.1992 15.4475 14.3303 15.3165L15.3185 14.3283C15.3834 14.2634 15.4349 14.1864 15.47 14.1016C15.5052 14.0168 15.5232 13.9259 15.5232 13.8342C15.5232 13.7424 15.5052 13.6515 15.47 13.5667C15.4349 13.482 15.3834 13.4049 15.3185 13.34L9.56685 7.5899C9.13999 7.79984 8.74699 8.07254 8.40093 8.39892Z"></path><path d="M4.94216 4.94003C4.41373 5.43043 3.80202 5.8226 3.1358 6.09809L6.74747 9.70976C7.02543 9.04469 7.41799 8.43359 7.90728 7.90427C8.43576 7.4139 9.04746 7.02168 9.71363 6.74604L6.10179 3.13507C5.82373 3.79989 5.43125 4.41079 4.94216 4.94003Z"></path><path d="M7.4116 0.494075L6.42351 1.48216C6.15066 1.75501 6.15066 2.19739 6.42351 2.47024L10.3758 6.42256C10.6487 6.69541 11.0911 6.69541 11.3639 6.42256L12.352 5.43448C12.6249 5.16163 12.6249 4.71925 12.352 4.4464L8.39968 0.494075C8.12683 0.221224 7.68445 0.221224 7.4116 0.494075Z"></path><path d="M1.48209 6.42236L0.49401 7.41044C0.221159 7.68329 0.221159 8.12567 0.49401 8.39852L4.44633 12.3508C4.71919 12.6237 5.16156 12.6237 5.43441 12.3508L6.4225 11.3628C6.69535 11.0899 6.69535 10.6475 6.4225 10.3747L2.47017 6.42236C2.19732 6.14951 1.75494 6.14951 1.48209 6.42236Z"></path></svg></span><span class="menu-bar__name">Strata Pendidikan</span></span></a></li>
								@endcan
								@can('View Daftar Unit Kerja')
									<li class="{{ Request::is('unit-kerja') || Request::is('unit-kerja/create') || Request::is('unit-kerja/edit/*') ? 'active' : '' }}"><a href="{{url('/unit-kerja')}}"><span class="menu-bar__text"><span class="nftmax-menu-icon nftmax-svg-icon__v2"><svg class="nftmax-svg-icon unitkerja-icon" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-card-list" viewBox="0 0 16 16"><path d="M14.5 3a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-13a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5zm-13-1A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2z"/><path d="M5 8a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7A.5.5 0 0 1 5 8m0-2.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5m0 5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5m-1-5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0M4 8a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0m0 2.5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0"/></svg></span><span class="menu-bar__name">Daftar Unit Kerja</span></span></a></li>
								@endcan
								@can('View Jenis Pengawasan')
									<li class="{{ Request::is('jenis-pengawasan') || Request::is('jenis-pengawasan/create') || Request::is('jenis-pengawasan/edit/*') ? 'active' : '' }}"><a href="{{ url('/jenis-pengawasan') }}"><span class="menu-bar__text"><span class="nftmax-menu-icon nftmax-svg-icon__v2"><svg class="nftmax-svg-icon jenis-pengawasan-icon" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-text-indent-left" viewBox="0 0 16 16" onmouseover="this.setAttribute('fill', 'white')" onmouseout="this.setAttribute('fill', 'currentColor')"><path d="M2 3.5a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5m.646 2.146a.5.5 0 0 1 .708 0l2 2a.5.5 0 0 1 0 .708l-2 2a.5.5 0 0 1-.708-.708L4.293 8 2.646 6.354a.5.5 0 0 1 0-.708M7 6.5a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 0 1h-6a.5.5 0 0 1-.5-.5m0 3a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 0 1h-6a.5.5 0 0 1-.5-.5m-5 3a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5"/></svg></span><span class="menu-bar__name">Jenis Pengawasan</span></span></a></li>								
								@endcan
								@can('View Obyek')
									<li class="{{ Request::is('obyek') || Request::is('obyek/create') || Request::is('obyek/edit/*') ? 'active' : '' }}"><a href="{{url('/obyek')}}"><span class="menu-bar__text"><span class="nftmax-menu-icon nftmax-svg-icon__v8"><svg class="nftmax-svg-icon obyek-icon" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-badge" viewBox="0 0 16 16"><path d="M6.5 2a.5.5 0 0 0 0 1h3a.5.5 0 0 0 0-1zM11 8a3 3 0 1 1-6 0 3 3 0 0 1 6 0"/><path d="M4.5 0A2.5 2.5 0 0 0 2 2.5V14a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V2.5A2.5 2.5 0 0 0 11.5 0zM3 2.5A1.5 1.5 0 0 1 4.5 1h7A1.5 1.5 0 0 1 13 2.5v10.795a4.2 4.2 0 0 0-.776-.492C11.392 12.387 10.063 12 8 12s-3.392.387-4.224.803a4.2 4.2 0 0 0-.776.492z"/></svg></span><span class="menu-bar__name">Obyek</span></span></a></li>								
								@endcan
								@can('View Jenjang Jabatan')
									<li class="{{ Request::is('jenjangJabatan') || Request::is('jenjangJabatan/create') || Request::is('jenjangJabatan/edit/*') ? 'active' : '' }}"><a href="{{url('/jenjangJabatan') }}"><span class="menu-bar__text"><span class="nftmax-menu-icon nftmax-svg-icon__v8"><svg class="nftmax-svg-icon jenjang-jabatan-icon" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-people" viewBox="0 0 16 16"><path d="M15 14s1 0 1-1-1-4-5-4-5 3-5 4 1 1 1 1zm-7.978-1L7 12.996c.001-.264.167-1.03.76-1.72C8.312 10.629 9.282 10 11 10c1.717 0 2.687.63 3.24 1.276.593.69.758 1.457.76 1.72l-.008.002-.014.002zM11 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4m3-2a3 3 0 1 1-6 0 3 3 0 0 1 6 0M6.936 9.28a6 6 0 0 0-1.23-.247A7 7 0 0 0 5 9c-4 0-5 3-5 4q0 1 1 1h4.216A2.24 2.24 0 0 1 5 13c0-1.01.377-2.042 1.09-2.904.243-.294.526-.569.846-.816M4.92 10A5.5 5.5 0 0 0 4 13H1c0-.26.164-1.03.76-1.724.545-.636 1.492-1.256 3.16-1.275ZM1.5 5.5a3 3 0 1 1 6 0 3 3 0 0 1-6 0m3-2a2 2 0 1 0 0 4 2 2 0 0 0 0-4"/></svg></span><span class="menu-bar__name">Jenjang Jabatan</span></span></a></li>								
								@endcan
								@can('View Jabatan')
									<li class="{{ Request::is('jabatan') || Request::is('jabatan/create') || Request::is('jabatan/edit/*') ? 'active' : '' }}"><a href="{{url('/jabatan')}}"><span class="menu-bar__text"><span class="nftmax-menu-icon nftmax-svg-icon__v3"><svg class="nftmax-svg-icon jabatan-icon" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person" viewBox="0 0 16 16"><path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6m2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0m4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4m-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10s-3.516.68-4.168 1.332c-.678.678-.83 1.418-.832 1.664z"/></svg></span><span class="menu-bar__name">Jabatan</span></span></a></li>								
								@endcan
								@can('View Pangkat')
									<li class="{{ Request::is('pangkat') || Request::is('pangkat/create') || Request::is('pangkat/edit/*') ? 'active' : '' }}"><a href="{{url('/pangkat')}}"><span class="menu-bar__text"><span class="nftmax-menu-icon nftmax-svg-icon__v9"><svg class="nftmax-svg-icon scroll-icon" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-kanban" viewBox="0 0 16 16"><path d="M13.5 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1h-11a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1zm-11-1a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h11a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2z"/><path d="M6.5 3a1 1 0 0 1 1-1h1a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1h-1a1 1 0 0 1-1-1zm-4 0a1 1 0 0 1 1-1h1a1 1 0 0 1 1 1v7a1 1 0 0 1-1 1h-1a1 1 0 0 1-1-1zm8 0a1 1 0 0 1 1-1h1a1 1 0 0 1 1 1v10a1 1 0 0 1-1 1h-1a1 1 0 0 1-1-1z"/></svg></span><span class="menu-bar__name">Pangkat</span></span></a></li>
								@endcan								
							</ul>
						</div>
						<!-- End Nav Menu -->
					</div>

					<div class="admin-menu__three mg-top-50">
						<h4 class="admin-menu__title nftmax-scolor">User Management</h4>
						<!-- Nav Menu -->
						<div class="menu-bar">
							<ul class="menu-bar__one">
								@can('View Permission')
									<li class="{{ Request::is('permissions') || Request::is('permissions/create') || Request::is('permissions/*/edit') ? 'active' : '' }}"><a href="{{url('permissions')}}"><span class="menu-bar__text"><span class="nftmax-menu-icon nftmax-svg-icon__v10"><svg class="nftmax-svg-icon scroll-icon" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-circle-fill" viewBox="0 0 16 16"><path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0m-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/></svg></span><span class="menu-bar__name">Permissions</span></span></a></li>
								@endcan
								@can('View Role')
									<li class="{{ Request::is('roles') || Request::is('roles/create') || Request::is('roles/*/edit') || Request::is('roles/*/give-permissions') ? 'active' : '' }}"><a href="{{url('roles')}}"><span class="menu-bar__text"><span class="nftmax-menu-icon nftmax-svg-icon__v10"><svg class="nftmax-svg-icon role-icon" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16"><path d="M8 8a2 2 0 1 1 0-4 2 2 0 0 1 0 4zm0 1a3 3 0 1 1 0 6 3 3 0 0 1 0-6zm5-3a4 4 0 0 0-3.598 2.244A4 4 0 0 0 1 12c0 .88.895 1.6 2 1.6h10c1.105 0 2-.72 2-1.6a4 4 0 0 0-2.402-3.756A4 4 0 0 0 13 6z"/></svg></span><span class="menu-bar__name">Role</span></span></a></li>
								@endcan
								@can('View User')
									<li class="{{ Request::is('users') || Request::is('users/create') || Request::is('users/*/edit') ? 'active' : '' }}"><a href="{{url('users')}}"><span class="menu-bar__text"><span class="nftmax-menu-icon nftmax-svg-icon__v10"><svg class="nftmax-svg-icon scroll-icon" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-rolodex" viewBox="0 0 16 16"><path d="M8 9.05a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5"/><path d="M1 1a1 1 0 0 0-1 1v11a1 1 0 0 0 1 1h.5a.5.5 0 0 0 .5-.5.5.5 0 0 1 1 0 .5.5 0 0 0 .5.5h9a.5.5 0 0 0 .5-.5.5.5 0 0 1 1 0 .5.5 0 0 0 .5.5h.5a1 1 0 0 0 1-1V3a1 1 0 0 0-1-1H6.707L6 1.293A1 1 0 0 0 5.293 1zm0 1h4.293L6 2.707A1 1 0 0 0 6.707 3H15v10h-.085a1.5 1.5 0 0 0-2.4-.63C11.885 11.223 10.554 10 8 10c-2.555 0-3.886 1.224-4.514 2.37a1.5 1.5 0 0 0-2.4.63H1z"/></svg></span><span class="menu-bar__name">Users</span></span></a></li>
								@endcan
								
							</ul>
						</div>
						<!-- End Nav Menu -->
					</div>

					<div class="admin-menu__three mg-top-50">
						<h4 class="admin-menu__title nftmax-scolor">Pengaturan</h4>
						<!-- Nav Menu -->
						<div class="menu-bar">
							<ul class="menu-bar__one">
								<li class="{{ Request::path() == 'my-profile' ? 'active' : '' }}"><a href="{{url('/my-profile')}}"><span class="menu-bar__text"><span class="nftmax-menu-icon nftmax-svg-icon__v10"><svg class="nftmax-svg-icon scroll-icon"  viewBox="0 0 15 20" xmlns="http://www.w3.org/2000/svg"><path d="M10.8692 11.6667H4.13085C3.03569 11.668 1.98576 12.1036 1.21136 12.878C0.436961 13.6524 0.00132319 14.7023 0 15.7975V20H15.0001V15.7975C14.9987 14.7023 14.5631 13.6524 13.7887 12.878C13.0143 12.1036 11.9644 11.668 10.8692 11.6667Z"></path><path d="M7.49953 10C10.261 10 12.4995 7.76145 12.4995 5.00002C12.4995 2.23858 10.261 0 7.49953 0C4.7381 0 2.49951 2.23858 2.49951 5.00002C2.49951 7.76145 4.7381 10 7.49953 10Z"></path></svg></span><span class="menu-bar__name">Profile Saya</span> </span></a></li>
								<li class="{{ Request::path() == 'setting' ? 'active' : '' }}"><a href="{{ url('/setting') }}"><span class="menu-bar__text"><span class="nftmax-menu-icon nftmax-svg-icon__v11"><svg class="nftmax-svg-icon scroll-icon" viewBox="0 0 14 16" xmlns="http://www.w3.org/2000/svg"><path d="M0.259306 11.548C0.789972 12.469 1.96681 12.7854 2.88783 12.2548C2.88846 12.2544 2.88906 12.254 2.88969 12.2537L3.17517 12.0888C3.71408 12.5499 4.33352 12.9074 5.00231 13.1435V13.4727C5.00231 14.5356 5.86402 15.3973 6.92698 15.3973C7.98993 15.3973 8.85164 14.5356 8.85164 13.4727V13.1435C9.52052 12.9071 10.14 12.5491 10.6788 12.0875L10.9656 12.253C11.8868 12.7845 13.0645 12.4686 13.5959 11.5473C14.1274 10.6261 13.8115 9.44842 12.8902 8.91694L12.6054 8.75271C12.7336 8.05499 12.7336 7.33974 12.6054 6.64199L12.8902 6.47776C13.8114 5.94628 14.1274 4.76863 13.5959 3.84738C13.0645 2.92615 11.8868 2.61018 10.9656 3.14165L10.6801 3.30654C10.1406 2.84604 9.52076 2.48913 8.85164 2.25378V1.92467C8.85164 0.861709 7.98993 0 6.92698 0C5.86402 0 5.00231 0.861709 5.00231 1.92467V2.25378C4.33343 2.49025 3.71396 2.84823 3.17517 3.30979L2.8884 3.14364C1.96715 2.61213 0.789491 2.92811 0.258013 3.84933C-0.273465 4.77055 0.0424806 5.94824 0.963734 6.47972L1.24858 6.64394C1.12035 7.34166 1.12035 8.05692 1.24858 8.75467L0.963734 8.9189C0.0450368 9.45179 -0.269887 10.6272 0.259306 11.548ZM6.92698 5.13245C8.34425 5.13245 9.49319 6.28139 9.49319 7.69866C9.49319 9.11594 8.34425 10.2649 6.92698 10.2649C5.5097 10.2649 4.36077 9.11594 4.36077 7.69866C4.36077 6.28139 5.5097 5.13245 6.92698 5.13245Z"></path></svg></span><span class="menu-bar__name">Pengaturan</span></span></a></li>
							</ul>
						</div>
						<!-- End Nav Menu -->
					</div>
					

					<!-- Logout Button -->
					{{-- <div class="logout-button">
						<a class="nftmax-btn primary" data-bs-toggle="modal" data-bs-target="#logout_modal"><div class="logo-button__icon"><img src="assets/img/logout.png" alt="#"></div><span class="menu-bar__name">Signout</span></a>
					</div> --}}
				</div>
				<!-- End Admin Menu -->
			</div>
			<!-- End NFTMax Admin Menu -->

			<!-- Logout Modal  -->
			<div class="nftmax-preview__modal modal fade" id="logout_modal" tabindex="-1" aria-labelledby="logoutmodal" aria-hidden="true" >
				<div class="modal-dialog modal-dialog-centered nftmax-close__modal-close">
					<div class="modal-content nftmax-preview__modal-content">
						<div class="modal-header nftmax__modal__header">
							<h4 class="modal-title nftmax-preview__modal-title" id="logoutmodal">Konfirmasi</h4>
							<button type="button" class="nftmax-preview__modal--close btn-close" data-bs-dismiss="modal" aria-label="Close"><svg width="36" height="36" viewBox="0 0 36 36" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M36 16.16C36 17.4399 36 18.7199 36 20.0001C35.7911 20.0709 35.8636 20.2554 35.8385 20.4001C34.5321 27.9453 30.246 32.9248 22.9603 35.2822C21.9006 35.6251 20.7753 35.7657 19.6802 35.9997C18.4003 35.9997 17.1204 35.9997 15.8401 35.9997C15.5896 35.7086 15.2189 35.7732 14.9034 35.7093C7.77231 34.2621 3.08728 30.0725 0.769671 23.187C0.435002 22.1926 0.445997 21.1199 0 20.1599C0 18.7198 0 17.2798 0 15.8398C0.291376 15.6195 0.214408 15.2656 0.270759 14.9808C1.71321 7.69774 6.02611 2.99691 13.0428 0.700951C14.0118 0.383805 15.0509 0.386897 15.9999 0C17.2265 0 18.4532 0 19.6799 0C19.7156 0.124041 19.8125 0.136067 19.9225 0.146719C27.3 0.868973 33.5322 6.21922 35.3801 13.427C35.6121 14.3313 35.7945 15.2484 36 16.16ZM33.011 18.0787C33.0433 9.77105 26.3423 3.00309 18.077 2.9945C9.78479 2.98626 3.00344 9.658 2.98523 17.8426C2.96667 26.1633 9.58859 32.9601 17.7602 33.0079C26.197 33.0577 32.9787 26.4186 33.011 18.0787Z" fill="#374557" fill-opacity="0.6"></path><path d="M15.9309 18.023C13.9329 16.037 12.007 14.1207 10.0787 12.2072C9.60071 11.733 9.26398 11.2162 9.51996 10.506C9.945 9.32677 11.1954 9.0811 12.1437 10.0174C13.9067 11.7585 15.6766 13.494 17.385 15.2879C17.9108 15.8401 18.1633 15.7487 18.6375 15.258C20.3586 13.4761 22.1199 11.7327 23.8822 9.99096C24.8175 9.06632 26.1095 9.33639 26.4967 10.517C26.7286 11.2241 26.3919 11.7413 25.9133 12.2178C24.1757 13.9472 22.4477 15.6855 20.7104 17.4148C20.5228 17.6018 20.2964 17.7495 20.0466 17.9485C22.0831 19.974 24.0372 21.8992 25.9689 23.8468C26.9262 24.8119 26.6489 26.1101 25.4336 26.4987C24.712 26.7292 24.2131 26.3441 23.7455 25.8757C21.9945 24.1227 20.2232 22.3892 18.5045 20.6049C18.0698 20.1534 17.8716 20.2269 17.4802 20.6282C15.732 22.4215 13.9493 24.1807 12.1777 25.951C11.7022 26.4262 11.193 26.7471 10.4738 26.4537C9.31345 25.9798 9.06881 24.8398 9.98589 23.8952C11.285 22.5576 12.6138 21.2484 13.9387 19.9355C14.5792 19.3005 15.2399 18.6852 15.9309 18.023Z" fill="#374557" fill-opacity="0.6"></path></svg></button>
						</div>
						<div class="modal-body nftmax-modal__body modal-body nftmax-close__body">
							<div class="nftmax-preview__close">
								<div class="nftmax-preview__close-img"><img src="assets/img/close.png" alt="#"></div>
								<h2 class="nftmax-preview__close-title">Lanjutkan untuk logout dari <span>SIMAPIP?</span></h2>
								<div class="nftmax__item-button--group">
									<a href="{{ url('/logout') }}" class="nftmax__item-button--single nftmax-btn nftmax-btn__bordered bg radius " type="submit">Lanjutkan
									</a>
									<button class="nftmax__item-button--single nftmax-btn nftmax-btn__bordered--plus radius" data-bs-dismiss="modal"><span class="ntfmax__btn-textgr">Batal</span> </button>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- End Logout Modal -->

			<!-- Start Header -->
			<header class="nftmax-header">
				<div class="container">
					<div class="row g-50">
						<div class="col-12">
							<!-- Dashboard Header -->
							<div class="nftmax-header__inner">
								<div class="nftmax__sicon close-icon d-xl-none"><img src="/assets/img/menu-toggle.svg" alt="#"></div>
								<div class="nftmax-header__left">
									<!-- Search Form -->
									{{-- <div class="nftmax-header__form">
										<form class="nftmax-header__form-inner" action="#">
											<button class="search-btn" type="submit"><img src="/assets/img/search.png" alt="#"></button>
											<input name="s" value="" type="text" placeholder="Search items, collections...">
										</form>
									</div> --}}
									<!-- End Search Form -->
								</div>
								<div class="nftmax-header__right">
									<div class="nftmax-header__group">
										<!-- Search Form -->
										<!-- End Search Form -->
										<div class="nftmax-header__group-two">
											<div class="nftmax-header__right">
												<div class="nftmax-header__alarm"><svg xmlns="http://www.w3.org/2000/svg" width="22" height="24" viewBox="0 0 22 24" fill="none"><path d="M3.27336 17.6123H18.3622C18.8266 17.6123 19.2841 17.5005 19.6961 17.2863C20.1081 17.072 20.4625 16.7617 20.7292 16.3815C20.9959 16.0014 21.1671 15.5626 21.2283 15.1023C21.2896 14.6419 21.239 14.1736 21.081 13.737L18.3323 6.13763C17.8629 4.44882 16.8532 2.96026 15.4577 1.89961C14.0621 0.838957 12.3576 0.264609 10.6048 0.264404V0.264404C8.78009 0.264376 7.00995 0.886604 5.58662 2.02836C4.16328 3.17011 3.17186 4.76311 2.77605 6.54435L0.511187 13.869C0.377839 14.3015 0.347861 14.7592 0.423665 15.2053C0.49947 15.6515 0.678939 16.0736 0.947633 16.4377C1.21633 16.8018 1.56674 17.0978 1.97069 17.3018C2.37463 17.5058 2.82082 17.6122 3.27336 17.6123Z" fill="#374557"></path><path d="M6.19531 19.5398C6.41651 20.6291 7.00751 21.6085 7.86817 22.312C8.72883 23.0154 9.80622 23.3997 10.9178 23.3997C12.0294 23.3997 13.1068 23.0154 13.9674 22.312C14.8281 21.6085 15.4191 20.6291 15.6403 19.5398H6.19531Z" fill="#374557"></path></svg><span class="nftmax-header__count">{{-- !count($RecentNotification) --}} 0</span>
													<!-- NFTMax Alarm Hover -->
													<div class="nftmax-balance nftmax-alarm__hover">
														<h3 class="nftmax-balance__title">Recent Notification</h3>
														<!-- NFTMax Balance List -->
														{{-- <ul class="nftmax-balance_list">
															@foreach($RecentNotification as $RecentNotification)
															<li>
																<div class="nftmax-balance-info">
																	<div class="nftmax-balance__img nftmax-alarm__default"><img src="{{ asset($RecentNotification['0']) }}" alt="#"></div>
																	<div class="nftmax-alarm__content">
																		<h4 class="nftmax-balance-name">{{$RecentNotification['1']}} <strong class="nftmax-balance__second">{{$RecentNotification['2']}}</strong></h4>
																		<p class="nftmax-alarm__text">{{$RecentNotification['3']}}</p>
																	</div>
																</div>
															</li>
															@endforeach
														</ul> --}}
														<!-- NFTMax Balance Button -->
														<div class="nftmax-balance__button"><a href="{{ url('/notification') }}" class="nftmax-balance__sell-all">See all Notification</a></div>
													</div>
													<!-- End NFTMax Balance Hover -->
												</div>

												<div class="nftmax-header__author">
													<div class="nftmax-header__author-img"><img src="{{ asset('photo/' . Auth::user()->foto) }}" alt="#"></div>
													<div class="nftmax-header__author-content">
														<h4 class="nftmax-header__author-title">{{ Auth::user()->username }}</h4>
														{{-- <p class="nftmax-header__author-text v1"><a href="#">{{ Auth::user()->email }}</a></p> --}}
														<p class="nftmax-header__author-text v1"><a href="#">{{ Auth::user()->email }}</a></p>
													</div>

													<!-- NFTMax Profile Hover -->
													<div class="nftmax-balance nftmax-profile__hover">
														<h3 class="nftmax-balance__title">Profile Saya</h3>
														<!-- NFTMax Balance List -->
														<ul class="nftmax-balance_list">
															<li>
																<div class="nftmax-balance-info">
																	<div class="nftmax-balance__img nftmax-profile__img-one"><svg class="nftmax-svg-icon scroll-icon" width="16" height="16" fill="currentColor" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg"><path d="M10.8692 11.6667H4.13085C3.03569 11.668 1.98576 12.1036 1.21136 12.878C0.436961 13.6524 0.00132319 14.7023 0 15.7975V20H15.0001V15.7975C14.9987 14.7023 14.5631 13.6524 13.7887 12.878C13.0143 12.1036 11.9644 11.668 10.8692 11.6667Z"></path><path d="M7.49953 10C10.261 10 12.4995 7.76145 12.4995 5.00002C12.4995 2.23858 10.261 0 7.49953 0C4.7381 0 2.49951 2.23858 2.49951 5.00002C2.49951 7.76145 4.7381 10 7.49953 10Z"></path></svg></div>
																	<h4 class="nftmax-balance-name"><a href="{{url('/my-profile')}}">Profile Saya</a></h4>
																</div>
															</li>
															<li>
																<div class="nftmax-balance-info">
																	<div class="nftmax-balance__img nftmax-profile__img-four"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-key" viewBox="0 0 16 16">
																		<path d="M0 8a4 4 0 0 1 7.465-2H14a.5.5 0 0 1 .354.146l1.5 1.5a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0L13 9.207l-.646.647a.5.5 0 0 1-.708 0L11 9.207l-.646.647a.5.5 0 0 1-.708 0L9 9.207l-.646.647A.5.5 0 0 1 8 10h-.535A4 4 0 0 1 0 8m4-3a3 3 0 1 0 2.712 4.285A.5.5 0 0 1 7.163 9h.63l.853-.854a.5.5 0 0 1 .708 0l.646.647.646-.647a.5.5 0 0 1 .708 0l.646.647.646-.647a.5.5 0 0 1 .708 0l.646.647.793-.793-1-1h-6.63a.5.5 0 0 1-.451-.285A3 3 0 0 0 4 5"/>
																		<path d="M4 8a1 1 0 1 1-2 0 1 1 0 0 1 2 0"/>
																	  </svg></div>
																	<h4 class="nftmax-balance-name"><a href="{{url('/user/ubah-password')}}">Ubah Password</a></h4>
																</div>
															</li>
															<li>
																<div class="nftmax-balance-info">
																	<div class="nftmax-balance__img nftmax-profile__img-five"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-door-open-fill" viewBox="0 0 16 16"><path d="M1.5 15a.5.5 0 0 0 0 1h13a.5.5 0 0 0 0-1H13V2.5A1.5 1.5 0 0 0 11.5 1H11V.5a.5.5 0 0 0-.57-.495l-7 1A.5.5 0 0 0 3 1.5V15zM11 2h.5a.5.5 0 0 1 .5.5V15h-1zm-2.5 8c-.276 0-.5-.448-.5-1s.224-1 .5-1 .5.448.5 1-.224 1-.5 1"/></svg></div>
																	{{-- <h4 class="nftmax-balance-name"><a href="{{url('/logout')}}">Log Out</a></h4> --}}
																	<h4 class="nftmax-balance-name" data-bs-toggle="modal" data-bs-target="#logout_modal"><a href="#">Log Out</a></h4>
																</div>
															</li>
														</ul>
													</div>
													<!-- End NFTMax Balance Hover -->
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</header>
			<!-- End Header -->

			

			<script>
				document.addEventListener('DOMContentLoaded', function() {
					var selectedMenu = document.querySelector('.menu-bar__one .active');
					
					if (selectedMenu) {
						var rect = selectedMenu.getBoundingClientRect();
						
						var isInViewport = (
							rect.top >= 0 &&
							rect.left >= 0 &&
							rect.bottom <= (window.innerHeight || document.documentElement.clientHeight) &&
							rect.right <= (window.innerWidth || document.documentElement.clientWidth)
						);
						
						if (!isInViewport) {
							selectedMenu.scrollIntoView({ behavior: 'smooth', block: 'center', inline: 'start' });
						}
					}
				});
			</script>			
