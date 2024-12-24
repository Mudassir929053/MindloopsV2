<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Jigsaw Puzzle</title>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.14.0/css/all.css" integrity="sha384-HzLeBuhoNPvSl5KYnjx0BT+WB0QEEqLprO+NBkkk5gbc67FTaL7XIGa2w1L0Xbgc" crossorigin="anonymous">
  <!-- <link rel="stylesheet" href="style.css"> -->
  <!-- <link rel="stylesheet" href="https://codepen.io/clementmartin17/pen/254651da9d3f8b04e103aad5645ca919.css"> -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <!-- Favicons -->

  <script src="https://cdnjs.cloudflare.com/ajax/libs/tween.js/18.6.4/tween.umd.js"></script>
  
  <?php include 'includes/page-head.php' ?>
  <style>
    .body {
      background-image: url("<?= BASE_URL ?>/assets/images/homepage/Asset19.png");
      background-size: 100% 100%;
      background-repeat: no-repeat;
      overflow-y: auto;
      background-attachment: fixed;
    }

    .popup-content {
      background-image: url('<?= BASE_URL ?>/assets/images/homepage/popup.png');
      background-size: contain;
      background-repeat: no-repeat;
      background-position: center;
      padding: 12rem;
      border-radius: 5px;
    }


    .linkingQuestion {
      display: flex;
      font-size: 20px;
      position: relative;
      justify-content: center;
    }

    #dragUL {
      color: #F49E19;
    }

    #dropUL i {
      pointer-events: none;
    }

    #dragUL li div {
      margin-left: 10px;
      float: right;
    }

    #dropUL li div {
      margin-right: 10px;
      float: left;
    }

    i {
      margin-top: 20px;
    }

    li {
      font-size: 30px;
      font-weight: bold;
    }

    #container {
      text-align: center;
    }

    #heading {
      display: block;
      margin-left: 8%;
      margin-right: auto;
      width: 100%;
      padding: 15px;
      transform: translate(-0%, -5%);
      text-align: right;
    }

    #app1 {
      width: 100%;
      height: 65vh;
      display: flex;
      justify-content: flex-end;
      /* apply flex-direction: column for screens with width less than 768px */
    }

    @media screen and (max-width: 768px) {
      #app1 {
        justify-content: center;
        flex-direction: column;
        height: auto;
      }
    }



    /* #app canvas img{
    border: 5px solid green;
} */
    button {
      display: inline-block;
      width: auto;
      height: auto;
      margin: 0 5px 0 0;
      padding: 10px 20px;
      border-radius: 3px;
      cursor: pointer;
      border: 1px solid rgba(0, 0, 0, .5);
      color: #000;
      font-size: 20px;
      background: rgb(235, 235, 235);
      transition: background-color ease-in .3s;
    }

    .level-btn {
      /* background-color: orange; */
      color: white;
      font-weight: bold;
      border: none;
      padding: 10px 20px;
      font-size: 1.5rem;
      border-radius: 20px;
      margin: 10px;
      cursor: pointer;
      box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.3);
      transition: all 0.3s ease;
    }

    .level-btn:hover {
      transform: scale(1.1);
    }

    body {
      overflow-y: hidden;
      overflow-x: hidden;
    }

    canvas {
      filter: brightness(90%);
    }





    /* Style the buttons inside the modal */


    /* Style the text inside the modal */


    /* Responsive */

    .flex-contianer {
      display: flex;
      justify-content: space-between;
    }

    .butt {
      margin-left: 65%;
    }

    .button-container {
      display: flex;
      justify-content: center;
    }

    #ok-btn {
      background-color: #fd1364;
      color: white;
      font-weight: bold;
      border: none;
      padding: 10px 45px;
      /* increased button size */
      font-size: 1.5rem;
      /* increased font size */
      border-radius: 20px;
      margin: 10px;
      cursor: pointer;
      box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.3);
      transition: all 0.3s ease;
    }

    #ok-btn:hover {
      transform: scale(1.1);
      background-color: #FCEADE;
      color: #F8A5C2;
    }

    #popup {
      position: fixed;
      top: 0;
      left: 0;
      right: 0;
      bottom: 0;
      display: flex;
      justify-content: center;
      align-items: center;
    }



    /* Add media queries for smaller screens */
    @media only screen and (max-width: 768px) {
      .popup-content {
        padding: 6rem;
      }
    }

    @media only screen and (max-width: 480px) {
      .popup-content {
        padding: 3rem;
      }
    }


    h2 {
      margin-top: 0;
    }

    .button {
      display: flex;
      justify-content: center;
    }

    #play-again-btn {
      background-color: #fd1364;
      color: white;
      font-weight: bold;
      border: none;
      padding: 10px 45px;
      /* increased button size */
      font-size: 1.5rem;
      /* increased font size */
      border-radius: 20px;
      margin: 10px;
      cursor: pointer;
      box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.3);
      transition: all 0.3s ease;
    }

    #play-again-btn1 {

      color: white;
      font-weight: bold;
      border: none;
      padding: 10px 45px;
      /* increased button size */
      font-size: 1.5rem;
      /* increased font size */
      border-radius: 20px;
      margin: 10px;
      cursor: pointer;
      box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.3);
      transition: all 0.3s ease;
    }

    #play-again-btn:hover {
      transform: scale(1.1);
      background-color: #FCEADE;
      color: #F8A5C2;
    }

    #myModal {
      position: fixed;
      top: 0;
      left: 0;
      right: 0;
      bottom: 0;
      display: flex;
      justify-content: center;
      /* Center the modal horizontally */
      align-items: center;

    }

    .pop-content {
      background-image: url('<?= BASE_URL ?>/assets/images/homepage/popup.png');
      background-size: contain;
      /* cover the background image */
      background-repeat: no-repeat;
      background-position: center;
      padding: 12rem;
      /* decreased container size */
      border-radius: 5px;
      /* text-align: center; */

    }

    h2 {
      margin-top: 0;
    }
  </style>
