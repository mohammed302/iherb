<!DOCTYPE html>
<html lang="ar">
    <head>
        <meta charset="utf-8">
        <!--[if IE]><meta http-equiv="X-UA-Compatible" content="IE=edge"><![endif]-->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <!-- Page title -->
        <title>{{$setting->name}}</title>
        <!-- /Page title -->

        <!-- CSS Files
        ========================================================= -->


        <link rel="stylesheet" type="text/css" href="{{asset('style/front/css/font-awesome.min.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('style/front/css/style.css')}}">
        <style>

        </style>
    </head>
    <body>



        <!-- Nav -->
        <nav class="navbar navbar-default mainNav inside" style="

             ">
            <div class="container">
                <div class="navbar-header">

                    <a class="navbar-brand" href="{{route('front.index')}}" >
                        <img src="{{asset('style/front/img/logo.PNG')}}" class="img-resposive">
                        </a>
                </div>

            </div><!-- /.container -->
        </nav>
        <!--nav-->
        
        <div class="panel panel-default help-text">
            <div class="panel-body">لمعرفة طريقة الطلب شاهد الفيديو أولاً</div>
        </div>
        <div class="text-center">
            <iframe width="420" height="315"
                    src="{{$setting->link}}">
            </iframe>
        </div>
        <!--form-->
        <form class="form-horizontal" method="post" role="form" 
              id="orderform" action="{{route('front.order')}}" role="form">
 {{ csrf_field() }}
            <div class="form-body">
                <div class="form-group">

                    <div class="col-md-6 col-sm-6 small-margin">

                        <input type="text" class="form-control input-medium" 
                               name="name" placeholder="الاسم كامل" required="">

                    </div>
                    <div class="col-md-6 col-sm-6">

                        <input type="text" class="form-control input-medium"
                               name="tel" minlength="12" maxlength="12" placeholder="الواتساب مثال 9665XXXXXXXX" required="">

                    </div>
                </div>
                <div class="form-group">

                    <div class="col-md-12 col-sm-12">

                        <input type="text" class="form-control input-medium"
                               name="address" placeholder="العنوان كامل (الدوله - المدينه - الحي)"
                               required="">

                    </div>
                </div>
                <div class="form-group">

                    <div class="col-md-12 col-sm-12">

                        <input type="text" 
                               class="form-control input-medium" name="link" 
                               placeholder="رابط السله في موقع اي هيرب" required="">

                    </div>
                </div>
            </div>

            <div class="form-actions">
                <div class="row">
                    <div class=" col-md-12" >
                        <button type="submit" class="btn btn-submit" >أرسل طلب</button>
  <div class="alertm text-center hide">
                  {{$setting->google}}
                </div>

                    </div>
                </div>
            </div>
        </form>
        <!--end form-->
        <!--logo section-->
        <div class="container-fluid logos">

            <div class="row">

                <div class="col-md-4 col-sm-4 ">
                    <img src="{{asset('style/front/img/Al_Rajhi_Bank_Logo.png')}} " class="img-responsive">
                </div>
                <div class="col-md-4 col-sm-4 ">
                    <img src="{{asset('style/front/img/nc-bank.png')}} " class="img-responsive">
                </div>
                <div class="col-md-4 col-sm-4 ">
                    <img src="{{asset('style/front/img/alinmaBank.png')}} " class="img-responsive">
                </div>


            </div>
        </div>

        <!--end logo section>
        <!-- Javascript Files
        ========================================================= -->
        <!-- Jquery -->
        <script src="{{asset('style/front/js/jquery-3.2.1.min.js')}}"></script>

        <!-- /Jquery -->
        <!-- Bootstrap Js -->
        <script src="{{asset('style/front/js/bootstrap.min.js')}}"></script>
        <!-- Bootstrap Js -->


        <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.css" rel="stylesheet"/>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>
        <script src="{{asset('style/assets/global/scripts/jquery.validate.min.js')}}"></script>
   
        <script type="text/javascript">
  $("#orderform").validate({
        rules: {
            field: {
                required: true,
              
            },
            tel: {
                number: true,
             
              
            },
            
        },
        messages: {// custom messages for radio buttons and checkboxes

        name: {
            required: "يرجى ادخال الاسم "

        },
         address: {
            required: "يرجى ادخال العنوان "

        },
         tel: {
            required: "يرجى ادخال رقم ",
            number: "يرجى ادخال رقم صحيح بدون احرف ",
            minlength:"الرقم يجب ان يكون 12  رقم",
           maxlength:"الرقم يجب ان يكون 12  رقم",
        },
         link: {
            required: "يرجى ادخال الرابط ",
            url:'يرجى ادخال رابط صحيح'

        },
    },
     submitHandler: function (form) {
         var _token = $("input[name='_token']").val();
          var name = $("input[name='name']").val();
        var address = $("input[name='address']").val()
        var tel = $("input[name='tel']").val();
       var link = $("input[name='link']").val();
      
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $("input[name='_token']").attr('content')
            }
        });
        $.ajax({
            url: "{{route('front.order')}}",
            type: 'post',
            data: {_token: _token,name:name,address:address,tel:tel ,link:link},
            success: function (data) {
                   $(".alertm").removeClass('hide')
      $(".alertm").removeClass('hida')
      $(".alertm").fadeTo(2000, 500).slideUp(20500, function(){
    $(".alertm").slideUp(20500);
}); 

           //    toastr.info(' {{$setting->google}}');
               $('#orderform')[0].reset();
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

         // $("#orderform").validate();            // <- INITIALIZES PLUGIN

 //    console.log($("#orderform").valid());  // <- TEST VALIDATION

        </script>
    </body>
</html>