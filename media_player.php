<?php


// #################################
// ###                           ###
// ###  HTML5 AUDIO FILE PLAYER  ###
// ###  v1.4                     ###
// ###  @L0r3notData             ###
// ###                           ###
// #################################


// ##### PATH TO MEDIA DIR #####
$otherDir = '/audioFiles';


// ##### CHECK IF MEDIA NAME IS IN URL, PLAY IN MEDIA PLAYER IF SO #####
if(isset($_GET['playThis']))
{
	$playFile = $_GET['playThis'];
	echo "<br><br><br>$playFile<br>";

	echo '<audio controls autoplay preload="metadata" style=" width:300px;">';
	echo "<source src=$playFile type='audio/mpeg'>";
	echo 'Your browser does not support the audio element.';
	echo '</audio><br><br><br>';
}


echo '<br><br><br><br><br>';

// ##### READ DIR OF AUDIO FILES AND PRESENT FORM BUTTONS #####
echo '<form method="get" action=';
echo $_SERVER['PHP_SELF'];
echo '>';
if ($handle = opendir("$otherDir")) {
    while (false !== ($radioOther = readdir($handle))) {
        if ($radioOther != "." && $radioOther != "..") {
			$beginOther = '<input type="submit" name="playThis" value="other/';
			$endOther = '">';
			$finalOther = "$beginOther$radioOther$endOther";
			echo "$finalOther<br>";
        }
    }
    closedir($handle);
}
echo '</form>';

?>

