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

print mb_strtoupper('test');
print mb_strtolower('test');
print mb_substr('test',0,1);

print astrtoupper('test');
print bstrtolower('test');
print csubstr('tester',0,1);
$variable = array("t" => "d");
print $variable[mb_substr('tester',0,1)];
if(true == false){mb_substr('tester',0,1);}
	mb_substr('test',0,1);
mb_substr('test',0,1);
	(mb_substr('test',0,1));
	!mb_substr("test",0,1);
	array("a" >= mb_strlen(1));
	if(mb_substr("test",0,1)==mb_substr("test",0,1)){}
	if(mb_substr("test",0,1)<mb_substr("test",0,1)){
		(false)?mb_substr('test'):"";
	}
	"test".mb_substr("test",0,1);
	'asd'.mb_substr("test",0,1);
	'asd'.mb_substr("test",0,1);
	mb_substr( mb_substr('asdsadsadasd',0,-1),mb_strlen("1"),mb_strlen("100"));
	mb_substr (mb_substr ('Asdsadsadasd',0,-1), mb_strlen("1"),	mb_strlen("100"));
	mb_substr(mb_substr(mb_substr('Asdsadsadasd',0,-1),0,-1), mb_strlen("1"),	mb_strlen("100"));
	mailafsendelse(mb_substr('asdsadsadasd',0,-1), mb_strlen("1"),	mb_strlen("100"));
	send_mail("test");
	mb_substr ( "test",0,1 );
	mb_substr ( "test",0,1 );
	//
	// This is not valid syntax, but we want it only to replace the LAST one
	// mail mail mail mb_send_mail ( tester );
	// substr substr substr mb_substr ( tester );
	//
	$order->mail (''); // i had to do a (?<!->[\s])(?<!->) to make both these not get rewritten
	$order -> mail (''); // i had to do a (?<!->[\s])(?<!->) to make both these not get rewritten
	new Mail();
	new mail ();
	print mb_strlen ( "test" )*mb_strlen ( "test" )+mb_strlen ( "test" )/mb_strlen ( "test" )-mb_strlen ( "test" );

;