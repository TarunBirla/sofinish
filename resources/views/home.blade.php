@extends('layouts.app')

@section('content')
<section class="hero">
    <div class="hero-grid"></div>
    <div class="hero-orb hero-orb-1"></div>
    <div class="hero-orb hero-orb-2"></div>
    <div class="hero-orb hero-orb-3"></div>
    <div class="container--wide">
        <div class="hero-inner">
            <div class="hero-content">
                <div class="hero-text fade-up">
                    <div class="hero-badge">
                        <span class="hero-badge-dot"></span>
                        Enterprise-Grade Technology for Growing Businesses
                    </div>
                    <h1>
                        The Technology Partner <br>
                        <span class="accent">SMEs Trust</span> to Scale
                    </h1>
                    <p class="hero-desc">
                        From custom websites and mobile apps to ERP, CRM, and AI-powered automation — Sofinish delivers the same enterprise-grade software that powers FTSE 500 companies, tailored and priced for growing SMEs.
                    </p>
                    <div class="hero-actions">
                        <a href="{{ route('contact') }}" class="btn btn-primary btn-lg">Start Your Free Consultation</a>
                        <a href="#work" class="btn btn-outline btn-lg">View Case Studies</a>
                    </div>
                    <div class="hero-trust">
                        <div class="hero-trust-item">
                            <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                            Maximum ROI of your investment
                        </div>
          
                        <div class="hero-trust-item">
                            <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                            Dedicated account manager
                        </div>
                    </div>
                </div>
                <div class="hero-visual fade-up" style="transition-delay:0.15s">
                    <div class="hero-img-wrap">
                        <img class="hero-img-main" src="{{ asset('images/0.jpg') }}" alt="Sofinish Technologies — Premium SME Software" onerror="this.src="{{ asset('images/0.png') }}"">
                        <div class="hero-float-card hero-float-card--bl">
                            <div class="hero-float-icon" style="background:#eff6ff;color:#2563eb;">
                                <svg width="20" height="20" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
                            </div>
                            <div>
                                <div class="hero-float-val">50+</div>
                                <div class="hero-float-lbl">Projects Delivered</div>
                            </div>
                        </div>
                        <div class="hero-float-card hero-float-card--tr">
                            <div class="hero-float-icon" style="background:#f0fdf4;color:#16a34a;">
                                <svg width="20" height="20" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                            </div>
                            <div>
                                <div class="hero-float-val">98%</div>
                                <div class="hero-float-lbl">Success Rate</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>

<!-- ─── MARQUEE ───────────────────────────────────────────────── -->
<div class="marquee">
    <div class="marquee-track">
        <span class="marquee-item">Custom Websites <span class="marquee-dot">●</span></span>
        <span class="marquee-item">Mobile Applications <span class="marquee-dot">●</span></span>
        <span class="marquee-item">ERP Systems <span class="marquee-dot">●</span></span>
        <span class="marquee-item">CRM Platforms <span class="marquee-dot">●</span></span>
        <span class="marquee-item">AI Automation <span class="marquee-dot">●</span></span>
        <span class="marquee-item">Cloud Solutions <span class="marquee-dot">●</span></span>
        <span class="marquee-item">E-commerce <span class="marquee-dot">●</span></span>
        <span class="marquee-item">Business Intelligence <span class="marquee-dot">●</span></span>
        <span class="marquee-item">Custom Websites <span class="marquee-dot">●</span></span>
        <span class="marquee-item">Mobile Applications <span class="marquee-dot">●</span></span>
        <span class="marquee-item">ERP Systems <span class="marquee-dot">●</span></span>
        <span class="marquee-item">CRM Platforms <span class="marquee-dot">●</span></span>
        <span class="marquee-item">AI Automation <span class="marquee-dot">●</span></span>
        <span class="marquee-item">Cloud Solutions <span class="marquee-dot">●</span></span>
        <span class="marquee-item">E-commerce <span class="marquee-dot">●</span></span>
        <span class="marquee-item">Business Intelligence <span class="marquee-dot">●</span></span>
    </div>
</div>

<!-- ─── STATS ─────────────────────────────────────────────────── -->
<section class="stats-bar" id="stats">
    <div class="container">
        <div class="stats-grid">
            <div class="stat-item fade-up">
                <div class="stat-number">20<span class="accent">+</span></div>
                <div class="stat-label">SME Projects Delivered</div>
            </div>
            <div class="stat-item fade-up" style="transition-delay:0.1s">
                <div class="stat-number">20<span class="accent">+</span></div>
                <div class="stat-label">Growing Businesses Served</div>
            </div>
            <div class="stat-item fade-up" style="transition-delay:0.2s">
                <div class="stat-number">4<span class="accent">+</span></div>
                <div class="stat-label">Customer Satisfaction</div>
            </div>
        </div>
    </div>
</section>

