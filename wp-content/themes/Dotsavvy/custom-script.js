jQuery(document).ready(function($) {
    let observer = new IntersectionObserver((entries, observer) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                // Reveal the element with a fade-in effect
                $(entry.target).removeClass('opacity-0 translate-y-10');
                
                // Animate the counter once the element is in view
                $(entry.target).find('.statistic-number').each(function() {
                    var $this = $(this);
                    var targetNumber = $this.data('number');
                    var symbol = $this.data('symbol') || ''; // Get symbol if available, else empty string
                    var duration = 2000; // Duration of the animation in milliseconds

                    $({ count: 0 }).animate({ count: targetNumber }, {
                        duration: duration,
                        easing: 'swing',
                        step: function() {
                            $this.text(Math.ceil(this.count) + symbol);
                        },
                        complete: function() {
                            $this.text(this.count + symbol);
                        }
                    });
                });

                // Unobserve the element to prevent multiple animations
                observer.unobserve(entry.target);
            }
        });
    }, { threshold: 0.1 });

    // Observe each statistic block
    $('.track-card').each(function() {
        observer.observe(this);
    });
});
let slideIndex = 0;

function showSlides() {
    const slides = document.querySelector('.carousel-slides');
    const totalSlides = document.querySelectorAll('.carousel-slide').length;

    if (slideIndex >= totalSlides) {
        slideIndex = 0;
    } else if (slideIndex < 0) {
        slideIndex = totalSlides - 1;
    }

    slides.style.transform = `translateX(-${slideIndex * 100}%)`;
}

function moveSlide(n) {
    slideIndex += n;
    showSlides();
}

// Initial call to show the first slide
document.addEventListener('DOMContentLoaded', (event) => {
    showSlides();
});

// Optional: Auto-slide functionality
setInterval(() => moveSlide(1), 3000); // Change slide every 3 seconds


document.addEventListener('DOMContentLoaded', () => {
    const elements = document.querySelectorAll('.fade-in-up');

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('animate');
                observer.unobserve(entry.target);
            }
        });
    }, {
        threshold: 0.1 // Adjust this value as needed
    });

    elements.forEach(element => {
        observer.observe(element);
    });
});

document.addEventListener('DOMContentLoaded', () => {
    const brandItems = document.querySelectorAll('.brand-item');

    const observerOptions = {
        root: null, // Use the viewport as the root
        rootMargin: '0px',
        threshold: 0.1 // Trigger when 10% of the section is in view
    };

    const observer = new IntersectionObserver((entries, observer) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const item = entry.target;
                item.classList.add('visible');
                observer.unobserve(item); // Stop observing once the animation starts
            }
        });
    }, observerOptions);

    brandItems.forEach((item, index) => {
        item.style.setProperty('--animation-delay', `${index * 0.5}s`);
        observer.observe(item);
    });
});
document.addEventListener('DOMContentLoaded', () => {
    const menuButton = document.querySelector('#menu'); // The menu button (image)
    const menuContainer = document.querySelector('#menu-container'); // The menu container

    // Toggle the menu when the button is clicked
    menuButton.addEventListener('click', (event) => {
        event.stopPropagation(); // Prevent the click from triggering the document event
        if (menuContainer.classList.contains('show')) {
            menuContainer.classList.remove('show');
            setTimeout(() => {
                menuContainer.style.display = 'none';
            }, 300); // Match the transition duration
        } else {
            menuContainer.style.display = 'block';
            setTimeout(() => {
                menuContainer.classList.add('show');
            }, 10); // Small delay to ensure display is set before transition
        }
    });

    // Hide the menu when clicking outside of it
    document.addEventListener('click', (event) => {
        if (!menuContainer.contains(event.target) && !menuButton.contains(event.target)) {
            if (menuContainer.classList.contains('show')) {
                menuContainer.classList.remove('show');
                setTimeout(() => {
                    menuContainer.style.display = 'none';
                }, 300); // Match the transition duration
            }
        }
    });
});
