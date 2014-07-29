<!DOCTYPE html>
	<head>
		<title>votes</title>
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
					
			
			}, 6000);
			

		}());</script>
	</body>
</html>