<!-- ─── SME VALUE PROPOSITION ────────────────────────────────── -->
<section class="section section--white sme-value" id="sme">
    <div class="container">
        <div class="sme-value-grid">
            <div class="sme-value-content fade-left">
                <div class="section-label">Why Sofinish for SMEs?</div>
                <h2>Enterprise Power. <br><em>SME Affordability.</em></h2>
                <p>We believe every growing business deserves access to the same world-class technology that Fortune 500 companies use. We've stripped away the complexity and cost to deliver powerful, scalable solutions at a price that makes sense for SMEs.</p>
                <ul class="sme-checklist">
                    <li class="sme-check-item">
                        <div class="sme-check-icon"><svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="3" viewBox="0 0 24 24"><path d="M5 13l4 4L19 7"/></svg></div>
                        <span class="sme-check-text"><strong>Predictable pricing</strong> — transparent quotes with no hidden fees or surprise invoices</span>
                    </li>
                    <li class="sme-check-item">
                        <div class="sme-check-icon"><svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="3" viewBox="0 0 24 24"><path d="M5 13l4 4L19 7"/></svg></div>
                        <span class="sme-check-text"><strong>Dedicated senior team</strong> — not offshore juniors, but experienced architects working on your project</span>
                    </li>
                    <li class="sme-check-item">
                        <div class="sme-check-icon"><svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="3" viewBox="0 0 24 24"><path d="M5 13l4 4L19 7"/></svg></div>
                        <span class="sme-check-text"><strong>Scalable architecture</strong> — solutions that grow seamlessly with your business without expensive rewrites</span>
                    </li>
                    <li class="sme-check-item">
                        <div class="sme-check-icon"><svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="3" viewBox="0 0 24 24"><path d="M5 13l4 4L19 7"/></svg></div>
                        <span class="sme-check-text"><strong>Fast delivery</strong> — 30 to 90 days typical delivery for standard SME solutions</span>
                    </li>
                    <li class="sme-check-item">
                        <div class="sme-check-icon"><svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="3" viewBox="0 0 24 24"><path d="M5 13l4 4L19 7"/></svg></div>
                        <span class="sme-check-text"><strong>UK-based support</strong> — a real person picks up the phone, every time</span>
                    </li>
                </ul>
            </div>
            <div class="sme-value-visual fade-right" style="transition-delay:0.15s">
                <img class="sme-value-img" src="{{ asset('images/3.jpg') }}" alt="SME Software Solutions" onerror="this.src="{{ asset('images/3.png') }}"">
                <div class="sme-value-badge">
                    <div class="big">40%</div>
                    <div class="small">Average Cost Saving</div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ─── SERVICES ─────────────────────────────────────────────── -->
<section class="section section--light services" id="services">
    <div class="container">
        <div class="services-header fade-up">
            <div class="section-label">What We Build</div>
            <h2 class="section-title">Complete Technology Solutions <br>for Growing Businesses</h2>
            <p class="section-subtitle">From your first website to a full AI-powered business management suite — we build every layer of your digital infrastructure.</p>
        </div>
        <div class="grid-3">
            <div class="service-card fade-up">
                <div class="service-icon si-blue">
                    <svg width="26" height="26" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><rect x="2" y="3" width="20" height="14" rx="2"/><line x1="8" y1="21" x2="16" y2="21"/><line x1="12" y1="17" x2="12" y2="21"/></svg>
                </div>
                <h3>Custom Websites</h3>
                <p>Award-winning websites built for performance, SEO, and conversion. From £2,500.</p>
                <ul class="service-features">
                    <li>Responsive & mobile-first design</li>
                    <li>SEO-optimised architecture</li>
                    <li>CMS integration (WordPress, Shopify, Webflow)</li>
                    <li>Page speed under 2 seconds</li>
                    <li>E-commerce & booking systems</li>
                </ul>
                <a href="{{ route('contact') }}" class="card-link">Get a Free Quote <span>→</span></a>
            </div>
            <div class="service-card fade-up" style="transition-delay:0.1s">
                <div class="service-icon si-teal">
                    <svg width="26" height="26" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><rect x="5" y="2" width="14" height="20" rx="2"/><line x1="12" y1="18" x2="12.01" y2="18"/></svg>
                </div>
                <h3>Mobile Applications</h3>
                <p>Native-quality iOS and Android apps that your customers and team will love. From £8,000.</p>
                <ul class="service-features">
                    <li>React Native & Flutter expertise</li>
                    <li>iOS App Store & Google Play ready</li>
                    <li>Offline-capable with sync</li>
                    <li>Push notifications & analytics</li>
                    <li>GPS, camera, and payment integration</li>
                </ul>
                <a href="{{ route('contact') }}" class="card-link">Get a Free Quote <span>→</span></a>
            </div>
            <div class="service-card fade-up" style="transition-delay:0.2s">
                <div class="service-icon si-green">
                    <svg width="26" height="26" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><rect x="2" y="2" width="20" height="8" rx="2"/><rect x="2" y="14" width="20" height="8" rx="2"/><line x1="6" y1="6" x2="6.01" y2="6"/><line x1="6" y1="18" x2="6.01" y2="18"/></svg>
                </div>
                <h3>ERP Systems</h3>
                <p>Replace spreadsheets with a real ERP. Automate inventory, finance, HR, and operations. From £15,000.</p>
                <ul class="service-features">
                    <li>Custom ERP built to your workflow</li>
                    <li>Financial management & invoicing</li>
                    <li>Inventory & supply chain</li>
                    <li>HR & payroll integration</li>
                    <li>Real-time dashboards & reporting</li>
                </ul>
                <a href="{{ route('contact') }}" class="card-link">Get a Free Quote <span>→</span></a>
            </div>
            <div class="service-card fade-up" style="transition-delay:0.3s">
                <div class="service-icon si-amber">
                    <svg width="26" height="26" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M17 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 00-3-3.87"/><path d="M16 3.13a4 4 0 010 7.75"/></svg>
                </div>
                <h3>CRM Platforms</h3>
                <p>Win more deals with a CRM that actually fits your sales process. From £5,000.</p>
                <ul class="service-features">
                    <li>Lead pipeline & opportunity management</li>
                    <li>Automated follow-up sequences</li>
                    <li>Email & calendar integration</li>
                    <li>Custom reporting & revenue forecasting</li>
                    <li>WhatsApp & SMS messaging</li>
                </ul>
                <a href="{{ route('contact') }}" class="card-link">Get a Free Quote <span>→</span></a>
            </div>
            <div class="service-card fade-up" style="transition-delay:0.4s">
                <div class="service-icon si-purple">
                    <svg width="26" height="26" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M21 16V8a2 2 0 00-1-1.73l-7-4a2 2 0 00-2 0l-7 4A2 2 0 003 8v8a2 2 0 001 1.73l7 4a2 2 0 002 0l7-4A2 2 0 0021 16z"/><polyline points="3.27 6.96 12 12.01 20.73 6.96"/><line x1="12" y1="22.08" x2="12" y2="12"/></svg>
                </div>
                <h3>AI & Automation</h3>
                <p>AI-powered tools that eliminate manual work and multiply your team's output. From £6,000.</p>
                <ul class="service-features">
                    <li>AI chatbots & customer support agents</li>
                    <li>Document processing & data extraction</li>
                    <li>Predictive sales & demand forecasting</li>
                    <li>Workflow automation (Zapier, Power Automate)</li>
                    <li>LLM integration & fine-tuning</li>
                </ul>
                <a href="{{ route('contact') }}" class="card-link">Get a Free Quote <span>→</span></a>
            </div>
            <div class="service-card fade-up" style="transition-delay:0.5s">
                <div class="service-icon si-rose">
                    <svg width="26" height="26" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><line x1="18" y1="20" x2="18" y2="10"/><line x1="12" y1="20" x2="12" y2="4"/><line x1="6" y1="20" x2="6" y2="14"/></svg>
                </div>
                <h3>Business Intelligence</h3>
                <p>Turn your data into decisions. Custom dashboards that give you a real-time view of your entire business. From £7,500.</p>
                <ul class="service-features">
                    <li>Real-time KPI dashboards</li>
                    <li>Multi-source data integration</li>
                    <li>Trend analysis & anomaly detection</li>
                    <li>Excel & Google Sheets connectors</li>
                    <li>C-Suite & board-ready reporting</li>
                </ul>
                <a href="{{ route('contact') }}" class="card-link">Get a Free Quote <span>→</span></a>
            </div>
        </div>
    </div>
