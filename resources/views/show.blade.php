@extends('layout.app')

@section('content')
    <a href="{{ route('home') }}" class="btn btn-secondary">Home</a>
    
    <div class="offerInfo">
        <table class="table table-bordered">
            <tbody>
                <tr>
                    <th>Info</th>
                    <td>{{ $offer->info }}</td>
                </tr>
                <tr>
                    <th>Company</th>
                    <td>{{ $offer->company }}</td>
                </tr>
                <tr>
                    <th>Logo</th>
                    <td><a href="{{ $offer->url }}"><img class="w-25" src="{{ $offer->logo }}" alt="logo de la compañia">{{ $offer->url }}</a></td>
                </tr>
                <tr>
                    <th>Status</th>
                    <td>{{ $offer->convertBooleanToText() }}</td>
                </tr>
            </tbody>
        </table>
    </div>

    <div class="offerFollow">
        <table class="table table-bordered container" id="table">
            <thead>
                <tr>
                    <th scope="col" id="headerTable">#</th>
                    <th scope="col" id="headerTable">Date</th>
                    <th scope="col" id="headerTable">News</th>
                </tr>
            </thead>
            <tbody>
                @if ($offer->follows->isNotEmpty())
                    @foreach ($offer->follows as $follow)
                        <tr>
                            <td>{{ $follow->id }}</td>
                            <td>{{ $follow->created_at }}</td>
                            <td>{{ $follow->news }}</td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="3"> There's no follow </td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>
@endsection