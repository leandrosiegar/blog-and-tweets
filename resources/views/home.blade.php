@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if ($entries->isEmpty())
                        <p>Aún no tienes ninguna entrada publicada</p>
                    @else
                        <p>Mis entradas</p>
                        <ul>
                            @foreach ($entries as $item)
                                <li>
                                    <a href="{{ $item->getUrl() }}">
                                        {{ $item->title}}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