</section>

<!-- ─── SME-FOCUSED SERVICES DEEP-DIVE ──────────────────────── -->
<section class="section section--white sme-services">
    <div class="container" style="margin-bottom:48px;">
        <div class="section-header fade-up">
            <div class="section-label">SME Solutions</div>
            <h2 class="section-title">Everything Your SME Needs, <br>Under One Roof</h2>
            <p class="section-subtitle">We understand the pressures growing businesses face — limited budgets, skills gaps, and the need to move fast. That's why we've built our entire practice around delivering premium results at SME-friendly terms.</p>
        </div>
    </div>
    <div class="container--wide">
        <div class="sme-service-row">
            <div class="sme-svc-item fade-up">
                <div class="sme-svc-icon si-blue">
                    <svg width="28" height="28" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><rect x="2" y="3" width="20" height="14" rx="2"/><line x1="8" y1="21" x2="16" y2="21"/><line x1="12" y1="17" x2="12" y2="21"/></svg>
                </div>
                <div>
                    <h4>Websites That Actually Convert</h4>
                    <p>We design and build websites that do more than look beautiful — they generate leads, drive sales, and establish your brand as an authority in your market.</p>
                    <div class="sme-svc-tags">
                        <span class="sme-svc-tag">Landing Pages</span>
                        <span class="sme-svc-tag">E-commerce</span>
                        <span class="sme-svc-tag">Brochure Sites</span>
                        <span class="sme-svc-tag">Web Apps</span>
                        <span class="sme-svc-tag">Portals</span>
                    </div>
                </div>
            </div>
            <div class="sme-svc-item fade-up" style="transition-delay:0.08s">
                <div class="sme-svc-icon si-teal">
                    <svg width="28" height="28" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><rect x="5" y="2" width="14" height="20" rx="2"/><line x1="12" y1="18" x2="12.01" y2="18"/></svg>
                </div>
                <div>
                    <h4>Mobile Apps Your Team Will Use</h4>
                    <p>Whether for your customers or your internal team, we build mobile apps that are fast, reliable, and genuinely useful — not just a website in a wrapper.</p>
                    <div class="sme-svc-tags">
                        <span class="sme-svc-tag">iOS & Android</span>
                        <span class="sme-svc-tag">Internal Apps</span>
                        <span class="sme-svc-tag">Customer Apps</span>
                        <span class="sme-svc-tag">PWA</span>
                    </div>
                </div>
            </div>
            <div class="sme-svc-item fade-up" style="transition-delay:0.16s">
                <div class="sme-svc-icon si-green">
                    <svg width="28" height="28" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><rect x="2" y="2" width="20" height="8" rx="2"/><rect x="2" y="14" width="20" height="8" rx="2"/><line x1="6" y1="6" x2="6.01" y2="6"/><line x1="6" y1="18" x2="6.01" y2="18"/></svg>
                </div>
                <div>
                    <h4>ERP That Replaces Your Spreadsheets</h4>
                    <p>Most SMEs run on spreadsheets and sticky notes. Our custom ERP gives you the operational clarity and automation of a big enterprise — without the enterprise price tag.</p>
                    <div class="sme-svc-tags">
                        <span class="sme-svc-tag">Finance & Accounting</span>
                        <span class="sme-svc-tag">Inventory</span>
                        <span class="sme-svc-tag">HR & Payroll</span>
                        <span class="sme-svc-tag">Project Management</span>
                        <span class="sme-svc-tag">Supply Chain</span>
                    </div>
                </div>
            </div>
            <div class="sme-svc-item fade-up" style="transition-delay:0.24s">
                <div class="sme-svc-icon si-amber">
                    <svg width="28" height="28" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M17 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 00-3-3.87"/><path d="M16 3.13a4 4 0 010 7.75"/></svg>
                </div>
                <div>
                    <h4>CRM That Wins Deals</h4>
                    <p>A CRM is only as good as how well it matches your sales process. We build a CRM that your team will actually use — one that surfaces the right insight at the right moment.</p>
                    <div class="sme-svc-tags">
                        <span class="sme-svc-tag">Sales Pipeline</span>
                        <span class="sme-svc-tag">Lead Management</span>
                        <span class="sme-svc-tag">Email Sequences</span>
                        <span class="sme-svc-tag">Forecasting</span>
                    </div>
                </div>
            </div>
            <div class="sme-svc-item fade-up" style="transition-delay:0.32s">
                <div class="sme-svc-icon si-purple">
                    <svg width="28" height="28" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M21 16V8a2 2 0 00-1-1.73l-7-4a2 2 0 00-2 0l-7 4A2 2 0 003 8v8a2 2 0 001 1.73l7 4a2 2 0 002 0l7-4A2 2 0 0021 16z"/><polyline points="3.27 6.96 12 12.01 20.73 6.96"/><line x1="12" y1="22.08" x2="12" y2="12"/></svg>
                </div>
                <div>
                    <h4>AI Solutions That Work for You</h4>
                    <p>We embed AI into your existing workflows — automating customer service, speeding up admin, and giving your team superpowers. No PhD required.</p>
                    <div class="sme-svc-tags">
                        <span class="sme-svc-tag">AI Chatbots</span>
                        <span class="sme-svc-tag">Document Automation</span>
                        <span class="sme-svc-tag">Sales Intelligence</span>
                        <span class="sme-svc-tag">Process Automation</span>
                        <span class="sme-svc-tag">LLM Integration</span>
                    </div>
                </div>
            </div>
            <div class="sme-svc-item fade-up" style="transition-delay:0.4s">
                <div class="sme-svc-icon si-rose">
                    <svg width="28" height="28" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><line x1="2" y1="12" x2="22" y2="12"/><path d="M12 2a15.3 15.3 0 014 10 15.3 15.3 0 01-4 10 15.3 15.3 0 01-4-10 15.3 15.3 0 014-10z"/></svg>
                </div>
                <div>
                    <h4>Cloud & DevOps Infrastructure</h4>
                    <p>Hosting, security, backups, and performance optimisation. We make sure your systems are fast, secure, and available 99.9% of the time.</p>
                    <div class="sme-svc-tags">
                        <span class="sme-svc-tag">AWS & Azure</span>
                        <span class="sme-svc-tag">CI/CD Pipelines</span>
                        <span class="sme-svc-tag">Cyber Security</span>
                        <span class="sme-svc-tag">99.9% Uptime SLA</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ─── PLATFORM BANNER ───────────────────────────────────────── -->
