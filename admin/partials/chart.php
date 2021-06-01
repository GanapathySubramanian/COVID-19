<!-- <?php
include('../includes/db_connect.php');


$myquery = "SELECT district,confrimed FROM  `district_cases`";

$data1=mysqli_query($con,$myquery);
if ( ! $data1 ) {
    echo mysql_error();
    die;
  }

  
  $data = array();

  for ($x = 0; $x < mysql_num_rows($data1); $x++) {
    $data[] = mysql_fetch_assoc($data1);
  }
  echo json_encode($data);

  mysql_close($server);

?>

  <div id="chart-container"></div>
  <script>
    anychart.onDocumentReady(function () {
      anychart.data.loadJsonFile("php/data.php", function (data) {
        // create a chart and set loaded data
        chart = anychart.bar(data);
        chart.container("container");
        chart.draw();
      });
    });
  </script> -->
