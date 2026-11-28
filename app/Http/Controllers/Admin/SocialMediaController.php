<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSocialMediaRequest;
use App\Http\Requests\UpdateSocialMediaRequest;
use App\Models\SocialMedia;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class SocialMediaController extends Controller
{
    public function index(): View
    {
        $this->authorize('viewAny', SocialMedia::class);

        return view('admin.social-media.index', [
            'socialMedias' => SocialMedia::orderBy('id')->get(),
        ]);
    }

    public function create(): View
    {
        $this->authorize('create', SocialMedia::class);

        return view('admin.social-media.form');
    }

    public function store(StoreSocialMediaRequest $request): RedirectResponse
    {
        SocialMedia::create($request->validated());

        return redirect()
            ->route('admin.social-media.index')
            ->with('status', 'Social media link created.');
    }

    public function edit(SocialMedia $socialMedia): View
    {
        $this->authorize('update', $socialMedia);

        return view('admin.social-media.form', ['socialMedia' => $socialMedia]);
    }

    public function update(UpdateSocialMediaRequest $request, SocialMedia $socialMedia): RedirectResponse
    {
        $socialMedia->update($request->validated());

        return redirect()
            ->route('admin.social-media.index')
            ->with('status', 'Social media link updated.');
    }

    public function destroy(SocialMedia $socialMedia): RedirectResponse
    {
        $this->authorize('delete', $socialMedia);
        $socialMedia->delete();

        return redirect()
            ->route('admin.social-media.index')
            ->with('status', 'Social media link deleted.');
    }
}
