<div class="form-group @if($errors->has('title')) has-error @endif">
    {!! Form::label('title', 'Title:') !!}

    {!! Form::text('title', null, ['class' => 'form-control', 'placeholder' => 'Enter Title']) !!}
</div>

<div class="form-group @if($errors->has('excerpt')) has-error @endif">
    {!! Form::label('excerpt', 'Excerpt:') !!}

    {!! Form::textarea('excerpt', null, ['class' => 'form-control', 'rows' => 5, 'placeholder' => 'Enter Excerpt']) !!}
</div>

<div class="form-group @if($errors->has('body')) has-error @endif">
    {!! Form::label('body', 'Body:') !!}

    {!! Form::textarea('body', null, ['class' => 'form-control', 'placeholder' => 'Enter Body']) !!}
</div>

<div class="form-group @if($errors->has('category_id')) has-error @endif">
    {!! Form::label('category_id', 'Category:') !!}

    {!! Form::select('category_id', $categories, null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('tags_list', 'Tags:') !!}

    {!! Form::select('tags_list[]', $tags, null, ['class' => 'form-control', 'multiple' => 'multiple']) !!}
</div>

<div class="form-group @if($errors->has('published_at')) has-error @endif">
    {!! Form::label('published_at_parsed', 'Publish On:') !!}

    {!! Form::input('date', 'published_at_parsed', null, ['class' => 'form-control', 'placeholder' => 'Enter Publish On']) !!}
</div>

<div class="form-group">
    {!! Form::submit($submitButtonText, ['class' => 'btn btn-primary form-control']) !!}
</div>