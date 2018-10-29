$(document).ready(function () {
    function myFunction() {
        document.getElementById("datetimepicker1").min = moment().format("YYYY") + "-" + moment().format("MM") + "-" + moment().format("DD") + "T11:" + moment().format("hh:mm");
        document.getElementById("datetimepicker1").value = moment().format("YYYY") + "-" + moment().format("MM") + "-" + moment().format("DD") + "T11:" + moment().format("hh:mm");
    }
    myFunction();
});