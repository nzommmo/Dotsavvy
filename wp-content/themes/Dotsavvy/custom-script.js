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
