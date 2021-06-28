@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Create new employee</h1>
    <form action="{{ url('employee') }}" method="post" enctype="multipart/form-data">
        @csrf
        @include('employee.form')
        <button class="btn btn-primary">@lang('Create')</button>
    </form>
</div>
@endsection