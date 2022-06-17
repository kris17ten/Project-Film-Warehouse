<?php
//Connect to database
$mongoClient = new MongoClient();

//Select a database
$db = $mongoClient->ecommerce;

//Select a collection 
$collection = $db->dvd;

//Extract the data that was sent to the server
$name= filter_input(INPUT_POST, 'dvd_name', FILTER_SANITIZE_STRING);
$director = filter_input(INPUT_POST, 'dvd_director', FILTER_SANITIZE_STRING);
$genre = filter_input(INPUT_POST, 'genre', FILTER_SANITIZE_STRING);
$running_time = filter_input(INPUT_POST, 'running_time', FILTER_SANITIZE_STRING);
$rating = filter_input(INPUT_POST, 'rating', FILTER_SANITIZE_STRING);
$num_in_stock = filter_input(INPUT_POST, 'number_in_stock', FILTER_SANITIZE_STRING);

//Check file data has been sent
    if(!array_key_exists("imageToUpload", $_FILES)){
        echo 'File missing.';
        return;
    }
    if($_FILES["imageToUpload"]["name"] == "" || $_FILES["imageToUpload"]["name"] == null){
        echo 'File missing.';
        return;
    }
    $uploadFileName = $_FILES["imageToUpload"]["name"];

    /*  Check if image file is a actual image or fake image
        tmp_name is the temporary path to the uploaded file. */
    if(getimagesize($_FILES["imageToUpload"]["tmp_name"]) === false) {
        echo "File is not an image.";
        return;
    }
    
    // Check that the file is the correct type
    $imageFileType = pathinfo($uploadFileName, PATHINFO_EXTENSION);
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        return;
    }
    
    //Specify where file will be stored
    $target_file = 'images/' . $uploadFileName;
    
    /* Files are uploaded to a temporary location. 
        Need to move file to the location that was set earlier in the script */
    if (move_uploaded_file($_FILES["imageToUpload"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["imageToUpload"]["name"]). " has been uploaded.";
        echo '<p>Uploaded image: <img src="' . $target_file . '"></p>';//Include uploaded image on page
    } 
    else {
        echo "Sorry, there was an error uploading your file.";
    }


//Convert to PHP array
$dataArray = [
    "dvd_name" => $name,
    "dvd_director" => $director,
    "genre" => $genre,
    "running_time" => $running_time,
    "rating" => $rating,
    "number_in_stock" => $num_in_stock,
    "dvd_image" => $target_file
 ];

//Add the new product to the database
$returnVal = $collection->insert($dataArray);
    
//Echo result back to user
if($returnVal['ok']==1){
    echo 'ok' ;
}
else {
    echo 'Error adding customer';
}

//Close the connection
$mongoClient->close();





