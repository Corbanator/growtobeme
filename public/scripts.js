function submitForm(){
    var username = $("#usernameFeild").val();
    var password = $("#passwordFeild").val();

    $.post("http://localhost/auth",
    {
        username: username,
        password: password
    },
    function(data, status){
        let response = JSON.parse(data);
        console.log(response);
        changeHomePage(response, username);
    });
}

function changeHomePage(response, username){
    var div = $("#signin");

    if (response.success){
        var text = "<div class='card text-center' style='background-color: #f7a028;'><h4>Welcome " + username + "</div></h4>" //TODO: make an error div to prepare for errors
    }else{
        var text = "<div class='card bg-danger text-center'><h4>" + response.error + "</div></h4>";
    }

    div.html(text);
}