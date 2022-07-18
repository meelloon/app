@extends('layout')

@section('main')

<main>

    @include('components.inp_search')

    <table class="container-sm table table-hover">

        <thead>

            <tr>
                <th>Nazov</th>
                <th>Seriove cislo</th>
                <th>ID auta</th>
            </tr>

        </thead>

        <tbody>

            <tr @click="edit('{{ route('parts.edit', ':id') }}', $event)" role="button"  v-for="part in data" :id="part.id">
                <td>@{{ part.name }}</td>
                <td>@{{ part.serialnumber }}</td>
                <td>@{{ part.car_id }}</td>
            </tr>

        </tbody>

    </table>

</main>

<script>

    let parts = <?= json_encode($parts); ?>;

    list.mount('main');

</script>

@endsection