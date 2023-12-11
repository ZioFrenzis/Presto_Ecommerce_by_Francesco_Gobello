<?php

namespace App\Models;


use App\Models\Announcment;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function announcment(){
        return $this->hasMany(Announcment::class);
    }
}
