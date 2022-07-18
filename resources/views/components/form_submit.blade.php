<div class="d-flex justify-content-center">

    <input class="btn btn-primary" type="submit" value="Ulozit"/>

    @if(Route::is('parts.edit') or Route::is('cars.edit'))
    @include('components.btn_delete')
    @endif

</div>