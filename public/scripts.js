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

function noFriends(){
    removeListItem();
}