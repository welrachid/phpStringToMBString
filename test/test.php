<?php
// Testfile that should be 
function astrtoupper(){}
function bstrtolower(){}
function csubstr(){}
function mailafsendelse($var){}
function send_mail(){}
class order {function mail($phpStringToMBString){}} // This should be NOT be changed because first argument is $phpStringToMBString. Done using (?!\(\$phpStringToMBString)
class Mail {}
$order = new Order();

print strtoupper('test');
print strtolower('test');
print substr('test',0,1);

print astrtoupper('test');
print bstrtolower('test');
print csubstr('tester',0,1);
$variable = array("t" => "d");
print $variable[substr('tester',0,1)];
if(true == false){substr('tester',0,1);}
	substr('test',0,1);
substr('test',0,1);
	(substr('test',0,1));
	!substr("test",0,1);
	array("a" >= strlen(1));
	if(substr("test",0,1)==substr("test",0,1)){}
	if(substr("test",0,1)<substr("test",0,1)){
		(false)?substr('test'):"";
	}
	"test".substr("test",0,1);
	'asd'.substr("test",0,1);
	'asd'.substr("test",0,1);
	substr( substr('asdsadsadasd',0,-1),strlen("1"),strlen("100"));
	substr (substr ('Asdsadsadasd',0,-1), strlen("1"),	strlen("100"));
	substr(substr(substr('Asdsadsadasd',0,-1),0,-1), strlen("1"),	strlen("100"));
	mailafsendelse(substr('asdsadsadasd',0,-1), strlen("1"),	strlen("100"));
	send_mail("test");
	substr ( "test",0,1 );
	substr ( "test",0,1 );
	//
	// This is not valid syntax, but we want it only to replace the LAST one
	// mail mail mail mail ( tester );
	// substr substr substr substr ( tester );
	//
	$order->mail (''); // i had to do a (?<!->[\s])(?<!->) to make both these not get rewritten
	$order -> mail (''); // i had to do a (?<!->[\s])(?<!->) to make both these not get rewritten
	new Mail();
	new mail ();
	print strlen ( "test" )*strlen ( "test" )+strlen ( "test" )/strlen ( "test" )-strlen ( "test" );

;