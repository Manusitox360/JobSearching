@extends('layouts.app')

@section('content')
        <div class="tableJournal">
            <table class="table table-striped table-bordered border-primary">
                <thead>
                    <tr>
                        <th scope="col">Id</th></th>
                        <th scope="col">Date Apply</th>
                        <th scope="col">Last Update</th>
                        <th scope="col">Info</th>
                        <th scope="col">Company</th>
                        <th scope="col">State </th>
                        <th scope="col">News</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($offers as $offer)
                        <tr>
                            <td>{{ $offer->id}}</td>
                            <td>{{ $offer->created_at->format("d/m/y")}}</td>
                            <td>{{ $offer->updated_at->format("d/m/y")}}</td>
                            <td>{{ $offer->info}}</td>
                            <td>{{ $offer->company}}</td>
                            <td>{{$offer->state}}</td>
                            <td>
                                <ul>
                                    @forelse ($offer->follows as $follow)
                                        <li>{{$follow->id}} - {{ $follow->news }}</li>
                                    @empty
                                        <li>❌❌❌</li>
                                    @endforelse
                                </ul>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
@endsection
