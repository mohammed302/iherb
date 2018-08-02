@extends('admin.app')
@section('title', 'تعديل مدير موقع')
@section('breadcrumb')
 <ul class="page-breadcrumb">
                        <li>
                            <a href="{{url('')}}">    </a>
                        </li>
                        <li>تعديل مدير موقع</li>
                    </ul>
@endsection
@section('content')
 <div class="page-fixed-main-content">
<div class="portlet box blue ">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="fa fa-user-plus"></i>
                                        <span class="caption-subject  sbold uppercase">تعديل مدير موقع</span>
                                    </div>
                                   
                                </div>
                                <div class="portlet-body form">
                                    <form class="form-horizontal" method="post"  id="myform"
                                          
                                          action="{{route('admins.update',['admin'=>$admin])}}" role="form">
                                        
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
                                              الاسم
                                                   
                                                </label>
                                                <div class="col-md-3">
                                                
                                                    <input type="text" class="form-control input-medium" 
                                                       name="name"    placeholder="الاسم "
                                                       required="" value="{{$admin->name}}"
                                                       >
                                                 
                                                </div>
                                            </div>
                                
                                          <div class="form-group">
                                                        <label class="col-md-3 control-label">
                                             البريد الإلكترني
                                                   
                                                </label>
                                                <div class="col-md-3">
                                                
                                                    <input type="email" class="form-control input-medium" 
                                                       name="email"    placeholder="البريد الإلكتروني "
                                                       required="" value="{{$admin->email}}"
                                                       >
                                                 
                                                </div>
                                            </div>
                                           <div class="form-group">
                                                        <label class="col-md-3 control-label">
                                             كلمة المرور
                                                   
                                                </label>
                                                <div class="col-md-3">
                                                
                                                    <input type="password" class="form-control input-medium" 
                                                       name="password" id="password"    placeholder="كلمة المرور "
                                                       required="" value="{{$admin->pass}}"
                                                       >
                                                 
                                                </div>
                                            </div>
                                                <div class="form-group">
                                                        <label class="col-md-3 control-label">
                                            تاكيد كلمة المرور
                                                   
                                                </label>
                                                <div class="col-md-3">
                                                
                                                    <input type="password" class="form-control input-medium" 
                                                       name="password_confirm"    placeholder="تأكيد كلمة المرور"
                                                       required="" value="{{$admin->pass}}"
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
    $.validator.addMethod("valueNotEquals", function(value, element, arg){
  return arg != value;
 }, "Value must not equal arg.");
    $('#myform').validate({

            errorElement: 'span', //default input error message container

            errorClass: 'help-block', // default input error message class

            focusInvalid: false, // do not focus the last invalid input

            ignore: "",

             rules: {

           name: {

                    required: true
                     

                },
              email: {

                    required: true
                     

                },
             password: {

                    required: true,
                    minlength : 6,
                    
                    
                     

                },
                password_confirm : {
                     required: true,
					minlength : 6,
					equalTo : "#password"
				},
             
          



            },

            messages: {// custom messages for radio buttons and checkboxes

            name: {

                    required: "يرجى ادخال الاسم "

                },
 email: {

                    required: "يرجى ادخال البريد الإلكتروني ",
     email:'ادخل بريد صحيح'

                },
               password: {

                    required: "يرجى ادخال كلمة المرور ",
                   minlength :"طول كلمة قصير يجب ان يكون 6 او كثر"

                },
     
                   password_confirm : {
                      required: "يرجى تاكيد كلمة المرور ",
  equalTo:"كلمة المرور غير متطابقة",
                       minlength :"طول كلمة قصير يجب ان يكون 6 او كثر"
                       
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

$( "#myform22" ).validate({
  rules: {
    field: {
      required: true,
       minlength: 5
    }
  }
});

</script>
@endsection