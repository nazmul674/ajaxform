<?php
$host = "localhost";
$username = "root";
$password = "root";

try 
{
    $conn = new PDO("mysql:host=$host;dbname=phptest", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e)
{
    echo "Connection failed: " . $e->getMessage();
}

$response = array('success' => false);

if(isset($_POST['name']) && $_POST['name']!='' && isset($_POST['phone']) && $_POST['phone']!='' && isset($_POST['email']) && $_POST['email']!='' && isset($_POST['username']) && $_POST['username']!=''&&isset($_POST['password']) && $_POST['password']!='')
{
	$sql = "INSERT INTO contacts(name, phone, email,username,password) VALUES('".addslashes($_POST['name'])."', '".addslashes($_POST['phone'])."','".addslashes($_POST['email'])."', '".addslashes($_POST['username'])."','".addslashes($_POST['password'])."')";
	
	if($conn->query($sql))
	{
		$response['success'] = true;
	}
}

echo json_encode($response);
?>