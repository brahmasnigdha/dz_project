<?php
   include 'header.php';
   include 'navigation.php';
   include 'breadcrumb.php';
?>
  <div class = "row" >
   <button class = "print_button" type="button">Print this page</button>
		<div class = "col-1">
			
		</div>
		<div class = "col-2">
		<div class="w3-panel w3-white" id = "view_salary_details">
				 <p id = "view_salary_panel_heading">Salary Details</p>
				 <div class = "row_2_cols_1">
				   <div class = "column_row_2_cols_2">
                      <fieldset>
                      	<legend>View Salary Details</legend>
                     
                        <form class="salary_details_form_2" action="" method="POST">
                      	 <table class="salary_details_table_2">
        			       	<tr>
				    			<th>#</th>
				    			<th>Employee ID</th>
				    			<th>Salary Amount</th>
				    			<th>Salary Month</th>
				    			<th>Tax Deduction</th>
				    			<th>House Rent Allowance</th>
				    			<th>Term Allowance</th>
				    			<th>Direct Allowance</th>
				    			<th>Net Salary</th>
                  <th>Edit</th>
                  <th>Delete</th>
				    		</tr>
				    		<?php
                               
                               include 'includes/dbh.inc.php';

                               $i = 1;

                               $sql_select_salary = "SELECT * FROM salary";
                               $result = mysqli_query($conn, $sql_select_salary);
                               $result_check = mysqli_num_rows($result);

                               if($result_check > 0 )
                               {
                               	  while($row = mysqli_fetch_assoc($result))
                               	  {
                               	  	echo "<tr>";
                                    echo "<td>".$i++."</td>";
                                    echo "<td>".$row['employeeId']."</td>";
                                    echo "<td>".$row['salaryAmount']."</td>";
                                    echo "<td>".$row['salaryMonth']."</td>";
                                    echo "<td>".$row['taxDeduction']."</td>";
                                    echo "<td>".$row['houseRentAllowance']."</td>";
                                    echo "<td>".$row['termAllowance']."</td>";
                                    echo "<td>".$row['directAllowance']."</td>";
                                    echo "<td>".$row['netSalary']."</td>";
                                    echo "<td><button>Edit</button></td>";
                                    echo "<td><button>Delete</button></td>";
                                    echo "</tr>";
                               	  }
                                    
                               }
                               elseif($result_check < 1)
                               {
                               	    echo "<script>alert(\"Salary table empty\");</script>";
                               }
				    		?>
				    		
                     </table>
                     </form>
                   </fieldset>
				 </div>
			</div>
     	</div>
		<div class = "col-3">
			
		</div>
		<div class = "col-4">
			
		</div>
    <script src="includejs/print_page.js"></script>
<?php
   include 'footer.php';
?>