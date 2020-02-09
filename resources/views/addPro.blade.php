<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{csrf_token()}}">
    <title>Orchard</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

</head>
<body>
<input type="text" id="product_name">
<button onclick="update()">update</button>
<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.19.2/axios.min.js"></script>
title
<input type="text"  name="title"  id="title"><br>
home size
<input type="number"  name="home_size"  id="homesize"><br>

bed_nam
<input type="number" name="bedroom_num" id="bednum"><br>
bath_num
<input type="number" name="bathroom_nam" id="bathnum"><br>
floors
<input type="number"  name="floors_num" id="floorsnum"><br>
owner
<input type="text"  name="owner" id="owner"><br>
gas
<select name="gas" id="gas"><br>
    <option value="">choose</option>
    <option value="0">no</option>
    <option value="1">yes</option>
</select>
address
<input type="text" name="address" id="address"><br>
comment
<input type="text" name="comment" id="comment"><br>
<button onclick ="jsonSend()">add</button>

<script>
    const json_arr = [];
    function jsonSend(){
        let homesize = document.getElementById('homesize').value;
        let bednum  = document.getElementById('bednum').value;
        let bathnum =document.getElementById('bathnum').value;
        let floosrnum =document.getElementById('floorsnum').value;
        let owner =document.getElementById('owner').value;
        let gas =document.getElementById('gas').value;
        let address = document.getElementById('address').value;
        let title = document.getElementById('title').value;
        let comment = document.getElementById('comment').value;


        let pro = {
            user_id:10,
            home_size:homesize,
            title:title,
            bedroom_num:bednum,
            bathroom_num:bathnum,
            floor_num:floosrnum,
            owner:owner,
            gas:gas,
            comment:comment,
            address:address
        }
        let projectJson = JSON.stringify(pro);
        console.log(projectJson)
        axios({
            method:'post',
            url:'http://orchard.606.co.il/projects',
            params:{
                project: projectJson
            }
        }).then((res)=>{
            console.log(res);
        });
    }
</script>

</body>
</html>
