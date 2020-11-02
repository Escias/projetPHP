<?php
class primeNumber{
    public function generatePrimeNumbers($number){
        $list=array();
        for($i=1;$i<=$number;$i++){
            $divide=false;
            $j=1;
            while($divide==false){
                if($i%$j==0 && $j!=$i && $j!=1){
                    $divide=true;
                }
                else if($j==$i){
                    $list[]=$j;
                    $divide=true;
                }
                $j++;
         }
        }
        echo '<p>';
        $text="";
        $count=0;
        foreach($list as $number){
            $text=$text . $number;
            if($count<count($list)-1){
                $text=$text . ',';
            }
            $count++;
        }
        echo $text;
        echo '</p>';
    }
}
?>