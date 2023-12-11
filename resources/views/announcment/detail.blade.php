<x-layout>
  

  <div class="container">
    @if(session()->has('success'))
            <div class="col-12 alert alert-success">
              <p>{{session("success")}}</p>
            </div>
            @endif
    <div class="container-detail">
    <div class="box">
        <div class="product__img">
          <div id="carouselExample" class="carousel slide ">
            
            @if($announcment->images)
            <div class="carousel-inner rounded-top-4">
              @foreach($announcment->images as $image)
              <div class="carousel-item  @if($loop->first) active @endif">
                <img src="{{$image->getUrl(500,500)}}" class=" d-block w-100 rounded-4" alt="{{$announcment->title}}">
              </div>
              @endforeach
              @else
              <div class="carousel-item active">
                <img src="{{asset('images/default.png')}}" class="d-block w-100 justify-content-center" alt="...">
              </div>
              
            </div>
            @endif
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden"> {{__('ui.precedente')}} </span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Next</span>
            </button>
          </div>
        </div>
        </div>



        <div class="product__disc rounded-4">
            <div class="product__disc--content">
                <div class="disc__content--about">
                    <h1 class=" text-uppercase">{{$announcment->title}}</h1>
                    
                    <p class="fs-6">{{$announcment->description}}</p>
                    <p>{{$announcment->price}} €</p>
                </div>

                
            </div>
        </div>

        <div class="product_buttons">
            <button class="btn wishlist"><a class=" nav-link" href="{{route('welcome')}}">Home</a></button>
            <button class="btn buy text-uppercase"><a href="{{route('add_to_cart', $announcment->id)}}" class="nav-link">{{__('ui.compra')}}</a> </button>
        </div>
    </div>
</div>
</div>
</x-layout>