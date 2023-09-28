<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\Manager\ProductRepository; 
use App\Models\Product;  

class DisplayController extends Controller
{
    protected $product; 

    public function __construct(Product $product ){
        $this->product             = new ProductRepository($product);  
    }

    public function index(){
        return view('customer.index');
    }
    public function about(){
        return view('customer.about');
    }
    public function product($slug){
        $data = $this->product->get_one_slug($slug);
        $color = $this->product->get_color($data->id);
        $data_response = [
            "data" => $data,
            "color" => $color
        ];
        return view('customer.product', compact("data_response"));
    }
    public function category(){
        return view('customer.category');
    }
}
