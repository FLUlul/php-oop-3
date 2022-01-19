<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>ex-computer-php</title>

    <!--  
--------------------------------------------------------------------------------------------------------------------------------------------
     *      Definire classe Computer:
     *          ATTRIBUTI:
     *          - codice univoco
     *          - modello
     *          - prezzo
     *          - marca
     * 
     *          METODI:
     *          - costruttore che accetta codice univoco e prezzo
     *          - proprieta' getter/setter per tutte le variabili d'istanza
     *          - printMe: che stampa se stesso (come quella vista a lezione)
     *          - toString: "marca modello: prezzo [codice univoco]"
     * 
     *          ECCEZIONI:
     *          ok- codice univoco: deve essere composto da esattamente 6 cifre (no altri caratteri)
     *          - marca e modello: devono essere costituiti da stringhe tra i 3 e i 20 caratteri
     *          - prezzo: deve essere un valore intero compreso tra 0 e 2000
     * 
     *      Testare la classe appena definita con tutte le casistiche interessanti per verificare
     *      il corretto funzionamento dell'algoritmo
    -->
    <?php
        class Computer {
            public $uniCode;
            private $model;
            private $price;
            private $brand;

            public function __construct($uniCode, $price) {
                $this -> setUniCode($uniCode);
                $this -> setPrice($price);
            }

            public function setUniCode($uniCode) {
                if (strlen($uniCode) != 6 || !is_int($uniCode)) {
                    throw new Exception("6 numbers expected");
                }

                $this -> uniCode = $uniCode;
            }
            public function getUniCode() {
                return $this -> uniCode;
            }
            public function setPrice($price) {
                if ($price < 0 || $price > 2000 || !is_int($price)) {
                    throw new Exception("Set a price between 0 and 2000");
                    
                }

                $this -> price = $price;
            }
            public function getPrice() {
                return $this -> price;
            }
            public function setModel($model) {
                if (strlen($model) < 3 || strlen($model) > 20 || !is_string($model)) {
                    throw new Exception("Type a string between 3 and 20 chars");
                }
                $this -> model = $model;
            }
            public function getModel() {
                return $this -> model;
            }
            public function setBrand($brand) {
                if (strlen($brand) < 3 || strlen($brand) > 20 || !is_string($brand)) {
                    throw new Exception("Type a string between 3 and 20 chars");
                }

                $this -> brand = $brand;
            }
            public function getBrand() {
                return $this -> brand;
            }

            public function printIt() {
                echo $this;
            }
            public function __toString() {
                return $this->getBrand() . " " . $this->getModel() .  " : " . $this->getPrice() . "$ [" . $this->getUniCode() . "]";
            }
        }
    ?>
</head>
<body>
    <?php
        echo "<h1>Print Full Pc</h1>";
        try {
            $pc1 = new Computer(122546, 1250);
            $pc1 -> setModel("Lapsus 2.1");
            $pc1 -> setBrand("Asus");

            $pc1 -> printIt();
        } catch (Exception $e) {
            echo $e -> getMessage();
        } finally {
            echo "<br><br>Dati Inseriti!";
        }
    ?>
</body>
</html>