<section class="platform-banner">
    <div class="container">
        <div class="platform-content fade-up">
            <div>
                <h2>One Partner. <br><em>Every Technology Need.</em></h2>
                <p>Stop juggling five different agencies. Sofinish is your single technology partner — from your first landing page to a full enterprise-grade platform.</p>
            </div>
            <div class="platform-cta">
                <a href="{{ route('contact') }}" class="btn btn-white btn-lg">Book Free Discovery Call</a>
                <a href="#services" class="btn btn-ghost btn-lg">Explore Services</a>
            </div>
        </div>
    </div>
</section>

<!-- ─── CASE STUDIES ────────────────────────────────────────── -->
<section class="section section--white case-studies" id="work">
    <div class="container">
        <div class="fade-up">
            <div class="section-label">Case Studies</div>
            <h2 class="section-title" style="max-width:520px;">Results That Speak for Themselves</h2>
            <p class="section-subtitle">Real results from real SME engagements.</p>
        </div>
        <div class="case-grid">
            <div class="case-card fade-up">
                <img src="{{ asset('images/1.jpg') }}" alt="Retail E-commerce Platform" onerror="this.src="{{ asset('images/1.png') }}"">
                <div class="case-overlay">
                    <span class="case-tag">Retail & E-commerce</span>
                    <h3>Full E-commerce Platform Rebuild for a Fashion Retailer</h3>
                    <p>Complete re-platforming from Magento to a custom headless solution — reducing page load times by 75% and increasing conversion rate by 3x.</p>
                    <div class="case-metrics">
                        <div class="case-metric"><span class="val">+320%</span><span class="lbl">Revenue Growth</span></div>
                        <div class="case-metric"><span class="val">-75%</span><span class="lbl">Page Load Time</span></div>
                        <div class="case-metric"><span class="val">3.1x</span><span class="lbl">Conversion Uplift</span></div>
                    </div>
                    <span class="case-arrow">Read Full Case Study <span>→</span></span>
                </div>
            </div>
            <div class="case-card fade-up" style="transition-delay:0.1s">
                <img src="{{ asset('images/2.jpg') }}" alt="ERP System Implementation" onerror="this.src="{{ asset('images/2.png') }}"">
                <div class="case-overlay">
                    <span class="case-tag">ERP & Operations</span>
                    <h3>Custom ERP for a Logistics SME</h3>
                    <p>Replaced 11 disconnected tools with one integrated ERP platform.</p>
                    <div class="case-metrics">
                        <div class="case-metric"><span class="val">11→1</span><span class="lbl">Tools Consolidated</span></div>
                        <div class="case-metric"><span class="val">-£180K</span><span class="lbl">Annual Savings</span></div>
                    </div>
                    <span class="case-arrow">View Case Study <span>→</span></span>
                </div>
            </div>
            <div class="case-card fade-up">
                <img src="{{ asset('images/4.jpg') }}" alt="AI Customer Service" onerror="this.src="{{ asset('images/4.png') }}"">
                <div class="case-overlay">
                    <span class="case-tag">AI & Automation</span>
                    <h3>AI Chatbot for a Hospitality Group</h3>
                    <p>Reduced call centre volume by 65% with an AI-powered booking agent.</p>
                    <div class="case-metrics">
                        <div class="case-metric"><span class="val">-65%</span><span class="lbl">Call Volume</span></div>
                        <div class="case-metric"><span class="val">+92%</span><span class="lbl">CSAT Score</span></div>
                    </div>
                    <span class="case-arrow">View Case Study <span>→</span></span>
                </div>
            </div>
            <div class="case-card fade-up" style="transition-delay:0.1s">
                <img src="{{ asset('images/5.jpg') }}" alt="CRM Implementation" onerror="this.src="{{ asset('images/5.png') }}"">
                <div class="case-overlay">
                    <span class="case-tag">CRM & Sales</span>
                    <h3>Custom CRM for a Professional Services Firm</h3>
                    <p>Pipeline visibility, automated proposals, and a 40% increase in close rate.</p>
                    <div class="case-metrics">
                        <div class="case-metric"><span class="val">+40%</span><span class="lbl">Close Rate</span></div>
                        <div class="case-metric"><span class="val">+2.5x</span><span class="lbl">Pipeline Visibility</span></div>
                    </div>
                    <span class="case-arrow">View Case Study <span>→</span></span>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ─── PRICING ──────────────────────────────────────────────── -->
