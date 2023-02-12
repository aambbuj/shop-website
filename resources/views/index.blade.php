<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>add information</title>
  </head>
  <body>
  <div class="container" style="margin-top: 12%;">
  <div class="row mt-2">
    <div class="col mt" style="text-align: center;margin-top: 12%;padding: 0px;font-size: 18px;">
      <a href="{{url('/recharge-plans')}}" style="font-size: 65%">Recharge Plans</a>
    </div>
    <div class="col" style="padding: 0px;">
      <img src="/bsnl_logo.jpeg" class="rounded-circle"  width="100" height="100" alt="Cinque Terre">
    </div>
    <div class="col" style="text-align: center;margin-top: 12%;padding: 0px;font-size: 18px;">
      <a  href="https://www.bsnl.co.in/" style="font-size: 65%">Others</a>
    </div>
  </div>

    <h3 class="text-center mt-4" style="color:brown; center ; text-shadow: 2px 2px #bbd1d0d1;">BSNL apply for new sim </h3>
  <form action="{{url('/add-information')}}" method="post">
    @csrf

  <div class="row">
  @if (session('success'))
    <div class="col-sm-12">
        <div class="alert  alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
        </div>
    </div>
@endif
    <div class="col-md-3 text-center mt-2">
        <!-- <label class="form-label">Name</label> -->
        <input type="name" name="name" placeholder="Enter your name" required class="form-control text-center">
    </div>

    <div class="col-md-3 text-center mt-2">
        <!-- <label class="form-label">Phone</label> -->
        <input type="number"  name="phone" placeholder="Enter your phone" minlength="10" maxlength="10" required  class="form-control text-center">
    </div>

    <div class="col-md-3 text-center mt-2">
        <!-- <label class="form-label">pin</label> -->
        <input type="number" id="pinCode" name="pin" placeholder="Enter your pin" required class="form-control text-center">
    </div>
    <div class="col-md-3 text-center mt-2" style="display:none;" id="post_office_section">
        <!-- <label class="form-label">Post Office</label> -->
        <select name="post_office" id="post_office" class="form-control text-center">
        </select>
    </div>
  </div>

  <div class="row">
    <div class="col-md-3 text-center block_section mt-2" style="display:none;">
          <!-- <label class="form-label">Block</label> -->
          <input type="text" id="block" name="block" required class="form-control text-center" readonly>
      </div>
      <div class="col-md-3 text-center block_section mt-2" style="display:none;">
          <!-- <label class="form-label">District</label> -->
          <input type="text" id="district" name="district"  required class="form-control text-center" readonly>
      </div>
      <div class="col-md-3 text-center block_section mt-2" style="display:none;">
          <!-- <label class="form-label">State</label> -->
          <input type="text" id="state" name="state" required class="form-control text-center" readonly>
      </div>

      <div class="col-md-3 text-center pt-2">
          <!-- <label class="form-label">Address</label> -->
          <input type="text" name="address" placeholder="Enter your address" required class="form-control text-center">
      </div>
  </div>

  <div class="d-grid gap-2 mt-4">
  <button class="btn btn-primary" type="submit">Save</button>
</div>
</form>
</div>


    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>    
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>  
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>

<script type="text/javascript">
  // $("#phone").keydown(function(event) {
  //   k = event.which;
  //   if ((k >= 96 && k <= 105) || k == 8) {
  //     if ($(this).val().length == 10) {
  //       if (k == 8) {
  //         return true;
  //       } else {
  //         event.preventDefault();
  //         return false;

  //       }
  //     }
  //   } else {
  //     event.preventDefault();
  //     return false;
  //   }
  // });
  $(document).ready(function(){
    var alll_postoffice=[];
      $('#pinCode').keyup(function(e) {
        let pinCode = $("#pinCode").val();
        if (pinCode.length > 5) {
          $.ajax({
                url: `https://api.postalpincode.in/pincode/${pinCode}`,

                data:{
                  "_token": "{{ csrf_token() }}",
                },
                success:function(response){
                  // $('#successMsg').show();
                  alll_postoffice=response[0].PostOffice;
                  //console.log(response);
                  if(response.length>0 && response[0].Status=='Success')
                  {
                    let option_html='<option>-:Please Select:-</option>';
                    for (const key in response[0].PostOffice) {
                      option_html+=`<option value="${response[0].PostOffice[key].Name}">${response[0].PostOffice[key].Name}</option>`;
                      //console.log(response[0].PostOffice[key].Name);
                    }
                    $('#post_office').html(option_html);
                    $('#post_office_section').show();
                  }
                },
                error: function(response) {
                  alert('pin code is wrong');
                },
              });
        }
      });
      $("#post_office").change(function () {
          //var end = this.value;
          var postoffice = $('#post_office').val();
          console.log(alll_postoffice);
          //console.log(postoffice);
          for (const key in alll_postoffice) {
            if (postoffice==alll_postoffice[key].Name) {
              console.log(alll_postoffice[key].Name);
              $('#block').val(alll_postoffice[key].Block);
              $('#district').val(alll_postoffice[key].District);
              $('#state').val(alll_postoffice[key].State);
              $('.block_section').show();
            }
            //option_html+=`<option value="${response[0].PostOffice[key].Name}">${response[0].PostOffice[key].Name}</option>`;
            //console.log(response[0].PostOffice[key].Name);
          }
      });
    });
</script>

  </body>
</html>

