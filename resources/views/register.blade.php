<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="_csrf_header" content="${_csrf.headerName}"/>
    <title>Document</title>
</head>
<body>
<input type="text" id="name" name="name">
<input type="email" id="email" name="email" >
<input type="password" id= "password" name="password">
<input type="hidden" name="_csrf" id="">
<button onclick="register()"> register</button>

<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.19.2/axios.min.js"></script>
<script>
    function register(){
        let nameUs =document.getElementById('name').value;
        let emailUs = document.getElementById('email').value;
        let passwordUs = document.getElementById('password').value;

        user = {
            name:nameUs,
            email:emailUs,
            password:passwordUs
        }
        console.log(user);


        axios({
            method:'post',
            url:'http://orchard.606.co.il/register',
            params:{
                user:user
            }
        }).then((res)=>{
            console.log(res);
        });
    }

</script>
</body>
</html>
