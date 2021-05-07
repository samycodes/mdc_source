<script src="{{ URL::asset('public/backend/plugins/jquery/jquery.min.js')}}"></script>

<!-- jQuery UI 1.11.4 -->
<script src="{{ URL::asset('public/backend/plugins/jquery-ui/jquery-ui.min.js')}}"></script>

<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{ URL::asset('public/backend/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- ChartJS -->
<script src="{{ URL::asset('public/backend/plugins/chart.js/Chart.min.js')}}"></script>
<!-- Sparkline -->
<script src="{{ URL::asset('public/backend/plugins/sparklines/sparkline.js')}}"></script>
<!-- JQVMap -->
<script src="{{ URL::asset('public/backend/plugins/jqvmap/jquery.vmap.min.js')}}"></script>
<script src="{{ URL::asset('public/backend/plugins/jqvmap/maps/jquery.vmap.usa.js')}}"></script>
<!-- jQuery Knob Chart -->
<script src="{{ URL::asset('public/backend/plugins/jquery-knob/jquery.knob.min.js')}}"></script>
<!-- daterangepicker -->
<script src="{{ URL::asset('public/backend/plugins/moment/moment.min.js')}}"></script>
<script src="{{ URL::asset('public/backend/plugins/daterangepicker/daterangepicker.js')}}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{ URL::asset('public/backend/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>
<!-- Summernote -->
<script src="{{ URL::asset('public/backend/plugins/summernote/summernote-bs4.min.js')}}"></script>
<!-- overlayScrollbars -->
<script src="{{ URL::asset('public/backend/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{ URL::asset('public/backend/dist/js/adminlte.js')}}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{ URL::asset('public/backend/dist/js/pages/dashboard.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ URL::asset('public/backend/dist/js/demo.js')}}"></script>
<script src="{{ URL::asset('public/backend/plugins/select2/js/select2.full.min.js')}}"></script>
<script src="{{ URL::asset('public/backend/plugins/chart.js/Chart.min.js')}}"></script>

<!-- PAGE SCRIPTS -->
<script src="{{ URL::asset('public/backend/dist/js/pages/dashboard2.js')}}"></script>
<!-- Bootstrap 4 -->

<script src="{{ URL::asset('public/backend/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{ URL::asset('public/backend/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{ URL::asset('public/backend/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{ URL::asset('public/backend/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>

<script src="{{ URL::asset('public/js/toast.js')}}"></script>
    
<script src="{{ URL::asset('public/js/jquery.toaster.js')}}"></script>


<script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
    <script
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBCBB0Q0rnlZLTJ1tQsnh9Z78aA2pB9t4k&callback=initMap&libraries=places&v=weekly"
      defer
    ></script>      
               
    

<!-- Page script -->
<script>

 // This example requires the Places library. Include the libraries=places
      // parameter when you first load the API. For example:
      // <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places">
      function initMap() {
        const map = new google.maps.Map(document.getElementById("map"), {
          center: { lat: -33.8688, lng: 151.2195 },
          zoom: 13,
        });
        const card = document.getElementById("pac-card");
        const input = document.getElementById("pac-input");
        map.controls[google.maps.ControlPosition.TOP_RIGHT].push(card);
        const autocomplete = new google.maps.places.Autocomplete(input);
        // Bind the map's bounds (viewport) property to the autocomplete object,
        // so that the autocomplete requests use the current map bounds for the
        // bounds option in the request.
        autocomplete.bindTo("bounds", map);
        // Set the data fields to return when the user selects a place.
        autocomplete.setFields([
          "address_components",
          "geometry",
          "icon",
          "name",
        ]);
        const infowindow = new google.maps.InfoWindow();
        const infowindowContent = document.getElementById("infowindow-content");
        infowindow.setContent(infowindowContent);
        const marker = new google.maps.Marker({
          map,
          anchorPoint: new google.maps.Point(0, -29),
        });
        autocomplete.addListener("place_changed", () => {
          infowindow.close();
          //marker.setVisible(false);
          const place = autocomplete.getPlace();

          if (!place.geometry) {
            // User entered the name of a Place that was not suggested and
            // pressed the Enter key, or the Place Details request failed.
            window.alert(
              "No details available for input: '" + place.name + "'"
            );
            return;
          }

          // If the place has a geometry, then present it on a map.
          if (place.geometry.viewport) {
            map.fitBounds(place.geometry.viewport);
          } else {
            map.setCenter(place.geometry.location);
            map.setZoom(17); // Why 17? Because it looks good.
          }
          marker.setPosition(place.geometry.location);
          //marker.setVisible(true);
          //let address = "";

          if (place.address_components) {
            address = [
              (place.address_components[0] &&
                place.address_components[0].short_name) ||
                "",
              (place.address_components[1] &&
                place.address_components[1].short_name) ||
                "",
              (place.address_components[2] &&
                place.address_components[2].short_name) ||
                "",
            ].join(" ");
          }
      
          infowindowContent.children["place-name"].textContent = place.name;
          infowindowContent.children["place-address"].textContent = address;
          infowindow.open(map, marker);
          
           document.getElementById("latitude").value = place.geometry.location.lat();
            document.getElementById("longitude").value = place.geometry.location.lng();
            document.getElementById("locality").value = place.name;
            document.getElementById("country-name").value = place.address_components[3].long_name;
            document.getElementById("state").value = place.address_components[2].long_name;
     
          
        });

        // Sets a listener on a radio button to change the filter type on Places
        // Autocomplete.
        function setupClickListener(id, types) {
          const radioButton = document.getElementById(id);
          radioButton.addEventListener("click", () => {
            autocomplete.setTypes(types);
          });
        }
        setupClickListener("changetype-all", []);
        setupClickListener("changetype-address", ["address"]);
        setupClickListener("changetype-establishment", ["establishment"]);
        setupClickListener("changetype-geocode", ["geocode"]);
        document
          .getElementById("use-strict-bounds")
          .addEventListener("click", function () {
            console.log("Checkbox clicked! New state=" + this.checked);
            autocomplete.setOptions({ strictBounds: this.checked });
          });
   }
 



function isNumber(evt) {
    evt = (evt) ? evt : window.event;
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    if (charCode > 31 && (charCode < 48 || charCode > 57) ) {
        return false;
    }
    return true;
}


// keypress restric validation
function time1(e) {
    if(e.keyCode === 13) {
        e.stopPropagation();
        e.preventDefault();

        return false;
    }
}

function price(evt){
evt = (evt) ? evt : window.event;
   var charCode = (evt.which) ? evt.which : evt.keyCode;
 
    if (charCode > 32 && (charCode < 48 || charCode > 57)) {
      return false;
    }
    if(charCode == 37 || charCode == 46){
	return true;
     }
    return true;
}

$('.decimal').keyup(function(){
    var val = $(this).val();
    if(isNaN(val)){
         val = val.replace(/[^0-9\.]/g,'');
         if(val.split('.').length>2) 
             val =val.replace(/\.+$/,"");
    }

    $(this).val(val); 
})

var numberOfDecimals = 2;
  $(document).on("input", ".decimal", function () {
    var regExp = new RegExp('(\\.[\\d]{' + numberOfDecimals + '}).', 'g')    
    this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1').replace(regExp, '$1');
})


function countrycode(evt){
           
var charCode = (evt.which) ? evt.which : event.keyCode
    if (charCode != 43 && charCode > 31 && (charCode < 48 || charCode > 57))
        return false;
    return true;

        
 }

function officeaddress(e){

            var key = e.key;
            var keyCharCode = key.charCodeAt(0);

            // 0-9
            if(keyCharCode >= 48 && keyCharCode <= 57) {
                return key;
            }
            // A-Z
            if(keyCharCode >= 65 && keyCharCode <= 90) {
                return key;
            }
            // a-z
            if(keyCharCode >= 97 && keyCharCode <= 122) {
                return key;
            }

            if(keyCharCode ==  32) {
                return key;
            }
           if(keyCharCode ==  44) {
                return key;
            }

            return false;
        
}



function isAlfa(evt) {
    evt = (evt) ? evt : window.event;
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    if (charCode > 31 && (charCode < 65 || charCode > 90) && (charCode < 97 || charCode > 122) && (charCode != 32)) {
        return false;
    }
    return true;
}

  $(function () {
    //Initialize Select2 Elements
    
    $('#timepicker').datetimepicker({
      format: 'LT'
    });
    
     $('#timepicker1').datetimepicker({
      format: 'LT'
    });

    

    
    function latlon(evt){
     var charCode = (evt.which) ? evt.which : event.keyCode
    if (charCode == 46) {
        return true;
    }else if(charCode > 31 && (charCode < 48 || charCode > 57)){
        return false;
    }else{
        return true;    
    }
        
    }

    
    $("#success-alert").fadeTo(2000, 500).slideUp(500, function(){
        $("#success-alert").slideUp(500);
    });
    
    $('.select2').select2();
    $('.js-example-basic-multiple').select2();

    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    });

    //Datemask dd/mm/yyyy
    $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
    //Datemask2 mm/dd/yyyy
    $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
    //Money Euro
    $('[data-mask]').inputmask()

    //Date range picker
    $('#reservationdate').datetimepicker({
        format: 'L'
    });
    //Date range picker
    $('#reservation').daterangepicker()
    //Date range picker with time picker
    $('#reservationtime').daterangepicker({
      timePicker: true,
      timePickerIncrement: 30,
      locale: {
        format: 'MM/DD/YYYY hh:mm A'
      }
    })
    
    //Date range as a button
    $('#daterange-btn').daterangepicker(
      {
        ranges   : {
          'Today'       : [moment(), moment()],
          'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
          'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
          'Last 30 Days': [moment().subtract(29, 'days'), moment()],
          'This Month'  : [moment().startOf('month'), moment().endOf('month')],
          'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        },
        startDate: moment().subtract(29, 'days'),
        endDate  : moment()
      },
      function (start, end) {
        $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
      }
    )

    //Timepicker
    $('#timepicker').datetimepicker({
      format: 'LT'
    });
    
    $('#timepicker1').datetimepicker({
      format: 'LT'
    });

    //Bootstrap Duallistbox
    $('.duallistbox').bootstrapDualListbox()

    //Colorpicker
    $('.my-colorpicker1').colorpicker()
    //color picker with addon
    $('.my-colorpicker2').colorpicker()

    $('.my-colorpicker2').on('colorpickerChange', function(event) {
      $('.my-colorpicker2 .fa-square').css('color', event.color.toString());
    });

    $("input[data-bootstrap-switch]").each(function(){
      $(this).bootstrapSwitch('state', $(this).prop('checked'));
    });
    
    

  })
</script>

          
         


 
