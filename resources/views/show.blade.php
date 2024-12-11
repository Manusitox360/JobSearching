@extends('layout.app')

@section('content')
    <a href="{{ route('home') }}" class="btn btn-secondary">Home</a>
    <div class="offerInfo">
        <div>
            <h2>{{ $offer->info }}</h2>
            <h4>{{ $offer->company }}</h4>
        </div>
        <div>
            <a href="{{ $offer->url }}"> offer link </a>
            <p>{{ $offer->convertBooleanToText()}}</p>
        </div>
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
                @if (!($offer->follows)->isEmpty())
                    @foreach ($offer->follows as $follow)
                        <tr>
                            <td>{{ $follow->id }}</td>
                            <td>{{ $follow->created_at }}</td>
                            <td>{{ $follow->news }}</td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="2"> There's no follow </td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>
@endsection