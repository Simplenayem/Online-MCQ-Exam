<?php 
	$name = $_POST['user_name'];
	// correct asnwers taken from users
	$q1a = $_POST['q1a'];
	$q2a = $_POST['q2a'];
	$q3a = $_POST['q3a'];
	$q4a = $_POST['q4a'];
	$q5a = $_POST['q5a'];
	$q6a = $_POST['q6a'];
	$q7a = $_POST['q7a'];
	$q8a = $_POST['q8a'];
	$q9a = $_POST['q9a'];
	$q10a = $_POST['q10a'];

    $servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "onlinemcq";

	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	// Check connection
	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	}

	$sql5 = "DROP TABLE userans";
 //   mysql_select_db( 'onlinemcq' );
    if ($conn->query($sql5) === TRUE) {
    echo "";
    } else {
    echo "Error deleting record: " . $conn->error;
    }


	$sql1 = "CREATE TABLE userans (
				id INT(3) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
				user_ans VARCHAR(4) NOT NULL,
				correct_opt VARCHAR(4) NOT NULL
			)";
	if ($conn->query($sql1) === TRUE) {
    echo "";
    } else {
    echo "Error creating table: " . $conn->error;
    }
	
	$sql = "SELECT  correct_opt FROM questions4";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
    //   echo "<table><tr><th>ID</th><th>Questions</th><th>1st Option</th><th>2nd Option</th><th>3rd 		//	Option</th><th>4rth Option</th></tr>";
    // output data of each row
    $i=0;
    while($row = $result->fetch_assoc()) {
        
        $i++;
    	$qc[$i]=$row['correct_opt'];
		
    } 
    } else {
    echo "0 results";
    }
    
	$qc1 = $qc[1]; 
	$qc2 = $qc[2];
	$qc3 = $qc[3];
	$qc4 = $qc[4];
	$qc5 = $qc[5];
	$qc6 = $qc[6];
	$qc7 = $qc[7];
	$qc8 = $qc[8];
	$qc9 = $qc[9];
	$qc10 = $qc[10];
    $sql3="INSERT INTO userans (user_ans,correct_opt)
     VALUES ('$q1a','$qc1'),
            ('$q2a','$qc2'),
            ('$q3a','$qc3'),
            ('$q4a','$qc4'),
            ('$q5a','$qc5'),
            ('$q6a','$qc6'),
            ('$q7a','$qc7'),
            ('$q8a','$qc8'),
            ('$q9a','$qc9'),
            ('$q10a','$qc10')";
       if ($conn->query($sql3) === TRUE) {
       echo "";
       } else {
       echo "Error: " . $sql3 . "<br>" . $conn->error;
       }
    $sql4 = "SELECT  user_ans,correct_opt FROM userans";
    $result4 = $conn->query($sql4);
    if ($result4->num_rows > 0) {
    $i=0;
    while($row = $result4->fetch_assoc()) {
        
       
    	if($row['correct_opt']==$row['user_ans'])
            $i++;
		
   		 } 
   
    } else {
    echo "0 results";
    }
    
    $conn->close();
?>