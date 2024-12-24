// Make an AJAX request to fetch the JSON data
// var xhr = new XMLHttpRequest()
// xhr.open('GET', 'demo.php')
// xhr.onload = function () {
//   if (xhr.status === 200) {
//     try {
//       // Parse the JSON data
//       var data = JSON.parse(xhr.responseText)
//       // Assign the data to the 'words' variable
//       var words = data
//       // Call your function to build the crossword puzzle
//       buildCrossword(words)
//     } catch (e) {
//       console.log('Error parsing JSON data')
//     }
//   } else {
//     console.log('Request failed.  Returned status of ' + xhr.status)
//   }
// }
// xhr.send()

// Set global variables
var gridSize = [22, 19] // number of squares wide, number of squares tall
var direction = 'across' // set initial direction to 'across'
var markCorrect = true // indicates ability for answers to be marked correct. will be set to false if "show answers" is clicked
var successShown = false // indicates whether the success modal has been shown
var $clueTooltip = $(
  '<div class="clue-tooltip invisible"><div class="clue-tooltip-arrow"></div><div class="clue-tooltip-text"></div></div>'
).appendTo('.crossword')

// set up the base grid
var $crosswordPuzzle = $('<div class="crossword-puzzle p-4"></div>')
var $table = $('<table class="crossword-grid"></table>')
for (i = 0; i < gridSize[1]; i++) {
  var $row = $('<tr class="grid-row"></tr>')
  for (j = 0; j < gridSize[0]; j++) {
    $square = $('<td class="grid-square"></td>')
    $square.appendTo($row)
  }
  $row.appendTo($table)
  $table.appendTo($crosswordPuzzle)
  $crosswordPuzzle.appendTo('.crossword')
}

// Add the fields to the grid
for (i = 0; i < words.length; i++) {
  var row = words[i].row
  var column = words[i].column
  for (j = 0; j < words[i].answer.length; j++) {
    var $square = $('.grid-row')
      .eq(row - 1)
      .find('.grid-square')
      .eq(column - 1)
    var title =
      words[i].clue + ', letter ' + (j + 1) + ' of ' + words[i].answer.length
    var id =
      (words[i].direction == 'across' ? 'a' : 'd') +
      '-' +
      words[i].number +
      '-' +
      (j + 1)
    if (j == 0 && $square.find('.word-label').length == 0) {
      $('<span class="word-label bg-white text-dark">' + words[i].number + '</span>').appendTo(
        $square
      )
    }
    if ($square.find('input').length == 0) {
      var $input = $(
        '<input type="text" class="letter bg-white text-dark" title="' +
          title +
          '" id="' +
          id +
          '" maxlength="1" />'
      )
      if (words[i].direction == 'across') {
        $input.attr('data-across', words[i].number)
        $input.attr('data-across-clue', words[i].clue)
      } else {
        $input.attr('data-down', words[i].number)
        $input.attr('data-down-clue', words[i].clue)
      }
      $input.data('letter', words[i].answer[j])
      $input.appendTo($square)
      $square.addClass('active')
    } else {
      var $input = $square.find('input')
      $input.attr('title', $input.attr('title') + '; ' + title)
      $input.attr('id', $input.attr('id') + '+' + id)
      if (words[i].direction == 'across') {
        $input.attr('data-across', words[i].number)
        $input.attr('data-across-clue', words[i].clue)
      } else {
        $input.attr('data-down', words[i].number)
        $input.attr('data-down-clue', words[i].clue)
      }
    }
    if (words[i].direction == 'down') {
      row++
    } else {
      column++
    }
  }
}

