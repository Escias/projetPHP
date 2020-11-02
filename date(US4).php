<?php


class date
{
    public function countSecond($sec){
        date_default_timezone_set('Europe/Paris');
        $date = date('Y/m/d');
        $dateSec = strtotime($date);
        $seconde = $dateSec - $sec;
        $finalDate = date('j F Y', $seconde);
        echo "<div><p>L'événement à eu lieu le ".$finalDate.".</p></div>";
    }
}
?>