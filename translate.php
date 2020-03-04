<?php
$input = strtolower($_POST['input']);	//load input, change to lowercase
$result = "-";	//initialize empty value

if (!empty($input)) {
	$vowels = array("a", "e", "i", "o", "u");
	$silentWords = array();
	$justAddEy = false;		//determines, if input word needs cutting
	$addSuffix = "'way";
	$counter = 0;	
	$prefix = "";

	$file = fopen("silentWords.txt","r");	//load silent words from file, this is not pretty implementation, but as far as I know, there is not an easy way to determine when consonants are silent
	while(! feof($file))
	{
		$word = fgets($file, 4096);
		array_push($silentWords, $word);	//store into array
	}

	foreach($silentWords as $item){		//check usual words that starts with silent letter
		if (strcmp($item, $input) == 2) {
			$justAddEy = true;
		}
	}

	foreach($vowels as $char){	//check first char of input
		if ($char == $input[0]) {
			$justAddEy = true;
		}
	}

	if ($justAddEy) {
		$result = $input . $addSuffix;
	}else{
		$prefix = $input[0];
		for ($i=1; $i < strlen($input); $i++) { 
			foreach($vowels as $char){	//check first char of input
				if ($char == $input[$i]) {
					if ($input[$i] == "u" && $prefix == "q") {	//qu is exception 
						$prefix = $prefix . $input[$i];
						$i++;
					}
					$result = substr($input, $i) . "-" . $prefix . "ay";
					break 2;
				}
			}
			$prefix = $prefix . $input[$i];
		}
	}

	echo $result;	//print translated word
}else echo $result;
?>
