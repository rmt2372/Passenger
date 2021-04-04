console.log("12")
function confirm(){
	q1_answered = ($("#usa").is(":checked")) || ($("#nonUSA").is(":checked"))
	q2_answered = ($("#coast").is(":checked")) || ($("#noCoast").is(":checked"))
	q3_answered = $('[name="activities[]"]:checked').length >0
	q4_answered = ($("#risk").is(":checked")) || ($("#noRisk").is(":checked"))
	if (q1_answered && q2_answered && q3_answered && q4_answered){
		alert("All questions answered. Survey results will be added soon!")
	} else {
		alert("Please answer every question.")
	}

}

function rollover(current){
	if (current.type == "button"){
		current.style.backgroundColor = "#c8cfcf";
	}
	else {current.style.backgroundColor = "#b8e3e3"}
}
function rollout(current){
	if (current.type == "button"){
		current.style.backgroundColor = "#37bfbf";
	}
	else {
		if (!$(current).children("input").is(":checked")){
			console.log("clicky")
			current.style.backgroundColor = "#ffffff"}
		
		else{
			current.style.backgroundColor = "#b8e3e3"
		}
	}
}


	


	
