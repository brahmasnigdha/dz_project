<div class="breadcrumb">
	<ul class="breadcrumb_list">
	<?php
	    $fullUrl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
			if(strpos($fullUrl, "home.php") == true )
			{
				echo "<li><a href = 'home.php'>"."Home"."</a></li>";
				//exit();
			}
			elseif (strpos($fullUrl, "department.php") == true) 
			{
			    echo "<li><a href = 'home.php'>"."Home"."</a></li>";
			    echo "<li><a href = '#'>"."Master"."</a></li>";
			    echo  "<li><a href = 'department.php'>"."Department"."</a></li>";
			}
			elseif (strpos($fullUrl,"createuser.php") == true) 
			{
			    echo "<li><a href = 'home.php'>"."Home"."</a></li>";
			    echo "<li><a href = '#'>"."User Settings"."</a></li>";
			    echo  "<li><a href = 'createuser.php'>"."Create User"."</a></li>";
			}
			elseif (strpos($fullUrl,"addNewRole.php") == true) 
			{
			    echo "<li><a href = 'home.php'>"."Home"."</a></li>";
			    echo "<li><a href = '#'>"."User Settings"."</a></li>";
			    echo  "<li><a href = 'addNewRole.php'>"."Add New Role"."</a></li>";
			}
			elseif (strpos($fullUrl,"employeeDetails.php") == true) 
			{
			    echo "<li><a href = 'home.php'>"."Home"."</a></li>";
			    echo "<li><a href = '#'>"."Employee"."</a></li>";
			    echo  "<li><a href = 'employeeDetails.php'>"."Employee Details"."</a></li>";
			}
			elseif (strpos($fullUrl,"salaryPage.php") == true) 
			{
			    echo "<li><a href = 'home.php'>"."Home"."</a></li>";
			    echo "<li><a href = '#'>"."Employee"."</a></li>";
			    echo  "<li><a href = 'salaryPage.php'>"."Salary"."</a></li>";
			}
			elseif (strpos($fullUrl,"attendancePage.php") == true) 
			{
			    echo "<li><a href = 'home.php'>"."Home"."</a></li>";
			    echo "<li><a href = '#'>"."Employee"."</a></li>";
			    echo  "<li><a href = 'attendancePage.php'>"."Attendance"."</a></li>";
			}
			elseif (strpos($fullUrl,"viewAttendance.php") == true) 
			{
			    echo "<li><a href = 'home.php'>"."Home"."</a></li>";
			    echo "<li><a href = '#'>"."Employee"."</a></li>";
			    echo  "<li><a href = 'viewAttendance.php'>"."View Attendance"."</a></li>";
			}
			elseif (strpos($fullUrl,"viewEmployeeDetails.php") == true) 
			{
			    echo "<li><a href = 'home.php'>"."Home"."</a></li>";
			    echo "<li><a href = '#'>"."Employee"."</a></li>";
			    echo  "<li><a href = 'viewEmployeeDetails.php'>"."View Employee Details"."</a></li>";
			}
			elseif (strpos($fullUrl,"viewSalaryDetails.php") == true) 
			{
			    echo "<li><a href = 'home.php'>"."Home"."</a></li>";
			    echo "<li><a href = '#'>"."Employee"."</a></li>";
			    echo  "<li><a href = 'viewSalaryDetails.php'>"."View Salary Details"."</a></li>";
			}

	?>
    </ul>
</div>