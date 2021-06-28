
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
    <input type="text" name="name" class="form-control" id="name" value="{{ isset($company->name) ?$company->name :  old('name') }}">
</div>
<div class="form-group">
    <label for="email">@lang('Email')</label>
    <input type="email" name="email" class="form-control" id="email" value="{{ isset($company->email) ?$company->email :  old('email') }}">
</div>
<div class="form-group">
    <label for="file">@lang('Logo')</label>
    @if(isset($company->logo))
    <img src="{{ asset('storage').'/'.$company->logo }}" width="100">
    @endif
    <input type="file" name="logo" class="form-control" id="file">
</div>
<div class="form-group">
    <label for="website">@lang('Website')</label>
    <input type="text" name="website" class="form-control" id="website" value="{{ isset($company->website) ?$company->website:  old('website') }}">
</div>