<nav class="navbar navbar-expand-md bg-img navbar-dark">
  <!-- Brand -->
  <a class="navbar-brand" href="/">
  <img src="images/logo.svg" alt="" width="30"> Peperoni App</a>

  <!-- Toggler/collapsibe Button -->
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>
  <?php $email = explode('@',Auth::user()->email);
  $name = $email[0]; ?>
  <!-- Navbar links -->
  <div class="collapse navbar-collapse" id="collapsibleNavbar">
    <ul class="nav navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link text-uppercase" href="/signin">{{$name}} |</a>
        <a class="nav-link text-uppercase" href="{{url('logout')}}">Logout</a>
      </li>
    </ul>
  </div>
</nav>