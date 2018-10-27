$(document).ready(function () {
    function myFunction() {

          var fecha = moment().format("YYYY-MM-DDTT11:HH:mm:ss");
          console.log(fecha);
          var ejemplo= fecha.toString();
          console.log(fecha.toLocaleString());
          console.log(moment().format("YYYY")+"-"+moment().format("MM")+"-"+moment().format("DD")+"T11:42:13.510");
//                                alert(fecha);
        document.getElementById("datetimepicker1").min = moment().format("YYYY")+"-"+moment().format("MM")+"-"+moment().format("DD")+"T11:"+moment().format("hh:mm");
    
        document.getElementById("datetimepicker1").value = moment().format("YYYY")+"-"+moment().format("MM")+"-"+moment().format("DD")+"T11:"+moment().format("hh:mm");
    }
//                            document.getElementById("datetimepicker1").value = "2014-01-02T11:42:13.510";
//                           
//                            $('#datetimepicker1').datetimepicker({
//                                defaultDate: new Date(moment().format('YYYY/MM/DD hh:mm'))
//                            });
    myFunction();
});