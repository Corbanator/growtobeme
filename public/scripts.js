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
        if (response.success){
            changeHomePage(response, username);
        }
        
    });
}

function changeHomePage(respnose, username){
    var div = $("#signin");

    var text = "<h3>Welcome " + username + "</h3>" //TODO: make an error div to prepare for errors
    div.append(text);
}