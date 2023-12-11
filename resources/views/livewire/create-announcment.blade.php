<div class=" ">

    <div class=" container-fluid ">
        <div class="row mt-5">
            <div class="col-12 marginee">
                <h1 class="text-center  fblack fw-bold">{{__('ui.crea_annuncio')}}</h1>
            </div>
            <div class="col-12">

                @if(session()->has('success'))
                    <div class="col-12 alert alert-success">
                        <p>{{session("success")}}</p>
                    </div>
                @endif
                    
                <form wire:submit.prevent="{{$editMode ? 'update' : 'store'}}">
                    @csrf
                    <div class="mb-3">
                        <label for="title" class="form-label text-dark">{{__('ui.titolo')}}</label>
                        <input wire:model='title' @error('title') is-invalid @enderror type="text" class="form-control border-4 " id="title" >
                        @error('title')
                        <p class="text-danger">
                            {{$message}}
                        </p>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label text-dark">{{__('ui.descrizione')}}</label>
                        <textarea wire:model='description' @error('description') is-invalid @enderror id="description"  class="form-control"></textarea>
                        @error('description')
                        <p class="text-danger">
                        {{$message}}
                        </p>
                        @enderror
                    </div>
                    
                    <label for="price" class="form-label text-dark">{{__('ui.prezzo')}}</label>
                    <div class="input-group mb-3 col-12 col-md-3  ms-0 ps-0">
                        <span class="input-group-text">€</span>
                        <input type="number" step="0.01" wire:model='price' @error('price') is-invalid @enderror class="form-control" id="price" >
                        @error('price')
                        <p class="text-danger">
                            {{$message}}
                        </p>
                        @enderror
                    </div>
                    
                    

                    <div class="col-12 col-md-6 p-0">
                        <select wire:model.defer='category' @error('category') is-invalid @enderror class="form-select mb-3 " id="category " >
                        <option selected>{{__('ui.seleziona_categoria')}}</option>
                        @foreach($categories as $category)
                        <option value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                    </select>
                    @error('category')
                    <p class="text-danger">
                        {{$message}}
                    </p>
                    @enderror
                    </div>
                    
                    

                    <div class="mb-3">
                        <input wire:model="temporary_images" type="file" name="images" multiple class="form-control @error('temporary_images.*') is-invalid @enderror">
                        @error('images')
                        <p class="text-danger">
                            {{$message}}
                        </p>
                        @enderror
                        @if(!empty($images))
                        <div class="row marginee ">
                            <div class="col-12">
                                <div class="row rounded  d-flex  justify-content-center ">
                                    <p class="text-center fs-1 fw-bold">Photo preview</p>
                                    @foreach($images as $key => $image)
                                    <div class="col-4 d-flex flex-column align-content-center justify-content-center">
                                        <div class="img mx-auto rounded  img-preview" style="background-image:url({{$image->temporaryUrl() }});"> </div>
                                        <div class="col-3 mx-auto d-flex justify-content-center"><button type="button" class="btn fill-red b-red my-3 shadow d-block text-center" wire:click="removeImage({{$key}})">Cancella</button></div>
                                        
                                    </div>
                                    @endforeach
                                </div>
                            </div>  
                        </div>
                        @endif   
                        
                    </div>
                    <div class="col-12 justify-content-center d-flex">
                        <button type="submit" class="  btn fill b-verde">{{__('ui.crea_annuncio')}}</button>
                        
                    </div>
                    
                </form>
                
            </div>
        </div>
    </div>
</div>
