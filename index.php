<?php
    require 'deck.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="table.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
    <title>Black Jack</title>
</head>
<body>

    <div id="table">
        
        <div id="bank">
                <div id="red_chips"></div>
                <div id="blue_chips"></div>   
                <div id="yellow_chips"></div>
                <div id="black_chips"></div>
                <div id="pink_chips"></div>
        </div>

        <div id="player"></div>
        <div id="dealer"></div>

        <div id="moneyholder_grey"></div>
        <div id="moneyholder"></div>

        <div id="deck"></div>

        <div class="half-circle"></div>

        <button class="buttonStart btn btn-succes" id="buttonStart">Start</button>
        
        <?php foreach ($main_deck as $value): ?>
            <?= $value; ?>
        <?php endforeach; ?>


    </div>

    

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<script>
    $(".card").click(function() {
            $(this).toggleClass("flipper")
        })

        var deck = $('#deck').offset();
    $('.card').css({
        'top': deck.top - 51,
        'left': deck.left + 50,
    });

        for ($i=1; $i<5; $i++) {
            if (($i%2)==0) {
            //dealer      
            var card = $(".deck .card").last();


/* ---------------------------------------------------------------------------*/
            var dealerOffset = $('#dealer').offset()
            
            $('.buttonStart').click(function() {                                               

                $('#dealer').append(card);
                
                var btnOffset = $(this).offset(); 

                $('#card');
            
            $('#card').animate({
                'top': dealerOffset.top,
                'left':dealerOffset.left
            }, 1000, function () {
                $('#card').remove();


/* ---------------------------------------------------------------------------*/
            

            card.detach();
            $('#dealer').append(card);
            //-------
            } else {
            //hrac
            var card = $(".deck .card").last();

            

            card.detach();
            $('#player').append(card);
            }
            //-------
        }

</script>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>

</body>
</html>