<section class="section section--light pricing" id="pricing">
    <div class="container">
        <div class="pricing-header fade-up">
            <div class="section-label">Transparent Pricing</div>
            <h2 class="section-title">Plans Built for Every Stage of Growth</h2>
            <p class="section-subtitle">No hidden fees, no surprise invoices. Every project includes a detailed scope, timeline, and fixed price — agreed upfront.</p>
        </div>
        <div class="pricing-grid">
            <div class="pricing-card fade-up">
                <div class="pricing-tier">Foundation</div>
                <div class="pricing-name">Launch</div>
                <div class="pricing-desc">Perfect for startups and SMEs taking their first steps online.</div>
                <div class="pricing-price">
                    <div class="pricing-amount"><sup>£</sup>2,500<span style="font-size:16px;font-weight:400;color:var(--gray-400);"> starting</span></div>
                    <div class="pricing-period">Fixed project price</div>
                </div>
                <ul class="pricing-features">
                    <li><svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path d="M5 13l4 4L19 7"/></svg> Custom responsive website (up to 5 pages)</li>
                    <li><svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path d="M5 13l4 4L19 7"/></svg> SEO foundation & Google setup</li>
                    <li><svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path d="M5 13l4 4L19 7"/></svg> Contact form & email integration</li>
                    <li><svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path d="M5 13l4 4L19 7"/></svg> Mobile-first design</li>
                    <li><svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path d="M5 13l4 4L19 7"/></svg> 30-day post-launch support</li>
                    <li><svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path d="M5 13l4 4L19 7"/></svg> CMS training session</li>
                </ul>
                <a href="{{ route('contact') }}" class="btn btn-outline">Start with Launch</a>
            </div>
            <div class="pricing-card pricing-card--featured fade-up" style="transition-delay:0.1s">
                <div class="pricing-badge">Most Popular</div>
                <div class="pricing-tier">Growth</div>
                <div class="pricing-name">Accelerate</div>
                <div class="pricing-desc">For SMEs ready to scale with a full digital presence and CRM.</div>
                <div class="pricing-price">
                    <div class="pricing-amount"><sup>£</sup>12,500<span style="font-size:16px;font-weight:400;opacity:0.5;"> starting</span></div>
                    <div class="pricing-period">Fixed project price</div>
                </div>
                <ul class="pricing-features">
                    <li><svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path d="M5 13l4 4L19 7"/></svg> Everything in Launch, plus:</li>
                    <li><svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path d="M5 13l4 4L19 7"/></svg> Custom CRM with sales pipeline</li>
                    <li><svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path d="M5 13l4 4L19 7"/></svg> Mobile app (iOS or Android)</li>
                    <li><svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path d="M5 13l4 4L19 7"/></svg> E-commerce integration</li>
                    <li><svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path d="M5 13l4 4L19 7"/></svg> Google Ads & Meta setup</li>
                    <li><svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path d="M5 13l4 4L19 7"/></svg> 90-day priority support</li>
                    <li><svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path d="M5 13l4 4L19 7"/></svg> Dedicated account manager</li>
                </ul>
                <a href="{{ route('contact') }}" class="btn btn-primary">Start with Accelerate</a>
            </div>
            <div class="pricing-card fade-up" style="transition-delay:0.2s">
                <div class="pricing-tier">Enterprise</div>
                <div class="pricing-name">Scale</div>
                <div class="pricing-desc">Full-scale digital transformation for established SMEs with complex needs.</div>
                <div class="pricing-price">
                    <div class="pricing-amount"><sup>£</sup>50,000<span style="font-size:16px;font-weight:400;color:var(--gray-400);"> starting</span></div>
                    <div class="pricing-period">Fixed project price</div>
                </div>
                <ul class="pricing-features">
                    <li><svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path d="M5 13l4 4L19 7"/></svg> Full ERP system implementation</li>
                    <li><svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path d="M5 13l4 4L19 7"/></svg> AI & automation suite</li>
                    <li><svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path d="M5 13l4 4L19 7"/></svg> Custom CRM + integrations</li>
                    <li><svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path d="M5 13l4 4L19 7"/></svg> Business intelligence dashboards</li>
                    <li><svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path d="M5 13l4 4L19 7"/></svg> Cloud architecture & DevOps</li>
                    <li><svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path d="M5 13l4 4L19 7"/></svg> Dedicated delivery team</li>
                    <li><svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path d="M5 13l4 4L19 7"/></svg> 12-month SLA & evolution roadmap</li>
                </ul>
                <a href="{{ route('contact') }}" class="btn btn-outline">Start with Scale</a>
            </div>
        </div>
        <p style="text-align:center;margin-top:32px;font-size:14px;color:var(--gray-400);" class="fade-up">All prices are indicative starting points. Every project is scoped individually. <strong style="color:var(--gray-600);">Contact us for a free detailed proposal.</strong></p>
    </div>
