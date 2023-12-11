let mtSidenav=document.getElementById("mySidenav")
let nav=document.querySelector('.nav')
let authNav=document.querySelector('#authNav')
let closebutton=document.querySelector('#closeNav')
let navigation=document.querySelector('#navScroll');





/* console.log(nav);
function openNavHeader() {
    document.getElementById("mySidenav").style.width = "25vw";
    document.getElementById("header").classList.remove('col-11',);
    document.getElementById("header").classList.add('col-9',);

} */
function openNav() {
    document.getElementById("mySidenav").style.width = "25vw";


}

function closeNavHeader() {
    document.getElementById("mySidenav").style.width = "0";
    document.getElementById("header").classList.add('col-11');
    document.getElementById("header").classList.remove('col-9');

}
function closeNav() {
    document.getElementById("mySidenav").style.width = "0";


} 


function openSideNav(){
    authNav?.addEventListener('click', ()=>{
        
        openNav()
    })
}

function closeSideNav(){
    closebutton?.addEventListener('click', ()=>{
        console.log('a');
        closeNav()
    })
}



/* let observer = new IntersectionObserver ((entries)=>{
    
    entries.forEach((el)=>{
        const intersecting = entry.isIntersecting
        entry.target.style.backgroundColor = intersecting ? "verde" : "orange"

    })
    

})

observer.observe(navigation) */

window.addEventListener('scroll', function() {
    // Ottieni la posizione verticale dell'elemento
    var posizioneElemento = navigation.getBoundingClientRect().top;

    // Aggiungi o rimuovi la classe in base alla posizione
    if (posizioneElemento <= 0) {
        navigation.classList.add('b-verde-nav');
    } else {
        navigation.classList.remove('b-verde-nav');
    }
});

/* window.addEventListener(("scroll"), ()=>{
    if (window.scrollY >60) {
      navigation.innerHTML=` <nav>
      <ul
      class="banner py-3 fixed-top text-decoration-none justify-content-around list-unstyled mx-auto align-content-center row mx-3  d-none d-md-flex b-black">
      
      <!--                 <li class="f-black col-4 col-md-2 p-0 text-center f-small">Registrati</li>
          <li class="text-white col-4 col-md-2 p-0 text-center f-small">Login</li> -->
          <li class="text-white col-4 col-md-2 p-0 justify-content-center text-center "> <a href="" class="nav-link nav-hover">Inserisci annuncio</a>
          </li>
          <li class="text-white col-4 col-md-2 p-0 justify-content-center text-center "><a href="" class="nav-link nav-hover">Inserisci annuncio</a>
          </li>
          <li class="text-white col-4 col-md-2 p-0 justify-content-center text-center "><a href="" class="nav-link nav-hover">Inserisci annuncio</a></li>
          
      </ul>
      <!-- Vista smartphone -->
      <ul
      class=" nav  py-3 fixed-top text-decoration-none justify-content-around list-unstyled mx-auto align-items-center row   d-flex d-md-none smart-header-section-top ">
      
      
      
      <!-- <li class="text-white col-4 col-md-2 p-0 text-center "><img src="./image/plus (1).png" alt="crea annuncio"></li>
          <li class="dropdown  col-4 col-md-2 p-0 text-center ">
              <button class="btn  " type="button" data-bs-toggle="dropdown" aria-expanded="false">
                  <img src="./image/user.png" alt="">
              </button>
              <ul class="dropdown-menu ">
                  <li><a class="dropdown-item" href="#">Action</a></li>
                  <li><a class="dropdown-item" href="#">Another action</a></li>
                  <li><a class="dropdown-item" href="#">Something else here</a></li>
              </ul>
          </li>      -->
          
          <li class="nav-item  col-4 col-md-2 p-0 text-center dropdown list-unstyled ">
              <a class=" " href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  <img src="./image/user.png" alt="">
              </a>
              <ul class="dropdown-menu b-black align-self-xxl-center smart-dropdown py-2">
                  <li class="text-white  fs-4 col-12  p-0 text-center justify-content-center  my-1">Login</li>
                  <br>
                  <li class="justify-content-center text-white col-12 fs-4  p-0 text-center my-1 ">Registrati
                  </li>
                  
              </ul>
          </li>
          <li class="text-white nav-button col-4 col-md-2 p-0 text-center  "><a href=""><img
              src="./image/email.png" alt=""></a></li>
              
          </ul>
      </nav>`
      
    } else {
      navigation.innerHTML= ` <nav>
      <div id="navScroll d-none d-md-block">
          <div id="mainNavigation">
              <nav role="navigation">
                  <div class="py-3 text-center border-bottom">
                      <h1 class="fs-4  only-top mx-auto f-black ">
                          <img class="P" src="./image/LOGO_PRESTO_FRANCESCO.png" alt="" >
                      </h1>
                  </div>
              </nav>
              <div class=" navbar-expand-md">
                  <div class="navbar-dark text-center my-2">
                      <button class="navbar-toggler w-75" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                          <span class="navbar-toggler-icon"></span> <span class="align-middle">Menu</span>
                      </button>
                  </div>
                  <div class="text-center mt-3 collapse navbar-collapse" id="navbarNavDropdown">
                      <ul class="navbar-nav mx-auto ">
                          <li class="nav-item">
                              <a class="nav-link active" aria-current="page" href="#">Home</a>
                          </li>
                          <li class="nav-item">
                              <a class="nav-link" href="#">Book Hotel</a>
                          </li>
                          <li class="nav-item">
                              <a class="nav-link" href="#">Destinations</a>
                          </li>
                          <li class="nav-item">
                              <a class="nav-link" href="#">Policy</a>
                          </li>
                          <li class="nav-item dropdown">
                              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                  Company
                              </a>
                              <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                  <li><a class="dropdown-item" href="#">Blog</a></li>
                                  <li><a class="dropdown-item" href="#">About Us</a></li>
                                  <li><a class="dropdown-item" href="#">Contact us</a></li>
                              </ul>
                          </li>
                      </ul>
                  </div>
              </div>
          </div>
      </div>
      
  </nav>`
    }
}) */
function form() {
    if (input.value === '') {
        label.classList.remove('d-none');
        
    } else {
        label.classList.add('d-none');
    }
}

openSideNav(); 
closeSideNav();
