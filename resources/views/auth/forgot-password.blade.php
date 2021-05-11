<x-layouts.app>


        <!-- Session Status -->

        <!-- Validation Errors -->

        <div class="authContainer">

          <div class="mt-5 mb-5">Забули пароль?</div>

          <div class="text-md my-4">Не проблема введіть імейл адресу за допомогою якої ви реєструвалися на сайті, та ми відправимо Вам посилання за яким Ви зможете його змінити на новий.</div>


          <form method="POST" action="{{ route('password.email') }}">
              @csrf

              <!-- Email Address -->
              <div>
                  <input class="loginInput" id="emailForgot"
                         type="email"
                         name="email"
                         value="{{old('email')}}"
                         required autofocus />
              </div>

              <div >
                  <button class="button-std mt-4">
                      {{ __('Надіслати посилання зміни паролю') }}
                  </button>
              </div>
          </form>
        </div>

</x-layouts.app>