</head>

<body class="body text-dark">
  <!-- ======= Header ======= -->
  <?php $ji_id = $_GET['id']; ?>
  <?php $category_id = $_GET['category_id']; ?>
  <div class="flex-contianer p-5">
    <div class="left-btn">
      <a href="jigsaw_images?category_id=<?= $category_id; ?>" class="">
        <img src="<?= BASE_URL ?>/assets/images/homepage/Asset61.png">
      </a>
    </div>
    <!-- <div class="right-btn">
      <img src="../../assets/Puzzle/Asset62.png">
    </div> -->
  </div>
  <div id="app" class="app">
    <div class="container-fluid">
      <div class="row">
        <!-- <div class="col-md-3">&nbsp;</div> -->
        <div class="col-md-8">
          <div id="app1"></div>
        </div>
        <div class="col-md-3 position-relative">
          <div class="position-absolute top-50 translate-middle-y">
            <div class="row ">
              <div class="col-lg-6 ">
                <select class="level-btn btn btn-info  px-4" name="pickimage">
                  <?php

                  $sql = "SELECT * FROM 
                    `jigsaw_image` WHERE ji_id = $ji_id";
                  $result = $mysqli->query($sql);
                  ?>
                  <?php
                  if ($result && $result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                  ?>
                      <option value="<?= BASE_URL ?>assets/uploads/jigsaw_images/<?= $row['ji_image'] ?>" selected>
                        <?= $row['ji_name'] ?>
                      </option>
                  <?php
                    }
                  } else {
                    echo "<p>No Images found.</p>";
                  }
                  ?>
                </select>
              </div>
              <div class="col-lg-6">
                <select class="level-btn btn btn-info me-2 px-4" name="boardconfig">
                  <option value="3x3" selected>Select Level</option>
                  <option value="4x4">4 x 4</option>
                  <option value="5x5">5 x 5</option>
                  <option value="6x6">6 x 6</option>
                  <option value="7x7">7 x 7</option>
                  <option value="8x8">8 x 8</option>
                  <!-- <option value="7x5">7 x 5</option> -->
                </select>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
    <div class="row">
      <div class="col-lg-5"></div>
      <div class="col-lg-4">
      <button class="level-btn btn btn-danger me-2 px-5" name="shufflepuzzle">Play</button>
      <button class="level-btn btn btn-info me-2 px-5" name="resetpuzzle">Reset</button>
                </div>
    </div>
  </div>

  </div>
  </div>
  <!-- <div id="myModal" style="display: none;">
  
    <div class="modal-content">
     
      <h3>JIGSAW PUZZLE GAME</h3>
      <div class="button">
       
        <button id="play-again-btn" type="button" class="btn btn-primary button1">OK</button>
      </div>
    </div>
  </div> -->

  <div id="myModal" style="display: none;">
    <div class="pop-content">
      <h3 class="text-center">Congratulation ! <br>You did a great job.</h3>
      <div class="button">
        <!-- <button id="ok-btn">OK</button>  -->
        <button id="play-again-btn" type="button" class="btn btn-info">Play again</button>
        <button id="play-again-btn1" type="button" class="btn btn-primary">Quit</button>
      </div>
    </div>
  </div>

  <div id="popup">
    <div class="popup-content">
      <h3>Complete the picture by <br>putting the pieces together</h3>
      <div class="button-container">
        <!-- <button id="ok-btn">OK</button>  -->
        <button id="ok-btn" type="button" class="btn btn-primary mt-5">OK</button>
      </div>
    </div>
  </div>
  <!-- Modal -->
