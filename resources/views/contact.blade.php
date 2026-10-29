@extends('layouts.app')

@section('title', 'Get in Touch | Sofinish Technologies - Book a Consultation')
@section('meta_description', 'Connect with the senior engineering and consulting team at Sofinish Technologies. Get a fixed-price proposal for your SME software project within 5 working days.')

@section('extra_css')
<style>
    .contact-page {
        padding: 130px 0 100px;
        background: #ffffff;
        color: var(--navy);
        position: relative;
    }
    
    .contact-header {
        text-align: center;
        max-width: 800px;
        margin: 0 auto 50px;
    }
    .contact-badge {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        padding: 6px 16px;
        border-radius: var(--radius-full);
        background: var(--blue-50);
        border: 1px solid var(--blue-200);
        color: var(--blue-600);
        font-size: 13px;
        font-weight: 600;
        letter-spacing: 0.5px;
        text-transform: uppercase;
        margin-bottom: 20px;
    }
    .contact-header h1 {
        font-family: 'Space Grotesk', sans-serif;
        font-size: clamp(2.2rem, 4.5vw, 3.4rem);
        font-weight: 700;
        line-height: 1.15;
        color: var(--navy);
        margin-bottom: 18px;
    }
    .contact-header h1 span {
        background: linear-gradient(135deg, var(--blue-600) 0%, var(--teal-500) 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }
    .contact-header p {
        color: var(--gray-600);
        font-size: 1.1rem;
        line-height: 1.6;
    }

    .contact-grid {
        display: grid;
        grid-template-columns: 1fr 1.25fr;
        gap: 40px;
        align-items: start;
    }
    @media (max-width: 991px) {
        .contact-grid {
            grid-template-columns: 1fr;
        }
    }

    /* Left Info Card */
    .contact-info-panel {
        background: #ffffff;
        border: 1px solid var(--gray-200);
        border-radius: var(--radius-lg);
        padding: 40px;
        box-shadow: 0 4px 20px rgba(10, 22, 40, 0.06);
    }
    .contact-info-panel h3 {
        font-family: 'Space Grotesk', sans-serif;
        font-size: 1.5rem;
        margin-bottom: 20px;
        color: var(--navy);
    }
    .contact-methods {
        display: flex;
        flex-direction: column;
        gap: 24px;
        margin-bottom: 35px;
    }
    .contact-method-item {
        display: flex;
        align-items: flex-start;
        gap: 16px;
    }
    .contact-icon-box {
        width: 48px;
        height: 48px;
        border-radius: var(--radius-md);
        background: var(--blue-50);
        border: 1px solid var(--blue-100);
        display: flex;
        align-items: center;
        justify-content: center;
        color: var(--blue-600);
        flex-shrink: 0;
    }
    .contact-method-detail label {
        display: block;
        font-size: 12px;
        color: var(--gray-500);
        text-transform: uppercase;
        letter-spacing: 0.5px;
        margin-bottom: 4px;
    }
    .contact-method-detail a, .contact-method-detail span {
        color: var(--navy);
        font-size: 16px;
        font-weight: 600;
        text-decoration: none;
        transition: color 0.2s;
    }
    .contact-method-detail a:hover {
        color: var(--blue-600);
    }

    .trust-guarantee-card {
        background: var(--gray-50);
        border: 1px solid var(--gray-200);
        border-radius: var(--radius-md);
        padding: 24px;
    }
    .trust-guarantee-card h4 {
        font-size: 15px;
        font-weight: 700;
        color: var(--navy);
        margin-bottom: 14px;
        display: flex;
        align-items: center;
        gap: 8px;
    }
    .trust-guarantee-card ul {
        list-style: none;
        padding: 0;
        margin: 0;
        display: flex;
        flex-direction: column;
        gap: 12px;
    }
    .trust-guarantee-card li {
        font-size: 13.5px;
        color: var(--gray-700);
        display: flex;
        align-items: center;
        gap: 10px;
    }
    .trust-guarantee-card li svg {
        color: var(--emerald-500);
        flex-shrink: 0;
    }

    /* Right Form Card */
    .contact-form-panel {
        background: #ffffff;
        border: 1px solid var(--gray-200);
        border-radius: var(--radius-lg);
        padding: 44px;
        box-shadow: 0 10px 40px rgba(10, 22, 40, 0.08);
    }
    .contact-form-panel h3 {
        font-family: 'Space Grotesk', sans-serif;
        font-size: 1.6rem;
        margin-bottom: 8px;
        color: var(--navy);
    }
    .contact-form-panel p.form-subtitle {
        color: var(--gray-500);
        font-size: 14px;
        margin-bottom: 30px;
    }

    .form-group-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 20px;
    }
    @media (max-width: 640px) {
        .form-group-grid {
            grid-template-columns: 1fr;
        }
    }
    .form-group {
        margin-bottom: 22px;
    }
    .form-label {
        display: block;
        font-size: 13.5px;
        font-weight: 600;
        color: var(--gray-800);
        margin-bottom: 8px;
    }
    .form-label .required {
        color: #ef4444;
    }
    .form-input, .form-select, .form-textarea {
        width: 100%;
        background: #ffffff;
        border: 1px solid var(--gray-300);
        border-radius: var(--radius-sm);
        padding: 12px 16px;
        color: var(--gray-900);
        font-family: 'Inter', sans-serif;
        font-size: 14.5px;
        transition: all 0.25s ease;
        outline: none;
    }
    .form-input:focus, .form-select:focus, .form-textarea:focus {
        border-color: var(--blue-500);
        box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.15);
    }
    .form-input::placeholder, .form-textarea::placeholder {
        color: var(--gray-400);
    }
    .form-select option {
        background: #ffffff;
        color: var(--gray-900);
    }
    .form-textarea {
        resize: vertical;
        min-height: 120px;
    }

    .alert-success {
        background: #ecfdf5;
        border: 1px solid #a7f3d0;
        color: #065f46;
        padding: 16px 20px;
        border-radius: var(--radius-md);
        margin-bottom: 25px;
        display: flex;
        align-items: center;
        gap: 12px;
        font-size: 14.5px;
    }
    .alert-danger {
        background: #fef2f2;
        border: 1px solid #fecaca;
        color: #991b1b;
        padding: 14px 18px;
        border-radius: var(--radius-md);
        margin-bottom: 25px;
        font-size: 14px;
    }
    .invalid-feedback {
        color: #ef4444;
        font-size: 12.5px;
        margin-top: 5px;
        display: block;
    }

    .btn-submit-inquiry {
        width: 100%;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 10px;
        background: linear-gradient(135deg, var(--blue-600) 0%, var(--teal-500) 100%);
        color: var(--white);
        font-family: 'Space Grotesk', sans-serif;
        font-size: 16px;
        font-weight: 600;
        padding: 15px 30px;
        border-radius: var(--radius-md);
        border: none;
        cursor: pointer;
        transition: all 0.3s ease;
        box-shadow: 0 8px 25px rgba(37, 99, 235, 0.25);
    }
    .btn-submit-inquiry:hover {
        transform: translateY(-2px);
        box-shadow: 0 12px 30px rgba(37, 99, 235, 0.35);
        filter: brightness(1.05);
    }
