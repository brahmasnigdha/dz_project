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

			<div class="w3-panel w3-white" id = "panel_attendance_details">
        
				 <p id = "attendance_panel_heading">Attendance</p>
				 <div class = "row_2_cols_1">

				   <div class = "column_row_2_cols_2">
				 
                      <!--Use fieldset-->
                    
                      <fieldset>
                      	<legend>View Attendance</legend>
                       
                      	<form class="attendance_details_form_2" action="includes/viewattendance.inc.php" method="POST">
                      	<table class="attendance_table_view">
                      		<tr>
                      			
                      			<td><label>Start Date: </label></td>
                      			<td><input type="text" name="from_datepicker" id="from_datepicker"></td>
                      			<td></td>
                      			<td><label>End Date: </label></td>
                      			<td><input type="text" name="to_datepicker" id="to_datepicker"></td>
                      			<td></td>
                      			<td><input type="submit" name="search_attendance" value="Search"></td>
                      		</tr>
                      	</table id = "table_id">
                      	 <table class="attendance_details_table_2" id="attendance_details_table_2">
        			       			 <tr>
        				              <th>#</th>
        				              <th>Attendance Date</th>
        				              <th>Employee ID</th>
        				              <th>Employee Name</th>
        				              <th>Department Name</th>
        				              <th>Attendance Status</th>
                              <th>Edit</th>
                              <th>Delete</th>
        				            </tr>

                            <?php
                                include 'includes/dbh.inc.php';

                                $i = 1;

                                $fullUrl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
                                $start_date = "";
                                $end_date = "";

                                if(isset($_SESSION['start_date']))
                                {
                                   $start_date = $_SESSION['start_date'];
                                   $_SESSION['start_date']= "";
                                }

                                if(isset($_SESSION['end_date']))
                                {
                                   $end_date = $_SESSION['end_date'];
                                    $_SESSION['end_date'] = "";
                                }

                                if(strpos($fullUrl, "found") == true )
                                {
                                   $sql_search_between = "SELECT * FROM attendance WHERE attendanceDate BETWEEN '$start_date' AND '$end_date'";
                                   $result = mysqli_query($conn, $sql_search_between);
                                   $result_check = mysqli_num_rows($result);

                                   if($result_check > 0)
                                   {
                                      while($row = mysqli_fetch_assoc($result))
                                      {
                                         echo "<tr>";
                                         echo "<td>".$i++."</td>";
                                         echo "<td>".$row['attendanceDate']."</td>";
                                         echo "<td>".$row['empID']."</td>";
                                         echo "<td>".$row['employeeName']."</td>";
                                         echo "<td>".$row['department_name']."</td>";
                                         echo "<td id=\"".$row['attendanceId']."\">".$row['attendanceStatus']."</td>";
                                         /*--------------------------Edit and Delete button operation---------------------*/
                                         /*-----AJAX will be required to update the table independently instead of loading the whole page and checking out the required contents on the table again-------*/
                                         echo "<td>";
                                         /*echo "<button type=\"button\" id=\"edit_".$row['attendanceId']."\">Edit</button>";*/
                                         echo "<button type=\"button\" id=\"edit_".$row['attendanceId']."\">Edit</button>";
                                         
                                         echo "</td>";
                                         echo "<td>";
                                         echo "<button type=\"button\" id=\"delete_".$row['attendanceId']."\">Delete</button>";
                                         echo "</td>";
                                         echo "</tr>";
                                      }
                                   }
                                   elseif($result_check < 0)
                                   {
                                      echo "<script>alert (\"Attendance is not available for the following dates\");</script>";
                                   }
                                }

                                if(strpos($fullUrl, "not_found") == true)
                                {
                                    echo "<script>alert (\"Attendance is not available for the following dates\");</script>";
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
<!-----------------------------------Attendance_Edit_Modal------------------------------------------------->
<div class = "attendance_edit_modal">
    <div class = "attendance_edit_modal_content">
      <span class = "close-button">&times;</span>
       
      <form>
        <table>
          <tr>
            <td>Attendance Date</td>
            <td><input type="text" name="attendance_date"></td>
          </tr>
          <tr>
            <td>Employee ID</td>
            <td><input type="text" name="employee_id"></td>
          </tr>
          <tr>
            <td>Employee Name</td>
            <td><input type="text" name="employee_name"></td>
          </tr>
          <tr>
            <td>Department Name</td>
            <td><input type="text" name="department_name"></td>
          </tr>
          <tr>
            <td>Attendance Status</td>
            <td>
              <select>
                <option value="absent">absent</option>
                <option value="present">present</option>
              </select>
            </td>
          </tr>
          <tr >
            <td colspan="2">
              <button>Update</button>
            </td>
          </tr>
        </table>
      </form>    
    </div>
  </div>
  <script type="text/javascript" src="includejs/view_attendance.js"></script>
  <script src="includejs/print_page.js"></script>
<?php
   include 'footer.php';
?>