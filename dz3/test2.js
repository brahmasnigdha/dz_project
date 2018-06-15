
	/*var para = document.createElement("p");
	var node = document.createTextNode("This is new.");
	para.appendChild(node);

	var element = document.getElementById("div1");
	element.appendChild(para);*/

    //initialization of date object
	var d = new Date();

    //initialization of month array 
    var month = ['Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sept','Oct','Nov','Dec'];
	var month_year = month[d.getMonth()]+" "+d.getFullYear();

	document.getElementById("prev").innerHTML = "<";
	document.getElementById("next").innerHTML = ">";
	document.getElementById("month_info").innerHTML = month_year;

	var month_first_day = new Date(d.getFullYear(), d.getMonth(), 1);
	var month_last_day = new Date(d.getFullYear(),d.getMonth() + 1, 0);

	//create element first day
	



	


