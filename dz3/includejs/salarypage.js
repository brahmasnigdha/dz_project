function getSalaryInfo(empId, empFname, empMname, empLname, empDept, empBasicSalary)
{
	var check_input = document.getElementById("employee_checkbox").checked;
	if(check_input == true)
	{
		//populate the text boxes below with employee information 

		document.getElementById("salary_details_employee_ID").value = empId;
		document.getElementById("salary_details_employee_name").value = empFname+" "+empMname+" "+empLname;
		document.getElementById("salary_details_department").value = empDept;
		document.getElementById("salary_details_basic_salary").value = empBasicSalary;
          
       /* document.getElementById("salary_details_tax_deduction").value = ;
        document.getElementById("salary_details_hra").value = ;
        document.getElementById("salary_details_ta").value = ;
        document.getElementById("salary_details_da").value = ;
        document.getElementById("salary_details_net_salary").value = ;*/

	}
}