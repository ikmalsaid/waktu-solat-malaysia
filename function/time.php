<?php
    function server_time() {
        $sirim_time = "https://www.e-solat.gov.my/index.php?r=esolatApi/SirimTime";
        $get_json = file_get_contents($sirim_time);
        $time_results = json_decode($get_json, true);
        return $server_time;
    }
?>