<!DOCTYPE html>
<html lang="en">
<head>
  <title>Branch Report</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
  <link rel="icon" type="image/png" href="form/images/icons/favicon.ico"/>
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="form/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="form/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="form/fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="form/vendor/animate/animate.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="form/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="form/vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="form/vendor/select2/select2.min.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="form/vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="form/vendor/noui/nouislider.min.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="form/css/util.css">
  <link rel="stylesheet" type="text/css" href="form/css/main.css">
<!--===============================================================================================-->
</head>
<body>


  <div class="container-contact100">
    <div class="wrap-contact100">
      <form class="contact100-form validate-form" action="simpanreport.php" method="POST">
        <span class="contact100-form-title">
         Branch Report
        </span>

        

        <div class="wrap-input100 validate-input bg1 rs1-wrap-input100" data-validate = "Enter Your Employee Amount">
          <span class="label-input100">Amount of Employees:</span>
        <input class="input100" name="amtemp" id="emp_amt" placeholder="Employee amount">
        </div>

        <div class="wrap-input100 bg1 rs1-wrap-input100">
          <span class="label-input100">Actual Employees:</span>
            <input class="input100" type="text" name="actemp" id="act_emp" placeholder="Actual number of employee">
        </div>

        <div class="wrap-input100 validate-input bg1 rs1-wrap-input100" data-validate = "Enter Broken CCTV">
          <span class="label-input100">Number of broken CCTV :</span>
          <input class="input100"  type="text" name="brokencctv" id="broken_cctv"  placeholder="Broken CCTV" >
        </div>
        
        <div class="wrap-input100 validate-input bg1 rs1-wrap-input100" data-validate = "Enter Item needed to be replaced">
          <span class="label-input100">Item that needed to be replaced :</span>
          <input class="input100"  type="textarea" name="itemreplace" id="replaceitem"  placeholder="Item replacement" >
        </div>

        <div class="wrap-input100 validate-input bg1 rs1-wrap-input100" data-validate = "Enter Item needed to be replaced">
          <span class="label-input100">Date of Submitted Report :</span>
          <input class="input100"   type="date" name="submitreport"  id="submitreport" min="2017-01-01" max="2017-12-31" >
        </div>

        

        <div class="wrap-input100 input100-select bg1">
          <span class="label-input100">Branch Number:</span>
          <div>
            
              
              <select class="js-select2" name="branchid" id= "brid" >
                
                <option value="102-Kuala Lumpur" >Kuala Lumpur </option>
                <option value="103-Kluang,Johor" >Kluang </option>
                <option value="101-Bukit Mertajam" >Bukit Mertajam </option>
                <option value="100-Petaling Jaya"Petaling Jaya 
              
               
             </option>
            </option>
            </select>
            
            </div>
            </div>
            


        <div class="container-contact100-form-btn">
          <button class="contact100-form-btn" value="submit">
            <span>
              Submit 
              <i class="fa fa-long-arrow-right m-l-7" aria-hidden="true"></i>
            </span>
          </button>
        </div>
      </form>
    </div>
  </div>



<!--===============================================================================================-->
  <script src="form/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
  <script src="form/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
  <script src="form/vendor/bootstrap/js/popper.js"></script>
  <script src="form/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
  <script src="form/vendor/select2/select2.min.js"></script>
  <script>
    $(".js-select2").each(function(){
      $(this).select2({
        minimumResultsForSearch: 20,
        dropdownParent: $(this).next('.dropDownSelect2')
      });


      $(".js-select2").each(function(){
        $(this).on('select2:close', function (e){
          if($(this).val() == "Please chooses") {
            $('.js-show-service').slideUp();
          }
          else {
            $('.js-show-service').slideUp();
            $('.js-show-service').slideDown();
          }
        });
      });
    })
  </script>
<!--===============================================================================================-->
  <script src="form/vendor/daterangepicker/moment.min.js"></script>
  <script src="form/vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
  <script src="form/vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
  <script src="form/vendor/noui/nouislider.min.js"></script>
  <script>
      var filterBar = document.getElementById('filter-bar');

      noUiSlider.create(filterBar, {
          start: [ 1500, 3900 ],
          connect: true,
          range: {
              'min': 1500,
              'max': 7500
          }
      });

      var skipValues = [
      document.getElementById('value-lower'),
      document.getElementById('value-upper')
      ];

      filterBar.noUiSlider.on('update', function( values, handle ) {
          skipValues[handle].innerHTML = Math.round(values[handle]);
          $('.contact100-form-range-value input[name="from-value"]').val($('#value-lower').html());
          $('.contact100-form-range-value input[name="to-value"]').val($('#value-upper').html());
      });
  </script>
<!--===============================================================================================-->
  <script src="form/js/main.js"></script>

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-23581568-13');
</script>

</body>
</html>
