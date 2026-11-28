<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SocialMedia;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class SocialMediaController extends Controller
{
    public function index(): View
    {
        return view('admin.social-media.index', [
            'socialMedias' => SocialMedia::orderBy('id')->get(),
        ]);
    }

    public function create(): View
    {
        return view('admin.social-media.form');
    }

    public function store(Request $request): RedirectResponse
    {
        SocialMedia::create($request->only(['url', 'aria-label']));

        return redirect()
            ->route('admin.social-media.index')
            ->with('status', 'Social media link created.');
    }

    public function edit(SocialMedia $socialMedia): View
    {
        return view('admin.social-media.form', ['socialMedia' => $socialMedia]);
    }

    public function update(Request $request, SocialMedia $socialMedia): RedirectResponse
    {
        $socialMedia->update($request->only(['url', 'aria-label']));

        return redirect()
            ->route('admin.social-media.index')
            ->with('status', 'Social media link updated.');
    }

    public function destroy(SocialMedia $socialMedia): RedirectResponse
    {
        $socialMedia->delete();

        return redirect()
            ->route('admin.social-media.index')
            ->with('status', 'Social media link deleted.');
    }
}
