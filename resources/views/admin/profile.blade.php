@extends('admin.layout')

@section('title', 'Admin Profile & Security')
@section('page_title', 'Admin Profile Settings')

@section('extra_css')
<style>
    .profile-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 28px;
    }
    @media (max-width: 991px) {
        .profile-grid {
            grid-template-columns: 1fr;
        }
    }

    .profile-card {
        background: #ffffff;
        border: 1px solid var(--card-border);
        border-radius: var(--radius-md);
        padding: 32px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.03);
    }
    .profile-card-header {
        display: flex;
        align-items: center;
        gap: 14px;
        margin-bottom: 24px;
        padding-bottom: 18px;
        border-bottom: 1px solid var(--card-border);
    }
    .profile-header-icon {
        width: 44px;
        height: 44px;
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        background: var(--blue-50);
        color: var(--blue-600);
    }
    .profile-header-text h3 {
        font-family: 'Space Grotesk', sans-serif;
        font-size: 18px;
        font-weight: 700;
        color: var(--text-main);
    }
    .profile-header-text p {
        font-size: 13px;
        color: var(--text-muted);
        margin-top: 2px;
    }

    .form-group {
        margin-bottom: 22px;
    }
    .form-label {
        display: block;
        font-size: 13px;
        font-weight: 600;
        color: #334155;
        margin-bottom: 8px;
    }
    .form-control {
        width: 100%;
        background: #ffffff;
        border: 1px solid var(--card-border);
        border-radius: var(--radius-sm);
        padding: 11px 16px;
        color: var(--text-main);
        font-family: 'Inter', sans-serif;
        font-size: 14px;
        outline: none;
        transition: all 0.2s ease;
    }
    .form-control:focus {
        border-color: var(--blue-600);
        box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.15);
    }
    .invalid-feedback {
        color: var(--red-500);
        font-size: 12.5px;
        margin-top: 6px;
        display: block;
    }

    .btn-submit {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        background: linear-gradient(135deg, var(--blue-600) 0%, var(--teal-600) 100%);
        color: #ffffff;
        border: none;
        border-radius: var(--radius-sm);
        padding: 12px 24px;
        font-size: 14px;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.25s ease;
        box-shadow: 0 4px 12px rgba(37, 99, 235, 0.2);
    }
    .btn-submit:hover {
        transform: translateY(-1px);
        box-shadow: 0 6px 18px rgba(37, 99, 235, 0.35);
        filter: brightness(1.05);
    }

    .alert-success {
        background: #ecfdf5;
        border: 1px solid #a7f3d0;
        color: #065f46;
        padding: 14px 18px;
        border-radius: 10px;
        margin-bottom: 20px;
        font-size: 13.5px;
        display: flex;
        align-items: center;
        gap: 10px;
    }
</style>
@endsection

@section('content')

<div class="profile-grid">
    <!-- Card 1: Admin Profile Details (Name & Email) -->
    <div class="profile-card">
        <div class="profile-card-header">
            <div class="profile-header-icon">
                <svg width="22" height="22" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
            </div>
            <div class="profile-header-text">
                <h3>Admin Information</h3>
                <p>Update your personal name & admin login email</p>
            </div>
        </div>

        @if(session('success_profile'))
            <div class="alert-success">
                <span>✓</span>
                <div>{{ session('success_profile') }}</div>
            </div>
        @endif

        <form action="{{ route('admin.profile.update') }}" method="POST">
            @csrf

            <div class="form-group">
                <label class="form-label" for="name">Admin Full Name</label>
                <input type="text" id="name" name="name" class="form-control" value="{{ old('name', $user->name) }}" required>
                @error('name') <span class="invalid-feedback">{{ $message }}</span> @enderror
            </div>

            <div class="form-group">
                <label class="form-label" for="email">Admin Login Email</label>
                <input type="email" id="email" name="email" class="form-control" value="{{ old('email', $user->email) }}" required>
                @error('email') <span class="invalid-feedback">{{ $message }}</span> @enderror
                <span style="font-size: 12px; color: var(--text-muted); margin-top: 4px; display: block;">
                    This email is used to login to <code>/admin/login</code>.
                </span>
            </div>

            <button type="submit" class="btn-submit">
                <span>Save Profile Changes</span>
                <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M5 13l4 4L19 7"/></svg>
            </button>
        </form>
    </div>

    <!-- Card 2: Security & Password Update -->
    <div class="profile-card">
        <div class="profile-card-header">
            <div class="profile-header-icon" style="background: #fef2f2; color: #dc2626;">
                <svg width="22" height="22" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg>
            </div>
            <div class="profile-header-text">
                <h3>Security & Password</h3>
                <p>Change and strengthen your administrator password</p>
            </div>
        </div>

        @if(session('success_password'))
            <div class="alert-success">
                <span>✓</span>
                <div>{{ session('success_password') }}</div>
            </div>
        @endif

        <form action="{{ route('admin.profile.password') }}" method="POST">
            @csrf

            <div class="form-group">
                <label class="form-label" for="current_password">Current Password</label>
                <input type="password" id="current_password" name="current_password" class="form-control" placeholder="Enter existing password" required>
                @error('current_password') <span class="invalid-feedback">{{ $message }}</span> @enderror
            </div>

            <div class="form-group">
                <label class="form-label" for="password">New Password</label>
                <input type="password" id="password" name="password" class="form-control" placeholder="Minimum 6 characters" required>
                @error('password') <span class="invalid-feedback">{{ $message }}</span> @enderror
            </div>

            <div class="form-group">
                <label class="form-label" for="password_confirmation">Confirm New Password</label>
                <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" placeholder="Repeat new password" required>
            </div>

            <button type="submit" class="btn-submit" style="background: linear-gradient(135deg, #059669 0%, var(--teal-600) 100%);">
                <span>Update Password</span>
                <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
            </button>
        </form>
    </div>
</div>

@endsection