// Add the clues to the page
var $crosswordClues = $(
  '<div class="crossword-clues text-start col-md-4 col-lg-4 d-flex flex-column"><div class="row flex-grow-1"></div></div>'
)
var $acrossClues = $(
  `<div class="across-clues bg-white col-sm-6 text-dark col-md-12 mb-3 p-0 rounded-4">
  <div class="gra fw-bolder fs-1 rounded-top-4">
  <p ><strong>Across</strong></p>
  </div>
  <ol ></ol></div>`
)
var $downClues = $(
  `<div class="down-clues bg-white col-sm-6 text-dark fw-bold col-md-12 p-0 rounded-4">
  <div class="gra fw-bolder fs-1 rounded-top-4">
  <p ><strong>Down</strong></p>
  </div>
  <ol class="pt-3"></ol></div>`
)
for (var i = 0; words && i < words.length; i++) {
  var $clue = $(
    '<li value="' +
      words[i].number +
      '" data-direction="' +
      words[i].direction +
      '" data-clue="' +
      words[i].number +
      '"><label class="fw-bold" >' +
      words[i].clue +
      ' </label></li>'
  )
  $clue.find('label').attr(
    'for',
    $('[data-' + words[i].direction + '=' + words[i].number + ']')
      .eq(0)
      .attr('id')
  )
  $clue.on('click', function () {
    direction = $(this).data('direction')
  })
  if (words[i].hint && words[i].hint.length > 0) {
    $(
      '<a class="hint" href="' +
        words[i].hint +
        '" target="_blank" title="Hint for ' +
        words[i].number +
        ' ' +
        words[i].direction +
        '">(Hint)</a>'
    ).appendTo($clue.find('label'))
  }
  if (words[i].direction == 'across') {
    $clue.appendTo($acrossClues.find('ol'))
  } else if (words[i].direction == 'down') {
    $clue.appendTo($downClues.find('ol'))
  }
}

$acrossClues.appendTo($crosswordClues.find('.row'))
$downClues.appendTo($crosswordClues.find('.row'))
$crosswordClues.appendTo('.crossword')

// Add the hints, reset, and show answers buttons
var $puzzleButtons = $('<div class="crossword-buttons"></div>')
// var $hintsButton = $('<button class="btn btn-default">Show Hints</button>');
//     $hintsButton.on('click',function(e){
//         e.preventDefault();
//         $('.crossword-clues').toggleClass('show-hints');
//         $(this).text( $(this).text() == 'Show Hints' ? 'Hide Hints' : 'Show Hints' );
//     });
//     $hintsButton.appendTo($puzzleButtons);
var $resetButton = $(
  '<button class="btn btn-sm btn-default btn-danger"><b>Clear Puzzle</b></button>'
)
$resetButton.on('click', function (e) {
  e.preventDefault()
  $('input.letter')
    .val('')
    .parent('.grid-square')
    .removeClass('correct-down correct-across')
  $('.crossword-clues li').removeClass('correct')
  markCorrect = true
})
// $resetButton.appendTo($puzzleButtons)
// var $solveButton = $('<button class="show-answers btn btn-default">Show Answers</button>');
//     $solveButton.on('click',function(e){
//         e.preventDefault();
//         $('input.letter').each(function(){
//             $(this).val($(this).data('letter'));
//         });
//         markCorrect = false;
//     });
//     $solveButton.appendTo($puzzleButtons);
$puzzleButtons.appendTo('.crossword')

// Add the success modal
var $modal = $(
  '<div class="modal fade" id="success-modal" tabindex="-1" role="dialog">\
<div class="modal-dialog" role="document">\
  <div class="modal-content">\
    <div class="modal-header">\
      <h4 class="modal-title">Congratulations!</h4>\
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">\
        <span aria-hidden="true">&times;</span>\
      </button>\
    </div>\
    <div class="modal-body">\
      <p>You have finished the puzzle.</p>\
    </div>\
    <div class="modal-footer">\
      <button type="button" class="btn btn-secondary" data-dismiss="modal">play again</button>\
      <button type="button" class="btn btn-primary">Back To Categories</button>\
    </div>\
  </div>\
</div>\
</div>'
)
$modal.appendTo('body')

// When a square is focused, highlight the other squares in that word and the clue, and show the tooltip
$('input.letter').on('focus', function () {
  var $current = $(this)
  $current.select()
  $current[0].setSelectionRange(0, 10)
  getDirection($current)
  $('[data-' + direction + '=' + $current.data(direction) + ']')
    .parent('.grid-square')
    .addClass('current-word')
  $('.crossword-clues li').removeClass('active')
  $(
    '.crossword-clues li[data-direction=' +
      direction +
      '][data-clue=' +
      $(this).data(direction) +
      ']'
  ).addClass('active')
  $clueTooltip
    .css({
      left: tooltipPosition($current).left + 'px',
      top: tooltipPosition($current).top - 10 + 'px'
    })
    .removeClass('invisible')
    .find('.clue-tooltip-arrow')
    .css('left', tooltipPosition($current).offset + 'px')
})

// When a square is blurred, remove highlight from squares and clue
$('input.letter').on('blur', function () {
  $('.grid-square').removeClass('current-word')
  $('.crossword-clues li').removeClass('active')
  $clueTooltip.addClass('invisible')
})

