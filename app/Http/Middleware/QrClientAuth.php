<?php

namespace App\Http\Middleware;

use Session;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;

class QrClientAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        Log::debug('MW QrClientAuth.');

        // Get encrypted sessionId
        $theEncSessionId = convertNilToEmptyString($request->session()->get('token'));
        Log::debug('MW QrClientAuth - enc sessionId: '.$theEncSessionId);

        if ($theEncSessionId != '' && $request->id == $request->session()->get('activityid')) {
                return $next($request);
        } else {
            // Session not contain data
            Log::debug('MW QrClientAuth - Invalid session.');
            if (session('addcompanyqr') == true) {
                Session::flash('success', 'Success Input Company. Please check your email inbox for further instructions');
                return response(view('pages.qr.signin'));
                // return response(view('pages.qr.signin')->with('success', 'Success Input Company. Please check your email inbox for further instructions'));
            } else if ($request->session()->get('activityid') != '') {
                Session::flash('message', $request->session()->get('addcompanyqrerrormessage'));
                return response(view('pages.qr.signin'));
            } else {
                Session::flash('message', 'Request invalid');
                return response(view('pages.qr.signin'));
                // return response(view('pages.qr.signin')->with('message', 'Request invalid'));
            }
        }
    }
}
