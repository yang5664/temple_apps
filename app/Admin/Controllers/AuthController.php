<?php

namespace App\Admin\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{

    public function postChangePassword(Request $request) {
        $this->validate($request, [
          'old_password' => 'required|min:6|equal_old_password',
          'password' => 'required|min:6|confirmed',
          'password_confirmation' => 'required',
        ]);

        \Admin::user()->fill([
          'password' => \Hash::make($request->password)
        ])->save();
    }
    /**
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function getLogin()
    {
        if (!Auth::guard('admin')->guest()) {
            return redirect(config('admin.prefix'));
        }

        return view('admin::login');
    }

    /**
     * @param Request $request
     *
     * @return mixed
     */
    public function postLogin(Request $request)
    {
        $credentials = $request->only(['username', 'password']);

        $validator = Validator::make($credentials, [
            'username' => 'required', 'password' => 'required',
        ]);

        if ($validator->fails()) {
            return Redirect::back()->withInput()->withErrors($validator);
        }

        if (Auth::guard('admin')->attempt($credentials)) {
            return Redirect::intended(config('admin.prefix'));
        }

        return Redirect::back()->withInput()->withErrors(['username' => $this->getFailedLoginMessage()]);
    }

    /**
     * @return \Illuminate\Http\RedirectResponse
     */
    public function getLogout()
    {
        Auth::guard('admin')->logout();

        return redirect(config('admin.prefix'));
    }

    protected function getFailedLoginMessage()
    {
        return Lang::has('auth.failed')
            ? trans('auth.failed')
            : 'These credentials do not match our records.';
    }
}
