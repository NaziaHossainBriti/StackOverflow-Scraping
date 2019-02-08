<!DOCTYPE html>
<!-- template source: https://www.free-css.com/free-css-templates -->
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">    
    <title>Stack Overflow Scrap Book | Home</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="assets/img/favicon.ico" type="image/x-icon">

    <!-- Font awesome -->
    <link href="assets/css/font-awesome.css" rel="stylesheet">
    <!-- Bootstrap -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">   
    <!-- Theme color -->
    <link id="switcher" href="assets/css/theme-color/default-theme.css" rel="stylesheet">          

    <!-- Main style sheet -->
    <link href="assets/css/style.css" rel="stylesheet">    

   
    <!-- Google Fonts -->
    <link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto:400,400italic,300,300italic,500,700' rel='stylesheet' type='text/css'>
    

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

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
          <!-- FOR MOBILE VIEW COLLAPSED BUTTON -->
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <!-- LOGO -->              
          <!-- TEXT BASED LOGO -->
          <a class="navbar-brand" href="index.html"><i class="fa fa-university"></i><span>Stack Overflow Scrap Book</span></a>
          <!-- IMG BASED LOGO  -->
          <!-- <a class="navbar-brand" href="index.html"><img src="assets/img/logo.png" alt="logo"></a> -->
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul id="top-menu" class="nav navbar-nav navbar-right main-nav">
            <li class="active"><a href="index.html">Home</a></li>  
          </ul>                     
        </div><!--/.nav-collapse -->        
      </div>     
    </nav>
  </section>
  <!-- End menu -->
  <!-- Start search box -->
  <div id="mu-search">
    <div class="mu-search-area">      
      <button class="mu-search-close"><span class="fa fa-close"></span></button>
      <div class="container">
        <div class="row">
          <div class="col-md-12">            
            <form class="mu-search-form">
              <input type="search" placeholder="Type Your Keyword(s) & Hit Enter">              
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- End search box -->
  <!-- Start Slider -->
  <section id="mu-slider">
    <!-- Start single slider item -->
	<form action="" method="post">
    <input name="fName" onfocus="this.value=''" id="fName" type="text" value="Search..." />
    <input type="submit" name="submit" value="submit!" />
	</form>
	<?php
		//$search_query = $_POST['fName'];
        if (isset($_POST['fName'])){ //if you also want to check if it is empty use !empty($_POST['fName'])
			//echo $_POST['fName'];
			$search_query_first = $_POST['fName'];
			//$search_query = str_replace(' ', '', $search_query_first);
			$search_query = ltrim($search_query_first);
		}
		else{
			$search_query = "android";
		}

	?>
    <!-- Start single slider item -->
    <!-- Start single slider item -->

    <!-- Start single slider item -->    
  </section>
  <!-- End Slider -->
  <!-- Start service  -->

  <!-- End service  -->

  <!-- Start about us -->
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
					foreach($tagged_html->find('div[class=grid-layout--cell tag-cell]') as $tag){
						$tag_name = $tag->find('.post-tag',0)->plaintext;
						//echo $tag_name;
						if($tag_name == $search_query){
						    $i++;
							break;
						}
					}
					if($i!=0){
						$html = file_get_html('https://stackoverflow.com/questions/tagged/'.$search_query.'?sort=newest&pageSize=50');
						$count=0;
						//source: https://stackoverflow.com/questions/28896635/php-simplehtmldom-how-to-get-value-from-div-by-class-name-inside-of-another-di
						foreach($html->find('div[class=summary]') as $element){
							if($count<10){
								$question_title = $element->find('.question-hyperlink',0)->plaintext;
								$question_link = $element->find('a',0)->href;
								$question_ago = $element->find('.user-action-time',0)->plaintext;
								echo '<li><a important!" target="blank" href="https://stackoverflow.com/'.$question_link.'">'.$question_title.'</a> ('.$question_ago.')</li>';
							}
							$count++;
						}
					}
					else{
						// $search_query_ran = str_replace(' ', '%20', $search_query);
						// $html = file_get_html('https://stackoverflow.com/search?tab=newest&q='.$search_query_ran);
						// echo $html;
						// $count=0;
						// //source: https://stackoverflow.com/questions/28896635/php-simplehtmldom-how-to-get-value-from-div-by-class-name-inside-of-another-di
						// foreach($html->find('div[class=unified-theme search-page]') as $element){
							// echo $element;
							// if($count<10){
								// $question_title = $html->find('.question-hyperlink',0)->plaintext;
								// $question_link = $html->find('a',0)->href;
								// echo '<li><a important!" target="blank" href="https://stackoverflow.com/'.$question_link.'">'.$question_title.'</a></li>';
							// }
							// $count++;
						// }
						?>
						<h4>This is not a tagged question.</h4>
						<?php
					}
					?>
				  </ul>
				  
				 </div>
              </div>
              <div class="col-lg-6 col-md-6">
                <div class="mu-about-us-left">                            
					<div class="mu-title">
                    <h3>Top 10 Voted Questions on <i>"<?php echo $search_query; ?>"</i></h3>                
					  </div>
					  <ul>
					  <!-- End Title -->
					  <?php
					
					//source: https://stackoverflow.com/questions/28896635/php-simplehtmldom-how-to-get-value-from-div-by-class-name-inside-of-another-di
						if($i!=0){
							$url = sprintf('https://stackoverflow.com/questions/tagged/'.$search_query.'?sort=votes');
							$html = file_get_html($url);
							$results = $html->find('#questions', 0)->innertext;
							//echo $results;
							$true = 1;
							$j=0;
							$questions_array1=array();
							 while($true){
								       $j++;
									   $html1 = file_get_html('https://stackoverflow.com/questions/tagged/android?sort=newest&page='.$j.'&pageSize=50');
									   //$count=0;
									 //source: https://stackoverflow.com/questions/28896635/php-simplehtmldom-how-to-get-value-from-div-by-class-name-inside-of-another-di
									  
									   //changes this in order to scrap the number of votes
									 foreach($html1->find('div[class=question-summary]') as $element){
												 //in order to find time of question
												  $time = $element->find('.relativetime',0)->getAttribute('title');      
												  // echo $time;
												  $year = substr($time, 0,4);
												  $month = substr($time, 5,2);
												  $day = substr($time, 8,2);
												  $q_time = $day.'/'.$month.'/'.$year; 
												  //in order to find time of question



												  $current_date = date('d/m/Y');
												  $diff = strtotime($q_time) - strtotime('-1 week');
												  if($diff>0){
													 $true=1;
												  }
												  else{
												     $true = 0;
												   break;
												  }
												 // here we are finding all questions that are of within the last week and inserting them to an array along with corresponding vote counts

												  $question_title = $element->find('.question-hyperlink',0)->plaintext;
												  $question_link = $element->find('a',0)->href;
												  $vote_count = $element->find('.vote-count-post',0)->plaintext;
												  $str = '<li><a target="blank" href="https://stackoverflow.com/'.$question_link.'">'.$question_title.'</a> (votes: '.$vote_count.')</li>';
												 

												  $questions_array1[$str] = $vote_count;
									// }
										}
							}
							 arsort($questions_array1);
							 $count=0;
							 foreach ($questions_array1 as $link => $votes) {
								 if($count<10)
									echo $link;
							  // Printing top 10 voted questions asked in the last week
								else
									break;							   
							   $count++;
							}
							
						}
						else{
							?>
							<h4>This is not a tagged question.</h4>
							<?php
						}
					  ?>
					  </ul>
					  </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- End about us -->

  <!-- Start about us counter -->

  <!-- End about us counter -->

  <!-- Start features section -->
  
  <!-- End features section -->

  <!-- Start latest course section -->
 
  <!-- End latest course section -->

  <!-- Start our teacher -->
  
  <!-- End our teacher -->

  <!-- Start testimonial -->
    <!-- End testimonial -->

  <!-- Start from blog -->
  
  <!-- End from blog -->

  <!-- Start footer -->
  <footer id="mu-footer">
    <!-- start footer top -->
    
    <!-- end footer top -->
    <!-- start footer bottom -->
    <div class="mu-footer-bottom">
      <div class="container">
        <div class="mu-footer-bottom-area">
          <p>&copy; Designed by <a href="https://sites.google.com/site/naziahossaincse" rel="nofollow">Nazia Hossain</a></p>
        </div>
      </div>
    </div>
    <!-- end footer bottom -->
  </footer>
  <!-- End footer -->
  
  <!-- jQuery library -->
  <script src="assets/js/jquery.min.js"></script>  
  <!-- Include all compiled plugins (below), or include individual files as needed -->
  <script src="assets/js/bootstrap.js"></script>   
  <!-- Slick slider -->
  <script type="text/javascript" src="assets/js/slick.js"></script>
  <!-- Counter -->
  <script type="text/javascript" src="assets/js/waypoints.js"></script>
  <script type="text/javascript" src="assets/js/jquery.counterup.js"></script>  
  <!-- Mixit slider -->
  <script type="text/javascript" src="assets/js/jquery.mixitup.js"></script>
  <!-- Add fancyBox -->        
  <script type="text/javascript" src="assets/js/jquery.fancybox.pack.js"></script>
  
  
  <!-- Custom js -->
  <script src="assets/js/custom.js"></script> 

  </body>
</html>