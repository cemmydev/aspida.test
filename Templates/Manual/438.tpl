<?php
// Define the path to the buidata.php file
$buildataFilePath = '/var/www/html/x'.SPEED.'/GameEngine/Data/buidata.php';

// Include the buidata.php file to access the $bid38 array
include($buildataFilePath);

// Check if the first element of $bid38 exists
if (isset($bid38[1]['time'])) {
    // Extract the time value for the Great Warehouse at level 1
    $timeValue = $bid38[1]['time']/SPEED;
	
    // Convert the time value to a human-readable format (hh:mm:ss)
    $hours = floor($timeValue / 3600);
    $minutes = floor(($timeValue % 3600) / 60);
    $seconds = $timeValue % 60;

    // Format the time as hh:mm:ss
    $formattedTime = sprintf("%02d:%02d:%02d", $hours, $minutes, $seconds);
} else {
    $formattedTime = "N/A"; // Display "N/A" if data not found
}
?>
<a class="manualBack arrow back" href="manual.php?typ=0&gid=0">to Overview</a><br><br/>
<h1><img src="/img/x.gif" class="gebIcon g38Icon"> Great Warehouse</h1><img class="building g38" src="img/x.gif" alt="Great Warehouse" title="Great Warehouse" />The great warehouse has 3 times the capacity of a normal warehouse. <br><br>
This building can only be built in wonder of the world villages or with a special Natarian artefact.<p><br></br><b>Costs</b> and <b>construction time</b> for level 1:<br /><img class="r1" src="img/x.gif" alt="Lumber" title="Lumber" /> 650 | <img class="r2" src="img/x.gif" alt="Clay" title="Clay" /> 800 | <img class="r3" src="img/x.gif" alt="Iron" title="Iron" /> 450 | <img class="r4" src="img/x.gif" alt="Crop" title="Crop" /> 200 | <img class="r5" src="img/x.gif" alt="Crop consumption" title="Crop consumption" /> 1 | <span class="dur"><img class="clock" alt="duration" title="duration" src="img/x.gif" /> <?php echo $formattedTime; ?></span></p>
	<p><b>Prerequisites</b><br /><a href="manual.php?typ=4&gid=15">Main Building</a> Level 10, <a href="manual.php?typ=4&gid=40">Wonder Of The World</a> Level 0</p><map id="nav" name="nav">
