<?php
$input = strtolower($_POST['input']);	//load input, change to lowercase
$result = "-";	//initialize empty value

if (!empty($input)) {
	$vowels = array("a", "e", "i", "o", "u");
	$silentWords = array();
	$justAddEy = false;		//determines, if input word needs cutting
	$suffix = "ay";		

	$file = fopen("silentWords.txt","r");	//load silent words from file
	while(! feof($file))
	{
		$word = fgets($file, 4096);
		array_push($silentWords, $word);	//store into array
	}

	foreach($silentWords as $item){		//check usual words that starts with silent letter
		if (strcmp($item, $input)) {
			$justAddEy = true;
		}
	}

	foreach($vowels as $char){	//check first char of input
		if ($char == $input[0]) {
			$justAddEy = true;
		}
	}

	if ($justAddEy) {
		$result = $input . $suffix;
	}

	echo $result;	//print translated word
}else echo $result;
?>
