<!DOCTYPE html>
<html>
    <head>
        <script>
            function showHint(str) {
                if (str.length == 0) {
                    document.getElementById("txtHint").innerHTML = "";
                    return;
                } else {
                    var xmlhttp = new XMLHttpRequest();
                    xmlhttp.onreadystatechange = function() {
                        if (this.readyState == 4 && this.status == 200) {
                            document.getElementById("txtHint").innerHTML = this.responseText;
                        }
                    };
                    xmlhttp.open("GET", "includes/curl.php?query=" + str, true);
                    xmlhttp.send();
                }
            }
        </script>
        <meta charset="UTF-8">
            <title>Amazon/Walmart Price Compare</title>
            <link rel="stylesheet" href="css/bootstrap.min.css">
            <link rel="stylesheet" href="css/bootstrap.css">
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
            <!--Some custom CSS-->
            <!--    <link rel="stylesheet" href="css/custom.css">-->
    </head>
    <body>
        <nav class="navbar navbar-toggleable-md navbar-inverse bg-primary">
          <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
        </button>
          <a class="navbar-brand" href="">Walmart Price Check</a>

          <div class="collapse navbar-collapse" id="navbarColor01">
            <ul class="navbar-nav mr-auto">
            </ul>
            <form class="form-inline">
              <input name="query" onkeyup="showHint(this.value)" class="form-control mr-sm-2" placeholder="Please enter one word" type="text">
            </form>
          </div>
        </nav>
<span id="txtHint"></span>