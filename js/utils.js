function noticeMe (element) {
    element.scrollIntoView({behavior: "smooth", block: "center"});
    element.classList.add("notice-animation");
    element.style.animation = 'none';
    element.offsetHeight;
    element.style.animation = null;
}