</body>
<script>
  window.onload = function() {
    var popup = document.getElementById("popup");
    var okBtn = document.getElementById("ok-btn");
    okBtn.onclick = function() {
      popup.style.display = "none";
    }
  }

  const button = document.getElementById('play-again-btn1');
  const button1 = document.getElementById('play-again-btn');

  // Add an event listener to the button that redirects to a different page when clicked
  button.addEventListener('click', () => {
    location.href = "jigsaw_images?category_id=<?= $category_id; ?>";
  });
  button1.addEventListener('click', () => {
    location.reload();
  });
</script>
<script>
  let firstLoad = true;
  const FPS = 30;
  const pickimage = document.querySelector('select[name=pickimage]')
  let IMAGE = pickimage.value
  let image = null
  let ROWS = 3
  let COLS = 3
  let RADIUS = 30
  let left_var = Math.floor(screen.width*0.36)
  let OFFSETL = left_var
  let OFFSETT = 10
  let board = 2
  let piece = 1
  console.log(screen.width);
  let bg_image = 'back1.png';
  let width_max = Math.floor(screen.width*0.25)
  
  const MAX_WIDTH = width_max
  const MAX_HEIGHT = width_max
  const app = document.querySelector('#app1')
  const canvas = document.createElement('canvas')
  app.appendChild(canvas)
  const ctx = canvas.getContext('2d')
  // UI -- begin
  let isMouseInside = false
  let isPieceMoving = false
  let mousePos = {
    x: 0,
    y: 0
  }
  let initialPos = {
    x: 0,
    y: 0
  }
  const resizeCanvas = () => {
    const {
      width,
      height
    } = app.getBoundingClientRect()
    canvas.width = width * 0.9
    canvas.height = height * 0.9
    if (board) {
      board.resize(canvas.width, canvas.height)
    }
  }
  canvas.addEventListener('pointerenter', (e) => {
    isMouseInside = true
  })
  canvas.addEventListener('pointerleave', (e) => {
    isMouseInside = false
    isPieceMoving = false
    piece = null
  })
  canvas.addEventListener('pointermove', (e) => {
    if (!isPieceMoving && isMouseInside && board) {
      piece = board.pieceByPos(ctx, e.offsetX, e.offsetY)
      board.unhoverPieces()
      if (piece) piece.hover()
    }
    if (isPieceMoving && piece) {
      const canvasRect = canvas.getBoundingClientRect()
      const canvasScaleX = canvas.width / canvasRect.width
      const canvasScaleY = canvas.height / canvasRect.height
      piece.x += (e.offsetX - mousePos.x) * canvasScaleX
      piece.y += (e.offsetY - mousePos.y) * canvasScaleY
    }
    mousePos.x = e.offsetX
    mousePos.y = e.offsetY
  })
  canvas.addEventListener('pointerdown', (e) => {
    if (piece) {
      isPieceMoving = true
      initialPos.x = piece.x
      initialPos.y = piece.y
    }
  })
  canvas.addEventListener('pointerup', (e) => {
    isPieceMoving = false
    if (piece) {
      // is the piece near its place?
      if (piece.isNearToPlace()) {
        let localPiece = piece
        let piecePos = {
          x: localPiece.x,
          y: localPiece.y
        }
        let tween = new TWEEN.Tween(piecePos)
          .to({
            x: 0,
            y: 0
          }, 250)
          .easing(TWEEN.Easing.Quartic.In)
          .onUpdate(() => {
            localPiece.z = 10
            localPiece.x = piecePos.x
            localPiece.y = piecePos.y
          })
          .onComplete(() => {
            localPiece.z = 0;
            if (board.check() && !firstLoad) {
              // Show the modal
              $('#myModal').show();
              // Handle the play again button click event
              $('#play-again-btn').click(() => {
                // Hide the modal
                // $('#myModal').modal('hide');
                $('#myModal').hide();
                // Reset the board or start a new game
                board.pieces = [];
              });
              // Handle the quit button click event
              $('#quit-btn').click(() => {
                // Hide the modal
                $('#myModal').hide();
                // Quit the game or redirect to a different page
              });
            }
          })
          .start()
      } else {
        // reset the piece to its initial position
        let localPiece = piece
        let piecePos = {
          x: localPiece.x,
          y: localPiece.y
        }
        let tween = new TWEEN.Tween(piecePos)
          .to({
            x: initialPos.x,
            y: initialPos.y
          }, 250)
          .easing(TWEEN.Easing.Quartic.In)
          .onUpdate(() => {
            localPiece.z = 10
            localPiece.x = piecePos.x
            localPiece.y = piecePos.y
          })
          .onComplete(() => {
            localPiece.z = 0
          })
          .start()
      }
    }
    piece = null
  })
  pickimage.addEventListener('change', (e) => {
    IMAGE = e.target.value
    reset()
  })
  let selectedBgImage = '<?= BASE_URL ?>/assets/images/homepage/back1.png';

  const boardconfig = document.querySelector('select[name=boardconfig]');

  boardconfig.addEventListener('change', (e) => {
    const dims = e.target.value.split('x');
    ROWS = dims[0];
    COLS = dims[1];

    if (COLS * ROWS > 5) {
      RADIUS = 15;
    } else if (COLS * ROWS > 12) {
      RADIUS = 20;
    } else if (COLS * ROWS > 8) {
      RADIUS = 25;
    } else {
      RADIUS = 30;
    }

    // Update selectedBgImage based on user selection
    switch (e.target.value) {
      case '3x3':
        selectedBgImage = '<?= BASE_URL ?>/assets/images/homepage/back1.png';
        break;
      case '4x4':
        selectedBgImage = '<?= BASE_URL ?>/assets/images/homepage/backbg2.png';
        break;
      case '5x5':
        selectedBgImage = '<?= BASE_URL ?>/assets/images/homepage/backbg3.png';
        break;
      case '6x6':
        selectedBgImage = '<?= BASE_URL ?>/assets/images/homepage/backbg4.png';
        break;
      case '7x7':
        selectedBgImage = '<?= BASE_URL ?>/assets/images/homepage/backbg5.png';
        break;
      case '8x8':
        selectedBgImage = '<?= BASE_URL ?>/assets/images/homepage/backbg6.png';
        break;
        // Add more cases as needed for other values
      default:
        selectedBgImage = '<?= BASE_URL ?>/assets/images/homepage/back7.png';
    }

    reset();
  });
  window.addEventListener('resize', () => {
    reset();
  })
  const resetpuzzle = document.querySelector('button[name=resetpuzzle]')
  resetpuzzle.addEventListener('click', (e) => {
    reset();
    firstLoad = true;
  })
  const shufflepuzzle = document.querySelector('button[name=shufflepuzzle]');
  shufflepuzzle.addEventListener('click', (e) => {
    const localPadding = 450;
    const localLeft = -325;
    firstLoad = false;
    const localRight = canvas.width - 1500;
    const localTop = localPadding;
    const localBottom = canvas.height - 400;
    let randomPosition = [];
    let currentPosition = [];
    for (let i = 0; i < board.pieces.length; i++) {
      let piecePos = board.posByIndex(i);
      let localX = piecePos.x * board.pw;
      let localY = piecePos.y * board.ph;
      if (i % 5 == 0) { // put even-indexed pieces on the left
        randomPosition.push({
          x: localLeft - localX + Math.random() * (localLeft - localRight - board.pw),
          // y: localTop - localY + Math.random() * (localBottom - localTop - board.ph)
        });
      } else { // put odd-indexed pieces on the right
        randomPosition.push({
          x: localRight - localX + Math.random() * (localLeft - localRight - board.pw),
          y: localTop - localY + Math.random() * (localBottom - localTop - board.ph)
        });
      }
      currentPosition.push({
        x: 0,
        y: 0
      });
    }
    for (let i = 0; i < board.pieces.length; i++) {
      let piece = board.pieces[i];
      new TWEEN.Tween(currentPosition[i])
        .to(randomPosition[i], 1000)
        .easing(TWEEN.Easing.Quadratic.Out)
        .onUpdate(() => {
          piece.x = currentPosition[i].x;
          piece.y = currentPosition[i].y;
          piece.z = i + 30;
        })
        .onComplete(() => {
          piece.z = 0;
        })
        .start();
    }
  });
  // UI -- end
  let deltaTime = 0
  let fpsDeltaTime = 0
  let fpsDeltaLimit = 1000 / FPS
  
  
  const render = (time) => {
    deltaTime = time - deltaTime
    fpsDeltaTime += deltaTime
    if (fpsDeltaTime >= fpsDeltaLimit) {
      TWEEN.update(time)
      if (board) board.render(ctx)
      fpsDeltaTime = 0
    }
    deltaTime = time
    requestAnimationFrame(render)
  }
  // init -- begin
  const reset = () => {
    image = new Image()
    image.src = IMAGE
    image.addEventListener('load', (e) => {
      let ratio = image.width / image.height
      let width = image.width
      let height = image.height
      if (image.width > image.height) {
        width = width > MAX_WIDTH ? MAX_WIDTH : width
        height = width / ratio
      } else {
        height = height > MAX_HEIGHT ? MAX_HEIGHT : height
        width = height * ratio
      }
      // adjust the canvas and image size based on viewport size
      const maxWidth = window.innerWidth * 1.9;
      const maxHeight = window.innerHeight * 1.9;
      if (width > maxWidth) {
        height *= maxWidth / width;
        width = maxWidth;
      }
      if (height > maxHeight) {
        width *= maxHeight / height;
        height = maxHeight;
      }
      image.width = 500;
      image.height = 550;
      canvas.width = app.clientWidth;
      canvas.height = app.clientHeight;
      if (canvas.width < 500) {
        OFFSETL = 20;
      }
      board = new Board(ROWS, COLS, image, OFFSETL, OFFSETT, RADIUS)
    })
  }
  const init = (event) => {
    reset()
    render(0)
  }
  
  // init -- end
  // window resize -- begin
  const resize = (event) => {
    const maxWidth = window.innerWidth * 0.8;
    const maxHeight = window.innerHeight * 0.8;
    let ratio = image.width / image.height
    let width = image.width
    let height = image.height
    if (width > maxWidth) {
      height *= maxWidth / width;
      width = maxWidth;
    }
    if (height > maxHeight) {
      width *= maxHeight / height;
      height = maxHeight;
    }
    image.width = width;
    image.height = height;
    canvas.width = app.clientWidth;
    canvas.height = app.clientHeight;
    if (canvas.width < 500) {
      OFFSETL = 20;
    }
    board = new Board(ROWS, COLS, image, OFFSETL, OFFSETT, RADIUS)
  }
  // delay processing of window resize
  let resizeTimeout = null
  window.addEventListener('resize', (e) => {
    clearTimeout(resizeTimeout)
    resizeTimeout = setTimeout(() => {
      resize(e)
    }, 100)
  })
  // window resize -- end
  // classes -- begin
  //

  class Piece {
    constructor(bx, by, width, height) {
      this.x = 0
      this.y = 0
      this.z = 0
      this.w = width
      this.h = height
      this.img = null
      this.mask = null
      this.bx = bx
      this.by = by
      this.isHover = false
      this.index = 0
    }
    isNearToPlace() {
      const distance = Math.sqrt(Math.pow(this.x, 2) + Math.pow(this.y, 2))
      if (distance < 50)
        return true
      return false
    }
    getMask() {
      return this.mask(this.x, this.y)
    }
    set image(v) {
      this.img = v
    }
    get image() {
      return this.img
    }
    hover() {
      this.isHover = true
      this.z = 10
    }
    unhover() {
      this.isHover = false
      this.z = 0
    }
    render(ctx, bg_image) {
      ctx.save()
      let mask = this.getMask()
      ctx.strokeStyle = 'black'
      ctx.lineWidth = 5
      ctx.lineCap = 'round'
      ctx.stroke(mask)
      ctx.clip(mask, 'nonzero')
      ctx.drawImage(this.image,
        this.x + this.bx,
        this.y + this.by,
        this.image.width, this.image.height)
      if (this.isHover) {
        ctx.fillStyle = 'rgba(255, 230, 0, .25)'
        ctx.fill(mask)
      }
      ctx.restore()
    }
  }
  // board class start
  class Board {
    constructor(rows, cols, image, x = 0, y = 0, radius = 20) {
      this.r = rows
      this.c = cols
      this.x = x
      this.y = y
      this.image = image
      this.pw = image.width / cols
      this.ph = image.height / rows
      this.pieces = []
      this.rad = radius
      for (let y = 0; y < this.r; y++) {
        for (let x = 0; x < this.c; x++) {
          let piece = new Piece(this.x, this.y, this.pw, this.ph)
          piece.image = this.image
          piece.index = this.index(x, y)
          piece.mask = this.mask(x, y, this.radius)
          this.pieces.push(piece)
        }
      }
    }
    get piecesByZAsc() {
      return [...this.pieces].sort((a, b) => a.z - b.z)
    }
    get piecesByZDesc() {
      return [...this.pieces].sort((a, b) => b.z - a.z)
    }
    get radius() {
      return this.rad
    }
    set radius(v) {
      this.rad = v
      this.updateMasks()
    }
    index(x, y) {
      return x + y * this.c
    }
    posByIndex(index) {
      return {
        x: index % this.c,
        y: Math.floor(index / this.c)
      }
    }
    check() {
      let counter = 0
      for (let i = 0; i < this.pieces.length; i++) {
        if (this.pieces[i].index != counter ||
          this.pieces[i].x != 0 ||
          this.pieces[i].y != 0) return false
        counter++
      }
      return true
    }
    updateMasks() {
      for (let y = 0; y < this.r; y++) {
        for (let x = 0; x < this.c; x++) {
          this.pieces[this.index(x, y)].mask = this.mask(x, y, this.radius)
        }
      }
    }
    unhoverPieces() {
      for (let i = 0; i < this.pieces.length; i++)
        this.pieces[i].unhover()
    }
    pieceByPos(ctx, x, y) {
      const pieces = this.piecesByZDesc
      for (let i = 0; i < pieces.length; i++)
        if (ctx.isPointInPath(pieces[i].getMask(), x, y, 'nonzero'))
          return pieces[i]
      return null
    }

    render(ctx) {
      ctx.clearRect(0, 0, ctx.canvas.width, ctx.canvas.height);

      // Draw the background image
      const bgImage = new Image();
      bgImage.src = selectedBgImage;
      ctx.drawImage(bgImage, this.x, this.y, this.image.width, this.image.height);

      // Render the pieces
      const pieces = this.piecesByZAsc;
      for (let i = 0; i < pieces.length; i++) {
        pieces[i].render(ctx);
      }
    }
    mask(x, y, radius) {
      return (px, py) => {
        let m = new Path2D()
        m.moveTo(px + this.x + x * this.pw, py + this.y + y * this.ph)
        // top
        if (y == 0) {
          m.lineTo(px + this.x + (x + 1) * this.pw, py + this.y + y * this.ph)
        } else {
          m.lineTo(px + this.x + (x + .5) * this.pw - radius, py + this.y + y * this.ph)
          m.arc(px + this.x + (x + .5) * this.pw, py + this.y + y * this.ph, radius, Math.PI, 0, true)
          m.lineTo(px + this.x + (x + 1) * this.pw, py + this.y + y * this.ph)
        }
        // right
        if (x == this.c - 1) {
          m.lineTo(px + this.x + (x + 1) * this.pw, py + this.y + (y + 1) * this.ph)
        } else {
          m.lineTo(px + this.x + (x + 1) * this.pw, py + this.y + (y + .5) * this.ph - radius)
          m.arc(px + this.x + (x + 1) * this.pw, py + this.y + (y + .5) * this.ph, radius, -Math.PI / 2, Math.PI / 2, false)
          m.lineTo(px + this.x + (x + 1) * this.pw, py + this.y + (y + 1) * this.ph)
        }
        // bottom
        if (y == this.r - 1) {
          m.lineTo(px + this.x + x * this.pw, py + this.y + (y + 1) * this.ph)
        } else {
          m.lineTo(px + this.x + (x + .5) * this.pw + radius, py + this.y + (y + 1) * this.ph)
          m.arc(px + this.x + (x + .5) * this.pw, py + this.y + (y + 1) * this.ph, radius, 0, Math.PI, false)
          m.lineTo(px + this.x + x * this.pw, py + this.y + (y + 1) * this.ph)
        }
        // left
        if (x == 0) {
          m.lineTo(px + this.x + x * this.pw, py + this.y + y * this.ph)
        } else {
          m.lineTo(px + this.x + x * this.pw, py + this.y + (y + .5) * this.ph + radius)
          m.arc(px + this.x + x * this.pw, py + this.y + (y + .5) * this.ph, radius, Math.PI / 2, -Math.PI / 2, true)
          m.lineTo(px + this.x + x * this.pw, py + this.y + y * this.ph)
        }
        return m
      }
    }

  }
   // board class end
  
  document.addEventListener('DOMContentLoaded', init)
// document.addEventListener('load', init)
// init(event);
</script>

</html>