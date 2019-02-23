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

use helpers\Response;
use helpers\Log;
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

    public function getAll(Request $oRequest) {

        try {

            $iId = $oRequest->input('id') ?? null;

            $aQueries = [
                ['type', $oRequest->input('type') ?? null],
                ['high_frequentcy', $oRequest->input('high_frequentcy') ?? null]
            ];

            $aOptions = [
              'offset' => $oRequest->input('offset') ?? $this->offset ?? null,
              'limit' => $oRequest->input('limit') ?? $this->limit ?? null
            ];

            $oLotteryModel = new LotteryModel();

            $aLotteries = $oLotteryModel->show($iId, $aQueries, $aOptions);

            if (null === $aLotteries) {
                throw new \Exception('FAIL_TO_SHOW_LOTTERY');
            };

            Log::success($oRequest, null);

            $aData = [
                'lotteries' => $aLotteries
            ];

            return Response::jsonSuccess('SUCCEED_TO_SHOW_LOTTERY', null, $aData, count($aLotteries));
        } catch (\Exception $oError){
            Log::fail($oRequest, null);

            return Response::jsonFail($oError->getMessage());
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
