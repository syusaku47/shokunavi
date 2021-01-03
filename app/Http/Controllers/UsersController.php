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
        $this->authorize('view', $user);
        return view('users.edit', [
            'user' => $user,
        ]);
    }

    public function update(EditUser $request, User $user)
    {
        $this->authorize('update', $user);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();
        return redirect()->route('users.show', [
            'user' => $user->id
        ])->with('update_info_success', 'ユーザー情報を変更しました。');
    }

    public function show(User $user)
    {
        $shops = $user->shops()->get(); //いいねした店舗取得
        $seets = $user->seets()->get(); //予約した席を取得
        $reservations = $user->reservations->where('seet_id')->first();
        dd($reservations);
        $this->authorize('view', $user);
        return view('users.show', [
            'user' => $user,
            'shops' => $shops,
            'seets' => $seets,
            'reservation' => $reservations,
        ]);
    }

    public function showEditPasswordForm(User $user)
    {
        $this->authorize('view', $user);
        return view('users.edit_password', [
            'user' => $user,
        ]);
    }

    public function updatePassword(EditPassword $request, User $user)
    {
        $this->authorize('update', $user);
        $user->password = bcrypt($request->get('new-password'));
        $user->save();

        return redirect()
            ->route('users.show', ['user' => $user->id])
            ->with('update_password_success', 'パスワードを変更しました。');
    }


    public function destroy(User $user)
    {
        $this->authorize('delete', $user);
        Auth::logout();
        $user->delete();
        return redirect()->route('login');

        return redirect()
            ->back()
            ->with('delete_user_failed', 'ユーザー情報を削除できませんでした。');
    }
}
