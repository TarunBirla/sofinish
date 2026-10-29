@extends('admin.layout')

@section('title', 'Client Contact Inquiries')
@section('page_title', 'Contact Inquiries & Leads')

@section('extra_css')
<style>
    .inquiries-container {
        background: var(--card-bg);
        border: 1px solid var(--card-border);
        border-radius: var(--radius-md);
        padding: 24px;
        backdrop-filter: blur(16px);
    }
    .inquiries-header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 16px;
        margin-bottom: 24px;
        flex-wrap: wrap;
    }
    .filter-tabs {
        display: flex;
        gap: 8px;
        background: rgba(10, 22, 40, 0.7);
        padding: 4px;
        border-radius: 10px;
        border: 1px solid var(--card-border);
    }
    .tab-btn {
        padding: 6px 14px;
        border-radius: 8px;
        font-size: 13px;
        font-weight: 500;
        color: var(--gray-400);
        text-decoration: none;
        transition: all 0.2s;
    }
    .tab-btn:hover {
        color: var(--white);
    }
    .tab-btn.active {
        background: linear-gradient(135deg, var(--teal-500) 0%, var(--blue-600) 100%);
        color: var(--white);
        font-weight: 600;
    }

    .badge-status {
        display: inline-flex;
        align-items: center;
        gap: 5px;
        padding: 3px 10px;
        border-radius: 999px;
        font-size: 11.5px;
        font-weight: 600;
        text-transform: capitalize;
    }
    .badge-unread {
        background: rgba(239, 68, 68, 0.15);
        color: #fca5a5;
        border: 1px solid rgba(239, 68, 68, 0.35);
    }
    .badge-read {
        background: rgba(59, 130, 246, 0.15);
        color: #93c5fd;
        border: 1px solid rgba(59, 130, 246, 0.35);
    }
    .badge-replied {
        background: rgba(16, 185, 129, 0.15);
        color: #6ee7b7;
        border: 1px solid rgba(16, 185, 129, 0.35);
    }

    .btn-view-msg {
        background: rgba(8, 145, 178, 0.18);
        border: 1px solid rgba(34, 211, 238, 0.3);
        color: var(--teal-300);
        padding: 6px 12px;
        border-radius: 6px;
        font-size: 12.5px;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.2s;
    }
    .btn-view-msg:hover {
        background: var(--teal-500);
        color: var(--white);
    }

    .btn-action-del {
        background: transparent;
        border: 1px solid rgba(239, 68, 68, 0.25);
        color: #fca5a5;
        padding: 6px 10px;
        border-radius: 6px;
        cursor: pointer;
        font-size: 12px;
        transition: all 0.2s;
    }
    .btn-action-del:hover {
        background: rgba(239, 68, 68, 0.2);
        color: #ffffff;
    }

    /* Modal for Message Detail */
    .inquiry-modal {
        display: none;
        position: fixed;
        inset: 0;
        background: rgba(0, 0, 0, 0.75);
        backdrop-filter: blur(8px);
        z-index: 999;
        align-items: center;
        justify-content: center;
        padding: 20px;
    }
    .inquiry-modal.active {
        display: flex;
    }
    .inquiry-modal-content {
        background: #0d1e33;
        border: 1px solid rgba(34, 211, 238, 0.3);
        border-radius: var(--radius-lg);
        width: 100%;
        max-width: 620px;
        max-height: 90vh;
        overflow-y: auto;
        box-shadow: 0 25px 60px rgba(0, 0, 0, 0.7);
        padding: 30px;
        animation: modalFadeIn 0.25s ease-out;
    }
    .modal-detail-row {
        margin-bottom: 14px;
        display: flex;
        flex-direction: column;
        gap: 4px;
    }
    .modal-detail-row label {
        font-size: 11px;
        text-transform: uppercase;
        color: var(--gray-400);
    }
    .modal-detail-row span {
        font-size: 14.5px;
        color: var(--white);
        font-weight: 500;
    }
    .modal-msg-box {
        background: rgba(10, 22, 40, 0.85);
        border: 1px solid var(--card-border);
        border-radius: 8px;
        padding: 16px;
        color: #e2e8f0;
        line-height: 1.6;
        font-size: 14px;
        white-space: pre-wrap;
        margin-top: 6px;
    }
