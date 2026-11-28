@extends('admin.layout')

@section('title', 'Social media')
@section('heading', 'Social media')

@section('content')
    <section class="flex flex-col gap-5">
        <div class="flex flex-wrap items-center justify-between gap-3">
            <p class="text-sm text-[#777972]">{{ $socialMedias->count() }} social media {{ \Illuminate\Support\Str::plural('link', $socialMedias->count()) }}</p>
            <a href="{{ route('admin.social-media.create') }}" class="inline-flex items-center gap-2 rounded-xl bg-[#17251b] px-4 py-3 font-bold text-white transition hover:bg-[#263b2b]">
                <i class="fa-solid fa-plus" aria-hidden="true"></i> Add social media
            </a>
        </div>

        <div class="overflow-hidden rounded-2xl border border-[#e1e1d8] bg-white shadow-sm">
            <div class="overflow-x-auto">
                <table class="w-full min-w-[640px] border-collapse text-left">
                    <thead class="bg-[#f8f8f4] text-xs uppercase tracking-wider text-[#777972]">
                        <tr>
                            <th class="px-5 py-4 font-bold">Platform</th>
                            <th class="px-5 py-4 font-bold">URL</th>
                            <th class="px-5 py-4 text-right font-bold">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-[#eeeeea]">
                        @forelse ($socialMedias as $socialMedia)
                            <tr class="align-middle">
                                <td class="px-5 py-4">
                                    <div class="flex items-center gap-3 font-bold">
                                        <i class="{{ $socialMedia->iconClass() }} text-lg text-[#347a24]" aria-hidden="true"></i>
                                        {{ $socialMedia->{'aria-label'} }}
                                    </div>
                                </td>
                                <td class="max-w-lg px-5 py-4 text-sm leading-6 text-[#686b64]">
                                    <a href="{{ $socialMedia->url }}" target="_blank" rel="noopener noreferrer" class="break-all underline decoration-[#b8d9ad] underline-offset-2 hover:text-[#347a24]">
                                        {{ \Illuminate\Support\Str::limit($socialMedia->url, 120) }}
                                    </a>
                                </td>
                                <td class="px-5 py-4">
                                    <div class="flex justify-end gap-2">
                                        <a href="{{ route('admin.social-media.edit', $socialMedia) }}" class="rounded-lg border border-[#deded6] px-3 py-2 text-sm font-semibold transition hover:border-[#49a32d] hover:text-[#347a24]">Edit</a>
                                        <form method="POST" action="{{ route('admin.social-media.destroy', $socialMedia) }}" onsubmit="return confirm('Delete this social media link?')">
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
                                        <span class="grid h-12 w-12 place-items-center rounded-2xl bg-[#eef4e9] text-xl text-[#438c30]"><i class="fa-solid fa-share-nodes" aria-hidden="true"></i></span>
                                        <p class="font-bold">No social media links yet</p>
                                        <p class="text-sm text-[#777972]">Add a social media link to get started.</p>
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
