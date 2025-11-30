<h1>Home Page</h1>

<ul>
  <li><a href="{{ url('/buy') }}">Buy</a></li>
  <li><a href="{{ url('/rent') }}">Rent</a></li>
  <li><a href="{{ url('/featured') }}">Featured</a></li>
</ul>

<ul>
  <li><a href="{{ url('/') }}">Home</a></li>
  <li><a href="{{ url('/about_us') }}">About us</a></li>
  <li><a href="{{ url('/contact') }}">Contact</a></li>
</ul>

<ul>
  <li><a href="{{ url('/register') }}">Sign up</a></li>
  <li><a href="{{ url('/login') }}">Log in</a></li>
</ul>

@yield('content')