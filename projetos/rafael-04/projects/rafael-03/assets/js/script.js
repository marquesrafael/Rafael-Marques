$(document).ready(documentReady);

function documentReady() {
	var characterCollection 	= ["A", "#", "C", "D", "E", "$", "G", "H", "&", "J", "%", "L", "M", "N", "O", "P", "R", "S", "T", "U", "V", "Y", "Z"];
	var currentText 			= $(".effect u").text();
	var currentTextCollection 	= new Array();
	var characterCount			= 0;
	var characterSpeed			= 300;

	pushCurrentTextChrachters();

	function pushCurrentTextChrachters () {
		for(var i = 0; i < currentText.length; i++) {
			var currentCharacter = currentText.slice(i, i+1);
			currentTextCollection.push(currentCharacter);
		}
	}

	var characterCountIncreaseInterval = setInterval(characterCountIncrease, characterSpeed);

	function characterCountIncrease () {
		if (characterCount == currentTextCollection.length) {
			clearInterval(characterCountIncreaseInterval);
			clearInterval(setRandomTextInterval);
		}
		characterCount++;
	}

	function getRandomText () {
		var result = "";
		if(characterCount == 0) {
			for(var i = 0; i < currentTextCollection.length; i++) {
				var randomCharacter = characterCollection[ Math.floor( Math.random() * characterCollection.length ) ];
				result += randomCharacter;
			}
		} else {
			result = currentText.slice(0, characterCount);
			for(var i = 0; i < currentTextCollection.length - characterCount; i++) {
				var randomCharacter = characterCollection[ Math.floor( Math.random() * characterCollection.length ) ];
				result += randomCharacter;
			}
		}
		return result;
	}

	var setRandomTextInterval = setInterval(setRandomText, 100);

	function setRandomText () {
		console.log(getRandomText());
		$(".effect u").text(getRandomText());
	}
}