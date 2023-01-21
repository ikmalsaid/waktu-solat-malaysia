<?php
    function prayer($code) {
        $api_url = "https://www.e-solat.gov.my/index.php?r=esolatApi/TakwimSolat&period=today&zone=$code";
        $json = file_get_contents($api_url); $results = json_decode($json, true);
        $prayer_times = array(
            "Subuh" => $results['prayerTime'][0]['fajr'],
            "Zuhur" => $results['prayerTime'][0]['dhuhr'],
            "Asar" => $results['prayerTime'][0]['asr'],
            "Maghrib" => $results['prayerTime'][0]['maghrib'],
            "Ishak" => $results['prayerTime'][0]['isha']);
        return $prayer_times;
    }
?>