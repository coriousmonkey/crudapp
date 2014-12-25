<?php 
mysql_connect("localhost", "root", "");
mysql_select_db("ajax");

$sql = mysql_query("SELECT * FROM siswa ORDER BY nama ASC");
$result = array();

while($row = mysql_fetch_assoc($sql)){
      $result[]= array($row['nama'],$row['nilai']);
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>Flot Examples: Categories</title>
	<link href="examples.css" rel="stylesheet" type="text/css">
	<!--[if lte IE 8]><script language="javascript" type="text/javascript" src="../../excanvas.min.js"></script><![endif]-->
	<script language="javascript" type="text/javascript" src="jquery.js"></script>
	<script language="javascript" type="text/javascript" src="jquery.flot.js"></script>
	<script language="javascript" type="text/javascript" src="jquery.flot.categories.js"></script>
	<script type="text/javascript">

	$(function() {

		var data = <?php echo json_encode($result); ?>;

		$.plot("#placeholder", [ data ], {
			
			series: {
				bars: {
					show: true,
					barWidth: 0.5,
					align: "center"
					
				}
			},
			
			grid: { hoverable: true, clickable: true, autoHighlight: true },
			
			xaxis: {
				mode: "categories",
				tickLength: 0
			}
			
		
		});

		// Add the Flot version string to the footer
		

		$("#footer").prepend("Flot " + $.plot.version + " &ndash; ");
	});

	</script>
</head>
<body>

	<div id="header">
		<h2>Categories</h2>
	</div>

	<div id="content">

		<div class="demo-container">
			<div id="placeholder" class="demo-placeholder"></div>
		</div>

		<p>With the categories plugin you can plot categories/textual data easily.</p>

	</div>

	<div id="footer">
		Copyright &copy; 2007 - 2014 IOLA and Ole Laursen
	</div>

</body>
</html>





