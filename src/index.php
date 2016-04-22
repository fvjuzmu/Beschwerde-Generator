<!DOCTYPE html>
<html lang="de">
<head>
    <title>Operation Brieftaube</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>
<body>
    <div class="container">
        <h2 style="margin: 80px 50px 0 0; float: left;">Operation Brieftaube</h2>
        <img src="../assets/carrierpigeon.gif" width="240" height="177" alt="bild einer Brieftaube">

        <br style="clear: both">
        <ul class="nav nav-tabs">
            <li class="active"><a data-toggle="tab" href="#home1">Home</a></li>
            <?php
            // Mitgliederliste.php small php wit multidimensional array [ 'A' => [ 'user_01', 'user_02 ], 'B' => [ 'user_03' ] ]
            require_once 'Mitgliederliste.php';

            foreach($mitglieder as $buchstabe => $userlist)
            {
                echo "<li><a data-toggle=\"tab\" href=\"#menu" . $buchstabe . "\"> &nbsp; " . $buchstabe . " &nbsp;</a></li>";
            }
            ?>
        </ul>

        <div class="tab-content">
            <div id="home1" class="tab-pane fade in active">
                <h3>Anleitung</h3>
                <p>Einfach oben den Buchstaben auswählen mit dem euer Vorname beginnt, dann auf euren Namen tippen und schon sollte aus dem Drucker ein Personalisiertes Beschwerdeschreiben rausfallen.</p>

                <p>Sollt nach einer Minute immer noch nichts aus dem Drucker kommen, bitte Überprüfen ob der Drucker eingeschaltet ist. Falls ja, einfach noch einmal versuchen. Falls nicht, Drucker einschalten, kurz warten und dann nochmal versuchen.</p>

                <p>Wenn es dann immer noch icht funktioniert, bitte einen Techniker rufen, aber nicht mich ;)</p>
            </div>
            <?php
            foreach($mitglieder as $buchstabe => $userlist)
            {
                echo "<div id=\"menu" . $buchstabe . "\" class=\"tab-pane fade\"><h3>".$buchstabe."</h3>";

                foreach($userlist as $user)
                {
                    echo "<button style='width: 200px; height: 90px;margin: 5px 5px' name='user' value='".$user."'><b>".$user."</b></button>";
                }

                echo "</div>\n";
            }
            ?>
        </div>
    </div>

    <script>
        $(function() {
            $( "button" )
                .button()
                .click(function( event ) {
                    event.preventDefault();
                    printLetter($(this).val());
                });

            function printLetter(user)
            {
                var url="http://localhost/edsa-bg/src/printLetter.php";

                request = $.ajax({
                    url: url,
                    type: "post",
                    data: 'user='+user
                });

                // Callback handler that will be called on success
                request.done(function (response, textStatus, jqXHR){
                    // Log a message to the console
                    alert('Danke ' + user + ',\ndein personalisierter Beschwerdebrief sollte nun gedruckt werden.');
                    $('.nav-tabs a:first').tab('show')
                });
            }
        });


    </script>

</body>
</html>
