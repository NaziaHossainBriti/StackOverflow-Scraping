# StackOverflow-Scraping
This target website is to Extract 10 newest posts from stackoverflow.com of Android-related questions, as well as the 10 most voted Android-related questions posted in the past week.

This is a '.php' based web application which contains one page. By default this application will search for "android" on "www.stackoverflow.com" and show the "10 newest posts", "10 most voted question in the past week" as well as "10 most answered questions in top 50 voted questions" on the same topic. From the text box user can search other tags from stackoverflow.

How to Start:
1. We need apache server to run this application. Here "xampp v.3.22" has been used for apache. After installing xampp, there will be a folder in the installation folder (e.g. C:\xampp\htdocs). In the "htdocs" folder, we have to keep the project file and so the link will be "C:\xampp\htdocs\stackoverflow".
2. After installing xampp, we need to start apache server.
3. Then in the url bar of our browser, type "http://localhost/stackoverflow/home.php" and the application will start.

Features:
1. Extract clickable titles of 10 newest posts of any tags (default: android) with the asking time. After clicking on any title, this will go to the full thread of that question-answer in stackoverflow website.
2. Extract clickable titles of 10 most voted question in the past week of any tags (default: android) with the number of votes. After clicking on any title, this will go to the full thread of that question-answer in stackoverflow website.
3. New feature: Extract clickable titles of 10 most answered questions in top 50 voted questions of any tags (default: android) with number of answers. After clicking on any title, this will go to the full thread of that question-answer in stackoverflow website.
4. New feature: Extract top 10 questions with most links in the order of high reputation score with the asker name. After clicking on any title, this will go to the full thread of that question-answer in stackoverflow website.

Note:
This application is based on scraping the stackoverflow website. Here, "simplehtmldom_1_8_1.php" has been used for extracting html code from another website. While scraping, it takes time to load the page. 
In future, regular expression can be used for scraping as this will be more generic for other websites also.

