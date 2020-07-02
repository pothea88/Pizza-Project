<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Peperoni App</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/custom.css">
    <link rel="shortcut icon" href="images/logo.svg" type="image/x-icon">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
   
</head>
<body>
    @yield('content')
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();

            $( ".name").keyup(function(element) {
			var regex = new RegExp("^[a-zA-Z]+$");
			var str = String.fromCharCode(!element.charCode ? element.which : element.charCode);
			if (regex.test(str)) {
				$('.errorMessage').hide();
				$('.submit').prop('disabled', false);
				return true;
			}
			else
			{
                element.preventDefault();
                $('.errorMessage').show();
                $('.submit').prop('disabled', true);
                return false;
			}
		    });
            $(".price" ).keyup(function() {
                if($(".price").val()<1 || $(".price").val()>50){
                    $('.errorMsg').show();
                    $('.submit').prop('disabled', true);
                }
                else{
                    $('.errorMsg').hide();
                    $('.submit').prop('disabled', false);
                }
            });
        });
    </script>
</body>
</html>