@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">@yield('header')</div>
                    <div class="card-body">
                        @yield('body')
                    </div>
                    <div class="card-footer">
                        @yield('footer')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection