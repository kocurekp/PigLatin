<?php
$input = strtolower($_POST['input']);	//load input, change to lowercase
$output = "";	//initialize empty value


function LoadSilentWords(&$silentWords){
	$file = fopen("silentWords.txt","r");	//load silent words from file, there is not an easy way to determine when consonants are silent
	while(! feof($file))
	{
		$word = fgets($file, 4096);
		array_push($silentWords, $word);	//store into array
	}
}

function CheckFirstChar(&$silentWords, &$vowels, $input){
	foreach($silentWords as $item){		//check usual words that starts with silent letter
		if (strcmp($item, $input) == 2) {
			return true;
		}
	}

	foreach($vowels as $char){	//check first char of input
		if ($char == $input[0]) {
			return true;
		}
	}
	return false;
}


// print_r($space);

if (!empty($input)) {

	$multipleInput = explode(" ", $input);
	// echo(count($multipleInput));
	foreach($multipleInput as $input){

		// echo $input;

		$silentWords = array();
		$vowels = array("a", "e", "i", "o", "u");
		$hasVowel = false;
		$suffix = "'way";
		$counter = 0;	
		$prefix = "";

		LoadSilentWords($silentWords);
		if (CheckFirstChar($silentWords, $vowels, $input)) { //determines, if input word needs cutting
			$result = $input . $suffix;
		}else{
			$prefix = $input[0];
			for ($i=1; $i < strlen($input); $i++) { 
				foreach($vowels as $char){	//check first char of input
					if ($char == $input[$i]) {
						$hasVowel = true;
						if ($input[$i] == "u" && $prefix == "q") {	//qu is exception 
							$prefix = $prefix . $input[$i];
							$i++;
						}
						$result = substr($input, $i) . "-" . $prefix . "ay";
						break 2;
					}
				}
				if (!$hasVowel) {
					$result = $input . $suffix;
				}
				$prefix = $prefix . $input[$i];
			}
		}
		$output = $output . " " . $result;
	}
}
	echo $output;	//print translated word
	?>
