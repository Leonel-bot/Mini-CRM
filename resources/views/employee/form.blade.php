@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="form-group">
    <label for="name">@lang('Name')</label>
    <input type="text" name="name" class="form-control" id="name" value="{{ isset($employee->name) ?$employee->name : old('name') }}">
</div>
<div class="form-group">
    <label for="name">@lang('Surname')</label>
    <input type="text" name="surname" class="form-control" id="surname" value="{{ isset($employee->surname) ?$employee->surname :  old('surname') }}">
</div>
<div class="form-group">
    <label for="email">@lang('Email')</label>
    <input type="email" name="email" class="form-control" id="email" value="{{ isset($employee->email) ?$employee->email :  old('email') }}">
</div>
<div class="form-group">
    <label for="company_id">@lang('Company')</label>
    <select class="custom-select" name="company_id" id="company_id">
        @foreach($companies as $company)
        <option value="{{ $company->id }}">{{ $company->name }}</option>
        @endforeach
    </select>
</div>
<div class="form-group">
    <label for="website">@lang('Phone')</label>
    <input type="number" name="phone" class="form-control" id="phone" value="{{ isset($employee->phone) ?$employee->phone:  old('phone') }}">
</div>