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

		<!-- Fav Icon -->
		<link rel="icon" href="assets/img/favicon.png">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@mdi/font@5.8.55/css/materialdesignicons.min.css">

		<!-- NFTMax Stylesheet -->
		<link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}">
		<link rel="stylesheet" href="{{asset('assets/css/font-awesome-all.min.css')}}">
		<link rel="stylesheet" href="{{asset('assets/css/charts.min.css')}}">
		<link rel="stylesheet" href="{{asset('assets/css/slickslider.min.css')}}">
		<link rel="stylesheet" href="{{asset('assets/css/reset.css')}}">
		<link rel="stylesheet" href="{{asset('assets/style.css')}}">
		<link rel="stylesheet" href="{{asset('assets/custom.css')}}">

        @vite(['resources/js/app.js'])
	</head>
	<body>
		<div id="app" class="body-bg" style="background-image:url('assets/img/body-bg.jpg')">
            @include('Layout._includes.menu')
            @include('Layout._includes.header')

            <section class="nftmax-adashboard nftmax-show">

                <div class="container">
                    <div class="row">
                        <div class="col-lg-9 col-12 nftmax-main__column">
                            <div class="nftmax-body">
                                <!-- Dashboard Inner -->
                                <div class="nftmax-dsinner">
                                    @yield('content')
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </body>
</html>
