<!DOCTYPE html>
<html>
<head>
    <title>Islamic Prayer Times</title>
</head>
<body>
    <b>Waktu Solat Malaysia @ PHP</b>
    <form action="" method="post">
    <label for="state">Select State:</label>
    <select name="state" id="state">
        <option value="">Select State</option>
        <?php
        $states = array("Johor"=>"JHR02",
                        "Kedah"=>"KDH01",
                        "Kelantan"=>"KTN01",
                        "Melaka"=>"MLK01",
                        "Negeri Sembilan"=>"NGS02",
                        "Pahang"=>"PHG02",
                        "Perak"=>"PRK02",
                        "Perlis"=>"PLS01",
                        "Pulau Pinang"=>"PNG01",
                        "Sabah"=>"SBH07",
                        "Sarawak"=>"SWK08",
                        "Selangor"=>"SGR01",
                        "Terengganu"=>"TRG01",
                        "Wilayah Persekutuan Kuala Lumpur"=>"WLY01",
                        "Wilayah Persekutuan Labuan"=>"WLY02",
                        "Wilayah Persekutuan Putrajaya"=>"WLY01");
        foreach ($states as $name => $code) {
            echo "<option value='$code'>$name</option>";
        }
        ?>
    </select>
    <input type="submit" value="Submit">
    </form>
    <hr>
    <table>
        <?php
        if (isset($_POST["state"])) {
            $selected = $_POST["state"];
            $jakim_url = "https://www.e-solat.gov.my/index.php?r=esolatApi/TakwimSolat&period=today&zone=".$selected;
            $jakim_data = file_get_contents($jakim_url); $results = json_decode($jakim_data, true);
            $prayer_times = array(
                "Subuh" => $results['prayerTime'][0]['fajr'],
                "Zuhur" => $results['prayerTime'][0]['dhuhr'],
                "Asar" => $results['prayerTime'][0]['asr'],
                "Maghrib" => $results['prayerTime'][0]['maghrib'],
                "Ishak" => $results['prayerTime'][0]['isha']
            );

            echo '&nbsp;Selected State: '.$selected.'<br>', '<tr>', '<th align=left>Prayer</th>', '<th align=left>Time</th>', '</tr>';
            
            foreach ($prayer_times as $name => $time) {
                echo "<tr>", "<td>$name</td>", "<td>$time</td>", "</tr>";
        }}
        ?>
    </table>
</body>
</html>