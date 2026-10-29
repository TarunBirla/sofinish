<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Sofinish Technologies | Enterprise-Grade Software Solutions for SMEs')</title>
    <meta name="description" content="@yield('meta_description', 'Sofinish Technologies delivers enterprise-grade website, mobile app, ERP, CRM, and AI solutions built specifically for SMEs. Trusted by 150+ growing businesses.')">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&family=Space+Grotesk:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/main-style.css') }}">
    <link rel="icon" type="image/png" href="{{ asset('images/logo.png') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @yield('extra_css')
</head>
<body>

<!-- Navigation -->
<nav class="nav" id="mainNav">
    <div class="container">
        <div class="nav-inner">
            <a href="{{ route('home') }}" class="nav-logo">
                <div class="nav-logo-img"><img src="{{ asset('images/logo.png') }}" alt="Sofinish" width="42" height="42"></div>
                <span class="nav-logo-text">Sofin<span>ish</span></span>
            </a>
            <ul class="nav-links">
                <li><a href="{{ route('home') }}#services">Services</a></li>
                <li><a href="{{ route('home') }}#sme">SME Solutions</a></li>
                <li><a href="{{ route('home') }}#work">Case Studies</a></li>
                <li><a href="{{ route('home') }}#pricing">Pricing</a></li>
                <li><a href="{{ route('home') }}#process">How We Work</a></li>
                <li><a href="{{ route('home') }}#faq">FAQ</a></li>
                <li><a href="{{ route('contact') }}">Contact</a></li>
                <li class="nav-cta"><a href="{{ route('contact') }}">Get in Touch</a></li>
            </ul>
            <button class="nav-menu-toggle" id="menuToggle" aria-label="Menu">
                <span></span><span></span><span></span>
            </button>
        </div>
    </div>
</nav>

<!-- Mobile Menu -->
<div class="mobile-menu" id="mobileMenu">
    <a href="{{ route('home') }}#services" onclick="closeMobile()">Services</a>
    <a href="{{ route('home') }}#sme" onclick="closeMobile()">SME Solutions</a>
    <a href="{{ route('home') }}#work" onclick="closeMobile()">Case Studies</a>
    <a href="{{ route('home') }}#pricing" onclick="closeMobile()">Pricing</a>
    <a href="{{ route('home') }}#process" onclick="closeMobile()">How We Work</a>
    <a href="{{ route('home') }}#faq" onclick="closeMobile()">FAQ</a>
    <a href="{{ route('contact') }}" onclick="closeMobile()">Contact</a>
    <a href="{{ route('contact') }}" onclick="closeMobile()" style="color:var(--teal-300); font-weight:700;">Get in Touch →</a>
</div>

<main>
    @yield('content')
</main>

