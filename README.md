# StackOverflow-Scraping
This target website is to Extract 10 newest posts from stackoverflow.com of Android-related questions, as well as the 10 most voted Android-related questions posted in the past week.

This is a '.php' based web application contains one page. By default this application will search for "android" on "www.stackoverflow.com" and show the "10 newest posts", "10 most voted question in the past week" and "10 most answered questions in top 50 voted answer" on the same topic. From the text box user can search other tags from stackoverflow.

How to setup:
1. We need apache server to run this application. Here "xampp v.3.22" has been used for apache.
2. After installing xampp, we need to start apache server.
3. Then in the url bar of our browser, type "http://localhost/stackoverflow/home.php" and the application will start.

Disclaimer:
This application is based on scraping the stackoverflow website. I have used "simplehtmldom_1_8_1" for extracting html code from another website. While scraping, it takes time to load the page. In future, I will use regular expression for scraping as this will be more generic for other websites also.

