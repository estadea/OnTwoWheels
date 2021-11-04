<?php
error_reporting(-1); // reports all errors
ini_set("display_errors", "1"); // shows all errors
ini_set("log_errors", 1);
ini_set("error_log", "/tmp/php-error.log");
// $servername = "localhost";
//     $username = "root";
//     $password = "";
//     $dbname = "bike_commerce";
    
//     // Create connection
//     $conn = new mysqli($servername, $username, $password, $dbname);
//     // Check connection
//     if ($conn->connect_error) {
//         echo "Error;";
//       die("Connection failed: " . $conn->connect_error);
//     }

class DB{
    public $con;
    private $engine = "mysql";
    private $host= "127.0.0.1";
    private $name = "bike_commerce";
    private $user = "root";
    private $password = "";

    public function __construct(){
        $dns = $this->engine.":host=".$this->host.";dbname=".$this->name;
        try{
            $this->con = new PDO($dns, $this->user, $this->password);
            $this->con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
         } catch (PDOException $e) {
            exit("Connection Failed: " . $e->getMessage());
        }
    }
}

$config = [
    'db_engine' => 'mysql',
    'db_host' => '127.0.0.1',
    'db_name' => 'bike_commerce',
    'db_user' => 'root',
    'db_password' => '',
];

$db_config = $config['db_engine'] . ":host=".$config['db_host'] . ";dbname=" . $config['db_name'];

try {
    $pdo = new PDO($db_config, $config['db_user'], $config['db_password'], [
        PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"
    ]);
        
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
} catch (PDOException $e) {
    exit("Impossibile connettersi al database: " . $e->getMessage());
}
