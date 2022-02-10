@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @auth
            <div class="card col-md-5">
                <div class="card-header">{{ __('Create Todo') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                  
                    @livewire('create-todo')
                </div>
            </div>
            @endauth
            <hr />
            <div class="card">
                <div class="card-header">{{ __('Todo List') }}</div>

                <div class="card-body">
                   
                   
                    @livewire('show-todo')
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
