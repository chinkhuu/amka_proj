@extends('layouts.admin')

@section('style')
    <!--begin::Page Vendors Styles(used by this page)-->
    <link href="{{asset('admin/assets/plugins/custom/datatables/datatables.bundle.css?v=7.0.5')}}" rel="stylesheet"
          type="text/css"/>
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
                            <h3 class="card-label">Users</h3>
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
                                <th>Name</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Point</th>
                                <th>Created Date</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($users as $key=>$item)
                                <tr>
                                    <td>{{ ++$key }}</td>
                                    <td>{{ optional($item->center)->name  ?? 'No Available' }}</td>
                                    <td>{{$item->name}}</td>
                                    <td>{{$item->email}}</td>
                                    <td class="datatable-cell-sorted datatable-cell" data-field="Status" aria-label="1">
                                        @if($item->role_as == '0')
                                            <span style="width: 112px;">
                                                <span
                                                        class="label font-weight-bold label-lg  label-light-success label-inline">user</span>
                                        </span>
                                        @elseif($item->role_as == '2')
                                            <span style="width: 110px;">
                                                <span
                                                        class="label font-weight-bold label-lg  label-light-info label-inline">moderator</span></span>

                                        @elseif($item->role_as == '1')
                                            <span style="width: 110px;">
                                                <span
                                                        class="label font-weight-bold label-lg  label-light-warning label-inline">admin</span></span>
                                        @else
                                            <span style="width: 112px;">
                                            <span
                                                    class="label font-weight-bold label-lg  label-light-success label-inline">Хөгжүүлэгчид хэл</span>
                                        </span>
                                        @endif
                                    </td>
                                    <td>{{$item->point}}₮</td>
                                    <td>{{ $item->created_at}}</td>
                                    <td>

                                        <a href="#" data-toggle="modal" data-target="#payModal{{$item->id}}"
                                           class="btn btn-success btn-sm">
                                            <i class="las la-money-check-alt"></i>
                                        </a>

                                        <div class="modal fade" id="payModal{{$item->id}}" tabindex="-1" role="dialog"
                                             aria-labelledby="payModalLabel{{$item->id}}" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="payModalLabel{{$item->id}}">Хэтэвч
                                                            цэнэглэх</h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <form action="{{ route('admin.user-recharge', ['id' => encrypt($item->id) ]) }}"
                                                          method="POST">
                                                        @csrf
                                                        <div class="modal-body">
                                                            <label for="paid_amount">Цэнэглэх мөнгөн дүн: </label>

                                                            <div class="input-group">
                                                                <div class="input-group-prepend"><span
                                                                            class="input-group-text">₮</span></div>
                                                                <input placeholder="төлсөн дүн бичнэ үү"
                                                                       name="recharge_amount" class="form-control"
                                                                       type="number"
                                                                       id="paid_amount"
                                                                       min="0"
                                                                       required/>
                                                            </div>
                                                        </div>

                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                    data-dismiss="modal">Цуцлах
                                                            </button>
                                                            <button type="submit" class="btn btn-primary">Цэнэглэх
                                                            </button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>


                                        <a href="#" data-toggle="modal" data-target="#IDModal{{ $item->id }}" class="btn btn-warning btn-sm">
                                            <i class="las la-folder"></i>
                                        </a>

                                        <!-- Modal Structure -->
                                        <div class="modal fade" id="IDModal{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="IDModalLabel{{ $item->id }}" aria-hidden="true">
                                            <div class="modal-dialog modal-lg" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="IDModalLabel{{ $item->id }}">User ID Images</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <h6>Front Image:</h6>
                                                                @if($item->ID_front_image)
                                                                    <img src="{{ asset($item->ID_front_image) }}" class="img-fluid" alt="Front ID Image">
                                                                @else
                                                                    <p>No image available</p>
                                                                @endif
                                                            </div>
                                                            <div class="col-md-6">
                                                                <h6>Back Image:</h6>
                                                                @if($item->ID_back_image)
                                                                    <img src="{{ asset($item->ID_back_image) }}" class="img-fluid" alt="Back ID Image">
                                                                @else
                                                                    <p>No image available</p>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

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
    <script src="{{asset('admin/assets/plugins/custom/datatables/datatables.bundle.js?v=7.0.5')}}"></script>
    <!--end::Page Vendors-->
@endsection

@section('script')
    <!--begin::Page Scripts(used by this page)-->
    <script src="{{asset('admin/assets/js/pages/crud/datatables/data-sources/merchant.js?v=7.0.5')}}"></script>
    <!--end::Page Scripts-->

    <script>
        $(document).ready(function () {
            $('[data-toggle="modal"]').on('click', function () {
                var classValue = $(this).data('class');
                if (classValue) {
                    $('#payModal' + classValue).modal();
                }
            });
        });
    </script>

    @if(session('message'))
        <script>
            window.addEventListener('load', function() {
                Swal.fire({
                    title: 'Success!',
                    text: '{{ session('message') }}',
                    icon: 'success',
                    confirmButtonText: 'OK'
                });
            });
        </script>
    @endif

    @if(session('error'))
        <script>
            window.addEventListener('load', function() {
                Swal.fire({
                    title: 'Error!',
                    text: '{{ session('error') }}',
                    icon: 'error',
                    confirmButtonText: 'OK'
                });
            });
        </script>
    @endif
@endsection



