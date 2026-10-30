const menuToggle = document.querySelector('.menu-toggle');
const navigation = document.querySelector('.primary-navigation');

if (menuToggle instanceof HTMLButtonElement && navigation instanceof HTMLElement) {
    menuToggle.addEventListener('click', () => {
        const isExpanded = menuToggle.getAttribute('aria-expanded') === 'true';
        menuToggle.setAttribute('aria-expanded', String(!isExpanded));
        menuToggle.setAttribute('aria-label', isExpanded ? 'Open navigation' : 'Close navigation');
        navigation.classList.toggle('is-open', !isExpanded);
    });

    navigation.addEventListener('click', (event) => {
        if (event.target instanceof HTMLAnchorElement) {
            menuToggle.setAttribute('aria-expanded', 'false');
            menuToggle.setAttribute('aria-label', 'Open navigation');
            navigation.classList.remove('is-open');
        }
    });
}

const carousel = document.querySelector('[data-carousel]');

if (carousel instanceof HTMLElement && carousel.querySelectorAll('.hero-panel').length > 0) {
    const slides = Array.from(carousel.querySelectorAll('.hero-panel'));
    const indicators = Array.from(carousel.querySelectorAll('[data-carousel-slide]'));
    const reducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)');
    let activeSlide = slides.findIndex((slide) => slide.classList.contains('is-active'));
    let autoAdvance;

    const showSlide = (index) => {
        activeSlide = (index + slides.length) % slides.length;

        slides.forEach((slide, slideIndex) => {
            const isActive = slideIndex === activeSlide;
            slide.classList.toggle('is-active', isActive);
            slide.setAttribute('aria-hidden', String(!isActive));
        });

        indicators.forEach((indicator, slideIndex) => {
            const isActive = slideIndex === activeSlide;
            indicator.classList.toggle('is-active', isActive);
            indicator.setAttribute('aria-current', String(isActive));
        });
    };

    const stopAutoAdvance = () => {
        window.clearInterval(autoAdvance);
    };

    const startAutoAdvance = () => {
        stopAutoAdvance();

        if (reducedMotion.matches || document.hidden || carousel.matches(':hover') || carousel.contains(document.activeElement)) {
            return;
        }

        autoAdvance = window.setInterval(() => showSlide(activeSlide + 1), 6000);
    };

    const activateControl = (slideIndex, event) => {
        showSlide(slideIndex);

        if (event.detail > 0 && event.currentTarget instanceof HTMLButtonElement) {
            event.currentTarget.blur();
        }

        startAutoAdvance();
    };

    carousel.querySelector('[data-carousel-previous]')?.addEventListener('click', (event) => {
        activateControl(activeSlide - 1, event);
    });

    carousel.querySelector('[data-carousel-next]')?.addEventListener('click', (event) => {
        activateControl(activeSlide + 1, event);
    });

    indicators.forEach((indicator) => {
        indicator.addEventListener('click', (event) => {
            const slideIndex = Number(indicator.dataset.carouselSlide);

            if (Number.isInteger(slideIndex) && slideIndex >= 0 && slideIndex < slides.length) {
                activateControl(slideIndex, event);
            }
        });
    });

    carousel.addEventListener('mouseenter', stopAutoAdvance);
    carousel.addEventListener('mouseleave', startAutoAdvance);
    carousel.addEventListener('focusin', stopAutoAdvance);
    carousel.addEventListener('focusout', () => window.setTimeout(startAutoAdvance, 0));
    document.addEventListener('visibilitychange', startAutoAdvance);
    reducedMotion.addEventListener('change', startAutoAdvance);

    if (activeSlide >= 0) {
        showSlide(activeSlide);
        startAutoAdvance();
    }
}
