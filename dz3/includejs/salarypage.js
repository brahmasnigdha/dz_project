function getSalaryInfo(empId, empFname, empMname, empLname, empDept, empBasicSalary)
{
	document.getElementById("salary_details_employee_ID").value = empId;
    document.getElementById("salary_details_employee_name").value = empFname+" "+empMname+" "+empLname;
	document.getElementById("salary_details_department").value = empDept;
	document.getElementById("salary_details_basic_salary").value = empBasicSalary;
}

function netSalary()
{
	/*
       Tax deduction
       HRA
       TA
       DA
       Net Salary
	*/

	var net_salary = parseInt(document.getElementById("salary_details_basic_salary").value);
    var tax_deduction = parseInt(document.getElementById("salary_details_tax_deduction").value);
    var hra = parseInt(document.getElementById("salary_details_hra").value);
    var ta = parseInt(document.getElementById("salary_details_ta").value);
    var da = parseInt(document.getElementById("salary_details_da").value);

    var net_salary_add = net_salary - tax_deduction + hra + ta + da;

    if(!isNaN(net_salary_add))
    {
        document.getElementById("salary_details_net_salary").value = net_salary_add;
    }
	  
}