<?php
/**
 * Created by PhpStorm.
 * User: efik
 * Date: 01.05.15
 * Time: 20:08
 */

namespace Syntax\Model;


class TList
{
    private $ip;
    private $licznik;
    private $bot;
    private $i;

    public function __construct($ipp)
    {
        $this->ip = $ipp;
    }

    public function getIp()
    {
        return $this->ip;
    }

    public function getLicznik()
    {
        return $this->licznik;
    }

    public function getBot()
    {
        return $this->bot;
    }

    public function getI()
    {
        return $this->i;
    }

    public function setIp($a)
    {
        $this->ip = $a;
    }

    public function setLicznik($a)
    {
        $this->licznik = $a;
    }

    public function setBot($a)
    {
        $this->bot = $a;
    }

    public function setI($a)
    {
        $this->i = $a;
    }
}