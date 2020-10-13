<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use Auth;

class CustomersController extends Controller
{

    public function info(Customer $customer)
    {
        return view('customers.info',[ 
        'customer' => $customer,
        ]);
    }

    public function showEditForm(Customer $customer)
    {
        return view('customers.edit',[ 
        'customer' => $customer,
        ]);
    }

    public function edit(Request $request,Customer $customer)
    {
        $customer->name = $request->name;
        $customer->email = $request->email;
        $customer->save();

        return redirect()
        ->route('customers.info',['customer' => $customer->id])
        ->with('update_info_success', 'ユーザー情報を変更しました。');;
    }
    
    public function showEditPasswordForm(Customer $customer)
    {
        return view('customers.edit_password',[ 
            'customer' => $customer,
            ]);
    }
        

    public function editPassword(Request $request,Customer $customer)
    {
        $customer->password = bcrypt($request->get('new-password'));
        $customer->save();
        return redirect()
        ->route('customers.info',[ 'customer' => $customer,])
        ->with('update_password_success', 'パスワードを変更しました。');
    }

    public function destroy(Customer $customer)
    {
        if ($customer == Auth::guard('customer')->user()){
            Auth::guard('customer')->logout();
            $customer->delete();
            return redirect()->route('customers.auth.login');
        }
        return redirect()
        ->back()
        ->with('delete_user_failed', 'ユーザー情報を削除できませんでした。');
    } 
}
