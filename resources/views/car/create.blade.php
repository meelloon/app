@extends('layout')

@section('main')

<form autocomplete="off" method="post" class="form p-5 mx-auto w-25" id="form_create" action="

    @if (Route::is('cars.edit'))
        {{ route('cars.update', $car->id) }}
    @else
        {{ route('cars.store') }}
    @endif">

    @csrf

    @if(Route::is('cars.edit'))
        @method('put')
    @endif

    <input class="form-control mb-2 p-2" type="text" name="name" placeholder="Nazov" maxlength="50" value="{{ old('name', $car->name ?? null) }}" required/>
    @error('name')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror

    <input class="form-control mb-3 p-2" type="number" name="registration_number" placeholder="Registracne cislo" value="{{ old('registration_number', $car->registration_number ?? null) }}"/>
    @error('registration_number')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror

    <div class="text-center">Je registrovane?</div>

    <div class="mb-4 d-flex justify-content-center">

        <label class="form-check-label" for="is_registered_true">
            <input class="form-check-input" type="radio" id="is_registered_true" name="is_registered" value="1" @checked(old('is_registered', (isset($car) and $car->is_registered)))/>Ano
        </label>

        <label class="form-check-label ms-2" for="is_registered_false">
            <input class="form-check-input" type="radio" id="is_registered_false" name="is_registered" value="0" @checked(old('is_registered') == '0' or (isset($car) and $car->is_registered === 0))/>Nie
        </label>
        
    </div>
    @error('is_registered')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror

    @include('components.form_submit')

</form>

@if(Route::is('cars.edit'))
<form method="post" action="{{ route('cars.destroy', $car->id) }}" class="d-none" id="form_delete">

    @csrf
    @method('delete')

</form>
@endif

<script>
    form.mount('#form_create');
</script>

@endsection
