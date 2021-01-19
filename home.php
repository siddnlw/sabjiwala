<?php
	session_start();
	$_SESSION["current_page"] = "home";
	$_SESSION["current_bar"] = "dashboard";
	include "admin.php";
?>

<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	<link rel="stylesheet" href="home.css">
	<!-- <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet"  id="bootstrap-css"> -->
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
	<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
	<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
	<script type="text/javascript">
	window.onload = function () 
	{
		var chart = new CanvasJS.Chart("chartContainer", 
		{
			backgroundColor:"#F4F6FB",
			animationEnabled: true, // change to true		
			title:
			{
				text: "Top Products Sale"
			},
			data: 
			[
				{
				// Change type to "bar", "area", "spline", "pie","column",etc.
					type: "column",
					dataPoints: 
					[
						{ label: "apple",  y: 10  },
						{ label: "orange", y: 15  },
						{ label: "banana", y: 25  },
						{ label: "mango",  y: 30  },
						{ label: "grape",  y: 28  }
					]
				}
			]
		});
		chart.render();
	}
	</script>
	<script type="text/javascript">
		google.charts.load('current', {'packages':['corechart']});
		google.charts.setOnLoadCallback(drawChart);
		function drawChart() 
		{
		  var data = google.visualization.arrayToDataTable([
		  ['Sales', 'Hours per Day'],
		  ['Vegitable', 20],
		  ['Fruits', 25],
		  ['Bread & Bakery', 17],
		  ['Dairy Products', 9],
		  ['Soft Drink', 8]
		  ]);
		  // Optional; add a title and set the width and height of the chart
		  var options = {'title':'Sales of Category', 'width':350, 'height':300, 'backgroundColor': 'transparent','is3D': true};
		  // Display the chart inside the <div> element with id="piechart"
		  var chart = new google.visualization.PieChart(document.getElementById('piechart'));
		  chart.draw(data, options);
		}
	</script>
</head>
<body>
	<div class="main">
		<h1>DASHBOARD</h1>
		<div class="pie">
			<div id="piechart">
			</div>
			<div>
				<div id="chartContainer" style="height: 250px; width: 300px;"></div>
			</div>
			<h3>Total Users</h3>
			<div>
				<div class="pie-wrapper progress-75 style-2 set-size charts-container">
				    <span class="label counter-count">15432</span>
				    <div class="pie">
				    	<div class="left-side half-circle"></div>
				    	<div class="right-side half-circle"></div>
			    	</div>
			   		<div class="shadow"></div>
			 	</div>
				<h5 style="margin-left: -50%; font-size: 20px;">Todays users -&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Avg. Users -</h5>
				<h5 style="margin-left: -50%;color: #7F8C8D; margin-top: -40%">200&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;50</h5>
			</div>
			<div>
				<div class="counter">
					<!-- <p class="counter-count">100</p> -->
					<script type="text/javascript">
						$('.counter-count').each(function () {
					        $(this).prop('Counter',0).animate({
					            Counter: $(this).text()
					        }, {
					          //chnage count up speed here
					            duration: 1700,
					            easing: 'swing',
					            step: function (now) {
					                $(this).text(Math.ceil(now));
					            }
					        });
					    });
					</script>
				</div>       
			</div>    
		</div>
		<div class="yearGraph">
			<div id = "container" style = "width: 550px; height: 400px; margin: 0 auto"></div>
     		 	<script language = "JavaScript">
		        	function drawChart2() 
		        	{
		            	// Define the chart to be drawn.
			            var data = new google.visualization.DataTable();
			            data.addColumn('string', 'Month');
			            data.addColumn('number', 'Vegitable');
			            data.addColumn('number', 'Fruits');
			            data.addColumn('number', 'Bread & Bakery');
			            data.addColumn('number', 'Dairy Products');
			            data.addColumn('number', 'Soft Drink');
			            data.addRows([
			               ['Jan',  7.0, 0.2, 0.9, 3.9,5],
			               ['Feb',  6.9, 0.8, 0.6, 4.2,2],
			               ['Mar',  9.5,  5.7, 3.5, 5.7,4],
			               ['Apr',  14.5, 11.3, 8.4, 8.5,1],
			               ['May',  18.2, 17.0, 13.5, 11.9,2],
			               ['Jun',  21.5, 22.0, 17.0, 15.2,4],
			               
			               ['Jul',  25.2, 24.8, 18.6, 17.0,3],
			               ['Aug',  26.5, 24.1, 17.9, 16.6,50],
			               ['Sep',  23.3, 20.1, 14.3, 14.2,5],
			               ['Oct',  18.3, 14.1, 9.0, 10.3,12],
			               ['Nov',  13.9,  8.6, 3.9, 6.6,6],
			               ['Dec',  9.6,  2.5,  1.0, 4.8,8]
			            ]);
			            // Set chart options
			            var options = {'title' : 'Average Sales of Category',
			               hAxis: 
			               {
			                  title: 'Month'
			               },
			               vAxis: 
			               {
			                  title: 'Quanitiy'
			               },   
			               'width':950,
			               'height':400,
			               'backgroundColor': '#F4F6FB'
			            };
			            // Instantiate and draw the chart.
			            var chart = new google.visualization.LineChart(document.getElementById('container'));
			            chart.draw(data, options);
		        	}
		         	google.charts.setOnLoadCallback(drawChart2);
	      		</script>
			</div>
		<div class="table">
			<h2 class="heading">Order Details</h2>
			<div class="tab">
				<div class="or">
					<label style="font-size: 20px;">Latest Orders</label>
					<table id="customers">
						<tr>
						  <th>Category</th>
						  <th>Product</th>
						  <th>Price</th>
						  <th>Quanitiy</th>
						</tr>
						<tr>
						  <td>Vegitables</td>
						  <td>Maria Anders</td>
						  <td>Germany</td>
						  <td>1</td>
						</tr>
						<tr>
						  <td>Fruits</td>
						  <td>Christina Berglund</td>
						  <td>Sweden</td>
						  <td>2</td>
						</tr>
						<tr>
						  <td>Fruits</td>
						  <td>Francisco Chang</td>
						  <td>Mexico</td>
						  <td>4</td>
						</tr>
						<tr>
					</table> 
				</div>
				<div class="ear">
					<label style="font-size: 20px;">Overall Orders Earnings</label>
					<table id="earnings">
						<tr>
						  <th>Category</th>
						  <th>Total Earning</th>
						  <th>Total Bought</th>
						</tr>
						<tr>
						  <td>Vegitables</td>
						  <td>10000</td>
						  <td>111</td>
						</tr>
						<tr>
						  <td>Fruits</td>
						  <td>2030</td>
						  <td>29</td>
						</tr>
						<tr>
						  <td>Bread & Beakry</td>
						  <td>500</td>
						  <td>10</td>
						</tr>
						<tr>
					</table> 
				</div>
			</div>	
		</div>
	</div>
</body>
</html>