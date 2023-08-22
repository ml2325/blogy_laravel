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
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="author" content="Untree.co">
	<link rel="shortcut icon" href="../assets/images/favicon.png">

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
                    <li><a href="{{url('my_blogs')}}">My blogs</a></li>
                    
                    
                
                  
                   
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

	<!-- Start retroy layout blog posts -->
	<section class="section bg-light">
    <div class="container">
	<div class="col-sm-6">
					<h2 class="posts-entry-title">Latest Posts</h2>
				</div>
        <div class="row align-items-stretch retro-layout">
            @foreach ($posts as $post)
                <div class="col-md-4">
                    <a href="{{ route('single', ['id' => $post->id]) }}" class="h-entry mb-30 v-height gradient">
					<div class="featured-img" style="background-image: url('{{ asset('blogimage/' . $post->image) }}');"></div>

                        <div class="text">
                            <span class="date">{{ $post->created_at->format('M. dS, Y') }}</span>
                            <h2>{{ $post->title }}</h2>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
</section>

	<!-- End retroy layout blog posts -->

	<!-- Start posts-entry -->
	
    <!-- Other content of your page -->

	@foreach ($catego as $category)
	@if ($category->posts->count() > 0)
<section class="section">
    <div class="container">

        <div class="row mb-4">
            <div class="col-sm-6">
                <h2 class="posts-entry-title">{{$category->name}}</h2>
            </div>
            <div class="col-sm-6 text-sm-end"><a href="{{ route('category', ['name' => $category->name]) }}" class="read-more">View All</a></div>
        </div>

        <div class="row">
            @foreach ($category->posts as $post)
            <div class="col-lg-4 mb-4">
                <div class="post-entry-alt">
                    <a href="{{ route('single', ['id' => $post->id]) }}" class="img-link"><img src="{{ asset('blogimage/' . $post->image) }}" alt="Image" class="img-fluid custom-img-size"></a>
                    <div class="excerpt">
                        <h2><a href="{{ route('single', ['id' => $post->id]) }}">{{ $post->title }}</a></h2>
                        <div class="post-meta align-items-center text-left clearfix">
                            <figure class="author-figure mb-0 me-3 float-start"><img src="{{ asset('blogimage/' . $post->image) }}" alt="Image" class="img-fluid"></figure>
                            <span class="d-inline-block mt-1">By <a href="#">{{$post->user->name}}</a></span>
                            <span>&nbsp;-&nbsp; {{ $post->created_at->format('M d, Y') }}</span>
                        </div>
                        <p>{{ $post->excerpt }}</p>
                        <p><a href="{{ route('single', ['id' => $post->id]) }}" class="read-more">Continue Reading</a></p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

    </div>
</section>
@endif
@endforeach
<style>
    .custom-img-size {
        width: 100%;
        height: auto;
        max-width: 100%;
        max-height: 200px; /* Adjust this value as needed */
    }
</style>

<!-- More content if needed -->


    <!-- More content if needed -->




	<!-- Start posts-entry -->
	
	<!-- End posts-entry -->

	




	<footer class="site-footer">
		<div class="container">
			<div class="row">
				<div class="col-lg-4">
					<div class="widget">
						<h3 class="mb-4">About</h3>
						<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
					</div> <!-- /.widget -->
					<div class="widget">
						<h3>Social</h3>
						<ul class="list-unstyled social">
							<li><a href="#"><span class="icon-instagram"></span></a></li>
							<li><a href="#"><span class="icon-twitter"></span></a></li>
							<li><a href="#"><span class="icon-facebook"></span></a></li>
							<li><a href="#"><span class="icon-linkedin"></span></a></li>
							<li><a href="#"><span class="icon-pinterest"></span></a></li>
							<li><a href="#"><span class="icon-dribbble"></span></a></li>
						</ul>
					</div> <!-- /.widget -->
				</div> <!-- /.col-lg-4 -->
				<div class="col-lg-4 ps-lg-5">
					<div class="widget">
						<h3 class="mb-4">Company</h3>
						<ul class="list-unstyled float-start links">
							<li><a href="#">About us</a></li>
							<li><a href="#">Services</a></li>
							<li><a href="#">Vision</a></li>
							<li><a href="#">Mission</a></li>
							<li><a href="#">Terms</a></li>
							<li><a href="#">Privacy</a></li>
						</ul>
						<ul class="list-unstyled float-start links">
							<li><a href="#">Partners</a></li>
							<li><a href="#">Business</a></li>
							<li><a href="#">Careers</a></li>
							<li><a href="#">Blog</a></li>
							<li><a href="#">FAQ</a></li>
							<li><a href="#">Creative</a></li>
						</ul>
					</div> <!-- /.widget -->
				</div> <!-- /.col-lg-4 -->
				 <!-- /.col-lg-4 -->
				 <div class="col-lg-4">
          <div class="widget">
            <h3 class="mb-4">Recent Post Entry</h3>
            <div class="post-entry-footer">
              <ul>
			  @foreach ($pos as $post)
                <li>
                  <a href="{{ route('single', ['id' => $post->id]) }}">
                    <img src="{{ asset('blogimage/' . $post->image) }}" alt="Image placeholder" class="me-4 rounded">
                    <div class="text">
                      <h4>{{ $post->title }}</h4>
                      <div class="post-meta">
                        <span class="mr-2">{{ $post->created_at->format('M. dS, Y') }} </span>
                      </div>
                    </div>
                  </a>
                </li>
               @endforeach
               
              </ul>
            </div>


          </div> <!-- /.widget -->
        </div>
			</div> <!-- /.row -->

			<div class="row mt-5">
				<div class="col-12 text-center">
          <!-- 
              **==========
              NOTE: 
              Please don't remove this copyright link unless you buy the license here https://untree.co/license/  
              **==========
            -->

            <p>Copyright &copy;<script>document.write(new Date().getFullYear());</script>. All Rights Reserved. &mdash; Designed with love by <a href="https://untree.co">Untree.co</a>  Distributed by <a href="https://themewagon.com">ThemeWagon</a> <!-- License information: https://untree.co/license/ -->
            </p>
          </div>
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
