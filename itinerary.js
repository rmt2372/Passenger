$(function() {
	$('#1star').click(function(){starClick(1)})
	$('#2star').click(function(){starClick(2)})
	$('#3star').click(function(){starClick(3)})
	$('#4star').click(function(){starClick(4)})
	$('#5star').click(function(){starClick(5)})
})
function starClick(stars){
	myRating = stars
	for (i=0; i<=5; i++){
		if (i <= stars){
			$('#' + i +"star").text('\u2605')       
			$('#' + i + "star").css("font-size", "36pt")
                }
		else{
			$('#' + i +"star").text('\u2606') 
			$('#' + i + "star").css("font-size", "30pt")
		}
	updateRating()
	}
}

dest = $('title').text()
function updateRating(){
	ajaxRequest = new XMLHttpRequest();
	ajaxRequest.onreadystatechange = function(){
		if (ajaxRequest.readyState == 4){
			//update star rating in top bar
			//response text
			responseDisplay = document.getElementById('ratingFeedback')
			responseDisplay.innerHTML = ajaxRequest.responseText
		}
	}
	queryString = "?dest=" + dest + "&stars=" + myRating
	ajaxRequest.open("GET", "rating.php" + queryString, true)
	ajaxRequest.send()

}
