<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\EditUser;
use App\Http\Requests\EditPassword;

class UsersController extends Controller
{

    public function showEditForm(){

        $auth = Auth::user();
        return view('user/edit',[ 
        'auth' => $auth,
        ]);
    } 

    public function edit(EditUser $request){

        $auth = Auth::user();
        $auth->name = $request->name;
        $auth->email = $request->email;
        $auth->save();
        return redirect()->back()->with('update_info_success', 'ユーザー情報を変更しました。');
    } 

    public function showEditPasswordForm(){

        $auth = Auth::user();
        return view('user.edit_password',[ 
        'auth' => $auth,
        ]);
    } 

    public function editPassword(EditPassword $request){

        $auth = Auth::user();
        $auth->password = bcrypt($request->get('new-password'));
        $auth->save();
        return redirect()->back()->with('update_password_success', 'ユーザー情報を変更しました。');
    } 


    public function destory(){

        $auth = Auth::user();
        
        $auth->destory();
        return redirect()->route('logout');
    } 
}
