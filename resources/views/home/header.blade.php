<!-- header section strats -->
<header class="header_section">
      <nav class="navbar navbar-expand-lg custom_nav-container ">
        <a class="navbar-brand" href="{{url('/')}}">
          <span>
            Giftos
          </span>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class=""></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav  ">
            <li class="nav-item active">
              <a class="nav-link" href="{{url('/')}}"><i class="fa fa-home"></i>&nbsp;Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{url('shop')}}">
                <i class="fa fa-services"></i>&nbsp;Shop
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{url('why')}}">
                <i class="fa fa-work"></i>&nbsp;Why Us
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{url('testimonial')}}">
                <i class="fa fa-book"></i>&nbsp;&nbsp;Testimonial
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{url('contact')}}"><i class="fa fa-phone"></i>&nbsp;Contact Us</a>
            </li>
          </ul>
          <div class="user_option">

          @if (Route::has('login'))

          @auth

          <a href="{{url('my_Orders')}}">
              My Orders
            </a>

          <a href="{{url('my_cart')}}">
              <i class="fa fa-shopping-bag" aria-hidden="true"></i>
              [{{$count}}]
            </a>
            <form class="form-inline ">
              <button class="btn nav_search-btn" type="submit">
                <i class="fa fa-search" aria-hidden="true"></i>
              </button>
              &nbsp;&nbsp;
            </form>

                      <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    
                    <input class="btn btn-danger" type="submit" value="Logout">
                    
                </form>
          @else

            <a href="{{url('/login')}}">
              <i class="fa fa-user" aria-hidden="true"></i>
              <span>
                Login
              </span>
            </a>
            <a href="{{url('/register')}}">
              <i class="fa fa-vcard" aria-hidden="true"></i>
              <span>
                Register
              </span>
            </a>

            @endauth

            @endif
                
          </div>
        </div>
      </nav>
    </header>
    <!-- end header section -->