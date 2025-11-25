@extends('layouts.app')

@section('content')
    <h2 class="text-xl font-semibold mb-4">Pets</h2>

    <a href="{{ route('pets.create') }}" class="inline-block mb-4">Add Pet</a>

    <table class="w-full table-auto border-collapse">
        <thead>
            <tr>
                <th class="border p-2">#</th>
                <th class="border p-2">Name</th>
                <th class="border p-2">Owner</th>
            </tr>
        </thead>
        <tbody>
        @foreach($pets as $p)
            <tr>
                <td class="border p-2">{{ $p->id }}</td>
                <td class="border p-2"><a href="{{ route('pets.show',$p) }}">{{ $p->name }}</a></td>
                <td class="border p-2">{{ $p->owner->name ?? '-' }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {{ $pets->links() }}
@endsection
