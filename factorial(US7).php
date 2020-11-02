<?php
class factorial {
	public function factor($nb){
		$tot = 1;
		if ($nb>=0) {
			for ($i=1; $i<=$nb; $i++) {
    		$tot = $tot * $i;
    		}
			echo "<p>Factorielle de ".$nb." vaut ".$tot."</p>";
		} 
		else {
			echo "<p>Opération impossible avec ".$nb."</p>";
		}
	}
}
?>