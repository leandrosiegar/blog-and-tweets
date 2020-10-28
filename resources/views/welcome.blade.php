@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @foreach ($entries as $item)
                <div class="card mt-4">
                    <div class="card-header">{{ $item->id }}. {{ $item->title }}</div>
                        <div class="card-body">
                                <p>{{ $item->content }}</p>
                        </div>
                </div>
            @endforeach

            {{ $entries->links() }}
        </div>
    </div>
</div>
@endsection
