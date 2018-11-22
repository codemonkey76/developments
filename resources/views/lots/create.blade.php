@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <contract-info-form></contract-info-form>
            </div>
            {{ $errors }}
        </div>
    </div>
@endsection