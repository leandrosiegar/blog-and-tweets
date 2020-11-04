@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ $entry->title }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ $entry->content }}
                    <hr>
                    <!-- usemos un policie -->
                    @can ('update',$entry) <!-- por defecto es el user logueado -->
                        <a href="{{ url('entries/'.$entry->id.'/edit')}}" class="btn btn-primary">
                            Editar entrada
                        </a>
                    @endcan

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
