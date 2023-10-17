<head>
 <meta charset="utf-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title> {{ $title ??''}}</title> 


    <link rel="stylesheet" href="{{ URL::asset('/public/themes/th3/assets/CSS/Comman.css')}}">
    <link rel="stylesheet" href="{{ URL::asset('/public/themes/th3/assets/CSS/blue.css')}}">
    <link href="{{ URL::asset('/public/themes/th3/assets/CSS/outrageous_orange.css')}}" rel="alternate stylesheet" media="screen" title="outrageous_orange">
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.0/css/bootstrap.min.css" integrity="sha512-XWTTruHZEYJsxV3W/lSXG1n3Q39YIWOstqvmFsdNEEQfHoZ6vm6E9GK2OrF6DSJSpIbRbi+Nn0WDPID9O7xB2Q==" crossorigin="anonymous" referrerpolicy="no-referrer" /> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.1/js/bootstrap.min.js" integrity="sha512-EKWWs1ZcA2ZY9lbLISPz8aGR2+L7JVYqBAYTq5AXgBkSjRSuQEGqWx8R1zAX16KdXPaCjOCaKE8MCpU0wcHlHA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> -->
    <link rel="stylesheet" href="{{ URL::asset('/public/themes/th3/assets/bootstrap-5.0.2-dist/css/bootstrap.min.css')}}">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800&family=Poppins:wght@400;600&family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
    
<!-- ----------------------font size script Start-------------------------- -->
<script type="text/javascript">
       $(document).ready(function () {
        var maxFontSizeChange = 3; // Set the maximum font size change allowed

        $('#fontincrease').click(function () {
            modifyFontSize('increase');
        });
        $('#fontdecrease').click(function () {
            modifyFontSize('decrease');
        });
        $('#fontreset').click(function () {
            modifyFontSize('reset');
        });

        function modifyFontSize(flag) {
            var divElement = $('body');
            var currentFontSize = parseInt(divElement.css('font-size'));

            if (flag == 'increase') {
                currentFontSize += 3;
                if (currentFontSize > 22) { // Limit to a maximum of 24px
                    currentFontSize = 22;
                }
            } else if (flag == 'decrease') {
                currentFontSize -= 3;
                if (currentFontSize < 11) { // Limit to a minimum of 12px
                    currentFontSize = 11;
                }
            } else {
                currentFontSize = 16; // Reset to the default font size
            }

            divElement.css('font-size', currentFontSize + 'px');
        }
    });
</script>


    </head>