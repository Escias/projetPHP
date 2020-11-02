<?php

class displayContact
{
    public function display($array)
    {
        $n = 0;
        echo "<table>";
        foreach ($array as $tab){
            if ($n%2==0){
                echo '<tr style="background-color: white">';
            }else if ($n%2!=0){
                echo '<tr style="background-color: lightblue">';
            }
            foreach ($tab as $value){
                echo "<th>".$value."</th>";
            }
            echo "</tr>";
            $n++;
        }
        echo "</table>";
    }

    public function us14($array){
        $rslt = array();
        foreach ($array as $tab){
            foreach ($tab as $value){
                $rslt[] = $value;
            }
        }
        return $rslt;
    }
}
?>