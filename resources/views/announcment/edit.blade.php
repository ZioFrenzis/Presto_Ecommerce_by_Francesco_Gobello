<x-layout>
    <div class="col-12">
        <h1 class="text-center h1-edit mb-0">Edit Announcments</h1>
    </div>
      <div class="container-fluid editcontainer">
          <div class="row justify-content-center">
              @if(session()->has('success'))
              <div class="col-12 alert alert-success">
                <p>{{session("success")}}</p>
              </div>
              @endif
              <div class="col-12 col-md-6">
                  <form action="{{route('announcment.updated',compact('announcment'))}}" enctype="multipart/form-data" method="post">
                      @csrf
                      @method('put')
                      <div class="mb-3">
                        <label for="title" class="form-label fs-2 my-2">Title</label>
                        <input name="title" type="text" class="form-control" id="title" value="{{$announcment->title}}">
                        @error('title') <p class="text-danger">{{$message}}</p> @enderror
                      </div>
                      <div class="mb-3">
                        <label for="category" class="form-label text-warning fs-5 fw-medium">Category</label>
                        <select name="category" class="form-select" id="category">
                          <option selected>Select category</option>
                          @foreach($categories as $category)
                          <option value="{{$category->id}}"@selected($category==$announcment->category)>{{$category->name}}</option>
                          @endforeach
                          @error('category') <p class="text-danger">{{$message}}</p> @enderror
                        </select>
                      </div>
                      <div class="mb-3">
                        <label for="description" class="form-label text-bg-success text-warning fs-3">Description</label>
                     <textarea name="description" id="descriptiom" cols="30" rows="10" class="form-control" >{{$announcment->description}} </textarea>
                     @error('description') <p class="text-danger">{{$message}}</p> @enderror
                      </div>
                      <div class="mb-3">
                          <label for="price" class="form-label text-bg-warning text-success fs-3">Price</label>
                          <input name="price" type="number" class="form-control" id="title" value="{{$announcment->price}}">
                          @error('price') <p class="text-danger">{{$message}}</p> @enderror
                        </div>
                        <div class="mb-3">
                          <label for="image" class="form-label fw-medium text-body-emphasis">Image</label>
                          <input name="image" type="file" class="form-control border-info border-3" id="image">
                          @error('image') <p class="text-danger">{{$message}}</p> @enderror
                        </div>
                      <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
              </div>
          </div>
      </div>
  </x-layout>