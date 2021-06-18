<?php 
  // include (__DIR__.'/fonctions/bdd.php');
  // $bdd = bdd();
  /* ini_get("open_basedir");
   ini_get("allow_url_include");
   ini_set("allow_url_include", "1");
   phpinfo();*/
   //echo 'error'.ini_get('allow_url_include');
?>

<!DOCTYPE html>
<html lang="fr">
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>EDICApp - Contact</title>
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
      <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:400,300,700">
      <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Kaushan+Script" >
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      <link href="{{ asset('/css/sin.css') }}" rel="stylesheet">
      <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
   </head>
   <body>
      @include("header")
      <div class="container sin-m-t">
         <div class = "row">
            <div class = "col-12">
               <div class = "myform form">
                  <div class ="logo mb-3">
                     <div class ="col-md-12 text-center">
                        <h1>Contactez Nous</h1>
                        <p class="text-center mt-3 w-responsive mx-auto mb-5">Do you have any questions? Please do not hesitate to contact us directly. Our team will come back to you within
                           a matter of hours to help you.
                        </p>
                     </div>
                  </div>
                  <div class ="row">
                     <div class = "col-md-7">
                        <form action="" method="post" name="contact">
                           <div class = "row">
                              <div class="form-group col-md-6">
                                 <label for="exampleInputEmail1" class="">Votre nom</label>
                                 <input type="text" id="name" name="name" class="form-control">
                              </div>
                              <div class="form-group col-md-6">
                                 <label for="email" class="">Votre email</label>
                                 <input type="text" id="email" name="email" class="form-control">
                              </div>
                           </div>
                           <div class="row">
                              <div class="form-group col-md-12">
                                 <label for="subject" class="">Subject</label>
                                 <input type="text" id="subject" name="subject" class="form-control">
                              </div>
                           </div>
                           <div class="row">
                              <div class="form-group col-md-12">
                                 <label for="message">Votre message</label>
                                 <textarea type="text" id="message" name="message" rows="2" class="form-control md-textarea"></textarea>
                              </div>
                           </div>
                           <div class ="row justify-content-center">
                              <div class="col-md-4 text-center  ">
                                 <button type="submit" class=" btn btn-block mybtn btn-primary tx-tfm">envoyez</button>
                              </div>
                           </div>
                        </form>
                     </div>
                     <div class = "col-md-5 text-center">
                           <ul class="list-unstyled mb-0" >
                              <li class = "mt-4">
                                 <i ><img src ="img/marker.svg" width = "30px" height = "30px" /></i> 
                                 <p>Ouagadougou, Rue 94126, Bf</p>
                              </li>
                              <li class="mt-4">
                                 <i ><img src ="img/phone.svg" width = "30px" height = "30px"/></i> 
                                 <p>+ 226 00 00 00 00</p>
                              </li>
                              <li class="mt-4">
                                 <i ><img src ="img/envelope.svg" width = "30px" height = "30px"/></i> 
                                 <p>contact@EDICApp.com</p>
                              </li>
                           </ul>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         @include("footer")
   </body>
</html>