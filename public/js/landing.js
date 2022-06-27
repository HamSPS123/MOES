//Mobile Toggle Button
var btnMenuToggle = document.querySelector(".btnMenuToggle");
var menutoggle = document.querySelector(".menu-navbar");

btnMenuToggle.addEventListener("click", mnToggle);

function mnToggle() {
    menutoggle.classList.toggle("hidden");
}


//Fixed Header on scroll
var Header = document.querySelector(".header-menu");

window.addEventListener('scroll', ()=>{
    let page = window.pageYOffset
    if(page > 0 ){
        Header.classList.add("fixed");
        Header.classList.remove("py-4");
    }
    else{
        Header.classList.remove("fixed");
        Header.classList.add("py-4");
    }
})
