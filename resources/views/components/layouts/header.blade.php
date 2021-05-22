<header>
  <div class="container">
    <div class="row">
      <div class="col-sm-2">
          <div><img src="{{asset("images/logo.png")}}" alt="call" />
          <img src="{{asset("images/Line.png")}}" alt="call" />
        </div>
      </div>
      <div class="col-sm-2">
        <div class="slogan">
          <span> Не бійся дізнатись!</span>
          <span>Поспіши діяти!</span>
        </div>
      </div>

      <div class="col-sm-6">
        <nav class="navbar navbar-expand-lg navbar-light">
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
              <a class="nav-item nav-link active" href="#">Про проект </a>
              <a class="nav-item nav-link" href="/calendar">Календар</a>
              <a class="nav-item nav-link" href="#">Пройти тест</a>
              <a class="nav-item nav-link disabled" href="#">Новини</a>
            </div>
          </div>
        </nav>
      </div>


        @if( Auth::check() )
      <div id="userDropdown" class="col-sm-2 inline-block">
          <div><img src="{{asset("images/Cab.png")}}" alt="call" />{{ Auth::user()->name }}</div>
          @else
          <div class="col-sm-2 inline-block">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#loginModal">
              Login
            </button>
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#registerModal">
              Register
            </button>
            <x-auth.auth-combined/>
            @endif
        <div class="user-dropdown">
          <a href="/"><button class="dropdown-links">Мої повідомлення</button></a>
          <a href="/"><button class="dropdown-links">Редагувати профіль</button></a>
          <form method="post" action="{{ route('logout') }}">
            @csrf
            <a href="/"><button class="dropdown-links" type="submit">Вийти</button></a>
          </form>
        </div>
      </div>
    </div>
  </div>
  </div>
</header>
