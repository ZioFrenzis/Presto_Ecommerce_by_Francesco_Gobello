<x-layout>
    <div class="container marginee img-custom">
        <div class="row marginee">
            <div class="col-12 mt-5">

                <h1 class=" text-center text-dark">{{ __('ui.registrati') }}</h1>
            </div>
            <div class="col-12  mt-5">
                <form action="{{route('register')}}" method="POST">
                    @csrf
                    <div class="mb-4 input-group">
                        
                        <input type="text" name="name" class="input rounded-4" id="name" aria-describedby="emailHelp" value="{{old('name')}}" placeholder="">
                        <label for="name" class="label">{{ __('ui.nome') }}</label>
                        @error('name')
                        <p class="text-danger">{{$message}}</p>
                        @enderror
                        
                    </div>
                    <div class="mb-4 input-group">
                        
                        <input type="email" name="email" class="input rounded-4" id="email" aria-describedby="emailHelp" value="{{old('email')}}" placeholder="">
                        <label for="email" class="label">Email*</label>
                        @error('email')
                        <p class="text-danger">{{$message}}</p>
                        @enderror
                        
                    </div>
                    <div class="mb-4 input-group">
                        
                        <input type="password" name="password" class="input rounded-4" id="password" value="{{old('password')}}" placeholder="">
                        <label for="password" class="label">{{ __('ui.password') }}</label>
                        @error('password')
                        <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="mb-4 input-group">
                        
                        <input type="password" name="password_confirmation" class="input rounded-4" id="password_confirmation" value="{{old('password_confirmation')}}" placeholder="">
                        <label for="password_confirmation" class="label">{{ __('ui.password_confermata') }}</label>
                        @error('password_confirmation')
                        <p class="text-danger">{{$message}}</p>
                        @enderror

                        
                    </div>
                    <div class="col-12 ">
                        <button type="submit" class=" btn fill b-verde">{{ __('ui.registrati')}}</button>
                    </div>
                    
                </form>
            </div>
        </div>
    </div>
</x-layout>

