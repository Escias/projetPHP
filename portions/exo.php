<!DOCTYPE html>
<html>
<head>
	<title>Exos</title>
	<link rel="stylesheet" href="style.css"/>
</head>
<body>
	<?php include ("header.php"); ?>

    <form method="POST" action="#">
        <?php
        ini_set('display_errors', 1);
        require "../autoform.php";
        require "../date(US4).php";
        require "../binary(US9).php";
        require "../romanNumber(US6).php";
        require "../factorial(US7).php";
        require "../smallestNumber(US5).php";
        require "../primeNumber(US3).php";
        require "../DB.php";
        require "../displayContact(US13).php";
        $form = new autoform();
        $date = new date();
        $form->getInputText("Seconde", "second");
        $form->getInputSubmit("Valider");
        ?>
        <?php
        if (!empty($_POST)){
            $date->countSecond($_POST["second"]);
        }
        ?>
    </form>
    <form method="POST" action="#">
        <?php
        ini_set('display_errors', 1);
        $number = new RomanNumber();
        $form->getInputText("Nombre","roman");
        $form->getInputSubmit("Valider");
        ?>
        <?php
        if (!empty($_POST)){
            $number->translateRomanNumber($_POST["roman"]);
        }
        ?>
    </form>
    <form method="POST">
        <?php
        /*US10*/
        ini_set("display_errors", 1);
        $form->getInputText("Email", "email");
        $form->getInputText("Date de naissance", "birth");
        $form->getInputSubmit("Valid");
        ?>
        <?php
        ini_set('display_errors', 1);
        if (!empty($_POST["email"])){
            if (preg_match("/[aA0-zZ9]{3}\@[aA0-zZ9]{1,}\.[aA-zZ]/", $_POST["email"])){
                echo "Email valide";
            }else{
                echo "Email invalide";
            }
        }
        if (!empty($_POST["birth"])){
            if (preg_match("/\d\d\/\d\d\/\d\d/", $_POST["birth"])){
                echo "Date valide";
            }else{
                echo "Date invalide";
            }
        }
        ?>
    </form>
    <form method="POST" action="#">
        <?php
        /*US12*/
        ini_set('display_errors',1);
        $connect = new request("root", "root", "php", "mysql", "localhost");
        $form->getInputText("Nom","lastname");
        $form->getInputText("Prenom","firstname");
        $form->getInputDate("Date de naissance","date");
        $form->getInputRadio("Sexe","gender", array("H","F"));
        $form->getInputText("Mail","mail");
        $form->getInputText("Adresse", "address");
        $form->getInputSubmit("Valider");
        ?>
        <?php
        if (!empty($_POST)){
            if (preg_match("/[aA0-zZ9]{3}\@[aA0-zZ9]{1,}\.[aA-zZ]/", $_POST["mail"])) {
                $connect->getInsert("contact",array("'".$_POST["lastname"]."'","'".$_POST["firstname"]."'","'".$_POST["date"]."'","'".$_POST["gender"]."'","'".$_POST["mail"]."'","'".$_POST["address"]."'"));
            }else{
                echo "Invalid email";
            }
        }
        ?>
    </form>
    <form method="POST">
        <?php
        ini_set('display_errors', 1);
        $display = new displayContact();
        $rslt = $connect->getRows("contact", array("lastname","firstname","date","gender","mail","address"), "");
        $display->display($rslt);
        ?>
    </form>


    <form method="POST">
        <?php
        ini_set("display_errors",1);
        $rslt1 = $connect->getRows("contact", array("firstname"), "");
        $val = $display->us14($rslt1);
        $form->getInputList("", "test", $val);
        $form->getInputText("Nom", "lastname");
        $form->getInputText("Preom", "firstname");
        $form->getInputText("Date", "date");
        $form->getInputText("Sexe","gender");
        $form->getInputText("Email","mail");
        $form->getInputText("Adresse","address");
        $form->getInputSubmit("Valid");
        ?>
    </form>
    <script>
        function inputList() {
            document.getElementById("test").setAttribute()
        }
    </script>

    <input type="date" id="name" name="name" value="17-03-1995">
	<div id="exos">
		<h1>
			Exos
		</h1>
		<p>
			Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
		</p>
		<p>
		<form method="POST" action="#">
			<?php
				$form = new autoform;

				$form->getInputText("Nombre à calculer", "number");
				if (!empty($_POST)) {
					$fac = new factorial;
					$fac->factor($_POST["number"]);
				}

				$form->getInputSubmit("Valider");
				
			?>
			<?php
				$form2 = new autoform;

				$form2->getInputText("Nombre à transformer en binaire", "binary");
				if (!empty($_POST)) {
					$bin = new binary() ;
					$bin->binaryConverter($_POST["binary"]);
				}

				$form2->getInputSubmit("Valider");
				
			?>
		</form>
		</p>
        <form method="post">
            <?php

//            if (!empty($_POST)) {
//                var_dump($_POST);
//                //$length, $life, $damage, $name, $gender, $nbrArms, $sizeArms
//                $toto = new tyrex("", $_POST["life"], "", $_POST["name"], $_POST["gender"], "", "");
//            }
            $form->getInputText("firstNumber", "firstNumber");
            $form->getInputText("secondNumber", "secondNumber");
            $form->getInputText("thirdNumber", "thirdNumber");
            $form->getInputSubmit("valider");
            $smallestNumber = new smallestNumber();
            if (!empty($_POST)) {
                $smallestNumber->getSmallestNumber($_POST["firstNumber"], $_POST["secondNumber"], $_POST["thirdNumber"]);
            }
            ?>
            <?php
            $form->getInputText("primeNumber", "primeNumber");
            $form->getInputSubmit("submit");
            ini_set('display_errors', 1);
            $primeNumber = new primeNumber();
            if ($_POST != null) {
                $primeNumber->generatePrimeNumbers($_POST["primeNumber"]);
            }
            ?>
        </form>
	</div>





	<?php include ("footer.php"); ?>

</body>
</html>
