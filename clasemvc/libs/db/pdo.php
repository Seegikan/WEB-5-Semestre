

<?php

class Db_pdo 
{
  

  //lectura desde config
  private static $instance;
  private $dbUser;
  private $dbPass;
  private $dbName;
  private $host;
  private $dbType;
  private $charSet;

  public $stm;
  public $pdo;

  public function __construct()
  {
    require_once '../config/config.php';
    //error
    $this->dbUser = DB_CONFIG["default"]["DB_USER"];
    $this->dbPass = DB_CONFIG["default"]["DB_PASS"];
    $this->dbName = DB_CONFIG["default"]["DB_NAME"];
    $this->host = DB_CONFIG["default"]["DB_HOST"];
    $this->dbType = DB_CONFIG["default"]["DB_TYPE"];
    $this->charSet = CHARSET;
    $this->connectPDO();
  }

  public static function getInstance()
  {
    if(!isset(self::$instance)){
      $myClass = __CLASS__;
      self::$instance = new $myClass();
    }

    return self::$instance;
  }

  public function connectPDO()
  {
    $dns = $this->dbType.':dbname='.$this->dbName.';host='.$this->host.';charset='.$this->charSet;
    $this->pdo = new PDO($dns,$this->dbUser,$this->dbPass);
    $this->pdo->exec("SET CHARACTER SET ".$this->charSet);
    $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  }

  public function selectSQL(string $sql,array $params)
  {
    try {
      // preparamos el query para ejecutar
      $this->stm = $this->pdo->prepare($sql);
      // ejecutamos el query con los parámetros enviados
      $this->stm->execute($params);
      // obtenemos el resultado y lo asignamos a la variable de respuesta
      $result = $this->stm->fetchAll(PDO::FETCH_ASSOC);
      return $result;
    } catch (Exception $ex) {
      // sí existe error mostramos el mensaje
      print_r($ex->getMessage());
    }
  }

  public function executeSQL(string $sql,array $params)
  {
    try {
      // preparamos el query para ejecutar
      $this->stm = $this->pdo->prepare($sql);
      // ejecutamos el query con los parámetros enviados
      $this->stm->execute($params);
      $result = array();
      // obtenemos el total de rows afectados
      $result["total"] = $this->stm->rowCount();
      // obtenemos el último id insertado
      $result["lastInsert"] = $this->pdo->lastInsertId();
      return $result;
    } catch (Exception $ex) {
      print_r($ex->getMessage());
    }
  }
  
}


?>