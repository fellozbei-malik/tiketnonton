<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

class LanguageController extends Controller
{
    public function switch($locale)
    {
        // Validate locale
        if (!in_array($locale, ['en', 'id'])) {
            $locale = 'id';
        }
        
        // Store locale in session
        Session::put('locale', $locale);
        
        // Redirect back to previous page
        return Redirect::back();
    }
}
