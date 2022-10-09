document.getElementById("noopen-popup-btn").addEventListener("click", function() {
    document.getElementsByClassName("nopopup")[0].classList.add("active");
});

document.getElementById("dismiss-popup-btn").addEventListener("click", function() {
    document.getElementsByClassName("nopopup")[0].classList.remove("active");
});