<style>
    .navbar-toggle{
        border: none;
        background: #333;
    }
</style>
<div class="container">
    <nav class="navbar navbar-default" role="navigation">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
      </div>
      <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li class=""><a href="{{url('/')}}">Home</a></li>
            <li><a href="{{url('referensi')}}">Referensi</a></li>
            <li><a href="pages/contact.html">Location</a></li>
           <!--  <li><form action="#" class="search_form">
                <input type="text" class="form-control" placeholder="Text to Search">
                <input type="submit" value="">
            </form></li> -->
        </ul>
        <ul class="nav navbar-nav navbar-right" style="margin: 0;"> 
           <li>@if (Route::has('login'))
            @if (Auth::check())
            <li style="padding: 10px;">
            <a href="{{url('tulis-referensi')}}" style="font-size: 14px; text-transform: none; padding: 5px 15px; background: #ffa500; color: #fafafa; border-radius: 50px; "><i class="fa fa-pencil"></i> Tulis Referensi</a>
            </li>
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                    <img src="{{asset('img/avatar/' .Auth::user()->avatar)}}" width="28" class="img-circle" style="float: left; margin: -5px 5px 0 0;">{{ Auth::user()->username }}
                </a>

                <ul class="dropdown-menu" role="menu">
                    <li><a href="{{url('profile/' .Auth::user()->username)}}">Profile</a></li>
                    <li>
                        <a href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                        Logout
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                </li>
            </ul>
        </li>

        @else
        <a href="{{ url('/login') }}">Login</a>
        <!--  <a href="{{ url('/register') }}">Register</a> -->
        @endif
        @endif</li>
    </ul>
</div>
</div>
</nav>
</div>