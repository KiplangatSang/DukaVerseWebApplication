require('./bootstrap');

document.getElementById("btngetaccesstoken").addEventListener("click", (event) =>{
    event.preventDefault()
    alert("Clicked");
    axios.post('/get-token', {})
    .then((response) =>{
        console.log(response.data)
    })
    .catch((error) =>{console.error();})
})

document.getElementById("registerUrls").addEventListener('click', (event) =>{
    event.preventDefault()

    axios.post('register-Urls' ,{})
    .then((response) =>{
        if(response.data.RespomseDescription){
          document.getElementById('response').innerHTML = response.data.RespomseDescription
        }else{
            document.getElementById('response').innerHTML = response.data.errorMessage
        }
        console.log(response.data);
    })
    .catch((error) =>{
        console.log(error);
    })
})

document.getElementById("simulate").addEventListener('click', (event) =>{
 event.preventDefault()

 document.getElementById("accesstoken").innerHTML = "Clicked access Token";
 const requestBody = {
     amount : document.getElementById('amount').value,
     account : document.getElementById('account').value
 }
 axios.post('/simulate',requestBody)
 .then((response) => {
     console.log(response.data);
 })
 .catch((error) =>{
     console.log(error);
 })

})
