<?php

namespace App\Http\Controllers;

use App\Http\Requests\PasswordRecoveryValidationRequest;
use Illuminate\View\View;

class HelpController extends Controller
{
    public function index(): View {
        return \view('help.dashboard');
    }

    public function contact(): View {
        return \view('help.contact');
    }

    public function legal(): View {
        return \view('help.legalNotices');
    }

    public function about(): View {
        return \view('help.about');
    }
}
