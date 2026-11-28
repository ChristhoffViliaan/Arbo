<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;
use RuntimeException;

class ProductController extends Controller
{
    public function index(): View
    {
        return view('admin.products.index', [
            'products' => Product::orderBy('id')->get(),
        ]);
    }

    public function create(): View
    {
        return view('admin.products.form');
    }

    public function store(Request $request): RedirectResponse
    {
        $imagePath = $request->file('image')->storePublicly('uploads/products', 'public');

        if ($imagePath === false) {
            throw new RuntimeException('Unable to store the product image.');
        }

        $attributes = $request->only(['name', 'description']);
        $attributes['image'] = $imagePath;
        Product::create($attributes);

        return redirect()
            ->route('admin.products.index')
            ->with('status', 'Product created.');
    }

    public function edit(Product $product): View
    {
        return view('admin.products.form', ['product' => $product]);
    }

    public function update(Request $request, Product $product): RedirectResponse
    {
        $attributes = $request->only(['name', 'description']);
        unset($attributes['image']);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->storePublicly('uploads/products', 'public');

            if ($imagePath === false) {
                throw new RuntimeException('Unable to store the product image.');
            }

            $previousImage = $product->image;
            $attributes['image'] = $imagePath;
        }

        $product->update($attributes);

        if (isset($previousImage)) {
            $this->deleteUploadedImage($previousImage);
        }

        return redirect()
            ->route('admin.products.index')
            ->with('status', 'Product updated.');
    }

    public function destroy(Product $product): RedirectResponse
    {
        $image = $product->image;
        $product->delete();

        $this->deleteUploadedImage($image);

        return redirect()
            ->route('admin.products.index')
            ->with('status', 'Product deleted.');
    }

    private function deleteUploadedImage(string $image): void
    {
        if (! str_starts_with($image, 'uploads/products/')) {
            return;
        }

        $disk = Storage::disk('public');

        if (! $disk->delete($image) && $disk->exists($image)) {
            throw new RuntimeException('Unable to delete the product image.');
        }
    }
}
