@extends('layouts.admin')

@section('style')
    <!--begin::Page Vendors Styles(used by this page)-->
    <link href="admin/assets/plugins/custom/datatables/datatables.bundle.css?v=7.0.5" rel="stylesheet" type="text/css"/>
    <!--end::Page Vendors Styles-->
@endsection

@section('content')
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">

        <!--begin::Entry-->
        <div class="d-flex flex-column-fluid">
            <!--begin::Container-->
            <div class="container">

                <!--begin::Card-->
                <div class="card card-custom">
                    <div class="card-header">
                        <div class="card-title">
                        <span class="card-icon">
                            <i class="flaticon2-favourite text-primary"></i>
                        </span>
                            <h3 class="card-label">Class & Subjects</h3>
                        </div>
                        <div class="card-toolbar">
                            <!--begin::Button-->
                            <a href="{{ url('admin/center-games/create') }}" class="btn btn-primary font-weight-bolder">
                                <i class="la la-plus"></i>Connect Center to Games</a>
                            <!--end::Button-->
                        </div>
                    </div>
                    <div class="card-body">
                        <!--begin: Datatable-->
                        <table class="table table-bordered table-hover table-checkable" id="kt_datatable"
                               style="margin-top: 13px !important">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Game Center</th>
                                <th>Games</th>
                                <th>Created At</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php
                                $centerGameMap = [];
                            @endphp
                            @foreach($center_games as $item)
                                @if (!isset($centerGameMap[$item->center_id]))
                                    @php
                                        $centerGameMap[$item->center_id] = [
                                            'center' => $item->center->name,
                                            'games' => [],
                                            'created_at' => $item->created_at
                                        ];
                                    @endphp
                                @endif
                                @php
                                    $centerGameMap[$item->center_id]['games'][] = $item->game->name;
                                @endphp
                            @endforeach

                            @foreach($centerGameMap as $centerId=> $data)
                                <tr>
                                    <td>{{ $centerId }}</td>
                                    <td>{{ $data['center'] }}</td>
                                    <td>{{ implode(', ', $data['games']) }}</td>
                                    <td>{{$data['created_at']}}</td>

                                    <td>
                                        <a href="{{ url('admin/center-games/edit/'.$centerId) }}"
                                           class="btn btn-sm btn-clean btn-icon" title="edit">
                                            <i class="la la-edit"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <!--end: Datatable-->
                    </div>
                </div>
                <!--end::Card-->
            </div>
            <!--end::Container-->
        </div>
        <!--end::Entry-->
    </div>

@endsection

@section('vendor')
    <!--begin::Page Vendors(used by this page)-->
    <script src="admin/assets/plugins/custom/datatables/datatables.bundle.js?v=7.0.5"></script>
    <!--end::Page Vendors-->
@endsection

@section('script')
    <!--begin::Page Scripts(used by this page)-->
    <script src="admin/assets/js/pages/crud/datatables/data-sources/merchant.js?v=7.0.5"></script>
    <!--end::Page Scripts-->
@endsection





