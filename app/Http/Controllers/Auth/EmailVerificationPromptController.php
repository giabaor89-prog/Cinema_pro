<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class EmailVerificationPromptController extends Controller
{
    /**
     * EmailVerificationPromptController
     * Hiển thị prompt yêu cầu người dùng xác thực email nếu chưa verified.
     */
    /**
     * Hiển thị trang nhắc xác thực email hoặc chuyển hướng vào dashboard nếu đã xác thực.
     * @param Request $request
     * @return RedirectResponse|View
     */
    public function __invoke(Request $request): RedirectResponse|View
    {
        return $request->user()->hasVerifiedEmail()
                    ? redirect()->intended(route('dashboard', absolute: false))
                    : view('auth.verify-email');
    }
}
