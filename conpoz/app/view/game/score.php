<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Family Chang</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">

  <!-- Favicons -->
  <link href="/img/favicon.png" rel="icon">
  <link href="/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,700" rel="stylesheet">

  <!-- Bootstrap CSS File -->
  <link href="/lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Libraries CSS Files -->
  <link href="/lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">

  <!-- Main Stylesheet File -->
  <link href="/css/style.css" rel="stylesheet">

  <!-- =======================================================
    Template Name: Instant
    Template URL: https://templatemag.com/instant-bootstrap-personal-template/
    Author: TemplateMag.com
    License: https://templatemag.com/license/
  ======================================================= -->
</head>
<style>
table {
    width:100%;
    height: 100%;
    color: #ffffff;
    text-align: center;
    border-spacing: 3px;
    border-collapse: separate;
    font-size: 60px;
}
tr {
    background-color: #1F4788;
}
td {
    padding:10px;

}
.name {
    width:50%;
}
.game {
    width:25%;
}
.score {
    width:25%;
}
.mGame {
    display: none;
}
.mScore {
    display: none;
}
</style>
<body>
  <table>
      <tr>
          <td class="name p1">張 皓綸</td>
          <td class="game p1"></td>
          <td class="score p1"></td>
      </tr>
      <tr>
          <td class="name p2">陳 旭紳</td>
          <td class="game p2"></td>
          <td class="score p2"></td>
      </tr>
  </table>
  <div class="mGame">
      <select>
          <option value="0">0</option>
          <option value="1">1</option>
          <option value="2">2</option>
          <option value="3">3</option>
          <option value="4">4</option>
          <option value="5">5</option>
          <option value="6">6</option>
          <option value="7">7</option>
          <option value="8">8</option>
      </select>
  </div>
  <div class="mScore">
      <select>
          <option value="0">0</option>
          <option value="15">15</option>
          <option value="30">30</option>
          <option value="40">40</option>
          <option value="60">AD</option>
      </select>
  </div>
  <script src="/lib/jquery/jquery.min.js"></script>
  <script src="/lib/bootstrap/js/bootstrap.min.js"></script>
  <script>
  var p1Game = 0;
  var p2Game = 0;
  var p1Score = 0;
  var p2Score = 0;
      $(function(){
         updateBoard();
         $(document).on('click', '.name', function (e) {
             e.preventDefault();
             var classStr = $(this).attr('class');
             var classArray = classStr.split(' ');
             var player = classArray[1];
             var vScore = player + 'Score';
             var vGame = player + 'Game';
             if (window[vScore] < 30) {
                 window[vScore] += 15;
             } else if (window[vScore] == 30) {
                 window[vScore] += 10;
             } else if ((p1Score + p2Score) < 80) {
                 window[vGame] += 1;
                 scoreReset();
             } else {
                 window[vScore] += 20;
                 if (window[vScore] == 80) {
                     window[vGame] += 1;
                     scoreReset();
                 } else if ((p1Score + p2Score) == 120) {
                     p1Score = 40;
                     p2Score = 40;
                 }
             }
             updateBoard();
         });
         $(document).on('click', '.game', function () {
             var classStr = $(this).attr('class');
             var classArray = classStr.split(' ');
             var player = classArray[1];
             var vGame = player + 'Game';
             $('.mGame select').attr('player', player);
             $('.mGame select').val(window[vGame]);
             $('.mGame').toggle();
         });
         $(document).on('change', '.mGame select', function () {
            var vGame = $(this).attr('player') + 'Game';
            window[vGame] = parseInt($(this).val());
            updateBoard();
            $('.mGame').toggle();
         });
         $(document).on('click', '.score', function () {
             var classStr = $(this).attr('class');
             var classArray = classStr.split(' ');
             var player = classArray[1];
             var vScore = player + 'Score';
             $('.mScore select').attr('player', player);
             $('.mScore select').val(window[vScore]);
             $('.mScore').toggle();
         });
         $(document).on('change', '.mScore select', function () {
            var vScore = $(this).attr('player') + 'Score';
            window[vScore] = parseInt($(this).val());
            updateBoard();
            $('.mScore').toggle();
         });
     });
  function scoreReset () {
      p1Score = 0;
      p2Score = 0;
  }
  function updateBoard () {
      $('.p1.game').text(p1Game);
      $('.p2.game').text(p2Game);
      if (p1Score < 60) {
          $('.p1.score').text(p1Score);
      } else {
          $('.p1.score').text('AD');
      }
      if (p2Score < 60) {
          $('.p2.score').text(p2Score);
      } else {
          $('.p2.score').text('AD');
      }
  }
  </script>
</body>
</html>
