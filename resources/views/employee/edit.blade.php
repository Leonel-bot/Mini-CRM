@extends('layouts.app')

@section('content')
<div class="container">
    <h1>@lang('Edit employee')</h1>
    <form action="{{ url('employee/'.$employee->id) }}" method="post">
        @csrf
        {{ method_field('PATCH') }}
        @include('employee.form')
        <button class="btn btn-primary">@lang('Update')</button>
    </form>
</div>
@endsection