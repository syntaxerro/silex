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

	private $ip; private $licznik; private $bot;

	public function getIp() { return $this->ip; }

	public function getLicznik() { return $this->licznik; }

	public function getBot() { return $this->bot; }

	public function setIp($a) { $this->ip = $a; }

	public function setLicznik($a) { $this->licznik = $a; }

	public function setBot($a) { $this->bot = $a; }
}
?>
