<div class="navbar navbar-expand-lg navbar-light bg-light">

  <div class="container-fluid">
    <a class="navbar-brand" href="map">
      <img class="" src="img/jouetsuGo_icon.png" alt="上越GOアイコン">
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav">


        <li class="nav-item">
          <div class="sns-item">
            <a class="dropdown-item twitter" href="https://twitter.com/joetsu2020" target="_blank"><i class="fa-brands fa-twitter fa-2x twitter" style="color: #1da1f2;"></i></a> <!---->
            <a class="dropdown-item youtube" href="https://www.youtube.com/channel/UCqp0KUtWyRlwtxttvLM2A1A" target="_blank"><i class="fa-brands fa-youtube fa-2x youtube" style="color: #c4302b;"></i></a><!---->
            <a class="dropdown-item line" href="https://page.line.me/539hgqqy?openQrModal=true" target="_blank"><i class="fa-brands fa-line fa-2x line" style="color: #00B900;"></i></a><!---->
          </div>
        </li>
        <li class="nav-item right">
          <a class="nav-link active profile" aria-current="page" href="profile">PROFILE</a>
        </li>
        {{-- <li class="nav-item">
                <a class="nav-link active" href="register">ログイン</a>
              </li> --}}
        <li class="nav-item right">
          <a class="nav-link active logout" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">LOGOUT</a>
        </li>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
          @csrf
        </form>
      </ul>
    </div>
  </div>
</div>