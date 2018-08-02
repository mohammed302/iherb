@extends('admin.app')
@section('title', 'عرض  الطلبات')
@section('breadcrumb')
<ul class="page-breadcrumb">
    <li>
        <a href="{{url('')}}">   </a>
    </li>
    <li>الطلبات</li>
</ul>
@endsection
@section('content')
<div class="page-fixed-main-content">
    <div class="portlet box blue">
        <div class="portlet-title">
            <div class="caption">
                <i class="fa fa-globe" aria-hidden="true"></i>الطلبات</div>
            <div class="tools"> </div>
        </div>
        <div class="portlet-body ">
            @if(sizeof($orders)>0)
            <a href="#" value="{{route("admins.allorders.destroy")}}" class="btn blue 
               delete-post-all">حذف كل الطلبات</a>
            @endif
            <br>
            <br>
            <ul class="nav nav-tabs">
                <li class=" @if(Request::segment(2)=='orders' && Request::segment(3)==''  )
                    active
                    @endif "><a href="{{route('admin.orders')}}">كل الحالات</a></li>
                @foreach($states as $state)
                <li class=" @if(Request::segment(3)==$state->id  )
                    active
                    @endif "><a href="{{route('admins.orders.search',$state->id)}}">{{$state->name}}</a></li>
                @endforeach

            </ul>
            <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
                <thead>
                    <tr>


                        <th >رقم الطلب </th>
                        <th >الاسم </th>


                        <th >الحالة </th>

                        <th>خيارات</th>
                    </tr>
                </thead>

                <tbody>
                    <?php $co = 1; ?>
                    @foreach($orders as $c)
                    <tr>


                        <td data-title="رقم ">{{ $c->id}}</td>


                        <td  class='noter' data-title="الاسم">
                            {{$c->name}}
                        </td>

                        <td  class='noter' data-title="الحالة">
                            <select class="form-control input-medium"  id='type' name='state'>
                                @foreach($states as $state)
                                @if($state->id!=8 && $state->id!=9)
                                <option   value="{{route("admins.order.update",["id" =>$c,"st"=>$state->id])}}"
                                          @if($state->id==$c->status_id) selected @endif>{{$state->name}}</option>
                                @elseif($state->id==9)
                                <option   value="{{route("admins.order.updateCharge",["id" =>$c])}}"
                                          @if($state->id==$c->status_id) selected @endif>{{$state->name}}</option>
                                @elseif($state->id==8)
                                <option   value="{{route("admins.order.updateOrder",["id" =>$c])}}"
                                          @if($state->id==$c->status_id) selected @endif>{{$state->name}}</option>
                                @endif
                                @endforeach      
                            </select>




                        </td>

                        <td data-title="خيارات">




                            <div class="dropdown">
                                <button class="btn btn-primary dropdown-toggle" 
                                        type="button" data-toggle="dropdown">
                                    <span class="glyphicon glyphicon-asterisk"></span>
                                    <span class="caret"></span></button>
                                <ul class="dropdown-menu">
                                    <li>       <a class="edit-modal " data-id="{{$c->id}}" data-name="{{$c->name}}" 
                                                  data-whatsup="{{$c->whatsup}}"  
                                                  data-address="{{$c->address}}"
                                                  data-link="{{$c->link}}"
                                                  <?php Carbon\Carbon::setLocale('ar'); ?>
                                                  data-date="   {{ Carbon\Carbon::parse($c->date)->diffForHumans() }}"
                                                  data-state="{{$c->state->name}}"
                                                  data-ord="{{$c->order}}"
                                                  data-chr="{{$c->charge}}"
                                                  data-whatslink="https://wa.me/{{$c->whatsup}}?text=شكرا لطلبك من ايهيرب دايركت, نتواصل معك بخصوص طلبك رقم -{{$c->id}}"
                                                  >
                                            <span class="glyphicon glyphicon-edit"></span> عرض</a></li>
                                    <li>         <a class=" delete-post-link" 
                                                    data-id="{{$c->id}}" 
                                                    value="{{route("admins.orders.destroy",["order" =>$c])}}"

                                                    >
                                            <span class="glyphicon glyphicon-trash"></span> حذف</a></li>

                                </ul>
                            </div>



                        </td>
                    </tr>
                    <?php $co++; ?>
                    @endforeach  
                </tbody>
            </table>
            <div id="stateModal" class="modal fade" role="dialog">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">×</button>
                            <h3 class="modal-title"></h3>
                        </div>
                         <form class="form-horizontal" role="form" id='or' action="">
                        <div class="modal-body">
                           
                                <div class="form-group">
                                    <label class="control-label col-sm-3" for="id">رقم الطلب:</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name='order' id="order" required="">
                                    </div>
                                </div>

                         
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-success" >
                                    حفظ
                                </button>
                                <button type="button" class="btn btn-warning" data-dismiss="modal">
                                    <span class='glyphicon glyphicon-remove'></span> اغلاق
                                </button>
                            </div>
                        </div>
                                </form>
                    </div>
                </div>
            </div> 
            <div id="chargeModal" class="modal fade" role="dialog">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">×</button>
                            <h3 class="modal-title"></h3>
                        </div>
                        <form class="form-horizontal" role="form" id='ch' >
                            <div class="modal-body">

                                <div class="form-group">
                                    <label class="control-label col-sm-3" for="id">رقم الشحنة:</label>
                                    <div class="col-sm-9">
                                        <input type="text" name='charge' class="form-control" id="charge" required="">
                                    </div>
                                </div>


                                <div class="modal-footer">

                                    <button type="submit" class="btn btn-success" >
                                        حفظ
                                    </button>
                                    <button type="button" class="btn btn-warning" data-dismiss="modal">
                                        <span class='glyphicon glyphicon-remove'></span> اغلاق
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div> 
            <!-- Modal form to edit a form -->
            <div id="editModal" class="modal fade" role="dialog">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">×</button>
                            <h3 class="modal-title"></h3>
                        </div>
                        <div class="modal-body">
                            <form class="form-horizontal" role="form">
                                <div class="form-group">
                                    <label class="control-label col-sm-3" for="id">رقم الطلب:</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="id_edit" disabled>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-3" for="title">الاسم:</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="name_edit" disabled>
                                        <p class="errorTitle text-center alert alert-danger hidden"></p>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-3" for="content">رقم الواتساب:</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="tel_edit" disabled>
                                        <a href="" id='tel' target="_blank">ارسل رسالة</a>
                                        <p class="errorContent text-center alert alert-danger hidden"></p>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-3" for="content">العنوان:</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="address_edit" disabled>
                                        <p class="errorContent text-center alert alert-danger hidden"></p>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-3" for="content">الرابط :</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="link_edit" disabled>
                                        <a href="" id='linkc' target="_blank"> الرابط</a>
                                        <p class="errorContent text-center alert alert-danger hidden"></p>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-3" for="content">حالة الطلب :</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="state_edit" disabled>
                                        <p class="errorContent text-center alert alert-danger hidden"></p>
                                    </div>
                                </div>
                                 <div class="form-group ord">
                                    <label class="control-label col-sm-3" for="content">رقم طلب من موقع   :</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="or_edit" disabled>
                                        <p class="errorContent text-center alert alert-danger hidden"></p>
                                    </div>
                                </div>
                                 <div class="form-group ch">
                                    <label class="control-label col-sm-3" for="content"> رقم الشحنة :</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="ch_edit" disabled>
                                        <p class="errorContent text-center alert alert-danger hidden"></p>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-3" for="content">تاريخ الطلب :</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="date_edit" disabled>
                                        <p class="errorContent text-center alert alert-danger hidden"></p>
                                    </div>
                                </div>
                            </form>
                            <div class="modal-footer">

                                <button type="button" class="btn btn-warning" data-dismiss="modal">
                                    <span class='glyphicon glyphicon-remove'></span> اغلاق
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div> 

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
        text: "هل تريد حذف الطلب؟",
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
$('.delete-post-all').on('click', function (e) {
    var that = this;
    swal({
        title: "هل انت متاكد",
        text: "هل تريد حذف جميع الطلبات؟",
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
                    $("#example tbody").remove()


                }

            });
        } else {
            //   t=1;
            swal("تم الالغاء", "تم الغاء الحذف", "error");
        }
    }
    );
});
///
// Edit a order
$(document).on('click', '.edit-modal', function () {
    $('.modal-title').text('عرض الطلب');
    $('#id_edit').val($(this).data('id'));
    $('#name_edit').val($(this).data('name'));
    $('#tel_edit').val($(this).data('whatsup'));
    $('#link_edit').val($(this).data('link'));
    document.getElementById("linkc").href = $(this).data('link');
    $('#address_edit').val($(this).data('address'));
    $('#date_edit').val($(this).data('date'));
    $('#state_edit').val($(this).data('state'));
    
     $('#or_edit').val($(this).data('ord'));
      $('#ch_edit').val($(this).data('chr'));
    
    id = $('#id_edit').val(); 
    document.getElementById("tel").href =$(this).data('whatslink')
    $('#editModal').modal('show');
});</script>




