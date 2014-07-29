<?php
	//error_reporting(E_ALL);
	//ini_set('display_errors',1);
		// Create connection
	//echo "trying to connect";
	$con=mysqli_connect("127.0.0.1","root","root","votes");

	// Check connection
	if (mysqli_connect_errno()) {
	  echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}
	else{
		//echo "connected to mysql";
	}

	include ( "src/NexmoMessage.php" );
	//include ("parse.com-php-library/parse.php");
	$sms = new NexmoMessage('9e300837', '7fed3068');
    if ($sms->inboundText()) {
    	//$sms->reply('You said: ' . $sms->text);
		//$sms->reply('You said: ' . $sms->text . ' from:' . $this->from . 'to: ' $this->to);
		$sms->inbound_message = false;
		//echo "you said";
		//echo $sms->text;
		$team1=0;
		$team2=0;
		$team3=0;
		$team4=0;
		$team5=0;
		$team6=0;
		$team7=0;
		$team8=0;
		
	
		switch (parseInt($sms->text,10)) {
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
		        $sms->reply('7 up');
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
		$sms->reply('all said and done!');
	}

	//http_response_code(200);
?>