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
		<div class="w3-panel w3-white" id = "view_employee_details">
				 <p id = "view_employee_panel_heading">Employee Details</p>
				 <div class = "row_2_cols_1">
				   <div class = "column_row_2_cols_2">
                      <fieldset>
                      	<legend>View Employee Details</legend>
                        
                      	<form class="employee_details_form_2" action="" method="POST">
                      	 <table class="employee_details_table_2">
        			       	<tr>
				    			<th>#</th>
				    			<th>Employee ID</th>
				    			<th>First Name</th>
				    			<th>Middle Name</th>
				    			<th>Last Name</th>
				    			<th>Date of Birth</th>
				    			<th>Blood Group</th>
				    			<th>Gender</th>
				    			<th>Address</th>
				    			<th>City</th>
				    			<th>State</th>
				    			<th>Phone</th>
				    			<th>Email</th>
				    			<th>Employee Type</th>
				    			<th>Department</th>
				    			<th>Joining Date</th>
				    			<th>Basic Salary</th>
				    			<th>ID Proof</th>
				    			<th>Resume</th>
				    			<th>Cover Letter</th>
                  <th>Edit</th>
                  <th>Delete</th>
				    		</tr>
				    		<?php

                               include 'includes/dbh.inc.php';

                               $i = 1;

                               $sql_select_print = "SELECT * FROM employee";
                               $result = mysqli_query($conn, $sql_select_print);
                               $result_check = mysqli_num_rows($result);

                               if($result_check > 0)
                               {
                               	  while($row = mysqli_fetch_assoc($result))
                               	  {  
                                     /* Explode(): returns an array of strings, each of which is a substring of string formed by splitting it on boundaries formed by the string dilimiter.*/
                                      echo "<tr>";
                                      echo "<td>".$i++."</td>";
                                      echo "<td>".$row['empNo']."</td>";
                                      echo "<td>".$row['fName']."</td>";
                                      echo "<td>".$row['mName']."</td>";
                                      echo "<td>".$row['lName']."</td>";
                                      echo "<td>".$row['bloodGroup']."</td>";
                                      echo "<td>".$row['gender']."</td>";
                                      echo "<td>".$row['address']."</td>";
                                      echo "<td>".$row['city']."</td>";
                                      echo "<td>".$row['state']."</td>";
                                      echo "<td>".$row['phone']."</td>";
                                      echo "<td>".$row['email']."</td>";
                                      echo "<td>".$row['employeeType']."</td>";
                                      echo "<td>".$row['department']."</td>";
                                      echo "<td>".$row['joiningDate']."</td>";
                                      echo "<td>".$row['basicSalary']."</td>";
                                      echo "<td>".$row['fName']."</td>";

                                     /*$id_proof = explode('../', $row['id_proof']);
                                     $resume = explode('../', $row['resume']);
                                     $cover_letter = explode('../', $row['cover_letter']);

                                     echo "<td><a href=\"".implode("/", $id_proof)."\">Download</a></td>";
                                     echo "<td><a href=\"".implode("/", $resume)."\">Download</a></td>";
                                     echo "<td><a href=\"".implode("/", $cover_letter)."\">Download</a></td>";*/

                                   /*  echo "<td><a href=\"".implode("/", explode('../', $row['id_proof']))."\">".$row['id_proof']."</a></td>";
                                     echo "<td><a href=\"".implode("/", explode('../', $row['resume']))."\">".$row['resume']."</a></td>";
                                     echo "<td><a href=\"".implode("/", explode('../', $row['cover_letter']))."\">".$row['cover_letter']."</a></td>";*/
                                     echo "<td><a href=\"". $row['id_proof']."\" download>Download</a></td>";
                                     echo "<td><a href=\"". $row['resume']."\" download>Download</a></td>";
                                     echo "<td><a href=\"". $row['cover_letter']."\" download>Download</a></td>";
                                     echo "<td><button>Edit</button></td>";
                                     echo "<td><button>Delete</button></td>";

                               	  }
                               }
                               elseif($result_check < 1)
                               {
                               	  echo "<script>alert(\"No employee details enetered\");</script>";
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
</div>
<script src="includejs/print_page.js"></script>
<?php
   include 'footer.php';
?>