<div class="form-group @if($errors->has('name')) has-error @endif">
    {!! Form::label('name', 'Name:') !!}

    {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Enter Name']) !!}
</div>

<div class="form-group @if($errors->has('display_name')) has-error @endif">
    {!! Form::label('display_name', 'Display Name:') !!}

    {!! Form::text('display_name', null, ['class' => 'form-control', 'placeholder' => 'Enter Display Name']) !!}
</div>

<div class="form-group @if($errors->has('description')) has-error @endif">
    {!! Form::label('description', 'Description:') !!}

    {!! Form::text('description', null, ['class' => 'form-control', 'placeholder' => 'Enter Description']) !!}
</div>

<div class="form-group">
    {!! Form::submit($submitButtonText, ['class' => 'btn btn-primary form-control']) !!}
</div>