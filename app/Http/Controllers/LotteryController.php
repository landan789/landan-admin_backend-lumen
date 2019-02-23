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

    /**
     * @param Request $oRequest
     */
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
                throw new \Exception('IT_FAILS_TO_SHOW_LOTTERY');
            };


            $aData = [
                'lotteries' => $aLotteries
            ];

            Log::succeed($oRequest, null);

            $oRequest->request->add(['message' => 'IT_SUCCEEDS_TO_SHOW_LOTTERY']);
            $oRequest->request->add(['data' => $aData]);
            $oRequest->request->add(['total_count' => count($aData)]);
            $oRequest->request->add(['jwt' => '']);

        } catch (\Exception $oError){
            Log::fail($oRequest, null);
            $sMessage = $oError->getMessage();
            $oRequest->request->add(['message' => $sMessage]);

        } finally {

        }

    }

    public function getOne(Request $request, $customerId) {


    }

    public function postOne($request) {

    }

    public function putOne($request) {

    }

    public function deleteOne($request) {

    }
}
