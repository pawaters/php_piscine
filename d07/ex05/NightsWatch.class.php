<?php
require_once 'IFighter.class.php';

class NightsWatch implements IFighter {
	private $fighters = array();

    public function recruit($new) {
		$this->fighters[] = $new;
	}

	public function fight() {
		foreach($this->fighters as $f)
			if (get_class($f) != 'MaesterAemon')
				$f->fight();
	}

}
?>