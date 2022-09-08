function submitForm(){
    var username = $("#usernameFeild").val();
    var password = $("#passwordFeild").val();

    $.post("http://localhost/auth",
    {
        username: username,
        password: password
    },
    function(data, status){
        if (status == "success"){
            if (data == "working"){
                changeHomePage(username);
            }
        }
    });
}

function changeHomePage(username){
    var div = $("#signin");

    var text = "<h3>Welcome " + username + "</h3>" //TODO: make an error div to prepare for errors
    div.append(text);
}