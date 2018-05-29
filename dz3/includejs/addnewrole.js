function myfunction(role_id, role_name)
{
	document.getElementById('add_new_role_id').value = role_id;
	document.getElementById('add_new_role_name').value = role_name; 
	document.getElementById("delete").style.display="table-row";
    document.getElementById("update").style.display="table-row";
}