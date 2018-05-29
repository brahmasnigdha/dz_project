<?php
   include 'header.php';
   include 'navigation.php';
   include 'breadcrumb.php';
?>
<div class = "row" >
		<div class = "col-1">
			
		</div>
		<div class = "col-2">
      <!--For role Information -->
      <div class="w3-panel w3-white" id = "panel_add_new_role">
      <p id = "table_heading_add_new_role">Add New Role</p>
        <form  class = "add_new_role_form" action="includes/addNewRole.inc.php" method="POST">
           <table class="add_new_role_table">
            <tr>
               <td></td>
               <td><input type="text" name="add_new_role_id" id="add_new_role_id" hidden></td>
             </tr>
             <tr>
               <td><label>New Role Name</label></td>
               <td><input type="text" name="add_new_role_name" id="add_new_role_name" required></td>
             </tr>
             <tr>
             <tr>
                <td></td>
                <td id = "add_new_role_add_update_button">
                  <button id="add" name = "add">Add Role</button>
                </td>
             </tr>
             <tr>
               <td></td>
               <td>
                 <button id="update" name = "update" hidden>Update Role</button>
                 <button id = 'delete' class='delete' name = "delete" hidden>Delete</button>
               </td>
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
<!--For table generation or role search and edit table-->
<div class = "row" >
    <div class = "col-1">
      
    </div>
    <div class = "col-2">
      <div class="w3-panel w3-white" id = "panel2_add_new_role">
        <form class = "add_new_role_table_information" action = "includes/addNewRole.inc.php" method = "POST">
          <table class = "add_new_role_table_information_table">
            <tr>
              <th>#</th>
              <th>Role Name</th>
              <th>Role ID</th>
              <th id = "search_bar">
                <input type="text" name="search_add_new_role" placeholder="Search User" id="search_add_new_role">
                <button id = "add_new_role_search" name="add_new_role_search">Search</button>
              </th>
            </tr>
            <?php
               include 'includes/dbh.inc.php';

               $i = 1;

              $fullUrl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

              if(strpos($fullUrl, "found") == true ){

                if(isset($_SESSION['search_info']))
                {
                  $search_role = $_SESSION['search_info'];
                  $sql_select = "SELECT * FROM role_table WHERE roleName = '$search_role' OR roleId = '$search_role'";

                  $result = mysqli_query($conn, $sql_select);
                  $result_check = mysqli_num_rows($result);

                  while($row = mysqli_fetch_assoc($result))
                  {
                     
                        echo "<tr>";
                        echo "<td>".$i++."</td>";
                        echo "<td>".$row['roleName']."</td>";
                        echo "<td>".$row['roleId']."</td>";
                        echo "<td id = 'edit_delete_button'>
                            <button type='button' id = 'edit' class='edit' onclick='myfunction(".$row['roleId'].", \"".$row['roleName']."\")'>Edit</button>
                            </td>";
                        echo "</tr>";
                     
                  }

                }

              }
              elseif(strpos($fullUrl, "does_not_exist") == true )
              {
                  $sql_select = "SELECT * FROM role_table";
                  $result = mysqli_query($conn, $sql_select);
                  $result_check = mysqli_num_rows($result);

                  if($result_check > 1)
                  {
                    while($row = mysqli_fetch_assoc($result))
                    {
                        echo "<tr>";
                        echo "<td>".$i++."</td>";
                        echo "<td>".$row['roleName']."</td>";
                        echo "<td>".$row['roleId']."</td>";
                        echo "<td id = 'edit_delete_button'>
                            <button type='button' id = 'edit' class='edit' onclick='myfunction(".$row['roleId'].", \"".$row['roleName']."\")'>Edit</button>
                            </td>";
                        echo "</tr>";
                          
                     }
                 }
                  

              }

              else
              {
                    $sql_select = "SELECT * FROM role_table";
                    $result = mysqli_query($conn, $sql_select);
                    $result_check = mysqli_num_rows($result);

                    if($result_check < 1)
                    {
                      header("Location: ../createUser.php?role_table=no_data");
                      exit();
                    }
                    else
                    {
                      if($result_check > 1)
                      {
                          while($row = mysqli_fetch_assoc($result))
                          {
                              echo "<tr>";
                              echo "<td>".$i++."</td>";
                              echo "<td>".$row['roleName']."</td>";
                              echo "<td>".$row['roleId']."</td>";
                              echo "<td id = 'edit_delete_button'>
                                  <button type='button' id = 'edit' class='edit' onclick='myfunction(".$row['roleId'].", \"".$row['roleName']."\")'>Edit</button>
                                  </td>";
                              echo "</tr>";
                                
                          }
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
<script type="text/javascript" src="includejs/addnewrole.js"></script>
<?php
   include 'footer.php';
?>