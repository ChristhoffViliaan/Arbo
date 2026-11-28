<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#17251b">
    <title>Admin | Arbo</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="grid min-h-screen place-items-center bg-[#f3f2ed] px-4 py-10 text-[#20231f]">
    <main class="w-full max-w-md rounded-3xl border border-[#e3e3da] bg-white p-7 shadow-xl shadow-[#17251b]/5 sm:p-9">
        <a href="{{ url('/') }}" class="flex items-center gap-3 text-xl font-bold tracking-wide">
            <span class="grid h-10 w-10 place-items-center rounded-xl bg-[#17251b] text-lg text-white">A</span>
            Arbo Admin
        </a>

        <div class="mt-8 flex flex-col gap-4">
            <p class="text-xs font-bold uppercase tracking-[0.18em] text-[#49a32d]">Content management</p>
            <h1 class="text-3xl font-bold tracking-tight">Admin panel</h1>
            <a href="{{ route('admin.index') }}" class="mt-2 rounded-xl bg-[#17251b] px-5 py-3 text-center font-bold text-white transition hover:bg-[#263b2b]">
                Open admin
            </a>
        </div>
    </main>
</body>
</html>
