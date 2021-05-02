<header>
  <div class="container">
    <div class="row">
      <div class="col-sm-2">
          <div><img src="{{asset("images/logo.png")}}" alt="call" />
          <img src="{{asset("images/Line.png")}}" alt="call" />
       <!-- <span>Не бійся дізнатись!</span>
         <span>Поспіши діяти!</span> -->
        </div>
      </div>

      <div class="col-sm-2">
          <!-- <div class="slogan text-secondary"> -->
            <div class="slogan">
          <!-- <img src="{{asset("images/Line.png")}}" alt="call" /> -->
       <span> Не бійся дізнатись!</span>
         <span>Поспіши діяти!</span>
        </div>
      </div>


      <div class="col-sm-6">
        <nav class="navbar text-center">
          <span> <a href="#">Про проект </a></span>
          <span> <a href="/calendar">Календар </a></span>
          <!-- <span> <a href="#">Пройти тест </a></span>
          <span> <a href="#">Новини </a></span> -->
          <a href="#">Пройти тест </a>
          <a href="#">Новини </a>
       </nav>
        <!-- <div>
        </div> -->
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
</header>
