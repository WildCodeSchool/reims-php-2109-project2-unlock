// show.html.twig
const gameShowTitle = document.querySelector('.game-show-title');
const textGameShowTitle = gameShowTitle.textContent;
gameShowTitle.style.fontSize = "2rem";
if (textGameShowTitle.length > 20) {
	gameShowTitle.style.fontSize = "1.5rem";
}
const gameShowDescriptionP = document.querySelector('.game-show-description-p');
const textGameShowDescriptionP = gameShowDescriptionP.textContent;
gameShowDescriptionP.style.fontSize = "1.5rem";
if (textGameShowDescriptionP.length > 100) {
	gameShowDescriptionP.style.fontSize = "1rem";
}
const gameShowInstructionP = document.querySelector('.game-show-instruction-p');
const textGameShowInstructionP = gameShowInstructionP.textContent;
gameShowInstructionP.style.fontSize = "1.9rem";
if (textGameShowInstructionP.length > 25) {
	gameShowInstructionP.style.fontSize = "1.4rem";
}
if (textGameShowInstructionP.length > 50) {
	gameShowInstructionP.style.fontSize = "1rem";
}
// list.html.twig
const cardTitle = document.querySelector('.card-title');
const textCardTitle = cardTitle.textContent;
cardTitle.style.fontSize = "2rem";
if (textCardTitle.length > 3) {
	cardTitle.style.fontSize = "0.5rem";
}


