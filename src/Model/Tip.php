<?php
/**
 * Created by PhpStorm.
 * User: efik
 * Date: 01.05.15
 * Time: 20:07
 */

namespace Syntax\Model;


class Tip {
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

    /**
     * @return mixed
     */
    public function getWpis()
    {
        return $this->wpis;
    }

    /**
     * @return mixed
     */
    public function getWpis2()
    {
        return $this->wpis2;
    }

    /**
     * @return mixed
     */
    public function getKiedy()
    {
        return $this->kiedy;
    }

    /**
     * @return mixed
     */
    public function getI()
    {
        return $this->i;
    }


}