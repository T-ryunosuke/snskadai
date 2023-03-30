<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
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
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */

    //↓バリデーション
    //https://www.wakuwakubank.com/posts/376-laravel-validation/
    protected function validator(array $data)
    {
        $rules = [
            'username' => 'required|string|max:255',
            'mail' => 'required|string|email:filter,dns|max:255|unique:users',
            'password' => 'required|string|confirmed',
            'password_confirmation' => 'required'
        ];

        $messages =[
            "required" => "必須項目です",
            "email" => "メールアドレスの形式で入力してください",
            "string" => "文字で入力してください",
            "max" => "255文字以内で入力してください",
            "unique" => "登録済みのメールアドレスは無効です",
            "confirmed" => "パスワード確認が一致しません",
        ];

        return Validator::make($data, $rules, $messages);
    }

    //↓書いてるだけ
    public function messages(){
        return [
            "required" => "必須項目です",
            "email" => "メールアドレスの形式で入力してください",
            //"regex" => "全角カタカナで入力してください",
            "string" => "文字で入力してください",
            "max" => "255文字以内で入力してください",
            //"over_name.max" => "10文字以内で入力してください",
            //"under_name.max" => "10文字以内で入力してください",
            "min" => "4文字以上で入力してください",
            //"mail_address.max" => "100文字以内で入力してください",
            "unique" => "登録済みのメールアドレスは無効です",
            "confirmed" => "パスワード確認が一致しません",
            //"datetime_validation.date" => "有効な日付に直してください",
            //"datetime_validation.after" => "2000年1月1日から今日までの日付を入力してください",
            //"datetime_validation.before" => "2000年1月1日から今日までの日付を入力してください"
        ];
    }
    //↑書いてるだけ

    // public function registerForm(){
    //     return view("auth.register");
    // }

    /**
    * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'username' => $data['username'],
            'mail' => $data['mail'],
            'password' => bcrypt($data['password']),
        ]);
    }

    public function register(Request $request){
        if($request->isMethod('post')){
            $data = $request->input();
            $errors = $this->validator($data);
            if($errors->fails()){
              return redirect('/register')
              ->withErrors($errors)
              ->withInput();
            }
            $request->session()->put('username', $data['username']);
            $this->create($data);
            return redirect('/added');
        }
        return view('auth.register');
    }

    public function added(){
        return view('auth.added');
    }

}
