<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<button onclick="saveAll()">save All</button>
<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.19.2/axios.min.js"></script>
<script>
    function saveAll(){
        axios({
            method:'get',
            url:'http://orchard.606.co.il/showOrder',
            params:{
                id:2
            }
        }).then(({data})=>{

            console.log(data);
        });
    }
</script>
</body>
</html>
