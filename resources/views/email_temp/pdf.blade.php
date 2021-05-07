<html> 
  
<head> 
    <!-- Link Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> 
      
    <!-- Link Bootstrap JS and JQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> 
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 
</head> 
  
<body> 
    <div class="container" style="max-width: 900px;border: 15px solid #7572725e;"> 
       <div class="row">
           <div class="col-md-6" style="margin-top: 6%;"> Make : {{ $car->make }} <br>Model : {{ $car->model }} <br>MILEAGE : {{ $car->mileage }}<br>DRIVER TYPE : {{ $car->drive_type }}</div>
           <div class="col-md-6"><img src="{{ $car->image }}" style="width: 40%;border: 15px solid #b5a0a030;float: right;position: relative;"/></div>
       </div><hr>
        <div class="row">
            <div class="col-md-6" style="margin-top: 6%;"> ENGINE : {{ $car->engine }}<br>TRANSMISSION :<br>{{ $car->transmission }}<br>FUEL TYPE : {{ $car->fuel_type }}</div>
            <div class="col-md-6"> <img src="{{ $car->image }}" style="width: 40%;border: 15px solid #b5a0a030;float: right;position: relative;"/></div>
         
          
       </div><hr>
        <div class="row">
            <div class="col-md-6" style="margin-top: 6%;"> {{ $car->make }} {{ $car->model }} <br>EXTERIOR : {{ $car->exterior }}<br>INTERIOR : {{ $car->interior }}<br>STOCK NUMBER : {{ $car->stock_number }}<br>VIN : {{ $car->vin }}</div>
            <div class="col-md-6"><img src="{{ $car->image }}" style="width: 40%;border: 15px solid #b5a0a030;float: right;position: relative;" /></div>
          
           
       </div>
        
    </div> 
  
</body> 
  
<style>
hr { 
           width: auto;
    position: relative;
    /*top: 20px;*/
    border: none;
    height: 10px;
    background: #f1eded;
    /*margin-bottom: 57px;*/
        } 
        
@media only screen and (max-width: 320px) {
  body img {
    max-width: 30%;
  }
}
</style>  
  
</html> 
