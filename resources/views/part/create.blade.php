@extends('layout')

@section('main')

<form autocomplete="off" method="post" class="form p-5 mx-auto w-25" id="form_create" action="

    @if (Route::is('parts.edit'))
        {{ route('parts.update', $part->id) }}
    @else
        {{ route('parts.store') }}
    @endif">

    @csrf

    @if(Route::is('parts.edit'))
        @method('put')
    @endif

    <input class="form-control mb-2 p-2" type="text" name="name" placeholder="Nazov" maxlength="100" value="{{ old('name', $part->name ?? null) }}" />
    @error('name')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror

    <input class="form-control mb-2 p-2" type="text" name="serialnumber" placeholder="Seriove cislo" pattern="[a-zA-Z0-9]{10}" value="{{ old('serialnumber', $part->serialnumber ?? null) }}" required/>
    @error('serialnumber')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror

    <select class="form-select mb-4 p-2" name="car_id">

        <option value="">vyber ID auta</option>

        @foreach ($car_ids as $car_id)
        <option value="{{ $car_id }}" @selected(old('car_id') == $car_id or (isset($part) and $part->car_id == $car_id))>{{ $car_id }}</option>
        @endforeach

    </select>
    @error('car_id')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror

    @include('components.form_submit')

</form>

@if(Route::is('parts.edit'))
<form method="post" action="{{ route('parts.destroy', $part->id) }}" class="d-none" id="form_delete">

    @csrf
    @method('delete')

</form>
@endif

<script>
    form.mount('#form_create');
</script>

@endsection
