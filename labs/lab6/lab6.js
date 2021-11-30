function validate()
{
	// validate form input
	var field_default_error = "This field cannot have the default value.";
	var field_empty_error = "This field cannot be empty.";
	var field_long_error = "This text is too long.";
	var field_select_error = "Select a correct option.";
	var field_password_error = "Incorrect password.";
	var name_good = false;
	var surname_good = false;
	var mail_good = false;
	var year_good = false;
	var pass_good = false;

	if(document.form1.field_name.value.length == 0)
		document.getElementById("f_name_err").innerHTML = field_empty_error;
	else if(document.form1.field_name.value == "name")
		document.getElementById("f_name_err").innerHTML = field_default_error;
	else if(document.form1.field_name.value.length > parseInt(document.form1.field_name.getAttribute("size")))
		document.getElementById("f_name_err").innerHTML = field_long_error;
	else
	{
		document.getElementById("f_name_err").innerHTML = "";
		name_good = true;
	}

	if(document.form1.field_surname.value.length == 0)
		document.getElementById("f_surname_err").innerHTML = field_empty_error;
	else if(document.form1.field_surname.value == "surname")
		document.getElementById("f_surname_err").innerHTML = field_default_error;
	else if(document.form1.field_surname.value.length > parseInt(document.form1.field_surname.getAttribute("size")))
		document.getElementById("f_surname_err").innerHTML = field_long_error;
	else
	{
		document.getElementById("f_surname_err").innerHTML = "";
		surname_good = true;
	}

	if(document.form1.field_mail.value.length == 0)
		document.getElementById("f_mail_err").innerHTML = field_empty_error;
	else if(document.form1.field_mail.value == "e-mail")
		document.getElementById("f_mail_err").innerHTML = field_default_error;
	else if(document.form1.field_mail.value.length > parseInt(document.form1.field_mail.getAttribute("size")))
		document.getElementById("f_mail_err").innerHTML = field_long_error;
	else
	{
		document.getElementById("f_mail_err").innerHTML = "";
		mail_good = true;
	}

	if(document.form1.field_year.options.selectedIndex == 0)
		document.getElementById("f_year_err").innerHTML = field_select_error;
	else
	{
		document.getElementById("f_year_err").innerHTML = "";
		year_good = true;
	}

	if(document.form1.field_password.value.length > 0)
	{
		pass_good = true;
	}
	else
	{
		document.getElementById("f_password_err").innerHTML = field_password_error;
		pass_good = false;
	}

	var is_good = name_good && surname_good && mail_good && year_good && pass_good;
	document.getElementById("submit_err").innerHTML = is_good ? "" : "Fix incorrect field values.";

	// return true if all fields have been filled correctly, false otherwise
	return is_good;
}
