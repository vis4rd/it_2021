function signincheck()
{
	var error_email_too_short = "The given email address is too short.";
	var error_password_too_short = "The given password is too weak";
	var error_field_empty = "No field can be empty.";
	var error_not_email_address = "The given string is not a valid e-mail adress.";
	var error_string_too_long = "The given string is too long.";

	var email_good = false;
	var password_good = false;

	var email = document.signin.email.value;
	var password = document.signin.pass.value;
	var em = document.getElementById("email_error_message");
	var pa = document.getElementById("password_error_message");
	if(email.length == 0)
	{
		em.innerHTML = error_field_empty;
	}
	else if(email.length <= 5)
	{
		em.innerHTML = error_email_too_short;
	}
	else if(email.indexOf("@") == -1)  // does email address contain @ symbol
	{
		console.log(email.indexOf("@") == -1);
		em.innerHTML = error_not_email_address;
	}
	else if(email.length > 30)
	{
		em.innerHTML = error_string_too_long;
	}
	else
	{
		email_good = true;
	}

	if(password.length == 0)
	{
		pa.innerHTML = error_field_empty;
	}
	else if(password.length <= 5)
	{
		pa.innerHTML = error_password_too_short;
	}
	else if(password.length > 30)
	{
		pa.innerHTML = error_string_too_long;
	}
	else
	{
		password_good = true;
	}

	var is_good = email_good && password_good;
	return is_good;
}