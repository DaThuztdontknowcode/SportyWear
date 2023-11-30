// // script.js

// function scrollToSection1() {
//     // Get the position of the section-1 element
//     var section1Position = document.getElementById('section-1').offsetTop;

//     // Scroll to the section-1 element with a smooth animation
//     window.scrollTo({
//         top: section1Position,
//         behavior: 'smooth'
//     });
// }

// function scrollToSection2() {
//     // Get the position of the section-2 element
//     var section2Position = document.getElementById('section-2').offsetTop;

//     // Scroll to the section-2 element with a smooth animation
//     window.scrollTo({
//         top: section2Position,
//         behavior: 'smooth'
//     });
// }

document.getElementById('scrollToTopBtn').addEventListener('click', function() {
    scrollToTop();
});

function scrollToTop() {
    const scrollToTopBtn = document.getElementById('scrollToTopBtn');

    // Scroll to the top smoothly with ease-in-out transition
    window.scrollTo({
        top: 0,
        behavior: 'smooth'
    });
}


window.onscroll = function() {
    const scrollToTopBtn = document.getElementById('scrollToTopBtn');
    if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
        scrollToTopBtn.style.display = "block";
    } else {
        scrollToTopBtn.style.display = "none";
    }
};
function isInViewport(element) {
    var rect = element.getBoundingClientRect();
    return (
        rect.top >= 0 &&
        rect.left >= 0 &&
        rect.bottom <= (window.innerHeight || document.documentElement.clientHeight) &&
        rect.right <= (window.innerWidth || document.documentElement.clientWidth)
    );
}

function handleFadeIn() {
    var elements = document.querySelectorAll('.fade-in');
    elements.forEach(function(element) {
        if (isInViewport(element)) {
            element.classList.add('active');
        }
    });
}

handleFadeIn();

window.addEventListener('scroll', function() {
    handleFadeIn();
});
function scrollToSection1() {
    console.log("Scrolling to Section 1");
}
document.querySelector('.zoom-image').addEventListener('mouseenter', function() {
    this.style.transform = 'scale(1.2)';
    this.style.zIndex = '2';
});

document.querySelector('.zoom-image').addEventListener('mouseleave', function() {
    this.style.transform = 'scale(1)';
    this.style.zIndex = '1';
});
function redirectToPage1() {
    window.location.href = "all_products.php?category=14";
}
document.addEventListener("DOMContentLoaded", function () {
    // Lấy danh sách các hình ảnh trong section-3
    var images = document.querySelectorAll("#section-3 .image-column img");

    // Hiển thị hình ảnh lần lượt từ trái qua phải khi lướt xuống
    window.addEventListener("scroll", function () {
        images.forEach(function (image, index) {
            if (isInViewport(image) && !image.classList.contains("visible")) {
                setTimeout(function () {
                    image.classList.add("visible");
                }, index * 200); // Thời gian hiển thị giữa các hình là 200ms
            }
        });
    });

    // Kiểm tra xem một phần tử có trong tầm nhìn không
    function isInViewport(element) {
        var rect = element.getBoundingClientRect();
        return (
            rect.top >= 0 &&
            rect.left >= 0 &&
            rect.bottom <= (window.innerHeight || document.documentElement.clientHeight) &&
            rect.right <= (window.innerWidth || document.documentElement.clientWidth)
        );
    }
});