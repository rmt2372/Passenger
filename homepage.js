var images = new Array("slideshow/canada.jpg", "slideshow/china.jpg", "slideshow/arizona.jpg", "slideshow/waterfall.jpg", "slideshow/india.jpg","slideshow/mcwayfalls.jpg", "slideshow/capetown.jpg", "slideshow/dunes.jpg", "slideshow/iceland.jpg", "slideshow/london.jpg", "slideshow/newzealand.jpg")

var display = setInterval("slideshow()", 2000) ; var i = 0

function slideshow()
    {document.getElementById("img").setAttribute("src", images[i])
    i = (i+1) % images.length}