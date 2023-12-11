<x-layout>
    <header>
        <div class="container">
            <div class="row marginee justify-content-center">
                <div class="col-12">
                    <h1 class="text-center my-5">
                        {{ $announcment_to_check ? __('ui.annuncio_da_revisionare') : __('ui.non_ci_sono_annunci_da_revisionare') }}
                    </h1>
                </div>
            </div>
            @if (session()->has('success'))
                <div class="col-12 alert alert-success">
                    <p>{{ session('success') }}</p>
                </div>
            @endif

            @if (session()->has('message'))
                <div class="col-12 alert alert-danger">
                    <p>{{ session('message') }}</p>
                </div>
            @endif
        </div>







        @if ($announcment_to_check)
            <div class="container-fluid">
                <div class="row  ">
                    
                    <div class="col-3 mx-auto">
                        <div id="carouselExample" class="carousel slide">
                            @if ($announcment_to_check->images->isNotEmpty())

                            <div class="row">
                                <div class="carousel-inner">
                                        @foreach ($announcment_to_check->images as $image)
                                        <div class="col-12">
                                    <div class="carousel-item  @if($loop->first) active @endif">
                                        <img src="{{$image->getUrl(500,500)}}" class=" d-block w-100 rounded-4" alt="{{$announcment_to_check->title}}">
                                    
                                    <div class="col-12 d-flex flex-column justify-content-center align-items-center">
                                        <h5 class="card-title my-3">Check contenuto:</h5>
                                        <p class="card-text fw-bold">Adulti: <span class="{{ $image->adult }}"></span> </p>
                                        <p class="card-text fw-bold">Satira: <span class="{{ $image->spoof }}"></span> </p>
                                        <p class="card-text fw-bold">Medicina: <span class="{{ $image->medical }}"></span> </p>
                                        <p class="card-text fw-bold">Contenuto ammiccante: <span class="{{ $image->racy }}"></span>
                                        </p>
                                        <p class="card-text fw-bold">Violenza: <span class="{{ $image->violence }}"></span></p>
                                    </div>
                                </div>
                                    </div>
                                
                                      @endforeach
                                      
                                    
                                    </div>
                                       
                                        
                                    </div>
                                
                                    
                                    
                                @else
                                    <div class="carousel-item active">
                                        <img src="{{asset('images/default.png')}}" class="d-block w-100 justify-content-center"
                                            alt="default">
                                    </div>


                                </div>
                            @endif
                            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample"
                                data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#carouselExample"
                                data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>

                        </div>



                    </div>


                </div>
           {{--  <div class="card-body col-12 col-md-3 ps-3 d-flex flex-column align-items-center d-md-block ">
                <div id="carouselExample" class="carousel slide">
                    <div class="carousel-inner">
                        @foreach ($announcment_to_check->images as $image)
                      <div class="carousel-item @if($loop->first) active @endif">
                        <h5 class="card-title my-3">Check contenuto:</h5>
                    <p class="card-text fw-bold">Adulti: <span class="{{ $image->adult }}"></span> </p>
                    <p class="card-text fw-bold">Satira: <span class="{{ $image->spoof }}"></span> </p>
                    <p class="card-text fw-bold">Medicina: <span class="{{ $image->medical }}"></span> </p>
                    <p class="card-text fw-bold">Contenuto ammiccante: <span class="{{ $image->racy }}"></span>
                    </p>
                    <p class="card-text fw-bold">Violenza: <span class="{{ $image->violence }}"></span></p>
                      </div>
                      @endforeach
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                      <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                      <span class="carousel-control-next-icon" aria-hidden="true"></span>
                      <span class="visually-hidden">Next</span>
                    </button>
                  </div> --}}
                
                    

                    
                        
                    
                    

                    
                </div>
                </div>


                @foreach ($announcment_to_check->images as $image)
                <div class="col-12 mt-4">


                    @if ($image->labels)
                        <div class="text-center">
                            @foreach ($image->labels as $label)
                                <span>{{ $label }}, </span>
                            @endforeach
                        </div>
                    @endif
                </div>
                @endforeach





                <div class="only-top w-100 mt-3"></div>
                <div class="col-6 mx-auto">
                    <h5 class="card-title text-center mt-5 fs-2 text-uppercase">{{ __('ui.titolo') }}:
                    {{ $announcment_to_check->title }}
                </h5>
                <p class="card-text text-center fs-3 mt-4">{{ __('ui.descrizione') }}:
                    {{ $announcment_to_check->description }}</p>
                <p class="card-footer text-center">{{ __('ui.pubblicato_il') }}
                    {{ $announcment_to_check->created_at->format('d/m/Y') }}</p>

            </div>
            </div>

            <div class="row justify-content-center">
                <div class="col-4 justify-content-center d-flex">
                    <form action="{{ route('revisor.acceptAnnouncment', ['announcment' => $announcment_to_check]) }}"
                        method="POST">
                        @csrf
                        @method('PATCH')
                        <button type="submit" class="btn fill b-verde ">{{ __('ui.accetta') }}</button>

                    </form>
                </div>
                <div class="col-4 justify-content-center d-flex">
                    <form action="{{ route('revisor.rejectAnnouncment', ['announcment' => $announcment_to_check]) }}"
                        method="POST">
                        @csrf
                        @method('PATCH')
                        <button type="submit" class="btn outline b-red text-white">{{ __('ui.rifiuta') }}</button>
                    </form>
                </div>
            </div>
                </div>
                
            






        @endif

        {{-- ANNULLA --}}
        <div class="col-12 mt-4">

            <form method="POST" action="{{ route('revisor.undo_last_announcment') }}"
                class="d-flex justify-content-center">
                @csrf
                @method('PATCH')
                <button class="btn" type="submit">Annulla ultima azione</button>
            </form>
        </div>

    </header>



    <div class="container marginee">


        <div class="row  justify-content-center">

            <div class="col-md-5 col-12">
                <div class="row justify-content-center">
                    @foreach ($announcments_true as $announcment)
                        <div class="col-12 col-md-3 mx-2 my-3" style="min-width: 16rem">
                            @if ($announcment->is_accepted)
                                <h3 class="text-center text-uppercase verde">ACCETTATO</h3>
                            @else
                                <h3 class="text-center text-uppercase red">RIFIUTATO</h3>
                            @endif

                            <div class="container-card">
                                <div class="wrapper">
                                    <img src="{{ !$announcment->images()->get()->isEmpty()? $announcment->images()->first()->getUrl(500, 500): asset('images/default.png') }}"class="banner-image"
                                        alt="{{ $announcment->title }}">
                                    <h5 class="fs-3 mt-3 text-uppercase text-truncate">{{ $announcment->title }}</h5>

                                    <p class="fw-bold">{{ $announcment->price }} €</p>
                                    <a class="card-text text-white"
                                        href="{{ route('category.filter', ['category' => $announcment->category]) }}">{{ $announcment->category->name }}
                                    </a>
                                </div>
                                <form method="POST"
                                    action="{{ route('revisor.undo_announcment', compact('announcment')) }}">
                                    @csrf
                                    @method('PATCH')
                                    <button class="btn outline" type="submit">Annulla</button>
                                </form>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="col-2 d-none d-md-block "></div>
            <div class="col-md-5 col-12">
                <div class="row">
                    @foreach ($announcments_false as $announcment)
                        <div class="col-12 col-md-3 mx-2 my-3" style="min-width: 16rem">
                            @if ($announcment->is_accepted)
                                <h3 class="text-center text-uppercase verde">ACCETTATO</h3>
                            @else
                                <h3 class="text-center text-uppercase red">rifiutato</h3>
                            @endif

                            <div class="container-card">
                                <div class="wrapper">
                                    <img src="{{ !$announcment->images()->get()->isEmpty()? $announcment->images()->first()->getUrl(500, 500): asset('images/default.png') }}"class="banner-image"
                                        alt="{{ $announcment->title }}">
                                    <h5 class="fs-3 mt-3 text-uppercase text-truncate">{{ $announcment->title }}</h5>

                                    <p class="fw-bold">{{ $announcment->price }} €</p>
                                    <a class="card-text text-white"
                                        href="{{ route('category.filter', ['category' => $announcment->category]) }}">{{ $announcment->category->name }}
                                    </a>
                                </div>

                            </div>
                        </div>
                    @endforeach
                </div>
            </div>






        </div>
    </div>
    








</x-layout>
