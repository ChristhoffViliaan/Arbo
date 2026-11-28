@extends('admin.layout')

@php($isEditing = isset($companyValue))

@section('title', $isEditing ? 'Edit company value' : 'Add company value')
@section('heading', $isEditing ? 'Edit company value' : 'Add company value')

@section('content')
    @php($selectedIcon = isset($companyValue) && $companyValue->icon_image ? '' : ($companyValue->icon ?? 'accountability'))

    <section class="max-w-3xl">
        <form method="POST"
              action="{{ $isEditing ? route('admin.company-values.update', $companyValue) : route('admin.company-values.store') }}"
              class="flex flex-col gap-6 rounded-2xl border border-[#e1e1d8] bg-white p-5 shadow-sm sm:p-8">
            @csrf
            @if ($isEditing)
                @method('PUT')
            @endif

            <div class="flex flex-col gap-2">
                <label for="icon" class="text-sm font-bold">Icon</label>
                <select id="icon" name="icon"
                        class="w-full rounded-xl border border-[#d6d7ce] bg-white px-4 py-3 outline-none transition focus:border-[#49a32d] focus:ring-4 focus:ring-[#49a32d]/10">
                    <option value="" @selected($selectedIcon === '')>Use uploaded PNG</option>
                    <option value="accountability" @selected($selectedIcon === 'accountability')>Accountability</option>
                    <option value="reliability" @selected($selectedIcon === 'reliability')>Reliability</option>
                    <option value="breakthrough" @selected($selectedIcon === 'breakthrough')>Breakthrough</option>
                    <option value="ownership" @selected($selectedIcon === 'ownership')>Ownership</option>
                </select>
                <p class="text-xs text-[#777972]">Choose a built-in icon or upload a PNG below. Selecting a built-in icon removes the saved PNG.</p>
            </div>

            <div class="flex flex-col gap-3">
                <label for="icon_image" class="text-sm font-bold">PNG icon (optional, max 2 MB)</label>
                @if (isset($companyValue) && $companyValue->iconImageUrl())
                    <img src="{{ $companyValue->iconImageUrl() }}" alt="Current icon for {{ $companyValue->title }}" class="h-16 w-16 rounded-lg border border-[#e1e1d8] object-contain p-2">
                @endif
                <input id="icon_image" name="icon_image" type="file" accept="image/png,.png"
                       class="w-full rounded-xl border border-dashed border-[#c8c9c0] bg-[#fafaf7] px-4 py-3 text-sm file:mr-4 file:rounded-lg file:border-0 file:bg-[#eaf2e6] file:px-3 file:py-2 file:font-bold file:text-[#347a24]">
            </div>

            <div class="flex flex-col gap-2">
                <label for="title" class="text-sm font-bold">Title</label>
                <input id="title" name="title" type="text" value="{{ $companyValue->title ?? '' }}" maxlength="255"
                       class="w-full rounded-xl border border-[#d6d7ce] px-4 py-3 outline-none transition focus:border-[#49a32d] focus:ring-4 focus:ring-[#49a32d]/10">
            </div>

            <div class="flex flex-col gap-2">
                <label for="description" class="text-sm font-bold">Description</label>
                <textarea id="description" name="description" rows="5" maxlength="255"
                          class="w-full resize-y rounded-xl border border-[#d6d7ce] px-4 py-3 outline-none transition focus:border-[#49a32d] focus:ring-4 focus:ring-[#49a32d]/10">{{ $companyValue->description ?? '' }}</textarea>
            </div>

            <div class="flex flex-wrap justify-end gap-3 border-t border-[#eeeeea] pt-5">
                <a href="{{ route('admin.company-values.index') }}" class="rounded-xl border border-[#d6d7ce] px-5 py-3 font-semibold transition hover:bg-[#f8f8f4]">Cancel</a>
                <button type="submit" class="rounded-xl bg-[#17251b] px-5 py-3 font-bold text-white transition hover:bg-[#263b2b]">{{ $isEditing ? 'Save changes' : 'Create company value' }}</button>
            </div>
        </form>
    </section>
@endsection
