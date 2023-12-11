<?php

namespace App\Models;

use App\Models\User;
use App\Models\Announcment;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class RevisorAction extends Model
{
    use HasFactory;
    protected $fillable=['announcment_id','action','user_id'];
    public function announcment(){
        return $this->belongsTo(Announcment::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
}