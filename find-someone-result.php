<?php

	$path=$_SERVER['SCRIPT_FILENAME'];

	for ($i=0; $i<4; $i++)
		$path=dirname($path);

	$wpLoadPath=$path."/wp-load.php";

	require_once $wpLoadPath;

	echo "<h1>Users</h1>";

	$queryarg="%".$_REQUEST["q"]."%";

	$query=$wpdb->prepare(
		"SELECT * ".
		"FROM   wp_users ".
		"WHERE  display_name LIKE %s",
		$queryarg
	);

	$users=$wpdb->get_results($query);

	foreach ($users as $user) {
		$s="";
		$s.="<div class='find-someone-result-entry'>";
		$s.=get_avatar($user->ID);
		$s.=" <div class='find-someone-result-name'>";
		$s.="  <a href='".get_author_posts_url($user->ID)."'>".$user->display_name."</a>";
		$s.=" </div>";
		$s.=" <div class='find-someone-result-info'>";
		$s.="  ".date("F Y",strtotime($user->user_registered));
		$s.=" </div>";
		$s.="</div>\n";

		echo $s; //$user->display_name."<br/>";
	}