<script type="text/javascript">
    $("select[name='state']").change(function () {


        var url = $(this).val();
        var n = url.includes("Order");
        var n2 = url.includes("Charge");
        if (n2) {
            $('#chargeModal').modal('show');
            $('#ch').attr('action', url);

        }
        if (n) {
            $('#stateModal').modal('show');
            $('#or').attr('action', url);
        }

        var that = this;
        if (!n && !n2) {
            $.ajax({
                url: url,
                method: 'get',
                success: function (data) {
                    swal("تم !", "تم تعديل  بنجاح.", "success");
                            @if (Request::segment(2) == 'orders' && Request::segment(3) != '')
                            $(that).closest('tr').remove();
                            @endif

                }
            });
        }

    });


    $("#ch").validate({
        rules: {
            field: {
                required: true,
            },
            charge: {
                number: true

            },
        },
        messages: {// custom messages for radio buttons and checkboxes

            charge: {
                required: "يرجى ادخال رقم الشحنة ",
                number: "ادخل رقم"

            },
        },
        submitHandler: function (form) {
            var _token = $("input[name='_token']").val();
            var ch = $("input[name='charge']").val();



            $.ajax({
                url: $('#ch').attr('action'),
                type: 'get',
                data: {_token: _token, charge: ch},
                success: function (data) {


                    swal("تم !", "تم تعديل  بنجاح.", "success");
                    $('#ch')[0].reset();
                     $('#chargeModal').modal('hide');
                },
                error: function (data)
                {
                    console.log(data);
                    var dt = '';
                    $.each(data.responseJSON, function (key, value) {
                        dt = dt + '<li>' + value + '</li>';
                    });
                    toastr.error(dt);


                }
            });
            // form.submit();

        }
    });

  $("#or").validate({
        rules: {
            field: {
                required: true,
            },
            order: {
                number: true

            },
        },
        messages: {// custom messages for radio buttons and checkboxes

            order: {
                required: "يرجى ادخال رقم الطلب ",
                number: "ادخل رقم"

            },
        },
        submitHandler: function (form) {
            var _token = $("input[name='_token']").val();
            var or = $("input[name='order']").val();



            $.ajax({
                url: $('#or').attr('action'),
                type: 'get',
                data: {_token: _token, order: or},
                success: function (data) {


                  
                    $('#ch')[0].reset();
                    $('#stateModal').modal('hide');
                      swal("تم !", "تم تعديل  بنجاح.", "success");
                },
                error: function (data)
                {
                    console.log(data);
                    var dt = '';
                    $.each(data.responseJSON, function (key, value) {
                        dt = dt + '<li>' + value + '</li>';
                    });
                    toastr.error(dt);


                }
            });
            // form.submit();

        }
    });
</script>
@endsection