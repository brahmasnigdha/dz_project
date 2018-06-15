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
				 	<form enctype = "multipart/form-data" class="employee_details_form" action="includes/employeeDetails.inc.php" method="POST"> 
				 		<table class="employee_details_table">
				 			<tr>
				 				<th colspan="2">Personal</th>
				 			</tr>
				 			<tr>
				 				<td>
				 					<label>First name</label>
				 				</td>
				 				<td>
				 					<input type="text" name="employee_details_fname" class = "employee_details_input" required>
				 					<span class="error">
										<?php 
										    $fullUrl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
										    if(strpos($fullUrl, "invalid_input=first_name_error") == true )
										    {
										    	echo "Only letters and white space allowed";
										    	//exit();
										    }
									    ?>
								
						            </span>
				 				</td>
				 			</tr>
				 			<tr>
				 				<td>
				 					<label>Middle name</label>
				 				</td>
				 				<td>
				 					<input type="text" name="employee_details_mname" class = "employee_details_input">
				 					<span class="error">
										<?php 
										    $fullUrl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
										    if(strpos($fullUrl, "invalid_input=middle_name_error") == true )
										    {
										    	echo "Only letters and white space allowed";
										    	//exit();
										    }
									    ?>
								
						            </span>
				 				</td>
				 			</tr>
				 			<tr>
				 				<td>
				 					<label>Last name</label>
				 				</td>
				 				<td>
				 					<input type="text" name="employee_details_lname" class = "employee_details_input" required>
				 					<span class="error">
										<?php 
										    $fullUrl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
										    if(strpos($fullUrl, "invalid_input=last_name_error") == true )
										    {
										    	echo "Only letters and white space allowed";
										    	//exit();
										    }
									    ?>
								
						            </span>
				 				</td>
				 			</tr>
				 			<tr>
				 				<td>
				 					<label>Date of Birth</label>
				 				</td>
				 				<td>
				 					<input type="date" name="employee_details_dob" class = "employee_details_input" required>
				 				</td>
				 			</tr>
				 			<tr>
				 				<td>
				 					<label>Blood Group</label>
				 				</td>
				 				<td>
				 					
				 					<select name="employee_details_blood_group" class = "employee_details_input">
				 						<option value="O-">O-</option>
				 						<option value="O+">O+</option>
				 						<option value="A-">A-</option>
				 						<option value="A+">A+</option>
				 						<option value="B-">B-</option>
				 						<option value="B+">B+</option>
				 						<option value="AB-">AB-</option>
				 						<option value="AB+">AB+</option>
				 					</select>
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
				
				 </div>
				 <div class = "column_row_2_cols">
				
				 		<table class="employee_details_table">
				 			<tr>
				 				<th colspan="2">Contact</th>
				 			</tr>
				 			<tr>
				 				<td>
				 					<label>Address</label>
				 				</td>
				 				<td>
				 					<input type="text" name="employee_details_address" class = "employee_details_input" required>
				 				</td>
				 			</tr>
				 			<tr>
				 				<td>
				 					<label>City</label>
				 				</td>
				 				<td>
				 					<input type="text" name="employee_details_city" class = "employee_details_input" required>
				 					<span class="error">
										<?php 
										    $fullUrl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
										    if(strpos($fullUrl, "invalid_input=city_name_error") == true )
										    {
										    	echo "Only letters and white space allowed";
										    	//exit();
										    }
									    ?>
								
						            </span>
				 				</td>
				 			</tr>
				 			<tr>
				 				<td>
				 					<label>State</label>
				 				</td>
				 				<td>
				 					<input type="text" name="employee_details_state" class = "employee_details_input" required>
				 				</td>
				 			</tr>
				 			<tr>
				 				<td>
				 					<label>Phone</label>
				 				</td>
				 				<td>
				 					<input type="text" name="employee_details_phone" class = "employee_details_input" required>
				 					<span class="error">
										<?php 
										    $fullUrl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
										    if(strpos($fullUrl, "phone=invalid_format") == true )
										    {
										    	echo " Invalid phone format, Enter the 10 digit valid phone number. ";
										    	//exit();
										    }
									    ?>
								
						            </span>
				 				</td>
				 			</tr>
				 			<tr>
				 				<td>
				 					<label>Email</label>
				 				</td>
				 				<td>
				 					<input type="text" name="employee_details_email" class = "employee_details_input" required>
				 					<span class="error">
										<?php 
										    $fullUrl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
										    if(strpos($fullUrl, "email=invalid_format") == true )
										    {
										    	echo " Invalid email format ";
										    	//exit();
										    }
									    ?>
								
						            </span>
				 				</td>
				 			</tr>
				 		</table>
				
				 </div>
				 </div>
				 <div class="row_2_cols_2">
			       <div class = "column_row_2_cols_2">
			     
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

											echo "<option value ='".$row['departmentName']."' id='".$row['departmentNo']."'>".$row['departmentName']."</option>";
										}
									}
								?>
								
				             </select>
			       			</td>
			       		</tr>
			       		<tr>
			       			<td><label>Joining Date</label></td>
			       			<td>
			       				<input type="date" name="employee_details_joining_date" class = "employee_details_input" required>
			       			</td>
			       		</tr>
			       		<!------------------------------------------------------------------------------------------------->
			  
			       			<tr>
			       			<td><label>ID Proof</label></td>
			       			<td>
			       				<input type="file" name="employee_details_id_proof" id="employee_details_id_proof" class = "employee_details_input">

			       			</td>
			       			<td>
			       			<!--	<button class="employee_details_upload" name = "id_proof_upload">Upload</button>-->
			       			        <span class="error">
										<?php 
										    $fullUrl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
										    if(strpos($fullUrl, "email=invalid_format") == true )
										    {
										    	echo " Invalid email format ";
										    	//exit();
										    }
									    ?>
								
						            </span>
			       			</td>
			       		</tr>
			       		
			       			<tr>
			       			<td><label>Resume</label></td>
			       			<td>
			       				<input type="file" name="employee_details_resume" id="employee_details_resume" class = "employee_details_input" >
			       			</td>
			       			<td>
			       			<!--	<button class="employee_details_upload" name = "resume_upload">Upload</button>-->
			       			</td>
			       		</tr>
			       		
			       			<tr>
			       			<td><label>Cover Letter</label></td>
			       			<td>
			       				<input type="file" name="employee_details_cover_letter" id="employee_details_cover_letter" class = "employee_details_input">
			       			</td>
			       			<td>
			       				<!--<button class="employee_details_upload" name = "coverletter_upload">Upload</button>-->
			       			</td>
			       		</tr>
			     
			       	 <!--------------------------------------------------------------------------------------------------->
			       		</table>
			       		
			      
			       </div>
			       <div class="row_2_cols_2">
			       <div class = "column_row_2_cols_2">
			      
				 		<table class="employee_details_table">
			       			<tr>
			       			<th colspan="3">Basics</th>
			       		</tr>
			       		<tr>
			       			<td><label>Basic Salary</label></td>
			       			<td>
			       				<input type="text" name="employee_details_basic_salary" class = "employee_details_input" required>
			       			</td>
			       		</tr>		       		
			       		</table>
			       		
			       
			       </div>
			        <div class="row_2_cols_2">
			       <div class = "column_row_2_cols_2">
			      
			       		<p id="add_employee_button_p"><button type="submit" id="add_employee_button" name="add_employee_button">Add Employee</button></p>
			       	</form>
			       	<?php
                        
                         $fullUrl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
                          if(strpos($fullUrl, "role=added_successfully") == true )
                          {
                     
                            echo "Role added successfully.";
                          }
                         
			       	?>
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