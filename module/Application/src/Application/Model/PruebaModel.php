<?php
namespace Application\Model;

use Zend\Db\TableGateway\TableGateway;
use Zend\Db\Adapter\Adapter;
use Zend\Db\Sql\Sql;
use Zend\Db\Sql\Select;
//use Zend\Db\ResultSet\ResultSet;
use Zend\Db\ResultSet\ResultSet;



class PruebaModel extends TableGateway
{
    private $dbAdapter;
    
    public function __construct(Adapter $adapter = null, $databaseSchema = null, ResultSet $selectResultPrototype = null){
        
        $this->dbAdapter=$adapter;

        return parent::__construct('usuarios', $this->dbAdapter, $databaseSchema,$selectResultPrototype);
    }

    
     public function getUsuarios(){
         
        $select=$this->select();
        $datos=$select->toArray();
        return $datos;
    }
    
    public function getUnUsuario(){

        $sql = new Sql($this->dbAdapter);

        $select = $sql->select();

        $select->columns(array('nombre','descripcion','estado'))

               ->from('usuarios');

        $selectString = $sql->getSqlStringForSqlObject($select);

        $execute = $this->dbAdapter->query($selectString, Adapter::QUERY_MODE_EXECUTE);

        $result=$execute->toArray();       

        return $result[0];

        }
        
        
//        public function addUsuario($nombre,$direccion,$telefono){
//
//        $consulta=$this->dbAdapter->query("SELECT count(email) as count FROM v_prueba",Adapter::QUERY_MODE_EXECUTE);
//
//        $datos=$consulta->toArray();
//
//        if($datos[0]["count"]==0){
//
//         $insert=$this->insert(array(
//                            "nombre"    => $email,
//                            "direccion" => $direccion,
//                            "telefono"   => $telefono
//                       ));
//
//        }else{
//
//            $insert=false;
//
//        }
//
//         return $insert;
//
//     }


    
    
}

