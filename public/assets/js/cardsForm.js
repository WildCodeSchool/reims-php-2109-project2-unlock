cards = document.getElementsByClassName("card");

for (let i in cards) {
    cards[i].getElementsByTagName("input")[0].checked = false;
    cards[i].onmousedown = function() {
        checkbox = cards[i].getElementsByTagName("input")[0];
        checkbox.checked ? checkbox.checked = false : checkbox.checked = true;
        checkbox.checked ? cards[i].classList.add("checked") : cards[i].classList.remove("checked");
    };
}