<!DOCTYPE html>
<html>
<head>
  <title>Islamic Prayer Times</title>
</head>
<body>
  <table>
    <style>
      table, th, td {border: 1px solid black;}
      table.center {width:300px; margin-left:auto; margin-right:auto;border-collapse: collapse;}
      th, td {padding: 10px;}
    </style>
    <tr>
      <th>Prayer</th>
      <th>Time</th>
    </tr>
    <?php
      $jakim_url = "https://www.e-solat.gov.my/index.php?r=esolatApi/TakwimSolat&period=today&zone=MLK01";
      $jakim_data = file_get_contents($jakim_url);
      $results = json_decode($jakim_data, true);
      $prayer_times = array(
        "Fajr" => $results['prayerTime'][0]['fajr'],
        "Dhuhr" => $results['prayerTime'][0]['dhuhr'],
        "Asr" => $results['prayerTime'][0]['asr'],
        "Maghrib" => $results['prayerTime'][0]['maghrib'],
        "Isha" => $results['prayerTime'][0]['isha']
      );
      foreach ($prayer_times as $name => $time) {
        echo "<tr>";
        echo "<td>$name</td>";
        echo "<td>$time</td>";
        echo "</tr>";
      }
    ?>
  </table>
</body>
</html>
