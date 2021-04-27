<x-layouts.app>
  <body>
    <div class="container mt-4">
      <div class="row">
        <div class="col-12 sm p-3 pt-4" style="background-color: red;">
          Профіль
        </div>
        <div id="profileOptionsButtons" class="col-2 sm " style="background-color: red;">
              <button id="myProfile" class="toggle" data-toggle="collapse" data-target="#collapsemyProfile" aria-expanded="false" aria-controls="collapsemyProfile">
                Мій профіль
              </button>
              <button id="myMessages" class="toggle" data-toggle="collapse" data-target="#collapsemyMessages" aria-expanded="false" aria-controls="collapsemyMessages">
                Мої повідомлення
              </button>
              <button id="redactProfile" class="toggle" data-toggle="collapse" data-target="#collapseredactProfile" aria-expanded="false" aria-controls="collapseredactProfile">
                Редагувати профіль
              </button>
              <button id="changePassword" class="toggle" data-toggle="collapse" data-target="#collapsechangePassword" aria-expanded="false" aria-controls="collapsechangePassword">
                Змінити пароль
              </button>
              <button id="changeAvatar" class="toggle" data-toggle="collapse" data-target="#collapsechangeAvatar" aria-expanded="true" aria-controls="collapsechangeAvatar" disabled="disabled">
                Змінити аватар
              </button>
        </div>

        <div class="col-10 sm" style="background-color: blue;">
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
                <form>
                  5Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                </form>
            </div>

          </div>
        </div>
      </div>
    </div>
  </body>

  <script>
  $(".toggle").click(function(){
    // let myid = $("div.collapse.show").attr("id");
    // console.log(myid);
    // myid = myid.substring(8);
    console.log('click');
    // $(this).attr("aria-expanded", true);
    let myid = $(".toggle[disabled='disabled']").removeAttr('disabled');
     $(this).attr("disabled", true);
    console.log(myid);
  });

  </script>
</x-layouts.app>
