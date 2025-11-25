@extends('layouts.app')

@section('content')
    <h2 class="text-xl font-semibold mb-4">Owners</h2>

    <a href="{{ route('owners.create') }}" class="inline-block mb-4">Add Owner</a>

    <table class="w-full table-auto border-collapse">
        <thead>
            <tr>
                <th class="border p-2">#</th>
                <th class="border p-2">Name</th>
                <th class="border p-2">Email</th>
                <th class="border p-2">Phone</th>
            </tr>
        </thead>
        <tbody>
        @foreach($owners as $o)
            <tr>
                <td class="border p-2">{{ $o->id }}</td>
                <td class="border p-2"><a href="{{ route('owners.show',$o) }}">{{ $o->name }}</a></td>
                <td class="border p-2">{{ $o->email }}</td>
                <td class="border p-2">{{ $o->phone }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>

    {{ $owners->links() }}
@endsection
