import './bootstrap';

// Navbar scroll effect
const navbar = document.getElementById('navbar');
if (navbar) {
    window.addEventListener('scroll', () => {
        navbar.classList.toggle('scrolled', window.scrollY > 40);
    });
}

// Mobile menu toggle
const menuBtn = document.getElementById('menu-btn');
const mobileMenu = document.getElementById('mobile-menu');

if (menuBtn && mobileMenu) {
    const setMenu = (open) => {
        mobileMenu.classList.toggle('open', open);
        document.body.classList.toggle('menu-open', open);
        menuBtn.setAttribute('aria-expanded', String(open));
        menuBtn.setAttribute('aria-label', open ? 'Fechar menu' : 'Abrir menu');
        mobileMenu.setAttribute('aria-hidden', String(!open));
    };
    menuBtn.addEventListener('click', () => setMenu(!mobileMenu.classList.contains('open')));
    document.addEventListener('keydown', (event) => { if (event.key === 'Escape') setMenu(false); });

    // Close mobile menu on link click
    mobileMenu.querySelectorAll('a').forEach(link => {
        link.addEventListener('click', () => setMenu(false));
    });
}

// Scroll reveal animations
function initRevealAnimations() {
    const reveals = document.querySelectorAll('.reveal');
    if (!reveals.length) return;

    // Set stagger index for children inside .stagger-children
    document.querySelectorAll('.stagger-children').forEach(container => {
        container.querySelectorAll('.reveal').forEach((el, index) => {
            el.style.setProperty('--reveal-index', index);
        });
    });

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('visible');
                observer.unobserve(entry.target);
            }
        });
    }, {
        threshold: 0.12,
        rootMargin: '0px 0px -40px 0px'
    });

    reveals.forEach(el => observer.observe(el));
}

if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', initRevealAnimations);
} else {
    initRevealAnimations();
}
