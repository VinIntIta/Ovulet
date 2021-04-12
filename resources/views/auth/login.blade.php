<x-app-layout>
    <x-auth-card>


        <!-- Session Status -->
        <x-auth-session-status  :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors  :errors="$errors" />

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email Address -->
            <div>
                <input class="input" id="email"
                         type="email"
                         name="email"
                         placeholder="{{__('Email')}}"
                         :value="old('email')"
                         required autofocus />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <input class="input" id="password"
                                placeholder="{{__('Password')}}"
                                type="password"
                                name="password"
                                required autocomplete="current-password" />
            </div>

            <!-- Remember Me -->
            <div >
                <label for="remember_me" >
                    <input id="remember_me" type="checkbox" name="remember">
                    <span >{{ __('Remember me') }}</span>
                </label>
            </div>

            <div >
                @if (Route::has('password.request'))
                    <a  href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif
            <div>
                <button class="button-std">
                    {{ __('Log in') }}
                </button>
            </div>
            <div>
              <a href="/login/google/redirect">Google</a>
            </div>
            <div>
              <a href="/login/facebook/redirect">Facebook</a>
            </div>
            <div>
              <a href="/login/instagram/redirect">Instagram</a>
            </div>
            <div>
              <a href="/login/twitter/redirect">Twitter1</a>
            </div>
            <div>
              <a href="/twitter/login">TwitterAtymic</a>
            </div>

            </div>
        </form>

        <fb:login-button
          scope="public_profile,email"
          onlogin="checkLoginState();">
        </fb:login-button>

    </x-auth-card>


</x-app-layout>
