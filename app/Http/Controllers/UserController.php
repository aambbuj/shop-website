<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
class UserController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function addInformation(Request $request)
    {
       $user = new User();
       $user->name = $request->name;
       $user->phone = $request->phone;
       $user->pin = $request->pin;
       $user->city = $request->block;
       $user->state = $request->state;
       $user->district = $request->district;
       $user->address = $request->address;
       $user->assign_user = 1;
       $user->action = 1;
       $user->status = 'Active';

       $user->save();
       return view('success',compact('user'))->with('success', 'Your data has been save successfully!');
    //    return redirect('/')->with('success', 'Your data has been save successfully!');;
    }

    public function showInformation()
    {
        $user = User::get();
        return view('show',compact('user'));
    }

    public function actionUser($id , $action ,$value)
    {
        $user = User::where('id',$id)->update(['action' => $action , 'status' => $value]);
        return redirect('/show-information')->with('success', 'Your Action Update successfully!');;
    }

    public function rechargePlans()
    {
        return view('rechargePlan');
    }
}