// handle directional and letter keys in letter inputs
$('input.letter').on('keyup', function (e) {
  var $current = $(this)
  if (e.which == 38) {
    // up arrow moves to square above if it exists
    direction = 'down'
    if (getPrevLetter($current)) {
      getPrevLetter($current).focus()
    }
  } else if (e.which == 40) {
    // down arrow moves to square below if it exists
    direction = 'down'
    if (getNextLetter($current)) {
      getNextLetter($current).focus()
    }
  } else if (e.which == 37) {
    // left arrow moves to square to the left if it exists
    direction = 'across'
    if (getPrevLetter($current)) {
      getPrevLetter($current).focus()
    }
  } else if (e.which == 39) {
    // right arrow moves to square to the right if it exists
    direction = 'across'
    if (getNextLetter($current)) {
      getNextLetter($current).focus()
    }
  } else {
    e.preventDefault()
  }
  if (markCorrect) {
    checkWord($current)
  }
})

// Tab and Shift/Tab move to next and previous words
$('input.letter').on('keydown', function (e) {
  var $current = $(this)
  if (e.which == 9) {
    // tab
    e.preventDefault()
    if (e.shiftKey) {
      // shift/tab
      getPrevWord($current).focus()
    } else {
      getNextWord($current).focus()
    }
  } else if (e.which == 8) {
    // backspace
    e.preventDefault()
    if ($(this).val().length > 0) {
      $(this).val('')
    } else {
      if (getPrevLetter($current)) {
        getPrevLetter($current).focus().val('')
      }
    }
  } else if (
    (e.which >= 48 && e.which <= 90) ||
    (e.which >= 96 && e.which <= 111) ||
    (e.which >= 186 && e.which <= 192) ||
    (e.which >= 219 && e.which <= 222)
  ) {
    // typeable characters move to the next square in the word if it exists
    e.preventDefault()
    $current.val(String.fromCharCode(e.which))
    if (getNextLetter($current)) {
      getNextLetter($current).focus()
    }
  }
  if (markCorrect) {
    checkWord($current)
  }
})

// Check if all letters in selected word are correct
function checkWord ($current) {
  var correct
  var currentWord
  if ($current.is('[data-across]')) {
    correct = 0
    currentWord = $current.data('across')
    $('[data-across=' + currentWord + ']').each(function () {
      if ($(this).val().toLowerCase() == $(this).data('letter').toLowerCase()) {
        correct += 1
      }
    })
    if (correct == $('[data-across=' + currentWord + ']').length) {
      $('[data-across=' + currentWord + ']')
        .parent('.grid-square')
        .addClass('correct-across')
      $(
        '.crossword-clues li[data-direction=across][data-clue=' +
          currentWord +
          ']'
      ).addClass('correct')
    } else {
      $('[data-across=' + currentWord + ']')
        .parent('.grid-square')
        .removeClass('correct-across')
      $(
        '.crossword-clues li[data-direction=across][data-clue=' +
          currentWord +
          ']'
      ).removeClass('correct')
    }
  }
  if ($current.is('[data-down]')) {
    correct = 0
    currentWord = $current.data('down')
    $('[data-down=' + currentWord + ']').each(function () {
      if ($(this).val().toLowerCase() == $(this).data('letter').toLowerCase()) {
        correct += 1
      }
    })
    if (correct == $('[data-down=' + currentWord + ']').length) {
      $('[data-down=' + currentWord + ']')
        .parent('.grid-square')
        .addClass('correct-down')
      $(
        '.crossword-clues li[data-direction=down][data-clue=' +
          currentWord +
          ']'
      ).addClass('correct')
    } else {
      $('[data-down=' + currentWord + ']')
        .parent('.grid-square')
        .removeClass('correct-down')
      $(
        '.crossword-clues li[data-direction=down][data-clue=' +
          currentWord +
          ']'
      ).removeClass('correct')
    }
  }
  if (
    $('.grid-square.active:not([class*=correct])').length == 0 &&
    !successShown
  )// show success modal
// show success modal
$('#success-modal').modal({
  backdrop: 'static', // disable closing modal by clicking outside
  keyboard: false // disable closing modal by pressing Escape key
}).modal('show');

// create button HTML
var buttonHtml = `
  <div class="text-center">
    <button class="btn btn-primary my-3 me-3" type="button" onclick="location.reload();" style="background-color: #EA4335; border-color: #EA4335;">Play Again 🎮</button>
    <a href="crossword.php" class="btn btn-secondary my-3" role="button" style="background-color: #4285F4; border-color: #4285F4;">Go to Crossword 🚀</a>
  </div>
`;

// set modal content to button HTML
$('#success-modal .modal-body').html('<p style="font-size: 1.5rem;">Congratulations, you finished the crossword game! 🎉🎊</p>' + buttonHtml);

// center the modal
$('#success-modal').on('shown.bs.modal', function () {
  var modal = $(this);
  var modalDialog = modal.find('.modal-dialog');
  modalDialog.css('margin-top', Math.max(0, ($(window).height() - modalDialog.height()) / 2));
});

// add background color to modal
$('#success-modal .modal-content').css('background-color', '#FFC107');

// remove modal footer
$('#success-modal .modal-footer').remove();

// remove modal header
$('#success-modal .modal-header').remove();

// add close button
$('#success-modal .modal-content').prepend(`
  <button type="button" class="btn-close position-absolute top-0 end-0 m-3" data-bs-dismiss="modal" aria-label="Close"></button>
`);

// remove white line between modal header and body
$('#success-modal .modal-content').css('border-top', 'none');

// remove white line between modal body and footer
$('#success-modal .modal-content').css('border-bottom', 'none');


}

