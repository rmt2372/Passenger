newRating = false
dest = $('title').text()
avgRating()
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

function updateRating(){
	ajaxRequest = new XMLHttpRequest();
	ajaxRequest.onreadystatechange = function(){
		if (ajaxRequest.readyState == 4){
			//response text
			responseDisplay = document.getElementById('ratingFeedback')
			responseDisplay.innerHTML = ajaxRequest.responseText
			newRating = true
			avgRating()
		}
	}
	queryString = "?dest=" + dest + "&stars=" + myRating
	ajaxRequest.open("GET", "rating.php" + queryString, true)
	ajaxRequest.send()
}

function avgRating(){
	ajaxRequest = new XMLHttpRequest();
	ajaxRequest.onreadystatechange = function(){
		if (ajaxRequest.readyState == 4){
		//	updatedStars = document.getElementById('totalRating')
		//updatedStars.innerHTML = ajaxRequest.responseText
		starRating = ajaxRequest.responseText
		starString = '\u2605'.repeat(Math.trunc(starRating))
		starString += '\u2606'.repeat(Math.ceil(5-starRating));
		starString += " " + starRating +"/5 stars";
		$('#rating').text(starString)
		}
	
	}
	queryString = "?new=" + newRating + "&dest=" + dest
	ajaxRequest.open("GET", "newRating.php" + queryString, true)
	ajaxRequest.send()


}
