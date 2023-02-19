<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Exception;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function create()
    {
        return view('user.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|unique:users|email',
            'password' => 'required|min:5|max:255|confirmed',
        ]);
        DB::beginTransaction();
        try{
            $user = new User();
            $attribute = $request->only(['name', 'email', 'password']);
            $user->fill($attribute);
            $user->password = Hash::make($attribute['password']);

            $user->save();
            DB::commit();
            if (Auth::guard('user')->attempt(['email' => $attribute['email'], 'password' => $attribute['password']])){
                return redirect(route('submission.index'))->with('message', 'ユーザー登録完了しました。');
            } else {
                return redirect(route('submission.index'))->with('message', 'ログイン画面からログインしてください。');
            }
        } catch(Exception $e) {
            Log::error($e);
            DB::rollBack();
            redirect()->back();
        }
        return redirect(route('submission.index'));
    }

    public function toLoginForm()
    {
        return view('user.login');
    }

    public function login(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:5|max:255',
        ]);

        $attribute = $request->only('email', 'password');

        if(Auth::guard('user')->attempt($attribute)) {
            return redirect(route('submission.index'))->with('message', 'ログインしました。');
        } else {
            return redirect()->back()->with('message', 'ログインできませんでした。');
        }
    }
}
