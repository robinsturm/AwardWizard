<?php
	include_once 'connect.php';
	$connection = connect();
	mysql_select_db('awardwiz_main');
	$term = $_GET['search'];
    $result = mysql_query("SELECT * FROM Honor JOIN Works ON Honor.WorkID = Works.WorkID WHERE AwardName LIKE '%$term%'");
	if (!$result) {
		die('Could not query:' . mysql_error());
	}
	$resultArray = array();
	while ($row = mysql_fetch_array($result)) {
		$resultArray[] = $row;
	}
	$shows = $resultArray;
        mysql_close($connection);
	echo json_encode($shows);
	
?>