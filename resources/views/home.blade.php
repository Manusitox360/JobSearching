@extends('Layout.app')

@section('content')
    <div class="container mt-5">
        <h2 class="text-center">Lista de Ofertas</h2>
        <div class="table-responsive">
            <table class="table table-striped table-bordered border-primary">
                <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Date Apply</th>
                        <th scope="col">Last Update</th>
                        <th scope="col">Info</th>
                        <th scope="col">Company</th>
                        <th scope="col">State</th>
                        <th scope="col">News</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($offers as $offer)
                        <tr>
                            <td>{{ $offer->id }}</td>
                            <td>{{ $offer->created_at->format('d/m/Y') }}</td>
                            <td>{{ $offer->updated_at->format('d/m/Y') }}</td>
                            <td><a href="{{ route('show', ['id' => $offer->id]) }}">{{ $offer->info }}</a></td>
                            <td>{{ $offer->company }}</td>
                            <td>{{ $offer->convertBooleanToText() }}</td>
                            <td>
                                <ul>
                                    @forelse ($offer->follows as $follow)
                                        <li>{{ $follow->id }} - {{ $follow->news }}</li>
                                    @empty
                                        <li>❌ No hay noticias disponibles</li>
                                    @endforelse
                                </ul>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
