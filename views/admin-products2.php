<?php

use \Hcode\Model\Product2;
use \Hcode\Model\User;
use \Hcode\PageAdmin;

$app->get("/admin/products2", function(){
     
    $product2 = new Product2();
    
    $product2 = Product2::listAll();

    $page = new PageAdmin();

    $page->setTpl("products", [
        "products"=>$product2
    ]);

});

$app->get("/admin/products2/create", function(){   

    $page = new PageAdmin();

    $page->setTpl("products-create");

});

$app->post("/admin/products2/create", function(){
    
    $product2 = new Product2();

    $product2->setData($_POST);
    
    $product2->save();

    header("Location: /admin/products2");
    exit;

});

$app->get("/admin/products2/:idproduct", function($idproduct) {

    $product2 = new Product2();

    $product2->get((int)$idproduct);

    $page = new PageAdmin();

    $page->setTpl("products-update", [
        'product2'=>$product2->getValues()
    ]);

});

$app->post("/admin/products2/:idproduct", function($idproduct) {

    $product2 = new Product2();

    $product2->get((int)$idproduct);
    
    $product2->setData($_POST);
    
    $product2->update();
    
    header("Location: /admin/products2");
    exit;

});

$app->get("/admin/products2/:idproduct/delete", function($idproduct) {

    $product2 = new Product2();

    $product2->get((int)$idproduct);

    $product2->delete();

    header("Location: /admin/products2");
    exit;

});

?>