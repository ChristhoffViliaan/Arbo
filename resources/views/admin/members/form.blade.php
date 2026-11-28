@extends('admin.layout')

@php($isEditing = isset($member))

@section('title', $isEditing ? 'Edit member' : 'Add member')
@section('heading', $isEditing ? 'Edit member' : 'Add member')

@section('content')
    <section class="max-w-3xl">
        <form method="POST"
              action="{{ $isEditing ? route('admin.members.update', $member) : route('admin.members.store') }}"
              enctype="multipart/form-data"
              class="flex flex-col gap-6 rounded-2xl border border-[#e1e1d8] bg-white p-5 shadow-sm sm:p-8">
            @csrf
            @if ($isEditing)
                @method('PUT')
            @endif

            <div class="flex flex-col gap-2">
                <label for="name" class="text-sm font-bold">Full name</label>
                <input id="name" name="name" type="text" value="{{ $member->name ?? '' }}" maxlength="255"
                       class="w-full rounded-xl border border-[#d6d7ce] px-4 py-3 outline-none transition focus:border-[#49a32d] focus:ring-4 focus:ring-[#49a32d]/10">
            </div>

            <div class="flex flex-col gap-2">
                <label for="title" class="text-sm font-bold">Role / title</label>
                <input id="title" name="title" type="text" value="{{ $member->title ?? '' }}" maxlength="255"
                       class="w-full rounded-xl border border-[#d6d7ce] px-4 py-3 outline-none transition focus:border-[#49a32d] focus:ring-4 focus:ring-[#49a32d]/10">
            </div>

            <div class="flex flex-col gap-3">
                <label for="image" class="text-sm font-bold">Member photo {{ $isEditing ? '(optional)' : '' }}</label>
                @if ($isEditing)
                    <img src="{{ $member->imageUrl() }}" alt="Current photo of {{ $member->name }}" class="h-36 w-36 rounded-full bg-[#f3f2ed] object-cover">
                @endif
                <input id="image" name="image" type="file" accept=".jpg,.jpeg,.png,.webp"
                       class="w-full rounded-xl border border-dashed border-[#c8c9c0] bg-[#fafaf7] px-4 py-3 text-sm file:mr-4 file:rounded-lg file:border-0 file:bg-[#eaf2e6] file:px-3 file:py-2 file:font-bold file:text-[#347a24]">
                <p class="text-xs text-[#777972]">JPG, PNG or WebP, up to 5 MB.</p>
            </div>

            <div class="flex flex-wrap justify-end gap-3 border-t border-[#eeeeea] pt-5">
                <a href="{{ route('admin.members.index') }}" class="rounded-xl border border-[#d6d7ce] px-5 py-3 font-semibold transition hover:bg-[#f8f8f4]">Cancel</a>
                <button type="submit" class="rounded-xl bg-[#17251b] px-5 py-3 font-bold text-white transition hover:bg-[#263b2b]">{{ $isEditing ? 'Save changes' : 'Create member' }}</button>
            </div>
        </form>
    </section>
@endsection
