<?php

namespace App\Http\Controllers\Questionnaire;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\App;

class LocalizationController extends Controller
{
    public function lang($locale)
    {
        App::setLocale($locale);
        session()->put('locale', $locale);
        return redirect()->back();
    }
}
