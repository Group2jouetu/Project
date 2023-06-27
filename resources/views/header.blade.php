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
                <a class="nav-link active" aria-current="page" href="profile">PROFILE</a>
              </li>
              {{-- <li class="nav-item">
                <a class="nav-link active" href="register">ログイン</a>
              </li> --}}
              <li class="nav-item">
                <a class="nav-link active" href="{{ route('logout') }}"onclick="event.preventDefault(); document.getElementById('logout-form').submit();">LOGOUT</a>
              </li>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                  @csrf
              </form>
              
              <li class="nav-item">
                <div class="sns-item">
                  <a class="dropdown-item" href="https://twitter.com/joetsu2020"><i class="fa-brands fa-twitter fa-2x" style="color: #1da1f2;"></i></a>
                  <a class="dropdown-item" href="https://www.youtube.com/channel/UCqp0KUtWyRlwtxttvLM2A1A"><i class="fa-brands fa-youtube fa-2x" style="color: #c4302b;"></i></a>
                  <a class="dropdown-item" href="https://page.line.me/539hgqqy?openQrModal=true"><i class="fa-brands fa-line fa-2x" style="color: #00B900;"></i></a>
                </div>
              </li>

            </ul>
          </div>
        </div>
</div>