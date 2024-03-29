fetch("./js/data.json")
    .then((response) => response.json())
    .then((messages) => {
        jsonData = messages;
    })
    .catch((error) => console.error(error));


let jsonData = "";
let Dialog;


export function rectangularCollision({rectangle1, rectangle2}) {
    const rect1Right = rectangle1.position.x + rectangle1.width;
    const rect2Right = rectangle2.position.x + rectangle2.width;
    const rect1Bottom = rectangle1.position.y + rectangle1.height;
    const rect2Bottom = rectangle2.position.y + rectangle2.height - 48;
    return (
        rect1Right >= rectangle2.position.x &&
        rectangle1.position.x <= rect2Right &&
        rectangle1.position.y <= rect2Bottom &&
        rect1Bottom >= rectangle2.position.y
    );
}

export function checkForCharacterCollision({
    characters, player, characterOffset =
        {x: 0, y: 0},
    }) {
    // monitor for character collision
    for (let i = 0; i < characters.length; i++) {
        const character = characters[i];
        let dialogID = 1;
        if (
            rectangularCollision({
                rectangle1: player,
                rectangle2: {
                    ...character,
                    position: {
                        x: character.position.x + characterOffset.x,
                        y: character.position.y + characterOffset.y,
                    },
                },
            })
        ) {
            document.getElementById("textdiv").classList.remove("hidden");

            switch (character.uid) {

                case 1:
                    house_id = 'eerste';
                    getHouseData(house_id, dialogID)
                    break;
                case 2:
                    house_id = 'tweede';
                    getHouseData(house_id, dialogID)
                    break;
                case 3:
                    house_id = 'derde';
                    getHouseData(house_id, dialogID)
                    break;
                case 4:
                    house_id = 'vierde';
                    getHouseData(house_id, dialogID)
                    break;
                case 5:
                    house_id = 'vijfde';
                    getHouseData(house_id, dialogID)
                    break;
                case 6:
                    house_id = 'zesde';
                    getHouseData(house_id, dialogID)
                    break;
                case 7:
                    house_id = 'zevende';
                    getHouseData(house_id, dialogID)
                    break;
                case 8:
                    house_id = 'achtste';
                    getHouseData(house_id, dialogID)
                    break;
                case 9:
                    house_id = 'negende';
                    getHouseData(house_id, dialogID)
                    break;
                case 10:
                    house_id = 'tiende';
                    getHouseData(house_id, dialogID)
                    break;
                case 11:
                    house_id = 'elfde';
                    getHouseData(house_id, dialogID)
                    break;
                default:
                    ContentTitle = "";
                    Dialog = "";
                    dialogID = 1;
                    break;
            }
            const close = document.getElementById("close");

            close.addEventListener("click", function closeClickHandler() {
                dialogID = 1;
                document.getElementById("nextdetails").classList.remove("hidden");
                document.getElementById("textdiv").classList.add("hidden");
            });

            document.getElementById("dialogetitle").innerHTML = ContentTitle;
            document.getElementById("textdivtext").innerHTML = Dialog;
        }
    }
}

function addDialog(textOption) {
    // dialogeID++;
    document.getElementById("textdivtext").innerHTML = textOption;
}
let ContentTitle
let house_id

function getHouseData(house_id, dialogueID) {

    let next = document.getElementById("nextdetails");


    ContentTitle = jsonData.projects[house_id].title;

    Dialog = getData(house_id, dialogueID);
  let test;
    next.addEventListener("click", function () {
        ++dialogueID;

        if (dialogueID === 2) {
            Dialog = getData(house_id, dialogueID);
            addDialog(Dialog);
        }

        if (dialogueID === 3) {
            Dialog = getData(house_id, dialogueID);
            addDialog(Dialog);
            document.getElementById("nextdetails").classList.add("hidden");
        }
    });
}
function getData(house_id, id) {
    return jsonData.projects[house_id].dialoge[id];
}
