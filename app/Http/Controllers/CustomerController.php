<?php
/**
 * Created by PhpStorm.
 * User: Landan
 * Date: 2018/9/27
 * Time: 20:43
 * Controller is relative to RESTful API， thus th
 */
namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Customer;
use Aplusaccelinc\Helpers\Response;
use Mockery\Exception;

class CustomerController extends Controller {
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        //
    }

    public function getAll(Request $request) {

        try {
            $offset = 0 < $request->query('offset') ? $request->query('offset') : $this->offset;
            $limit = 0 < $request->query('limit') ? $request->query('offset') : $this->limit;

            $name = $request->query('name');
            $email = $request->query('email');

            $totalCount = Customer::where('is_deleted', 0)->count();
            $customerQuery = Customer::where('is_deleted', 0);

            if (!empty($name)) {
                $customerQuery = $customerQuery->where('name', 'LIKE', '%' . $name. '%');
            }

            if (!empty($email)) {
                $customerQuery = $customerQuery->where('email', 'LIKE', '%' . $email. '%');
            }

            if (0 < $offset) {
                $customerQuery = $customerQuery->offset($offset);
            }

            if (0 < $limit) {
                $customerQuery = $customerQuery->limit($limit);
            }

            $customers = $customerQuery ->get();
            Log::success($request);

            return Response::jsonSuccess('DATA_SUCCED_TO_FIND', null, $customers, $totalCount);
        } catch (Exception $e){
            Log::fail($request);

            return Response::jsonFail($e->getMessage());
        }

    }

    public function getOne(Request $request, $customerId)
    {
        $customer = Customer::find($customerId);
        $customers = [$customer];

        return Response::jsonSuccess('DATA_SUCCED_TO_FIND', null, $customers);

    }

    public function postOne($request)
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

    public function putOne($request)
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

    public function deleteOne($request)
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
