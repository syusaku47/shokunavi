<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class CustomersController extends Controller
{

    public function info()
    {
        $customer = Auth::guard('customer')->user();
        return view('customers/info',[ 
        'customer' => $customer,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showEditForm()
    {
        $customer = Auth::guard('customer')->user();
        return view('customers/edit',[ 
        'customer' => $customer,
        ]);
    }
    public function editPassword()
    {
        $customer = Auth::guard('customer')->user();
        return view('customers/edit',[ 
        'customer' => $customer,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $customer = Auth::guard('customer')->user();
        $customer->name = $request->name;
        $customer->email = $request->email;
        $customer->save();

        return redirect()->route('customers.info');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
        
    }
}
