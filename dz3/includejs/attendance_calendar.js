
/*-----------------------------For the calendar--------------------*/
$(document).ready(function(){
    $("#datepicker").datepicker({
        //showOtherMonths: true,
        dateFormat: "dd-mm-yy",
        inline:true,
       // firstDay: 1,
        changeMonth: true,
        changeYear: true,
    }).on("change",function(){
       document.getElementById("date_value").value = $(this).val();
    });

    /*$("#datepicker").change(function(){

        var date_format = "dd-mm-yy";

        document.getElementById("date_value").value = $(this).val();
    });*/

   /* $("#from_datepicker").datepicker({
        dateFormat: "dd-mm-yy",
        changeMonth: true,
        changeYear: true,
        showOtherMonths: true
    });
    $("#to_datepicker").datepicker({
        dateFormat: "dd-mm-yy",
        changeMonth: true,
        changeYear: true,
        showOtherMonths: true
    });*/
});

/*-------------------------------CHECK ALL OPTONS----------------------------*/

function checkAll(source)
{
	checkboxes = document.getElementsByName('checkList[]');
		for(var i in checkboxes)
			checkboxes[i].checked = source.checked;
	
}

