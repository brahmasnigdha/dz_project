<?php
   include 'header.php';
   include 'navigation.php';
   include 'breadcrumb.php';
?>

<div class = "row" >
		<div class = "col-1">
			
		</div>
		<div class = "col-2">
      <!--For Department Information -->
      <div class="w3-panel w3-white" id = "panel">
      <p id = "table_heading">Department Information</p>
        <form  class = "department_form" action = "includes/department.inc.php" method="POST">
           <table class="department_table">
            <tr><td></td><td><input type="text" name="department_id" id="department_id" hidden></td></tr>
             <tr>
               <td><label>Department Name</label></td>
               <td><input type="text" name="department_name" id="department_name" required></td>
             </tr>
             <tr>
               <td><label>Department Location</label></td>
               <td><input type="text" name="department_location" id="department_location" required></td>
             </tr>
             <tr>
                <td></td>
                <td id = "add_update_button">
                  <button id="add" name = "add">Add</button>
                  
                </td>
             </tr>
             <tr>
               <td></td>
               <td>
                  <button id="update" name = "update" hidden>Update</button>
                  <button id="delete" name = "delete_button" class="delete" hidden>Delete</button></td>
             </tr>
             
           </table>
        </form>
      </div>
		</div>
		<div class = "col-3">
			
		</div>
		<div class = "col-4">
			
		</div>
</div>
<!--For table generation or department search and edit table-->
<div class = "row" >
    <div class = "col-1">
      
    </div>
    <div class = "col-2">
      <div class="w3-panel w3-white" id = "panel2">
        <form class = "department_table_information" action = "includes/department.inc.php" method="POST">
          <table class = "department_table_information_table">
            <tr>
              
              <th style="visibility: hidden;">ID</th>
              <th>#</th>
              <th>Department</th>
              <th>Location</th>
              <th id = "search_bar">
                  <input type="text" name="search_department" placeholder="Search Department" id="search">
                  <button id = "department_search" name="department_search">Search</button>
              </th>
            </tr>
              <?php
                include 'includes/dbh.inc.php';
                
                  $i = 1;

                  $fullUrl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

                  if(strpos($fullUrl, "found") == true )
                  {
                    
                    if(isset($_SESSION['search_info']))
                    {
                      $search_info = $_SESSION['search_info'];
                      $sql_select = "SELECT * FROM department WHERE departmentName = '$search_info'";

                      $result = mysqli_query($conn, $sql_select);
                      $result_check = mysqli_num_rows($result);

                        while($row = mysqli_fetch_array($result))
                        {
                          echo "<tr>";
                          
                          echo "<td 
style='visibility: hidden;'  id='departmentNo".$row['departmentNo']."'>".$row['departmentNo']."</td>";
                          echo "<td>".($i++)."</td>";
                          echo "<td id='name".$row['departmentNo']."'>".$row['departmentName']."</td>";
                          echo "<td id='departmentLocation".$row['departmentNo']."'>".$row['departmentLocation']."</td>";
                          echo "<td id = 'edit_delete_button'>
                                <button type = 'button' class='edit' id='".$row['departmentNo']."' name='edit_button' onclick='edit_new(".$row['departmentNo'].");'>Edit</button>
                                </td>";
                          echo "</tr>";
                        }     
                    }
                    else{
                      $sql_select = "SELECT * FROM department";
                      $result = mysqli_query($conn, $sql_select);
                      $result_check = mysqli_num_rows($result);
                      if($result_check < 0)
                      {
                         header("Location: department.php?department_table=empty");
                         exit();
                      }
                      else
                      {

                        while($row = mysqli_fetch_array($result))
                        {
                          echo "<tr>";
                          
                          echo "<td 
style='visibility: hidden;' id='departmentNo".$row['departmentNo']."'> ".$row['departmentNo']."</td>";
                           echo "<td>".($i++)."</td>";
                          echo "<td id='name".$row['departmentNo']."'>".$row['departmentName']."</td>";
                          echo "<td id='departmentLocation".$row['departmentNo']."'>".$row['departmentLocation']."</td>";
                           echo "<td id = 'edit_delete_button'>
                                <button type = 'button' class='edit' id='".$row['departmentNo']."' name='edit_button' onclick='edit_new(".$row['departmentNo'].");'>Edit</button>
                                </td>";
                          echo "</tr>";
                        }
                      }      
                    }
                  }

                  else
                  {
                      $sql_select = "SELECT * FROM department";
                      $result = mysqli_query($conn, $sql_select);
                      $result_check = mysqli_num_rows($result);
                      if($result_check < 0)
                      {
                         header("Location: department.php?department_table=empty");
                         exit();
                      }
                      else
                      {

                        while($row = mysqli_fetch_array($result))
                        {
                          echo "<tr>";
                          echo "<td 
style='visibility: hidden;' id='departmentNo".$row['departmentNo']."'>".$row['departmentNo']."</td>";
                          echo "<td>".($i++)."</td>";
                          echo "<td id='name".$row['departmentNo']."'>".$row['departmentName']."</td>";
                          echo "<td id='departmentLocation".$row['departmentNo']."'>".$row['departmentLocation']."</td>";
                           echo "<td id = 'edit_delete_button'>
                                <button type = 'button' class='edit' id='".$row['departmentNo']."' name='edit_button' onclick='edit_new(".$row['departmentNo'].");'>Edit</button>
                                </td>";
                          echo "</tr>";
                        }
                      }      
                  }
              ?>
          </table>

        </form>
       
      </div>
    </div>
    <div class = "col-3">
      
    </div>
    <div class = "col-4">
      
    </div>
</div>
<script type="text/javascript" src="includejs/edit_delete_operation.js"></script>
<?php
   include 'footer.php';
?>

