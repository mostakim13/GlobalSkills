

 <html>
 <head>
     <meta http-equiv=Content-Type content="text/html; charset=UTF-8">

     <style type="text/css">

         @font-face {
             font-family: myFirstFont;

             src: url('https://globalskills.com.bd/font/ACaslonPro-Italic.otf') format('truetype');;
         }
         @font-face {
             font-family: mySecondFont;
             /*src: url("public/font/MonotypeCorsiva_Regular.ttf");*/
             src: url('https://globalskills.com.bd/font/MonotypeCorsiva_Regular.ttf') format('truetype');;
         }


        span.cls_003{font-family:Arial,serif;font-size:20.9px;color:rgb(214,35,38);font-weight:normal;font-style:normal;text-decoration: none}
        div.cls_003{font-family:Arial,serif;font-size:20.9px;color:rgb(214,35,38);font-weight:normal;font-style:normal;text-decoration: none}
        span.cls_002{font-family:"Shonar Bangla Bold",serif;font-size:45.0px;color:rgb(43,42,41);font-weight:bold;font-style:normal;text-decoration: none}
        div.cls_002{font-family:"Shonar Bangla Bold",serif;font-size:56.0px;color:rgb(43,42,41);font-weight:bold;font-style:normal;text-decoration: none}
        span.cls_004{font-family:myFirstFont;font-size:16.5px;color:rgb(43,42,41);font-weight:normal;font-style:italic;text-decoration: none; font-weight: bold}
        div.cls_004{font-family:myFirstFont;font-size:16.5px;color:rgb(43,42,41);font-weight:normal;font-style:italic;text-decoration: none}
        span.cls_005{font-family:"mySecondFont";font-size:23.0px;color:rgb(43,42,41);font-weight:bold;font-style:italic;text-decoration: none}
        div.cls_005{font-family:"mySecondFont";font-size:23.0px;color:rgb(43,42,41);font-weight:bold;font-style:italic;text-decoration: none}
        span.cls_006{font-family:myFirstFont;font-size:17.0px;color:rgb(43,42,41);font-style:italic;text-decoration: none}
        div.cls_006{font-family:myFirstFont;font-weight:bold;font-size:16.0px;color:rgb(43,42,41);font-weight:normal;font-style:italic;text-decoration: none}
        span.cls_007{font-family:Times,serif;font-size:28.6px;color:rgb(43,42,41);font-weight:normal;font-style:normal;text-decoration: none}
        div.cls_007{font-family:Times,serif;font-size:28.6px;color:rgb(43,42,41);font-weight:normal;font-style:normal;text-decoration: none}
        span.cls_008{font-family:"Calibri",serif;font-size:16.5px;color:rgb(43,42,41);font-weight:normal;font-style:normal;text-decoration: none}
        div.cls_008{font-family:"Calibri",serif;font-size:16.5px;color:rgb(43,42,41);font-weight:normal;font-style:normal;text-decoration: none}
        span.cls_009{font-family:"Calibri Light",serif;font-size:12.7px;color:rgb(43,42,41);font-weight:normal;font-style:normal;text-decoration: none;width: 110px;text-align: center;}
        div.cls_009{font-family:"Calibri Light",serif;font-size:12.7px;color:rgb(43,42,41);font-weight:normal;font-style:normal;text-decoration: none;width: 110px;text-align: center;}
        span.cls_010{font-family:Arial,serif;font-size:10.7px;color:rgb(43,42,41);font-weight:normal;font-style:normal;text-decoration: none}
        div.cls_010{font-family:Arial,serif;font-size:10.7px;color:rgb(43,42,41);font-weight:normal;font-style:normal;text-decoration: none}

        div.cls_005{
         top: 180.52px;
         text-align: center;
         position:relative;
        }
        span.cls_011{font-family:"Monotype Corsiva",serif;font-size:12.0px;color:rgb(43,42,41);font-weight:normal;font-style:italic;text-decoration: none}
        div.cls_011{font-family:"Monotype Corsiva",serif;font-size:12.0px;color:rgb(43,42,41);font-weight:normal;font-style:italic;text-decoration: none}
     </style>
 </head>
 <body>
 <div class="row">


   <div class="col-lg-12">
 <div style="position:absolute;left:50%;margin-left:-420px;top:0px;width:847px;height:595px;overflow:hidden">
 <div style="position:absolute;left:0px;top:0px">
 <img src="{{ public_path('/certificate/certificate_img.jpg') }}" width=841 height=595></div>

 <div style="position:relative;top:105.84px; text-align: center;" class="cls_002"><span class="cls_002">CERTIFICATE</span></div>
 <div style="position:absolute;left:41%;top:173.37px" class="cls_004"><span class="cls_004">We, hereby, confirm that</span></div>

 <div  class="cls_005"><span class="cls_005 text-uppercase">{{$certificate_request->name}} </span></div>
 <div style="position:absolute;left:30%;top:266.12px" class="cls_006"><span class="cls_006">has completed <strong>{{$certificate_request->total_hours}} hours</strong> of the training course of :</span></div>
 <div style="position:relative;top:218.62px; text-align: center;" class="cls_007"><span class="cls_007 text-uppercase"> {{$certificate_request->classroom_course->classroom_course_title}}</span></div>
 <div style="position:relative;text-align:center;top:230.79px" class="cls_008"><span class="cls_008">which completed at Global Skills Development Agency from <strong>{{date('d-m-Y', strtotime($certificate_request->start_date))}}</strong> to <strong>{{date('d-m-Y', strtotime($certificate_request->end_date))}}</strong> </span></div>
 <!--<div style="position:relative;top: 238.15px; text-align:center;" class="cls_008"><span class="cls_008">Total training / contact hours: 30 hours</span></div>-->
 <div style="position:relative;top: 245.38px; text-align:center;" class="cls_008"><span class="cls_008 text-uppercase">Trainer: <span style="font-weight: bold;">{{$trainer->name}} </span></span></div>

 <div style="position:absolute;left:284.50px;top:420.96px;" class="cls_010">
      <span class="cls_010"><img width="90" src="{{ public_path($trainer->signature) }}" alt="Ibrahim Hossain"></span>
  </div>

 <div style="position:absolute;left:269.50px;top:490.96px;border-top: 2px dotted;" class="cls_009">
     <span class="cls_009">Trainer</span>
 </div>


 <div style="position:absolute;left:557.50px;top:390.96px;" class="cls_010">
     <span class="cls_010"><img width="90" src="{{ public_path('/certificate/Ibrahim_Hossain.png') }}" alt="Ibrahim Hossain"></span>
 </div>

 <div style="position:absolute;left:543.39px;top:490.96px;border-top: 2px dotted;" class="cls_009"><span class="cls_009">CEO</span></div>
 <div style="position:absolute;left:185.30px;top:507.28px;width: 270px;text-align: center;" class="cls_009"><span class="cls_009">Global skills development Agency</span></div>
 <div style="position:absolute;left:449.57px;top:507.28px;width: 295px;text-align: center;" class="cls_009"><span class="cls_009">Global skills development Agency</span></div>

 </div>


 <div style="position:absolute;left: 170.06px;top: 550.77px;" class="cls_011"><span class="cls_011">Certificate no: 202101</span></div>
 <!--<div style="position:absolute;right: 455.06px;top: 550.77px;font-weight:bold" class="cls_011"><span class="cls_011">Verification URL:  </span></div>-->

 </div>
 </div>
 </body>
 </html>
