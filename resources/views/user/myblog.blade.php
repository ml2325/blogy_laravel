<!-- /*
* Template Name: Blogy
* Template Author: Untree.co
* Template URI: https://untree.co/
* License: https://creativecommons.org/licenses/by/3.0/
*/ -->
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="author" content="Untree.co">
  <link rel="shortcut icon" href="favicon.png">

  <meta name="description" content="" />
  <meta name="keywords" content="bootstrap, bootstrap5" />

  <link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Work+Sans:wght@400;600;700&display=swap" rel="stylesheet">


	<link rel="stylesheet" href="{{asset('assets/fonts/icomoon/style.css')}}">
	<link rel="stylesheet" href="{{asset('assets/fonts/flaticon/font/flaticon.css')}}">

	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">

	<link rel="stylesheet" href="{{asset('assets/css/tiny-slider.css')}}">
	<link rel="stylesheet" href="{{asset('assets/css/aos.css')}}">
	<link rel="stylesheet" href="{{asset('assets/css/glightbox.min.css')}}">
	<link rel="stylesheet" href="{{asset('assets/css/style.css')}}">

	<link rel="stylesheet" href="{{asset('assets/css/flatpickr.min.css')}}">
  


  <title>Blogy &mdash; Free Bootstrap 5 Website Template by Untree.co</title>
</head>
<body>

  <div class="site-mobile-menu site-navbar-target">
    <div class="site-mobile-menu-header">
      <div class="site-mobile-menu-close">
        <span class="icofont-close js-menu-toggle"></span>
      </div>
    </div>
    <div class="site-mobile-menu-body"></div>
  </div>

  <nav class="site-nav">
		<div class="container">
			<div class="menu-bg-wrap">
				<div class="site-navigation">
					<div class="row g-0 align-items-center">
						<div class="col-2">
							<a href="{{url('/')}}" class="logo m-0 float-start">Blogy<span class="text-primary">.</span></a>
						</div>
						<div class="col-8 text-center">
							<form action="#" class="search-form d-inline-block d-lg-none">
								<input type="text" class="form-control" placeholder="Search...">
								<span class="bi-search"></span>
							</form>

							<ul class="js-clone-nav d-none d-lg-inline-block text-start site-menu mx-auto">
								<li class="active"><a href="{{url('/')}}">Home</a></li>
								
							
                                @if(Route::has('login'))
                                @auth
                              <li><x-app-layout>
    
    </x-app-layout></li>  
	<li class="has-children active">
                  <a href="">Actions</a>
                  <ul class="dropdown">
                    <li><a href="{{url('post_blog')}}">Post a blog</a></li>
                    
                    
                    
                
                  
                   
                  </ul>
                </li>


                                @else

								<li><a href="{{route('login')}}">Login</a></li>
								<li><a href="{{route('register')}}">Register</a></li>
							@endauth
                            @endif
                            </ul>
							
						</div>
						<div class="col-2 text-end">
							<a href="#" class="burger ms-auto float-end site-menu-toggle js-menu-toggle d-inline-block d-lg-none light">
								<span></span>
							</a>
						
						</div>
					</div>
				</div>
			</div>
		</div>
	</nav>


    <div class="row mt-5 justify-content-center">
      <div class="mx-auto">
      







     
	

<section class="light">
	<div class="container py-2">
		<div class="h1 text-center text-dark" id="pageHeaderTitle">My Posts</div>

    @foreach($posts as $post)
		<article class="postcard light blue">
			<a class="postcard__img_link" href="#">
				<img class="postcard__img" src="blogimage/{{$post->image}}" alt="" />
			</a>
			<div class="postcard__text t-dark">
				<h1 class="postcard__title blue"><a href="#">{{$post->title}}</a></h1>
				<div class="postcard__subtitle small">
					<time datetime="2020-05-25 12:00:00">
						<i class="fas fa-calendar-alt mr-2"></i>{{$post->created_at->format('d /m/ y')}}
					</time>
				</div>
				<div class="postcard__bar"></div>
				<div class="postcard__preview-txt">{{$post->description}}</div>
				<ul class="postcard__tagbox">
					<li class="tag__item"><i class="bi bi-tag"></i>{{$post->category->name}}</li>
				</ul>
        <div class="button-container">
        <a class="btn btn-success"  href="{{url('update_post',$post->id)}}"   ><i class="bi bi-pencil-square"></i></a>
        <a class="btn btn-danger"  href="{{url('delete_post',$post->id)}}"  onclick="return confirm('you really want to delete this !')" ><i class="bi bi-trash3-fill"></i></a>
			</div>
      </div>
		</article>
    @endforeach
      
	
		
		
	</div>
