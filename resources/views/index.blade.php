<x-layout>

    <div class="container">
        <div class="row marginee justify-content-center">
            <div class="col-12">
               <h1 class="text-center my-5">{{__('ui.allAnnouncments')}}</h1>
            </div>
            @if(session()->has('success'))
            <div class="col-12 alert alert-success">
              <p>{{session("success")}}</p>
            </div>
            @endif
            @forelse ($announcments as $announcment)
            <div class="col-12 col-md-4   my-4" style="min-width: 16rem">
                <div class="container-card" >
                    <div class="wrapper">
                        <img src="{{ !$announcment->images()->get()->isEmpty()? $announcment->images()->first()->getUrl(500, 500): asset('images/default.png')  }}"class="banner-image"
                        alt="{{ $announcment->title }}">
                        <h5 class="fs-3 text-truncate px-2 mt-3" title="{{$announcment->title}}">{{$announcment->title}}</h5>
                        
                        <p class="fw-bold">{{$announcment->price}} €</p>
                        <a class="card-text text-white" href="{{route('category.filter',["category"=>$announcment->category])}}">@if(session('locale')=='it') {{ $announcment->category->name }} @else {{__('ui.' . $announcment->category->name)}}@endif </a>
                    </div>
                    <div class="button-wrapper"> 
                        <a href="{{route('announcment.show',compact('announcment'))}}" class="btn outline">{{__('ui.dettaglio')}}</a>
                        <a class="btn fill b-verde"
                                href="{{ route('add_to_cart', $announcment->id) }}">{{ __('ui.compra') }}</a>
                        {{-- <button class="btn btn-warning" wire:click="edit({{$announcment->id}})">Edit</button>
                        <button class="btn-danger btn" wire:click="destroy{{$announcment->id}}">Delete</button> --}}
                    </div>
                </div>
            </div>
            @empty
            <div class =”col-12”>
                <div class ="alert alert-warning py-3 shadow">
                <p class=”lead”> {{__('ui.non_ci_sono_annunci')}}</p>
                </div>
                </div>
                @endforelse
                {{-- {{$announcments->links()}} --}}
                </div>
        
            
        </div>
    </div>
</x-layout>