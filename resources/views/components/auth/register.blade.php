  <div class="modal fade" id="registerModal" tabindex="-1" aria-labelledby="registerModal" aria-hidden="true">
    <div class="modal-dialog">
     <div class="modal-content">
       <div class="modal-body">
       <div class="authContainer">

              <div class="mt-5 mb-5">Реєстрація</div>

              <div class="text-md mt-5">Вже майете аккаунт?
                <a href="#loginModal" data-dismiss="modal" data-toggle="modal" data-target="#loginModal">Вхід</a>
              </div>

            <div class="separator text-md my-4">або</div>

              <form id="registerForm" method="POST" action="{{ route('register') }}">
                  @csrf

                  <!-- Name -->
                  <div class="mb-2">
                      <input class="loginInput" id="nameRegister"
                                      type="text"
                                      name="name"
                                      placeholder="{{__('Ім`я')}}"
                                      value="{{old('name')}}"
                                      required autofocus />

                      <div class="validation-error" id="nameRegisterError">
                          <strong></strong>
                      </div>
                  </div>

                  <!-- Email Address -->
                  <div class="mb-2">
                      <input class="loginInput" id="emailRegister"
                                     name="email"
                                     placeholder="{{__('І-мейл')}}"
                                     value="{{old('email')}}"
                                     required />

                      <div class="validation-error" id="emailRegisterError">
                          <strong></strong>
                      </div>
                  </div>

                  <!-- Password -->
                  <div class="mb-2">
                      <input class="loginInput" id="passwordRegister"
                                      type="password"
                                      name="password"
                                      placeholder="{{__('Пароль')}}"
                                      required autocomplete="new-password" />

                      <div class="validation-error" id="passwordRegisterError">
                          <strong></strong>
                      </div>
                  </div>

                  <!-- Confirm Password -->
                  <div class="mb-4">
                      <input class="loginInput" id="password_confirmationRegister"
                                      type="password"
                                      placeholder="{{__('Повторити пароль')}}"
                                      name="password_confirmation" required />
                  </div>

                  <div >
                      <button class="button-std">
                          {{ __('Реєстрація') }}
                      </button>
                  </div>

              </form>

              <div class="separator text-md my-4">зареєструватися через</div>

              <x-auth.auth-socialite/>

        </div>
      </div>
      </div><!--end of modal content-->
      </div>
    </div>
