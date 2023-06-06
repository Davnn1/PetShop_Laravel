<html>
	<head>
	<title>{{ config('app.name') }}</title>
    <script src="https://kit.fontawesome.com/f812210b6b.js" crossorigin="anonymous"></script>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="A layout example that shows off a responsive pricing table.">
    <title>Pet Shop &ndash; Kelompok 4 &ndash; Trusted</title>
    <link rel="stylesheet" type="text/css" href="{{ url('css/bootstrap.css') }}">
	<script src="{{ url('js/bootstrap.js') }}"></script>
    <script src="{{ url('js/jquery-3.5.1.min.js') }}"></script>
    <script src="{{ url('js/bootstrap.bundle.js') }}"></script>
    <link rel="stylesheet" type="text/css" href="{{ url('css/gaya.css') }}">
    <style>
        body {
            background-image: url('image/bgall.png');
            background-repeat: no-repeat;
            background-size:cover
        }
    </style>
    <style type="text/css">
        .menu{
            height: 30px;
            width: 1300px;
            background: linear-gradient(to right, #ff105f,#ffad06);
        }
        .menu li{
            float: left;
            list-style: none;
            position: relative;
        }
        .menu li a{
            color: #fff;
            text-decoration: none;
            padding: 5px 10px;
            display: block;
            transition: ls;
        }
        .menu li:hover{
            background: #ffd310;
        }
        .menu li ul{
            background: #fff;
            border: 1px solid #000;
            position: absolute;
            width: 150px;
            left: 0;
            top: 30px;
            z-index: 2;
            padding: 5px;
        }
        .menu ul li{
            width: 100%;
            margin: 0;
        }
        .menu ul li a{
            color: #000;
            transition: 1s;
        }
        .menu ul li a:hover{
            background: #ffd310;
            color: #fff;
        }
        #to-top{
            display: none;
            width: 34px;
            height: 34px;
            position: fixed;
            right: 20px;
            bottom: 50px;
            background: url(image/up.png) no-repeat;
            border : 2px solid #fff;
            border-radius: 50%;
        }
    </style>
    
    <script type="text/javascript" src="{{url('js/jquery-3.5.1.min.js')}}">
    </script>
    <script type="text/javascript">
        $('document').ready(function(){
            $('.parent ul').hide();
            $('.parent').hover(function(){
                $(this).find('ul').slideDown(200);
            },function(){
                $(this).find('ul').slideUp(200);
            });
        })
    </script>
    <script src="{{ url('js/jquery-3.5.1.min.js')}}"></script>
    <script>
        $(document).ready (function(){
            $ (window).scroll (function(){
                if($(this).scrollTop() > 200) {
                    $('#to-top').fadeIn();
                }
                else{
                    $('#to-top').fadeOut();
                }
            });
            $('#to-top').click(function(){
                $('html, body').animate({scrollTop:0},600);
                return false;
            });
        });
    </script>
	</head>
	<body class="bg-light" >
		<nav class="navbar navbar-expand-lg navbar-light bg-warning fixed-top">
		  <a class="navbar-brand" href="#">
			<img src="{{ url('image/petshoprmvbg.png') }}" width="80" height="60" alt="petshop">
		  </a>
		  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarContent" aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		  </button>
		  <div class="collapse navbar-collapse" id="navbarContent">
			<ul class="navbar-nav mr-auto">
				<li class="nav-item">
					<a class="nav-link text" href="/home2">Home</a>
				</li>
                @if((Session::get('level')=="Admin"))
				<li class="nav-item">
					<a class="nav-link text" href="/barang">Data Barang</a>
				</li>
                <li class="nav-item">
					<a class="nav-link text" href="/user">Data User</a>
				</li>
                @else ((Session::get('level')=="Customer"))
                <li class="nav-item">
					<a class="nav-link text" href="/contactus">Contact Us</a>
				</li>
                <li class="nav-item">
					<a class="nav-link text" href="https://discord.gg/R55VNJBq">Join Our Comminity</a>
				</li>
				@endif
                <li class="nav-item">
					<a class="nav-link" href="/view">Shop</a>
				</li>
			</ul>
			<ul class="nav navbar-nav navbar-right">
				<li class="nav-item dropdown">
					@if(Session::get('user'))
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle text-danger font-weight-bold" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							{{Session::get('level')}} User<br>{{ Session::get('name') }}
						</a>
						<div class="dropdown-menu w-100" aria-labelledby="navbarDropdown">
							<a class="dropdown-item" href="/change-password/">Change Password</a>
							<a class="dropdown-item" href="/logout">Logout</a>
						</div>
					</li>
					@endif
				</li>
		  </div>
		</nav>

        <div class="banner">
            <h1 class="banner-head">
                PetShop Kelompok 4.<br>
                LOVE YOUR PETS.
            </h1>
        </div>

		<main class="py-4">
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-12">
						@yield('content')
					</div>
				</div>
			</div>
		</main>

		<footer class="py-2 text-dark bg-warning fixed-bottom">
        <div class="container-fluid">
            <div class="row text-center">
                <div class="col-md-12">
                    <small><b>&copy 2022 Petshop Kelompok 4  |   All Rights Reserved   |  Owned by Kelompok 4</b></small>
                </div>
            </div>
        </div>
    </footer>
    <a id="to-top" href="#"></a>
</body>
</html>