function smoothScroll(targetSelector) {
    const targetElement = document.querySelector(targetSelector);

    if (targetElement) {
        targetElement.scrollIntoView({
            behavior: 'smooth'
        });
    } else {
        console.error('Target element not found for smooth scroll:', targetSelector);
    }
}