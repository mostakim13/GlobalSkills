<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>CodePen - Congrats confetti</title>
  <link rel="stylesheet" href="{{asset('custom/style.css')}}">


</head>
<body>
<!-- partial:index.partial.html -->
<div class="js-container container" style="top:0px !important;"></div>

  <div style="text-align:center;margin-top:30px;position:  fixed;width:100%;height:100%;top:0px;left:0px;">
    <div class="checkmark-circle">
      <div class="background"></div>
      <div class="checkmark draw"></div>
    </div>
    <h1>Congratulations!</h1>
    <p>You have Successfully Enrolled The Course!!!</p>
    <button class="submit-btn" type="submit" onclick="alert('🥺🥺🥺🥺🥺\n Oh no you didn\'t!!!!!!!');">Continue</button>
  </div>
<!-- partial -->
  <script  src="{{asset('custom/script.js')}}"></script>

</body>
</html>
