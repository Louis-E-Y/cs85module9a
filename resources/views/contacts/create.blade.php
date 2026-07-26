<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Add Contact</title>
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif
</head>
<body class="bg-slate-50 min-h-screen py-10 px-5 text-slate-900">
    <div class="mx-auto max-w-2xl">
        <header class="mb-8 flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
            <div>
                <h1 class="text-4xl font-semibold tracking-tight">Add Contact</h1>
                <p class="mt-2 text-sm text-slate-600">Create a new contact with a name, email, and phone number.</p>
            </div>
            <a href="{{ route('contacts.index') }}" class="inline-flex items-center justify-center rounded-lg border border-slate-200 bg-white px-4 py-2 text-sm font-semibold text-slate-900 shadow-sm hover:bg-slate-100">
                Back to list
            </a>
        </header>

        @if ($errors->any())
            <div class="mb-6 rounded-xl border border-rose-200 bg-rose-50 p-4 text-sm text-rose-700">
                <p class="font-semibold">There are some problems with your input.</p>
                <ul class="mt-2 list-disc space-y-1 pl-5">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('contacts.store') }}" method="POST" class="space-y-6 rounded-xl border border-slate-200 bg-white p-8 shadow-sm">
            @csrf

            <div>
                <label for="name" class="block text-sm font-medium text-slate-700">Name</label>
                <input
                    id="name"
                    name="name"
                    type="text"
                    value="{{ old('name') }}"
                    class="mt-2 block w-full rounded-lg border border-slate-300 bg-slate-50 px-4 py-3 text-slate-900 outline-none transition duration-150 focus:border-slate-500 focus:ring-2 focus:ring-slate-200"
                    required
                >
            </div>

            <div>
                <label for="email" class="block text-sm font-medium text-slate-700">Email</label>
                <input
                    id="email"
                    name="email"
                    type="email"
                    value="{{ old('email') }}"
                    class="mt-2 block w-full rounded-lg border border-slate-300 bg-slate-50 px-4 py-3 text-slate-900 outline-none transition duration-150 focus:border-slate-500 focus:ring-2 focus:ring-slate-200"
                    required
                >
            </div>

            <div>
                <label for="phone" class="block text-sm font-medium text-slate-700">Phone</label>
                <input
                    id="phone"
                    name="phone"
                    type="text"
                    value="{{ old('phone') }}"
                    class="mt-2 block w-full rounded-lg border border-slate-300 bg-slate-50 px-4 py-3 text-slate-900 outline-none transition duration-150 focus:border-slate-500 focus:ring-2 focus:ring-slate-200"
                    required
                >
            </div>

            <div class="flex items-center justify-end gap-3 pt-4">
                <a href="{{ route('contacts.index') }}" class="rounded-lg border border-slate-300 bg-white px-4 py-3 text-sm font-semibold text-slate-900 hover:bg-slate-100">
                    Cancel
                </a>
                <button type="submit" class="rounded-lg bg-slate-900 px-6 py-3 text-sm font-semibold text-white shadow hover:bg-slate-700">
                    Save Contact
                </button>
            </div>
        </form>
    </div>
</body>
</html>
