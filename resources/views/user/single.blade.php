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

  <div class="site-cover site-cover-sm same-height overlay single-page" style="background-image: url('{{ asset('blogimage/' . $post->image) }}');">

    <div class="container">
      <div class="row same-height justify-content-center">
        <div class="col-md-6">
          <div class="post-entry text-center">
            <h1 class="mb-4">{{ $post->title }}</h1>
            <div class="post-meta align-items-center text-center">
              <figure class="author-figure mb-0 me-3 d-inline-block"><img src="../assets/images/person_1.jpg" alt="Image" class="img-fluid"></figure>
              <span class="d-inline-block mt-1">{{ $post->user->name }}</span>
              <span>&nbsp;-&nbsp; {{ $post->created_at->format('F d, Y') }}</span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <section class="section">
    <div class="container">

      <div class="row blog-entries element-animate">

        <div class="col-md-12 col-lg-8 main-content">

          <div class="post-content-body">
            <p>{{ $post->description }}</p>
         
          
          </div>


          <div class="pt-5">
            <p>Categories:  <a href="#">{{ $post->category->name }}</a></p>
          </div>



          <div class="pt-5 comment-wrap">
          <h3 class="mb-5 heading">{{ $post->comments->count() }} Comments</h3>
    <ul class="comment-list">
        @foreach ($post->comments as $comment)
        <li class="comment">
            <div class="vcard">
                <!-- Display commenter's image if available -->
                 <img src="../assets/images/img_1_sq.jpg" alt="Image placeholder"> 
            </div>
            <div class="comment-body">
                <h3>{{ $comment->name }}</h3>
                <p>{{ $comment->message }}</p>
              
            </div>
        </li>
        @endforeach
    </ul>
             

            

            
            </ul>
            <!-- END comment-list -->

            <div class="comment-form-wrap pt-5">
              <h3 class="mb-5">Leave a comment</h3>
             

              <form action="{{ route('post.comment', ['id' => $post->id]) }}" method="post">
    @csrf
    <div class="form-group">
        <label for="name">Name *</label>
        <input type="text" class="form-control" id="name" name="name">
    </div>
    <div class="form-group">
        <label for="email">Email *</label>
        <input type="email" class="form-control" id="email" name="email">
    </div>
    <div class="form-group">
                  <label for="website">Website</label>
                  <input type="url" class="form-control" name="website">
                </div>
    <div class="form-group">
        <label for="message">Message</label>
        <textarea name="message" id="message" cols="30" rows="10" class="form-control"></textarea>
    </div>
    <div class="form-group">
        <input type="submit" value="Post Comment" class="btn btn-primary">
    </div>
</form>

            </div>
          </div>

        </div>

        <!-- END main-content -->

        <div class="col-md-12 col-lg-4 sidebar">
        
          <!-- END sidebar-box -->
          <div class="sidebar-box">
            <div class="bio text-center">
            
              <div class="bio-body">
                <h2>Written by:{{ $post->user->name }}</h2>
    
                <p class="social">
                  <a href="#" class="p-2"><span class="fa fa-facebook"></span></a>
                  <a href="#" class="p-2"><span class="fa fa-twitter"></span></a>
                  <a href="#" class="p-2"><span class="fa fa-instagram"></span></a>
                  <a href="#" class="p-2"><span class="fa fa-youtube-play"></span></a>
                </p>
              </div>
            </div>
          </div>
          <!-- END sidebar-box -->  
          <div class="sidebar-box">
          
          </div>
          <!-- END sidebar-box -->

          <div class="sidebar-box">
          <h3 class="heading">Categories</h3>
<ul class="categories">
    @foreach($categoryCounts as $categoryCount)
        @if($categoryCount->posts_count > 0)
            <li><a href="{{ route('category', $categoryCount->name) }}">{{ $categoryCount->name }}<span>({{ $categoryCount->posts_count }})</span> </a></li>
        @endif
    @endforeach
</ul>

</div>


          <!-- END sidebar-box -->

         
        </div>
        <!-- END sidebar -->

      </div>
    </div>
  </section>


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
        <div class="col-lg-4">
          <div class="widget">
            <h3 class="mb-4">Recent Post Entry</h3>
            <div class="post-entry-footer">
              <ul>
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
               
               
              </ul>
            </div>


          </div> <!-- /.widget -->
        </div> <!-- /.col-lg-4 -->
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
