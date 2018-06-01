<?php
   include 'header.php';
   include 'navigation.php';
   include 'breadcrumb.php';
?>
<div class = "row" >
		<div class = "col-1">
			
		</div>
		<div class = "col-2">
			<div class="w3-panel w3-white" id = "panel_salary_page">
				 <p id = "salary_information_heading">Salary Information</p>
				 <div class="row_2_cols_2">
			       <div class = "column_row_2_cols_2">
			       	<form class="salary_details_form" action = "includes/salaryPage.inc.php" method = "POST"> 
				 		<table class="salary_details_table">
			       			<tr>
			       				<td><label>Employee First Name/ID</label></td>
			       				<td><input type="text" name="salary_details_name" class = "salary_details_input"></td>
			       				<td><button id="employee_search_button_salary_page" name="employee_search_button_salary_page">Search</button></td>
			       			</tr>			       		
			       		</table>
			       		
			       	</form>
			       </div>
			       <div class="row_2_cols_2">
			       <div class = "column_row_2_cols_2">
			       	<form class="salary_details_form_1"> 
				 		<table class="salary_details_table_1">
			       			 <tr>
				              <th>#</th>
				              <th>Employee ID</th>
				              <th>Employee Name</th>
				              <th>Department</th>
				            </tr>
				            <?php
                               include 'includes/dbh.inc.php';

                               $fullURL = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

                               if(strpos($fullUrl, "found") == true )
                               {
                                  if(isset($_SESSION['search_value']))
                                  {
                                       $session_value = $_SESSION['search_value'];

                                       $sql_select_search = "SELECT * FROM employee WHERE empNo = '$session_value' OR fName = '$session_value'";
                                       $result = mysqli_query($conn, $sql_select_search);
                                       $result_check = mysqli_num_rows($result);

                                       if($result_check > 0)
                                       {
                                       	  while($row = mysqli_fetch_assoc($result))
                                       	  {
                                              echo "<tr>";
	                                          echo "<td><input type=\"checkbox\" name=\"employee_checkbox\" id=\"employee_checkbox\" onclick = \"getSalaryInfo(".$row['empNo'].",".$row['fName'].",".$row['mName'].",".$row['lName'].",".$row['department'].",".$row['basicSalary'].")\"></td>";
	                                          echo "<td>".$row['empNo']."</td>";
	                                          echo "<td>".$row['fName']." ".$row['mName']." ".$row['lName']."</td>";
	                                          echo "<td>".$row['department']."</td>";
	                                          echo "</tr>";
                                       	  }
                                       }
                                  }
                                  else
                                  {
                                        echo "<tr>";
                                        echo "<td><input type=\"checkbox\" name=\"employee_checkbox\" id=\"employee_checkbox\"></td>";
                                        echo "<td></td>";
                                        echo "<td></td>";
                                        echo "<td></td>";
                                        echo "</tr>";
                                  }
                               }
                               else
                               {
                                   echo "<tr>";
                                   echo "<td><input type=\"checkbox\" name=\"employee_checkbox\" id=\"employee_checkbox\"></td>";
                                   echo "<td></td>";
                                   echo "<td></td>";
                                   echo "<td></td>";
                                   echo "</tr>";
                               }
				            ?>
				            
			       		</table>
			       	</form>
			       </div>
			       <div class="row_2_cols_2">
			       <div class = "column_row_2_cols_2">
			       		<form class="salary_details_form"> 
				 		<table class="salary_details_table">
			       			<tr>
				              <th colspan="2">Employee Details</th>
				            </tr>
				            <tr>
				            	<td>Employee ID</td>
				            	
				            </tr>
				            <tr>
				            	<td><input type="text" name="salary_details_employee_ID" id="salary_details_employee_ID" class = "salary_details_input"></td>
				            
				            </tr>
				             <tr>
				            	<td>Employee Name</td>
				            
				            </tr>
				            <tr>
				            	<td><input type="text" name="salary_details_employee_name" id="salary_details_employee_name" class = "salary_details_input"></td>
				            	
				            </tr>
				             <tr>
				            	<td>Department</td>
				            	
				            </tr>
				            <tr>
				            	<td><input type="text" name="salary_details_department" id="salary_details_department" class = "salary_details_input"></td>

				            </tr>
			       		</table>
			       	    </form>
			       </div>
				   </div>
				   <div class="row_2_cols_2">
			       <div class = "column_row_2_cols_2">
			       		<form class="salary_details_form"> 
				 		<table class="salary_details_table">
			       			<tr>
				              <th colspan="2">Salary Details</th>
				            </tr>
				            <tr>
				            	<td>Date Salary Recieved</td>
				            	<td><input type="date" name="salary_details_date_salary_recieved" class = "salary_details_input"></td>
				            	<td></td>
				            	<td></td>
				            	<td></td>
				            </tr>
				             <tr>
				            	<td>Basic Salary</td>
				            	<td><input type="text" name="salary_details_basic_salary" id="salary_details_basic_salary" class = "salary_details_input"></td>
				            	<td></td>
				            	<td></td>
				            	<td></td>
				            </tr>				           
				             <tr>
				            	<td>Tax Deduction</td>
				            	<td>HRA</td>
				            	<td>TA</td>
				            	<td>DA</td>
				            	<td>Net Salary</td>
				            </tr>
				            <tr>
				            	<td><input type="text" name="salary_details_tax_deduction" id="salary_details_tax_deduction" class = "salary_details_input"></td>
				            	<td><input type="text" name="salary_details_hra" id="salary_details_hra" class = "salary_details_input"></td>
				            	<td><input type="text" name="salary_details_ta" id="salary_details_ta" class = "salary_details_input"></td>
				            	<td><input type="text" name="salary_details_da" id="salary_details_da" class = "salary_details_input"></td>
				            	<td><input type="text" name="salary_details_net_salary" id="salary_details_net_salary" class = "salary_details_input"></td>
				            </tr>
			       		</table>
			       	    </form>
			       </div>
				   </div>
				   <div class="row_2_cols_2">
			       <div class = "column_row_2_cols_2">
			       		<p id="add_salary_button_p"><button id="add_salary_button">Add Salary</button></p>
			       </div>
				 </div>
			</div>
		</div>
		<div class = "col-3">
			
		</div>
		<div class = "col-4">
			
		</div>
</div>
<script type="text/javascript" src="includejs/salarypage.js"></script>
<?php
   include 'footer.php';
?>