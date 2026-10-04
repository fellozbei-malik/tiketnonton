<?php

namespace App\Http\Controllers;

use App\Mail\PartnerRequestMail;
use App\Models\PartnerRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class PartnerRequestController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'company_name'       => 'required|string|max:255',
            'company_address'    => 'required|string',
            'event_name'         => 'required|string|max:255',
            'event_date_location' => 'required|string|max:255',
            'applicant_name'     => 'required|string|max:255',
            'phone'              => 'required|string|max:16',
            'email'              => 'required|email|max:255',
            'message'            => 'required|string',
        ]);

        PartnerRequest::create($validated);

        // Kirim notifikasi email ke admin
        Mail::to('tiketnonton@gmail.com')
            ->send(new PartnerRequestMail($validated));

        return redirect()->back()->with('success', 'Your partnership request has been submitted successfully! We will contact you soon.');
    }
}
