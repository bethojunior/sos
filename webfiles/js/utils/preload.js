function preload(status) {
    if (status) {
        document.getElementById("preloader").style.display = "block";
        return;
    }
    document.getElementById("preloader").style.display = "none";
}