<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

use App\Design;
use App\Design_meta;
use App\Order;
use App\Order_meta;
use App\Order_payment;
use App\Order_item;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        if(Auth::user()->hasRole('manager')) {
            return view('admin.index');
        }
        
        return abort(403, '無此操作權限，請聯繫管理員');
    }

    public function orders()
    {
        if(Auth::user()->hasRole('manager')) {
            $orders = Order::with('items')->with('metas')->with('payment')->orderBy('created_at', 'desc')->paginate(15);
            // echo '<pre>';print_r($orders);echo '</pre>';die;
            
            return view('admin.order.index', compact([
                'orders',
            ]));
        }
        
        return abort(403, '無此操作權限，請聯繫管理員');
    }

    public function orderShow($order_id)
    {
        if(Auth::user()->hasRole('manager')) {
            $order = Order::with('metas')->with('payment')
            ->orderBy('created_at', 'desc')
            ->where('order_id', $order_id)
            ->first();
            // echo '<pre>';print_r($orders);echo '</pre>';die;

            $meta = [];
            foreach($order->metas as $_meta) {
                $meta[$_meta->meta_key] = $_meta->meta_value;
            }

            $design = Design::with('metas')->where('design_id', $meta['design_id'])->first();
        
            return view('admin.order.read', compact([
                'order', 'meta', 'design'
            ]));
        }
        
        return abort(403, '無此操作權限，請聯繫管理員');
    }

    public function orderUpdateStatus(Request $request, $order_id)
    {
        if(Auth::user()->hasRole('manager')) {
            $order_status = $request->input('order_status');
            Order_meta::where('order_id', $order_id)->where('meta_key', 'order_status')->update([
                'meta_value'=>$order_status
            ]);
            $order_meta = [
                'admin_order_status' => $order_status
            ];
            
            foreach($order_meta as $k=>$v) {
                Order_meta::insert([
                    'order_id' => $order_id,
                    'meta_key' => $k,
                    'meta_value' => $v,
                    'created_at' => date('Y-m-d H:i:s')
                ]);
            }
            Log::info('Update '.$order_id.' order_status to'.$order_status);

            return redirect()->back()->with("success","Password changed successfully !");
        }
        
        return abort(403, '無此操作權限，請聯繫管理員');
    }
}
