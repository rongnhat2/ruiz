<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Mail; 


use App\Repositories\Manager\OrderRepository;
use App\Models\OrderList;
use App\Models\OrderDetail; 

use App\Repositories\Manager\ProductRepository;
use App\Models\Product;

use Carbon\Carbon;
use Session;
use Hash;
use DB;

class OrderController extends Controller
{
    
    protected $product;
    protected $order;
    protected $order_detail;

    public function __construct(Product $product, OrderList $order, OrderDetail $order_detail){
        $this->order            = new OrderRepository($order);
        $this->order_detail     = new OrderRepository($order_detail); 
        $this->product          = new ProductRepository($product);
    }

    // Lấy ra danh sách đơn hàng
    public function get(Request $request){
        $is_user = static::check_token($request); 
        $route_redirect = "/";
        if ($is_user) { 
            $tab = $request->tab;
            list($user_id, $token) = static::unpack_token($request); 
            $data   = [];
            $order = $this->order->get_all($tab, $user_id);
            foreach ($order as $key => $value) {
                $order_detail = $this->order->get_detail($value->id);
                $order_group = [
                    "order"         => $value,
                    "order_detail"  => $order_detail,
                ];
                array_push($data, $order_group);
            }
            return $this->order->send_response("Danh sách đơn hàng", $data, 200); 
        }else{
            return $this->order->send_response("Phiên đăng nhập hết hạn", $route_redirect, 404); 
        } 
    }
    
    // Đặt hàng
    public function checkout(Request $request){ 

        $name       = preg_replace('/(<([^>]+)>)/', '', $request->data_name);
        $email      = preg_replace('/(<([^>]+)>)/', '', $request->data_email);
        $address    = preg_replace('/(<([^>]+)>)/', '', $request->data_address);
        $phone      = preg_replace('/(<([^>]+)>)/', '', $request->data_phone);
        $description      = preg_replace('/(<([^>]+)>)/', '', $request->data_description);
        $customer_id   = $request->data_id ? $request->data_id : null;
        $metadata = json_decode($request->metadata);
        $total      = 0; 
        foreach ($metadata as $key => $value) {
            $data = json_decode($value); 
            $product = $this->product->get_one($data->id);
            $total += $product->prices * $data->quantity;
        }
        $route_redirect = "/profile?tab=Order";
        $data_order = [
            "customer_id"       => $customer_id,
            "username"          => $name,
            "email"             => $email,
            "phone"             => $phone,
            "address"           => $address,
            "note"              => $description,
            "total"             => $total,
            "payment_value"     => 0,
            "payment_status"    => 0,
            "order_value"       => Carbon::now()->toDateTimeString() . "|Order Successful",
            "order_status"      => 0,
            "status"            => 1,
        ];  
        $order_item = $this->order->create($data_order);
        

        foreach ($metadata as $key => $value) {
            $data = json_decode($value); 
            $product = $this->product->get_one($data->id);
            $total += $product->prices * $data->quantity;
            
            $item_order = [
                "order_id"      => $order_item->id,
                "product_id"    => $data->id,
                "color_id"      => $data->color,
                "quantity"      => $data->quantity,
                "prices"        => $product->prices,
                "total_price"   => $product->prices * $data->quantity,
                "status"        => 1,
            ];
            $this->order_detail->create($item_order);
        }
        Mail::send('customer/confirm-order', array('data'=> $name), function($message) use ($email) {
            $message->from('admin.ruiz@gmail.com', 'Ruiz - Order email');
            $message->to($email)->subject('Ruiz-order');
        });
        return $this->order->send_response("Order successful", $route_redirect, 200); 
    }
}
