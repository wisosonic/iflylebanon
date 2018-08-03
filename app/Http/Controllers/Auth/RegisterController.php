<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Agency;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
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
    protected $redirectTo = '/';

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
    public function showRegistrationForm()
    {
        return view('auth.register2');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    public function register(Request $request)
    {
        $data = $request->all();

        $this->validator($data)->validate();
        $data["name"] = $data["fname"] . " " . $data["lname"];
        array_shift($data);
        unset($data["fname"]);
        unset($data["lname"]);
        unset($data["password_confirmation"]);
        $data["password"] = Hash::make($data["password"]);
        
        $user = new User();
        $user->email = $data["email"];
        $user->name = $data["name"];
        $user->phone = $data["phone"];
        $user->password = $data["password"];
        $user->save();;

        if (isset($data["pro"])) {
            $agency = new Agency();
            $agency->name = $data["agency"] ;
            $agency->phone = $data["agencyphone"] ;
            $agency->address = $data["address"] ;
            $agency->activated = false ;
            $user->agency()->save($agency);
        }

        $this->guard()->login($user);

        return redirect()->intended($this->redirectPath())->with(["accountcreated"=>"accountcreated"]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }
}
