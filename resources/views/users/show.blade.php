@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">Tweets</div>

                <div class="card-body">
                    AQUI IRA LA API DE TWITTER
                </div>
            </div>
        </div>

        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ $user->name }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif


                    <p>Publicaciones publicadas</p>
                    <ul>
                        @foreach ($entries as $item)
                            <li>
                                <a href="{{ $item->getUrl() }}">
                                    {{ $item->title}}
                                </a>
                            </li>
                        @endforeach
                    </ul>



                </div>
            </div>
        </div>
    </div>
</div>
@endsection
