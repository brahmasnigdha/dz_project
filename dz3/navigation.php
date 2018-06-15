
<nav class = "navigation">
	<ul>
		<li id="logo3">dataZen Engineering</li>
		<li><a href="home.php">HOME</a></li>
		<li class="dropdown">
				<a href="javascript:void(0)" class="dropbtn">MASTER</a>
					<div class="dropdown-content">
						<a href="department.php">DEPARTMENT</a>
					</div>
		</li>
		<li class="dropdown">
				<a href="javascript:void(0)" class="dropbtn">USER SETTINGS</a>
					<div class="dropdown-content">
						<a href="createuser.php">CREATE USER</a>
						<a href="addNewRole.php">ADD NEW ROLE</a>
					</div>
		</li>
		<li class="dropdown">
				<a href="javascript:void(0)" class="dropbtn">EMPLOYEE</a>
					<div class="dropdown-content">
						<a href="employeeDetails.php">EMPLOYEE DETAILS</a>
						<a href="salaryPage.php">SALARY</a>
						<a href="attendancePage.php">ATTENDANCE</a>
						<a href="viewAttendance.php">VIEW ATTENDANCE</a>
						<a href="viewEmployeeDetails.php">VIEW EMPLOYEE DETAILS</a>
						<a href="viewSalaryDetails.php">VIEW SALARY DETAILS</a>
					</div>
			</li>
		<li><a href="logout.php">LOGOUT</a></li>
		<li id="userName">
			<img src="image/user_image.png" alt="user icon" id="userIcon">
			<?php
                if(isset($_SESSION['user_name']))
                {
                	echo "Welcome ";
                	echo $_SESSION['user_name'];
                }
                else
                {
                	header("Location: index.php");
                	exit();
                }
			?>			
		</li>
	</ul>
</nav>


