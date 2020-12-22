window.onload = function() {
  // finds #type-in
  var paragraph = document.getElementById("type-in");
  var supparagraph = document.getElementById("type-after");
  // saves its content
  var text = paragraph.innerHTML;
  var textafter = supparagraph.innerHTML;
  // clears content
  paragraph.innerHTML = "";
  supparagraph.innerHTML = "";

  // for each letter in its content
  for (var i = 0, len = text.length; i < len; i++) {
    (function(i) {
      window.setTimeout(function() {
        // adds the letter
        paragraph.innerHTML += text[i];
        // waits 0.1s
      }, i * 100);
    })(i);
  }
  window.setTimeout(function() {
    supparagraph.style.borderRight = "3px solid #555";
    for (var i = 0, len = textafter.length; i < len; i++) {
      (function(i) {
        window.setTimeout(function() {
          // adds the letter
          supparagraph.innerHTML += textafter[i];
          // waits 0.1s
        }, i * 100);
      })(i);
    }
  }, text.length * 100 + 200);
};
