// // script.js

function scrollToSection(sectionId) {
    var section = document.getElementById(sectionId);
    if (section) {
        section.scrollIntoView({ behavior: 'smooth' });
    }
}

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
    window.location.href = "all_products.php?category=1";
}

function redirectToPage2() {
    window.location.href = "all_products.php?category=2";
}
function redirectToPage5() {
    window.location.href = "all_products.php?category=5";
}
function redirectToPage14() {
    window.location.href = "all_products.php?category=14";
}
// document.addEventListener('DOMContentLoaded', function () {
//     const btn = document.querySelector('.explore-btn');
//     const img = document.getElementById('follow-img');
    
//     btn.addEventListener('mouseenter', function () {
//         img.style.display = 'block';
//     });

//     btn.addEventListener('mousemove', function (e) {
//         const offsetX = 40; // Khoảng cách ngang từ con trỏ chuột đến hình ảnh
//         const offsetY = -150; // Khoảng cách dọc từ con trỏ chuột lên phía trên hình ảnh
//         img.style.left = (e.pageX + offsetX) + 'px';
//         img.style.top = (e.pageY + offsetY) + 'px';
//     });

//     btn.addEventListener('mouseleave', function () {
//         img.style.display = 'none';
//     });
// });

// 

document.addEventListener('DOMContentLoaded', function () {
    const buttons = document.querySelectorAll('.explore-btn');
    const images = document.querySelectorAll('.image-column img[id^="follow-img"]');

    buttons.forEach(function (btn, index) {
        const img = images[index];

        btn.addEventListener('mouseenter', function () {
            img.style.display = 'block';
        });

        btn.addEventListener('mousemove', function (e) {
            const offsetX = 40; 
            const offsetY = -150; 
            img.style.left = (e.pageX + offsetX) + 'px';
            img.style.top = (e.pageY + offsetY) + 'px';
        });

        btn.addEventListener('mouseleave', function () {
            img.style.display = 'none';
        });
    });
});
function redirectToProduct44() {
    window.location.href = '../Page/product_detail.php?product_id=44';
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