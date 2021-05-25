<x-layouts.app>
  <body>
    <div class="container my-4">
        <div class="profile-container p-2">
          <div class="p-3 pt-4">
            Профіль
          </div>
          <div class="row">
            <div id="profileOptionsButtons" class="col-md-auto options-buttons p-0" >
                  <div class="text-center mb-2">
                    <img class="current-avatar" src="{{ asset(Auth::user()->avatar) }}">
                  </div>
                  <div>
                    <button id="myProfile" class="userOptionsToggle active" data-toggle="collapse" data-target="#collapsemyProfile" aria-expanded="true" aria-controls="collapsemyProfile" disabled="disabled">
                      Мій профіль
                    </button>
                  </div>
                  <button id="myMessages" class="userOptionsToggle" data-toggle="collapse" data-target="#collapsemyMessages" aria-expanded="false" aria-controls="collapsemyMessages">
                    Мої повідомлення
                  </button>
                  <div>
                    <button id="redactProfile" class="userOptionsToggle" data-toggle="collapse" data-target="#collapseredactProfile" aria-expanded="false" aria-controls="collapseredactProfile">
                      Редагувати профіль
                    </button>
                  </div>
                  <div>
                    <button id="changePassword" class="userOptionsToggle" data-toggle="collapse" data-target="#collapsechangePassword" aria-expanded="false" aria-controls="collapsechangePassword">
                      Змінити пароль
                    </button>
                  </div>
                  <div>
                    <button id="changeAvatar" class="userOptionsToggle" data-toggle="collapse" data-target="#collapsechangeAvatar" aria-expanded="false" aria-controls="collapsechangeAvatar">
                      Змінити аватар
                    </button>
                  </div>
            </div>

            <div class="col-md profile-collapse">

              <div id="profileOptions">
                <div id="collapsemyProfile" class="collapse show" aria-labelledby="myProfile" data-parent="#profileOptions">

                  <div class="container">
                    <div class="row gx-0 info-background-1 p-2">
                      <div class="col-lg-2 col-md-3 col-sm-2 col-3">
                        <div> Ім'я </div>
                      </div>
                      <div class="col-auto">
                        <div> {{ Auth::user()->name }} </div>
                      </div>
                    </div>
                    <div class="row gx-0 info-background-2 p-2">
                      <div class="col-lg-2 col-md-3 col-sm-2 col-3">
                        <div>E-mail</div>
                      </div>
                      <div class="col">
                        <div>{{ Auth::user()->email }}</div>
                      </div>
                    </div>
                  </div>

                </div>

                <div id="collapsemyMessages" class="collapse" aria-labelledby="myMessages" data-parent="#profileOptions">
                    2Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                </div>

                <div id="collapseredactProfile" class="collapse" aria-labelledby="redactProfile" data-parent="#profileOptions">
                  <div class="profile-form">

                    <form id="editForm" method="POST" action="{{ route('profile.update', Auth::user()->id) }}">
                        @csrf
                        @method('PATCH')
                        <!-- Name -->
                        <div class="mb-2 row align-items-center">
                            <div class="col-sm-2 profile-label">
                              <label for="name">Ім'я</label>
                            </div>
                            <div class="col-lg-6 col-md-7 col-sm-12">
                              <input class="profile-input mt-2" id="nameEdit"
                                              type="text"
                                              name="name"
                                              placeholder="{{ Auth::user()->name }}"
                                              autofocus />

                              <div class="validation-error" id="nameEditError">
                                  <strong></strong>
                              </div>
                            </div>
                        </div>

                        <!-- Email Address -->
                        <div class="mb-2 row align-items-center">
                            <div class="col-2 profile-label">
                              <label for="email">Email</label>
                            </div>
                            <div class="col-lg-6 col-md-7 col-sm-12">
                              <input class="profile-input mt-2" id="emailEdit"
                                             name="email"
                                             placeholder="{{ Auth::user()->email }}"
                                            />

                              <div class="validation-error" id="emailEditError">
                                  <strong></strong>
                              </div>
                            </div>
                        </div>

                        <div class="mb-2 row align-items-center">
                            <div class="col-2 profile-label">
                              <label for="birthDate">Date</label>
                            </div>
                            <div class="col-lg-6 col-md-7 col-sm-12">

                                <div class="settings">
                                  <input class="datepicker" type="text"  autocomplete="off" readonly placeholder="дд.мм.рр">
                                  <input class="datepickerHidden" name="birthDate" value="" type="hidden" autocomplete="off">
                                </div>

                              <div class="validation-error" id="">
                                  <strong></strong>
                              </div>
                            </div>
                        </div>

                        <div class="row">
                          <div class="col-2"></div>
                          <div class="col-6">
                            <div class="text-center">
                                <button class="button-std px-4">
                                    {{ __('Зберегти') }}
                                </button>
                            </div>
                          </div>
                        </div>
                    </form>

                  </div>
                </div>

                <div id="collapsechangePassword" class="collapse row justify-content-center" aria-labelledby="changePassword" data-parent="#profileOptions">

                  <div class="col-md-6 col-12 profile-form">

                    <div class="mt-4 mb-4">Бажаєте змінити пароль?</div>

                    <div class="text-md my-4">Введіть імейл адресу за допомогою якої ви реєструвалися на сайті, та ми відправимо Вам посилання за яким Ви зможете його змінити на новий.</div>

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <!-- Email Address -->
                        <div>
                            <input class="profile-input" id="emailForgot"
                                   type="email"
                                   name="email"
                                   placeholder="{{ Auth::user()->email }}"
                                   value="{{old('email')}}"
                                   required autofocus />
                        </div>

                        <div class="text-center">
                            <button class="button-std mt-4">
                                {{ __('Надіслати посилання зміни паролю') }}
                            </button>
                        </div>
                    </form>

                  </div>
                </div>

                <div id="collapsechangeAvatar" class="collapse" aria-labelledby="changeAvatar" data-parent="#profileOptions">
                     <form id="avatarUpdateForm" method="post" enctype="multipart/form-data" action="{{ route('profile.update', Auth::user()->id)}}"> <!-- action="{{ route('profile.update', Auth::user()->id) }}"-->
                      @csrf
                      @method('PATCH')
                      <div >
                        <input id="profileAvatarInput" name="profileAvatarInput" type='file' accept="image/*">
                        <div style="width:90%;"><img id="avatarPrewiev" src="#" class="card-img-top" alt="..."></div>
                        <input id="profileAvatarCropp" name="profileAvatarCropp" type='hidden' value="">
                        <button type="submit">New avatar</button>
                      </div>
                    </form>
                </div>

              </div>
            </div>
          </div>
        </div>
    </div>
  </body>

  <script>

  $(".userOptionsToggle").click(function(){
    let oldActiveButton = $(".userOptionsToggle[disabled='disabled']").removeAttr('disabled').removeClass('active');
    let newActiveButton = $(this);
    setTimeout(function(){newActiveButton.attr("disabled", true).addClass('active')}, 1);
  });

  $(function () {
      $('#editForm').submit(function (e) {
          // e.preventDefault();
          let formData = $(this).serializeArray();
          $(".validation-error").children("strong").text("");
          $("#editForm input").removeClass("invalid-input");
          $.ajax({
            method: "PATCH",
            headers: {
                Accept: "application/json"
            },
            url: "/profile/{{Auth::user()->id}}",
            data: formData,
            success: () => {
              console.log("success");
               // window.location.reload()
            },
            error: (response) => {
                if(response.status === 422) {
                    let errors = response.responseJSON.errors;
                    console.log(errors);
                    Object.keys(errors).forEach(function (key) {
                        $("#" + key + "Edit").addClass("invalid-input");
                        $("#" + key + "EditError").children("strong").text(errors[key][0]);
                    })
                } else {
                  let errors = response.responseJSON.errors;
                    console.log('not 422');
                    console.log(errors);
                    // window.location.reload();
                }
            }
  })
      });
  })


  </script>
</x-layouts.app>
