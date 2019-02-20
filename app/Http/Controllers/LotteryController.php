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

use Aplusaccelinc\Helpers\Response;
use Aplusaccelinc\Helpers\Log;
use core\controller\CoreController;
use App\Models\LotteryModel;

class LotteryController extends CoreController {
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

            $lotteryModel = new LotteryModel();


            $aLotteries = $lotteryModel->show();

            if (null === $aLotteries || 1) {
                throw new \Exception('FAIL_TO_SHOW_LOTTERY');
            };

            Log::success($request, null);

            $aData = [
                'lotteries' => $aLotteries
            ];

            return Response::jsonSuccess('SUCCEED_TO_SHOW_LOTTERY', null, $aData, count($aLotteries));
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
