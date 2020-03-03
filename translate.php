<?php
$input = strtolower($_POST['input']);	//load input, change to lowercase

if (!empty($input)) {
	$vowels = array("a", "e", "i", "o", "u");
	$silentCons = array("p", "k", "h", "g", "w"); //phone, knife, honest, gnome, whole
	$validChars = array_merge($vowels, $silentCons);
	$justAddEy = false;		//determines, if input word needs cutting
	$suffix = "ay";		
	$result = "-";	//initialize empty value

	foreach($validChars as $char){	//check first char of input
		if ($char == $input[0]) {
			$justAddEy = true;
		}
	}

	if ($justAddEy) {
		$result = $input . $suffix;
	}

	echo $result;	//print translated word
}else echo "-";
?>
