<?php
	error_reporting(E_ALL);
	ini_set('display_errors',1);
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
	
	// $team1=$_REQUEST["team1"];
	// $team2=$_REQUEST["team2"];
	// $team3=$_REQUEST["team3"];
	// $team4=$_REQUEST["team4"];
	// $team5=$_REQUEST["team5"];
	// $team6=$_REQUEST["team6"];
	// $team7=$_REQUEST["team7"];
	// $team8=$_REQUEST["team8"];

	// if (!(isset($team1,$team2,$team3,$team4,$team5,$team6,$team7,$team8))){
	// 	$team1=0;
	// 	$team2=0;
	// 	$team3=0;
	// 	$team4=0;
	// 	$team5=0;
	// 	$team6=0;
	// 	$team7=0;
	// 	$team8=0;
	// }
	include ( "src/NexmoMessage.php" );
	include ("parse.com-php-library/parse.php");
	// include ("parse.com-php-library/parseConfig.php");
	// echo "hello again \n";
	// $myfile = fopen("votes.txt", "r") or die("Unable to open file!");
	// $team1=fgets($myfile);
	// $team2=fgets($myfile);
	// $team3=fgets($myfile);
	// $team4=fgets($myfile);
	// $team5=fgets($myfile);
	// $team6=fgets($myfile);
	// $team7=fgets($myfile);
	// $team8=fgets($myfile);
	// fclose($myfile);
	// echo $team8;
	// echo "\n i \n j <br>";
	// echo $team4;



	// // /**
	// //  * To send a text message.
	// //  *
	// //  */

	// // // Step 1: Declare new NexmoMessage.
	// // // $api_key = '9e300837';
	// // // $api_secret = '7fed3068';
	// // $nexmo_sms = new NexmoMessage('9e300837', '7fed3068');
	// // echo "declared new nexmo message";
	// // // Step 2: Use sendText( $to, $from, $message ) method to send a message. 
	// // $info = $nexmo_sms->sendText( '+27740184931', 'MyApp', 'Hello!' );

	// // // Step 3: Display an overview of the message
	// // echo "sending message";
	// // echo $nexmo_sms->displayOverview($info);

	// // // Done!
	// echo "hello";
	$sms = new NexmoMessage('9e300837', '7fed3068');
    if ($sms->inboundText()) {
		$sms->reply('You said: ' . $sms->text);
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
		
	
		switch (parseInt($sms->text,10)) {
		    case 1:
		        $team1 =  1;
		        break;
		    case 2:
		        $team2 = 1;
		        break;
		    case 3:
		        $team3 = 1;
		        break;
		    case 4:
		        $team4 =  1;
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

  //       break;
		
		// xmlhttp.open("GET","example.php?q="+str,true);
  // 		xmlhttp.send();
	//}
	// $className = "TestObject";

	// $url = 'https://api.parse.com/1/classes/' . $className;

	// $appId = 'AXolUl5OF5dRpCGttWqUCenuBcyPMgrGo2L1CBGp';
	// $restKey = '6XXImyiWuJClCYELtrssG6TtgTIj5kl85QTRNdgU';

	// $objectData = '{"myName":"wonderMike", "imHereTo":"rockTheMic"}';
	// echo "ninti restful";
	// $rest = curl_init();
	// curl_setopt($rest,CURLOPT_URL,$url);
	// curl_setopt($rest,CURLOPT_PORT,443);
	// curl_setopt($rest,CURLOPT_POST,1);
	// curl_setopt($rest,CURLOPT_POSTFIELDS,$objectData);
	// curl_setopt($rest,CURLOPT_HTTPHEADER, 
	//     array("X-Parse-Application-Id: " . $appId,
	//         "X-Parse-REST-API-Key: " . $restKey,
	//         "Content-Type: application/json"));

	// $response = curl_exec($rest);
	// echo $response;
	//$parse = new parseObject("vids");
    // $parse->title = $data['upload_data']['title'];
    // $parse->description = $data['upload_data']['description'];
    // $parse->tags = $data['upload_data']['tags'];

    // //create new geo
    // $geo = new parseGeoPoint($data['upload_data']['lat'],$data['upload_data']['lng']);
    // $parse->location = $geo->location;

    // //use pointer to other class
    // $parse->userid = array("__type" => "Pointer", "className" => "_User", "objectId" => $data['upload_data']['userid']);

    // //create acl
    // $parse->ACL = array("*" => array("write" => true, "read" => true));
    //$r = $parse->save();

	// $myfile = fopen("votes.txt", "w") or die("Unable to open file!");
	// fwrite($myfile, $team1 + "\n");
	// fwrite($myfile, $team2 + "\n");
	// fwrite($myfile, $team3 + "\n");
	// fwrite($myfile, $team4 + "\n");
	// fwrite($myfile, $team5 + "\n");
	// fwrite($myfile, $team6 + "\n");
	// fwrite($myfile, $team7 + "\n");
	// fwrite($myfile, $team8 + "\n");
	// fclose($myfile);
	//echo "done";
?>

<!DOCTYPE html>
	<head>
		<title>HTML5 Bar Graph Example</title>
	</head>

	<body>
		<div id="graphDiv1"></div>
		<br />
		<div id="graphDiv2"></div>
		<script src="html5-canvas-bar-graph.js"></script>
		<script>(function () {
		
			function createCanvas(divName) {
				
				var div = document.getElementById(divName);
				var canvas = document.createElement('canvas');
				canvas.style["width"] = "70%";
				div.appendChild(canvas);
				if (typeof G_vmlCanvasManager != 'undefined') {
					canvas = G_vmlCanvasManager.initElement(canvas);
				}	
				var ctx = canvas.getContext("2d");
				return ctx;
			}
			
			var ctx = createCanvas("graphDiv1");
			
			var graph = new BarGraph(ctx);
			graph.maxValue = 30;
			graph.margin = 2;
			graph.colors = ["#49a0d8", "#d353a0", "#ffc527", "#df4c27", "#49a0d8", "#d353a0", "#ffc527", "#df4c27"];
			graph.xAxisLabelArr = ["team1", "team2", "team3", "team4", "team5", "team6", "team7", "team8"];
			setInterval(function () {

				xmlhttp=new XMLHttpRequest();
				xmlhttp.onreadystatechange=function(){	
					if (xmlhttp.readyState==4 && xmlhttp.status==200){
					    var tallies = xmlhttp.responseText.split("<br>");
					    //alert(xmlhttp.responseText);
					    //alert(tallies);
					    graph.update(tallies.slice(0,-1).map(Number));
					}
				}
				xmlhttp.open("GET","query.php",true);
				xmlhttp.send();
					
			
			}, 1000);
			

		}());</script>
	</body>
</html>