<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#17251b">
    <title>@yield('title', 'Admin') | Arbo Admin</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen bg-[#f3f2ed] text-[#20231f]">
    <div class="min-h-screen md:flex">
        <aside class="flex w-full flex-col gap-8 bg-[#17251b] px-5 py-6 text-white md:min-h-screen md:w-64 md:shrink-0">
            <a href="{{ route('admin.products.index') }}" class="flex items-center gap-3 text-xl font-bold tracking-wide">
                <span class="grid h-10 w-10 place-items-center rounded-xl bg-[#49b32c] text-lg">A</span>
                Arbo Admin
            </a>

            <nav class="flex flex-wrap gap-2 md:flex-col" aria-label="Admin sections">
                <a href="{{ route('admin.products.index') }}"
                   class="rounded-xl px-4 py-3 font-semibold transition {{ request()->routeIs('admin.products.*') ? 'bg-white/15 text-white' : 'text-white/70 hover:bg-white/10 hover:text-white' }}">
                    <i class="fa-solid fa-box-open mr-2" aria-hidden="true"></i> Products
                </a>
                <a href="{{ route('admin.members.index') }}"
                   class="rounded-xl px-4 py-3 font-semibold transition {{ request()->routeIs('admin.members.*') ? 'bg-white/15 text-white' : 'text-white/70 hover:bg-white/10 hover:text-white' }}">
                    <i class="fa-solid fa-users mr-2" aria-hidden="true"></i> Members
                </a>
                <a href="{{ route('admin.company-values.index') }}"
                   class="rounded-xl px-4 py-3 font-semibold transition {{ request()->routeIs('admin.company-values.*') ? 'bg-white/15 text-white' : 'text-white/70 hover:bg-white/10 hover:text-white' }}">
                    <i class="fa-solid fa-seedling mr-2" aria-hidden="true"></i> Company Values
                </a>
                <a href="{{ route('admin.social-media.index') }}"
                   class="rounded-xl px-4 py-3 font-semibold transition {{ request()->routeIs('admin.social-media.*') ? 'bg-white/15 text-white' : 'text-white/70 hover:bg-white/10 hover:text-white' }}">
                    <i class="fa-solid fa-share-nodes mr-2" aria-hidden="true"></i> Social Media
                </a>
            </nav>

        </aside>

        <main class="min-w-0 flex-1 px-4 py-6 sm:px-8 sm:py-9 lg:px-12">
            <div class="mx-auto flex max-w-6xl flex-col gap-7">
                <header class="flex flex-wrap items-end justify-between gap-4 border-b border-[#deded6] pb-5">
                    <div class="flex flex-col gap-1">
                        <p class="text-xs font-bold uppercase tracking-[0.18em] text-[#49a32d]">Content management</p>
                        <h1 class="text-3xl font-bold tracking-tight">@yield('heading')</h1>
                    </div>
                </header>

                @if (session('status'))
                    <div role="status" class="rounded-xl border border-[#b8d9ad] bg-[#e8f4e3] px-4 py-3 text-sm font-semibold text-[#285c22]">
                        {{ session('status') }}
                    </div>
                @endif

                @yield('content')
            </div>
        </main>
    </div>
</body>
</html>
