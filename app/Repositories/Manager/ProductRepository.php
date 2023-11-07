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
    public function get_all_new(){
        return DB::table('product')
            ->orderBy('created_at', 'ASC')
            ->limit(20)
            ->get(); 
    }
    public function get_best_sale(){
        $sql = " SELECT order_detail.product_id, 
                        sum(order_detail.quantity) as total, 
                        warehouse.quantity,
                        product.name,
                        product.slug,
                        product.prices,
                        product.images
                    FROM order_list
                    LEFT JOIN order_detail
                    ON order_list.id = order_detail.order_id
                    LEFT JOIN warehouse
                    ON warehouse.product_id = order_detail.product_id
                    LEFT JOIN product
                    ON order_detail.product_id = product.id
                    WHERE order_status <> 7 
                    GROUP BY order_detail.product_id, 
                            warehouse.quantity,
                            product.name,
                            product.slug,
                            product.prices,
                            product.images
                    ORDER BY total DESC LIMIT 5";
        return DB::select($sql);
    }

    public function find_real_time($slug, $category){
        $where_category = $category == 0 ? "" : " AND category_id = ".$category;
        $sql = "SELECT *
                FROM product 
                WHERE slug like '%".$slug."%'".$where_category."
                LIMIT 5";
        return DB::select($sql);
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
 
}
