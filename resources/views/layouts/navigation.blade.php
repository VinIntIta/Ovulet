<nav >

        <!-- Responsive Settings Options -->
        <div >
            <div>
                <div >
                    <div >{{ Auth::user()->name }}</div>
                    <div >{{ Auth::user()->email }}</div>
                </div>
            </div>

            <div >
                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Log out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>

</nav>
