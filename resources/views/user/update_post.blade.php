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
								
								<li class="has-children active">
                  <a href="category.html">Pages</a>
                  <ul class="dropdown">
                  
                   
                    
                    
                
                  
                    <li class="has-children">
                      <a href="#">Categoty</a>
                      <ul class="dropdown">
						@foreach($category as $categories)
                        <li><a href="{{url('category',$categories->name)}}">{{$categories->name}}</a></li>
                      
						@endforeach
                      </ul>
                    </li>
                  </ul>
                </li>
								
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


    <div class="row mt-5 justify-content-center">
      <div class="mx-auto">
        <div class="col-12 text-center">
          <!-- 
              **==========
              NOTE: 
              Please don't remove this copyright link unless you buy the license here https://untree.co/license/  
              **==========
            -->
            @if(session()->has('message'))
          <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert"></button>
          {{session()->get('message')}}
          </div>
          @endif

            <div class="card card-primary">
<div class="card-header">
<h3 class="card-title">Add a blog</h3>
</div>




<form action="{{ url('edit_post',$post->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
  

   

<div class="card-body">
 
<div class="form-group">
<label for="">Title</label>
<input type="text" class="form-control"  name="title"  value="{{ $post->title }}" placeholder="title">
</div>
<div class="form-group">
                        <label for="">Description </label>
                        <textarea class="form-control" name="description" rows="4" value="{{ $post->description }}">{{ $post->description }}</textarea>
                      </div>
                      <div class="form-group">
                        <label>File upload</label>
                        <img src="blogimage/{{$post->image}}"  height="150" width="150" alt="">
                       </div>

        <div  class="form-group">
            <label for="">Change image</label>
            <input type="file" name="file">
        </div>
</div>
</div>

</div>

<div class="card-footer">
<input type="hidden" name="user_id" value="{{ Auth::id() }}">
<button type="submit" class="btn btn-primary">Submit</button>
</div>
</form>
</div>
        </div>
           
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
