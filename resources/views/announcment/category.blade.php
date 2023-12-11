<x-layout>
    <div class="container ">
        <div class="row marginee justify-content-center">
            
            @if ($category)
            <div class="mt-5">
                <h1 class="text-center">{{$category->name}}</h1>
            </div>
                
                @forelse($announcments as $announcment)
               
                <div class="col-12 col-md-3 mx-2 my-3" style="min-width: 16rem">
                    <div class="container-card">
                        <div class="wrapper">
                            <img src="{{!$announcment->images()->get()->isEmpty()?Storage::url($announcment->images()->first()->path): 'https://picsum.photos/'}}" class="banner-image" alt="">
                            <h5 class="fs-3 mt-3 text-truncate px-2" title="{{$announcment->title}}">{{$announcment->title}}</h5>
                            
                            <p class="fw-bold">{{$announcment->price}} €</p>
                            <a class="card-text text-white" href="{{route('category.filter',["category"=>$announcment->category])}}">@if(session('locale')=='it') {{ $announcment->category->name }} @else {{__('ui.' . $announcment->category->name)}}@endif </a>
                            
                        </div>
                        <div class="button-wrapper"> 
                            <a href="{{route('announcment.show',compact('announcment'))}}" class="btn outline">{{__('ui.dettaglio')}}</a>
                            <button class="btn fill">{{__('ui.compra')}}</button>
                        </div>
                    </div>
                </div>
                @empty
                <div class="col-12">
                    <h2 class="text text-center">{{__('ui.mi_dispiace')}} <br><i class="fa-regular fa-face-sad-cry fs"></i></h2>
                </div>
           @endforelse
           @endif
        </div>
    </div>
</x-layout>