</style>
@endsection

@section('content')

<div class="inquiries-container">
    <div class="inquiries-header">
        <div class="filter-tabs">
            <a href="{{ route('admin.inquiries') }}" class="tab-btn {{ empty($status) ? 'active' : '' }}">
                All Inquiries
            </a>
            <a href="{{ route('admin.inquiries', ['status' => 'unread']) }}" class="tab-btn {{ $status === 'unread' ? 'active' : '' }}">
                Unread ({{ $unreadCount }})
            </a>
            <a href="{{ route('admin.inquiries', ['status' => 'read']) }}" class="tab-btn {{ $status === 'read' ? 'active' : '' }}">
                Reviewed
            </a>
            <a href="{{ route('admin.inquiries', ['status' => 'replied']) }}" class="tab-btn {{ $status === 'replied' ? 'active' : '' }}">
                Replied
            </a>
        </div>

        <form action="{{ route('admin.inquiries') }}" method="GET" class="search-form">
            <input type="text" name="search" class="search-input" placeholder="Search by name, company, email..." value="{{ $search }}">
            <button type="submit" class="btn-search">Filter</button>
            @if($search || $status)
                <a href="{{ route('admin.inquiries') }}" style="color:var(--gray-400); font-size:13px; text-decoration:none;">Reset</a>
            @endif
        </form>
    </div>

    <div class="table-responsive">
        <table class="custom-table">
            <thead>
                <tr>
                    <th>Lead / Contact</th>
                    <th>Service & Budget</th>
                    <th>Message Preview</th>
                    <th>Status</th>
                    <th>Date Received</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($inquiries as $inquiry)
                    <tr>
                        <td>
                            <div>
                                <strong style="color: #ffffff; font-size: 14.5px;">{{ $inquiry->name }}</strong>
                                <div style="color: var(--teal-300); font-size: 12.5px;">
                                    <a href="mailto:{{ $inquiry->email }}" style="color: inherit; text-decoration: none;">{{ $inquiry->email }}</a>
                                </div>
                                @if($inquiry->company)
                                    <div style="color: var(--gray-400); font-size: 12px;">🏢 {{ $inquiry->company }}</div>
                                @endif
                                @if($inquiry->phone)
                                    <div style="color: var(--gray-400); font-size: 12px;">📞 {{ $inquiry->phone }}</div>
                                @endif
                            </div>
                        </td>
                        <td>
                            <div>
                                <span style="font-weight: 600; color: #93c5fd; display: block;">{{ $inquiry->service ?? 'General Software' }}</span>
                                <span style="color: var(--gray-400); font-size: 12px;">{{ $inquiry->budget ?? 'Flexible' }}</span>
                            </div>
                        </td>
                        <td style="max-width: 280px;">
                            <div style="overflow: hidden; text-overflow: ellipsis; white-space: nowrap; color: var(--gray-300);">
                                {{ $inquiry->message }}
                            </div>
                        </td>
                        <td>
                            <span class="badge-status badge-{{ $inquiry->status }}">
                                @if($inquiry->status === 'unread') 🔴
                                @elseif($inquiry->status === 'replied') 🟢
                                @else 🔵
                                @endif
                                {{ $inquiry->status }}
                            </span>
                        </td>
                        <td>
                            <div class="time-cell">
                                <strong>{{ $inquiry->created_at->diffForHumans() }}</strong>
                                <span>{{ $inquiry->created_at->format('d M Y, h:i A') }}</span>
                            </div>
                        </td>
                        <td>
                            <div style="display: flex; align-items: center; gap: 8px;">
                                <button type="button" class="btn-view-msg" onclick='viewInquiryDetails(@json($inquiry))'>
                                    View Details
                                </button>
                                <form action="{{ route('admin.inquiries.destroy', $inquiry->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this inquiry?');" style="margin: 0;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn-action-del" title="Delete Inquiry">✕</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" style="text-align: center; padding: 40px; color: var(--gray-400);">
                            No contact inquiries found.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div style="margin-top: 20px;">
        {{ $inquiries->links() }}
    </div>
