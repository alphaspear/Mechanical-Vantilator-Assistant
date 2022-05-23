########To Run
create a new database named "quiz" and then import the quiz.sql file

enter your database login info in  database.php as follows:-
	<?php
		$con= new mysqli('localhost','username','password','database name')or die("Could not connect to mysql".mysqli_error($con));
	?>
Example
	<?php
		$con= new mysqli('localhost','root','','quiz')or die("Could not connect to mysql".mysqli_error($con));
	?>	


########Default Admin Password
email=admin@gmail.com
password=admin

########

