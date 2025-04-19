<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\ContactUs;
use App\Mail\ContactUsMail;
use Illuminate\Support\Facades\Mail;

class ContactUsController extends Controller
{
    public function index()
    {
        $contacts = ContactUs::latest()->paginate(10);

        return response()->json([
            'status' => 'success',
            'data'   => $contacts
        ]);
    }

    /**
     * Store a new contact request.
     */
    public function store(Request $request)
    {
        // Validate incoming request data
        $validator = Validator::make($request->all(), [
            'name'    => 'required|string|max:255',
            'email'   => 'required|email|max:255',
            'mobile'  => 'required|string|max:50',
            'message' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status'  => 'error',
                'errors'  => $validator->errors()
            ], 422);
        }

        // Create a new contact record
        $contact = ContactUs::create([
            'name'    => $request->input('name'),
            'email'   => $request->input('email'),
            'mobile'  => $request->input('mobile'),
            'message' => $request->input('message'),
            'budget'  => $request->input('budget'),
        ]);

        // Send mail to admin (you can change the email)
        Mail::to('admin@example.com')->queue(new ContactUsMail($contact->toArray()));

        return response()->json([
            'status'  => 'success',
            'data'    => $contact
        ], 201);
    }
}
