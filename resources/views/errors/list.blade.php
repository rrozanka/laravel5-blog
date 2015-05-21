@if($errors->any())
    <div id="errors-list" class="alert alert-danger">
        <strong>
            There were errors in the form!
        </strong>

        <ul>
            @foreach($errors->all() as $error)
                <li>
                    {{ $error }}
                </li>
            @endforeach
        </ul>
    </div>
@endif