</section>

<!-- ─── PROCESS ──────────────────────────────────────────────── -->
<section class="section section--white process" id="process">
    <div class="container">
        <div class="process-header fade-up">
            <div class="section-label">How We Work</div>
            <h2 class="section-title">From First Call to Launch in 4 Clear Steps</h2>
            <p class="section-subtitle">Our process is designed to eliminate uncertainty. You'll always know what's happening, why, and when.</p>
        </div>
        <div class="process-steps">
            <div class="process-step fade-up">
                <div class="step-num-circle">01</div>
                <h4>Discovery</h4>
                <p>A focused 60-minute session to understand your business, goals, and current challenges. We listen before we speak.</p>
            </div>
            <div class="process-step fade-up" style="transition-delay:0.12s">
                <div class="step-num-circle">02</div>
                <h4>Proposal</h4>
                <p>A detailed technical proposal with solution architecture, timeline, fixed price, and measurable success metrics.</p>
            </div>
            <div class="process-step fade-up" style="transition-delay:0.24s">
                <div class="step-num-circle">03</div>
                <h4>Delivery</h4>
                <p>Agile sprints with weekly demos. Senior engineers, automated testing, and full transparency through your project portal.</p>
            </div>
            <div class="process-step fade-up" style="transition-delay:0.36s">
                <div class="step-num-circle">04</div>
                <h4>Launch & Evolve</h4>
                <p>Launch is the beginning, not the end. We provide ongoing support, optimisation, and a roadmap for what comes next.</p>
            </div>
        </div>
    </div>
</section>

