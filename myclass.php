<?php
class Tip {
	private $wpis; private $kiedy;

	public function __construct($w, $k) {
		$this->wpis = $w; $this->kiedy = $k;
	}

	public function getWpis() { return $this->wpis; }
	public function getKiedy() { return $this->kiedy; }
}

class TList {

	private $ip; private $licznik;

	public function getIp() { return $this->ip; }

	public function getLicznik() { return $this->licznik; }

	public function setIp($a) { $this->ip = $a; }

	public function setLicznik($a) { $this->licznik = $a;  }

}


?>
