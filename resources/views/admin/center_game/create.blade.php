@extends('layouts.admin')

@section('content')

    <div class="d-flex flex-column-fluid">
        <div class="container">
            <div class="card card-custom">
                <div class="card-header">
                    <h3 class="card-title">
                       GameCenter Connect to Games
                    </h3>
                </div>

                <form class="form" action="{{ url('admin/center-games') }}" method="POST"
                      enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">

                        <div class="form-group">
                            <label for="center_id">GameCenter сонгох: </label>
                            <select class="form-control" name="center_id" id="center_id">
                                @foreach ($centers as $center)
                                    <option value="{{ $center->id }}" {{ old('center_id') == $center->id ? 'selected' : '' }}>{{ $center->name }} </option>
                                @endforeach
                            </select>
                            @error('class_id') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>


                        <div class="mb-3">
                            <label for="games" class="checkbox checkbox-success">Games</label>
                            <hr>
                            <div class="row">
                                @forelse ($games as $game)
                                    <div class="col-md-3">
                                        <div class="p-2 border mb-3">
                                            <input id="games"
                                                   type="checkbox"
                                                   name="games[{{ $game->id }}]"
                                                   value="{{ $game->id }}"/>
                                            {{ $game->name }}
                                        </div>
                                    </div>
                                @empty
                                    <div class="col-md-12">
                                        <h1>No Game Found!</h1>
                                    </div>
                                @endforelse
                            </div>
                        </div>

                        <div class="card-footer">
                            <div class="row">
                                <div class="col-2">
                                </div>
                                <div class="col-10">
                                    <button type="submit" class="btn btn-success mr-2">SAVE</button>
                                    <button type="button" class="btn btn-secondary" onclick="goBack()">BACK</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        function goBack() {
            window.history.back();
        }
    </script>
@endsection
