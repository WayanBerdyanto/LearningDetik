const preLoaderWrapper = document.querySelector("#loader");
window.addEventListener("load", function (e) {
    preLoaderWrapper.classList.add("fade-out-animation");
});

window.onscroll = function(){
    const header = document.querySelector('.navbar-blur');
    const fixedNav = header.offsetTop;
    if(window.pageYOffset > fixedNav) {
        header.classList.add('fixed-top');
    }else{
        header.classList.remove('fixed-top');
    }
}
