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
                            <h3 class="card-label">Санал хүсэлтүүд</h3>
                        </div>
                    </div>
                    <div class="card-body">
                        <!--begin: Datatable-->
                        <table class="table table-bordered table-hover table-checkable" id="kt_datatable"
                               style="margin-top: 13px !important">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Нэр</th>
                                <th>Email</th>
                                <th>Утас</th>
                                <th>Гарчиг</th>
                                <th>Тайлбар</th>
                                <th>Status</th>
                                <th>Created Date</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($feedbacks as $key=>$item)
                                <tr>
                                    <td>{{ ++$key }}</td>
                                    <td>{{$item->name}}</td>
                                    <td>{{$item->email}}</td>
                                    <td>{{$item->phone}}</td>
                                    <td>{{$item->title}}</td>
                                    <td>{{$item->explanation}}</td>

                                    <td class="datatable-cell-sorted datatable-cell" data-field="Status" aria-label="1">
                                        @if($item->status == 'resolved')
                                            <span style="width: 112px;">
                                                <span
                                                        class="label font-weight-bold label-lg  label-light-success label-inline">шийдэгдсэн</span>
                                        </span>
                                        @elseif($item->status == 'not_resolved')
                                            <span style="width: 110px;">
                                                <span
                                                        class="label font-weight-bold label-lg  label-light-primary label-inline">шийдэгдээгүй</span></span>
                                        @else
                                            <span style="width: 112px;">
                                            <span
                                                    class="label font-weight-bold label-lg  label-light-success label-inline">Хөгжүүлэгчид хэл</span>
                                        </span>
                                        @endif

                                    </td>


                                    <td>{{$item->created_at}}</td>

                                    <td>
                                        <div class="dropdown">
                                            <button class="btn btn-primary btn-sm dropdown-toggle" type="button"
                                                    id="statusDropdown" data-toggle="dropdown" aria-haspopup="true"
                                                    aria-expanded="false">
                                                CS
                                            </button>
                                            <div class="dropdown-menu" aria-labelledby="statusDropdown">
                                                <a class="dropdown-item"
                                                   href="{{ url('admin/feedback/change-status/'.$item->id.'/resolved') }}">шийдэгдсэн</a>
                                                <a class="dropdown-item"
                                                   href="{{ url('admin/feedback/change-status/'.$item->id.'/not_resolved') }}">шийдэгдээгүй</a>
                                            </div>
                                        </div>

                                        <a href="{{ url('admin/feedback/delete/'.$item->id) }}"
                                           onclick="return confirm('Are you sure to Delete?')"
                                           class="btn btn-sm btn-clean btn-icon" title="delete">
                                            <i class="la la-trash"></i>
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


