

// show.html.twig
const gameShowTitles = document.querySelectorAll('.game-show-title');
gameShowTitles.forEach(gameShowTitle => {
	const textGameShowTitle = gameShowTitle.textContent;
	gameShowTitle.style.fontSize = "2rem";
	if (textGameShowTitle.length > 20) {
		gameShowTitle.style.fontSize = "1.8rem";
	}
});

const gameShowDescriptionPs = document.querySelectorAll('.game-show-description-p');
gameShowDescriptionPs.forEach(gameShowDescriptionP => {
	const textGameShowDescriptionP = gameShowDescriptionP.textContent;
	gameShowDescriptionP.style.fontSize = "1.5rem";
	if (textGameShowDescriptionP.length > 100) {
		gameShowDescriptionP.style.fontSize = "1rem";
	}
});

const gameShowInstructionPs = document.querySelectorAll('.game-show-instruction-p');
gameShowInstructionPs.forEach(gameShowInstructionP => {
	const textGameShowInstructionP = gameShowInstructionP.textContent;
	gameShowInstructionP.style.fontSize = "1.9rem";
	if (textGameShowInstructionP.length > 25) {
		gameShowInstructionP.style.fontSize = "1.4rem";
	}
	if (textGameShowInstructionP.length > 50) {
		gameShowInstructionP.style.fontSize = "1rem";
	}
});

// list.html.twig
const cardTitles = document.querySelectorAll('.card-title');
cardTitles.forEach(cardTitle => {
	const textCardTitle = cardTitle.textContent;
	cardTitle.style.fontSize = "2rem";
	if (textCardTitle.length > 9) {
		cardTitle.style.fontSize = "1.5rem";
	}
});

// _cardNumbers.html.twig
const gameTitles = document.querySelectorAll('.game-title');
gameTitles.forEach(gameTitle => {
	const textgameTitle = gameTitle.textContent;
	gameTitle.style.fontSize = "2rem";
	if (textgameTitle.length > 9) {
		gameTitle.style.fontSize = "1.5rem";
	}
});
