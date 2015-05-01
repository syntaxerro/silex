<?php
/**
 * Created by PhpStorm.
 * User: efik
 * Date: 01.05.15
 * Time: 20:08
 */

namespace Syntax\Model;


class TList {
    private $ip;
    private $licznik;
    private $bot;
    private $i;

    public function __construct($ipp)
    {
        $this->ip = $ipp;
    }

    /**
     * @return mixed
     */
    public function getIp()
    {
        return $this->ip;
    }

    /**
     * @param $a
     */
    public function setIp($a)
    {
        $this->ip = $a;
    }

    /**
     * @return mixed
     */
    public function getLicznik()
    {
        return $this->licznik;
    }

    /**
     * @param $a
     */
    public function setLicznik($a)
    {
        $this->licznik = $a;
    }

    /**
     * @return mixed
     */
    public function getBot()
    {
        return $this->bot;
    }

    /**
     * @param $a
     */
    public function setBot($a)
    {
        $this->bot = $a;
    }

    /**
     * @return mixed
     */
    public function getI()
    {
        return $this->i;
    }

    /**
     * @param $a
     */
    public function setI($a)
    {
        $this->i = $a;
    }
}