<!DOCTYPE html>
<html lang="ar">
    <head>
        <meta charset="utf-8">
        <!--[if IE]><meta http-equiv="X-UA-Compatible" content="IE=edge"><![endif]-->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <!-- Page title -->
        <title>{{$setting->name}}|تأكيد الدفع </title>
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
            <div class="panel-body">تأكيد عملية الدفع
                <br>
                عملينا العزيز نرجو منك التفضل بتعئبة النموذج أدناه بعد قيامك بعملية التحويل البنكي للمتجر
            </div>
        </div>

        <!--form-->
        <form class="form-horizontal" method="post" role="form" 
              id="orderform" action="{{route('front.order')}}" role="form">
            {{ csrf_field() }}
            <div class="form-body">
                <div class="form-group">

                    <div class="col-md-6 col-sm-6 small-margin">

                        <input type="text" class="form-control input-medium" 
                               name="order" placeholder="رقم الطلب " required="">
 <div class="alertm text-center hide error-msg">
                       رقم الطلب غير موجود
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6">

                        <input type="text" class="form-control input-medium"
                               name="money"  placeholder=" المبلغ المحول " required="">

                    </div>
                </div>
                <div class="form-group">

                    <div class="col-md-12 col-sm-12">

                        <input type="text" class="form-control input-medium"
                               name="bank_from" placeholder="اسم البنك المحول منه"
                               required="">

                    </div>
                </div>
                <div class="form-group">

                    <div class="col-md-12 col-sm-12">
                        <select class="form-control input-medium"  id='bank_to' name='bank_to'>
                            @foreach($banks as $bank)
                            <option   value="-1">
                                اختر بنك المحول إليه </option>

                            <option   value="{{$bank->id}}">
                                {{$bank->name}} </option>

                            @endforeach      
                        </select>


                    </div>
                </div>
                <div class="form-group">

                    <div class="col-md-12 col-sm-12">

                        <input type="text" class="form-control input-medium"
                               name="name" placeholder="اسم   صاحب الحساب البنكي"
                               required="">

                    </div>
                </div>
            </div>

            <div class="form-actions">
                <div class="row">
                    <div class=" col-md-12" >
                        <button type="submit" class="btn btn-submit" >أرسل طلب</button>
                        <div class="alertm text-center hide done-msg">
                            {{$setting->pay_message}}
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
$.validator.addMethod("valueNotEquals", function (value, element, arg) {
    return arg != value;
}, "Value must not equal arg.");
$("#orderform").validate({
    rules: {
        field: {
            required: true,
        },
        money: {
            number: true,
        },
        order: {
            number: true,
        },
        bank_to: {
            valueNotEquals: "-1"
        }

    },
    messages: {// custom messages for radio buttons and checkboxes

        name: {
            required: "يرجى ادخال الاسم "

        },
        money: {
            required: "يرجى ادخال المبلغ ",
            number: "يرجى ادخال رقم صحيح بدون احرف ",
        },
        order: {
            required: "يرجى ادخال رقم الطلب ",
            number: "يرجى ادخال رقم صحيح بدون احرف ",
        },
        bank_from: {
            required: "يرجى ادخال اسم البنك المحول منه ",
        },
        bank_to: {
            valueNotEquals: "اختر من القائمة"
        }
    },
    submitHandler: function (form) {
        var _token = $("input[name='_token']").val();
        var name = $("input[name='name']").val();
        var bank_from = $("input[name='bank_from']").val();
        var bank_to = $("#bank_to").val();
        var money = $("input[name='money']").val();
        var order = $("input[name='order']").val();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $("input[name='_token']").attr('content')
            }
        });
        $.ajax({
            url: "{{route('front.payment')}}",
            type: 'post',
            data: {_token: _token, name: name, order: order, bank_from: bank_from, money: money,bank_to:bank_to},
            success: function (data) {
                if(data=='error'){
                 // toastr.error('رقم الطلب غير موجود');    
                
                  $(".error-msg  ").removeClass('hide')
                $(".error-msg  ").removeClass('hida')
                $(".error-msg  ").fadeTo(2000, 500).slideUp(500, function () {
                    $(".error-msg  ").slideUp(500);
                });
                }
                else{
                $(".done-msg").removeClass('hide')
                $(".done-msg").removeClass('hida')
                $(".done-msg").fadeTo(2000, 500).slideUp(20500, function () {
                    $(".done-msg").slideUp(20500);
                });

                //    toastr.info(' {{$setting->google}}');
                $('#orderform')[0].reset();}
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