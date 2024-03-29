<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com"/>
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin/>
    <link href="https://fonts.googleapis.com/css2?family=Press+Start+2P&display=swap" rel="stylesheet"/>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <title>porfolio</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/howler/2.0.4/howler.js"></script>
    <script>

        function hide(hide, show = ''){
            document.getElementById(hide).classList.remove("show");
            document.getElementById(hide).classList.add("hidden");

            document.getElementById(show).classList.add("show");
            document.getElementById(show).classList.remove("hidden");
        }





    </script>
</head>

<body class="bg-black m-0 p-0 min-h-screen min-w-screen overflow-hidden ">


<div class="container flex justify-center items-center h-screen">

    <div id="menu" class="show w-screen  absolute top-0 left-0 right-0 bottom-0 bg-black flex flex-col items-center place-content-center h-screen   z-50 p-10">


        <h2 onclick="hide('menu', 'WelcomMessage')" class="text-white text-4xl text hover:text-green-500 mb-4 ">START</h2>
        <h2 onclick="hide('menu', 'contactForm')" class="text-white text-4xl text hover:text-green-500 mb-4">CONTACT</h2>
        <h2 onclick="hide('menu', 'help')" class="text-white text-4xl text hover:text-green-500 mb-4">HELP</h2>


        <div class="text-black absolute  bottom-0 right-0 m-5">
            @if(Session::has('message'))
                <p class="alert alert-info pixel-border px-2">{{ Session::get('message') }}</p>
            @endif
        </div>
    </div>

    <div>
        <div id="WelcomMessage" class="hidden absolute z-10 bottom-0 left-0 m-10 ">

            <section class="pixel-border w-max z-20 relative  h-max -top-10  left-40">
                <h1 class=" px-2 text-xl">welkom</h1>
            </section>
            <section class="pixel-border z-10  w-full p-5 ">
                <p>
                    Welkom bij mijn portfolio game! Hier kun je meer te weten komen over mijn vaardigheden, projecten en
                    meer.
                    Wanneer je door me website loopt kom je meerdere huizen tegen. met verschillende kleuren daken elk
                    dak
                    heeft een andere betekenis.
                    blauw staat voor persoonlijke informatie, groen staat voor mijn skills en doellen. en rood voor mijn
                    projecten die ik extra wil uitlichten.

                </p> <br>

                <p>
                    je snel naar mijn Github wilt gaan, kun je klikken op deze link: <br> <a class="text-blue-600" target="_blank" href="https://github.com/frogcom/">github.com/frogydev</a>.<br>
                    Hier vind je mijn
                    code, van een hoop projecten waar ik aan gewerkt heb</p>
                <p><br>
                    Ik hoop dat je geniet van het verkennen van mijn portfolio game en als je vragen hebt, voel je vrij
                    om
                    contact met me op
                    te nemen!
                </p>
                <button class="w-max absolute right-5 text-red-500 " id="closeWelcome" onclick="hide('WelcomMessage')">
                    <h3>CLOSE</h3>
                </button>
                        <img src="{{public_path('img/start.png')}}" alt="start button">

            </section>
        </div>

    </div>
    <canvas></canvas>

    <section id="textdiv" class=" hidden z-10  absolute top-1/3 left-1/3  h-max w-1/2 ">

        <div class="pixel-border pixel-border w-max z-20 relative left-10">
            <h2 class=" px-2 text-xl " id="dialogetitle"></h2>

        </div>
        <div class="pixel-border mt-2">
            <p class="p-4" id="textdivtext"></p>
            <div id="github">
            </div>
            <button class="hover:bg-white border-0 cursor-pointer text-sm my-4 mx-2 ml-4 text-green-400" id="nextdetails">
                next
            </button>
            <button class="hover:bg-white border-0 cursor-pointer text-sm my-4 mx-2  text-red-400 " id="close">close</button>
        </div>

    </section>

    <div  id="contactForm" class="hidden w-screen  absolute top-0 left-0 right-0 bottom-0 bg-black flex-col items-center place-content-center h-screen p-4  z-50">
        <div class="text-white">Contact</div>

        {{ html()->form('PUT', route('contact'))->open() }}

        <div class="grid grid-cols-2 ">
            {{ html()->input('naam')->placeholder('Name')->name('name')->class('col-span-1 m-2 p-2')}}
            {{ html()->input('telefoon')->placeholder('Telefoon')->name('phone')->class('col-span-1 m-2 p-2')}}
            {{ html()->email('email')->placeholder('Email')->name('email')->class('col-span-2 m-2 p-2')}}
            {{ html()->textarea('Message')->placeholder('Message')->name('message')->class('col-span-2 m-2 p-2')}}

        </div>


        {{ html()->button('submit')->class(' px-2 text-white ')}}
        {{ html()->form()->close() }}


        <button onclick="hide('contactForm', 'menu')" class="hover:bg-white border-0 cursor-pointer text-sm my-4 mx-2  text-red-400 " id="terug">close</button>
    </div>


    <div  id="help" class="hidden w-screen  absolute top-0 left-0 right-0 bottom-0 bg-black flex-col items-center place-content-center h-screen p-4  z-50">
        <div class="mb-4">
            <div class="pixel-border pixel-border w-max z-20 relative left-10">
                <h2 class=" px-2 text-xl ">HElP</h2>
            </div>
            <div class="pixel-border text-black px-4 mt-4">
                welkom op mijn porfolio <br>
                dit is een game based porfolio<br>
                je kan rondlopen met w a s d<br>
                en enoy het game plezier<br>
            </div>
        </div>


        <button onclick="hide('help', 'menu')" class="hover:bg-white border-0 cursor-pointer text-sm my-4 mx-2  text-red-400 " id="terug">close</button>
    </div>
</div>

<script>

    window.routes = {
        'position' : '{{ route('position') }}',
    }

</script>
