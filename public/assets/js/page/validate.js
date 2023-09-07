jQuery(function(){
    var dtToday = new Date();

    var month = dtToday.getMonth() + 1;// jan=0; feb=1 .......
    var day = dtToday.getDate();
    var year = dtToday.getFullYear();

    if(month < 10)
        month = '0' + month.toString();
    if(day < 10)
        day = '0' + day.toString();
    var minDate = year + '-' + month + '-' + day;
    var maxDate = year + '-' + month + '-' + day;

    jQuery('#startdate').attr('min', minDate);
    jQuery('#enddate').attr('min', minDate);
    

});
   function onlytxtuplodepdf(data) {
        // alert(val);
        // var myFile="";
        var myFile = data.value;
        var upld = myFile.split('.').pop();
        if (upld == 'pdf') {
            $('.'+data.id+'_error').html('');
            if (Filevalidation(data.id)) {
                return true
            }
            return false;
        } else {

            $("#txtuplode").val("");
            $('.'+data.id+'_error').html('Only PDF are allowed.');
            false;
        }
    }
    Filevalidation = (id) => {
        const fi = document.getElementById(id);

        // Check if any file is selected.
        if (fi.files.length > 0) {
            for (const i = 0; i <= fi.files.length - 1; i++) {

                const fsize = fi.files.item(i).size;
                const file = Math.round((fsize / 1024));
                // The size of the file.
                if (file >= 1024) {
                    $("#" + id).val("");
                    $('.' + id + '_error').html('File too Big.');
                
                    return false;
                }
                return true;
            }
        }
    }   
    function ValidateTodate() {

        var fromdate = $('#startdate').val();
        var todate = $('#enddate').val();
           // alert(fromdate);
        var Fromdate = new Date(fromdate);
        var Todate = new Date(todate);
        $(".startdate_error").html("");
        $(".enddate_error").html("");
        if (Fromdate > Todate) {

            $(".enddate_error").html("To Date Should Be Greater Than Start Date").addClass("error-msg");
            return false;
        }
    }