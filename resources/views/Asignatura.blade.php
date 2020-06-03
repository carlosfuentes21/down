@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row  justify-content-center">
        <div class="col-md-8">
            <div id = "app" class = "content">
                <registrar-asignatura/>
                <div>
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
<script src="{{asset('js/app.js')}}"></script> 
@endsection