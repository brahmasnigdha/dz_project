function myfunction(username, role_id)
  {
    document.getElementById("create_user_name_id").value = username;
    document.getElementById("create_user_name").value = username;
    document.getElementById(role_id).selected = "true";
    document.getElementById("current_password").style.display="table-row";
    document.getElementById("delete").style.display="table-row";
    document.getElementById("update").style.display="table-row";

  }
	

	