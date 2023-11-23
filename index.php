<?php
        // Access the variable from the URL parameter
        if (isset($_GET['variable'])) {
            $variable = urldecode($_GET['variable']);
        }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="description" content="Welcome to the most extraordinary hotel in Boston Massachusetts">
  <meta name="keywords" content="hotel,boston hotel,new england hotel">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="css/style.css">
  <title>AtoZ Insurance Chatbot| Welcome</title>
  <style>
        *{padding:0;margin:0;}

        body{
            font-family:Verdana, Geneva, sans-serif;
            font-size:18px;
            background-color:#CCC;
        }

        .float{
            position:fixed;
            width:60px;
            height:60px;
            bottom:40px;
            left:40px;
            background-color:rgb(255, 191, 0);  
            color:#FFF;
            border-radius:50px;
            text-align:center;
            box-shadow: 2px 2px 3px #999;
        }

        .my-float{
            margin-top:22px;
        }
    </style>
</head>
<body>
  
<script>
     function processVoiceInput() {
        // Use a speech recognition API to get user's voice input
        const recognition = new webkitSpeechRecognition();
        recognition.lang = "en-US"; // Set the language to English or any other supported language
        recognition.onresult = function (event) {
            const voiceInput = event.results[0][0].transcript;
            // Call the Rasa chatbot with the voice input
            window.WebChat.send("/user_uttered " + voiceInput);
        };
        recognition.start();
    }

    function clearChatHistory() {
        var chatContainer = document.querySelector(".rw-messages-container");
        chatContainer.innerHTML = ""; // Clear the chat messages
    }

    window.addEventListener("load", function () {
        let e = document.createElement("script"),
            t = document.head || document.getElementsByTagName("head")[0];
        (e.src = "https://cdn.jsdelivr.net/npm/rasa-webchat@1.x.x/lib/index.js"),
            

            (e.async = true),
            (e.onload = () => {
                window.WebChat.default(
                    {
                        initPayload: '/greet',
                        customData: { language: "en", displayHtml: true },
                        socketUrl: "http://localhost:5005",
                        title: "Rasa_Bot",
                        subtitle: "Say HI and get started!!!",
                    },
                    null
                );

                // Clear chat history after a short delay (500ms)
                setTimeout(clearChatHistory, 500);
            });
        t.insertBefore(e, t.firstChild);

        // Listen for a voice input button click
        const voiceInputButton = document.getElementById("voiceInputButton");
        voiceInputButton.addEventListener("click", processVoiceInput);
    });
  </script>
  <header>
    <nav id="navbar">
        <div class="container">
        <h1 class="logo">
        <?php
            echo "Welcome " . $variable;
        ?>
        </h>
        <h1 class="logo"><a href="index.html"> ...   AtoZ Insurance Chatbot</a></h1>
        <ul>
          <li><a class="current" href="index.html">Home</a></li>
          
          <li><a href="contact.html">Contact</a></li>
          <li><a href="https://www.google.co.in/maps/search/lic/@13.1491653,80.1866664,13.5z?entry=ttu">Location</a></li>
        </ul>
      </div>
    </nav>

    <div id="showcase">
      <div class="container">
        <div class="showcase-content">
          <h1><span class="text-primary">HealthCare</span>Insurance Policies 
          <p class="lead">Find your best and suitable policy</p>
          
        </div>
      </div>
    </div>
  </header>

  <section id="home-info" class="bg-dark">
    <div class="info-img"></div>
    <div class="info-content">
      <h2><span class="text-primary">ANYBODY CAN </span> — INSURE POLICIES.</h2>
      <p>
        <br>
        Hello, we’re AtoZ Chatbot Insurance, your new premium policy service. We know you’re always busy. No time for to worry about money. So let us take care of that, we’re really good at it, we promise!
        <br>
      </p>
      
    </div>
  </section>

    <section id="features">
    <div class="box bg-light">
      <i class='fas fa-file-alt' style='font-size:36px'></i>
      <h3>Policy Plans</h3>
      <p class="text">Explore the available policies </p>
      
    </div>
    <div class="box bg-primary">
      <i class="fa fa-address-book" style="font-size:36px"></i>
        <h3>Enrollment System</h3>
        <p>Easy and simple way to apply for a policy</p>
        
    </div>
    <div class="box bg-light">
      <i class='far fa-hand-point-up' style='font-size:36px'></i>
        <h3>Recommendation system</h3>
        <p>The chatbot recommends you the best policy with a suitable premium </p>
        
       
    </div>
    </section>
    <a href="voice.html" class="float" >
    <i style="padding-top: 13px; font-size: 36px; " class="fa fa-microphone" ></i>
    </a>
  <div class="clr"></div>

  <footer id="main-footer">
    <p>AtoZ Insurance Chatbot, All Rights Reserved</p>
  </footer>

  <style>
    .rw-conversation-container .rw-header { background-color: rgb(27, 168, 168); }
    .rw-conversation-container .rw-messages-container .rw-message .rw-client { background-color: rgb(27, 168, 168); }
    .rw-launcher { background-color: rgb(27, 168, 168); }
</style>

</body>
</html>

