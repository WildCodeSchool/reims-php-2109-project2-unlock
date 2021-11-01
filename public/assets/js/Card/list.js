cards = document.getElementsByClassName("card");
option = document.getElementById("option");
listOption = document.getElementById("list-option");

option.addEventListener("input", function() {
    for (index in cards) {
        cards[index].classList.toggle("list-style");
    }
});

if (listOption.checked) {
    for (index in cards) {
        cards[index].classList.add("list-style");
    }
}