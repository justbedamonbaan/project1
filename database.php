<?php

// $host = '127.0.0.1';
// $db   = 'project1';
// $user = 'root';
// $pass = '';
// $charset = 'utf8mb4';
 
class Database 
    {
        //private variabelen aangemaakt
        private $host;
        private $db;
        private $user;
        private $pass;
        private $charset;
        private $pdo;
        


            // hier staan de parameters van variabelen naar object
        public function __construct($host, $user, $pass, $db, $charset)
        {
            $this->host = $host;
            $this->user = $user;
            $this->db = $db;
            $this->password = $pass;
            $this->charset = $charset;

                        
                    try 
                    {           //hier word connectie gemaakt via dsn 
                        $dsn = "mysql:host=$this->host;dbname=$this->db;charset=$this->charset";            
                        $this->pdo = new PDO($dsn, $this->user, $this->pass);
                        echo"connected";
                    }
                      catch (PDOException $e) {
                        echo $e->getMessage();
                       // exit message word hier uitgeput
                        exit ("failed"); 
                    }   

        }

            public function insert($voornaam, $tussenvoegsel, $achternaam, $email, $usernme, $hash)
            {

                try
                {
                    $this->pdo->beginTransaction();

                    $query = "INSERT INTO account 
                            (email, password)
                            VALUES
                            (:email, :password)";

                    $statement = $this->pdo->prepare($query);
                    $statement->execute(['email'=>$email, 'password'=>$hash]);

                    $account_id = $this->pdo->lastInsertId();
                    
                    //insert in person  
                    $query = "INSERT INTO persoon (account_id, voornaam, tussenvoegsel, achternaam, gebruikersnaam, email, password)
                     VALUES (:account_id, :voornaam, :tussenvoegsel, :achternaam, :gebruikersnaam, :email,  :password) ";            
                     $statement = $this->pdo->prepare($query);            
                     $statement->execute(['account_id'=> $account_id, 'voornaam'=> $voornaam , 'tussenvoegsel' => $tussenvoegsel, 'achternaam' => $achternaam , 'gebruikersnaam' => $usernme,  'email' => $email, 'password' => $hash]);            
                    $this->pdo->commit();
                }   
        
                    catch(Exception $e)
                    {
                    // undo db changes in geval van error
                    $this->pdo->rollback();
                    throw $e->getMessage();
                    exit("failed number 2");
                    }
                }
            };

    


?>