@extends('admin.app')
@section('title', 'إعدادات الموقع ')
@section('breadcrumb')
<ul class="page-breadcrumb">
    <li>
        <a href="{{url('')}}">    </a>
    </li>
    <li>إعدادات الموقع</li>
</ul>
@endsection
@section('content')
<div class="page-fixed-main-content">
    <div class="portlet box blue ">
        <div class="portlet-title">
            <div class="caption">
                <i class="fa fa-cog"></i>
                <span class="caption-subject  sbold uppercase">إعدادات الموقع</span>
            </div>

        </div>
        <div class="portlet-body form">
            <form class="form-horizontal" method="post"  id="myform"

                  action="{{route('admin.setting.update')}}" role="form">

                {!! csrf_field() !!}
                <div class="flash-message">
                    @foreach (['danger', 'warning', 'success', 'info'] as $msg)
                    @if(Session::has('alert-' . $msg))

                    <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
                    @endif
                    @endforeach
                </div> 
                @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <strong>خطأ!</strong> هناك مشكلة في الاتي.<br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif	
                <div class="form-body">
                    <div class="form-group">
                        <label class="col-md-3 control-label">
                            اسم الموقع

                        </label>
                        <div class="col-md-3">

                            <input type="text" class="form-control input-medium" 
                                   name="name"    placeholder="اسم الموقع "
                                   required="" value="{{$setting->name}}"
                                   >

                        </div>
                    </div>


                    <div class="form-group">
                        <label class="col-md-3 control-label">
                            اللون

                        </label>
                        <div class="col-md-3">
                            <select class="form-control input-medium"  id='type' name='color'>

                                <option  value="default-rtl.min.css"  @if($setting->color=='default-rtl.min.css') selected @endif>اسود</option>
                                <option value="darkblue-rtl.min.css"  @if($setting->color=='darkblue-rtl.min.css') selected @endif >ازرق غامق</option>
                                <option value="blue-rtl.min.css"  @if($setting->color=='blue-rtl.min.css') selected @endif >ازرق      </option>
                                <option value="grey-rtl.min.css"  @if($setting->color=='grey-rtl.min.css') selected @endif >رمادي      </option>
                                <option value="light2-rtl.min.css"  @if($setting->color=='light2-rtl.min.css') selected @endif >ابيض      </option>
                                <option value="light-rtl.min.css"  @if($setting->color=='light-rtl.min.css') selected @endif >ابيض2   </option>
                            </select>

                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label">
                رابط الفيديو

                        </label>
                        <div class="col-md-3">

                            <input type="url" class="form-control input-medium"
                                   name="link"    placeholder="  رابط  "
                                   required="" value="{{$setting->link}}"
                                    >

                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label">
                      رسالة حفظ الطلب

                        </label>
                        <div class="col-md-3">

                            <input type="text" class="form-control input-medium" 
                                   name="msg"    placeholder="  رسالة حفظ الطلب  "
                                   required="" value="{{$setting->google}}"
                                   >

                        </div>
                    </div>
  <div class="form-group">
                        <label class="col-md-3 control-label">
                      رسالة حفظ الطلب صفحة الدفغ

                        </label>
                        <div class="col-md-3">

                            <input type="text" class="form-control input-medium" 
                                   name="pay_message"    placeholder="  رسالة حفظ الطلب صفحة الدفع  "
                                   required="" value="{{$setting->pay_message}}"
                                   >

                        </div>
                    </div>





                </div>







                <div class="form-actions">
                    <div class="row">
                        <div class="col-md-offset-3 col-md-9">
                            <button type="submit" class="btn blue">تعديل</button>

                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>


</div>


@endsection
@section('js')


<script>
    $.validator.addMethod("valueNotEquals", function (value, element, arg) {
        return arg != value;
    }, "Value must not equal arg.");
    $('#myform').validate({
        errorElement: 'span', //default input error message container

        errorClass: 'help-block', // default input error message class

        focusInvalid: false, // do not focus the last invalid input

        ignore: "",
        rules: {
            field: {
                required: true


            },
        },
        messages: {// custom messages for radio buttons and checkboxes

            name: {
                required: "يرجى ادخال الاسم "

            },

            link: {
                required: "يرجى ادخال الرابط ",
                url: 'ادخل رابط صحيح'

            },
            msg: {
                required: "يرجى ادخال الرسالة ",
                url: 'ادخل رابط صحيح'

            },
pay_message: {
                required: "يرجى ادخال الرسالة ",
                url: 'ادخل رابط صحيح'

            },
        },
        invalidHandler: function (event, validator) { //display error alert on form submit   



        },
        highlight: function (element) { // hightlight error inputs

            $(element)

                    .closest('.form-group').addClass('has-error'); // set error class to the control group

        },
        success: function (label) {

            label.closest('.form-group').removeClass('has-error');

            label.remove();

        },
        errorPlacement: function (error, element) {

            if (element.attr("name") == "tnc") { // insert checkbox errors after the container                  

                error.insertAfter($('#register_tnc_error'));

            } else if (element.closest('.input-icon').size() === 1) {

                error.insertAfter(element.closest('.input-icon'));

            } else {

                error.insertAfter(element);

            }

        },
        submitHandler: function (form) {

            form.submit();

        }

    });
//just for the demos, avoids form submit



</script>
@endsection