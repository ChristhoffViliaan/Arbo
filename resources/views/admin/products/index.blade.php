@extends('admin.layout')

@section('title', 'Products')
@section('heading', 'Products')

@section('content')
    <section class="flex flex-col gap-5">
        <div class="flex flex-wrap items-center justify-between gap-3">
            <p class="text-sm text-[#777972]">{{ $products->count() }} {{ \Illuminate\Support\Str::plural('product', $products->count()) }} in your catalog</p>
            <a href="{{ route('admin.products.create') }}" class="inline-flex items-center gap-2 rounded-xl bg-[#17251b] px-4 py-3 font-bold text-white transition hover:bg-[#263b2b]">
                <i class="fa-solid fa-plus" aria-hidden="true"></i> Add product
            </a>
        </div>

        <div class="overflow-hidden rounded-2xl border border-[#e1e1d8] bg-white shadow-sm">
            <div class="overflow-x-auto">
                <table class="w-full min-w-[680px] border-collapse text-left">
                    <thead class="bg-[#f8f8f4] text-xs uppercase tracking-wider text-[#777972]">
                        <tr>
                            <th class="px-5 py-4 font-bold">Product</th>
                            <th class="px-5 py-4 font-bold">Description</th>
                            <th class="px-5 py-4 text-right font-bold">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-[#eeeeea]">
                        @forelse ($products as $product)
                            <tr class="align-middle">
                                <td class="px-5 py-4">
                                    <div class="flex items-center gap-3">
                                        <img src="{{ $product->imageUrl() }}" alt="" class="h-14 w-16 rounded-lg bg-[#f3f2ed] object-cover">
                                        <span class="font-bold">{{ $product->name }}</span>
                                    </div>
                                </td>
                                <td class="max-w-lg px-5 py-4 text-sm leading-6 text-[#686b64]">{{ \Illuminate\Support\Str::limit($product->description, 120) }}</td>
                                <td class="px-5 py-4">
                                    <div class="flex justify-end gap-2">
                                        <a href="{{ route('admin.products.edit', $product) }}" class="rounded-lg border border-[#deded6] px-3 py-2 text-sm font-semibold transition hover:border-[#49a32d] hover:text-[#347a24]">Edit</a>
                                        <form method="POST" action="{{ route('admin.products.destroy', $product) }}" onsubmit="return confirm('Delete this product?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="rounded-lg border border-[#f1c9c5] px-3 py-2 text-sm font-semibold text-[#a4322a] transition hover:bg-[#fff3f1]">Delete</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3" class="px-5 py-14 text-center">
                                    <div class="flex flex-col items-center gap-3">
                                        <span class="grid h-12 w-12 place-items-center rounded-2xl bg-[#eef4e9] text-xl text-[#438c30]"><i class="fa-solid fa-box-open" aria-hidden="true"></i></span>
                                        <p class="font-bold">No products yet</p>
                                        <p class="text-sm text-[#777972]">Add a product to get started.</p>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </section>
@endsection