</section>

<style>@import url("https://fonts.googleapis.com/css2?family=Baloo+2&display=swap");
$main-green: #79dd09 !default;
$main-green-rgb-015: rgba(121, 221, 9, 0.1) !default;
$main-yellow: #bdbb49 !default;
$main-yellow-rgb-015: rgba(189, 187, 73, 0.1) !default;
$main-red: #bd150b !default;
$main-red-rgb-015: rgba(189, 21, 11, 0.1) !default;
$main-blue: #0076bd !default;
$main-blue-rgb-015: rgba(0, 118, 189, 0.1) !default;

/* This pen */
body {
	font-family: "Baloo 2", cursive;
	font-size: 16px;
	color: #ffffff;
	text-rendering: optimizeLegibility;
	font-weight: initial;
}

.dark {
	background: #110f16;
}
.button-container{
  margin: 10px;
}


.light {
	background: white;
}

a, a:hover {
	text-decoration: none;
	transition: color 0.3s ease-in-out;
}

#pageHeaderTitle {
	margin: 2rem 0;
	text-transform: uppercase;
	text-align: center;
	font-size: 2.5rem;
}

/* Cards */
.postcard {
  flex-wrap: wrap;
  display: flex;
  
  box-shadow: 0 4px 21px -12px rgba(0, 0, 0, 0.66);
  border-radius: 10px;
  margin: 0 0 2rem 0;
  overflow: hidden;
  position: relative;
  color: #ffffff;

	&.dark {
		background-color: #18151f;
	}
	&.light {
		background-color: #e1e5ea;
	}
	
	.t-dark {
		color: #18151f;
	}
	
  a {
    color: inherit;
  }
	
	h1,	.h1 {
		margin-bottom: 0.5rem;
		font-weight: 500;
		line-height: 1.2;
	}
	
	.small {
		font-size: 80%;
	}

  .postcard__title {
    font-size: 1.75rem;
  }

  .postcard__img {
    max-height: 180px;
    width: 100%;
    object-fit: cover;
    position: relative;
  }

  .postcard__img_link {
    display: contents;
  }

  .postcard__bar {
    width: 50px;
    height: 10px;
    margin: 10px 0;
    border-radius: 5px;
    background-color: #424242;
    transition: width 0.2s ease;
  }

  .postcard__text {
    padding: 1.5rem;
    position: relative;
    display: flex;
    flex-direction: column;
  }

  .postcard__preview-txt {
    overflow: hidden;
    text-overflow: ellipsis;
    text-align: justify;
    height: 100%;
  }

  .postcard__tagbox {
    display: flex;
    flex-flow: row wrap;
    font-size: 14px;
    margin: 20px 0 0 0;
		padding: 0;
    justify-content: center;

    .tag__item {
      display: inline-block;
      background: rgba(83, 83, 83, 0.4);
      border-radius: 3px;
      padding: 2.5px 10px;
      margin: 0 5px 5px 0;
      cursor: default;
      user-select: none;
      transition: background-color 0.3s;

      &:hover {
        background: rgba(83, 83, 83, 0.8);
      }
    }
  }

  &:before {
    content: "";
    position: absolute;
    top: 0;
    right: 0;
    bottom: 0;
    left: 0;
    background-image: linear-gradient(-70deg, #424242, transparent 50%);
    opacity: 1;
    border-radius: 10px;
  }

  &:hover .postcard__bar {
    width: 100px;
  }
}

@media screen and (min-width: 769px) {
  .postcard {
    flex-wrap: inherit;

    .postcard__title {
      font-size: 2rem;
    }

    .postcard__tagbox {
      justify-content: start;
    }

    .postcard__img {
      max-width: 300px;
      max-height: 100%;
      transition: transform 0.3s ease;
    }

    .postcard__text {
      padding: 3rem;
      width: 100%;
    }

    .media.postcard__text:before {
      content: "";
      position: absolute;
      display: block;
      background: #18151f;
      top: -20%;
      height: 130%;
      width: 55px;
    }

    &:hover .postcard__img {
      transform: scale(1.1);
    }

    &:nth-child(2n+1) {
      flex-direction: row;
    }

    &:nth-child(2n+0) {
      flex-direction: row-reverse;
    }

    &:nth-child(2n+1) .postcard__text::before {
      left: -12px !important;
      transform: rotate(4deg);
    }

    &:nth-child(2n+0) .postcard__text::before {
      right: -12px !important;
      transform: rotate(-4deg);
    }
  }
}
@media screen and (min-width: 1024px){
		.postcard__text {
      padding: 2rem 3.5rem;
    }
		
		.postcard__text:before {
      content: "";
      position: absolute;
      display: block;
      
      top: -20%;
      height: 130%;
      width: 55px;
    }
	
  .postcard.dark {
		.postcard__text:before {
			background: #18151f;
		}
  }
	.postcard.light {
		.postcard__text:before {
			background: #e1e5ea;
		}
  }
}

/* COLORS */
.postcard .postcard__tagbox .green.play:hover {
	background: $main-green;
	color: black;
}
.green .postcard__title:hover {
	color: $main-green;
}
.green .postcard__bar {
	background-color: $main-green;
}
.green::before {
	background-image: linear-gradient(
		-30deg,
		$main-green-rgb-015,
		transparent 50%
	);
}
.green:nth-child(2n)::before {
	background-image: linear-gradient(30deg, $main-green-rgb-015, transparent 50%);
}

.postcard .postcard__tagbox .blue.play:hover {
	background: $main-blue;
}
.blue .postcard__title:hover {
	color: $main-blue;
}
.blue .postcard__bar {
	background-color: $main-blue;
}
.blue::before {
	background-image: linear-gradient(-30deg, $main-blue-rgb-015, transparent 50%);
}
.blue:nth-child(2n)::before {
	background-image: linear-gradient(30deg, $main-blue-rgb-015, transparent 50%);
}

.postcard .postcard__tagbox .red.play:hover {
	background: $main-red;
}
.red .postcard__title:hover {
	color: $main-red;
}
.red .postcard__bar {
	background-color: $main-red;
}
.red::before {
	background-image: linear-gradient(-30deg, $main-red-rgb-015, transparent 50%);
}
.red:nth-child(2n)::before {
	background-image: linear-gradient(30deg, $main-red-rgb-015, transparent 50%);
}

.postcard .postcard__tagbox .yellow.play:hover {
	background: $main-yellow;
	color: black;
}
.yellow .postcard__title:hover {
	color: $main-yellow;
}
.yellow .postcard__bar {
	background-color: $main-yellow;
}
.yellow::before {
	background-image: linear-gradient(
		-30deg,
		$main-yellow-rgb-015,
		transparent 50%
	);
}
.yellow:nth-child(2n)::before {
	background-image: linear-gradient(
		30deg,
		$main-yellow-rgb-015,
		transparent 50%
	);
}

@media screen and (min-width: 769px) {
	.green::before {
		background-image: linear-gradient(
			-80deg,
			$main-green-rgb-015,
			transparent 50%
		);
	}
	.green:nth-child(2n)::before {
		background-image: linear-gradient(
			80deg,
			$main-green-rgb-015,
			transparent 50%
		);
	}

	.blue::before {
		background-image: linear-gradient(
			-80deg,
			$main-blue-rgb-015,
			transparent 50%
		);
	}
	.blue:nth-child(2n)::before {
		background-image: linear-gradient(80deg, $main-blue-rgb-015, transparent 50%);
	}

	.red::before {
		background-image: linear-gradient(-80deg, $main-red-rgb-015, transparent 50%);
	}
	.red:nth-child(2n)::before {
		background-image: linear-gradient(80deg, $main-red-rgb-015, transparent 50%);
	}
	
	.yellow::before {
		background-image: linear-gradient(
			-80deg,
			$main-yellow-rgb-015,
			transparent 50%
		);
	}
	.yellow:nth-child(2n)::before {
		background-image: linear-gradient(
			80deg,
			$main-yellow-rgb-015,
			transparent 50%
		);
	}
}
</style>





















        </div>
      </div> <!-- /.container -->
    </footer> <!-- /.site-footer -->

    <!-- Preloader -->
    <div id="overlayer"></div>
    <div class="loader">
      <div class="spinner-border text-primary" role="status">
        <span class="visually-hidden">Loading...</span>
      </div>
    </div>

    <script src="{{asset('assets/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('assets/js/tiny-slider.js')}}"></script>

    <script src="{{asset('assets/js/flatpickr.min.js')}}"></script>


    <script src="{{asset('assets/js/aos.js')}}"></script>
    <script src="{{asset('assets/js/glightbox.min.js')}}"></script>
    <script src="{{asset('assets/js/navbar.js')}}"></script>
    <script src="{{asset('assets/js/counter.js')}}"></script>
    <script src="{{asset('assets/js/custom.js')}}"></script>

    
  </body>
  </html>
