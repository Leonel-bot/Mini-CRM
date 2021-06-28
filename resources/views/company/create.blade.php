@extends('layouts.app')

@section('content')
<div class="container">
    <h1>@lang('Create new company')</h1>
    <form action="{{ url('company') }}" method="post" enctype="multipart/form-data">
        @csrf
        @include('company.form')
        <button class="btn btn-primary">@lang('Create')</button>
    </form>
</div>
@endsection