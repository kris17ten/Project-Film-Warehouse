// JavaScript Document


//Example product
{
  "_id" : ObjectId("587e34f9a644087e335e788"),
  "title" : "Tarzan",
  "image_url" : "images/tarzan.png",
  "director" :  "Chris Buck",
  "genre" : "Kids",
  "running_time" : 88,
  "price" : 10
  "stock_count" : 50,
}



//Example cutomer
{
  "_id" : ObjectId("487e34e9a374r87f835e286"),
  "first_name" : "Some",
  "surname" : "One",
  "address" : "17 Example Street, London, NW3 1PR",
  "phone_number" : "020 1234 5678",
  "email" : "someone@example.com"
}


//Example staff
{
  "_id" : ObjectId("543d34b9a374h87f436a195"),
  "first_name" : "Someone",
  "surname" : "Else",
  "role" : "Staff",
  "address" : "10 Example Street, London, N1 1PT",
  "phone_number" : "020 9876 5432",
  "email" : "selse@fwlondon.com"
}



//Example order
{
  "_id" : ObjectId("458a04g9462ed9s36294h49"),
  "customer_id" : ObjectId("487e34e9a374r87f835e286"),
  "shipping_address" : "17 Example Street, London, NW3 1PR",
  "date" : "09/02/18",
  "time" : "17:00",
  "eta" : "17/02/18",
  "cost" : 50
  "basket_id" : ObjectId("2h836h9306e63820h86h8969")
}

//Example basket
{
  "_id" : ObjectId("2h836h9306e63820h86h8969"),
  "customer_id" : ObjectId("487e34e9a374r87f835e286"), 
  "date" : "09/02/18",
  "time" : "17:00",
  "cost" : 50
  "products" : [
    {
      "_id" : ObjectId("587e34f9a644087e335e788"),
      "count" : 5
    }  
  ] 
}