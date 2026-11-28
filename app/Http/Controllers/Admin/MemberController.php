<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Member;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;
use RuntimeException;

class MemberController extends Controller
{
    public function index(): View
    {
        return view('admin.members.index', [
            'members' => Member::orderBy('id')->get(),
        ]);
    }

    public function create(): View
    {
        return view('admin.members.form');
    }

    public function store(Request $request): RedirectResponse
    {
        $imagePath = $request->file('image')->storePublicly('uploads/members', 'public');

        if ($imagePath === false) {
            throw new RuntimeException('Unable to store the member image.');
        }

        $attributes = $request->only(['name', 'title']);
        $attributes['image'] = $imagePath;
        Member::create($attributes);

        return redirect()
            ->route('admin.members.index')
            ->with('status', 'Member created.');
    }

    public function edit(Member $member): View
    {
        return view('admin.members.form', ['member' => $member]);
    }

    public function update(Request $request, Member $member): RedirectResponse
    {
        $attributes = $request->only(['name', 'title']);
        unset($attributes['image']);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->storePublicly('uploads/members', 'public');

            if ($imagePath === false) {
                throw new RuntimeException('Unable to store the member image.');
            }

            $previousImage = $member->image;
            $attributes['image'] = $imagePath;
        }

        $member->update($attributes);

        if (isset($previousImage)) {
            $this->deleteUploadedImage($previousImage);
        }

        return redirect()
            ->route('admin.members.index')
            ->with('status', 'Member updated.');
    }

    public function destroy(Member $member): RedirectResponse
    {
        $image = $member->image;
        $member->delete();

        $this->deleteUploadedImage($image);

        return redirect()
            ->route('admin.members.index')
            ->with('status', 'Member deleted.');
    }

    private function deleteUploadedImage(string $image): void
    {
        if (! str_starts_with($image, 'uploads/members/')) {
            return;
        }

        $disk = Storage::disk('public');

        if (! $disk->delete($image) && $disk->exists($image)) {
            throw new RuntimeException('Unable to delete the member image.');
        }
    }
}
