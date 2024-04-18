@extends('layouts.admin')

@section('content')

    <div class="d-flex flex-column-fluid">
        <div class="container">
            <div class="card card-custom">
                <div class="card-header">
                    <h3 class="card-title">
                        Game Edit
                    </h3>
                </div>

                <form class="form" action="{{ route('admin.game-update',['id' => $game->id]) }}" method="POST"
                      enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="card-body">
                        <div class="form-group row">
                            <label for="name" class="col-2 col-form-label">Тоглоомын нэр:</label>
                            <div class="col-12">
                                <input class="form-control" name="name" type="text" value="{{$game->name}}"
                                       id="name" required/>
                                @error('name') <small class="text-danger">{{ $message }}</small> @enderror
                            </div>
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
