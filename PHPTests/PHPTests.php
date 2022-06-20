<?php
//Include SimpleTest code
require_once ('simpletest/autorun.php');

//Include utility functions
require_once ('db_tools.php');

//Include file to be tested
require_once ('db_interface.php');


//test to add a customer
class AddCustomerTest extends UnitTestCase {
    function testAddCustomer(){
        $username = "TEST";
        
        //delete all instances of users with TEST as username
        while(customerExists($username)){
            deleteCustomer($username);
        }
        
        //call addCustomer function
        addCustomer("Test", "TEST", "test@test.com", "test", "0123456789", "test street");
        
        //Check that customer has been added
        $this->assertTrue(customerExists($username));
        
        //delete test case from database
        deleteCustomer($username);

    }
}

//test to add a product
class AddProductTest extends UnitTestCase {
    function testAddProduct(){
        $dvd_name = "TEST";
        
        //delete all instances of users with TEST as username
        while(productExists($dvd_name)){
            deleteProduct($dvd_name);
        }
        
        //call addCustomer function
        addProduct("TEST", "Mr. Test", "test", 60, "R", 45, "free", "testing... 1, 2, 3...", "images/test");
        
        //Check that customer has been added
        $this->assertTrue(productExists($dvd_name));
        
        //delete test case from database
        deleteProduct($dvd_name);
    }
}


//test to try staff login
class StaffLoginTest extends UnitTestCase {
    function testStaffLogin(){
        $username = "random";
        $password = "random";
        
        //add staff with username random if doesnt exist
        if(!staffExists($username)){
            addStaff("random", "random", "rand@random.com", "random");
        }
        
        //Call function
        $myVar = staffLogin($username, $password);
        
        //Check that it says ok
        $this->assertEqual($myVar, "ok");
        
        //delete test case from database
        //deleteProduct($username);
    }
}


//test to save a product
class SaveProductTest extends UnitTestCase {
    function testSaveProduct(){
        $dvd_name = "TEST";
        $new_dvd_name = "NEWTEST";
        
        //add staff with username random if doesnt exist
        if(!productExists($dvd_name)){
            addProduct("TEST", "Mr. Test", "test", 60, "R", 45, "free", "testing... 1, 2, 3...", "images/test");
        }
        
        //Call function
        $myVar = saveProduct($dvd_name, $new_dvd_name);
        
        //Check that it says ok
        $this->assertEqual($myVar, "ok");
        
        //delete test case from database
        deleteProduct($new_dvd_name);
    }
}


//test to edit a customer
class EditCustomerTest extends UnitTestCase {
    function testEditCustomer(){
        $username = "Test";
        $new_username = "NewTEST";
        
        //add staff with username random if doesnt exist
        if(!customerExists($username)){
            addCustomer("Test", "TEST", "test@test.com", "test", "0123456789", "test street");
        }
        
        //Call function
        $myVar = editCustomer($username, $new_username);
        
        //Check that it says ok
        $this->assertEqual($myVar, "ok");
        
        //delete test case from database
        deleteCustomer($new_username);
    }
}
