<?php
/**
 * Created by PhpStorm.
 * User: Landan
 * Date: 2018/9/27
 * Time: 20:43
 */
namespace App\Http\Controllers;

use App\User;
use App\Customer;

class UserController extends Controller
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

    public  function getOne($uesr_id)
    {
        $users = User::find($uesr_id);
        // $customers = Customer::all();
        $json = [
            'code' => '',
            'status' => 1,
            'data' => $users,
            'jwt' => config('API.JWT.EXPIRES')
        ];
        return response()->json($json);
    }

    public  function getAll($request)
    {

        $users = User::all();
        // $customers = Customer::all();
        $json = [
            'code' => '',
            'status' => 1,
            'data' => $users,
            'jwt' => config('API.JWT.EXPIRES')
        ];
        return response()->json($json);
    }

    public  function post($request)
    {
        $req = $request->all();
        var_dump($req);
        $users = User::all();
        // $customers = Customer::all();
        $json = [
            'code' => '',
            'status' => 1,
            'data' => $users,
            'jwt' => \config('API.JWT.EXPIRES')
        ];
        return response()->json($json);
    }

    //
}