<!-- ─── TESTIMONIALS ─────────────────────────────────────────── -->
<section class="section section--light testimonials">
    <div class="container">
        <div class="testimonials-header fade-up">
            <div class="section-label">Client Voices</div>
            <h2 class="section-title">Trusted by Growing Businesses Across the UK</h2>
            <p class="section-subtitle">Don't take our word for it — hear from the SME owners we've helped scale.</p>
        </div>
        <div class="grid-3">
            <div class="testimonial-card fade-up">
                <div class="testimonial-stars">
                    <span class="star">★</span><span class="star">★</span><span class="star">★</span><span class="star">★</span><span class="star">★</span>
                </div>
                <p>"Sofinish delivered our entire digital ecosystem in 8 weeks — new website, CRM, and mobile app. We'd been trying to piece this together for two years with other suppliers. They made it look easy."</p>
                <div class="testimonial-author">
                    <div class="testimonial-avatar" style="background:#1e40af;">AW</div>
                    <div>
                        <div class="testimonial-name">Alexandra Whitmore</div>
                        <div class="testimonial-role">CEO, Meridian Retail Group</div>
                        <div class="testimonial-company">Retail · 45 Employees · UK</div>
                    </div>
                </div>
            </div>
            <div class="testimonial-card fade-up" style="transition-delay:0.1s">
                <div class="testimonial-stars">
                    <span class="star">★</span><span class="star">★</span><span class="star">★</span><span class="star">★</span><span class="star">★</span>
                </div>
                <p>"The custom ERP they built has completely transformed how we operate. We went from spending 15 hours a week on manual reporting to having real-time dashboards. ROI in the first quarter."</p>
                <div class="testimonial-author">
                    <div class="testimonial-avatar" style="background:#0891b2;">MK</div>
                    <div>
                        <div class="testimonial-name">Marcus Kellerman</div>
                        <div class="testimonial-role">Managing Director, Kellerman Logistics</div>
                        <div class="testimonial-company">Logistics · 80 Employees · UK</div>
                    </div>
                </div>
            </div>
            <div class="testimonial-card fade-up" style="transition-delay:0.2s">
                <div class="testimonial-stars">
                    <span class="star">★</span><span class="star">★</span><span class="star">★</span><span class="star">★</span><span class="star">★</span>
                </div>
                <p>"As a small financial advisory firm, we needed enterprise-grade security and compliance without the enterprise price tag. Sofinish delivered exactly that. Our clients notice the difference too."</p>
                <div class="testimonial-author">
                    <div class="testimonial-avatar" style="background:#7c3aed;">NP</div>
                    <div>
                        <div class="testimonial-name">Natalie Pemberton</div>
                        <div class="testimonial-role">Founding Partner, Pemberton Wealth</div>
                        <div class="testimonial-company">Finance · 12 Employees · London</div>
                    </div>
                </div>
            </div>
            <div class="testimonial-card fade-up">
                <div class="testimonial-stars">
                    <span class="star">★</span><span class="star">★</span><span class="star">★</span><span class="star">★</span><span class="star">★</span>
                </div>
                <p>"The AI chatbot they built handles 70% of our customer enquiries out of hours. It's been a genuine game-changer — our team can now focus on high-value work instead of FAQs."</p>
                <div class="testimonial-author">
                    <div class="testimonial-avatar" style="background:#b45309;">TH</div>
                    <div>
                        <div class="testimonial-name">Thomas Hargreaves</div>
                        <div class="testimonial-role">Founder, Hargreaves Home Services</div>
                        <div class="testimonial-company">Home Services · 30 Employees · UK</div>
                    </div>
                </div>
            </div>
            <div class="testimonial-card fade-up" style="transition-delay:0.1s">
                <div class="testimonial-stars">
                    <span class="star">★</span><span class="star">★</span><span class="star">★</span><span class="star">★</span><span class="star">★</span>
                </div>
                <p>"We'd been quoted £80K by a big agency for our CRM. Sofinish delivered the same thing for a third of the price and in half the time. The quality was indistinguishable from the enterprise version."</p>
                <div class="testimonial-author">
                    <div class="testimonial-avatar" style="background:#059669;">SC</div>
                    <div>
                        <div class="testimonial-name">Sophie Carter</div>
                        <div class="testimonial-role">Head of Operations, Carter & Co Solicitors</div>
                        <div class="testimonial-company">Legal · 25 Employees · UK</div>
                    </div>
                </div>
            </div>
            <div class="testimonial-card fade-up" style="transition-delay:0.2s">
                <div class="testimonial-stars">
                    <span class="star">★</span><span class="star">★</span><span class="star">★</span><span class="star">★</span><span class="star">★</span>
                </div>
                <p>"What impressed us most was the senior team. We weren't passed to juniors. The same architects who quoted the project built it. That's rare — and it shows in the result."</p>
                <div class="testimonial-author">
                    <div class="testimonial-avatar" style="background:#db2777;">RA</div>
                    <div>
                        <div class="testimonial-name">Reem Al-Rashid</div>
                        <div class="testimonial-role">CTO, Al-Rashid Medical Group</div>
                        <div class="testimonial-company">Healthcare · 200 Employees · GCC</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ─── TRUST BADGES ─────────────────────────────────────────── -->
<section class="section section--white trust">
    <div class="container">
        <div class="section-header--center fade-up">
            <div class="section-label">Why Businesses Choose Us</div>
            <h2 class="section-title">The Sofinish Difference</h2>
            <p class="section-subtitle">What makes us the right partner for ambitious SMEs.</p>
        </div>
        <div class="trust-grid">
            <div class="trust-item fade-up">
                <div class="trust-icon">🏆</div>
                <h4>Award-Winning Team</h4>
                <p>Recognised by the UK Technology Awards for excellence in SME software delivery.</p>
            </div>
            <div class="trust-item fade-up" style="transition-delay:0.1s">
                <div class="trust-icon">🔒</div>
                <h4>Enterprise Security</h4>
                <p>SOC 2 compliant. All solutions built to ISO 27001 standards. Your data is safe.</p>
            </div>
            <div class="trust-item fade-up" style="transition-delay:0.2s">
                <div class="trust-icon">⚡</div>
                <h4>30 to 90 -Days Delivery</h4>
                <p>Standard SME solutions delivered within 30 days. Fast doesn't mean rushed.</p>
            </div>
            <div class="trust-item fade-up" style="transition-delay:0.3s">
                <div class="trust-icon">💷</div>
                <h4>Fixed Price Guarantee</h4>
                <p>What we quote is what you pay. No scope creep, no surprise invoices.</p>
            </div>
        </div>
    </div>
</section>

