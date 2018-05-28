function validateForm(){
	var x = document.forms["loginForm"]["username"].value;
	var y = document.forms["loginForm"]["password"].value;

	if(x == "" && y == "")
	{
		alert("Both username and password is empty");
		return false;
	}
	else
	{
		if(y == "")
		{
			alert("Password is empty");
			return false;
		}
		else
		{
			if(x == "")
			{
				alert("Username is empty");
				return false;
			}
		}
	}
}