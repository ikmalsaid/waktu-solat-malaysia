<!DOCTYPE html>
<html>
<head>
    <title>Islamic Prayer Times</title>
    <link rel="stylesheet" href="function/styles.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
</head>
<body>
    <section class="section">
        <div class="container">
            <div class="form-container">
                <center><H3><b>Waktu Solat Malaysia</b></H3><hr>
                <br><b>Instructions</b><br>Select a state and tap submit.<br><br></center>
                <!-- Drop-down List for States Item -->
                <form action="" method="post">
                    <select name="state" id="state">
                    <option value="">Select State</option>
                        <?php
                            $states = include 'function/states.php';
                            // Add Each Item in Array into List
                            foreach ($states as $name => $code) {
                                echo "<option value='$code'>$name</option>";
                            }
                        ?>
                    </select>
                    <input type="submit" value="Submit">
                </form>
            </div>
    <table>
        <?php
        require 'function/prayer.php';
        require 'function/time.php';
        if (isset($_POST["state"])) {
            $code = $_POST["state"];
            $prayer_times = prayer($code);
            $server_time = date('d/m/Y H:i:s',time());
            
            // Show Selected Zone
            echo "<center>State Code:<br><b>$code</b><br><br>Server Time:<br><b>$server_time</b></center><br><tr><th align=left>Prayer</th><th align=right>Time</th></tr>";
        ?>
        <center>
            <?php
            // Show Prayer Time in Each Row
            foreach ($prayer_times as $name => $time) {
                echo "<tr><td>$name</td><td align=right>$time</td></tr>";
            }
        }
        ?>
        </center>
    </table>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js"></script>
    <br><br><center>Made with <span class="heart">♥</span> by Ikmal Said</center>
</body>
</html>