<!-- ─── FAQ ─────────────────────────────────────────────────── -->
<section class="section section--light faq" id="faq">
    <div class="container">
        <div class="faq-header fade-up">
            <div class="section-label">FAQ</div>
            <h2 class="section-title">Questions Every SME Owner Asks</h2>
            <p class="section-subtitle">Straight answers to the things that matter most.</p>
        </div>
        <div class="faq-list">
            <div class="faq-item fade-up">
                <button class="faq-question" onclick="toggleFaq(this)">
                    How long does a typical SME project take?
                    <span class="faq-toggle">+</span>
                </button>
                <div class="faq-answer">
                    <p>Standard SME solutions — a professional website, a basic CRM, or a simple mobile app — typically take 4–8 weeks from kick-off to launch. More complex ERP or AI projects may take 12–20 weeks. We'll give you a precise timeline in your proposal.</p>
                </div>
            </div>
            <div class="faq-item fade-up">
                <button class="faq-question" onclick="toggleFaq(this)">
                    What does a project cost? Are there hidden fees?
                    <span class="faq-toggle">+</span>
                </button>
                <div class="faq-answer">
                    <p>We provide fixed-price quotes for every project — agreed before any work begins. Our typical SME website starts from £2,500, a CRM from £5,000, and a full ERP from £15,000. There are no hidden fees, no per-hour billing surprises, and no scope creep charges.</p>
                </div>
            </div>
            <div class="faq-item fade-up">
                <button class="faq-question" onclick="toggleFaq(this)">
                    Do you work with startups and very small businesses?
                    <span class="faq-toggle">+</span>
                </button>
                <div class="faq-answer">
                    <p>Absolutely. We've designed specific packages for early-stage businesses and startups — from a polished landing page at £1,500 to a full SaaS MVP from £20,000. We also offer phased delivery so you can spread investment over time as your revenue grows.</p>
                </div>
            </div>
            <div class="faq-item fade-up">
                <button class="faq-question" onclick="toggleFaq(this)">
                    What ongoing support do you provide after launch?
                    <span class="faq-toggle">+</span>
                </button>
                <div class="faq-answer">
                    <p>Every project includes a post-launch support period (30–90 days depending on the package). After that, we offer flexible retainer plans from £500/month for ongoing maintenance, updates, and priority support. There's no lock-in contract.</p>
                </div>
            </div>
            <div class="faq-item fade-up">
                <button class="faq-question" onclick="toggleFaq(this)">
                    Will this scale as my business grows?
                    <span class="faq-toggle">+</span>
                </button>
                <div class="faq-answer">
                    <p>Yes. Every solution we build uses production-grade, scalable architecture. Your CRM can grow from 10 to 10,000 users. Your ERP can expand to new departments and locations. We design for where you are and where you're going.</p>
                </div>
            </div>
            <div class="faq-item fade-up">
                <button class="faq-question" onclick="toggleFaq(this)">
                    Where is your team based?
                    <span class="faq-toggle">+</span>
                </button>
                <div class="faq-answer">
                    <p>Our core delivery team is based in London, UK — with specialist engineers across the UK, EU, and US for specific capabilities. You'll have a dedicated UK-based account manager who coordinates everything and is available by phone, email, or video call.</p>
                </div>
            </div>
            <div class="faq-item fade-up">
                <button class="faq-question" onclick="toggleFaq(this)">
                    Can you integrate with our existing tools?
                    <span class="faq-toggle">+</span>
                </button>
                <div class="faq-answer">
                    <p>Yes. We integrate with every major business tool — Xero, QuickBooks, Sage, HubSpot, Salesforce, Microsoft 365, Google Workspace, Stripe, PayPal, and hundreds more. If we don't have a native connector, we'll build a custom API integration.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ─── CTA ─────────────────────────────────────────────────── -->
<section class="section section--white cta-section" id="contact">
    <div class="container">
        <div class="cta-box fade-up">
            <div class="cta-content">
                <h2>Ready to Build Something <br>That Actually Works?</h2>
                <p>Book a free, no-obligation discovery call. We'll understand your challenges, outline the best approach, and give you a fixed price proposal — all within 5 working days.</p>
            </div>
            <div class="cta-actions">
                <a href="mailto:hello@sofinish.co.uk" class="btn btn-white btn-lg">
                    <svg width="18" height="18" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg>
                    hello@sofinish.co.uk
                </a>
                <a href="tel:+442000000000" class="btn btn-ghost btn-lg">
                    <svg width="18" height="18" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M22 16.92v3a2 2 0 01-2.18 2 19.79 19.79 0 01-8.63-3.07A19.5 19.5 0 013.07 9.8 19.79 19.79 0 01.01 1.18 2 2 0 012 0h3a2 2 0 012 1.72c.127.96.361 1.903.7 2.81a2 2 0 01-.45 2.11L6.91 7.91a16 16 0 006.18 6.18l1.27-1.27a2 2 0 012.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0122 16.92z"/></svg>
                    +44 20 0000 0000
                </a>
                <a href="#" class="btn btn-ghost btn-lg" style="font-size:13px;">Or book a 30-min discovery call →</a>
            </div>
        </div>
    </div>
</section>

<!-- ─── FOOTER ──────────────────────────────────────────────── -->
@endsection

@section('extra_js')
<script>
    // Counter animation
    function animateCounters() {
        document.querySelectorAll('.stat-number').forEach(el => {
            const target = el.textContent;
            const match = target.match(/(\d+)/);
            if (!match) return;
            const suffix = target.replace(match[0], '');
            const targetNum = parseInt(match[0]);
            const duration = 1600;
            const start = performance.now();
            function update(now) {
                const p = Math.min((now - start) / duration, 1);
                const eased = 1 - Math.pow(1 - p, 3);
                el.innerHTML = Math.round(eased * targetNum) + '<span class="accent">' + suffix + '</span>';
                if (p < 1) requestAnimationFrame(update);
            }
            requestAnimationFrame(update);
        });
    }
    const statsObs = new IntersectionObserver((entries) => {
        if (entries[0] && entries[0].isIntersecting) { animateCounters(); statsObs.disconnect(); }
    }, { threshold: 0.5 });
    const statsSection = document.getElementById('stats');
    if (statsSection) statsObs.observe(statsSection);
</script>
@endsection