<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CompanyValues;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;
use RuntimeException;

class CompanyValueController extends Controller
{
    public function index(): View
    {
        return view('admin.company-values.index', [
            'companyValues' => CompanyValues::orderBy('id')->get(),
        ]);
    }

    public function create(): View
    {
        return view('admin.company-values.form');
    }

    public function store(Request $request): RedirectResponse
    {
        $attributes = $request->only(['icon', 'title', 'description']);
        $attributes['icon'] ??= 'accountability';

        if ($request->hasFile('icon_image')) {
            $imagePath = $request->file('icon_image')->storePublicly('uploads/company-values', 'public');

            if ($imagePath === false) {
                throw new RuntimeException('Unable to store the company value icon.');
            }

            $attributes['icon_image'] = $imagePath;
        }

        CompanyValues::create($attributes);

        return redirect()
            ->route('admin.company-values.index')
            ->with('status', 'Company value created.');
    }

    public function edit(CompanyValues $companyValue): View
    {
        return view('admin.company-values.form', ['companyValue' => $companyValue]);
    }

    public function update(Request $request, CompanyValues $companyValue): RedirectResponse
    {
        $attributes = $request->only(['icon', 'title', 'description']);
        unset($attributes['icon_image']);

        $previousImage = $companyValue->icon_image;

        if (! $request->filled('icon')) {
            unset($attributes['icon']);
        }

        if ($request->hasFile('icon_image')) {
            $imagePath = $request->file('icon_image')->storePublicly('uploads/company-values', 'public');

            if ($imagePath === false) {
                throw new RuntimeException('Unable to store the company value icon.');
            }

            $attributes['icon_image'] = $imagePath;
        } elseif ($request->filled('icon')) {
            $attributes['icon_image'] = null;
        } else {
            unset($attributes['icon']);
        }

        $companyValue->update($attributes);

        if ($previousImage !== $companyValue->icon_image) {
            $this->deleteUploadedIcon($previousImage);
        }

        return redirect()
            ->route('admin.company-values.index')
            ->with('status', 'Company value updated.');
    }

    public function destroy(CompanyValues $companyValue): RedirectResponse
    {
        $image = $companyValue->icon_image;
        $companyValue->delete();
        $this->deleteUploadedIcon($image);

        return redirect()
            ->route('admin.company-values.index')
            ->with('status', 'Company value deleted.');
    }

    private function deleteUploadedIcon(?string $image): void
    {
        if ($image === null || ! str_starts_with($image, 'uploads/company-values/')) {
            return;
        }

        $disk = Storage::disk('public');

        if (! $disk->delete($image) && $disk->exists($image)) {
            throw new RuntimeException('Unable to delete the company value icon.');
        }
    }
}
