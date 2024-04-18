@extends('layouts.admin')

@section('content')

    <div class="d-flex flex-column-fluid">
        <div class="container">
            <div class="card card-custom">
                <div class="card-header">
                    <h3 class="card-title">
                        GameCenter connect to Game
                    </h3>
                </div>

                <form class="form" action="{{ url('admin/class-subjects') }}" method="POST"
                      enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">

                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <label for="class_id">Class</label>
                                <select name="class_id" class="form-control" disabled>
                                    @foreach ($centers as $center)
                                        <option value="{{ $center->id }}" @if ($center_id == $center->id) selected @endif>
                                            {{ $center->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-12 mb-3">
                                <h4>Selected Games:</h4>
                                <table class="table table-bordered">
                                    <thead>
                                    <tr>
                                        <th>Game Name</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($selectedGames as $centerGames)
                                        <tr>
                                            <td>{{ $centerGames->game->name }}</td>
                                            <td>{{ $centerGames->status }}</td>
                                            <td>
                                                <a href="{{ route('admin.center-games.remove', ['centerId' => $center_id, 'gameId' => $centerGames->game->id]) }}"
                                                   onclick="return confirm('Are you sure to remove this subject?')" class="btn btn-danger btn-sm">Remove</a>
                                            </td>

                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>

                            <div class="col-md-12 mb-3">
                                <h4>Unselected Games:</h4>
                                <table class="table table-bordered">
                                    <thead>
                                    <tr>
                                        <th>Game Name</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($unselectedGames as $game)
                                        <tr>
                                            <td>{{ $game->name }}</td>
                                            <td>
                                                <a href="{{ route('admin.center-games.add', ['centerId' => $center_id, 'gameId' => $game->id]) }}"
                                                   class="btn btn-success btn-sm">Add</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>

                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

