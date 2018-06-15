

/*---------------------------Date picker from and to-------------------------*/
/*------------Activate attendance status and allow update of the attendance-------------*/

$(document).ready(function(){    
    var from = $("#from_datepicker").datepicker({
        dateFormat: "dd-mm-yy",
        changeMonth: true
    }).on("change", function(){
        to.datepicker("option","minDate",getDate(this));
    }),
    to = $("#to_datepicker").datepicker({
        dateFormat: "dd-mm-yy",
        changeMonth: true
    }).on("change", function(){
        from.datepicker("option","maxDate",getDate(this));
    });

    function getDate(element){
        var date;
        var dateFormat = "dd-mm-yy";
        try{
            date = $.datepicker.parseDate(dateFormat, element.value);
        }
        catch(error){
            date = null;
        }
        return date;
    }   
    
   $("button").click(function(){

       //perform the following task
       var get_id = $(this).attr('id');

       //get the string and break the string into two parts
       //if edit_"some number" then the string should be edit_ and "some number"
       //if its delete_"some number" then the should be delete_ and "some number"

       //split the string into two parts

       var result = get_id.split("_");

       if(result[0] === "edit")
       {
        
         alert("Edit yes! "+result[1]);
       }

       else
       {
         alert("Delete no! "+result[1]);
       }



      // alert($(this).attr('id'));
   });

});






 