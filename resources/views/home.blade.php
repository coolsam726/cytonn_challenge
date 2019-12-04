@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>
                @if (session()->has("success"))
                    <div class="alert alert-success alert-dismissible visible">
                        {{session('success')}}
                    </div>
                @endif
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form action="{{route('statements.send')}}" method="post">
                        @csrf
                        <button type="submit" class="btn btn-outline-success">Send Statements to all Users</button>
                    </form>
                    <a class="btn btn-success"></a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
