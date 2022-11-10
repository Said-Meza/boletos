<?PHP

use LDAP\Result;

class Conexion
{
    private $servidor="localhost";
    private $user="root";
    private $password="";
    private $db="graduacion22";
    private $con;

    public function __construct()
    {
        try 
        {
            $this->con= new PDO("mysql:host=$this->servidor;dbname=$this->db",$this->user,$this->password);
            $this->con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        }
         catch (PDOException $e) 
        {
            return "falla de coneccion".$e;
        }
    }

    public function ejecutar($sql){ //delete-update-insert
        $this->con->exec($sql);
        return $this->con->lastInsertId();
    }

}

?>