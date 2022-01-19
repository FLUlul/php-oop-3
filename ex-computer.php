<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>live-coding</title>

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
     *          - codice univoco: deve essere composto da esattamente 6 cifre (no altri caratteri)
     *          - marca e modello: devono essere costituiti da stringhe tra i 3 e i 20 caratteri
     *          - prezzo: deve essere un valore intero compreso tra 0 e 2000
     * 
     *      Testare la classe appena definita con tutte le casistiche interessanti per verificare
     *      il corretto funzionamento dell'algoritmo
    -->
    <?php
        class User {
            private $username;
            private $password;
            private $age;

            public function __construct($username, $password) {
                $this -> setUsername($username);
                $this -> setPassword($password);
            }

            public function setUsername($username) {
                if(strlen($username) < 3 || strlen($username) > 16) {
                    throw new Exception("Inserire un username dai 3 ai 16 caratteri");
                }

                $this -> username = $username;
            }
            public function getUsername() {
                return $this -> username;
            }
            public function setPassword($password) {
                if (ctype_alnum($password)) {
                    throw new Exception("Inserire una password che contenga almeno un carattere speciale(es. - _ : , etc...");
                }

                $this -> password = $password;
            }
            public function getPassword() {
                return $this -> password;
            }
            public function setAge($age) {
                if (!is_int($age) || $age < 18) {
                    throw new Exception("Inserire un eta' da 18 anni in su' in valore numerico");
                }

                $this -> age = $age;
            }
            public function getAge() {
                return $this -> age;
            }

            public function printFullUser() {
                echo $this;
            }
            public function __toString() {
                return $this->getUsername() . ": " . $this->getAge() . " [" . $this->getPassword() . "]";
            }
        }
    ?>
</head>
<body>
    <h1>HELLO WORLD</h1>

    <?php
        echo "<h1>Print Full User</h1>";
        try {
            $user1 = new User("CapoNappa", "abc_");
            $user1 -> setAge(19);

            $user1 -> printFullUser();
        } catch (Exception $e) {
            echo $e -> getMessage();
        } finally {
            echo "<br>Dati Inseriti!";
        }
        

        echo "<br><br><br>compilato ok!";
    ?>
</body>
</html>