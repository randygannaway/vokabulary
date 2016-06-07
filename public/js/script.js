
var key = 0;

$(document).ready(function() {
  $('.flashcard').on('click', function() {
    $('.flashcard').toggleClass('flipped');
  });
    document.getElementById("cardFront").innerHTML = words[key].word;
    document.getElementById("cardBack").innerHTML = words[key].translation;
    key++;
});    



function nextWord(){
    document.getElementById("cardFront").innerHTML = words[key].word;
    document.getElementById("cardBack").innerHTML = words[key].translation;
    if ((key+1) < words.length) {
        key++;
    } else {
        key = 0;
    }

}
