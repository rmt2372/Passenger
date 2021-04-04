document.addEventListener('DOMContentLoaded', function(){
    var stars = document.querySelectorAll('.star');
    stars.forEach(function(star){
        star.addEventListener('click', setRating); 
    });
    
    var rating = parseInt(document.querySelector('.stars').getAttribute('data-rating'));
    var target = stars[rating - 1];
    target.dispatchEvent(new MouseEvent('click'));
});

function setRating(ev){
    var span = ev.currentTarget;
    var stars = document.querySelectorAll('.star');
    var match = false;
    var num = 0;
    stars.forEach(function(star, index){
        if(match) {
            star.classList.remove('rated');
        }else {
            star.classList.add('rated');
        }
        //are we currently looking at the span that was clicked
        if(star === span) {
            match = true;
            num = index + 1;
        }
    });
    document.querySelector('.stars').setAttribute('data-rating', num);
}