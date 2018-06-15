function edit_new(id)
{
   var dept_name = document.getElementById("name"+id).innerHTML;	
   var dept_location = document.getElementById("departmentLocation"+id).innerHTML;

   var dept_no = document.getElementById("departmentNo"+id).innerHTML;

   document.getElementById("department_id").value = dept_no;
   document.getElementById("department_name").value = dept_name;
   document.getElementById("department_location").value = dept_location;
   document.getElementById("delete").style.display="table-row";
   document.getElementById("update").style.display="table-row";

   //when clicked should focus on the department_name textbox
   document.getElementById("department_name").focus();
}