<!-- Footer -->
<footer class="footer">
    <div class="container">
        <div class="footer-grid">
            <div class="footer-brand">
                <div class="footer-logo">
                    <div class="footer-logo-img"><img src="{{ asset('images/logo.png') }}" alt="Sofinish" width="40" height="40"></div>
                    <span class="footer-logo-text">Sofinish Technologies</span>
                </div>
                <p>Premium software development and digital consulting for growing SMEs. Enterprise-grade solutions at prices that make sense.</p>
                <div class="footer-socials">
                    <a href="https://linkedin.com" target="_blank" rel="noopener" class="footer-social-link" aria-label="LinkedIn">
                        <svg width="15" height="15" viewBox="0 0 24 24" fill="currentColor"><path d="M16 8a6 6 0 016 6v7h-4v-7a2 2 0 00-2-2 2 2 0 00-2 2v7h-4v-7a6 6 0 016-6zM2 9h4v12H2z"/><circle cx="4" cy="4" r="2"/></svg>
                    </a>
                    <a href="https://twitter.com" target="_blank" rel="noopener" class="footer-social-link" aria-label="Twitter/X">
                        <svg width="13" height="13" viewBox="0 0 1200 1227" fill="currentColor"><path d="M714.163 519.284L1160.89 0H1055.03L667.137 450.887L357.328 0H0L468.492 681.821L0 1226.37H105.866L515.491 750.218L842.672 1226.37H1200L714.137 519.284H714.163ZM569.165 687.828L521.697 619.934L144.011 79.6944H306.615L611.412 515.685L658.88 583.579L1055.08 1150.3H892.476L569.165 687.854V687.828Z"/></svg>
                    </a>
                    <a href="https://github.com" target="_blank" rel="noopener" class="footer-social-link" aria-label="GitHub">
                        <svg width="15" height="15" viewBox="0 0 24 24" fill="currentColor"><path d="M12 0C5.37 0 0 5.37 0 12c0 5.31 3.435 9.795 8.205 11.385.6.105.825-.255.825-.57 0-.285-.015-1.23-.015-2.235-3.015.555-3.795-.735-4.035-1.41-.135-.345-.72-1.41-1.23-1.695-.42-.225-1.02-.78-.015-.795.945-.015 1.62.87 1.845 1.23 1.08 1.815 2.805 1.305 3.495.99.105-.78.42-1.305.765-1.605-2.67-.3-5.46-1.335-5.46-5.925 0-1.305.465-2.385 1.23-3.225-.12-.3-.54-1.53.12-3.18 0 0 1.005-.315 3.3 1.23.96-.27 1.98-.405 3-.405s2.04.135 3 .405c2.295-1.56 3.3-1.23 3.3-1.23.66 1.65.24 2.88.12 3.18.765.84 1.23 1.905 1.23 3.225 0 4.605-2.805 5.625-5.475 5.925.435.375.81 1.095.81 2.22 0 1.605-.015 2.895-.015 3.3 0 .315.225.69.825.57A12.02 12.02 0 0024 12c0-6.63-5.37-12-12-12z"/></svg>
                    </a>
                </div>
            </div>
            <div class="footer-col">
                <h4>SME Solutions</h4>
                <ul>
                    <li><a href="{{ route('home') }}#services">Custom Websites</a></li>
                    <li><a href="{{ route('home') }}#services">Mobile Applications</a></li>
                    <li><a href="{{ route('home') }}#services">ERP Systems</a></li>
                    <li><a href="{{ route('home') }}#services">CRM Platforms</a></li>
                    <li><a href="{{ route('home') }}#services">AI & Automation</a></li>
                    <li><a href="{{ route('home') }}#services">Business Intelligence</a></li>
                </ul>
            </div>
            <div class="footer-col">
                <h4>Company</h4>
                <ul>
                    <li><a href="{{ route('home') }}#sme">About Us</a></li>
                    <li><a href="{{ route('home') }}#work">Case Studies</a></li>
                    <li><a href="{{ route('home') }}#pricing">Pricing</a></li>
                    <li><a href="{{ route('home') }}#process">How We Work</a></li>
                    <li><a href="{{ route('home') }}#faq">FAQ</a></li>
                    <li><a href="{{ route('contact') }}">Contact</a></li>
                </ul>
            </div>
            <div class="footer-col">
                <h4>Contact</h4>
                <ul>
                    <li><a href="mailto:hello@sofinish.co.uk">hello@sofinish.co.uk</a></li>
                    <li><a href="tel:+442000000000">+44 20 0000 0000</a></li>
                    <li><a href="{{ route('contact') }}">London, United Kingdom</a></li>
                    <li><a href="{{ route('contact') }}">Book Discovery Call</a></li>
                    <li><a href="{{ route('admin.login') }}" style="color:var(--teal-300);">Admin Portal →</a></li>
                </ul>
            </div>
        </div>
        <div class="footer-bottom">
            <p>&copy; {{ date('Y') }} Sofinish Technologies Limited. All rights reserved. Registered in England & Wales.</p>
            <p>Designed by <a href="#">Nexteck</a> &bull; <a href="{{ route('admin.login') }}">Admin Login</a></p>
        </div>
    </div>
</footer>

<script>
    // Sticky nav
    const nav = document.getElementById('mainNav');
    if (nav) {
        window.addEventListener('scroll', () => nav.classList.toggle('scrolled', window.scrollY > 40));
    }

    // Mobile menu
    const toggle = document.getElementById('menuToggle');
    const mobileMenu = document.getElementById('mobileMenu');
    if (toggle && mobileMenu) {
        toggle.addEventListener('click', () => {
            mobileMenu.classList.toggle('active');
            const spans = toggle.querySelectorAll('span');
            if (mobileMenu.classList.contains('active')) {
                spans[0].style.cssText = 'transform:rotate(45deg) translate(5px,5px)';
                spans[1].style.opacity = '0';
                spans[2].style.cssText = 'transform:rotate(-45deg) translate(5px,-5px)';
            } else { spans.forEach(s => s.style.cssText = ''); }
        });
    }
    function closeMobile() {
        if (mobileMenu) {
            mobileMenu.classList.remove('active');
            document.querySelectorAll('#menuToggle span').forEach(s => s.style.cssText = '');
        }
    }

    // Scroll animations
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(e => { if (e.isIntersecting) e.target.classList.add('visible'); });
    }, { threshold: 0.08, rootMargin: '0px 0px -40px 0px' });
    document.querySelectorAll('.fade-up,.fade-left,.fade-right').forEach(el => observer.observe(el));

    // FAQ accordion
    function toggleFaq(btn) {
        const item = btn.parentElement;
        const isOpen = item.classList.contains('open');
        document.querySelectorAll('.faq-item').forEach(i => i.classList.remove('open'));
        if (!isOpen) item.classList.add('open');
    }
</script>
@yield('extra_js')
</body>
</html>
