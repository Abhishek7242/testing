<?php

namespace App\Http\Controllers\Admin;

use App\Models\ContactMessage;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ContactMessageController extends Controller
{
    /**
     * Display a listing of the contact messages.
     */
    public function index()
    {
        $messages = ContactMessage::latest()->paginate(10);
        return view('admin.contact.index', compact('messages'));
    }

    /**
     * Display the specified contact message.
     */
    public function show(ContactMessage $message)
    {
        if ($message->status === 'unread') {
            $message->update(['status' => 'read']);
        }
        
        return response()->json($message);
    }

    /**
     * Update the status of the contact message.
     */
    public function updateStatus(Request $request, ContactMessage $message)
    {
        $validated = $request->validate([
            'status' => 'required|in:unread,read,replied',
        ]);

        $message->update(['status' => $validated['status']]);

        return response()->json(['success' => true, 'message' => 'Status updated successfully.']);
    }

    /**
     * Remove the specified contact message from storage.
     */
    public function destroy(ContactMessage $message)
    {
        $message->delete();
        
        if (request()->wantsJson()) {
            return response()->json(['success' => true, 'message' => 'Message deleted successfully.']);
        }

        return redirect()->route('admin.contacts.index')->with('success', 'Message deleted successfully.');
    }
}