// Return the input of the first letter of the next word in the clues list
function getNextWord ($current) {
  var length = $('.crossword-clues li').length
  var index = $('.crossword-clues li').index($('.crossword-clues li.active'))
  var nextWord
  if (index < length - 1) {
    $nextWord = $('.crossword-clues li').eq(index + 1)
  } else {
    $nextWord = $('.crossword-clues li').eq(0)
  }
  direction = $nextWord.data('direction')
  return $(
    '[data-' + $nextWord.data('direction') + '=' + $nextWord.data('clue') + ']'
  ).eq(0)
}

// Return the input of the first letter of the previous word in the clues list
function getPrevWord ($current) {
  var length = $('.crossword-clues li').length
  var index = $('.crossword-clues li').index($('.crossword-clues li.active'))
  var prevWord
  if (index > 0) {
    $prevWord = $('.crossword-clues li').eq(index - 1)
  } else {
    $prevWord = $('.crossword-clues li').eq(length - 1)
  }
  direction = $prevWord.data('direction')
  return $(
    '[data-' + $prevWord.data('direction') + '=' + $prevWord.data('clue') + ']'
  ).eq(0)
}

// If there is a letter square before or after the current letter in the current direction, keep global direction the same, otherwise switch global direction
function getDirection ($current) {
  if (getPrevLetter($current) || getNextLetter($current)) {
    direction = direction
  } else {
    direction = direction == 'across' ? 'down' : 'across'
  }
}

// Return the input of the previous letter in the current word if it exists, otherwise return false
function getPrevLetter ($current) {
  var index = $(
    '[data-' + direction + '=' + $current.data(direction) + ']'
  ).index($current)
  if (index > 0) {
    return $('[data-' + direction + '=' + $current.data(direction) + ']').eq(
      index - 1
    )
  } else {
    return false
  }
}

// Return the input of the next letter in the current word if it exists, otherwise return false
function getNextLetter ($current) {
  var length = $(
    '[data-' + direction + '=' + $current.data(direction) + ']'
  ).length
  var index = $(
    '[data-' + direction + '=' + $current.data(direction) + ']'
  ).index($current)
  if (index < length - 1) {
    return $('[data-' + direction + '=' + $current.data(direction) + ']').eq(
      index + 1
    )
  } else {
    return false
  }
}

// Return the top, left, and offset positions for tooltip placement
function tooltipPosition ($current) {
  var left =
    $('[data-' + direction + '=' + $current.data(direction) + ']')
      .eq(0)
      .offset().left - $('.crossword').offset().left
  var top =
    $('[data-' + direction + '=' + $current.data(direction) + ']')
      .eq(0)
      .offset().top - $('.crossword').offset().top
  $clueTooltip
    .find('.clue-tooltip-text')
    .text($current.data(direction + '-clue'))
  var right = left + $clueTooltip.outerWidth()
  var offset = right - $('.crossword-puzzle').outerWidth()
  offset = offset > 0 ? offset : 0
  left = left - offset
  return { left: left, top: top, offset: offset }
}
