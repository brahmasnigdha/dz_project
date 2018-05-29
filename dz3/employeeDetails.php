<?php
   include 'header.php';
   include 'navigation.php';
   include 'breadcrumb.php';
?>
<div class = "row" >
		<div class = "col-1">
			
		</div>
		<div class = "col-2">
			<div class="w3-panel w3-white" id = "panel_employee_details">
				 <p id = "panel_heading">Employee Information</p>
				 <div class = "row_2_cols_1">
				 <div class = "column_row_2_cols">
				 	<form class="employee_details_form" action="includes/employeeDetails.inc.php" method="POST" enctype="multipart/form-data"> 
				 		<table class="employee_details_table">
				 			<tr>
				 				<th colspan="2">Personal</th>
				 			</tr>
				 			<tr>
				 				<td>
				 					<label>First name</label>
				 				</td>
				 				<td>
				 					<input type="text" name="employee_details_fname" class = "employee_details_input">
				 				</td>
				 			</tr>
				 			<tr>
				 				<td>
				 					<label>Middle name</label>
				 				</td>
				 				<td>
				 					<input type="text" name="employee_details_mname" class = "employee_details_input">
				 				</td>
				 			</tr>
				 			<tr>
				 				<td>
				 					<label>Last name</label>
				 				</td>
				 				<td>
				 					<input type="text" name="employee_details_lname" class = "employee_details_input">
				 				</td>
				 			</tr>
				 			<tr>
				 				<td>
				 					<label>Date of Birth</label>
				 				</td>
				 				<td>
				 					<input type="text" name="employee_details_dob" class = "employee_details_input">
				 				</td>
				 			</tr>
				 			<tr>
				 				<td>
				 					<label>Blood Group</label>
				 				</td>
				 				<td>
				 					<input type="text" name="employee_details_blood_group" class = "employee_details_input">
				 				</td>
				 			</tr>
				 			<tr>
				 				<td>
				 					<label>Gender</label>
				 				</td>
				 				
				 				<td>
				 					<input type="radio" name="gender" value="male" checked>
                                    <label>Male</label>
                                </td>
				 			</tr>
				 			<tr>
				 				<td></td>
				 					<td>
                                	<input type="radio" name="gender" value="female">
                                    <label>Female</label>
                                </td>
				 			</tr>
				 					
                                <tr>
                                	<td></td>
				 					<td>
                                    <input type="radio" name="gender" value="other" >
                                    <label>Other</label>
				 					</td>
				 				</tr>
				 		</table>
				 	</form>
				 </div>
				 <div class = "column_row_2_cols">
				 	<form class="employee_details_form" action="includes/employeeDetails.inc.php" method="POST" enctype="multipart/form-data"> 
				 		<table class="employee_details_table">
				 			<tr>
				 				<th colspan="2">Contact</th>
				 			</tr>
				 			<tr>
				 				<td>
				 					<label>Address</label>
				 				</td>
				 				<td>
				 					<input type="text" name="employee_details_address" class = "employee_details_input">
				 				</td>
				 			</tr>
				 			<tr>
				 				<td>
				 					<label>City</label>
				 				</td>
				 				<td>
				 					<input type="text" name="employee_details_city" class = "employee_details_input">
				 				</td>
				 			</tr>
				 			<tr>
				 				<td>
				 					<label>State</label>
				 				</td>
				 				<td>
				 					<input type="text" name="employee_details_state" class = "employee_details_input">
				 				</td>
				 			</tr>
				 			<tr>
				 				<td>
				 					<label>Phone</label>
				 				</td>
				 				<td>
				 					<input type="text" name="employee_details_phone" class = "employee_details_input">
				 				</td>
				 			</tr>
				 			<tr>
				 				<td>
				 					<label>Email</label>
				 				</td>
				 				<td>
				 					<input type="text" name="employee_details_email" class = "employee_details_input">
				 				</td>
				 			</tr>
				 		</table>
				 	</form>
				 </div>
				 </div>
				 <div class="row_2_cols_2">
			       <div class = "column_row_2_cols_2">
			       	<form class="employee_details_form" action="includes/employeeDetails.inc.php" method="POST" enctype="multipart/form-data"> 
				 		<table class="employee_details_table">
			       			<tr>
			       			<th colspan="3">Account Details</th>
			       		</tr>
			       		<tr>
				 				<td>
				 					<label>Employee Type</label>
				 				</td>
				 				
				 				<td>
				 					<input type="radio" name="employee_type" value="full_time" checked>
                                    <label>Full-time</label>
                                </td>
				 			</tr>
				 			<tr>
				 				<td></td>
				 					<td>
                                	<input type="radio" name="employee_type" value="part_time">
                                    <label>Part-time</label>
                                </td>
				 			</tr>
				 					
                                <tr>
                                	<td></td>
				 					<td>
                                    <input type="radio" name="employee_type" value="other" >
                                    <label>Intern</label>
				 					</td>
				 				</tr>		
			       		<tr>
			       			<td><label>Department</label></td>
			       			<td>
			       				<select class="employee_details_input" name="employee_details_department" id="employee_details_department">
								<?php
									include 'includes/dbh.inc.php';

									$sql_select = "SELECT * FROM department";
									$result = mysqli_query($conn, $sql_select);
									$result_check = mysqli_num_rows($result);

									if($result_check < 0)
									{
										header("Location: employeeDetails.php?employeeDetails=no_department");
										exit();
									}
									else
									{
										while($row = mysqli_fetch_assoc($result)){

											echo "<option value ='".$row['departmentNo']."' id='".$row['departmentNo']."'>".$row['departmentName']."</option>";
										}
									}
								?>
								
				             </select>
			       			</td>
			       		</tr>
			       		<tr>
			       			<td><label>Joining Date</label></td>
			       			<td>
			       				<input type="text" name="employee_details_joining_date" class = "employee_details_input">
			       			</td>
			       		</tr>
