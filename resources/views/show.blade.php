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
            <p>{{ $offer->state }}</p>
        </div>
    </div>

    <div class="offerProgress">
        <table class="table table-bordered container" id="table">
            <thead>
                <tr>
                    <th scope="col" id="headerTable">#</th>
                    <th scope="col" id="headerTable">Date</th>
                    <th scope="col" id="headerTable">Comment</th>
                </tr>
            </thead>
            <tbody>
                @if (!($offer->progresses)->isEmpty())
                    @foreach ($offer->progresses as $progress)
                        <tr>
                            <td>{{ $progress->id }}</td>
                            <td>{{ $progress->created_at }}</td>
                            <td>{{ $progress->comment }}</td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="3">There's no progress yet</td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>
@endsection