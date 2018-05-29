<?php
   include 'header.php';
   include 'navigation.php';
   include 'breadcrumb.php';
?>
<div class = "row" >
		<div class = "col-1">
			
		</div>
		<div class = "col-2">
      <!--For Creat User -->
      <div class="w3-panel w3-white" id = "panel_create_user">
      <p id = "table_heading_createUser">Create User</p>
        <form  class = "create_user_form" action="includes/createuser.inc.php" method ="POST">
           <table class="create_user_table">
            <tr>
               <td></td>
               <td><input type="text" name="create_user_name_id"  id="create_user_name_id" hidden></td>
             </tr>
             <tr>
               <td><label>User Name</label></td>
               <td><input type="text" name="create_user_name"  id="create_user_name" required></td>
             </tr>
             <tr id="current_password">
               <td><label>Current Password</label></td>
               <td><input type="password" name="create_user_current_password" id="create_user_current_password"></td>
             </tr>
             <tr>
               <td><label>New Password</label></td>
               <td><input type="password" name="create_user_new_password" id="create_user_new_password" required></td>
             </tr>
              <tr>
               <td><label>Confirm Password</label></td>
               <td><input type="password" name="create_user_confirm_password" required></td>
             </tr>
              <tr>
               <td><label>Role</label></td>
               <td>
               	<select class="create_user_select" name="create_user_role_name" id="create_user_role_name">
								<?php
									include 'includes/dbh.inc.php';

									$sql_select = "SELECT * FROM role_table";
									$result = mysqli_query($conn, $sql_select);
									$result_check = mysqli_num_rows($result);

									if($result_check < 0)
									{
										header("Location: ../createuser.php?createuser=no_role");
										exit();
									}
									else
									{
										while($row = mysqli_fetch_assoc($result)){

											echo "<option value ='".$row['roleId']."' id='".$row['roleId']."'>".$row['roleName']."</option>";
										}
									}
								?>
								
				</select>
				</td>
             </tr>
             <tr>
                <td></td>
                <td id = "create_user_add_update_button">
                  <button id="add_user" name = "add">Add User</button>
                </td>
             </tr>
             <tr>
               <td></td>
               <td>
                  <button id="update" name = "update" hidden>Update User</button>
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
<!--For table generation or user search and edit table-->
<div class = "row" >
    <div class = "col-1">
      
    </div>
    <div class = "col-2">
      <div class="w3-panel w3-white" id = "panel2_create_user">
        <form class = "create_user_table_information" action="includes/createuser.inc.php" method="POST">
          <table class = "create_user_table_information_table">
            <tr>
              <th>#</th>
              <th>User Name</th>
              <th>Password</th>
              <th>Role</th>
              <th id = "search_bar">
                <input type="text" placeholder="Search User" id="search_create_user"  name="search_create_user">
                <button id = "create_user_search" name="create_user_search">Search</button>
              </th>
            </tr>
            <?php
               include 'includes/dbh.inc.php';

               $i = 1;

              $fullUrl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

              if(strpos($fullUrl, "found") == true ){

                if(isset($_SESSION['search_info']))
                {
                  $search = $_SESSION['search_info'];
                  $sql_select = "SELECT * from login_table WHERE userName = '$search'";

                  $result = mysqli_query($conn, $sql_select);
                  $result_check = mysqli_num_rows($result);

                  while($row = mysqli_fetch_assoc($result))
                  {
                     $role_value  = $row['roleId'];

                     $sql_select_role = "SELECT roleName from role_table WHERE roleId='$role_value'";

                     $result_role = mysqli_query($conn, $sql_select_role);
                     $result_role_check = mysqli_num_rows($result_role);

                     while($row1 = mysqli_fetch_assoc($result_role))
                     {
                        echo "<tr>";
                        echo "<td>".$i++."</td>";
                        echo "<td>".$row['userName']."</td>";
                        echo "<td>".$row['userPassword']."</td>";
                        echo "<td>".$row1['roleName']."</td>";
                        echo "<td id = 'edit_delete_button'>
                               <button type='button' id = 'edit' class='edit' onclick='myfunction(\"".$row['userName']."\",\"".$row['roleId']."\")'>Edit</button>
                               </td>";
                        echo "</tr>";
                     }
                  }

                }

              }
              elseif(strpos($fullUrl, "user_not_found") == true )
              {
                  $sql_select = "SELECT * FROM login_table";
                  $result = mysqli_query($conn, $sql_select);
                  $result_check = mysqli_num_rows($result);

                  if($result_check < 1)
                  {
                    header("Location: ../createUser.php?login_table=no_data");
                    exit();
                  }

                  else
                    {
                      if($result_check > 1)
                      {
                        while($row = mysqli_fetch_assoc($result))
                        {
                           $role_id = $row['roleId'];

                           $sql_select_role = "SELECT roleName FROM role_table WHERE roleId = '$role_id'";
                           $result_role = mysqli_query($conn, $sql_select_role);
                           $result_role_check = mysqli_num_rows($result_role);

                           if($result_role_check > 0)
                           {
                            while($row2 = mysqli_fetch_assoc($result_role))
                            {
                               echo "<tr>";
                               echo "<td>".$i++."</td>";
                               echo "<td>".$row['userName']."</td>";
                               echo "<td>".$row['userPassword']."</td>";
                               echo "<td>".$row2['roleName']."</td>";
                               echo "<td id = 'edit_delete_button'>
                                     <button type='button' id = 'edit' class='edit' onclick='myfunction(\"".$row['userName']."\",\"".$row['roleId']."\")'>Edit</button>
                                     </td>";
                               echo "</tr>";
                            }
                             
                           }
                          
                        }
                      }
                    }

              }

              else
              {
                    $sql_select = "SELECT * FROM login_table";
                    $result = mysqli_query($conn, $sql_select);
                    $result_check = mysqli_num_rows($result);

                    if($result_check < 1)
                    {
                      header("Location: ../createUser.php?login_table=no_data");
                      exit();
                    }
                    else
                    {
                      if($result_check > 1)
                      {
                        while($row = mysqli_fetch_assoc($result))
                        {
                           $role_id = $row['roleId'];

                           $sql_select_role = "SELECT roleName FROM role_table WHERE roleId = '$role_id'";
                           $result_role = mysqli_query($conn, $sql_select_role);
                           $result_role_check = mysqli_num_rows($result_role);

                           if($result_role_check > 0)
                           {
                            while($row2 = mysqli_fetch_assoc($result_role))
                            {
                               echo "<tr>";
                               echo "<td>".$i++."</td>";
                               echo "<td>".$row['userName']."</td>";
                               echo "<td>".$row['userPassword']."</td>";
                               echo "<td>".$row2['roleName']."</td>";
                               echo "<td id = 'edit_delete_button'>
                                     <button type='button' id = 'edit' class='edit' onclick='myfunction(\"".$row['userName']."\",\"".$row['roleId']."\")'>Edit</button>
                                     </td>";
                               echo "</tr>";
                            }
                             
                           }
                          
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
<script type="text/javascript" src="includejs/createuser_edit.js">
 
</script>
<?php
   include 'footer.php';
?>