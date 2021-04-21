<nav >

        <!-- Responsive Settings Options -->
        <div >
            <div>
                <div >
                    <div >{{ Auth::user()->name }}</div>
                    <div >{{ Auth::user()->email }}</div>
                    <img src="{{asset(Auth::user()->avatar)}}" >
                </div>
            </div>

            <div >
                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <a href=""
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Log out') }}
                    </a>
                    <button type="submit">Log out</button >
                </form>
            </div>
        </div>

</nav>
