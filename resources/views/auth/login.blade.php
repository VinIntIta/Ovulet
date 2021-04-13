<x-app-layout>
   <x-auth-card>
      <div class="loginContainer">
        <!-- Session Status -->
        <x-auth-session-status  :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors  :errors="$errors" />

        <div class="mt-5 mb-5">Вхід</div>

        <div class="text-md mt-5">Ще намає аккаунту? <a href="/register">Зареєструватись</a></div>

      <div class="separator text-md my-4">або</div>
        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email Address -->
            <div>
                <input class="loginInput" id="email"
                         type="email"
                         name="email"
                         placeholder="{{__('Email')}}"
                         :value="old('email')"
                         required autofocus />
            </div>

            <!-- Password -->
            <div class="mt-4 mb-1">
                <input class="loginInput" id="password"
                                placeholder="{{__('Password')}}"
                                type="password"
                                name="password"
                                required autocomplete="current-password" />
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

            <div class="d-flex inline-block m-4 justify-content-center">

              <div class="socialite-facebook mr-2">
                  <a href="/login/facebook/redirect">
                    <svg width="20" height="42" viewBox="0 0 20 42" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <path d="M4.72839 41.9968C7.64168 41.9827 10.5546 41.8839 13.4663 41.7008V21.4009H19.2639L19.9643 14.106H13.4663V9.47382C13.4663 8.45072 14.2957 7.6214 15.3188 7.6214H19.9643V0.326172H12.616C8.25966 0.326172 4.72839 3.85782 4.72839 8.2142V14.106H0.483398V21.4009H4.72839V41.9968Z" fill="white"/>
                    </svg>
                </a>
              </div>
              <div class="socialite-google mr-2">
                <a href="/login/google/redirect">
                  <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
    	             viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve">
                    <g>
                    	<polygon style="fill:#F2F2F2;" points="472.207,237.787 472.207,274.213 431.497,274.213 431.497,314.923 395.071,314.923
                    		395.071,274.213 354.375,274.213 354.375,237.787 395.071,237.787 395.071,197.077 431.497,197.077 431.497,237.787 	"/>
                    	<path style="fill:#F2F2F2;" d="M311.966,231.446c1.514,7.956,2.3,16.17,2.3,24.554c0,9.413-0.986,18.583-2.871,27.441
                    		c-12.613,59.408-65.379,103.975-128.544,103.975c-50.051,0-93.562-27.969-115.759-69.136c-9.986-18.542-15.657-39.74-15.657-62.28
                    		c0-72.579,58.837-131.415,131.415-131.415c31.883,0,61.123,11.356,83.876,30.254l-42.566,34.854
                    		c-11.984-7.485-26.14-11.813-41.31-11.813c-34.253,0-63.365,22.055-73.907,52.738c-2.728,7.956-4.213,16.498-4.213,25.383
                    		c0,9.642,1.743,18.884,4.956,27.412c11.099,29.626,39.667,50.71,73.164,50.71c14.399,0,27.883-3.886,39.454-10.685
                    		c15.37-9.013,27.383-23.112,33.711-39.996h-70.279v-51.995h71.292h54.939V231.446z"/>
                    </g>
                </a>
              </div>
              <div class="socialite-twitter mr-2">
                <a href="/login/twitter/redirect">
                  <svg width="32" height="26" viewBox="0 0 32 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M31.4411 3.01874C30.3349 3.59743 28.6686 3.86484 28.1162 3.94189C28.1117 3.91519 28.1071 3.88963 28.1025 3.86407C29.9805 2.7025 30.5554 0.515533 30.5554 0.515533C29.3923 1.18044 28.3672 1.54932 27.5952 1.75378C27.161 1.87013 26.8067 1.93308 26.5518 1.96817C25.3815 0.768066 23.7473 0.0234375 21.9383 0.0234375C18.3792 0.0234375 15.4934 2.90849 15.4934 6.46875C15.4934 6.59692 15.4968 6.72434 15.5052 6.8506C15.5224 7.15921 15.5617 7.46248 15.6223 7.75736C13.8996 7.7318 7.68129 7.20346 2.5284 1.21782C2.5284 1.21782 -0.341019 6.22423 4.48305 9.6441C4.48305 9.6441 2.5284 9.58307 1.4908 8.85027C1.4908 8.85027 1.18562 13.6743 6.74173 15.2002C6.74173 15.2002 4.78822 15.6893 3.81052 15.2616C3.81052 15.2616 4.78784 19.4135 9.67256 19.7195C9.67256 19.7195 6.16914 22.9269 0.448242 22.4653C3.26196 24.2468 6.59792 25.2779 10.1746 25.2779C20.2313 25.2779 28.384 17.1255 28.384 7.0688C28.384 6.9433 28.3829 6.8178 28.3802 6.69229C28.3829 6.61791 28.384 6.5439 28.384 6.46875C28.384 6.41649 28.3829 6.36423 28.3821 6.31197C30.2414 5.07295 31.4411 3.01874 31.4411 3.01874Z" fill="white"/>
                  </svg>
                </a>
              </div>
              <div class="socialite-instagram">
                <a href="/login/instagram/redirect">
                  <svg width="38" height="38" viewBox="0 0 38 38" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M18.9762 0.250184C11.4334 0.250184 4.27069 -0.420668 1.53483 6.59939C0.40475 9.4988 0.56886 13.2643 0.56886 18.656C0.56886 23.3873 0.417214 27.834 1.53483 30.7106C4.26446 37.7348 11.4853 37.0619 18.9721 37.0619C26.195 37.0619 33.6423 37.8137 36.4114 30.7106C37.5436 27.7821 37.3774 24.0727 37.3774 18.656C37.3774 11.4657 37.7742 6.8237 34.2863 3.33859C30.7548 -0.192204 25.979 0.250184 18.9679 0.250184H18.9762ZM17.3268 3.56706C33.0607 3.54213 35.0632 1.79335 33.9581 26.0873C33.5655 34.6796 27.0218 33.7367 18.9783 33.7367C4.31224 33.7367 3.89054 33.3172 3.89054 18.6477C3.89054 3.80798 5.05385 3.57537 17.3268 3.5629V3.56706ZM28.8021 6.62224C27.5827 6.62224 26.5939 7.61086 26.5939 8.83002C26.5939 10.0492 27.5827 11.0378 28.8021 11.0378C30.0215 11.0378 31.0103 10.0492 31.0103 8.83002C31.0103 7.61086 30.0215 6.62224 28.8021 6.62224ZM18.9762 9.20387C13.7559 9.20387 9.52431 13.4367 9.52431 18.656C9.52431 23.8754 13.7559 28.1061 18.9762 28.1061C24.1966 28.1061 28.4261 23.8754 28.4261 18.656C28.4261 13.4367 24.1966 9.20387 18.9762 9.20387ZM18.9762 12.5207C27.0883 12.5207 27.0987 24.7913 18.9762 24.7913C10.8663 24.7913 10.8538 12.5207 18.9762 12.5207Z" fill="white"/>
                  </svg>
                </a>
              </div>
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
      </div>
    </x-auth-card>


</x-app-layout>
