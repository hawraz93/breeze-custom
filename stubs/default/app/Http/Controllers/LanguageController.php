<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LanguageController extends Controller
{
    protected array $allowed = ['en', 'ar', 'ku'];

    public function switch(Request $request, string $locale)
    {
        if (! in_array($locale, $this->allowed)) {
            abort(400);
        }

        session(['locale' => $locale]);

        return redirect()->back()->withHeaders([
            'Vary' => 'Accept-Language',
        ]);
    }
}
