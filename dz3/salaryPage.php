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
			       	<form class="salary_details_form"> 
				 		<table class="salary_details_table">
			       			<tr>
			       				<td><label>Employee Name/ID</label></td>
			       				<td><input type="text" name="salary_details_name" class = "salary_details_input"></td>
			       				<td><button id="employee_search_button_salary_page">Search</button></td>
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
				            <tr>
				              <td>#</td>
				              <td>Employee ID</td>
				              <td>Employee Name</td>
				              <td>Department</td>
				            </tr>
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
				            	<td><input type="text" name="salary_details_employee_ID" class = "salary_details_input"></td>
				            
				            </tr>
				             <tr>
				            	<td>Employee Name</td>
				            
				            </tr>
				            <tr>
				            	<td><input type="text" name="salary_details_employee_name" class = "salary_details_input"></td>
				            	
				            </tr>
				             <tr>
				            	<td>Department</td>
				            	
				            </tr>
				            <tr>
				            	<td><input type="text" name="salary_details_department" class = "salary_details_input"></td>

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
				            	<td><input type="text" name="salary_details_date_salary_recieved" class = "salary_details_input"></td>
				            	<td></td>
				            	<td></td>
				            	<td></td>
				            </tr>
				             <tr>
				            	<td>Basic Salary</td>
				            	<td><input type="text" name="salary_details_basic_salary" class = "salary_details_input"></td>
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
				            	<td><input type="text" name="salary_details_tax_deduction" class = "salary_details_input"></td>
				            	<td><input type="text" name="salary_details_hra" class = "salary_details_input"></td>
				            	<td><input type="text" name="salary_details_ta" class = "salary_details_input"></td>
				            	<td><input type="text" name="salary_details_da" class = "salary_details_input"></td>
				            	<td><input type="text" name="salary_details_net_salary" class = "salary_details_input"></td>
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
<?php
   include 'footer.php';
?>