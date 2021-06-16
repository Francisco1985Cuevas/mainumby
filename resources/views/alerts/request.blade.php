@if(count($errors) > 0)
    <div class="alert alert-danger" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="alert-heading">
            <i class="fas fa-info-circle"></i> Informaci&oacute;n del Sistema
        </h4>
        <hr>
        <p>
            <ul>
                @foreach($errors->all() as $error)
                    <li>{!! $error !!}</li>
                @endforeach
            </ul>
        </p>
    </div>
@endif
