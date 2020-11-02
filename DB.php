<?php
class request{

    private $_user;
    private $_pwd;
    private $_dbName;
    private $_dbType;
    private $_dbAdress;
    private $_bdd;

    /**
     * Méthode constructeur permettant de créer une connexion
     * avec notre base de données
     * @param $user =>    permet d'indiquer l'utilisateur PhpMyAdmin
     * @param $pwd  =>    permet d'indiquer le mot de passe de l'utilisateur PHPMyAdmin
     * @param $dbname=>    permet d'indiquer le nom de la base de données à laquelle je veux me connecter
     * @param $dbtype=>    permet d'indiquer le type de base de donnée sur lequel je vais établir une connexion (Oracle, mySQL...)
     * @param $dbadress=>  permet de fournir l'adresse sur laquelle est installé notre base (localhost ou l'adresse IP de notre serveur/ ou nom de domaine)
     */
    public function __construct($user, $pwd, $dbname, $dbtype, $dbadress)
    {
        $this->_user = $user;
        $this->_pwd = $pwd;
        $this->_dbName = $dbname;
        $this->_dbType = $dbtype;
        $this->_dbAdress = $dbadress;

        $this->connectDB();
    }

    /**
     * Méthode qui permet d'établir
     * une connexion avec la base de données
     * via l'objet PDO en utilisant les variables de classes
     */
    private function connectDB(){
        try {
            if($this->_bdd===null){
                $dsn = $this->_dbType.':dbname='.$this->_dbName.';host='.$this->_dbAdress;
                $this->_bdd = new PDO($dsn, $this->_user, $this->_pwd);
            }

        } catch (PDOException $e) {
            echo'Connexion échouée : ' . $e->getMessage();
            die();
        }
    }


    /**
     * Permet de réaliser une requête Select
     * et d'afficher chaque enregistrement à l'utilisateur
     */
    public function getAllRows($table, $where){
        $val = array();
        if ($where != NULL){
            $sql = "SELECT * FROM ".$table." WHERE ".$where.";";
        }else{
            $sql = "SELECT * FROM ".$table.";";
        }
        $this->_bdd->SetAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        $tab = $this->_bdd->query($sql);
        foreach ($tab as $rslt){
            $val[]=$rslt;
        }
        return $val;
    }

    public function getRows($table, $list, $where){
        $val = array();
        $count=0;
        $value = '';
        foreach($list as $element){
            $value = $value.$element;
            if($count<count($list)-1){
                $value = $value.",";
            }
            $count++;
        }
        if ($where != NULL){
            $sql = "SELECT ".$value." FROM ".$table." WHERE ".$where.";";
        }else{
            $sql = "SELECT ".$value." FROM ".$table.";";
        }
        $this->_bdd->SetAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        $tab = $this->_bdd->query($sql);
        foreach ($tab as $rslt){
            $val[]=$rslt;
        }
        return $val;
    }

    /**
     * Permet de réaliser une requête INSERT
     * @param $table nom de la table sur laquelle effectuée le INSERT
     * @param $list éléments à ajouter
     */
    public function getInsert($table,$list){
        $count=0;
        $value = '';
        foreach($list as $element){
            $value = $value.$element;
            if($count<count($list)-1){
                $value = $value.",";
            }
            $count++;
        }
        $sql = "INSERT INTO ".$table." VALUES (default,".$value." )";
        if ($this->_bdd->query($sql)===true) {
            $this->_bdd->query($sql);
        }
    }
}






?>