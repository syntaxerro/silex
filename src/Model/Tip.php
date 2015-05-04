<?php
/**
 * Created by PhpStorm.
 * User: efik
 * Date: 01.05.15
 * Time: 20:07
 */

namespace Model;


class Tip
{
    private $wpis;
    private $wpis2;
    private $kiedy;
    private $i;


    public function __construct($w, $ws, $k, $li)
    {
        $this->wpis = $w;
        $this->kiedy = $k;
        $this->i = $li;
        $this->wpis2 = $ws;
    }

    public function getWpis()
    {
        return $this->wpis;
    }

    public function getWpis2()
    {
        return $this->wpis2;
    }

    public function getKiedy()
    {
        return $this->kiedy;
    }

    public function getI()
    {
        return $this->i;
    }

}