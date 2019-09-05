What does this application do?

This is similar to internshala portal but on a much smaller scale.
An employer can register and post internship offers and then see the application received for all the internships posted.
A student can register and see all the internships posted. Then he/she can apply to any internship. The student can also see if the applications is selected or rejected.

Note: This application stores cookies in the clients browser. A very basic Caesar cipher has been used to encrypt the user id cookie for safety.

**Purpose of each file:**

  

 1. db.php -> for establishing mysql database connection.
 2. email_checker.php -> for checking if a email is already used or not.
 3. employer_dashboard.php -> to display the internship applications received and to select or reject an application.
 4. footer.php -> contains the ending body and html tag and the footer bar with the social links.
 5. header.php -> contains starting html tag and all the necessary CDN imports of Bootstrap CSS, jQuery and other required JS files of bootstrap.
 6. index.php -> the main landing page.Anyone can see the internships listed here.
 7. internship_add_handler.php -> this file add the internship to the database after the form is submitted.
 8. internship_add.php -> this is the form where a new internship details are submitted.
 9. internship_application_handler.php -> when a student applies then, this file processes the request and updates the database.
 10.  internship_selection_handler.php -> when an employer selects/rejects an application then, this file processes the request and updates the database.
 11.  internship.php -> this files shows the internship in details. The intership id is passed as a query to this page.
 12. login_handler.php -> this file handles the authentication of a user/employer login and then stores the cookies.
 13. login.php -> this file takes the email and password through a form for login.
 14. logout.php -> this file deletes the cookies.
 15. student_dashboard.php -> from here the students can see the internships applied to and see if selected or rejected.
 16. user_register_handler.php -> this file is called when a new user has registered. It processes, saves the data in database and stores the cookies.
 17. user_register.php -> this file takes the name,email and password through a form for registration.

  
**Demo Details:**

*Student->*

name: John Doe

email: john@abcd.com

password: abcd

*Employer->*

name: Jony Pvt. Ltd.

email: jony@abcd.com

password: abcd
