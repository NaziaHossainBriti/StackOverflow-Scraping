<!DOCTYPE html>
<!-- template source: https://www.free-css.com/free-css-templates -->
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">    
    <title>Stack Overflow Scrap Book | Home</title>

    <link rel="shortcut icon" href="assets/img/favicon.ico" type="image/x-icon">

    <link href="assets/css/bootstrap.css" rel="stylesheet">             

    <link href="assets/css/style.css" rel="stylesheet">    
   
  </head>
  <body> 

  <!--START SCROLL TOP BUTTON -->
    <a class="scrollToTop" href="#">
      <i class="fa fa-angle-up"></i>      
    </a>
  <!-- END SCROLL TOP BUTTON -->

  <!-- Start header  -->
  <header id="mu-header">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 col-md-12">

        </div>
      </div>
    </div>
  </header>
  <!-- End header  -->
  <!-- Start menu -->
  <section id="mu-menu">
    <nav class="navbar navbar-default" role="navigation">  
      <div class="container">
        <div class="navbar-header">
            
          <!-- TEXT BASED LOGO -->
          <a class="navbar-brand" href="home.php"><i class="fa fa-university"></i><span>Stack Overflow Scrap Book</span></a>
          <!-- IMG BASED LOGO  -->
          <!-- <a class="navbar-brand" href="index.html"><img src="assets/img/logo.png" alt="logo"></a> -->
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul id="top-menu" class="nav navbar-nav navbar-right main-nav">
            <li class="active"><a href="home.php">Home</a></li>  
          </ul>                     
        </div><!--/.nav-collapse -->        
      </div>     
    </nav>
  </section>
  <!-- End menu -->

  <!-- Start Search Area -->
  <div class="mu-about-us-area">
              <div class="row">
              <div class="col-lg-6 col-md-6">
                <div class="mu-about-us-left">
    <!-- Start single slider item -->
	<form action="" method="post">
    <input name="fName" onfocus="this.value=''" id="fName" type="text" value="Search Tags..." />
    <input type="submit" name="submit" value="submit!" />
	</form>
	<?php
	//to enter the search topic in the search box
        if (isset($_POST['fName'])){ 
			$search_query_first = $_POST['fName'];
			$search_query = ltrim($search_query_first);
		}
		else{
			$search_query = "android";
		}

	?>
  </div>
  </div>
  </div>
  </div>
