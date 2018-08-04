<?php

namespace MyCardsServer\Http\Controllers;

use Illuminate\Http\Request;
use MyCardsServer\Product;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\File;
use Intervention\Image\ImageManagerStatic as Image;

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
        
       

        if(Input::file('image')){
           
            $image = Input::file('image');
            $filename = auth()->user()->email."@".request('name').".".$image->getClientOriginalExtension();
            $path = public_path('images/' . $filename);

            try {
            Image::make($image->getRealPath())->resize(600, 300)->save($path);
            } catch (\Exception $e) {

                return back()->withErrors([
                    'message' =>  'Devi inserire un' . "'". 'immagine'
                   ]);
            }

            try{
                $product = Product::create([
                    'name' => request('name'), 
                    'price'=> request('price'), 
                    'description'=> request('description'), 
                    'quantity'=> request('quantity'), 
                    'link'=> request('link'), 
                    'user' =>  auth()->user()->email ,
                    'image'=> $filename
                    ]);
        
                   
                    
                } catch (\Exception $e){
        
            return back()->withErrors([
                     'message' =>  'Forse hai gia inserito il prodotto'
                    ]);
                }
         
        } else {

            try{
                $product = Product::create([
                    'name' => request('name'), 
                    'price'=> request('price'), 
                    'description'=> request('description'), 
                    'quantity'=> request('quantity'), 
                    'link'=> request('link'), 
                    'user' =>  auth()->user()->email

                    ]);
        
                   
                    
                } catch (\Exception $e){
        
            return back()->withErrors([
                     'message' =>  'Forse hai gia inserito il prodotto'
                    ]);
                }

        }
        
      
        return redirect()->to('/home/my');


    }

    public function indexMy()
    {
       $products = Product::where('user', auth()->user()->email )->get();
        return view('home', array('products'=> $products));
    
    } 
    public function indexAll()
    {
       $products = Product::all();
        return view('home', array('products'=> $products));
    
    } 
    public function indexApi()
    {
        try {
        $products = Product::all();
        } catch(\Exception $e){
    return "no conesisone db";
        }

        return json_encode(array('products'=> $products));
    
    }

    public function remove()
    {

        $toRemove = $_POST["name"];
        $imageToRemove = $_POST["image"];

        Product::where(['name'=> $toRemove,'user'=> auth()->user()->email])->delete();
        File::delete('images/' . $imageToRemove);
        
        return redirect()->to('/home/my');
    
    }
    
}
