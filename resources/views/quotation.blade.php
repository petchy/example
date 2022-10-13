<!DOCTYPE html>
<html>
<head>
    <title>Quotation</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>
    <style>
    .error {
        color: #FF0000;
    }
    </style>
</head>

<body>
    <div class="container mt-4 col-sm-3">
        <div class="card">
            <div class="card-header text-center font-weight-bold">
                <h2>คำนวณใบเสนอราคา</h2>
            </div>
            <div class="card-body">
                <form name="quotationForm" id="quotationForm" method="post" action="javascript:void(0)">
                    @csrf
                    <div class="form-group">
                        <label for="totalProductPrice">ราคาสินค้ารวม</label>
                        <input type="text" id="totalProductPrice" name="totalProductPrice" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="totalDiscount">ส่วนลดรวม</label>
                        <input type="text" id="totalDiscount" name="totalDiscount" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="totalPrice">ราคาสินค้าหลังส่วนลด</label>
                        <input type="text" id="totalPrice" name="totalPrice" class="form-control" value="" disabled>
                    </div>
                    <div class="form-group">
                        <label for="totalVat">ภาษีมูลค่าเพิ่ม 7%</label>
                        <input type="hidden" id="vat" name="vat" value="7">
                        <input type="text" id="totalVat" name="totalVat" class="form-control" value="" disabled>
                    </div>
                    <div class="form-group">
                        <label for="amount">ราคารวมสุทธิ</label>
                        <input type="text" id="amount" name="amount" class="form-control" value="" disabled>
                    </div>
                    <button type="submit" class="btn btn-primary" id="submit">Submit</button>
                </form>
            </div>
        </div>
    </div>
    <script>
    if ($("#quotationForm").length > 0) {
        $("#quotationForm").validate({
            rules: {
                totalProductPrice: {
                    required: true,
                    min: 0
                },
                totalDiscount: {
                    required: true,
                    min: 0
                }
            },
            messages: {
                totalProductPrice: {
                    required: "กรุณาใส่ราคารวมสินค้า",
                    min: "กรุณาใส่ราคารวมสินค้าอย่างน้อย 0"
                },
                totalDiscount: {
                    required: "กรุณาใส่ส่วนลดรวม",
                    min: "กรุณาใส่ราคาส่วนลดรวมอย่างน้อย 0"
                }
            },
            submitHandler: function(form) {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $('#submit').html('Please Wait...');
                $("#submit").attr("disabled", true);
                $.ajax({
                    url: "{{url('cal-quotation')}}",
                    type: "POST",
                    data: $('#quotationForm').serialize(),
                    success: function(response) {
                        $('#submit').html('Submit');
                        $("#submit").attr("disabled", false);
                        $("#totalPrice").val(response.totalPrice);
                        $("#totalVat").val(response.totalVat);
                        $("#amount").val(response.amount);
                    }
                });
            }
        })
    }
    </script>
</body>

</html>