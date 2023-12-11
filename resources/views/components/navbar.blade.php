<div class="py-3 text-center border-bottom d-none d-md-block">
    <h1 class="fs-4   mx-auto f-black ">
        <a href="{{ route('welcome') }}"><img class="P"
                src="/media/LOGO_PRESTO_FRANCESCO_FAI_SUBITO.png" alt="Presto logo"></a>
    </h1>
</div>

<nav class="sticky-top">
    <div id="navScroll" class="d-none d-md-block  pb-2">
        <div id="mainNavigation">
            <nav role="navigation">
                
                <div class="">
                    <div class="navbar-expand-md nav-custom d-flex align-items-center b-navbar ">
                        <div class="navbar-dark text-center ">
                            <button class="navbar-toggler w-75" type="button" data-bs-toggle="collapse"
                                data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown"
                                aria-expanded="false" aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span> <span class="align-middle">Menu</span>
                            </button>
                        </div>
                        <div class="text-center mt-3 collapse navbar-collapse " id="navbarNavDropdown">
                            <ul class="navbar-nav mx-auto ">
                                <li class="nav-item mx-3 d-flex align-items-center">
                                    <a class="nav-link active  mx-auto " aria-current="page"
                                        href="{{ route('welcome') }}">Home</a>
                                </li>
                                @guest
                                    <li class="nav-item mx-3">
                                        <a class="nav-link f-black"
                                            href="{{ route('register') }}">{{ __('ui.registrati') }}</a>
                                    </li>
                                    <li class="nav-item mx-3">
                                        <a class=" f-black" href="{{ route('login') }}">login</a>
                                    </li>
                                @endguest
                                @auth
                                    <li class="nav-item mx-3">
                                        <a class="nav-link f-black"
                                            href="{{ route('announcment.create') }}">{{ __('ui.nuovo_annunzio') }}</a>
                                    </li>
                                    <li class="nav-item mx-3">

                                        <a class="nav-link dropdown-toggle   f-black" style="cursor: pointer"
                                            id="authNav">{{ Auth::user()->name }}</a>
                                    </li>
                                @endauth
                                <li class="nav-item mx-3">
                                    <a class="nav-link  f-black"
                                        href="{{ route('index') }}">{{ __('ui.tutti_gli_annunci') }}</a>
                                </li>



                            </ul>
                        </div>
                    </div>
                </div>
                

            </nav>
        </div>
    </div>
    


    <div class="container-fluid fixed-bottom">
        <div class="row d-flex align-items-center">
            <div class="col-12 d-md-none b-nav">
                <ul class="d-flex justify-content-around align-items-center p-0 m-0 py-4">
                    <li class=" nav-link"><a href="{{ route('welcome') }}"><i
                                class="fa-solid fa-house text-white fs-5"></i></a>
                    </li>
                    <li class=" nav-link"><a href="{{ route('cart') }}"><i
                                class="fa-solid fa-cart-shopping text-white fs-5"></i></a>
                    </li>
                    <li class=" nav-link">
                        <div class="btn-group dropup-center dropup">
                            <button type="button" class="btn m-0 p-0" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fa-solid fa-user text-white fs-5"></i>
                            </button>
                            <ul class="dropdown-menu">
                                @guest
                                    <li>
                                        <a class="nav-link text-white text-center"
                                            href="{{ route('register') }}">{{ __('ui.registrati') }}</a>
                                    </li>
                                    <li>
                                        <a class="nav-link text-white text-center" href="{{ route('login') }}">Login</a>
                                    </li>
                                @endguest
                                @auth
                                    <li>
                                        <a class="nav-link  text-white text-center riga"
                                            style="cursor: pointer">{{ Auth::user()->name }}</a>
                                    </li>

                                    <form id="form-logout" action="{{ route('logout') }}" method="POST">

                                        @csrf
                                    </form>
                                @endauth
                                <li>
                                    <a class="nav-link  text-white text-center   "
                                        href="{{ route('become.revisor') }}">{{ __('ui.diventa_revisore') }}
                                    </a>
                                </li>
                                @auth
                                    <li>
                                        @if (Auth::user()->is_revisor)
                                            <a class=" position-relative nav-link  text-white text-center d-flex"
                                                href ="{{ route('revisor.index') }}">{{ __('ui.zona_revisore') }} <p
                                                    class="circle ms-1 mb-0">
                                                    {{ App\Models\Announcment::toBeRevisionedCount() }}
                                                </p>
                                            </a>
                                    </li>
                                @endauth
                                @endif
                                <li>
                                    <a class="nav-link  text-white text-center"
                                        href="{{ route('index') }}">{{ __('ui.tutti_gli_annunci') }}</a>
                                </li>
                                <li>
                                    <a class="nav-link  text-white text-center"
                                        href="{{ route('form') }}">{{ __('ui.contattaci') }}</a>
                                </li>
                                @auth


                                    <li>
                                        <a class="nav-link  text-white text-center " style="cursor: pointer"
                                            onclick="event.preventDefault();getElementById('form-logout').submit();">Logout
                                        </a>
                                    </li>
                                @endauth

                            </ul>
                        </div>
                    </li>
                    @auth
                        <li class=" nav-link">
                            <a href="{{ route('announcment.create') }}">
                                <i class="fa-regular fa-square-plus text-white fs-5"></i>
                            </a>
                        </li>
                    @endauth
                </ul>
            </div>
        </div>
    </div>

    <!-- SideNav -->
    <div id="mySidenav" class="sidenav">
        <a href="javascript:void(0)" class="closebtn" id="closeNav">&times;</a>

        <a href="{{ route('index') }}" class="">{{ __('ui.tutti_gli_annunci') }}</a>

        @auth
            <a class="" style="cursor: pointer"
                onclick="event.preventDefault();getElementById('form-logout').submit();">Logout</a>
            <form id="form-logout" action="{{ route('logout') }}" method="POST">

                @csrf
            </form>
            <a class="@if (Auth::user()->is_revisor) d-none @endif"
                href="{{ route('become.revisor') }}">{{ __('ui.diventa_revisore') }}</a>
            @if (Auth::user()->is_revisor)
                <a class=" position-relative " href ="{{ route('revisor.index') }}">{{ __('ui.zona_revisore') }}<span
                        class="position-absolute top-0  start-50  badge rounded-pill bg-danger">{{ App\Models\Announcment::toBeRevisionedCount() }}</span></a>
            @endif
        @endauth


        <a href="{{ route('form') }}">{{ __('ui.contattaci') }}</a>
    </div>
</nav>
