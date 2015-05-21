<div class="form-group @if($errors->has('name')) has-error @endif">
    {!! Form::label('name', 'Name:') !!}

    {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Enter Name']) !!}
</div>

<div class="form-group @if($errors->has('email')) has-error @endif">
    {!! Form::label('email', 'E-mail:') !!}

    {!! Form::email('email', null, ['class' => 'form-control', 'placeholder' => 'Enter E-mail']) !!}
</div>

<div class="form-group @if($errors->has('password')) has-error @endif">
    {!! Form::label('password', 'Password:') !!}

    {!! Form::password('password', ['class' => 'form-control', 'placeholder' => 'Enter Password']) !!}
</div>

<div class="form-group @if($errors->has('password_confirmation')) has-error @endif">
    {!! Form::label('password_confirmation', 'Password Confirmation:') !!}

    {!! Form::password('password_confirmation', ['class' => 'form-control', 'placeholder' => 'Enter Password Confirmation']) !!}
</div>

<div class="form-group">
    {!! Form::label('roles_list', 'Roles:') !!}

    {!! Form::select('roles_list[]', $roles, null, ['class' => 'form-control', 'multiple' => 'multiple']) !!}
</div>

<div class="form-group">
    {!! Form::submit($submitButtonText, ['class' => 'btn btn-primary form-control']) !!}
</div>