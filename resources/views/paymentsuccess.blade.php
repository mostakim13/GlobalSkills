<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>GSDA</title>
  <link rel="stylesheet" href="{{ asset('common' )}}/style.css">


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
    <div class="content-block">
      <!-- About Us ==== -->
      <div class="text-center" role="alert">
          @if(Auth::user())
       <strong style="color: green">Dear {{ Auth::user()->name }} Your Payment has been succesfully recieved! </strong>
       @endif
      </div>

      <br>


<br>

    <p>You have Successfully Enrolled The Course!!!</p>

    <strong>
      <div class="text-center" role="alert" id="secondsdisplay">

      </div>
  </strong>
  <br>

    <div class="text-center" role="alert">
      If you do not redirect within <strong style="color:red">5</strong> Seconds Please <strong style="color:red">Continue</strong>
    </div>
    <strong>
      <br>
      <img class="mx-auto d-block" src="https://th.bing.com/th/id/R.a463df1f4698fc59c7361cc89efe995c?rik=0tUGCJ%2bOuGIp8Q&pid=ImgRaw&r=0" alt="" height="20" width="20">
    <br><br>
    </strong>
    <form action="https://globalskills.com.bd/user_profile">
      <button class="submit-btn" type="submit">
          Continue
      </button>
  </form>
    {{-- <button class="submit-btn" type="submit" onclick="window.location.href='https://globalskills.com.bd/user_profile';">Continue</button> --}}
  </div>
<!-- partial -->

<script type="text/javascript" src="{{ asset('common' )}}/script.js"></script>
<script>


  var seconds=0;
  function displayseconds()
  {
      seconds+=1;
      document.getElementById("secondsdisplay").innerText="This Page Will Be Redirect After 5 Seconds "+seconds+" Seconds"
  }
  setInterval(displayseconds,1000);
  function redirectpage()
  {
      window.location="https://globalskills.com.bd/user_profile";
  }
  setTimeout('redirectpage()',4000);
  </script>
</body>
