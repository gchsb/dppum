<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureMemberDetailsSubmitted
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = auth()->user();

        if (! $user) {
            return $next($request);
        }

        // Only apply for members
        if ($user->type !== 'member') {
            return $next($request);
        }

        // Avoid redirect loop on details page itself
        if ($request->is('details') || $request->is('details/*')) {
            return $next($request);
        }

        // Avoid redirect loop on products pages
        if ($request->is('member-products') || $request->is('member-products/*')) {
            return $next($request);
        }

        $member = $user->members;

        if (! $member || ! $member->form_submitted) {
            return redirect()->route('member-details.form');
        }

        // Check if member has at least one product
        if ($member->products()->count() === 0) {
            return redirect()->route('member-products.index')
                ->with('warning', 'Please add at least one product to complete your registration.');
        }

        return $next($request);
    }
}


