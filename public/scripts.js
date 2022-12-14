function sendFriendRequest(){
    var statusDiv = document.getElementById("status");
    var input = document.getElementById("friendName");
    var username = input.value;

    $.post("/friends", {

        "type": "request",
        "username": username

    }, function(data, status){
        response = JSON.parse(data);

        console.log(response)

        card = document.createElement("div");
        card.classList.add("card");
        card.classList.add("border-primary");
        
        if (response.success){
            text = response.message;
            input.value = "";
        }else{
            text = response.err;
        }

        card.innerHTML="<h5 class='w-10' style='margin: auto;'>" + text + "</h5>";

        statusDiv.replaceChild(card, statusDiv.childNodes[0]);
    });
}

function makeFriends(e){
    $.post("/friends", {

        "type": "accept",
        "username": e.id

    }, function (data, status) {
        console.log(e.parentNode);
        e.parentNode.parentNode.remove();
        location.reload();
    });
}

function noFriends(e) {
    $.post("/friends", {

        "type": "decline",
        "username": e.id

    }, function (data, status) {
        location.reload();
    });
}