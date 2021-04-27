     <div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModal" aria-hidden="true">
       <div class="modal-dialog" role="document">
        <div class="modal-content">
      <div class="authContainer">
        <!-- Session Status -->
        <x-auth.auth-session-status  :status="session('status')" />

        <div class="mt-5 mb-5">Вхід</div>

        <div class="text-md mt-5">Ще намає аккаунту?
          <a href="#registerModal" data-dismiss="modal" data-toggle="modal" data-target="#registerModal">Зареєструватись</a>
        </div>

      <div class="separator text-md my-4">або</div>
        <form id="loginForm" method="POST" action="{{ route('login') }}">
            @csrf


            <!-- Email Address -->
            <div class="validation-error" id="emailLoginError">
                <strong></strong>
            </div>

            <div>
                <input class="loginInput" id="emailLogin"
                         name="email"
                         placeholder="{{__('Email')}}"
                         value="{{old('email')}}"
                         autofocus />
            </div>

            <!-- Password -->
            <div class="mt-4 mb-1">
                <input class="loginInput" id="passwordLogin"
                                placeholder="{{__('Password')}}"
                                type="password"
                                name="password"
                                autocomplete="current-password" />
            </div>

          <div class="text-sm">
            <!-- Remember Me -->
            <div class="float-left">
                <label for="remember_me" >
                    <input id="remember_me" type="checkbox" name="remember">
                    <span >{{ __('Запам`ятати') }}</span>
                </label>
            </div>

            <div class="float-right text-nowrap mr-1">
                @if (Route::has('password.request'))
                    <a  href="{{ route('password.request') }}">
                        {{ __('Забули пароль?') }}
                    </a>
                @endif
            </div>
          </div>

            <div>
                <button class="button-std mt-1">
                    {{ __('Log in') }}
                </button>
            </div>

            <div class="separator text-md my-4">увійти через</div>

          <x-auth.auth-socialite/>

        </form>

      </div>
  </div>
</div>
</div>
