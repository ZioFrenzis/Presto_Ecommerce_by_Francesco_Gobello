 <!--  ball bouncing -->
 <div class="d-flex justify-content-end me-2">
    <div class="card-b ball-bouncing mb-0">
    <div class="ball d-flex justify-content-center align-items-center"><img class="img-ball" src="\media\LOGO_PRESTO_FRANCESCO.png" alt=""></div>
  </div> 
 </div>
 


         
          
    <footer class="py-4 footer-custom container-fluid  b-black">
        <ul class="nav justify-content-evenly border-bottom pb-3 mb-3">
            <li class=" text-center"><a href="{{route('become.revisor')}}" class="nav-link footer-links fw-bold fs-5  text-white">{{__('ui.lavora_con_noi')}}</a></li>

            <li class="nav-item text-center"><a href="#" class="nav-link fw-bold footer-links fs-5  px-2 text-white"><div class="dropdown  ">
              <button class="nav-item text-center dropdown-toggle text-white nav-link footer-links fw-bold fs-5  p-0" type="button"
              data-bs-toggle="dropdown" aria-expanded="false">
              <span class="footer-links text-white ">{{ __('ui.lang') }}</span>
          </button>
          <ul class="dropdown-menu justify-content-center ">
              <li class="nav-item justify-content-center d-flex"><x-_locale lang="it" />
                  </li>
                  <li class="nav-item justify-content-center  d-flex"><x-_locale lang="en" />
                      </li>
                      <li class="nav-item justify-content-center  d-flex"><x-_locale lang="es" />
                          </li>
                      </ul>
                  </div></a></li>
           @guest 
            <li class=" text-center footer-links"><a href="{{route('login')}}" class="nav-link footer-links fs-5  fw-bold px-2 text-white">{{__('ui.contattaci')}}</a></li>
            @endguest
            @auth
                <li class=" text-center footer-links" ><a href="{{route('form')}}" class="nav-link  fs-5  fw-bold px-2 text-white footer-links"> {{__('ui.contattaci')}}</a>
                </li>
            @endauth
            </ul>
            
        <p class="text-center text-white fw-bold mt-5">© 2023 BitBrigade, Inc</p>
    </footer>
    <div style="height: 200px" class="b-black container-fluid d-block d-md-none"></div>