</div>

<!-- Modal for Viewing Inquiry Detail -->
<div class="inquiry-modal" id="inquiryModal" onclick="closeInquiryModalOnBackdrop(event)">
    <div class="inquiry-modal-content">
        <div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 20px; border-bottom: 1px solid var(--card-border); padding-bottom: 14px;">
            <h3 style="font-family: 'Space Grotesk', sans-serif; font-size: 18px; color: #ffffff;" id="modalLeadName">Inquiry Details</h3>
            <button type="button" class="btn-close-modal" onclick="closeInquiryModal()">&times;</button>
        </div>

        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 14px; margin-bottom: 16px;">
            <div class="modal-detail-row">
                <label>Email Address</label>
                <span id="modalEmail">-</span>
            </div>
            <div class="modal-detail-row">
                <label>Phone Number</label>
                <span id="modalPhone">-</span>
            </div>
            <div class="modal-detail-row">
                <label>Company</label>
                <span id="modalCompany">-</span>
            </div>
            <div class="modal-detail-row">
                <label>Service & Budget</label>
                <span id="modalServiceBudget">-</span>
            </div>
        </div>

        <div class="modal-detail-row">
            <label>Customer Message</label>
            <div class="modal-msg-box" id="modalMessage"></div>
        </div>

        <!-- Update Status Form -->
        <div style="margin-top: 24px; padding-top: 18px; border-top: 1px solid var(--card-border); display: flex; align-items: center; justify-content: space-between; flex-wrap: wrap; gap: 12px;">
            <form id="statusUpdateForm" method="POST" style="display: flex; align-items: center; gap: 10px; margin: 0;">
                @csrf
                <label style="font-size: 13px; color: var(--gray-400);">Change Status:</label>
                <select name="status" id="modalStatusSelect" style="background: #0a1628; border: 1px solid var(--card-border); color: #ffffff; padding: 6px 10px; border-radius: 6px; font-size: 13px;">
                    <option value="unread">Unread</option>
                    <option value="read">Mark as Read</option>
                    <option value="replied">Mark as Replied</option>
                </select>
                <button type="submit" class="btn-search" style="padding: 6px 12px; font-size: 12.5px;">Update</button>
            </form>

            <a id="modalMailto" href="#" class="btn-journey" style="padding: 8px 16px;">
                <span>Reply by Email ✉</span>
            </a>
        </div>
    </div>
</div>

@endsection

@section('extra_js')
<script>
    const inqModal = document.getElementById('inquiryModal');

    function viewInquiryDetails(inquiry) {
        document.getElementById('modalLeadName').textContent = `Inquiry from ${inquiry.name}`;
        document.getElementById('modalEmail').textContent = inquiry.email;
        document.getElementById('modalPhone').textContent = inquiry.phone || 'Not provided';
        document.getElementById('modalCompany').textContent = inquiry.company || 'Not provided';
        document.getElementById('modalServiceBudget').textContent = `${inquiry.service || 'Software'} (${inquiry.budget || 'Flexible'})`;
        document.getElementById('modalMessage').textContent = inquiry.message;

        document.getElementById('modalStatusSelect').value = inquiry.status;
        document.getElementById('statusUpdateForm').action = `/admin/inquiries/${inquiry.id}/status`;

        const mailto = `mailto:${inquiry.email}?subject=Sofinish%20Technologies%20-%20Re:%20${encodeURIComponent(inquiry.service || 'Software Inquiry')}`;
        document.getElementById('modalMailto').href = mailto;

        inqModal.classList.add('active');
    }

    function closeInquiryModal() {
        inqModal.classList.remove('active');
    }

    function closeInquiryModalOnBackdrop(e) {
        if (e.target === inqModal) {
            closeInquiryModal();
        }
    }
</script>
@endsection
