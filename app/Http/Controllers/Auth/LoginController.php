<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    //Requestでbladeからのフォームをリクエスト
    public function login(Request $request){
        //isMethodでpostか確認
        if($request->isMethod('post')){
            //onlyで連想配列をまとめてリクエストから取得し$dataに入れる
            $data=$request->only('mail','password');
            //↓は↑で取得したメールとパスワードが合っていたら、topに行くってこと（ログイン条件は公開時には消すこと）
            if(Auth::attempt($data)){
                return redirect('/top');
            }
        }
        //ifの条件に合わずログイン失敗で再度ログイン画面に戻る
        return view("auth.login");
    }

    public function logout() {
        Auth::logout();
        return redirect('/login');
    }
}
