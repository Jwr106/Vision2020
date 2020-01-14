<?php

$firstName =$_POST['firstName'];
$lastName =$_POST['lastName'];
$address =$_POST['Address'];
$email =$_POST['Email'];
$postCode =$_POST['PostCode'];
$password1 =$_POST['Password'];
$password2 =$_POST['Password2'];

if ($password1 == $password2)

{
    echo "";
} 

else 
    {
        echo "Passwords are different! Please try again.";
        die();
    }


if (!empty($firstName) || !empty($lastName) || !empty($$address) || 
    !empty($email) || !empty($postCode) || !empty($password1) ||
    !empty($password2))

{

$host = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbname = "ict_project_1";

//Create connection
$conn = new mysqli ($host, $dbUsername, $dbPassword, $dbname);

//checks connection
if(mysqli_connect_error())
{
    die('Connection error('. mysqli_connect_errno().')'.mysqli_connect_error());
}

else

{
    $SELECT = "SELECT Email From customers Where Email = ? Limit 1";
    $INSERT = "INSERT Into customers(firstName, lastName, Address, Email, postCode, 
     Password, Password2) values(?, ?, ?, ?, ?, ?, ?)";

    //Statement preparation
    $stmt = $conn->prepare($SELECT);
    $stmt -> bind_param("s", $email);
    $stmt -> execute();
    $stmt->bind_result($email);
    $stmt ->store_result();
    $rnum = $stmt -> num_rows;

    if ($rnum==0)
    {
        $stmt->close();
        $stmt = $conn->prepare($INSERT);
        $stmt->bind_param("ssssiii", $firstName, $lastName, $address, $email, $postCode, $password1, $password2);
        $stmt->execute();
        echo "You have registered succesfully";

    }
        else 
        {
        echo "Email have been used";
    }

    $stmt -> close();
    $conn-> close();

    }
    
        } else 
    {
        echo "All fields are required";
        die();
    }    
    

?>


