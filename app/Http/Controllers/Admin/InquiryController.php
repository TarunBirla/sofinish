<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactInquiry;
use Illuminate\Http\Request;

class InquiryController extends Controller
{
    /**
     * List all contact inquiries
     */
    public function index(Request $request)
    {
        $status = $request->input('status');
        $search = $request->input('search');

        $query = ContactInquiry::orderBy('created_at', 'desc');

        if ($status && in_array($status, ['unread', 'read', 'replied'])) {
            $query->where('status', $status);
        }

        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%")
                  ->orWhere('company', 'like', "%{$search}%")
                  ->orWhere('phone', 'like', "%{$search}%")
                  ->orWhere('service', 'like', "%{$search}%");
            });
        }

        $inquiries = $query->paginate(15)->withQueryString();
        $unreadCount = ContactInquiry::where('status', 'unread')->count();

        return view('admin.inquiries', compact('inquiries', 'unreadCount', 'status', 'search'));
    }

    /**
     * Update inquiry status (read / unread / replied)
     */
    public function updateStatus(Request $request, $id)
    {
        $inquiry = ContactInquiry::findOrFail($id);
        $status = $request->input('status');

        if (in_array($status, ['unread', 'read', 'replied'])) {
            $inquiry->status = $status;
            $inquiry->save();
        }

        if ($request->wantsJson()) {
            return response()->json(['status' => 'success', 'new_status' => $inquiry->status]);
        }

        return back()->with('success', 'Inquiry status updated successfully.');
    }

    /**
     * Delete inquiry
     */
    public function destroy($id)
    {
        $inquiry = ContactInquiry::findOrFail($id);
        $inquiry->delete();

        return back()->with('success', 'Inquiry deleted successfully.');
    }
}
