<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use Auth;

class CustomersController extends Controller
{

    public function show(Customer $customer)
    {
        $this->authorize('view', $customer);
        return view('customers.show', [
            'customer' => $customer,
        ]);
    }

    public function showEditForm(Customer $customer)
    {
        $this->authorize('view', $customer);
        return view('customers.edit', [
            'customer' => $customer,
        ]);
    }

    public function update(Request $request, Customer $customer)
    {
        $this->authorize('update', $customer);
        $customer->name = $request->name;
        $customer->email = $request->email;
        $customer->save();

        return redirect()
            ->route('customers.show', ['customer' => $customer->id])
            ->with('update_info_success', 'ユーザー情報を変更しました。');;
    }

    public function showEditPasswordForm(Customer $customer)
    {
        $this->authorize('view', $customer);
        return view('customers.edit_password', [
            'customer' => $customer,
        ]);
    }


    public function updatePassword(Request $request, Customer $customer)
    {
        $this->authorize('update', $customer);
        $customer->password = bcrypt($request->get('new-password'));
        $customer->save();
        return redirect()
            ->route('customers.show', ['customer' => $customer,])
            ->with('update_password_success', 'パスワードを変更しました。');
    }

    public function destroy(Customer $customer)
    {
        $this->authorize('delete', $customer);
        Auth::guard('customer')->logout();
        $customer->delete();
        return redirect()->route('customers.auth.login');
    }
}
