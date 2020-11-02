<?php


class RomanNumber
{
    public function translateRomanNumber($number)
    {
        $letter = array('M' => 1000, 'CM' => 900, 'D' => 500, 'CD' => 400, 'C' => 100, 'XC' => 90, 'L' => 50, 'XL' => 40, 'X' => 10, 'IX' => 9, 'V' => 5, 'IV' => 4, 'I' => 1);
        $romanNumber = '';
        while ($number > 0) {
            foreach ($letter as $roman => $i) {
                if($number >= $i) {
                    $number = $number - $i;
                    $romanNumber = $romanNumber . $roman;
                    break;
                }
            }
        }
        echo '<p>'.$romanNumber.'</p>';
    }
}
?>