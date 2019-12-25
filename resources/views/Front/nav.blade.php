
<nav class="navbar navbar-expand-md navbar-dark" style="background-color: #0c5460;">
  <a class="navbar-brand" href="{{url('/')}}"><img src="{{ url('images/logo.png') }}" style="width:150px;height: 100px; border-radius: 100%"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="{{route('FrontHome')}}"><i class="fa fa-home"></i> Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{route('shop')}}">Shop</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Categories
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <?php
            $categories = \App\Category::all();
            ?>
            @foreach ($categories as $category)
                <a class="dropdown-item" href="{{ url('categories', $category->id) }}">{{$category->name}}</a>
              @endforeach
        </div>
      </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('contactPage')}}">Contact</a>
          </li>
        <li class="nav-item">
            @guest
                <a class="nav-link" href="{{route('WishlistIndex')}}"><i class="fa fa-star-half-empty"></i> Wishlist</a>
            @else
                <?php
                 $noOfItemsWishlistForAuthUser= \App\Wishlist::where('user_id', \Illuminate\Support\Facades\Auth::id())->count();
                ?>
                <a class="nav-link" href="{{route('WishlistIndex')}}"><i class="fa fa-star-half-empty"></i> Wishlist <span>({{$noOfItemsWishlistForAuthUser}})</span></a>
            @endguest
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{route('CartIndex')}}"><i class="fa fa-shopping-cart"></i>&nbsp;Cart&nbsp;({{\Gloudemans\Shoppingcart\Facades\Cart::count()}} Items)&nbsp;({{\Gloudemans\Shoppingcart\Facades\Cart::total()}} $)</a>
        </li>
    </ul>
    {{--<form class="form-inline my-2 my-lg-0">--}}
      {{--<input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">--}}
      {{--<button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>--}}
    {{--</form>--}}
    <ul class="navbar-nav ml-auto">  
    @guest
        <li class="nav-item">
          <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
        </li>
      @else
        <li class="nav-item dropdown">
          <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
            {{ Auth::user()->name }} <span class="caret"></span>
          </a>

          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="{{route('userProfile')}}">
                  Profile
              </a>
            <a class="dropdown-item" href="{{ route('logout') }}"
               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
              {{ __('Logout') }}
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
              @csrf
            </form>
          </div>
        </li>
      @endguest
    </ul>
  </div>
</nav>