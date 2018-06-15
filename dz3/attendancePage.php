<?php
   include 'header.php';
   include 'navigation.php';
   include 'breadcrumb.php';
?>
<div class = "row" >
		<div class = "col-1">
			
		</div>
		<div class = "col-2">
			<div class="w3-panel w3-white" id = "panel_attendance_details">
				 <p id = "attendance_panel_heading">Attendance</p>
				 <div class = "row_2_cols_1">
				 <div class = "column_row_2_cols">
				 	<form class="attendance_details_form_2" action="includes/attendance.inc.php" method="POST">
				 		<div id="datepicker"></div>
				 		<table>
				 			<tr>
				 				<td><label>Picked Date:</label></td>
				 				<td><input type="text" name="date_value" id="date_value"></td>
				 			</tr>
				 		</table>
				 	<!--</form>-->
				 </div>

				 <div class = "column_row_2_cols">
				 	<!--<form class="attendance_details_form_1" action="includes/attendancePage.php" method="POST"> -->
				 		<table class="attendance_details_table_1">
			       			 <tr>
				              <th>Present<br>
				              	<!--<button id="select_all_button" onclick="checkAll(this)">Select_all</button>-->
				              	<input type="checkbox" onclick="checkAll(this)" id="selectall"/>
				              </th>
				              <th>Employee ID</th>
				              <th>Employee Name</th>
				              <th>Department</th>
				            </tr>
				            <?php
                                include 'includes/dbh.inc.php';

                                $sql_select_employee = "SELECT * FROM employee";
                                $result = mysqli_query($conn, $sql_select_employee);
                                $result_check= mysqli_num_rows($result);

                                if($result_check > 0)
                                {
                                	while($row = mysqli_fetch_assoc($result))
                                	{
                                		
                                		echo "<tr>";
                                		echo "<td><input type=\"checkbox\" name=\"checkList[]\" id=\"check_box\" value=\"".$row['empNo']."\"></td>";
                                		echo "<td>".$row['empNo']."</td>";
                                		echo "<td>".$row['fName']." ".$row["mName"]." ".$row["lName"]."</td>";
                                		echo "<td>".$row['department']."</td>";
                                		echo "</tr>";
                                	}
                                }
				            ?>				            
				            <tr>
				            	<td colspan="4">
				            		<button id="submit_attendance" name="submit_attendance">Submit Attendance</button>
				            	</td>
				            </tr>
			       		</table>
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
  <script type="text/javascript" src="includejs/attendance_calendar.js">
  	
  </script>

<?php
   include 'footer.php';
?>