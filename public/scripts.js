function submitForm(){
    var username = $("#usernameFeild").val();
    var password = $("#passwordFeild").val();

    $.post("http://localhost/auth",
    {
        username: username,
        password: password
    },
    function(data, status){
        // let response = JSON.parse(data);
        console.log(data);
        // changeHomePage(response, username);
    });
}