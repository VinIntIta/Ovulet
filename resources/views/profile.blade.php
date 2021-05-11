<x-layouts.app>
  <body>
    <div class="container mt-4">
        <div class="profileContainer">
          <div class="p-3 pt-4">
            Профіль
          </div>
          <div class="row">
            <div id="profileOptionsButtons" class="col-3 xs p-0" >
                  <button id="myProfile" class="userOptionsToggle" data-toggle="collapse" data-target="#collapsemyProfile" aria-expanded="false" aria-controls="collapsemyProfile">
                    Мій профіль
                  </button>
                  <button id="myMessages" class="userOptionsToggle" data-toggle="collapse" data-target="#collapsemyMessages" aria-expanded="false" aria-controls="collapsemyMessages">
                    Мої повідомлення
                  </button>
                  <button id="redactProfile" class="userOptionsToggle" data-toggle="collapse" data-target="#collapseredactProfile" aria-expanded="false" aria-controls="collapseredactProfile">
                    Редагувати профіль
                  </button>
                  <button id="changePassword" class="userOptionsToggle" data-toggle="collapse" data-target="#collapsechangePassword" aria-expanded="false" aria-controls="collapsechangePassword">
                    Змінити пароль
                  </button>
                  <button id="changeAvatar" class="userOptionsToggle" data-toggle="collapse" data-target="#collapsechangeAvatar" aria-expanded="true" aria-controls="collapsechangeAvatar" disabled="disabled">
                    Змінити аватар
                  </button>
            </div>

            <div class="col-9 xs">
              <div id="profileOptions">

                <div id="collapsemyProfile" class="collapse" aria-labelledby="myProfile" data-parent="#profileOptions">
                    Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                </div>

                <div id="collapsemyMessages" class="collapse" aria-labelledby="myMessages" data-parent="#profileOptions">
                    2Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                </div>

                <div id="collapseredactProfile" class="collapse" aria-labelledby="redactProfile" data-parent="#profileOptions">
                    3Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                </div>

                <div id="collapsechangePassword" class="collapse" aria-labelledby="changePassword" data-parent="#profileOptions">
                    4Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                </div>

                <div id="collapsechangeAvatar" class="collapse show" aria-labelledby="changeAvatar" data-parent="#profileOptions">
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
    let myid = $(".userOptionsToggle[disabled='disabled']").removeAttr('disabled');
    let sayHi = $(this);
    setTimeout(function(){sayHi.attr("disabled", true)}, 1);
  });

  </script>
</x-layouts.app>
