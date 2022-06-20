<?php

//adds a customer
function addCustomer($name, $username, $email, $password, $cardNo, $address){
//Connect to database
$mongoClient = new MongoClient();

//Select a database
$db = $mongoClient->ecommerce;

//Select a collection 
$collection = $db->customers;

//Convert to PHP array
$dataArray = [
    "name" => $name,
    "username" => $username,
    "email" => $email, 
    "password" => $password,
    "cardNumber" => $cardNo,
    "address" => $address
 ];

//Add the new product to the database
$returnVal = $collection->insert($dataArray);

//Close the connection
$mongoClient->close();
    
//Echo result back to user
if($returnVal['ok']==1){
    return 'ok' ;
    
}
return 'Error adding customer';

}

//adds a staff
function addStaff($name, $username, $email, $password){
//Connect to database
$mongoClient = new MongoClient();

//Select a database
$db = $mongoClient->ecommerce;

//Select a collection 
$collection = $db->staff;

//Convert to PHP array
$dataArray = [
    "name" => $name,
    "username" => $username,
    "email" => $email, 
    "password" => $password,
    "role" => "staff"
 ];

//Add the new product to the database
$returnVal = $collection->insert($dataArray);

//Close the connection
$mongoClient->close();
    
//Echo result back to user
if($returnVal['ok']==1){
    return 'ok' ;
    
}
return 'Error adding customer';

}


//adds a product
function addProduct($name, $director, $genre, $running_time, $rating, $num_in_stock, $price, $synopsis, $target_file){
//Connect to database
$mongoClient = new MongoClient();

//Select a database
$db = $mongoClient->ecommerce;

//Select a collection 
$collection = $db->dvd;

//Convert to PHP array
$dataArray = [
    "dvd_name" => $name,
    "dvd_director" => $director,
    "genre" => $genre,
    "running_time" => $running_time,
    "rating" => $rating,
    "number_in_stock" => $num_in_stock,
    "price" => $price,
    "synopsis" => $synopsis,
    "dvd_image" => $target_file
 ];
//Add the new product to the database
$returnVal = $collection->insert($dataArray);

//Close the connection
$mongoClient->close();
    
//Echo result back to user
if($returnVal['ok']==1){
    return 'ok' ;
    
}
return 'Error adding product';

}

//login for staff
function staffLogin($username, $password){
    //Connect to database
$mongoClient = new MongoClient();

//Select a database
$db = $mongoClient->ecommerce;

$findCriteria = [
        "username" => $username, ];

    //Find all of the customers that match  this criteria
    $cursor = $db->staff->find($findCriteria);

    //Check that there is exactly one customer
    if($cursor->count() == 0){
        return 'Username not recognized.';
    }
    else if($cursor->count() > 1){
        return 'Database error: Multiple customers have same usernames.';
    }
    
    //Get customer
    $staff = $cursor->getNext();
    
    //Check password
    if($staff['password'] != $password){
        return 'Password incorrect.';
    }
    
    //Close the connection
    $mongoClient->close();

    
    return 'ok';
    
}

//updates a product
function saveProduct($dvd_name, $new_dvd_name){
    //Connect to database
$mongoClient = new MongoClient();
//Select a database
$db = $mongoClient->ecommerce;

$findCriteria = ["dvd_name" => $dvd_name, ];
//Find all of the customers that match  this criteria
    $cursor = $db->dvd->find($findCriteria);
    
    foreach ($cursor as $dvd){
    $dataArray = [ "dvd_name" => $new_dvd_name, "dvd_director" => $dvd['dvd_director'],
    "genre" => $dvd['genre'], "running_time" => $dvd['running_time'], 
    "rating" => $dvd['rating'], "number_in_stock" => $dvd['number_in_stock'],
    "price" => $dvd['price'], "synopsis" => $dvd['synopsis'],
    "dvd_image" => $dvd['dvd_image'], "_id" => $dvd['_id'] ];
    }
    
    //Save the product in the database - it will overwrite the data for the product with this ID
$returnVal = $db->dvd->save($dataArray);

//Close the connection
$mongoClient->close();

if($returnVal['ok']==1){
    return 'ok';
}
return 'Error saving product';

}


//edits a customer
function editCustomer($username, $new_username){
    //Connect to database
$mongoClient = new MongoClient();
//Select a database
$db = $mongoClient->ecommerce;

$findCriteria = ["username" => $username, ];
//Find all of the customers that match  this criteria
    $cursor = $db->customers->find($findCriteria);
    
    $cust = $cursor->getNext();
    
    $dataArray = [
    "name" => $cust['name'],
    "username" => $new_username,
    "email" => $cust['email'], 
    "password" => $cust['password'],
    "cardNumber" => $cust['cardNumber'],
    "address" => $cust['address']
 ];
   
    //Save the product in the database - it will overwrite the data for the product with this ID
$returnVal = $db->customers->save($dataArray);

//Close the connection
$mongoClient->close();

if($returnVal['ok']==1){
    return 'ok';
}
return 'Error saving product';

}