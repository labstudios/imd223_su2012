<?php
	/*$haveIndex = isset($_GET['index']);
	$isEmpty = empty($_GET['index']);
	var_dump($haveIndex);
	echo "<br />";
	var_dump($isEmpty);*/
	
	if(!empty($_GET['index']))
	{
		switch($_GET['index'])
		{
			case "about":
				?><p>This is about our stuff.</p><?php
			break;
			case "contact":
				?><p>This is where our contact form would go if we had one.</p><?php
			break;
			case "media":
				?><p>Our pictures are lovely.</p><?php
			break;
			case "portfolio":
				?><p>Here is my portfolio.</p><?php
			break;
			case "home":
			default:
				?><p>This is my lovely home page.</p><?php
			break;
		}
	}
	else
	{
		echo "Please give me an index.";
	}
?>





