function edit_new(id)
{
   var dept_name = document.getElementById("name"+id).innerHTML;	
   var dept_location = document.getElementById("departmentLocation"+id).innerHTML;

   var dept_no = document.getElementById("departmentNo"+id).innerHTML;

   var xhttp = "";
   if(window.XMLHttpRequest)
   {
   	 xhttp = new XMLHttpRequest();
   }
   else
   {
   	  xhttp = new ActiveXObject("Micosoft.XMLHTTP");
   }

    xhttp.onreadystatechange = function(){
      if(this.readyState == 4 && this.status == 200)
      {
      	document.getElementById("department_id").value = dept_no;
        document.getElementById("department_name").value = dept_name;
        document.getElementById("department_location").value = dept_location;
        document.getElementById("delete").style.display="table-row";
        document.getElementById("update").style.display="table-row";

      }
    };
    xhttp.open("GET", "department.php", true);
    xhttp.send();   
}





