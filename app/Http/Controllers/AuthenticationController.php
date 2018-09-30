<?php
/**
 * Created by PhpStorm.
 * User: Landan
 * Date: 2018/9/27
 * Time: 20:43
 */
namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\User;

use Aplusaccelinc\Helpers\Jwt;
use Aplusaccelinc\Helpers\Response;

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
        $userId = '';
        $hashPassword = '';
        $name = strtolower($request->name);
        $requestPassword = Hash::make($request->password);

        $password = $request->password;
        $users = User::where('name', $name)
                     ->get();
        foreach ($users as $user)
        {
            $userId = $user->user_id;
            $hashPassword = $user->password;
        }

        // $password, original password
        // $hashPassword, encoded original password via hash
        if (Hash::check($password, $hashPassword))
        {
            $jwt = Jwt::encode($userId, null, null);

            return Response::jsonSuccess('USER_SUCCEDS_TO_SIGNIN', $jwt);
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
