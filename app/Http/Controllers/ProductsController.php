<?php

namespace MyCardsServer\Http\Controllers;

use Illuminate\Http\Request;
use MyCardsServer\Product;


class ProductsController extends Controller
{
    public function create()
    {
        return view('products.create');
    }

    public function store()
    {

       /* $this->validate(request(), [
            'name' => 'required',
            'price' => 'required',
            'description' => 'required',
            'link' => 'required',
            'image' => 'required'
        ]);*/
        
        try{
        $product = Product::create([
            'name' => request('name'), 
            'price'=> request('price'), 
            'description'=> request('description'), 
            'quantity'=> request('quantity'), 
            'link'=> request('link'), 
            'user' =>  auth()->user()->email ,
            'image'=> request('image')
            ]);
            
        } catch (\Exception $e){

    return back()->withErrors([
               // 'message' => 'The email or password is incorrect, please try again'
             'message' =>  'Forse hai gia inserito il prodotto'
            ]);
        }
        return redirect()->to('/home');


    }

    public function indexMy()
    {
       // $products = Product::all();
       $products = Product::where('user', auth()->user()->email )->get();
        return view('home', array('products'=> $products));
    
    } 
    public function indexAll()
    {
       // $products = Product::all();
       $products = Product::all();
        return view('home', array('products'=> $products));
    
    } 
    public function indexApi()
    {
        $products = Product::all();
        return json_encode(array('products'=> $products));
    
    }
}
