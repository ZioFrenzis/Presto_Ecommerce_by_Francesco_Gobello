<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Announcment;
use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;

class AnnouncmentController extends Controller
{   
    public function __construct(){
        $this->middleware('auth')->except('show','index','filterByCategory');

    }
    public function filterByCategory(Category $category){
        
        return view('announcment.category',compact('category'));
     }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $announcments=Announcment::where('is_accepted', true)->orderBy('created_at','desc')->get();
        return view('index',compact('announcments'));
    }

    public function addToCart($id){
        $announcment = Announcment::findOrFail($id);

        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            $cart[$id]['quantity']++;

        } else {
            $cart[$id] = [
                "title"=>$announcment->title,
                "price"=>$announcment->price,
                "image"=>$announcment->image,
                "category"=>$announcment->category,
                "quantity"=> 1
            ];
        }

        session()->put("cart", $cart);
        return redirect()->back()->with('success', __('ui.prodotto_aggiunto'));
    }

    public function cart()
    {
        return view('cart');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("announcment.create");
   
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Announcment $announcment)
    {
        return view('announcment.detail',compact('announcment'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Announcment $announcment){
        return view('announcment.edit',compact('announcment'));
    }
    public function updated(ProductRequest $request, Announcment $announcment){
       $file=$request->file('image');
       $announcment->update([
        "title"=>$request->title,
        "description"=>$request->description,
        "category_id"=>$request->category,
        "price"=>$request->price,
        "image"=>$file?$file->store("public/images"):$announcment->image,
       ]);
       return redirect()->route('announcment.edit', compact('announcment'))->with('success',"L'annuncio è stato modificato");
    }
    /**
     * Update the specified resource in storage.
     */
    /* public function update(Request $request, Announcment $announcment)
    {
        //
    } */

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Announcment $announcment)
    {
        $announcment->delete();
        return redirect()->route('welcome')->with('success', "L'annuncio è stato cancellato");
    }

    

    public function update(Request $request)
    {
        if($request->id && $request->quantity){
            $cart = session()->get('cart');
            $cart[$request->id]["quantity"] = $request->quantity;
            session()->put('cart', $cart);
            session()->flash('success',  __('ui.carrello_modificato'));
        }
    }

    public function remove(Request $request)
    {
        if($request->id) {
            $cart = session()->get('cart');
            if(isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            session()->flash('success', __('ui.prodotto_rimosso'));
        }
    }
}

