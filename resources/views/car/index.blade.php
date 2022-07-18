@extends('layout')

@section('main')

<main>
    @include('components.inp_search')

    <table class="container-sm table table-hover">

        <thead>

            <tr>
                <th>Nazov</th>
                <th>Registracne cislo</th>
                <th>Je registrovane</th>
            </tr>

        </thead>

        <tbody>

            <tr @click="edit('{{ route('cars.edit', ':id') }}', $event)" role="button" v-for="car in data" :id="car.id">
                <td>@{{ car.name }}</td>
                <td>@{{ car.registration_number }}</td>
                <td>@{{ car.is_registered ? 'ano' : 'nie' }}</td>
            </tr>

        </tbody>

    </table>

</main>

<script>

    let cars = <?= json_encode($cars); ?>;

    list.mount('main');

</script>

@endsection