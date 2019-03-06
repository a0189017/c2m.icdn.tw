<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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

class AccountController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user = Auth::user();
        
        return view('account.account', compact('user'));
    }

    public function updateAccount(Request $request) {

        $user = Auth::user();
        $user->name = $request->input('name');
        $user->phone = $request->input('phone');
        $user->zipcode = $request->input('zipcode');
        $user->address = $request->input('address');
        $user->save();
        
        return redirect()->back()->with("success","");
    }

    public function orders()
    {
        $user = Auth::user();

        $orders = Order::with('item')->with('metas')->with('design_metas')->orderBy('created_at', 'DESC')->get();
        
        return view('account.orders', compact('user', 'orders'));
    }

    public function order($order_id)
    {
        $user = Auth::user();

        $order = Order::with('item')->with('metas')->with('payment')->with('design_metas')->where('order_id', $order_id)->first();
        
        return view('account.order', compact('user', 'order'));
    }

    public function showChangePasswordForm(){
        return view('auth.changepassword');
    }

    public function changePassword(Request $request){
        if (!(Hash::check($request->get('current-password'), Auth::user()->password))) {
            // The passwords matches
            return redirect()->back()->with("error","Your current password does not matches with the password you provided. Please try again.");
        }
        if(strcmp($request->get('current-password'), $request->get('new-password')) == 0){
            //Current password and new password are same
            return redirect()->back()->with("error","New Password cannot be same as your current password. Please choose a different password.");
        }
        
        $validatedData = $this->validate($request, [
            'current-password' => 'required',
            'new-password' => 'required|min:8|regex:/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\X]).*$/|confirmed',
        ]);

        //Change Password
        $user = Auth::user();
        $user->password = bcrypt($request->get('new-password'));
        $user->save();

        return redirect()->back()->with("success","Password changed successfully !");
    }
}
