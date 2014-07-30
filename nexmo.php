<?php
	error_reporting(E_ALL);
	ini_set('display_errors',1);
		// Create connection
	echo "trying to connect";
	$con=mysqli_connect("127.0.0.1","root","root","votes");

	// Check connection
	if (mysqli_connect_errno()) {
	  echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}
	else{
		echo "connected to mysql";
	}

	include ( "src/NexmoMessage.php" );
	$account_key = '9e300837';
	$account_secret = '7fed3068';
	$sms = new NexmoMessage($account_key, $account_secret);
    	if ($sms->inboundText()) {
    		//$sms->reply('You said: ' . $sms->text);
		//$sms->inbound_message = false;
		echo "you said";
		echo $sms->text;
		$team1=0;
		$team2=0;
		$team3=0;
		$team4=0;
		$team5=0;
		$team6=0;
		$team7=0;
		$team8=0;
		
	
		switch ((int)($sms->text)) {
		    case 1:
		        $team1 = 1;
		        break;
		    case 2:
		        $team2 = 1;
		        break;
		    case 3:
		        $team3 = 1;
		        break;
		    case 4:
		        $team4 = 1;
		        break;	
		    case 5:
		        $team5 = 1;
		        break;
		    case 6:
		        $team6 = 1;
		        break;
		    case 7:
		        $team7 = 1;
		        break;
		    case 8:
		        $team8 = 1;
		        break;		    
		}    
		$sql="INSERT INTO votes (team1, team2, team3, team4, team5, team6, team7, team8)
		VALUES ($team1, $team2, $team3, $team4, $team5, $team6, $team7, $team8)";

		if (!mysqli_query($con,$sql)) {
		  die('Error: ' . mysqli_error($con));
		}
		mysqli_close($con);

	}

?>
