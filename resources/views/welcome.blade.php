<x-layout>


    <header class="color-header padding-header " style="margin-top: 120px;">
        <div class="on-light mb-5">
            @if (session()->has('access.denied'))
                <div class="col-12 alert alert-danger">
                    <p class="text-center">{{ session('access.denied') }}</p>
                </div>
            @endif
            @if (session()->has('success'))
                <div class="col-12 alert alert-success">
                    <p class="text-center">{{ session('success') }}</p>
                </div>
            @endif

        </div>
        <div class="container g-0" id="">
            <div class="row d-flex justify-content-around">
                


                <div class=" row  justify-content-between" id="header">
                    <div class="col-12 col-md-3 mb-2 pe5">
                        <!-- Select Category -->
                        <li class="nav-item dropdown list-unstyled ">

                            <a class="nav-link dropdown-toggle b-verde text-white px-3  rounded  text-center" id="navv"
                                href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                {{ __('ui.category') }}
                            </a>

                            <ul class="dropdown-menu b-verde w-100">
                                @foreach ($categories as $category)
                                    <li class="b-verde text-white ">
                                        <a class="card-text b-verde  nav-link text-center text-white" id="navvv"
                                            href="{{ route('category.filter', ['category' => $category->id]) }}">
                                            @if (session('locale') == 'it')
                                                {{ $category->name }}
                                            @else
                                                {{ __("ui.$category->name") }}
                                            @endif
                                        </a>
                                    </li>
                                @endforeach

                            </ul>
                        </li>
                    </div>


                    <div class="col-12 col-md-7  ps-md-5 ps-md-0 pe-0 pe-md-1  mb-2s mb-md-0">
                        <!-- Search bar -->

                        <div class="input-group ">

                            <form class="d-flex w-100" action="{{ route('announcments.search') }}" method="GET">
                                <input name="searched" class="form-control rounded-4 shadow w-100 " type="search"
                                    placeholder="{{ __('ui.search') }}">
                                <div class="input-group-append">

                                    <button class="btn btn-secondary rounded-4" type="submit"
                                        style="background-color: #CA3C25; border-color:#CA3C25 ">
                                        <i class="fa fa-search fs6"></i>
                                    </button>
                                </div>

                            </form>
                        </div>


                    </div>
                    <div class="col-2 d-none d-md-block  ">

                        <!-- Lang Select -->
                        <div class="dropdown ">
                            <button class="btn lang-btn b-verde dropdown-toggle text-white" type="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                <span class="text-white">{{ __('ui.lang') }}</span>
                            </button>
                            <ul class="dropdown-menu b-verde justify-content-center b-verde ">
                                <li class="nav-item justify-content-center b-verde d-flex"><x-_locale lang="it" />
                                </li>
                                <li class="nav-item justify-content-center b-verde  d-flex"><x-_locale lang="en" />
                                </li>
                                <li class="nav-item justify-content-center b-verde  d-flex"><x-_locale lang="es" />
                                </li>
                            </ul>
                        </div>

                    </div>
                </div>



                <div class="container-fluid col-custom marginee img-custom">
                    <div class="row h-100 d-flex justify-content-start align-items-center">
                        <div class="col-12 col-md-7 ">

                            <div class=" align-content-center ">
                                <div id="carouselExampleAutoplaying" class="carousel slide my-auto"
                                    data-bs-ride="carousel">
                                    <div class="carousel-inner">
                                        <div class="carousel-item active">
                                            <div class="e p-0 p-md-5 pb-4 align-items-center justify-content-center ">
                                                <div class="text-wrap fs-3 fw-bold text-center f-black t-shadow orange">
                                                    {{ __('ui.fraseCarosello1') }} <br> {{ __('ui.fraseCarosello2') }}
                                                </div>
                                            </div>
                                            <div class="buynow_bt  mb-5 "><a
                                                    href="{{ route('index') }}">{{ __('ui.acquista') }}</a></div>
                                        </div>
                                        <div class="carousel-item">
                                            <div
                                                class="e p-0 p-md-5 pb-4 align-items-center justify-content-center grab">
                                                <div class="text-wrap fs-4 fw-bold text-center f-black t-shadow orange">
                                                    {{ __('ui.fraseCarosello3') }} <br>{{ __('ui.fraseCarosello4') }}
                                                </div>
                                            </div>
                                            <div class="buynow_bt mb-5"><a
                                                    href="{{ route('announcment.create') }}">{{ __('ui.vendi') }}</a>
                                            </div>
                                            {{-- <form action="{{route('announcment.destroy',compact('announcment'))}}" method="post">
                                            @csrf
                                            @method('delete')
                                            <button class="btn btn-danger" type="submit" >Delete</button>
                                        </form> --}}
                                        </div>

                                    </div>


                                </div>
                            </div>

                        </div>
                    </div>
                </div>




            </div>
        </div>

    </header>

    <div class="container">


        <div class="row  justify-content-center">


            <h1 class="text-center text-uppercase text-dark">{{ __('ui.ultimi_annunci') }}</h1>

            @foreach ($announcments as $announcment)
                <div class="col-12 col-md-3 mx-2 my-3" style="min-width: 17rem">
                    <div class="container-card">
                        <div class="wrapper">
                            
                                <img src="{{ !$announcment->images()->get()->isEmpty()? $announcment->images()->first()->getUrl(500, 500) : asset('images/default.png') }}"class="banner-image "
                                alt="{{ $announcment->title }}"> 
                                
                            
                           
                            <h5 class="fs-3 px-2 mt-3 text-uppercase text-truncate" title="{{ $announcment->title }}">{{ $announcment->title }}</h5>

                            <p class="fw-bold">{{ $announcment->price }} €</p>
                            <a class="card-text text-white"
                                href="{{ route('category.filter', ['category' => $announcment->category]) }}">
                                @if (session('locale') == 'it')
                                    {{ $announcment->category->name }}
                                @else
                                    {{ __('ui.' . $announcment->category->name) }}
                                @endif
                            </a>
                            <p class="fs-6 text-black-50">{{$announcment->created_at->format('d-m-Y')}} <br> {{$announcment->created_at->format('H:i:s')}}</p>
                            
                        </div>
                        <div class="button-wrapper px-1">
                            <a href="{{ route('announcment.show', compact('announcment')) }}"
                                class="btn outline">{{ __('ui.dettaglio') }}</a>
                            <a class="btn fill b-verde"
                                href="{{ route('add_to_cart', $announcment->id) }}">{{ __('ui.compra') }}</a>
                        </div>
                    </div>
                </div>
            @endforeach



        </div>
    </div>



</x-layout>
