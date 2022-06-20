<?php
function customerExists($username){
    //Connect to database
    $mongoClient = new MongoClient();

    //Select a database
    $db = $mongoClient->ecommerce;

    $findCriteria = ["username" => $username];

    $cursor = $db->customers->find($findCriteria);

    //Close the connection
    $mongoClient->close();

    //Return true if customer exists
    if($cursor->count() > 0){
        return true;
    }
    return false;

}


function staffExists($username){
    //Connect to database
    $mongoClient = new MongoClient();

    //Select a database
    $db = $mongoClient->ecommerce;

    $findCriteria = ["username" => $username,];

    $cursor = $db->staff->find($findCriteria);

    //Close the connection
    $mongoClient->close();

    //Return true if customer exists
    if($cursor->count() > 0){
        return true;
    }
    return false;

}


function deleteCustomer($username){
    //Connect to database
    $mongoClient = new MongoClient();

    //Select a database
    $db = $mongoClient->ecommerce;

    $remCriteria = ["username" => $username,];

    $db->customers->remove($remCriteria);

    //Close the connection
    $mongoClient->close();

}


function productExists($dvd_name){
    //Connect to database
    $mongoClient = new MongoClient();

    //Select a database
    $db = $mongoClient->ecommerce;

    $findCriteria = ["dvd_name" => $dvd_name,];

    $cursor = $db->dvd->find($findCriteria);

    //Close the connection
    $mongoClient->close();

    //Return true if customer exists
    if($cursor->count() > 0){
        return true;
    }
    return false;

}


function deleteProduct($dvd_name){
    //Connect to database
    $mongoClient = new MongoClient();

    //Select a database
    $db = $mongoClient->ecommerce;

    $remCriteria = ["dvd_name" => $dvd_name,];

    $db->dvd->remove($remCriteria);

    //Close the connection
    $mongoClient->close();

}