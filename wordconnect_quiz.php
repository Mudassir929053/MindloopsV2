<?php include 'includes/page-head.php' ?>
<link rel="stylesheet" href="assets/games/wordconnect/css/style1.css">
<script src="assets/games/wordconnect/js/code.js"></script>

<body class="greenTheme q-c-dark-secondary body">
    <div id="loading" class="text-center">
        <span>Loading...</span>
    </div>
    <div class="container-fluid">
        <div class="row justify-content-start align-items-center">
            <div class="col-2 mb-md-0">
                <a class="thumbnail" href="loops">
                    <img src="assets/games/match_words/images/backbtn.png" class="img-fluid rounded" alt="...">
                </a>
            </div>
            <div class="col-10 text-center">
                <img src="assets/games/wordconnect/Images/match_heading.png" class="img-fluid">
                <h1 class="text-center">
                    <div id="score" class="badge">Score: 0</div>
                </h1>
            </div>
        </div>
    </div>

    <div class="container">
        <div id="dragQuestion" class="linkingQuestion mt-5">
            <ul id="dragUL">
                <li><img id="ind" src="assets/games/wordconnect/Images/india.png" height="70px">
                    <div id="1-draggable" class="dragElement" draggable="true"><i class="far fa-circle "></i></div>
                </li>
                <li><img src="assets/games/wordconnect/Images/Malaysia.png" height="70px">
                    <div id="2-draggable" class="dragElement" draggable="true"><i class="far fa-circle "></i></div>
                </li>
                <li><img src="assets/games/wordconnect/Images/Bangladesh.png" height="70px">
                    <div id="3-draggable" class="dragElement" draggable="true"><i class="far fa-circle "></i></div>
                </li>
                <li><img src="assets/games/wordconnect/Images/Pakistan.png" height="70px">
                    <div id="4-draggable" class="dragElement" draggable="true"><i class="far fa-circle "></i></div>
                </li>
                <li><img src="assets/games/wordconnect/Images/Nepal.png" height="70px">
                    <div id="5-draggable" class="dragElement" draggable="true"><i class="far fa-circle "></i></div>
                </li>
            </ul>
            <div class="canvasWrapper">
                <canvas id="canvas"></canvas>
                <canvas id="canvasTemp"></canvas>
            </div>
            <ul id="dropUL">
                <li>
                    <div id="2-dropzone" onclick="clearPath(event)" class="dragElement dropElement"> <i class="far fa-circle"></i> </div><img src="assets/games/wordconnect/Images/kathmandu.png" height="70px">
                </li>
                <li>
                    <div id="4-dropzone" onclick="clearPath(event)" class="dragElement dropElement"> <i class="far fa-circle "></i> </div><img src="assets/games/wordconnect/Images/islamabad.png" height="70px">
                </li>
                <li>
                    <div id="5-dropzone" onclick="clearPath(event)" class="dragElement dropElement"> <i class="far fa-circle"></i> </div><img src="assets/games/wordconnect/Images/kuala.png" height="70px">
                </li>
                <li>
                    <div id="7-dropzone" onclick="clearPath(event)" class="dragElement dropElement"> <i class="far fa-circle "></i> </div><img src="assets/games/wordconnect/Images/delhi.png" height="70px">
                </li>
                <li>
                    <div id="11-dropzone" onclick="clearPath(event)" class="dragElement dropElement"> <i class="far fa-circle "></i> </div><img src="assets/games/wordconnect/Images/dhaka.png" height="70px">
                </li>

            </ul>
        </div>

        <div id="container">
            <button class="btn" id="btn1" onClick="Correction()"><img src="assets/games/wordconnect/Images/submit.png" height="50px"></button>

            <!-- <a class="btn" href="match.php" style="margin-top: 10px;"><img src="reset.png" height="60px"></a> -->
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $("#loading").hide();
        })
    </script>
</body>

</html>