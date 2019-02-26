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

use App\Models\IssueModel;


class IssueController extends Controller {

    public $offset = 0;
    public $limit = 1000;

    public function __construct() {
        //
    }

    public function getShow(Request $oRequest) {

        try {
            $iId = null;
            $aQueries = [];
            $aOptions = [];

            if ($oRequest->input('id')) {
                $iId = $oRequest->input('id');
            }

            if ($oRequest->input('lottery_id')) {
                $aQueries['lottery_id'] = $oRequest->input('lottery_id');
            }

            $aOptions['offset'] = $this->offset;
            if ($oRequest->input('offset')) {
                $aOptions['offset'] = $oRequest->input('offset');
            }

            $aOptions['limit'] = $this->limit;
            if ($oRequest->input('limit')) {
                $aOptions['limit'] = $oRequest->input('limit');
            }

            $oIssueModel = new IssueModel();

            $aIssues = $oIssueModel->show($iId, $aQueries, $aOptions);
            $iTotalCount = $oIssueModel->num($iId, $aQueries);

            if (null === $aIssues) {
                throw new \Exception('IT_FAILS_TO_SHOW_ISSUE');
            };


            $aData = [
                'issues' => $aIssues
            ];

            $oRequest->request->add(['message' => 'IT_SUCCEEDS_TO_SHOW_ISSUE']);
            $oRequest->request->add(['data' => $aData]);
            $oRequest->request->add(['total_count' => $iTotalCount]);
            $oRequest->request->add(['jwt' => '']);

        } catch (\Exception $oError){
            $sMessage = $oError->getMessage();
            $oRequest->request->add(['message' => $sMessage]);

        } finally {

        }

    }

    public function postAdd($request) {

    }

    public function putEdit($request) {

    }

    public function deleteRemove($request) {

    }
}
