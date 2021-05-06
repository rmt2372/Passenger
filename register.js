function userValidate(){
		userSuggest = document.getElementById('userCheck')
		userInput = document.getElementById('user').value
		if (! userInput.match("^[a-zA-Z0-9]+$")){
			userSuggest.innerHTML = "Username can only contain letters and digits"
			userSuggest.style.color = "red"
			return false
		}

		else if (userInput.length < 6){
			userSuggest.innerHTML = "Username must be at least 6 characters"
			userSuggest.style.color = "red"
			return false
		}
		else if (userInput.length > 20){
			userSuggest.innerHTML = "Username must be fewer than 20 characters"
			userSuggest.style.color = "red"
			return false
		}
		else{
			userSuggest.innerHTML = "&check;"
			userSuggest.style.color = "green"
			return true
		}
	}

	function passValidate(){
		passSuggest = document.getElementById('passCheck')
		passInput = document.getElementById('pass').value
		if (! passInput.match("^[a-zA-Z0-9]+$")){
			passSuggest.innerHTML = "Password can only contain letters and digits"
			passSuggest.style.color = "red"
			return false
		}
		else if (passInput.length < 6){
			passSuggest.innerHTML = "Password must be at least 6 characters"
			passSuggest.style.color = "red"
			return false
		}
		else if (passInput.length > 20){
			passSuggest.innerHTML = "Password must be fewer than 20 characters"
			passSuggest.style.color = "red"
			return false
		}
		else{
			passSuggest.innerHTML = " &check;"
			passSuggest.style.color = "green"
			return true
		}
	}

	function pass2Validate(){
		passInput = document.getElementById('pass').value
		pass2Input = document.getElementById('pass2').value
		pass2Suggest = document.getElementById('pass2Check')
		if (passInput == pass2Input){
			pass2Suggest.innerHTML = " &check;"
			pass2Suggest.style.color = "green"
			return true
		}else{
			pass2Suggest.innerHTML = "Passwords must match!"
			pass2Suggest.style.color = "red"
			return false
		}
	}

	function register(){
		if (userValidate() && passValidate() && pass2Validate()){
			ajaxRequest = new XMLHttpRequest();
			ajaxRequest.onreadystatechange = function(){
				if (ajaxRequest.readyState == 4){
					ajaxDisplay = document.getElementById('ajaxDiv')
					if (ajaxRequest.responseText == "Success!"){
						window.location.href = "forum.php"
					} else{
						ajaxDisplay.innerHTML = ajaxRequest.responseText
					}
				}
			}
			username = document.getElementById('user').value
                	password = document.getElementById('pass').value
			queryString = "?username=" + username +"&password="+password
			ajaxRequest.open("GET", "register.php" + queryString, true)
			ajaxRequest.send()
		} else{
			alert('All fields must be correctly filled in')
		}
	}

	
