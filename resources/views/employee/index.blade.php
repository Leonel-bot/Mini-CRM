@extends('layouts.app')

@section('content')
<div class="container">
    <h1>@lang('Employees')</h1><hr>
    <a href="{{ route('employee.create') }}">
        <button class="btn btn-success" style="margin-bottom: 20px;">@lang('Create new employee')</button>
    </a>
    <table class="table table-bordered">
        <thead class="thead-dark">
            <tr>
                <th>@lang('Name')</th>
                <th>@lang('Surname')</th>
                <th>@lang('Email')</th>
                <th>@lang('Company')</th>
                <th>@lang('Phone')</th>
            </tr>
        </thead>
        <tbody>
            @foreach($employees as $employee)
            <tr>
                <td>{{ $employee->name }}</td>
                <td>{{ $employee->surname }}</td>
                <td>{{ $employee->email }}</td>
                <td>{{ $employee->company->name}}</td>
                <td>{{ $employee->phone }}</td>
                <td>
                    <a href="{{ url('employee/'.$employee->id.'/edit') }}"><button class="btn btn-secondary">@lang('Edit')</button></a>
                
                    <form action="{{ url('employee/'.$employee->id) }}" method="post">
                        @csrf
                        {{ method_field('DELETE') }}
                        <button class="btn btn-danger" onClick="return confirm('Estas seguro?')" >@lang('Delete')</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{ $employees->links() }}
</div>
@endsection