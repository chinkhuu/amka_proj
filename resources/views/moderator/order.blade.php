@extends('layouts.moderator')

@section('style')
    <!--begin::Page Vendors Styles(used by this page)-->
    <link href="{{asset('admin/assets/plugins/custom/datatables/datatables.bundle.css?v=7.0.5')}}" rel="stylesheet" type="text/css"/>
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
                            <h3 class="card-label">Orders</h3>
                        </div>

                    </div>
                    <div class="card-body">
                        <!--begin: Datatable-->
                        <table class="table table-bordered table-hover table-checkable" id="kt_datatable"
                               style="margin-top: 13px !important">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>User Name</th>
                                <th>Game Center</th>
                                <th>Хүний тоо</th>
                                <th>Room Type</th>
                                <th>Эхлэх цаг</th>
                                <th>Дуусах цаг</th>
                                <th>Нийт тоглох цаг</th>
                                <th>Нийт Төлбөр</th>
                                <th>Тайлбар</th>
                                <th>Төлөв</th>
                                <th>Created Date</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($orders as $key=>$item)
                                <tr>
                                    <td>{{ ++$key }}</td>
                                    <td>{{$item->user->name}}</td>
                                    <td>{{$item->center->name}}</td>
                                    <td>{{$item->person_quantity}}</td>
                                    <td>{{$item->room_type}}</td>
                                    <td>{{$item->start_date_time}}</td>
                                    <td>{{$item->end_date_time}}</td>
                                    <td>{{$item->total_play_time}} цаг</td>
                                    <td>{{$item->total_payment_amount}}₮</td>
                                    <td>{{$item->comment}}</td>
                                    <td class="datatable-cell-sorted datatable-cell" data-field="Status" aria-label="1">
                                        @if($item->status == 'pending')
                                            <span style="width: 112px;">
                                                <span
                                                        class="label font-weight-bold label-lg  label-light-warning label-inline">pending</span>
                                        </span>
                                        @elseif($item->status == 'accepted')
                                            <span style="width: 110px;">
                                                <span
                                                        class="label font-weight-bold label-lg  label-light-success label-inline">accepted</span></span>

                                        @elseif($item->status == 'refused')
                                            <span style="width: 110px;">
                                                <span
                                                        class="label font-weight-bold label-lg  label-light-danger label-inline">refused</span></span>
                                        @else
                                            <span style="width: 112px;">
                                            <span
                                                    class="label font-weight-bold label-lg  label-light-success label-inline">Хөгжүүлэгчид хэл</span>
                                        </span>
                                        @endif
                                    </td>
                                    <td>{{ $item->created_at}}</td>

                                    <td>
                                        <a href="javascript:void(0);"
                                           class="btn btn-sm btn-clean btn-icon edit-order" title="edit"
                                           data-id="{{$item->id}}"
                                           data-comment="{{$item->comment}}"
                                           data-status="{{$item->status}}">
                                            <i class="la la-paper-plane"></i>
                                        </a>

                                        <div class="modal fade" id="editOrderDecisionModal" tabindex="-1" role="dialog" aria-labelledby="editOrderDecisionModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="editOrderDecisionModalLabel">Decision</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <form id="editOrderDecisionForm" method="POST">
                                                        @csrf
                                                        @method('PUT')
                                                        <div class="modal-body">

                                                            <input type="hidden" name="order_id" id="edit_order_id">

                                                            <div class="modal-body">
                                                                <label for="edit_status">Шийдвэр?</label>
                                                                <div class="input-group">
                                                                    <select class="form-control" id="edit_status" name="status" required>
                                                                        <option value="accepted">хүлээн авсан</option>
                                                                        <option value="refused">татгалзсан</option>
                                                                    </select>
                                                                </div>
                                                                <br>

                                                                <label for="edit_comment">Тайлбар бичнэ үү: </label>
                                                                <div class="input-group">
                                                                    <input placeholder="Тайлбар бичнэ энд бичнэ үү" name="comment" class="form-control"
                                                                           type="text"
                                                                           id="edit_comment"
                                                                           required/>
                                                                </div>
                                                            </div>

                                                        </div>

                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                                            <button type="submit" class="btn btn-primary">Update</button>
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
                                                                @if($item->user->ID_front_image)
                                                                    <img src="{{ asset($item->user->ID_front_image) }}" class="img-fluid" alt="Front ID Image">
                                                                @else
                                                                    <p>No image available</p>
                                                                @endif
                                                            </div>
                                                            <div class="col-md-6">
                                                                <h6>Back Image:</h6>
                                                                @if($item->user->ID_back_image)
                                                                    <img src="{{ asset($item->user->ID_back_image) }}" class="img-fluid" alt="Back ID Image">
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
        $(document).ready(function() {
            $('.edit-order').click(function() {
                var id = $(this).data('id');
                var comment = $(this).data('comment');
                var status = $(this).data('status');

                console.log(status);
                console.log(comment);

                $('#edit_order_id').val(id);
                $('#edit_comment').val(comment);
                $('#edit_status').val(status);
                $('#editOrderDecisionModal').modal('show');
            });
        });
    </script>

    <script>
        $('.edit-order').on('click', function() {
            var OrderId = $(this).data('id');
            var actionUrl = "{{ route('moderator.change-status', ['id' => ':id']) }}".replace(':id', OrderId);
            $('#editOrderDecisionForm').attr('action', actionUrl);

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



