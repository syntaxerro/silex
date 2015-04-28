<?php
class Tip {
	private $wpis; private $kiedy;

	public function __construct($w, $k) {
		$this->wpis = $w; $this->kiedy = $k;
	}

	public function getWpis() { return $this->wpis; }
	public function getKiedy() { return $this->kiedy; }
}

?>
