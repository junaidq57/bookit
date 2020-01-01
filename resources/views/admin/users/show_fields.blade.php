<!-- Name Field -->
<dt>{!! Form::label('name', 'Full Name:') !!}</dt>
<dd>{!! $user->name !!}</dd>

<!-- Email Field -->
<dt>{!! Form::label('email', 'Email:') !!}</dt>
<dd>{!! $user->email !!}</dd>

<!-- Email Field -->
<dt>{!! Form::label('roles', 'Roles:') !!}</dt>
<dd>{!! $user->rolesCsv !!}</dd>

<!-- Phone Field -->
<dt>{!! Form::label('phone', 'Phone:') !!}</dt>
<dd>{!! $user->details->phone !!}</dd>

<!-- Address Field -->
<dt>{!! Form::label('address', 'Address:') !!}</dt>
<dd>{!! $user->details->address !!}</dd>

<!-- Image Field -->
<dt>{!! Form::label('image', 'Image:') !!}</dt>
<dd><img src="{!! $user->details->image_url !!}" alt="" width="50"></dd>

@if($user->hasRole('Supervisor'))
        @if(!empty($user->company))
<!-- Company Field -->
<dt>{!! Form::label('company', 'Company Name:') !!}</dt>
<dd>{!! $user->company->company !!}</dd>

<!-- Detail Field -->
<dt>{!! Form::label('detail', 'Company Detail:') !!}</dt>
<dd>{!! $user->company->detail !!}</dd>
@endif
@endif

<!-- Created At Field -->
<dt>{!! Form::label('created_at', 'Joining Date:') !!}</dt>
<dd>{!! $user->created_at !!}</dd>
