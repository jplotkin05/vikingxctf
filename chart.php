<div align="center">
  <form align="center" method="post">
    <label>Choose Event to See a Progression Timeline</label>
    <select id="event" name="eventType">
      <option value="">Select Event</option>
      <option value="2 Mile XC">2 Mile XC</option>
      <option value="5000m XC">5000m XC</option>
      <option value="3 Mile XC">3 Mile XC</option>
      <option value="100m">100m</option>
      <option value="100m Hurdles">100m Hurdles</option>
      <option value="200m">200m</option>
      <option value="400m">400m</option>
      <option value="800m">800m</option>
      <option value="1600m">1600m</option>
      <option value="3200m">3200m</option>
    </select>
    <input type="submit" name="submit" value="Select">
  </form>
  <?php
  if (isset($_POST['submit'])) {
  ?>
    <h3 align="center"><?php echo $_POST['eventType'] . " Graph"; ?></h3>
    <script type="text/javascript">
      google.charts.load('current', {
        packages: ['corechart', 'line']
      });
      google.charts.setOnLoadCallback(drawTrendlines);

      function drawTrendlines() {

        var data = new google.visualization.DataTable();

        data.addColumn('number', 'Run #');
        data.addColumn('number', 'Time');

        data.addRows([

          <?php
          include 'dbinfo.php';
          if (isset($_POST['submit'])) {
            $event = $_POST['eventType'];
            $query = "SELECT REDACTED,REDACTED FROM REDACTED JOIN REDACTED ON REDACTED = REDACTED JOIN REDACTED ON REDACTED=REDACTED JOIN REDACTED ON REDACTED=REDACTED WHERE REDACTED = $search AND REDACTED LIKE '%$event' AND REDACTED !='DNS' AND REDACTED !='DNF'ORDER BY REDACTED";

            $query_run = mysqli_query($conn, $query) or die("Could not fetch data.");

            if (mysqli_num_rows($query_run) > 0) {
              $x = 1;
              while ($row = mysqli_fetch_array($query_run)) {

                $char = strlen($row['REDACTED']);
                $time = $row['REDACTED'];
                $colPos = strpos($time, ":");
                $temp = substr($time, 0, $colPos);
                if (strlen($temp) == 2) {
                  $time = substr($time, 0, 5);
                  $time = str_replace(":", ".", $time);
                  echo "[" . $x . "," . $time . "],";
                } elseif (substr($time, 0, 1) != 0) {

                  $time = substr($time, 0, 4);
                  $time = str_replace(":", ".", $time);
                  echo "[" . $x . "," . $time . "],";
                } elseif (substr($time, 0, 1) == "0" && $time > "0:47.00") {
                  $time = substr($time, 0, 4);
                  $time = str_replace(":", ".", $time);
                  echo "[" . $x . "," . $time . "],";
                } else {
                  $time = substr($time, 2);
                  echo "[" . $x . "," . $time . "],";
                }
                $x++;

              }
            }
          }

          ?>
        ]);

        var options = {
          title: 'Event Progression',
          backgroundColor: 'black',
          is3D: true,
          subtitle: 'Trend of Race Times',

          hAxis: {
            title: 'Race',
            gridlineColor: '',

          },
          vAxis: {
            title: 'Time',
            gridlineColor: '',
          },
          colors: ['red', ''],
          trendlines: {
            0: {
              type: 'exponential',
              color: '#48A4C8',
              opacity: 100
            },
            1: {
              type: 'linear',
              color: '',
              opacity: 100
            }
          }
        };

        var chart = new google.visualization.LineChart(document.getElementById('chart_div'));
        chart.draw(data, options);
      }
    </script>
  <?php
    if ($_POST['eventType'] != "") {
      echo '<div style="width:70%;height:400px; fill:white !important;"id="chart_div" align="center"></div>';
    } else {
      echo "No data available.";
    }
  }


  ?>
</div>