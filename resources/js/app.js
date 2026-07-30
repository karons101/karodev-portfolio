import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();


/* ==========================================
   APPLICATION INITIALIZATION
========================================== */

document.addEventListener('DOMContentLoaded', () => {

    /* ==========================================
       COMPONENT: SCROLL PROGRESS BAR
    ========================================== */

    const scrollProgress = document.getElementById('scrollProgress');

    if (scrollProgress) {

        window.addEventListener('scroll', () => {

            const scrollTop = window.scrollY;

            const pageHeight =
                document.documentElement.scrollHeight -
                window.innerHeight;

            const progress = (scrollTop / pageHeight) * 100;

            scrollProgress.style.width = progress + "%";

        });

    }

    /* ==========================================
       COMPONENT: CONTACT AUTO FOCUS

       Purpose:
       Automatically places the typing cursor
       inside the Name field.
    ========================================== */

    const contactName = document.getElementById('contactName');

    if (contactName) {

        setTimeout(() => {

            contactName.focus();

        }, 500);

    }

    /* ==========================================
       COMPONENT: CONTACT ICON ANIMATION
    ========================================== */

    document.querySelectorAll('.input-group').forEach(group => {

        const input =
            group.querySelector('input, textarea');

        const icon =
            group.querySelector('.input-icon');

        if (input && icon) {

            input.addEventListener('focus', () => {

                if (input.id === 'contactName') {

                    icon.textContent = '👤';

                }

            });

            input.addEventListener('blur', () => {

                if (input.id === 'contactName') {

                    icon.textContent = '⚓';

                }

            });

        }

    });

    /* ==========================================
       COMPONENT: ANIMATED STATISTICS COUNTER

       Purpose:
       Animates statistics when they enter
       the viewport.
    ========================================== */

    const counters = document.querySelectorAll('.counter');

    if (counters.length) {

        const observer = new IntersectionObserver((entries) => {

            entries.forEach(entry => {

                if (!entry.isIntersecting) {

                    return;

                }

                const counter = entry.target;

                const target = parseInt(
                    counter.dataset.target
                );

                let current = 0;

                const increment =
                    Math.max(1, Math.ceil(target / 60));

                const timer = setInterval(() => {

                    current += increment;

                    if (current >= target) {

                        current = target;

                        clearInterval(timer);

                    }

                    counter.textContent = current;

                }, 25);

                observer.unobserve(counter);

            });

        }, {

            threshold: 0.5

        });

        counters.forEach(counter => {

            observer.observe(counter);

        });

    }


    /* ==========================================
   COMPONENT: SCROLL REVEAL

   Purpose:
   Reveals page sections when they
   enter the viewport.
========================================== */

const reveals = document.querySelectorAll('.reveal');

if (reveals.length) {

    const revealObserver = new IntersectionObserver((entries) => {

        entries.forEach(entry => {

            if (entry.isIntersecting) {

                entry.target.classList.add('active');

            }

        });

    }, {

        threshold:0.15

    });

    reveals.forEach(section => {

        revealObserver.observe(section);

    });

}


    /* ==========================================
       COMPONENT: BACK TO TOP BUTTON
    ========================================== */

    const backToTop = document.getElementById('backToTop');

    if (backToTop) {

        window.addEventListener('scroll', () => {

            if (window.scrollY > 300) {

                backToTop.classList.add('show');

            }

            else {

                backToTop.classList.remove('show');

            }

        });

        backToTop.addEventListener('click', () => {

            window.scrollTo({

                top: 0,

                behavior: 'smooth'

            });

        });

    }

    /* ==========================================
       COMPONENT: MOBILE NAVIGATION
    ========================================== */

    const menuToggle = document.getElementById('menuToggle');

    const navLinks = document.querySelector('.nav-links');

    if (menuToggle && navLinks) {

        menuToggle.addEventListener('click', () => {

            navLinks.classList.toggle('active');

            menuToggle.classList.toggle('active');

        });

        document.querySelectorAll('.nav-links a').forEach(link => {

            link.addEventListener('click', () => {

                navLinks.classList.remove('active');

                menuToggle.classList.remove('active');

            });

        });

    }

});