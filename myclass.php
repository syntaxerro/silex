<?php
class Tip {
	private $wpis; private $wpis2; private $kiedy; private $i;

	public function __construct($w, $ws, $k, $li) {
		$this->wpis = $w; 
		$this->kiedy = $k; 
		$this->i=$li;
		$this->wpis2=$ws;
	}

	public function getWpis() { return $this->wpis; }
	public function getWpis2() { return $this->wpis2; }
	public function getKiedy() { return $this->kiedy; }
	public function getI() { return $this->i; }
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
