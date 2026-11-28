@extends('admin.layout')

@php($isEditing = isset($socialMedia))

@section('title', $isEditing ? 'Edit social media' : 'Add social media')
@section('heading', $isEditing ? 'Edit social media' : 'Add social media')

@section('content')
    <section class="max-w-3xl">
        <form method="POST"
              action="{{ $isEditing ? route('admin.social-media.update', $socialMedia) : route('admin.social-media.store') }}"
              class="flex flex-col gap-6 rounded-2xl border border-[#e1e1d8] bg-white p-5 shadow-sm sm:p-8">
            @csrf
            @if ($isEditing)
                @method('PUT')
            @endif

            <div class="flex flex-col gap-2">
                <label for="url" class="text-sm font-bold">Social media URL</label>
                <input id="url" name="url" type="url" value="{{ $socialMedia->url ?? '' }}" maxlength="500"
                       class="w-full rounded-xl border border-[#d6d7ce] px-4 py-3 outline-none transition focus:border-[#49a32d] focus:ring-4 focus:ring-[#49a32d]/10">
            </div>

            <div class="flex flex-col gap-2">
                <label for="aria-label" class="text-sm font-bold">Accessible name</label>
                <input id="aria-label" name="aria-label" type="text" value="{{ $socialMedia->{'aria-label'} ?? '' }}" maxlength="255"
                       class="w-full rounded-xl border border-[#d6d7ce] px-4 py-3 outline-none transition focus:border-[#49a32d] focus:ring-4 focus:ring-[#49a32d]/10">
                <p class="text-xs text-[#777972]">Use a platform name such as Instagram, Facebook, LinkedIn, YouTube, TikTok, X, WhatsApp or Telegram to show its icon.</p>
            </div>

            <div class="flex flex-wrap justify-end gap-3 border-t border-[#eeeeea] pt-5">
                <a href="{{ route('admin.social-media.index') }}" class="rounded-xl border border-[#d6d7ce] px-5 py-3 font-semibold transition hover:bg-[#f8f8f4]">Cancel</a>
                <button type="submit" class="rounded-xl bg-[#17251b] px-5 py-3 font-bold text-white transition hover:bg-[#263b2b]">{{ $isEditing ? 'Save changes' : 'Create social media link' }}</button>
            </div>
        </form>
    </section>
@endsection
