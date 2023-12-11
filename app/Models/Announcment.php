<?php

namespace App\Models;



use App\Models\User;

use App\Models\Image;
use App\Models\Category;
use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;



class Announcment extends Model
{
    use HasFactory, Searchable;

    protected $fillable = ['user_id','category_id','title','description','price'];

    public function toSearchableArray(){
        $category=$this->category;
        $array=[
            'id'=>$this->id,
            'category'=>$category,
            'title'=>$this->title,
            'description'=>$this->description,
            'price'=>$this->price,
        ];
        return $array;
    }
    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function setAccepted($value){
        $this->is_accepted = $value;
        $this->save();
        return true;
    }

    public static function ToBeRevisionedCount(){
        return Announcment::where('is_accepted', null)->count();
    }
    public function images(){
        return $this->HasMany(Image::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
