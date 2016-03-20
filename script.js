/*  jQuery ready function. Specify a function to execute when the DOM is fully loaded.  */
$(document).ready(
  //var dropoffdate;
  /* This is the function that will get executed after the DOM is fully loaded */
  function () {
    $( "#pickup_date" ).datepicker({
      //changeMonth: true,//this option for allowing user to select month
      //changeYear: true //this option for allowing user to select from year range
      minDate: new Date(),
      onSelect : function(selected_date){
        var selectedDate = new Date(selected_date);
        var msecsInADay = 86400000;
        var endDate = new Date(selectedDate.getTime() + msecsInADay);
        
         $("#dropoff_date").datepicker( "option", "minDate", endDate );
      }
    });
    
    $('#dropoff_date').datepicker({});
  }
  
  
);