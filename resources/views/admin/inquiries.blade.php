@extends('admin.layout')

@section('title', 'Client Contact Inquiries')
@section('page_title', 'Contact Inquiries & Leads')

@section('extra_css')
<style>
    .inquiries-container {
        background: #ffffff;
        border: 1px solid var(--card-border);
        border-radius: var(--radius-md);
        padding: 24px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.03);
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
        background: #f1f5f9;
        padding: 4px;
        border-radius: 10px;
        border: 1px solid var(--card-border);
    }
    .tab-btn {
        padding: 6px 14px;
        border-radius: 8px;
        font-size: 13px;
        font-weight: 500;
        color: var(--text-muted);
        text-decoration: none;
        transition: all 0.2s;
    }
    .tab-btn:hover {
        color: var(--text-main);
    }
    .tab-btn.active {
        background: #ffffff;
        color: var(--blue-600);
        font-weight: 600;
        box-shadow: 0 1px 3px rgba(0, 0, 0, 0.08);
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
        background: #fef2f2;
        color: #dc2626;
        border: 1px solid #fecaca;
    }
    .badge-read {
        background: #eff6ff;
        color: #2563eb;
        border: 1px solid #bfdbfe;
    }
    .badge-replied {
        background: #ecfdf5;
        color: #059669;
        border: 1px solid #a7f3d0;
    }

    .btn-view-msg {
        background: var(--blue-50);
        border: 1px solid #bfdbfe;
        color: var(--blue-600);
        padding: 6px 12px;
        border-radius: 6px;
        font-size: 12.5px;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.2s;
    }
    .btn-view-msg:hover {
        background: var(--blue-600);
        color: #ffffff;
        border-color: var(--blue-600);
    }

    .btn-action-del {
        background: #ffffff;
        border: 1px solid #fecaca;
        color: #dc2626;
        padding: 6px 10px;
        border-radius: 6px;
        cursor: pointer;
        font-size: 12px;
        transition: all 0.2s;
    }
    .btn-action-del:hover {
        background: #dc2626;
        color: #ffffff;
    }

    /* Modal for Message Detail - Light Theme */
    .inquiry-modal {
        display: none;
        position: fixed;
        inset: 0;
        background: rgba(15, 23, 42, 0.6);
        backdrop-filter: blur(4px);
        z-index: 999;
        align-items: center;
        justify-content: center;
        padding: 20px;
    }
    .inquiry-modal.active {
        display: flex;
    }
    .inquiry-modal-content {
        background: #ffffff;
        border: 1px solid var(--card-border);
        border-radius: var(--radius-lg);
        width: 100%;
        max-width: 620px;
        max-height: 90vh;
        overflow-y: auto;
        box-shadow: 0 20px 50px rgba(0, 0, 0, 0.15);
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
        font-weight: 600;
        text-transform: uppercase;
        color: var(--text-muted);
    }
    .modal-detail-row span {
        font-size: 14.5px;
        color: var(--text-main);
        font-weight: 600;
    }
    .modal-msg-box {
        background: #f8fafc;
        border: 1px solid var(--card-border);
        border-radius: 8px;
        padding: 16px;
        color: #1e293b;
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
                <a href="{{ route('admin.inquiries') }}" style="color:var(--text-muted); font-size:13px; text-decoration:none;">Reset</a>
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
                                <strong style="color: var(--text-main); font-size: 14.5px;">{{ $inquiry->name }}</strong>
                                <div style="color: var(--blue-600); font-size: 12.5px;">
                                    <a href="mailto:{{ $inquiry->email }}" style="color: inherit; text-decoration: none; font-weight: 500;">{{ $inquiry->email }}</a>
                                </div>
                                @if($inquiry->company)
                                    <div style="color: var(--text-muted); font-size: 12px;">🏢 {{ $inquiry->company }}</div>
                                @endif
                                @if($inquiry->phone)
                                    <div style="color: var(--text-muted); font-size: 12px;">📞 {{ $inquiry->phone }}</div>
                                @endif
                            </div>
                        </td>
                        <td>
                            <div>
                                <span style="font-weight: 600; color: #1e3a8a; display: block;">{{ $inquiry->service ?? 'General Software' }}</span>
                                <span style="color: var(--text-muted); font-size: 12px;">{{ $inquiry->budget ?? 'Flexible' }}</span>
                            </div>
                        </td>
                        <td style="max-width: 280px;">
                            <div style="overflow: hidden; text-overflow: ellipsis; white-space: nowrap; color: #475569;">
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
                        <td colspan="6" style="text-align: center; padding: 40px; color: var(--text-muted);">
                            No contact inquiries found.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div>
        {{ $inquiries->links('pagination.custom') }}
    </div>
</div>

<!-- Modal for Viewing Inquiry Detail -->
<div class="inquiry-modal" id="inquiryModal" onclick="closeInquiryModalOnBackdrop(event)">
    <div class="inquiry-modal-content">
        <div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 20px; border-bottom: 1px solid var(--card-border); padding-bottom: 14px;">
            <h3 style="font-family: 'Space Grotesk', sans-serif; font-size: 18px; color: var(--text-main);" id="modalLeadName">Inquiry Details</h3>
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
                <label style="font-size: 13px; color: var(--text-muted); font-weight: 500;">Change Status:</label>
                <select name="status" id="modalStatusSelect" style="background: #ffffff; border: 1px solid var(--card-border); color: var(--text-main); padding: 6px 10px; border-radius: 6px; font-size: 13px;">
                    <option value="unread">Unread</option>
                    <option value="read">Mark as Read</option>
                    <option value="replied">Mark as Replied</option>
                </select>
                <button type="submit" class="btn-search" style="padding: 6px 14px; font-size: 12.5px;">Update</button>
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
