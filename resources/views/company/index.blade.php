@extends('layouts.app')

@section('content')
<div class="container">
    <h1>@lang('Companies')</h1><hr>
    <a href="{{ route('company.create') }}">
        <button class="btn btn-success" style="margin-bottom: 20px;">@lang('Create new company')</button>
    </a>
    <table class="table table-bordered">
        <thead class="thead-dark">
            <tr>
                <th>@lang('Name')</th>
                <th>@lang('Email')</th>
                <th>@lang('Logo')</th>
                <th>@lang('Website')</th>
            </tr>
        </thead>
        <tbody>
            @foreach($companies as $company)
            <tr>
                <td>
                    <img src="{{ asset('storage').'/'.$company->logo }}" width="100">
                </td>
                <td>{{ $company->name }}</td>
                <td>{{ $company->email }}</td>
                <td>{{ $company->website }}</td>
                <td>
                    <a href="{{ url('company/'.$company->id.'/edit') }}"><button class="btn btn-secondary">@lang('Edit')</button></a>
                
                    <form action="{{ url('company/'.$company->id) }}" method="post">
                        @csrf
                        {{ method_field('DELETE') }}
                        <button class="btn btn-danger" onClick="return confirm('Estas seguro?')">@lang('Delete')</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{ $companies->links() }}
</div>
@endsection