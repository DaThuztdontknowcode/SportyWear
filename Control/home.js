// script.js

function scrollToSection1() {
    // Get the position of the section-1 element
    var section1Position = document.getElementById('section-1').offsetTop;

    // Scroll to the section-1 element with a smooth animation
    window.scrollTo({
        top: section1Position,
        behavior: 'smooth'
    });
}
function scrollToSection2() {
    // Get the position of the section-2 element
    var section2Position = document.getElementById('section-2').offsetTop;

    // Scroll to the section-2 element with a smooth animation
    window.scrollTo({
        top: section2Position,
        behavior: 'smooth'
    });
}
document.getElementById('scrollToTopBtn').addEventListener('click', function() {
    scrollToTop();
});

function scrollToTop() {
    const scrollToTopBtn = document.getElementById('scrollToTopBtn');

    // Scroll to the top smoothly
    window.scrollTo({
        top: 0,
        behavior: 'smooth'
    });
}

// Show/hide the button based on scroll position
window.onscroll = function() {
    const scrollToTopBtn = document.getElementById('scrollToTopBtn');
    if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
        scrollToTopBtn.style.display = "block";
    } else {
        scrollToTopBtn.style.display = "none";
    }
};