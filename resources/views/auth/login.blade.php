<x-layout>
  <div class="container  ">
    <div class="row img-custom ">
        <div class="col-12 mt-5">
             
            @if (session()->has('success'))
            <div class="col-12 alert alert-success">
                <p class="text-center">{{ session('success') }}</p>
            </div>
            @endif

            <h1 class=" text-center text-dark">Login</h1>
        </div>
        <div class="col-12  mt-5 ">
            <form action="{{route('login')}}" method="POST">
                @csrf
                
                <div class="mb-4 input-group">
                    
                    <input type="email" name="email" class="input rounded-4" id="email" aria-describedby="emailHelp" value="{{old('email')}}" placeholder="">
                    <label for="email" class="label ">Email*</label>
                    @error('email')
                    <p class="text-danger">{{$message}}</p>
                    @enderror
                    
                </div>
                <div class="mb-3 input-group">
                    
                    <input type="password" name="password" class="input rounded-4" id="password" value="{{old('password')}}" placeholder="">
                    <label for="password" class="label">{{ __('ui.password') }}</label>
                    @error('password')
                    <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>

                <div class="col-12 p-0">
                    <button type="submit" class=" btn fill b-verde">Login*</button>
                    <button type="submit" class=" btn fill b-verde"><a class="text-white" href="{{route('register')}}">{{ __('ui.registrati')}}</a></button>
                </div>
                
            </form>
        </div>
    </div>
</div>




 
 
</x-layout>
