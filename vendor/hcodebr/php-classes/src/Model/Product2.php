<?php

namespace Hcode\Model;

use \Hcode\DB\Sql;
use \Hcode\Model;
use \Hcode\Mailer;

class Product2 extends Model {
    
    public static function listAll() {

        $sql = new Sql();

        return $sql->select("SELECT * FROM tb_products ORDER BY desproduct");

    }

    public function save() {

        $sql = new Sql();

        $sql->query("INSERT INTO tb_products(desproduct, vlprice, vlwidth, vlheight, vllength, vlweight, desurl) 
        VALUES (:desproduct, :vlprice, :vlwidth, :vlheight, :vllength, :vlweight, :desurl)",[
        ":desproduct"=>$this->getdesproduct(),
        ":vlprice"=>$this->getvlprice(),
        ":vlwidth"=>$this->getvlwidth(),
        ":vlheight"=>$this->getvlheight(),
        ":vllength"=>$this->getvllenght(),
        ":vlweight"=>$this->getvlweight(),
        ":desurl"=>$this->getdesurl()
        ]);
        
    }   

    public function update() {

        $sql = new Sql();

        $sql->query("UPDATE tb_products 
        SET desproduct = :desproduct, vlprice = :vlprice, vlwidth = :vlwidth, vlheight = :vlheight, vllength = :vllength, vlweight = :vlweight, desurl = :desurl 
        WHERE idproduct = :idproduct", [
            ":idproduct"=>$this->getidproduct(),
            ":desproduct"=>$this->getdesproduct(),
            ":vlprice"=>$this->getvlprice(),
            ":vlwidth"=>$this->getvlwidth(),
            ":vlheight"=>$this->getvlheight(),
            ":vllength"=>$this->getvllenght(),
            ":vlweight"=>$this->getvlweight(),
            ":desurl"=>$this->getdesurl()
        ]);

    }

    public function get($idproduct)
    {

        $sql = new Sql();

        $results = $sql->select("SELECT * FROM tb_products WHERE idproduct = :idproduct", array(
            ":idproduct"=>$idproduct
        ));

        $this->setData($results[0]);
    }

    public function delete(){

        $sql = new Sql();

        $sql->query("DELETE FROM tb_products WHERE idproduct = :idproduct", [
            ':idproduct'=>$this->getidproduct()
        ]);

    }

}

?>