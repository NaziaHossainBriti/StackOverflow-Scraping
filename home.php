<!DOCTYPE html>
<html>
	<head>
		<title>StackOverflow Scraping</title>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
		<script src="js/scripts.js"></script>
	</head>
<body>

<p id="demo">Click the button to display an alert box.</p>
<h1>Latest 10 Android Related Questions</h1>

<?php
//http://simplehtmldom.sourceforge.net/

require 'simplehtmldom_1_8_1\simple_html_dom.php';

// Create DOM from URL or file
$html = file_get_html('https://stackoverflow.com/questions/tagged/android?sort=newest&pageSize=10');

// Find all images 
foreach($html->find('img') as $element) 
       //echo $element->src . '<br>';

// Find all links 
foreach($html->find('a') as $element) 
       //echo $element->href . '<br>';
	   // Dump contents (without tags) from HTML
//echo file_get_html('http://www.google.com/')->plaintext; 
$count=0;
//https://stackoverflow.com/questions/28896635/php-simplehtmldom-how-to-get-value-from-div-by-class-name-inside-of-another-di
foreach($html->find('div[class=summary]') as $element){
	if($count<10){
		$question_title = $element->find('.question-hyperlink',0)->plaintext;
		$question_link = $element->find('a',0)->href;
		//echo $question_title. '<br>';
		//echo $question_link. '<br>';
		echo '<a href="https://stackoverflow.com/'.$question_link.'">'.$question_title.'</a><br>';
	}
	$count++;
}
?>
<h1>Top 10 Voted Android Related Questions</h1>

<?php
//http://simplehtmldom.sourceforge.net/

//require 'simplehtmldom_1_8_1\simple_html_dom.php';

// Create DOM from URL or file
$html1 = file_get_html('https://stackoverflow.com/questions/tagged/android?sort=votes&newest&pageSize=10');
$pattern = "|(?<=<span class=\"community-wiki\">)(.*?)(?=<\/span>)|";
$replace = 'empty';
foreach($html1->find('span[class*="question-hyperlink community-wiki"]') as $e)
	$e->class = '';
	
	//echo $html1;
       //echo $element->href . '<br>';
	   // Dump contents (without tags) from HTML
//echo file_get_html('http://www.google.com/')->plaintext; 
$count=0;
//https://stackoverflow.com/questions/28896635/php-simplehtmldom-how-to-get-value-from-div-by-class-name-inside-of-another-di
foreach($html1->find('div[class=summary]') as $element){
	//echo $element;
	if($count<10){
		$question_time = $element->find('.relativetime',0)->title;
		
		//echo 'post time'.strtotime($question_time).'<br>';
		//echo '7 days ago'.strtotime('-7 day').'<br>';
		echo '<br><br>';
		//if($count<10){
			if( strtotime($question_time) > strtotime('-7 day') ) {				
				$question_title = $element->find('.question-hyperlink',0)->plaintext;
				$question_link = $element->find('a',0)->href;
				//echo $question_title. '<br>';
				//echo $question_link. '<br>';
				//echo $question_time. '<br>';
				echo '<a href="https://stackoverflow.com/'.$question_link.'">'.$question_title.'</a><br>';
			}
		//}
	}
	$count++;
}
?>

</body>
</html>