@extends('admin.app')
@section('title', 'عرض  عمليات تاكيد الدفع')
@section('breadcrumb')
<ul class="page-breadcrumb">
    <li>
        <a href="{{url('')}}">   </a>
    </li>
    <li>عمليات تاكيد الدفع</li>
</ul>
@endsection
@section('content')
<div class="page-fixed-main-content">
    <div class="portlet box blue">
        <div class="portlet-title">
            <div class="caption">
                <i class="fa fa-globe" aria-hidden="true"></i>عمليات تاكيد الدفع</div>
            <div class="tools"> </div>
        </div>
        <div class="portlet-body ">
              <ul class="nav nav-tabs">
                <li class=" @if(Request::segment(2)=='payments' && Request::segment(3)==''  )
                    active
                    @endif "><a href="{{route('admin.payments')}}">كل </a></li>
               <li class=" @if(Request::segment(2)=='payments' && Request::segment(3)=='0'  )
                    active
                    @endif "><a href="{{route("admin.payments_search",0)}}">جديد </a></li>
               <li class=" @if(Request::segment(2)=='payments' && Request::segment(3)=='1'  )
                    active
                    @endif "><a href="{{route("admin.payments_search",1)}}">مؤكد </a></li>
               <li class=" @if(Request::segment(2)=='payments' && Request::segment(3)=='2'  )
                    active
                    @endif "><a href="{{route("admin.payments_search",2)}}">مرفوض </a></li>

            </ul>
            <br>
            <br>
           
            <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
                <thead>
                    <tr>


                        <th style="width: 10%">رقم الطلب </th>
                        <th style="width: 20%">الاسم </th>
    <th style="width: 20%">الحالة </th>

                      

                        <th>خيارات</th>
                    </tr>
                </thead>

                <tbody>
                    <?php $co = 1; ?>
                    @foreach($payments as $c)
                    <tr>


                        <td data-title="رقم ">{{ $c->order_id}}</td>

                      
                        <td  class='noter' data-title="الاسم">
                            {{$c->name}}
                        </td>
  <td data-title="الحالة ">
                            @if($c->status==0)
                            جديد
                            @elseif($c->status==1)
                            تم التاكيد
                            @else
                            تم الرفض
                            @endif
                            
                        </td> 
                 

                        <td data-title="خيارات">





                            <a class="edit-modal2 btn blue " 
                            
                               data-toggle="collapse" data-target="#demo{{$co}}" >
                                <span class="glyphicon glyphicon-edit" ></span> عرض</a>
                                  <a class=" update-post-link btn btn-success" 
                               data-id="{{$c->id}}" 
                               value="{{route("admins.payments.update",["id" =>$c,"or" =>$c->order_id])}}"

                               >
                                <span class="glyphicon glyphicon-arrow-down"></span> تأكيد</a>
                                  <a class=" updatec-post-link btn btn-danger" 
                               data-id="{{$c->id}}" 
                               value="{{route("admins.payments.updateCancel",["id" =>$c,"or" =>$c->order_id])}}"

                               >
                                <span class="glyphicon glyphicon-arrow-up"></span> رفض</a>
                            <a class=" delete-post-link btn btn-info" 
                               data-id="{{$c->id}}" 
                               value="{{route("admins.payments.destroy",["order" =>$c])}}"

                               >
                                <span class="glyphicon glyphicon-trash"></span> حذف</a>






                            <div id="demo{{$co}}" class="collapse" style="width:100%">
                                <form class="form-horizontal" >
                                    <div class="form-body">
                                        <br>
                                        <div class="form-group">
                                            <label class="col-md-6 control-label">
                                                رقم الطلب

                                            </label>
                                            <div class="col-md-6 padding-top">

                                                {{$c->order_id}} 
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-6  control-label">
                                                اسم 

                                            </label>
                                            <div class="col-md-6  padding-top">

                                                {{$c->name}} 
                                            </div>
                                        </div>
                                        <div class="form-group ">
                                            <label class="col-md-6  control-label">
                                             البنك المحول منه

                                            </label>
                                            <div class="col-md-6 padding-top ">

                                                {{$c->bank_from}} 

                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-6  control-label">
                                               البنك المحول إليه

                                            </label>
                                            <div class="col-md-6 padding-top">

                                                {{$c->bank->name}} 

                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-6  control-label">
                                             المبلغ

                                            </label>
                                            <div class="col-md-6 padding-top">

                                                {{$c->amount}} 

                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-6  control-label">
                                                تاريخ 

                                            </label>
                                            <div class="col-md-6  padding-top">
                                                <?php Carbon\Carbon::setLocale('ar'); ?>
                                                {{ Carbon\Carbon::parse($c->date)->diffForHumans() }}

                                            </div>
                                        </div>
                                   

                                    </div>
                                </form>
                            </div>

                        </td>

                    </tr>




                    <?php $co++; ?>
                    @endforeach  
                </tbody>
            </table>
 
      
 

        </div>
    </div>
</div>
@endsection
@section('js')
<meta name="_token" content="{{ csrf_token() }}" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
<script>
$('.delete-post-link').on('click', function (e) {
    var that = this;
    swal({
        title: "هل انت متاكد",
        text: "هل تريد حذف عملية تاكيد الدفع؟",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#d33",
        cancelButtonColor: '#DD6B55',
        confirmButtonText: "نعم!",
        cancelButtonText: "لا!",
        closeOnConfirm: false,
        closeOnCancel: false
    },
    function (isConfirm) {
        if (isConfirm) {


            $.ajax({
                method: 'get',
                url: $(that).attr('value'),
                data: {
                    _token: $(that).data('token')
                },
                success: function (data) {


                    swal("تم الحذف!", "تم حذف  بنجاح.", "success");
                    $(that).closest('tr').remove();
                }

            });
        } else {
            //   t=1;
            swal("تم الالغاء", "تم الغاء الحذف", "error");
        }
    }
    );
});
$('.update-post-link').on('click', function (e) {
    var that = this;
    swal({
        title: "هل انت متاكد",
        text: "هل تريد تاكيد عملية تاكيد الدفع؟",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#d33",
        cancelButtonColor: '#DD6B55',
        confirmButtonText: "نعم!",
        cancelButtonText: "لا!",
        closeOnConfirm: false,
        closeOnCancel: false
    },
    function (isConfirm) {
        if (isConfirm) {


            $.ajax({
                method: 'get',
                url: $(that).attr('value'),
                data: {
                    _token: $(that).data('token')
                },
                success: function (data) {


                    swal("تم التاكيد!", "تم تاكيد  بنجاح.", "success");
                    $(that).closest('tr').remove();
                }

            });
        } else {
            //   t=1;
            swal("تم الالغاء", "تم الغاء التاكيد", "error");
        }
    }
    );
});
$('.updatec-post-link').on('click', function (e) {
    var that = this;
    swal({
        title: "هل انت متاكد",
        text: "هل تريد رفض عملية تاكيد الدفع؟",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#d33",
        cancelButtonColor: '#DD6B55',
        confirmButtonText: "نعم!",
        cancelButtonText: "لا!",
        closeOnConfirm: false,
        closeOnCancel: false
    },
    function (isConfirm) {
        if (isConfirm) {


            $.ajax({
                method: 'get',
                url: $(that).attr('value'),
                data: {
                    _token: $(that).data('token')
                },
                success: function (data) {


                    swal("تم التاكيد!", "تم رفض  بنجاح.", "success");
                    $(that).closest('tr').remove();
                }

            });
        } else {
            //   t=1;
            swal("تم الالغاء", "تم الغاء رفض", "error");
        }
    }
    );
});
;</script>





@endsection