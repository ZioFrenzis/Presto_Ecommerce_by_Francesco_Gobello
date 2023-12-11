<x-layout>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12">
                <h1 class="text-center">{{ __('ui.contattaci')}}</h1>
            </div>
            <div class="col-12 col-md-5">
                <form method="post" action="{{route('send.email')}}">
                    @csrf
                    <div class="mb-3">
                      <label for="name" class="form-label fs-4 fw-bold">{{ __('ui.nome')}}*</label>
                      <input name="username" type="text" class="form-control" id="name" aria-describedby="emailHelp" value="{{old('name')}}">
                      @error('name') <p class="text-danger">{{$message}}</p> @enderror
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label fs-4 fw-bold">{{ __('ui.indirizzo_email')}}*</label>
                        <input name="email" type="email" class="form-control" id="email" aria-describedby="emailHelp" value="{{old('email')}}">
                        @error('email') <p class="text-danger">{{$message}}</p> @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label fs-4 fw-bold" for="message">{{ __('ui.messaggio')}}*</label>
                      <textarea name="message" class="form-control" id="message" cols="30" rows="10">{{old('message')}}</textarea>
                      @error('message') <p class="text-danger">{{$message}}</p> @enderror
                    </div>
                    <button type="submit" class="btn fill b-verde">{{ __('ui.invia')}}</button>
                  </form>
            </div>
        </div>
    </div>
</x-layout>