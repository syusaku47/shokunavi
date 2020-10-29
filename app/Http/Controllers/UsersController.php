<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Shop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\EditUser;
use App\Http\Requests\EditPassword;

class UsersController extends Controller
{

    public function showEditForm(User $user)
    {

        return view('users.edit', [
            'user' => $user,
        ]);
    }

    public function edit(EditUser $request, User $user)
    {

        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();
        return redirect()->route('users.info', [
            'user' => $user->id
        ])->with('update_info_success', 'ユーザー情報を変更しました。');
    }

    public function info(User $user)
    {
        $shops = $user->shops()->get();
        $this->authorize('view', $user);
        return view('users.info', [
            'user' => $user,
            'shops' => $shops,
        ]);
    }

    public function showEditPasswordForm(User $user)
    {

        return view('users.edit_password', [
            'user' => $user,
        ]);
    }

    public function editPassword(EditPassword $request, User $user)
    {

        $user->password = bcrypt($request->get('new-password'));
        $user->save();

        return redirect()
            ->route('users.info', ['user' => $user->id])
            ->with('update_password_success', 'パスワードを変更しました。');
    }


    public function destroy(User $user)
    {
        if ($user == Auth::user()) {
            Auth::logout();
            $user->delete();
            return redirect()->route('login');
        }
        return redirect()
            ->back()
            ->with('delete_user_failed', 'ユーザー情報を削除できませんでした。');
    }
}
