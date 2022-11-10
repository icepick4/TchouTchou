<?php
// Implémente le pattern Singleton
class Connexion 
{
  private $_bdd = null;
  private static $_instance = null;

  //appelée par new
  private function __construct ()
  {
    $tns = "
        (DESCRIPTION =
            (ADDRESS = (PROTOCOL = TCP)(HOST = tchoutchou.ovh)(PORT = 5521))
            (CONNECT_DATA =
                (SID = xe )
            )
        )
    ";
  $pdo_string = 'oci:dbname='.$tns; 
	$this->_bdd = new PDO($pdo_string,BD_USER, BD_PWD);
	$this->_bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  }

  //appelée par clone
  private function __clone()
  {
  }

  //appelée par unserialize
  private function __wakeup()
  {
  }

  public static function getInstance()
  {
    if(is_null(self::$_instance))
      self::$_instance = new Connexion();
    return self::$_instance;
  }

  public function getBdd()
  {
    return $this->_bdd;
  }

}
