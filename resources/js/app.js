import './bootstrap';

// توهيج التصنيف الظاهر حاليًا في شريط التنقل أثناء التمرير
document.addEventListener('DOMContentLoaded', () => {

    const sections = document.querySelectorAll('.menu-section');
    const navLinks = document.querySelectorAll('.category-nav__link');

    if (!sections.length || !navLinks.length) {
        return;
    }

    const observer = new IntersectionObserver((entries) => {
        entries.forEach((entry) => {
            if (!entry.isIntersecting) {
                return;
            }

            const activeId = entry.target.id.replace('category-', '');

            navLinks.forEach((link) => {
                link.classList.toggle(
                    'is-active',
                    link.dataset.categoryId === activeId
                );
            });
        });
    }, {
        rootMargin: '-120px 0px -70% 0px',
    });

    sections.forEach((section) => observer.observe(section));
});
