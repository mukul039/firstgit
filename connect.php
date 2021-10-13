<?php
	$firstName = $_POST['First_Name'];
	$lastName = $_POST['Last_Name'];
	$gender = $_POST['Gender'];
	$email = $_POST['Email_Id'];
	$number = $_POST['Mobile_Number'];
        $dob = $_POST['Date_OF_Birth'];
        $designation = $_POST['Designation'];
        $HOBBIES = $_POST['Hobby'];
	// Database connection
	$conn = new mysqli('localhost','root','','registration');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into user_info(firstName, lastName, gender, email, number, dob, designation, HOBBIES) values(?, ?, ?, ?, ?, ?, ?, ?)");
		$stmt->bind_param("ssssisss", $firstName, $lastName, $gender, $email, $number, $dob, $designation, $HOBBIES);
		$execval = $stmt->execute();
		echo $execval;
		echo "Registration successfully...";
		$stmt->close();
		$conn->close();
	}

?>