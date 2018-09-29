<?php
/**
 * Created by PhpStorm.
 * User: Landan
 * Date: 2018/9/27
 * Time: 20:43
 */
namespace App\Http\Controllers;

use Crypt;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\User;

class AuthenticationController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public  function postSignin(Request $request)
    {
        $name = strtolower($request->name);
        $password = Hash::make($request->password);
        $users = User::where('name', $name)
                     ->get()
                     ->first();
        foreach ($users as $user)
        {
            $name = $user->name;
        }
        if (Hash::check('secret', $password))
        {
            // The passwords match...
        }

    }

    public  function postSignout()
    {

    }

    public  function postSignup()
    {

    }

    public  function postRefresh()
    {

    }


    public  function getState()
    {

    }

    //
}