<!------------------------------------------------------------------------------------------------------------------------------------>
			       		<tr>
			       			<td><label>ID Proof</label></td>
			       			<td>
			       				<input type="file" name="id_proof_file" id="id_proof_file" class = "employee_details_input">
			       			</td>
			       			<td>
			       				
			       			</td>
			       		</tr>
			       		<tr>
			       			<td><label>Resume</label></td>
			       			<td>
			       				<input type="file" name="resume_file" id="resume_file" class = "employee_details_input">
			       			</td>
			       			<td>
			       				
			       			</td>
			       		</tr>
			       		<tr>
			       			<td><label>Cover Letter</label></td>
			       			<td>
			       				<input type="file" name="cover_letter_file" id="cover_letter_file" class = "employee_details_input">
			       			</td>
			       			<td>
			       				
			       			</td>
			       		</tr>
			       		
<!------------------------------------------------------------------------------------------------------------------------------------>			       		</table>
			       		
			       	</form>
			       </div>
			       <div class="row_2_cols_2">
			       <div class = "column_row_2_cols_2">
			       	<form class="employee_details_form" action="includes/employeeDetails.inc.php" method="POST" enctype="multipart/form-data"> 
				 		<table class="employee_details_table">
			       			<tr>
			       			<th colspan="3">Basics</th>
			       		</tr>
			       		<tr>
			       			<td><label>Basic Salary</label></td>
			       			<td>
			       				<input type="text" name="employee_details_employee_type" class = "employee_details_input">
			       			</td>
			       		</tr>		       		
			       		</table>
			       		
			       	</form>
			       </div>
			        <div class="row_2_cols_2">
			       <div class = "column_row_2_cols_2">
			       	<form class="employee_details_form" action="includes/employeeDetails.inc.php" method="POST" enctype="multipart/form-data">
			       		<p id="add_employee_button_p"><button type="submit" id="add_employee_button" name="add_employee_button">Add Employee</button></p>
			       	</form>
			       		
			       </div>
				 </div>
			</div>
			

     	</div>
		<div class = "col-3">
			
		</div>
		<div class = "col-4">
			
		</div>
</div>
<?php
   include 'footer.php';
?>