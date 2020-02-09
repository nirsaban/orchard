<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<h3 class="product_name">roof</h3>
type
<select name="" class="type">
    <option value=""></option>
    <option value="shingle">shingle</option>
    <option value="metal">metal</option>
</select>
<p>if the user select shingle display this</p>
<select name="" class="shigle_type">
    <option value=""></option>
    <option value="3-tab">3-tab</option>
    <option value="architectural"> architectural </option>
</select>
<h4>color</h4>
<select name="" class="color">
    <option value=""></option>
    <option value="black">black</option>
    <option value="red">red</option>
</select>
<button onclick="save()">add products</button>

<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.19.2/axios.min.js"></script>
<script>
    const order = []
    function save(){
        let name = document.querySelector('.product_name').innerHTML;
        let type = document.querySelector('.type').value;
        let color =document.querySelector('.color').value;
        let shingleType = document.querySelector('.shigle_type').value;

        let productObj=
            {
                product_name:name,
                type:type,
                color:color,
                shingle_type:shingleType
            }

        axios({
            method:'post',
            url:'http://orchard.606.co.il/addProducts',
            params:{
                product:productObj
            }
        }).then(({data})=>{

            console.log(data);
        });
    }

</script>
</body>
</html>
