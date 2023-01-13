let dot1 = document.getElementById('dot1');
let dot2 = document.getElementById('dot2');

let rent = document.getElementById('rent');
let retrn = document.getElementById('return');

function Slider1(e) {
    dot1.style.backgroundColor = "black";
    dot2.style.backgroundColor = "rgb(180, 180, 180)";

    rent.style.display = "inline";
    retrn.style.display = "none";
}

function Slider2(e) {
    dot2.style.backgroundColor = "black";
    dot1.style.backgroundColor = "rgb(180, 180, 180)";

    retrn.style.display = "inline";
    rent.style.display = "none";
}

dot1.addEventListener("click", Slider1)
dot2.addEventListener("click", Slider2)