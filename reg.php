<?php
    
$name = filter_input(INPUT_POST, 'name');
$pwd = filter_input(INPUT_POST, 'pwd');
$email = filter_input(INPUT_POST, 'email');



if ($name == null || $email == null || $pwd == null){
    $error = "Invalid input data. Check all field and try again.";
    echo "<p>$name, $email, $pwd</p>";
} else {
    require_once('database.php');
    $query = 'INSERT INTO Users (name, pwd, email) VALUES(:name, :pwd, :email)';
    $statement = $db->prepare($query);
    $statement->bindValue(':name', $name);
    $statement->bindValue(':pwd', $pwd);
    $statement->bindValue(':email', $email);
    $statement->execute();
    $statement->closeCursor();
    
    header('location: 1Login.php');
}


?>
