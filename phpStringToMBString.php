<?php
// Most of regEx help from https://stackoverflow.com/questions/51428365/php-regexp-to-search-replace-string-functions-to-mb-string-functions

// directories:
//	array of directories to run this script through. Relative to this file.
//
$directories = array("test");

// dry run:
// true: make subdirectory in each directory and put in rewrite results
// false: replace files content.
//
$dry_run = true;

$starttime = microtime(true);
foreach($directories as $directory){
	echo "Running directory: ".$directory."<br>\n";
	ifDirectoryExists(trim($directory),$dry_run);
}


function recursiveSearchForFiles($directory = "", $depth = 0, $dry_run){
	$files = scandir($directory);
	foreach($files as $file_name){
		if(mb_substr($file_name,0,1) == ".")continue; // ignore alle directories or files that starts with a "." 
		echo "|";
		for($i=0;$i<=$depth;$i++){
			echo "-";
		}
		if(is_dir($directory.DIRECTORY_SEPARATOR.$file_name)){
			echo "DIRECTORY: ".$file_name;
			recursiveSearchForFiles($directory.DIRECTORY_SEPARATOR.$file_name,$depth+1, $dry_run);
		} else {
			if(strtolower(substr($file_name,-4)) == ".php"){
				echo "PHPFILE: ".$file_name;
				searchReplaceFileContent($directory.DIRECTORY_SEPARATOR.$file_name, $dry_run);
			} else {
				echo "FILE: ".$file_name;
			}
		}
		echo "\n<br>";
	}
	echo "\n<br>";
}

function ifDirectoryExists($directory,$dry_run){
	if(is_dir($directory)){
		echo "DIRECTORY EXISTS: ".$directory."\n<br>";
		recursiveSearchForFiles($directory, 0, $dry_run);
	} else {
		echo "DIRECTORY NOT EXISTS: ".$directory."\n<br>";
	}
	echo "\n\n<hr>";
}

function searchReplaceFileContent($file,$dry_run){

	$filecontent = file_get_contents($file);
	$filecontent_tmp = $filecontent;
	// This is not a complete list of all mb functions.
	$array = array (	'strlen'=>'mb_strlen',
						'strpos'=>'mb_strpos',
						'substr'=>'mb_substr',
						'strtolower'=>'mb_strtolower',
						'strtoupper'=>'mb_strtoupper',
						'substr_count'=>'mb_substr_count',
						'split'=>'mb_split',
						'mail'=>'mb_send_mail',
						'ereg'=>'mb_ereg',
						'eregi'=>'mb_eregi',
						'strrchr' => 'mb_strrchr',
						'strichr' => 'mb_strichr',
						'strchr' => 'mb_strchr',
						'strrpos' => 'mb_strrpos',
						'strripos' => 'mb_strripos',
						'stripos' => 'mb_stripos',
						'stristr' => 'mb_stristr'
	);
	foreach($array as $function_name => $mb_function_name){
		$search_string = '/(^|[\s\[{;(:!\=\><?.,\*\/\-\+])(?<!->[\s])(?<!->)(?<!new )' . $function_name . '(?!\(\$phpStringToMBString)(?=\s?\()/i';
		$filecontent = preg_replace($search_string, "$1".$mb_function_name."$2$3", $filecontent,-1,$count);
	}
	// in each run we ignore directories that has a dot in front
	if($filecontent != $filecontent_tmp){
		if($dry_run){
			@mkdir(dirname($file).DIRECTORY_SEPARATOR.".mb_rewrite_result",0777,true); // @ to prevent warning if directory already exists
			$target_file =	dirname($file).DIRECTORY_SEPARATOR.".mb_rewrite_result".DIRECTORY_SEPARATOR.basename($file);
		} else {
			$target_file = $file;
		}
		echo " CHANGED";
		file_put_contents($target_file,$filecontent);
	}
}

echo "\n\nDone in ".round(microtime(true)-$starttime,3)." seconds";