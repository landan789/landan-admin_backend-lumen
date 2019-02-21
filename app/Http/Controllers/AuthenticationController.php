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


use helpers\Jwt;
use helpers\Response;
use helpers\Log;


class AuthenticationController extends Controller {
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Request $request) {
    }

    public  function postSignin(Request $request) {
        $jwt = '';
        try {
            Log::start($request, $jwt);

            if (empty($request->name)) {
                throw new \Exception('USER_NAME_IS_EMPTY');
            }

            $userId = '';
            $hashPassword = '';
            $name = strtolower($request->name);

            $password = $request->password;
            $users = User::where('name', $name)
                         ->get();

            foreach ($users as $user) {
                $userId = $user->user_id;
                $hashPassword = $user->password;
            }

            if (!Hash::check($password, $hashPassword)) {
                throw new \Exception('USER_PASSOWRD_DOESNT_MATCH');
            }

            // $password, original password
            // $hashPassword, encoded original password via hash
            if (Hash::check($password, $hashPassword)) {
                $jwt = Jwt::encode($userId, null, null);
                Log::success($request, $jwt);

                return Response::jsonSuccess('USER_SUCCEDS_TO_SIGNIN', $jwt, null, null);
            }

        } catch (\Exception $e) {
            Log::fail($request, $jwt);

            return Response::jsonFail($e->getMessage());

        }


    }

    public  function postSignout() {

    }

    public  function postSignup() {

    }

    public  function postRefresh() {

    }


    public  function getState() {

    }

    //
}
