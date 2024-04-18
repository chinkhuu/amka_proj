@extends('layouts.app')

@section('content')
<div class="my-order">
    <div class="container">
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
                                    <th>Game Center</th>
                                    <th>Хүний тоо</th>
                                    <th>Room Type</th>
                                    <th>Эхлэх цаг</th>
                                    <th>Дуусах цаг</th>
                                    <th>Нийт тоглох цаг</th>
                                    <th>Нийт Төлбөр</th>
                                    <th>Төлөв</th>
                                    <th>Тайлбар</th>
                                    <th>Захиалга хийсэн өдөр</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($orders as $key=>$item)
                                    <tr>
                                        <td>{{ ++$key }}</td>
                                        <td>{{$item->center->name}}</td>
                                        <td>{{$item->person_quantity}}</td>
                                        <td>{{$item->room_type}}</td>
                                        <td>{{$item->start_date_time}}</td>
                                        <td>{{$item->end_date_time}}</td>
                                        <td>{{$item->total_play_time}} цаг</td>
                                        <td>{{$item->total_payment_amount}}₮</td>
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
                                        <td>{{$item->comment}}</td>
                                        <td>{{ $item->created_at}}</td>
    
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
    </div>
</div>
    

@endsection




