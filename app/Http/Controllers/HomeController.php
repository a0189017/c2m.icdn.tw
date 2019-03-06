<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Design;
use App\Design_meta;
use App\City;
use App\Zipcode;
use App\Item;
use App\Item_meta;
use App\Order;
use App\Order_item;
use App\Order_meta;
use App\Order_payment;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function products()
    {
        return view('products');
    }

    public function product($id)
    {

        // $str = 'i am 我';
        // $str = mb_convert_encoding($str, "UTF-8", "ASCII");
        // dd(str_slug($str));

        $item = Item::find($id);
        if(empty($item)) {
            return redirect()->route('products')->with("error","Item not found!");
        }
        $item_image = Item_meta::where('item_id', $id)->where('meta_key', 'image')->get();
        $item_desc = Item_meta::where('item_id', $id)->where('meta_key', 'desc')->first();
        $item_desc_2 = Item_meta::where('item_id', $id)->where('meta_key', 'desc_2')->first();

        return view('product', compact('id', 'item', 'item_image', 'item_desc', 'item_desc_2'));
    }
    
    public function design($id)
    {
        $item = Item::find($id);
        // dd($item);
        return view('design', compact('id', 'item'));
    }

    public function checkout(Request $request, $id)
    {
        $zipcode = Zipcode::all();
        $city = City::all();

        // check item_id exists
        $item = Item::find($id);
        if(empty($item)) {
            return redirect()->route('products')->with("error","Item not found!");
        }
        $item_image = Item_meta::where('item_id', $id)->where('meta_key', 'image')->get();
        $item_desc = Item_meta::where('item_id', $id)->where('meta_key', 'desc')->first();
        $item_desc_2 = Item_meta::where('item_id', $id)->where('meta_key', 'desc_2')->first();
        
        // TODO get item detail

        // save image from base64
        $file_data = $request->input('pos1');
        $file_name = 'image_'.time().uniqid('_').'.png'; //generating unique file name;
        @list($type, $file_data) = explode(';', $file_data); // data:image/png;base64,
        @list(, $file_data) = explode(',', $file_data);
        if($file_data!=""){ // storing image in storage/app/public Folder
            $hash_dir = substr(md5(base64_decode($file_data)), 0, 5);
            \Storage::disk('public')->put( $hash_dir.'/'.$file_name, base64_decode($file_data));
        }
        $design['pos1'] = \Storage::disk('public')->url($hash_dir.'/'.$file_name);
        
        $file_data = $request->input('pos2');
        $file_name = 'image_'.time().uniqid('_').'.png'; //generating unique file name;
        @list($type, $file_data) = explode(';', $file_data); // data:image/png;base64,
        @list(, $file_data) = explode(',', $file_data);
        if($file_data!=""){ // storing image in storage/app/public Folder
            $hash_dir = substr(md5(base64_decode($file_data)), 0, 5);
            \Storage::disk('public')->put( $hash_dir.'/'.$file_name, base64_decode($file_data));
        }
        $design['pos2'] = \Storage::disk('public')->url($hash_dir.'/'.$file_name);
        
        $file_data = $request->input('pos3');
        $file_name = 'image_'.time().uniqid('_').'.png'; //generating unique file name;
        @list($type, $file_data) = explode(';', $file_data); // data:image/png;base64,
        @list(, $file_data) = explode(',', $file_data);
        if($file_data!=""){ // storing image in storage/app/public Folder
            $hash_dir = substr(md5(base64_decode($file_data)), 0, 5);
            \Storage::disk('public')->put( $hash_dir.'/'.$file_name, base64_decode($file_data));
        }
        $design['pos3'] = \Storage::disk('public')->url($hash_dir.'/'.$file_name);

        $file_data = $request->input('pos4');
        $file_name = 'image_'.time().uniqid('_').'.png'; //generating unique file name;
        @list($type, $file_data) = explode(';', $file_data); // data:image/png;base64,
        @list(, $file_data) = explode(',', $file_data);
        if($file_data!=""){ // storing image in storage/app/public Folder
            $hash_dir = substr(md5(base64_decode($file_data)), 0, 5);
            \Storage::disk('public')->put( $hash_dir.'/'.$file_name, base64_decode($file_data));
        }
        $design['pos4'] = \Storage::disk('public')->url($hash_dir.'/'.$file_name);

        $design['size'] = $request->input('size');
        $design['color'] = $request->input('color');
        $design['style'] = $request->input('style');
        $design['left_style'] = $request->input('left_style');
        $design['right_style'] = $request->input('right_style');
        // $design['icon_flag'] = $request->input('icon_flag');
        $design['text_right'] = $request->input('text_right');
        $design['text_left'] = $request->input('text_left');
        $design['text_back'] = $request->input('text_back');
        $design['text_front'] = $request->input('text_front');

        $design_id = Design::insertGetId([
            'item_id'=>$id,
            'created_at' => date('Y-m-d H:i:s')
        ]);

        foreach($design as $k=>$v) {
            Design_meta::insert([
                'design_id' => $design_id,
                'meta_key' => $k,
                'meta_value' => $v,
                'created_at' => date('Y-m-d H:i:s')
            ]);
        }

        session(['item_id' => $item_id]);
        session(['design_id' => $design_id]);

        $quantity = 1;
        $shipping['fee'] = 100.00;
        // dd($design_id);

        return view('checkout', compact('city', 'zipcode', 'design', 'item', 'item_image', 'item_desc', 'item_desc_2', 'quantity', 'shipping'));
    }
    
    public function placeOrder(Request $request)
    {
        $receiver_ease = $request->input('receiver_ease');
        
        $user_id = 0;
        if(Auth::check()) {
            $user = Auth::user();
            $user_id = Auth::id();

        }

        $order['user_id'] = $user_id;
        $order['item_id'] = session('item_id');
        
        $order_id = Order::insertGetId([
            'user_id'=>$user_id,
            'created_at' => date('Y-m-d H:i:s')
        ]);
        
        $order_id_ha = hash_hmac('sha1', $order_id, 'c2m');
        Order::where('order_id', $order_id)->update([
            'order_id_ha'=>$order_id_ha
        ]);

        // items
        $design_id = session('design_id');
        $design = Design::where('design_id', $design_id)->first();
        $item = Item::where('item_id', $design->item_id)->first();
        
        Order_item::insert([
            'order_id'=>$order_id,
            'order_item_id'=>$item->item_id,
            'order_item_name'=>$item->item_name,
            'created_at' => date('Y-m-d H:i:s')
        ]);

        // meta
        $order_meta = [
            'design_id' => $design_id,
            'order_status' => 'order-pending',
            'order_amount' => $item->amount,
            'shipping_fee' => 100,
            'contact_name' => $request->input('contact_name'),
            'contact_phone' => $request->input('contact_phone'),
            'contact_address' => $request->input('contact_address'),
            'contact_email' => $request->input('contact_email'),
            'recipient_name' => $request->input('recipient_name'),
            'recipient_phone' => $request->input('recipient_phone'),
            'recipient_address' => $request->input('recipient_address'),
        ];
        if($receiver_ease==1) { // 同聯絡人資料
            $order_meta['recipient_name'] = $request->input('contact_name');
            $order_meta['recipient_phone'] = $request->input('contact_phone');
            $order_meta['recipient_address'] = $request->input('contact_address');
        }

        foreach($order_meta as $k=>$v) {
            Order_meta::insert([
                'order_id' => $order_id,
                'meta_key' => $k,
                'meta_value' => $v,
                'created_at' => date('Y-m-d H:i:s')
            ]);
        }

        // payment
        $order_payment = [
            'payment_method' => $request->input('payway'),
            'payment_invoice' => $request->input('invoice'),
        ];
    
        Order_payment::insert([
            'order_id' => $order_id,
            'payment_method' => $order_payment['payment_method'],
            'payment_invoice' => $order_payment['payment_invoice'],
            'created_at' => date('Y-m-d H:i:s')
        ]);

        // dd($order_meta);

        return redirect()->route('thankyou')->with("success", "Thanks!");
    }

    public function thankyou()
    {
        return redirect()->route('home')->with("success", "Thanks!");
    }
}