</style>
@endsection

@section('content')
<section class="contact-page">
    <div class="container">
        <!-- Header -->
        <div class="contact-header fade-up">
            <span class="contact-badge">Direct Communication &bull; 24h Response</span>
            <h1>Let's Build Something <br><span>That Transforms Your Business</span></h1>
            <p>Book a free, confidential discovery call. We'll examine your technical goals, recommend the right architecture, and deliver a fixed-scope proposal within 5 business days.</p>
        </div>

        <!-- Grid -->
        <div class="contact-grid">
            <!-- Left Info Panel -->
            <div class="contact-info-panel fade-left">
                <h3>Get in Touch Directly</h3>
                <p style="color: var(--gray-600); font-size: 14px; line-height: 1.6; margin-bottom: 30px;">
                    Have questions about our technology stack or previous SME case studies? Our UK-based solution architects are always happy to chat.
                </p>

                <div class="contact-methods">
                    <div class="contact-method-item">
                        <div class="contact-icon-box">
                            <svg width="22" height="22" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg>
                        </div>
                        <div class="contact-method-detail">
                            <label>Email Us Directly</label>
                            <a href="mailto:hello@sofinish.co.uk">hello@sofinish.co.uk</a>
                        </div>
                    </div>

                    <div class="contact-method-item">
                        <div class="contact-icon-box">
                            <svg width="22" height="22" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M22 16.92v3a2 2 0 01-2.18 2 19.79 19.79 0 01-8.63-3.07A19.5 19.5 0 013.07 9.8 19.79 19.79 0 01.01 1.18 2 2 0 012 0h3a2 2 0 012 1.72c.127.96.361 1.903.7 2.81a2 2 0 01-.45 2.11L6.91 7.91a16 16 0 006.18 6.18l1.27-1.27a2 2 0 012.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0122 16.92z"/></svg>
                        </div>
                        <div class="contact-method-detail">
                            <label>Call Our London Office</label>
                            <a href="tel:+442000000000">+44 20 0000 0000</a>
                        </div>
                    </div>

                    <div class="contact-method-item">
                        <div class="contact-icon-box">
                            <svg width="22" height="22" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0118 0z"/><circle cx="12" cy="10" r="3"/></svg>
                        </div>
                        <div class="contact-method-detail">
                            <label>Headquarters</label>
                            <span>London, United Kingdom</span>
                        </div>
                    </div>
                </div>

                <div class="trust-guarantee-card">
                    <h4>
                        <svg width="18" height="18" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
                        Our Commitment to SMEs:
                    </h4>
                    <ul>
                        <li>
                            <svg width="16" height="16" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                            Fixed-price proposal within 5 business days
                        </li>
                        <li>
                            <svg width="16" height="16" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                            Zero junior delegation &bull; Senior UK lead engineers
                        </li>
                        <li>
                            <svg width="16" height="16" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                            Full IP ownership & comprehensive warranty
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Right Form Panel -->
            <div class="contact-form-panel fade-right">
                <h3>Start Your Project</h3>
                <p class="form-subtitle">Fill out the quick form below and we'll reply within 24 hours.</p>

                @if(session('success_message'))
                    <div class="alert-success">
                        <svg width="22" height="22" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>
                        <div>
                            <strong>Inquiry Received!</strong><br>
                            {{ session('success_message') }}
                        </div>
                    </div>
                @endif

                @if(isset($errors) && $errors->any())
                    <div class="alert-danger">
                        <strong>Please check the form for errors:</strong>
                        <ul style="margin: 6px 0 0 18px;">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('contact.submit') }}" method="POST">
                    @csrf

                    <div class="form-group-grid">
                        <div class="form-group">
                            <label class="form-label" for="name">Your Name <span class="required">*</span></label>
                            <input type="text" id="name" name="name" class="form-input" placeholder="e.g. David Smith" value="{{ old('name') }}" required>
                            @error('name') <span class="invalid-feedback">{{ $message }}</span> @enderror
                        </div>

                        <div class="form-group">
                            <label class="form-label" for="email">Work Email <span class="required">*</span></label>
                            <input type="email" id="email" name="email" class="form-input" placeholder="david@company.co.uk" value="{{ old('email') }}" required>
                            @error('email') <span class="invalid-feedback">{{ $message }}</span> @enderror
                        </div>
                    </div>

                    <div class="form-group-grid">
                        <div class="form-group">
                            <label class="form-label" for="phone">Phone Number</label>
                            <input type="text" id="phone" name="phone" class="form-input" placeholder="+44 7..." value="{{ old('phone') }}">
                            @error('phone') <span class="invalid-feedback">{{ $message }}</span> @enderror
                        </div>

                        <div class="form-group">
                            <label class="form-label" for="company">Company Name</label>
                            <input type="text" id="company" name="company" class="form-input" placeholder="Company Ltd" value="{{ old('company') }}">
                            @error('company') <span class="invalid-feedback">{{ $message }}</span> @enderror
                        </div>
                    </div>

                    <div class="form-group-grid">
                        <div class="form-group">
                            <label class="form-label" for="service">Service Required</label>
                            <select id="service" name="service" class="form-select">
                                <option value="">Select a Service...</option>
                                <option value="Custom Websites & Web Apps" {{ old('service') == 'Custom Websites & Web Apps' ? 'selected' : '' }}>Custom Websites & Web Apps</option>
                                <option value="Mobile Applications" {{ old('service') == 'Mobile Applications' ? 'selected' : '' }}>Mobile Applications (iOS / Android)</option>
                                <option value="ERP Systems" {{ old('service') == 'ERP Systems' ? 'selected' : '' }}>ERP Systems & Operations</option>
                                <option value="CRM Platforms" {{ old('service') == 'CRM Platforms' ? 'selected' : '' }}>CRM & Sales Pipelines</option>
                                <option value="AI & Automation" {{ old('service') == 'AI & Automation' ? 'selected' : '' }}>AI Agents & Process Automation</option>
                                <option value="Cloud & Architecture" {{ old('service') == 'Cloud & Architecture' ? 'selected' : '' }}>Cloud & Architecture Consulting</option>
                            </select>
                            @error('service') <span class="invalid-feedback">{{ $message }}</span> @enderror
                        </div>

                        <div class="form-group">
                            <label class="form-label" for="budget">Estimated Budget</label>
                            <select id="budget" name="budget" class="form-select">
                                <option value="">Select Budget Range...</option>
                                <option value="£5,000 - £10,000" {{ old('budget') == '£5,000 - £10,000' ? 'selected' : '' }}>£5,000 - £10,000 (Launch)</option>
                                <option value="£10,000 - £25,000" {{ old('budget') == '£10,000 - £25,000' ? 'selected' : '' }}>£10,000 - £25,000 (Accelerate)</option>
                                <option value="£25,000 - £50,000" {{ old('budget') == '£25,000 - £50,000' ? 'selected' : '' }}>£25,000 - £50,000 (Scale)</option>
                                <option value="£50,000+" {{ old('budget') == '£50,000+' ? 'selected' : '' }}>£50,000+ (Enterprise)</option>
                            </select>
                            @error('budget') <span class="invalid-feedback">{{ $message }}</span> @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="message">Project Description & Goals <span class="required">*</span></label>
                        <textarea id="message" name="message" class="form-textarea" placeholder="Tell us about what you want to build, existing systems to integrate, and key business outcomes..." required>{{ old('message') }}</textarea>
                        @error('message') <span class="invalid-feedback">{{ $message }}</span> @enderror
                    </div>

                    <button type="submit" class="btn-submit-inquiry">
                        <span>Send Inquiry & Request Discovery Call</span>
                        <svg width="18" height="18" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
                    </button>
                    <p style="text-align: center; color: var(--gray-500); font-size: 12.5px; margin-top: 14px;">
                        🔒 All inquiries are protected under mutual NDA. We never share your data.
                    </p>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection
