<?php include 'includes/page-head.php' ?>
<head>
<link href="assets/Quizes/quiz3_game/style.css" rel="stylesheet">
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.5.0/jquery.min.js"></script>
  <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.9/jquery-ui.min.js"></script>
<script>

var correctCards = 0;
$(init);

function init() {

  // Hide the success message
  $('#successMessage').hide();
  $('#successMessage').css({
    left: '580px',
    top: '250px',
    width: 0,
    height: 0
  });

  // Reset the game
  correctCards = 0;
  $('#cardPile').html('');
  $('#cardSlots').html('');

  // Create the pile of shuffled cards
  var numbers = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];
  var terms = ['12', '30', '10', '84', '55', '61', '42', '7', '91', '20'];
//   numbers.sort( function() { return Math.random() - .5 } );

  for (var i = 0; i < 10; i++) {
    $('<div>' + terms[i] + '</div>').data('number', numbers[i]).attr('id', 'card' + numbers[i]).appendTo('#cardPile').draggable({

      stack: '#cardPile div',
      cursor: 'move',
      revert: true
    });
  }

  // Create the card slots
  var words = ['Twelve', 'Thirty', 'Ten', 'EightyFour', 'FiftyFive', 'SixtyOne', 'FortyTwo', 'Seven', 'NintyOne', 'Twenty'];
  for (var i = 1; i <= 10; i++) {
    $('<div>' + words[i - 1] + '</div>').data('number', i).appendTo('#cardSlots').droppable({
      accept: '#cardPile div',
      hoverClass: 'hovered',
      drop: handleCardDrop
    });
  }

}

function handleCardDrop(event, ui) {
  var slotNumber = $(this).data('number');
  var cardNumber = ui.draggable.data('number');

  // If the card was dropped to the correct slot,
  // change the card colour, position it directly
  // on top of the slot, and prevent it being dragged
  // again

  if (slotNumber == cardNumber) {
    ui.draggable.addClass('correct');
    ui.draggable.draggable('disable');
    $(this).droppable('disable');
    ui.draggable.position({ of: $(this), my: 'left right', at: 'left right' });
    ui.draggable.draggable('option', 'revert', false);
    correctCards++;
  }

  // If all the cards have been placed correctly then display a message
  // and reset the cards for another go

  if (correctCards == 10) {
    $('#successMessage').show();
    $('#successMessage').animate({
      left: '380px',
      top: '200px',
      width: '400px',
      height: '125px',
      opacity: 1
    });
  }

}

</script>
<style>
/* #cardSlots div:nth-child(-n+5) {
display: inline-block;
float:left;
} */

#card1 {
  background-image: url('assets/Quizes/quiz3_game/images/balloon1.png');
  background-size: cover;
  background-position: fixed;
  background-repeat: no-repeat;
  position: absolute;
  right: 550px;
  top: 280px;
}

#card2 {
  background-image: url('assets/Quizes/quiz3_game/images/balloon2.png');
  background-size: cover;
  background-position: fixed;
  background-repeat: no-repeat;
  position: absolute;
  right: 400px;
  top: 480px;
}

#card3 {
  background-image: url('assets/Quizes/quiz3_game/images/balloon3.png');
  background-size: cover;
  background-position: fixed;
  background-repeat: no-repeat;
  position: absolute;
  right: 750px;
  top: 480px;
}

#card4 {
  background-image: url('assets/Quizes/quiz3_game/images/balloon4.png');
  background-size: cover;
  background-position: fixed;
  background-repeat: no-repeat;
  position: absolute;
  right: 750px;
  top: 680px;
}

#card5 {
  background-image: url('assets/Quizes/quiz3_game/images/balloon5.png');
  background-size: cover;
  background-position: fixed;
  background-repeat: no-repeat;
  position: absolute;
  right: 400px;
  top: 680px;
}

#card6 {
  background-image: url('assets/Quizes/quiz3_game/images/balloon1.png');
  background-size: cover;
  background-position: fixed;
  background-repeat: no-repeat;
  position: absolute;
  left: 550px;
  top: 280px;
}

#card7 {
  background-image: url('assets/Quizes/quiz3_game/images/balloon3.png');
  background-size: cover;
  background-position: fixed;
  background-repeat: no-repeat;
  position: absolute;
  left: 400px;
  top: 480px;
}

#card8 {
  background-image: url('assets/Quizes/quiz3_game/images/balloon2.png');
  background-size: cover;
  background-position: fixed;
  background-repeat: no-repeat;
  position: absolute;
  left: 750px;
  top: 480px;
}

#card9 {
  background-image: url('assets/Quizes/quiz3_game/images/balloon5.png');
  background-size: cover;
  background-position: fixed;
  background-repeat: no-repeat;
  position: absolute;
  left: 750px;
  top: 680px;
}

#card10 {
  background-image: url('assets/Quizes/quiz3_game/images/balloon4.png');
  background-size: cover;
  background-position: fixed;
  background-repeat: no-repeat;
  position: absolute;
  left: 400px;
  top: 680px;
}

@-webkit-keyframes spaceboots {
  0% {
    -webkit-transform: translate(2px, 1px) rotate(0deg);
  }

  10% {
    -webkit-transform: translate(-1px, -2px) rotate(-1deg);
  }

  20% {
    -webkit-transform: translate(-3px, 0px) rotate(1deg);
  }

  30% {
    -webkit-transform: translate(0px, 2px) rotate(0deg);
  }

  40% {
    -webkit-transform: translate(1px, -1px) rotate(1deg);
  }

  50% {
    -webkit-transform: translate(-1px, 2px) rotate(-1deg);
  }

  60% {
    -webkit-transform: translate(-3px, 1px) rotate(0deg);
  }

  70% {
    -webkit-transform: translate(2px, 1px) rotate(-1deg);
  }

  80% {
    -webkit-transform: translate(-1px, -1px) rotate(1deg);
  }

  90% {
    -webkit-transform: translate(2px, 2px) rotate(0deg);
  }

  100% {
    -webkit-transform: translate(1px, -2px) rotate(-1deg);
  }
}

#card1 {
  -webkit-animation-name: spaceboots;
  -webkit-animation-duration: 1.2s;
  -webkit-transform-origin: 50% 50%;
  -webkit-animation-iteration-count: infinite;
  -webkit-animation-timing-function: linear;
}

#card2 {
  -webkit-animation-name: spaceboots;
  -webkit-animation-duration: 2.2s;
  -webkit-transform-origin: 50% 50%;
  -webkit-animation-iteration-count: infinite;
  -webkit-animation-timing-function: linear;
}

#card3 {
  -webkit-animation-name: spaceboots;
  -webkit-animation-duration: 3.2s;
  -webkit-transform-origin: 50% 50%;
  -webkit-animation-iteration-count: infinite;
  -webkit-animation-timing-function: linear;
}

#card4 {
  -webkit-animation-name: spaceboots;
  -webkit-animation-duration: 2.2s;
  -webkit-transform-origin: 50% 50%;
  -webkit-animation-iteration-count: infinite;
  -webkit-animation-timing-function: linear;
}

#card5 {
  -webkit-animation-name: spaceboots;
  -webkit-animation-duration: 1.2s;
  -webkit-transform-origin: 50% 50%;
  -webkit-animation-iteration-count: infinite;
  -webkit-animation-timing-function: linear;
}

#card6 {
  -webkit-animation-name: spaceboots;
  -webkit-animation-duration: 3.2s;
  -webkit-transform-origin: 50% 50%;
  -webkit-animation-iteration-count: infinite;
  -webkit-animation-timing-function: linear;
}

#card7 {
  -webkit-animation-name: spaceboots;
  -webkit-animation-duration: 1.2s;
  -webkit-transform-origin: 50% 50%;
  -webkit-animation-iteration-count: infinite;
  -webkit-animation-timing-function: linear;
}

#card8 {
  -webkit-animation-name: spaceboots;
  -webkit-animation-duration: 2.2s;
  -webkit-transform-origin: 50% 50%;
  -webkit-animation-iteration-count: infinite;
  -webkit-animation-timing-function: linear;
}

#card9 {
  -webkit-animation-name: spaceboots;
  -webkit-animation-duration: 3.2s;
  -webkit-transform-origin: 50% 50%;
  -webkit-animation-iteration-count: infinite;
  -webkit-animation-timing-function: linear;
}

#card10 {
  -webkit-animation-name: spaceboots;
  -webkit-animation-duration: 1.2s;
  -webkit-transform-origin: 50% 50%;
  -webkit-animation-iteration-count: infinite;
  -webkit-animation-timing-function: linear;
}
#successMessage {
position: absolute;
left: 580px;
top: 250px;
width: 0;
height: 0;
opacity: 0;
background-color: #f5f5f5;
border-radius: 5px;
padding: 20px;
text-align: center;
box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
}

#successMessage h2 {
font-size: 24px;
margin-bottom: 10px;
}

#successMessage button,
#successMessage .btn {
display: inline-block;
padding: 10px 20px;
background-color: #e91e63;
color: white;
font-size: 16px;
text-decoration: none;
border: none;
border-radius: 5px;
cursor: pointer;
margin-right: 10px;
}

#successMessage button:hover,
#successMessage .btn:hover {
background-color: #c2185b;
}

</style>
</head>

<body class="bg">
<div class="container-fluid">
<div class="row justify-content-left align-items-left">
  <div class="col-lg-4 col-md-4 col-sm-4 mb-3 mb-md-0">
    <div class="row">
      <div class="col-11">
        <a class="thumbnail" href="loops">
          <img src="assets/games/match_words/images/backbtn.png" class="img-fluid rounded" alt="..."> </a>
      </div>
      <div class="col-1 d-flex align-items-end">
        <div id="heading" class="text-end">
          <img src="assets/Quizes/quiz3_game/images/Instruction3.png" style="width: 650px; height: 120px;" alt="Heading Image">
        </div>
      </div>
    </div>
  </div>
</div>
</div>


<div id="content">

<div id="cardPile"> </div>
<div id="cardSlots"> </div>

<div id="successMessage">
  <h2>Congratulations!</h2>
  <button onclick="init()">Play Again</button>
  <a class="btn" href="loops">QUIT</a>
</div>

</div>


</body>

</html>