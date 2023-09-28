<?php

namespace App\Repositories\Manager;

use Illuminate\Database\Eloquent\Model;
use App\Repositories\BaseRepository;
use App\Repositories\RepositoryInterface;
use Session;
use Hash;
use DB;

class ProductRepository extends BaseRepository implements RepositoryInterface
{
    protected $model;

    public function __construct(Model $model){
        $this->model = $model;
    } 
    public function get_all(){
        return DB::table('product')->get(); 
    }
    public function get_one($id){
        return DB::table('product')
                ->where("product.id", "=", $id)
                ->first(); 
    }
    public function get_one_slug($slug){
        return DB::table('product')
                ->select("product.*", "brand.name as brand_name")
                ->leftjoin("brand", "brand.id", "=", "product.brand_id")
                ->where("product.slug", "=", $slug)
                ->first(); 
    }
    public function get_color($id){
        return DB::table('product_color')
                ->where("product_color.product_id", "=", $id)
                ->first(); 
    }
 
}
