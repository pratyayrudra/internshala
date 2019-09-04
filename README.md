Purpose of each file:

db.php -> for establishing mysql database connection.
email_checker.php -> for checking if a email is already used or not.
employer_dashboard.php -> to display the internship applications received and to select or reject an application.
footer.php -> contains the ending body and html tag and the footer bar with the social links.
header.php -> contains starting html tag and all the necessary CDN imports of Bootstrap CSS, jQuery and other required JS files of bootstrap.
index.php -> the main landing page.Anyone can see the internships listed here.
internship_add_handler.php -> this file add the internship to the database after the form is submitted.
internship_add.php -> this is the form where a new internship details are submitted.
internship_application_handler.php -> when a student applies then, this file processes the request and updates the database.
internship_selection_handler.php -> when an employer selects/rejects an application then, this file processes the request and updates the database.
internship.php -> this files shows the internship in details. The intership id is passed as a query to this page.
login_handler.php -> this file handles the authentication of a user/employer login and then stores the cookies.
login.php -> this file takes the email and password through a form for login.
logout.php -> this file deletes the cookies.
student_dashboard.php -> from here the students can see the internships applied to and see if selected or rejected.
user_register_handler.php -> this file is called when a new user has registered. It processes, saves the data in database and stores the cookies.
user_register.php -> this file takes the name,email and password through a form for registration.


Demo Details:

Student->

name: John Doe
email: john@abcd.com
password: abcd

Employer->

name: Johnny Pvt. Ltd.
email: jonny@abcd.com
password: abcd