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
				 	<form class="attendance_details_form"> 
				 		<table class="attendance_details_table">
				 			
				 		</table>
				 	</form>
				 </div>
				 <div class = "column_row_2_cols">
				 	<form class="attendance_details_form_1"> 
				 		<table class="attendance_details_table_1">
			       			 <tr>
				              <th>Present</th>
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
				            <tr>
				            	<td colspan="4">
				            		<button id="submit_attendance">Submit Attendance</button>
				            		<button id="export_attendance">Export</button>
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
<?php
   include 'footer.php';
?>