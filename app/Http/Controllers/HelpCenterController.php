<?php

namespace App\Http\Controllers;

use App\Models\HelpCenterMessage;
use Illuminate\Http\Request;

class HelpCenterController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'subject' => 'required|string|max:255',
            'message' => 'required|string|max:5000',
        ]);

        HelpCenterMessage::create($validated);

        return redirect()->route('help-center')->with('success', __('common.help_center_message_sent'));
    }
}
