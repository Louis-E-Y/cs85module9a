<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Contacts</title>
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif
</head>
<body class="bg-slate-50 min-h-screen py-10 px-5 text-slate-900">
    <div class="mx-auto max-w-6xl">
        <header class="mb-8 flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
            <div>
                <h1 class="text-4xl font-semibold tracking-tight">Contacts</h1>
                <p class="mt-2 text-sm text-slate-600">Browse the contact list and manage your entries.</p>
            </div>
            <a href="{{ route('contacts.create') }}" class="inline-flex items-center justify-center rounded-lg bg-slate-900 px-5 py-3 text-sm font-semibold text-white shadow hover:bg-slate-700">
                Add Contact
            </a>
        </header>

        @if (session('success'))
            <div class="mb-6 rounded-xl border border-green-200 bg-green-50 px-4 py-4 text-green-800">
                {{ session('success') }}
            </div>
        @endif

        @if ($contacts->isEmpty())
            <div class="rounded-xl border border-slate-200 bg-white p-8 text-center shadow-sm">
                <p class="text-lg font-medium text-slate-900">No contacts found.</p>
                <p class="mt-2 text-sm text-slate-600">Create your first contact to display it here.</p>
            </div>
        @else
            <div class="overflow-hidden rounded-xl border border-slate-200 bg-white shadow-sm">
                <table class="min-w-full divide-y divide-slate-200 text-sm">
                    <thead class="bg-slate-50">
                        <tr>
                            <th class="px-4 py-3 text-left font-semibold text-slate-700">Name</th>
                            <th class="px-4 py-3 text-left font-semibold text-slate-700">Email</th>
                            <th class="px-4 py-3 text-left font-semibold text-slate-700">Phone</th>
                            <th class="px-4 py-3 text-left font-semibold text-slate-700">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-200 bg-white">
                        @foreach ($contacts as $contact)
                            <tr>
                                <td class="px-4 py-4 text-slate-900">{{ $contact->name }}</td>
                                <td class="px-4 py-4 text-slate-700">{{ $contact->email }}</td>
                                <td class="px-4 py-4 text-slate-700">{{ $contact->phone }}</td>
                                <td class="px-4 py-4 text-slate-700">
                                    <div class="flex flex-wrap gap-2">
                                        <a href="{{ route('contacts.show', $contact) }}" class="rounded-md bg-slate-100 px-3 py-1 text-xs font-semibold text-slate-700 hover:bg-slate-200">View</a>
                                        <a href="{{ route('contacts.edit', $contact) }}" class="rounded-md bg-slate-100 px-3 py-1 text-xs font-semibold text-slate-700 hover:bg-slate-200">Edit</a>
                                        <form action="{{ route('contacts.destroy', $contact) }}" method="POST" class="inline-block" onsubmit="return confirm('Delete this contact?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="rounded-md bg-rose-100 px-3 py-1 text-xs font-semibold text-rose-700 hover:bg-rose-200">Delete</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>
</body>
</html>
