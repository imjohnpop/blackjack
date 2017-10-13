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

</body>
</html>