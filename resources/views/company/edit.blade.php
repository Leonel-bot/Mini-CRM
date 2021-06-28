@extends('layouts.app')

@section('content')
<div class="container">
    <h1>@lang('Edit company')</h1>
    <form action="{{ url('company/'.$company->id) }}" method="post" enctype="multipart/form-data"> 
        @csrf
        {{ method_field('PATCH') }}
        @include('company.form')
        <button class="btn btn-primary">@lang('Update')</button>
    </form>
</div>
@endsection