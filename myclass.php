<?php
class Tip {
	private $wpis; private $kiedy; private $i;

	public function __construct($w, $k, $li) {
		$this->wpis = $w; $this->kiedy = $k; $this->i=$li;
	}

	public function getWpis() { return $this->wpis; }
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
