<?php
/**
 * Created by PhpStorm.
 * User: User
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

    public  function get()
    {
        $users = User::all();
        // $customers = Customer::all();
        return response()->json($users);
    }

    //
}
