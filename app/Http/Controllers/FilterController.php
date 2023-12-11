<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Category;
use Illuminate\Http\Request;

class FilterController extends Controller
{
    public function category($id){
        $category = Category::find($id);
        $announcments = null;
        if ($category) {
            $announcments = $category->announcment()->where('is_accepted',true)->get();  
        }
        return view('announcment.category',compact('category','announcments'));
    }


    /* public function user($id){
        
        $user= User::find($id);
        $announcments = null;
            if($user){
                $announcments = $user->announcment()->where('is_accepted',true)->get();
            }
            return view('announcment.user',compact('user','announcments'));
}  */
}