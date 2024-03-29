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

<body class="bg-black m-0 p-0 min-h-screen min-w-screen overflow-hidden top-0 left-0 ">


<div class="container flex justify-center items-center h-screen relative">

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
                {{--        <img src="{{public_path('img/start.png')}}" alt="start button">--}}

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


<script type="module" >
    import {canvas } from '{{asset('js/canvas.js')}}'
    import {Boundary, Sprite} from '{{asset('js/classes.js')}}'

    import {collisions} from '{{asset('js/data/collisions.js')}}';
    import * as collision from '{{asset('js/utils.js') }}';

    import {charactersMapData} from '{{asset('js/data/characters.js')}}';



    canvas.width = 3000;
    canvas.height = 2000;
    const canvasW = canvas.width;
    const canvasH = canvas.height;

    const collisionsMap = [];
    for (let i = 0; i < collisions.length; i += 120) {
        collisionsMap.push(collisions.slice(i, 120 + i));
    }
    const charactersMap = [];
    for (let i = 0; i < charactersMapData.length; i += 120) {
        charactersMap.push(charactersMapData.slice(i, 120 + i));
    }

    const boundaries = [];

    const offset = {
        x: -1175,
        y: 550,
    };
    const characters = [];
    const villagerImg = new Image();
    villagerImg.src = "img/villager/idle.png";
    const doorImg = new Image();
    doorImg.src = "img/test.png";
    const oldManImg = new Image();
    oldManImg.src = "img/oldMan/Idle.png";

    collisionsMap.forEach((row, i) => {
        row.forEach((symbol, j) => {
            if (symbol === 1025)
                boundaries.push(
                    new Boundary({
                        position: {
                            x: j * Boundary.width + offset.x,
                            y: i * Boundary.height + offset.y,
                        },
                    })
                );
        });
    });

    const characterMap = {
        1025: 1,
        1026: 2,
        1027: 3,
        1028: 3,
        1029: 4,
        1030: 5,
        1031: 6,
        1032: 8,
        1033: 9,
        1034: 10,
        1035: 11,
    };

    charactersMap.forEach((row, i) => {
        row.forEach((symbol, j) => {
            const uid = characterMap[symbol];
            if (uid) {
                characters.push(
                    new Sprite({
                        uid,
                        position: {
                            x: j * Boundary.width + offset.x,
                            y: i * Boundary.height + offset.y,
                        },
                        image: doorImg,
                        scale: 3,
                    })
                );
            }
            if (symbol !== 0) {
                boundaries.push(
                    new Boundary({
                        position: {
                            x: j * Boundary.width + offset.x,
                            y: i * Boundary.height + offset.y,
                        },
                    })
                );
            }
        });
    });

    const image = new Image();
    image.src = "img/pellettown.png";

    const foregroundImage = new Image();
    foregroundImage.src = "img/foregroundObjects.png";

    const playerDownImage = new Image();
    playerDownImage.src = "img/playerDown.png";

    const playerUpImage = new Image();
    playerUpImage.src = "img/playerUp.png";

    const playerLeftImage = new Image();
    playerLeftImage.src = "img/playerLeft.png";

    const playerRightImage = new Image();
    playerRightImage.src = "img/playerRight.png";

    const player = new Sprite({
        position: {
            x: canvasW / 2 - 192 / 4 / 2,
            y: canvasH / 2 - 68 / 2,
        },
        image: playerDownImage,
        frames: {
            max: 4,
            hold: 10,
        },
        sprites: {
            up: playerUpImage,
            left: playerLeftImage,
            right: playerRightImage,
            down: playerDownImage,
        },
    });

    const background = new Sprite({
        position: {
            x: offset.x,
            y: offset.y,
        },
        image: image,
    });

    const foreground = new Sprite({
        position: {
            x: offset.x,
            y: offset.y,
        },
        image: foregroundImage,
    });

    const movables = [background, ...boundaries, foreground, ...characters];
    const renderables = [
        background,
        ...boundaries,
        ...characters,
        player,
        foreground,
    ];


    let lastTime = 0;
    const textDiv = document.getElementById("textdiv");
    const menu = document.getElementById("menu");
    const welcome = document.getElementById("WelcomMessage");


    let clicked = false;

    const audio = {
        Map: new Howl({
            src: "/audio/map.wav",
            html5: true,
            volume: 0.1,
            loop: true,
        }),
    };


    addEventListener("click", () => {
        if (!clicked) {
            clicked = true;
            audio.Map.play();
            audio.loop = true;
        }
    });

    const keys = {
        w: {
            pressed: false,
        },
        a: {
            pressed: false,
        },
        s: {
            pressed: false,
        },
        d: {
            pressed: false,
        },
        p: {
            pressed: false,
        }
    };

    let lastKey = "";
    window.addEventListener("keydown", (e) => {
        switch (e.key) {
            case "w":
                keys.w.pressed = true;
                lastKey = "w";
                break;
            case "a":
                keys.a.pressed = true;
                lastKey = "a";
                break;

            case "s":
                keys.s.pressed = true;
                lastKey = "s";
                break;

            case "d":
                keys.d.pressed = true;
                lastKey = "d";
                break;
            case "p":
                keys.p.pressed = true;
                lastKey = "p";
                break;
        }
    });
    window.addEventListener("keyup", (e) => {
        switch (e.key) {
            case "w":
                keys.w.pressed = false;
                break;
            case "a":
                keys.a.pressed = false;
                break;
            case "s":
                keys.s.pressed = false;
                break;
            case "d":
                keys.d.pressed = false;
                break;
            case "p":
                keys.p.pressed = false;
                break;
        }
    });

    let movementspeed = 4;
    const fps = 60;
    const interval = 1000 / fps;


    function animate() {
        //

        let currentPosition = player.position;
        const currentTime = Date.now();
        const deltaTime = currentTime - lastTime;

        if (deltaTime > interval) {
            lastTime = currentTime - (deltaTime % interval);
            window.requestAnimationFrame(animate);

            renderables.forEach((renderable) => {
                renderable.draw();
            });
            let moving = true;
            player.animate = false;

            if (textDiv.classList.contains("hidden") === false) {
                return;
            }
            if (menu.classList.contains("show")) {
                return;
            }
            if (welcome.classList.contains("show")) {
                return;
            }

            // function movementfunction(sprite, offset, positionX, speedX, operatorX, positionY, speedY, operatorY,) {
            //     player.animate = true;
            //     player.image = sprite;
            //
            //     collision.checkForCharacterCollision({
            //         characters,
            //         player,
            //         characterOffset: offset,
            //     });
            //
            //     for (let i = 0; i < boundaries.length; i++) {
            //         const boundary = boundaries[i];
            //         if (
            //             collision.rectangularCollision({
            //                 rectangle1: player,
            //                 rectangle2: {
            //                     ...boundary,
            //                     position: {
            //                         x: eval(boundary.position.x + positionX),
            //                         y: eval(boundary.position.y + positionY),
            //                     },
            //                 },
            //             })
            //         ) {
            //             moving = false;
            //             break;
            //         }
            //     }
            //     if (moving)
            //
            //         movables.forEach((movable) => {
            //             // console.log(movable.position.y += speedY)
            //             movable.position.x = eval(movable.position.x + operatorX + speedY);
            //             movable.position.y = eval(movable.position.y + operatorY + speedY);
            //         });
            //
            // }

            //
            // if (keys.w.pressed && keys.a.pressed) {
            //     movementfunction(
            //         player.sprites.up,
            //         {x: 4, y: 4},
            //         '+ 4',
            //         4,
            //         '+',
            //         '+ 4',
            //         4,
            //         '+'
            //     )
            // } else if (keys.a.pressed && keys.s.pressed) {
            //     movementfunction(
            //         player.sprites.down,
            //         {x: 4, y: -4},
            //         '+ 4',
            //         4,
            //         '+',
            //         '- 4',
            //         4,
            //         '-'
            //     )
            // } else if (keys.s.pressed && keys.d.pressed) {
            //     movementfunction(
            //         player.sprites.down,
            //         {x: -4, y: -4},
            //         '- 4',
            //         4,
            //         '-',
            //         '- 4',
            //         4,
            //         '-'
            //     )
            // } else if (keys.d.pressed && keys.w.pressed) {
            //     movementfunction(
            //         player.sprites.up,
            //         {x: -4, y: 4},
            //         '- 4',
            //         4,
            //         '-',
            //         '+ 4',
            //         4,
            //         '+'
            //     )
            // } else
                if (
                (keys.w.pressed)
            ) {
                player.animate = true;
                player.image = player.sprites.up;

                collision.checkForCharacterCollision({
                    characters,
                    player,
                    characterOffset: {x: 0, y: 4},
                });

                for (let i = 0; i < boundaries.length; i++) {
                    const boundary = boundaries[i];
                    if (
                        collision.rectangularCollision({
                            rectangle1: player,
                            rectangle2: {
                                ...boundary,
                                position: {
                                    x: boundary.position.x,
                                    y: boundary.position.y + 4,
                                },
                            },
                        })
                    ) {
                        moving = false;
                        break;
                    }
                }

                if (moving)
                    movables.forEach((movable) => {
                        movable.position.y += movementspeed;
                        // currentPosition.y += movementspeed;

                        // console.log(currentPosition)
                    });

                // console.log(player.position.x)

                    axios.get('{{route('position')}}', {
                        params: {
                            position: currentPosition
                        }
                    }).then(function (){
                        player.position = currentPosition;
                    })


            } else if (
                (keys.a.pressed)
            ) {
                player.animate = true;
                player.image = player.sprites.left;

                collision.checkForCharacterCollision({
                    characters,
                    player,
                    characterOffset: {x: 4, y: 0},
                });

                for (let i = 0; i < boundaries.length; i++) {
                    const boundary = boundaries[i];
                    if (
                        collision.rectangularCollision({
                            rectangle1: player,
                            rectangle2: {
                                ...boundary,
                                position: {
                                    x: boundary.position.x + 4,
                                    y: boundary.position.y,
                                },
                            },
                        })
                    ) {
                        moving = false;
                        break;
                    }
                }

                if (moving)
                    movables.forEach((movable) => {
                        movable.position.x += movementspeed;

                    });
            } else if (
                (keys.s.pressed)
            ) {
                player.animate = true;
                player.image = player.sprites.down;

                collision.checkForCharacterCollision({
                    characters,
                    player,
                    characterOffset: {x: 0, y: -4},
                });

                for (let i = 0; i < boundaries.length; i++) {
                    const boundary = boundaries[i];
                    if (
                        collision.rectangularCollision({
                            rectangle1: player,
                            rectangle2: {
                                ...boundary,
                                position: {
                                    x: boundary.position.x,
                                    y: boundary.position.y - 4,
                                },
                            },
                        })
                    ) {
                        moving = false;
                        break;
                    }
                }

                if (moving)
                    movables.forEach((movable) => {
                        movable.position.y -= movementspeed;
                    });
            } else if (
                (keys.d.pressed)
            ) {
                player.animate = true;
                player.image = player.sprites.right;

                collision.checkForCharacterCollision({
                    characters,
                    player,
                    characterOffset: {x: -4, y: 0},
                });
                for (let i = 0; i < boundaries.length; i++) {
                    const boundary = boundaries[i];
                    if (
                        collision.rectangularCollision({
                            rectangle1: player,
                            rectangle2: {
                                ...boundary,
                                position: {
                                    x: boundary.position.x - 4,
                                    y: boundary.position.y,
                                },
                            },
                        })
                    ) {
                        moving = false;
                        break;
                    }
                }

                if (moving)
                    movables.forEach((movable) => {
                        movable.position.x -= movementspeed;
                    });
            }



        }

        window.requestAnimationFrame(animate);
    }

    document.addEventListener("DOMContentLoaded", () => {
        Echo.channel(`player-position`)
            .listen('.player', (e) => {
                console.log(e.playerPosition);
            })
    });

    animate();

</script>
</body>

</html>
<script>

</script>