<!-- end search area -->
<!-- Section to get Newest 10 Questions-->
  <section id="mu-about-us">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="mu-about-us-area">           
            <div class="row">
              <div class="col-lg-6 col-md-6">
                <div class="mu-about-us-left">
                  <!-- Start Title -->
                  <div class="mu-title">
                    <h3>Newest 10 Questions on <i>"<?php echo $search_query; ?>"</i></h3>              
                  </div>
				  
                  <!-- End Title -->
				  <ul>
				  <?php
					require 'simplehtmldom_1_8_1\simple_html_dom.php';
					$tagged_html=file_get_html('https://stackoverflow.com/tags');
					$i=0;
					//check if the searching topic is tagged one or not
					foreach($tagged_html->find('div[class=grid-layout--cell tag-cell]') as $tag){
						$tag_name = $tag->find('.post-tag',0)->plaintext;
							if($tag_name == $search_query){
						    $i++;
							break;
						}
					}
					if($i!=0){ //when the topic is tagged
						$html = file_get_html('https://stackoverflow.com/questions/tagged/'.$search_query.'?sort=newest&pageSize=50');
						$count=0;
						//source: https://stackoverflow.com/questions/28896635/php-simplehtmldom-how-to-get-value-from-div-by-class-name-inside-of-another-di
						foreach($html->find('div[class=summary]') as $element){
							if($count<10){
								$question_title = $element->find('.question-hyperlink',0)->plaintext;
								$question_link = $element->find('a',0)->href;
								$question_ago = $element->find('.user-action-time',0)->plaintext;
								echo '<li><a important!" target="blank" href="https://stackoverflow.com'.$question_link.'">'.$question_title.'</a> ('.$question_ago.')</li>';
							}
							$count++;
						}
					}
					else{ //when the topic is not tagged
						 //contribution needed here in future
						?>
						<h4>This is not a tagged question.</h4>
						<?php
					}
					?>
				  </ul>
				  
				 </div>
              </div>
		<!-- end Section to get Newest 10 Questions -->
		<!-- Section to get top 10 voted Questions in the past week-->	
              <div class="col-lg-6 col-md-6">
                <div class="mu-about-us-left">                            
					<div class="mu-title">
                    <h3>Top 10 Voted Questions on <i>"<?php echo $search_query; ?>"</i> in the Past Week</h3>                
					</div>
					  <ul>
					  <!-- End Title -->
					  <?php
					
					//source: https://stackoverflow.com/questions/28896635/php-simplehtmldom-how-to-get-value-from-div-by-class-name-inside-of-another-di
						if($i!=0){//when the topic is tagged
							$true = 1;
							$j=0;
							$questions_array1=array();
							while($true){ 
							    //this while loop is for checking all the questions of all pages (newest to oldest) to find the most voted question title with corresponding time
								$j++;
								$html1 = file_get_html('https://stackoverflow.com/questions/tagged/android?sort=newest&page='.$j.'&pageSize=50');
								//source: https://stackoverflow.com/questions/28896635/php-simplehtmldom-how-to-get-value-from-div-by-class-name-inside-of-another-di
									  
								foreach($html1->find('div[class=question-summary]') as $element){
									//in order to find time of question
									$time = $element->find('.relativetime',0)->getAttribute('title'); 
									$year = substr($time, 0,4);
									$month = substr($time, 5,2);
									$day = substr($time, 8,2);
									$q_time = $day.'/'.$month.'/'.$year; 

									$current_date = date('d/m/Y');
									$diff = strtotime($q_time) - strtotime('-1 week');
									if($diff>0){ //within 1 week, so continuing the true value as 1
										$true=1;
									}
									else{ //more than one week, so, setting the true value as 0
										$true = 0;
										break;
									}
									
									//here is to find all questions those are within the last week and inserting them to an array along with corresponding vote counts
									$question_title = $element->find('.question-hyperlink',0)->plaintext;
									$question_link = $element->find('a',0)->href;
									$vote_count = $element->find('.vote-count-post',0)->plaintext;
									$str = '<li><a target="blank" href="https://stackoverflow.com'.$question_link.'">'.$question_title.'</a> (votes: '.$vote_count.')</li>';
													 
									$questions_array1[$str] = (int)$vote_count;
								} //end of foreach
							}//end of while
							arsort($questions_array1);
							$count=0;
							foreach ($questions_array1 as $link => $votes) {
							if($count<10)
								echo $link; // Printing top 10 voted questions asked in the last week
						    else
							    break;							   
							    $count++;
							}
							
						}
						else{//topic no tagged
							//contribution needed here in future
							?>
							<h4>This is not a tagged question.</h4>
							<?php
						}
					  ?>
					  </ul>
					  </div>
              </div>
		<!-- end Section to get top 10 voted Questions in the past week -->
		<!-- Section Top 10 Most Answered Questions, among top 50 Voted Questions on -->
			  <div class="col-lg-6 col-md-6">
                <div class="mu-about-us-left">                            
					<div class="mu-title">
                    <h3>Top 10 Most Answered Questions, among top 50 Voted Questions on <i>"<?php echo $search_query; ?>"</i></h3>                
					</div>
					  <ul>
					  <?php
					  		$questions_array1=array();
							$html1 = file_get_html('https://stackoverflow.com/questions/tagged/'.$search_query.'?sort=votes&pageSize=50');
							//source: https://stackoverflow.com/questions/28896635/php-simplehtmldom-how-to-get-value-from-div-by-class-name-inside-of-another-di
									  
							foreach($html1->find('div[class=question-summary]') as $element){
								$question_title = $element->find('.question-hyperlink',0)->plaintext;
								$question_link = $element->find('a',0)->href;
								$answer_accepted = $element->find('.status',0)->plaintext;
								$str = '<li><a target="blank" href="https://stackoverflow.com'.$question_link.'">'.$question_title.'</a> ('.$answer_accepted.')</li>';
								$questions_array1[$str] = (int)$answer_accepted;
							}
							arsort($questions_array1);
							$count=0;
							foreach ($questions_array1 as $link => $answer) {
							    if($count<10)
									echo $link;
							    // Printing top 10 voted questions asked in the last week
								else
									break;							   
							    $count++;
							}
					  ?>
					  </ul>
				</div>
			  </div>
			  
		<!-- end Section Top 10 Most Answered Questions, among top 50 Voted Questions on -->
		<!-- Section Start of 10 Questions with most links-->
		<div class="col-lg-6 col-md-6">
			<div class="mu-about-us-left">                            
			<div class="mu-title">
			<h3>Top 10 Mostly used Links of Question (Frequent) on <i>"<?php echo $search_query; ?>"</i></h3>                
			</div>
			  <ul>
		<?php
			$html1 = file_get_html('https://stackoverflow.com/questions/tagged/'.$search_query.'?sort=frequent&pageSize=50');
			//source: https://stackoverflow.com/questions/28896635/php-simplehtmldom-how-to-get-value-from-div-by-class-name-inside-of-another-di
			$count=0;		  
			foreach($html1->find('div[class=question-summary]') as $element){
				if($count<10){
					$score_info = $element->find('.user-details',0)->plaintext;
					$score_info = preg_replace('!\s+!', ' ', $score_info);
					$asker = explode(' ',$score_info);
					$question_title = $element->find('.question-hyperlink',0)->plaintext;
					$question_link = $element->find('a',0)->href; 
					$str = '<li><a target="blank" href="https://stackoverflow.com/'.$question_link.'">'.$question_title.'</a> (Asked '.$asker[0].')</li>';
					
					echo $str;
				}
				$count++;
			}
		?>
			</ul>
			</div>
		</div>
		<!-- Section end of 10 Questions with most links-->
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  
  <footer id="mu-footer">
    <!-- start footer bottom -->
    <div class="mu-footer-bottom">
      <div class="container">
        <div class="mu-footer-bottom-area">
          <p>&copy; Developed by <a href="https://sites.google.com/site/naziahossaincse" rel="nofollow">Nazia Hossain</a></p>
        </div>
      </div>
    </div>
    <!-- end footer bottom -->
  </footer>
  <!-- End footer -->
  
  <!-- jQuery library -->
  <script src="assets/js/jquery.min.js"></script>  
  <script type="text/javascript" src="assets/js/jquery.counterup.js"></script> 

  </body>
</html>