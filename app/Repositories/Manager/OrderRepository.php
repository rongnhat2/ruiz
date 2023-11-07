<?php

namespace App\Repositories\Manager;

use Illuminate\Database\Eloquent\Model;
use App\Repositories\BaseRepository;
use App\Repositories\RepositoryInterface;
use Session;
use Hash;
use DB;

class OrderRepository extends BaseRepository implements RepositoryInterface
{
    protected $model;

    public function __construct(Model $model){
        $this->model = $model;
    } 
    public function get_all(){
        return DB::table('product')->get(); 
    }
    public function get_all_new(){
        return DB::table('product')
            ->orderBy('created_at', 'ASC')
            ->limit(8)
            ->get(); 
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
                ->leftjoin("color", "product_color.color_id", "=", "color.id")
                ->get(); 
    }
    public function customer_get_all($id){
        $sql = " SELECT *
                FROM order_list
                WHERE customer_id = ".$id;
        return DB::select($sql);
    }
    
    public function get_full_order($id){
        $sql = " SELECT order_detail.*, 
                        product.name, 
                        product.id as product_id,
                        warehouse.quantity as warehouse_quatity
                FROM order_detail
                LEFT JOIN product
                ON product.id = order_detail.product_id
                LEFT JOIN warehouse
                ON product.id = warehouse.product_id
                WHERE order_id = ".$id;
        return DB::select($sql);
    }
    public function get_in_order($id){
        $sql = " SELECT *
                    FROM order_time
                    WHERE id = ".$id;
        return DB::select($sql);
    }
    public function update_status($id){
        $sql = "UPDATE order_detail
                SET suborder_status = 1
                WHERE order_id = ".$id;
        return DB::select($sql);
    }

    
    public function get_detail($id){
        $sql = "SELECT order_detail.*,
                        product.name,
                        product.images ,
                        product.prices as product_prices
                    FROM order_detail 
                    LEFT JOIN product
                    ON product.id = order_detail.product_id
                    WHERE order_detail.order_id = ".$id;
        return DB::select($sql);
    }
    
 
}
