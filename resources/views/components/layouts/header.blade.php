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
      <div id="userDropdownLink" class="col-sm-2 inline-block">
        <div><img class="pr-1" style="width:50px; border-radius:50%;" src="{{asset(Auth::user()->avatar)}}" alt="call" />{{ Auth::user()->name }}</div>
          <x-user.user-options-dropdown/>
        @else
      <div class="col-sm-2 d-flex inline-block p-2">
          <div type="button" class="" data-toggle="modal" data-target="#loginModal">
            Login |
          </div>

          <div type="button" class="pl-1" data-toggle="modal" data-target="#registerModal">
            Register
          </div>
          <x-auth.auth-combined/>
        @endif
      </div>
    </div>
  </div>
</header>
