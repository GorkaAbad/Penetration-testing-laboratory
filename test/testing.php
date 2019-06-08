<?php
use PHPUnit\Framework\TestCase;

class TestDatabase extends TestCase
{
    public function testCreateConexion(){


      $host_db = "localhost";
      $user_db = "gorka";
      $pass_db = "{Ehx12:}";
      $db_name = "db";
      $tbl_name = "user";
      
      $conexion = new mysqli($host_db, $user_db, $pass_db, $db_name);

      $email = 'gorka@gmail.com';

      if ($conexion->connect_error) {
       die("La conexion falló: " . $conexion->connect_error);
       $this->expectException(ErrorException::class);
     }else{
       $stmt = $conexion->prepare("SELECT iduser FROM $db_name.$tbl_name WHERE email = ? ;");
       $stmt->bind_param("s",$email);
       $stmt->execute();
       $result = $stmt->get_result;
       print_r($result);
     }

    }


    public function testExpectUserGorka()
    {
        $this->expectOutputString('foo');
        print 'foo';
    }
}
