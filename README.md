# Empower Self Defense Website
This website was created by Hannah Thompson and Sarah Piekarski as the final project of CS 4640. It includes login and account creation, self defense content in the forms of videos and curriculum, and the ability to post and read user testimonials.

## Login Implementation
<img src="/login.png" width="400"> <img src="/newAccount.png" width="400">

Login and account creation was implemented in php, utilizing XAMPP and phpMyAdmin to place and draw from login information in our mySQL database. Error messaging was implented using Angular. Once a user was properly logged in a session key was created to keep them logged in and a POST request would send them to the home page. A user could end their session with the logout button.

## Home Page
<img src="/home.png" width="400">

In the home page you can see our overall design implementation. Using html, bootstrap, and custom CSS to create our layout and menu.

## Videos
<img src="/videos.png" width="400"> <img src="/focusVideo.png" width="400">

The video pages pull from an XML file with all of the youtube links to our self defense videos, and also feature breadcrumbs to help user better navigate the site.

## Curriculum
<img src="/curriculum.png" width="400"> <img src="/focusCurriculum.png" width="400">

The curriculum pages also oull from an XML and links to the video pages for easier data discovery.

## Testimonials
<img src="/testimonials.png" width="400"> <img src="/writeTestimonial.png" width="400"> <img src="/errorMessaging.png" width="400">

Testimonials were stored and pulled from a mySQL database using phpMyAdmin through XAMPP. Users are able to write their own testimonials, read those of others, and delete and edit their own testimonials as desired.
