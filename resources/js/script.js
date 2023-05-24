document.addEventListener("scroll", changeNavbar);

function changeNavbar(event) {
    const mainNavbar = document.querySelector("#mainNavbar")
    if(window.scrollY > 100) {
        mainNavbar.classList.add("thin");
        mainNavbar.classList.add("bg-dark");
    } else {
        mainNavbar.classList.remove("thin");
        mainNavbar.classList.remove("bg-black");
    }
}