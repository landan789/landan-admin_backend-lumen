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

use App\Models\Lottery;
use Aplusaccelinc\Helpers\Response;
use Aplusaccelinc\Helpers\Log;

class LotteryController extends Controller {
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        //
    }

    public function getAll(Request $request) {
        echo "lottery";
        exit;

        return Response::jsonSuccess('SUCCEED_TO_SHOW_LOTTERY', null, [], 1);


        try {
            $offset = 0 < $request->query('offset') ? $request->query('offset') : $this->offset;
            $limit = 0 < $request->query('limit') ? $request->query('offset') : $this->limit;

            $name = $request->query('name');
            $email = $request->query('email');

            $totalCount = IssueModel::where('is_deleted', 0)->count();
            $customerQuery = Issue::where('is_deleted', 0);

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
            Log::success($request, null);

            return Response::jsonSuccess('DATA_SUCCED_TO_FIND', null, $customers, $totalCount);
        } catch (\Exception $e){
            Log::fail($request, null);

            return Response::jsonFail($e->getMessage());
        }

    }

    public function getOne(Request $request, $customerId) {

        try {
            if (!$customerId) {
                throw new \Exception('CUSTOMER_CUSTOMERID_IS_EMPTY');
            }

            $customer = Issue::find($customerId);
            $customers = [$customer];

            return Response::jsonSuccess('DATA_SUCCED_TO_FIND', null, $customers);
        } catch (\Exception $e) {
            Log::fail($request);

            return Response::jsonFail($e->getMessage(), null);
        }


    }

    public function postOne($request) {

    }

    public function putOne($request) {

    }

    public function deleteOne($request) {

    }

    //
}
