<?php

/**
 * Add a contact to the DB
 *
 * Will return TRUE if the contact was saved
 *
 * @param  string $reciever
 * @param  string $subject
 * @param  string $content
 * @return boolean
 */

function add_response($reciever,$subject, $content){

	$dbh = getDbConnection();
	$sql = 	"INSERT INTO contacts (reciever, subject, content) VALUES (?,?,?)";
    $stmt = $dbh->prepare($sql);
	if ($stmt->execute(array($reciever,$subject, $content))){
		return true;
	}
	else{
		return false;
	}

   $content = mysql_real_escape_string($_POST['textarea_name']);
}



?>