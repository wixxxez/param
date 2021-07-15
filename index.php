<?php
require "decoder.php";
$data = $service->getEncodedArray();

?>
<!DOCTYPE html>
<html lang='pl'>
<head>
  <meta charset='utf-8'/>
  <!--  <link href='https://use.fontawesome.com/releases/v5.0.6/css/all.css' rel='stylesheet'>-->
<!--  <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-glyphicons.css">-->

  <link href='https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.13.1/css/all.css' rel='stylesheet'>

  

    <link href='css/bootstrap-darky.css' rel='stylesheet' />
 <link rel="stylesheet" href="/css/smoke-pure.css">

  
  <link href='css/style.css' rel='stylesheet'/>
  <style>
      .form-group {
          text-align: start;
      }
  </style>

</head>
<body class="text-center">
<form action="decoder.php" method="post" id="CounterForm">
    <div class="container-fluid d-flex" >
        <div class="container-sm">
            <h1 class="hypoint-header-w">Calibration</h1>
            <div class="content">
                <div class="mb-3 form-group ml-2 mr-2">
                    
                 
                        <label for="o2" class="hypoint-color " >O2, %</label>
                        <input type="number" name="calibration.o2"  class="form-control hypoint-input" required value="<?php echo $data['calibration_o2']; ?>"/>
                      
                    
                  </div>
                  <div class="mb-3 form-group ml-2 mr-2">
                    
                        <label for="co2" class="hypoint-color ">CO2, %</label>
                        <input type="number" name="calibration.co2"  class="form-control hypoint-input" required value="<?php echo $data['calibration_co2']; ?>"/>
                      
                  </div>
                  <div class="mb-3 form-group ml-2 mr-2">
                    
                        <label for="n2" class="hypoint-color " >N2, %</label>
                        <input type="number" name="calibration.n2"  class="form-control hypoint-input" required value="<?php echo $data['calibration_n2']; ?>"/>
                      
                  </div>
                  <div class="mb-3 form-group ml-2 mr-2">
                    
                        <label for="temp" class="hypoint-color " >Temperature </label>
                        <input type="number" name="calibration.temp"  class="form-control hypoint-input" required value="<?php echo $data['calibration_temp']; ?>"/>
                      
                  </div>
                  <div class="mb-3 form-group ml-2 mr-2">
                   
                        <label for="humidity" class="hypoint-color " >Humidity, %</label>
                        <input type="number" name="calibration.humidity" id="humidity" class="form-control hypoint-input" required value="<?php echo $data['calibration_humidity']; ?>"/>
               
                  </div>
             
               
            </div>

        </div>
        <div class="container-sm" id="flash_zone">
            <h1 class="hypoint-header-w">Standart</h1>
            <div class="box">
                <div class="content " style="padding:10px 40px;   ">
                    <input type="number" name="standart.o2" class="block hypoint-input-border d-flex align-items-center justify-content-center " style="color: grey;" value="<?php echo $data['standart_o2']; ?>" required>
                    <input type="number" name="standart.co2" class="block hypoint-input-border d-flex align-items-center justify-content-center mt-4 " style="color: grey;" value="<?php echo $data['standart_co2']; ?>" required>
                    <input type="number" name="standart.n2" class="block hypoint-input-border d-flex align-items-center justify-content-center mt-4 " style="color: grey;" value="<?php echo $data['standart_n2']; ?>" required>
                    <input type="number" name="standart.temp" class="block hypoint-input-border d-flex align-items-center justify-content-center mt-4 " style="color: grey;" value="<?php echo $data['standart_temp']; ?>" required>
                    <input type="number" name="standart.humidity" class="block hypoint-input-border d-flex align-items-center justify-content-center mt-4 " style="color: grey;" value="<?php echo $data['standart_humidity']; ?>" required> 
                </div>
            </div>

        </div>
        <div class="container-sm">
            <h1 class="hypoint-header-w">Default</h1>
            <div class="content">
                <div class="mb-3 form-group ml-2 mr-2">
                    
                 
                    <label for="o2" class="hypoint-color " >O2, %</label>
                    <input type="number" name="default.o2"  class="form-control hypoint-input" required value="<?php echo $data['default_o2']; ?>"/>
                  
                
              </div>
              <div class="mb-3 form-group ml-2 mr-2">
                
                    <label for="co2" class="hypoint-color ">CO2, %</label>
                    <input type="number" name="default.co2"  class="form-control hypoint-input" required value="<?php echo $data['default_co2']; ?>"/>
                  
              </div>
              <div class="mb-3 form-group ml-2 mr-2">
                
                    <label for="n2" class="hypoint-color " >N2, %</label>
                    <input type="number" name="default.n2"  class="form-control hypoint-input" required value="<?php echo $data['default_n2']; ?>"/>
                  
              </div>
              <div class="mb-3 form-group ml-2 mr-2">
                
                    <label for="temp" class="hypoint-color " >Temperature </label>
                    <input type="number" name="default.temp"  class="form-control hypoint-input" required value="<?php echo $data['default_temp']; ?>"/>
                  
              </div>
              <div class="mb-3 form-group ml-2 mr-2">
               
                    <label for="humidity" class="hypoint-color " >Humidity, %</label>
                    <input type="number" name="default.humidity" id="humidity" class="form-control hypoint-input" required value="<?php echo $data['default_temp']; ?>"/>
           
              </div>
            </div>
        </div>
    </div>
    <div class="container mt-3" style="text-align: end;">
        <button class="btn btn-primary hyp-btn" type="submit"> Save </button>
        
    </div>
    </form>
   

  <script src='/js/jquery-3.6.0.min.js'></script>
  
  <script src="/js/bootstrap.min.js" ></script>
  <script src="/js/smoke-pure.js"></script>
  <script>
        $("#CounterForm").submit(function(e){
            e.preventDefault();
            var form = $(this);
            var url = form.attr('action');
            $.ajax({
            type: "POST",
            url: url,
            data: form.serialize(), // serializes the form's elements.
            success: function(data)
            {
              smoke.alert("Success! Setting are saved.")
            }
            });
        })
       
  </script>
</body>