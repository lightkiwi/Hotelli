@if (isset($app_errors) && !empty($app_errors))
    <div class="alert alert-{{ $app_errors['type'] }} alert-dismissible fade show" role="alert">
        <ul>
            @foreach($app_errors['errors'] as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif
