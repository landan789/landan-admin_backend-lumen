<?php
/**
 * Created by PhpStorm.
 * User: landa
 * Date: 2019/3/2
 * Time: 1:05
 */

trait SoftDeletion{

    protected $price = 0;

    public function getPrice(){
        return $this->price;
    }

    public function setPrice(int $price){
        $this->price = $price;
    }
}
