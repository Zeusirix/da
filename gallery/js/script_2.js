/*  jQuery ready function. Specify a function to execute when the DOM is fully loaded.  */
$(document).ready(
  //var dropoffdate;
  /* This is the function that will get executed after the DOM is fully loaded */
  function () {
    $( "#pickup_date" ).datepicker({
      //changeMonth: true,//this option for allowing user to select month
      //changeYear: true //this option for allowing user to select from year range
      minDate: new Date(),
      beforeShowDay: disableSpecificDaysAndWeekends,
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

/** Days to be disabled as an array */
var disabledSpecificDays = ["6-10-2015", "6-15-2015", "6-25-2015", "6-21-2015"];
 
function disableSpecificDaysAndWeekends(date) {
    var m = date.getMonth();
    var d = date.getDate();
    var y = date.getFullYear();
 
    for (var i = 0; i < disabledSpecificDays.length; i++) {
        if ($.inArray((m + 1) + '-' + d + '-' + y, disabledSpecificDays) != -1 || new Date() > date) {
            return [false];
        }
    }
 
    //var noWeekend = $.datepicker.noWeekends(date);
    //return !noWeekend[0] ? noWeekend : [true];
    return [true];
}