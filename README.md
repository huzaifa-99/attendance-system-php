# Basic-Attendance-System-PHP

This is my first project on web development based on core PHP and MySQL. It has an interface for a user and one for an admin, both interfaces have their respective features.

# Tecnologies

  * PHP-7
  * Bootstrap-4
  * HTML
  * CSS
  * MySQL

# Interface

The first page “index.php” will be featuring two options namely user and admin panel.

### User Panel

The user panel will take you to user login or registration if you don’t have an account yet. After login the user will be redirected to user_services.php page which will show the services available to the user.
Features For User

The user can

  * Register themselves with their personal info and profile picture.
  * Login with their email and password which will log them into the system with their profile picture.
  * Mark his/her attendance as present.
  * He/she can take a leave if not present today.
  * View all the previous attendance.
  * Change registration profile info as well as his/her profile picture.
  * Lastly a logout button is present to end the session of the user when clicked.

### Admin Panel

The admin panel will take you to admin login page After login the admin will be shown a list of features available only for the system admins.
Features For Admin

The admin can

  * Login with their email and password which will take them to their services panel.
  * See All the users that are logged into the system at any given time.
  * Update any attendance record which includes edit, add and delete modules.
  * Generate attendance report of a specific student/user from/to dates.
  * Approve leave of the users if any leave message is to be approved.
  * Generate attendance report of the full system from/to dates.
  * Allocate grades to users/students based on their attendance for example attendance>25 days (Grade A).

# Project Installation

  * Firstly ,a localhost must be present to run the project. For me I used XAMPP Localhost.
  * After the localhost connection has been established the code folder must be placed into the htdocs folder ( a subfolder in the main XAMPP installation directory folder).
  * Database (in database folder) must be imported into MySQL for the code to function properly, Database username and password are the default onez for Xampp.
  * To run the project type the link http://localhost[:PORT_NO_IF_ANY]/ [the name of the project folder]/ into the URL bar of the browser, which will take you to the index.php page. The process after that is already explained above.

# Project Demo

A demo video is available on [https://youtu.be/UdnHagWTQss]. Previews are also available on this repo in Previews Folder
# More Info

The project was created 11-12 months before today(25/8/2020) on PHP-7.0 version, i had no clue about Github at that time so did'nt uploaded back then, the project does have some bugs which i did not fix. The main aim of this project was for me to understand the Web-Dev Environment and Core PHP development.
