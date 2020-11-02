<?php

class dinosaure{

    private $_length;
    private $_life;
    private $_damage;
    private $_type;
    private $_name;
    private $_gender;


/**
 * Méthode constructeur de la classe mère Dinosaure
 * Attend en entrée 6 arguments
 * @$damage => représente les dégats que peut réaliser un dinosaure en une attaque // Float
 * @$length => représente la taille du dinosaure // Int
 * @$name => représente le nom du Dinosaure //String
 * @$type => représente le régime alimentaire du dinosaure //String
 * @$gender => représente le sexe du dinosaure
 * @$gender => représente le sexe du dinosaure
 * 
 */
    public function __construct($length, $life, $damage, $type, $name, $gender){

        $this->_length = $length;
        $this->_life = $life;
        $this->_damage = $damage;
        $this->_type = $type;
        $this->_name = $name;
        $this->_gender = $gender;
    }


// Ascesseurs GET
    public function getName(){
        return $this->_name;
    }

    public function getLife(){
        return $this->_life;
    }
    public function getGender(){
        return $this->_gender;
    }
    public function getDamage(){
        return $this->_damage;
    }

    public function getType(){
        return $this->_type;
    }
    public function getLength(){
        return $this->_length;
    }

// Ascesseurs SET
    public function setLife($value){
        $this->_life = $this->_life - $value;
    }


}


class tyrex extends dinosaure{

    private $_sizeArms;
    private $_nbrArms;



    public function __construct($length, $life, $damage, $name, $gender, $nbrArms, $sizeArms){
        parent::__construct($length, $life, $damage, "sol", $name, $gender);
        $this->_nbrArms = $nbrArms;
        $this->_sizeArms = $sizeArms;
        echo "<p>Le Tyrex ".$this->getName(). " a été créé. HP : ".$this->getLife()." // Sexe : ".$this->getGender().".</p>";
    }



    public function getNbrArms(){
        return $this->_nbrArms;
    }
    public function getSizeArms(){
        return $this->_sizeArms;
    }

    public function makeSeism($dualType, $defense){
        if ($dualType==true){
            $defense->setLife(10);
            $nameDefense = $defense->getName();
            echo "<p>".$this->getName()." attaque " .$nameDefense." , " .$nameDefense." a maintenant ".$defense->getLife()." points de vie </p>";

        }
    }
    
}



class pterodactyle extends dinosaure{


    private $_sizeWings;
    private $_nbrWings;



    public function __construct($length, $life, $damage, $name, $gender, $sizeWings, $nbrWings){
        parent::__construct($length, $life, $damage, "vol", $name, $gender);
        $this->_sizeWings = $sizeWings;
        $this->_nbrWings = $nbrWings;
        echo "<p>Le ptérodactyle ".$this->getName(). " a été créé. HP : ".$this->getLife().".</p>";
    }



    public function getNbrWings(){
        return $this->_nbrWings;
    }
    public function getSizeWings(){
        return $this->_sizeWings;
    }

    public function makeTornado($dualType, $defense){
        if ($dualType==true){
        	$dmg = $this->getDamage() + 15;
            $defense->setLife($dmg);
            $nameDefense = $defense->getName();
            echo "<p>".$this->getName()." attaque " .$nameDefense.", " .$nameDefense." a maintenant ".$defense->getLife()." points de vie </p>";

        }
    }

}

?>