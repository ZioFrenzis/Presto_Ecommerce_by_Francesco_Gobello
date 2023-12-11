<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Category;
use App\Jobs\RemoveFaces;


use App\Jobs\ResizeImage;
use App\Jobs\AddWatermark;
use App\Models\Announcment;
use Livewire\WithFileUploads;
use App\Jobs\GoogleVisionLabelImage;
use App\Jobs\GoogleVisionSafeSearch;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;




class CreateAnnouncment extends Component
{
    use WithFileUploads;

    public $title;
    public $description;
    public $price;
    public $category;
    public $validated;
    public $message;
    public $temporary_images;
    public $images = [];
    public $image;
    public $form_id;
    public $announcment;
    public $editMode=false;
    public $announcmentToEdit;

    protected $rules=[
        "title"=> "required|string",
        "description"=> "required|string",
        "price"=> "required|decimal:0,2",
        "category"=> "required",
        "images.*"=> "image|max:3000",
        "temporary_images.*"=> "image|max:3000",
        
    ];

    protected $messages = [
        "required" => "Il campo :attribute è richiesto"

    ];

    public function store(){
        $this->validate();
            $this->announcment = Announcment::create([
            "user_id" => Auth::user()->id,
            "category_id" => $this->category,
            "title"=> $this->title,
            "description"=> $this->description,
            "price"=> $this->price,
            
            "image"=> $this->image ? $this->image->store("public/images") : "images/default.png",
        ]);
        
        if(count($this->images)){
            foreach($this->images as $image){
                // $this->announcment->images()->create(['path'=> $image->store('images', 'public')]);
                $newFileName = "announcments/{$this->announcment->id}";
                $newImage = $this->announcment->images()->create(['path'=> $image->store($newFileName, 'public')]);
                
                RemoveFaces::withChain([ 
                new ResizeImage($newImage->path, 500, 500),
                new GoogleVisionSafeSearch($newImage->id),
                new GoogleVisionLabelImage($newImage->id)])->dispatch($newImage->id);
                
            } 
        File::deleteDirectory(storage_path('storage\app\livewire-tmp'));

        $this->announcment->user()->associate(Auth::user());
        $this->announcment->save();



        } 

        
        
        $this->reset();
        // $this->cleanForm();
        session()->flash('success',__('ui.annuncio_creato'));
    }

    public function updatedTemporaryImages(){
        if($this->validate( [
            'temporary_images.*'=>'image|max:1024',
        ]))
        {foreach($this->temporary_images as $image){
            $this->images[] = $image;
        }
    }
    }

    public function removeImage($key){
        if(in_array($key, array_keys($this->images))) {
            unset($this->images[$key]);
        }
    }

    public function updated($propertyName){
        $this->validateOnly($propertyName);
    }

    // public function cleanForm(){
    //     $this->title = "";
    //     $this->category = "";
    //     $this->description = "";
    //     $this->price = "";
    //     $this->img = "";
    // }


    public function edit(Announcment $announcment){
        $this->title=$announcment->title;
        $this->description=$announcment->description;
        $this->price=$announcment->price;
        $this->category=$announcment->category;
        $this->image = $announcment->image;
        $this->editMode=true;
    }
    // public function update(){
    //     $this->validate();
    //    $this->announcmentToEdit->update([
    //         "title"=>$this->title,
    //         "description"=>$this->description,
    //         "price"=>$this->price,
    //         "category"=>$this->category,
    //         "image"=>$this->image ? $this->image->store('public/images') : $this->announcmentToEdit->image
    //     ]);
    //     $this->reset();
    //     $this->editMode=false;
    //     session()->flash('success','annuncio modificato');
    // }
    // public function destroy(Announcment $announcment){
    //     $announcment->delete();
    // }
    
    public function render()
    {
        
        return view('livewire.create-announcment');
    }
}
