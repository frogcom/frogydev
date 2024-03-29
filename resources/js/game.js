import {collisions} from "@/data/collisions.js";


import * as collision from "@/utils.js"
import {charactersMapData} from "@/data/characters.js"
import {Sprite, Boundary} from "@/classes.js";
import {i} from "vite/dist/node/types.d-FdqQ54oU.js";

const canvas = document.querySelector("canvas");
export const c = canvas.getContext("2d");


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
const playerStartPosition = {
    x: -1175,
    y: 550,
}
let playerPosition = {
    x: -1175,
    y: 550,
}
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
    id: Math.random().toString(16).slice(2)
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
// Echo.private(`player-position`)
//     .listenForWhisper('position', (e) => {
//         // console.log(e.position);
//
//
//         window.players = e;
//     });


// window.players.forEach((symbol, j) => {
//     console.log(symbol, j)
//     players.push(
//         new Sprite({
//
//             position: {
//                 x: canvasW / 2 - 192 / 4 / 2,
//                 y: canvasH / 2 - 68 / 2,
//             },
//             image: playerDownImage,
//             frames: {
//                 max: 4,
//                 hold: 10,
//             },
//             sprites: {
//                 up: playerUpImage,
//                 left: playerLeftImage,
//                 right: playerRightImage,
//                 down: playerDownImage,
//             },
//             id: Math.random().toString(16).slice(2)
//         })
//     );
// });
let players = []
// players.push( new Sprite({
//     position: {
//         x: player.position.x,
//         y: player.position.y,
//     },
//     image: playerDownImage,
//     frames: {
//         max: 4,
//         hold: 10,
//     },
//     sprites: {
//         up: playerUpImage,
//         left: playerLeftImage,
//         right: playerRightImage,
//         down: playerDownImage,
//     },
// }));

const movables = [background, ...players, ...boundaries, foreground, ...characters,  ];
const renderables = [
    background,
    ...boundaries,
    ...characters,
    player,
    foreground,
    ...players
];

Echo.private(`player-position`)
    .listenForWhisper('position', (e) => {
        // console.log(e.position);

        console.log(e)

    });

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
const fps = 30;
const interval = 1000 / fps;
Echo.join('player-position')
    .joining((user) => {

        // a user has joined.

        players.push( new Sprite({
            position: {
                x: playerStartPosition.x,
                y: playerStartPosition.y,
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
        }));
        renderables.push(...players)
        movables.push(...players)
        console.log(players)
        Echo.private(`player-position`)
            .whisper('position', {
                players: players,
            });
    })
    .leaving((user) => {
        // a user has left.
        console.log('test')
        console.log(user)
    });


// Echo.private(`player-position`)
//     .listenForWhisper('position', (e) => {
//         // console.log(e.position);
//         e.forEach(function callback(value, index) {
//             console.log(`${index}: ${value}`);
//         });
//
//     });

function animate() {
    //

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

        function movementfunction(sprite, offset, positionX, speedX, operatorX, positionY, speedY, operatorY,) {
            player.animate = true;
            player.image = sprite;

            collision.checkForCharacterCollision({
                characters,
                player,
                characterOffset: offset,
            });

            for (let i = 0; i < boundaries.length; i++) {
                const boundary = boundaries[i];
                if (
                    collision.rectangularCollision({
                        rectangle1: player,
                        rectangle2: {
                            ...boundary,
                            position: {
                                x: eval(boundary.position.x + positionX),
                                y: eval(boundary.position.y + positionY),
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
                    // console.log(movable.position.y += speedY)
                    movable.position.x = eval(movable.position.x + operatorX + speedY);
                    movable.position.y = eval(movable.position.y + operatorY + speedY);
                });

        }


        if (keys.w.pressed && keys.a.pressed) {
            movementfunction(
                player.sprites.up,
                {x: 4, y: 4},
                '+ 4',
                4,
                '+',
                '+ 4',
                4,
                '+'
            )
        } else if (keys.a.pressed && keys.s.pressed) {
            movementfunction(
                player.sprites.down,
                {x: 4, y: -4},
                '+ 4',
                4,
                '+',
                '- 4',
                4,
                '-'
            )
        } else if (keys.s.pressed && keys.d.pressed) {
            movementfunction(
                player.sprites.down,
                {x: -4, y: -4},
                '- 4',
                4,
                '-',
                '- 4',
                4,
                '-'
            )
        } else if (keys.d.pressed && keys.w.pressed) {
            movementfunction(
                player.sprites.up,
                {x: -4, y: 4},
                '- 4',
                4,
                '-',
                '+ 4',
                4,
                '+'
            )
        } else if (
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

            if (moving) {
                movables.forEach((movable) => {
                    movable.position.y += movementspeed;

                });
                playerPosition.y = playerPosition.y + movementspeed


            }


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

            if (moving) {
                movables.forEach((movable) => {
                    movable.position.x += movementspeed;
                });
                playerPosition.x += movementspeed
            }
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

            if (moving) {
                movables.forEach((movable) => {
                    movable.position.y -= movementspeed;
                });
                playerPosition.y -= movementspeed
            }
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

            if (moving) {
                movables.forEach((movable) => {
                    movable.position.x -= movementspeed;
                });
                playerPosition.x += movementspeed
            }
        }

        // if(keys.p.pressed){
        //     player.animate = true;
        //     movables.forEach((movable) => {
        //         movable.position.x = offset.x ;
        //         movable.position.y = offset.y ;
        //     });
        // }


    }

    // document.addEventListener("DOMContentLoaded", () => {
    //     Echo.channel(`player-position`)
    //         .listen('.player', (e) => {
    //             console.log(e.playerPosition)
    //         })
    //
    //
    // });

    let oldposition = playerPosition;

    // if (oldposition != playerPosition){
    //     Echo.private(`player-position`)
    //         .whisper('position', {
    //             id: player.id,
    //             position: playerPosition,
    //         });
    // }

    window.requestAnimationFrame(animate);
}


animate();
