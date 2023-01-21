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
        <center><br><b>Waktu Solat Malaysia @ PHP</b></center>
        <div class="container">
            <div class="form-container">
                <!-- Drop-down List for States Item -->
                <form action="" method="post">
                    <label for="state">Select State:</label>
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
    <hr>
    <table>
        <?php
        require 'function/prayer.php';
        if (isset($_POST["state"])) {
            $code = $_POST["state"];
            $prayer_times = prayer($code);
            
            // Test Case to Check Return Array
            // print_r($prayer_times);
            
            // Show Selected Zone
            echo "<center>Selected State: $code</center><br><tr><th align=left>Prayer</th><th align=left>Time</th></tr>";

            // Show Prayer Time in Each Row
            foreach ($prayer_times as $name => $time) {
                echo "<tr><td>$name</td><td>$time</td></tr>";
            }
        }
        ?>
    </table>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js"></script>
</body>
</html>