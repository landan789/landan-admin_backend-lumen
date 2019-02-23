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

use App\Models\Issue;
use Aplusaccelinc\Helpers\Response;
use Aplusaccelinc\Helpers\Log;

class IssueController extends Controller {
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

            $issueModel = new IssueModel();

            $aIssues = $issueModel->show();

            if (null === $aIssues) {
                throw new \Exception('FAIL_TO_SHOW_ISSUE');
            };

            Log::success($request, null);

            $aData = [
                'issues' => $aIssues
            ];

            return Response::jsonSuccess('IT_SUCCEEDS_TO_SHOW_ISSUE', null, $aData, count($aIssues));
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
