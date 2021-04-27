<div class="user-dropdown">
  <a href="/"><button class="dropdown-links">Мої повідомлення</button></a>
  <a href="/profile/{{Auth::user()->id}}"><button class="dropdown-links">Редагувати профіль</button></a>
  <form method="post" action="{{ route('logout') }}">
    @csrf
    <a href="/"><button class="dropdown-links" type="submit">Вийти</button></a>
  </form>
</div>
