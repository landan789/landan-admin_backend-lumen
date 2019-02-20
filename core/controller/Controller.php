<?php

namespace core\controller;

use Laravel\Lumen\Routing\Controller as Laravel_Lumen_Routing_Controller;

class Controller extends Laravel_Lumen_Routing_Controller {
    public $offset = 0;
    public $limit = 10;
}
