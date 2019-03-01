<?php

namespace Core\Controller;

use Laravel\Lumen\Routing\Controller as Laravel_Lumen_Routing_Controller;

class CoreController extends Laravel_Lumen_Routing_Controller {
    public $offset = 0;
    public $limit = 10;
}
