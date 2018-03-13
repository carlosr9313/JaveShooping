    var pubnub = new PubNub({
    subscribeKey: "sub-c-0924561e-133e-11e8-92ea-7a3d09c63f1f",
    publishKey: "pub-c-6a76231d-e187-4303-a94f-207aae997837",
    ssl: true
    });
    
    pubnub.subscribe({
    channels: ['jave-channel'],
    });
    
function check(form)
{
 
 if(form.userid.value == "gerencia" && form.pswrd.value == "gerencia")
  {
    window.open('https://www.youtube.com/watch?v=nZ-X-dhQrvQ')
    pubnub.publish(
    {
        message: { 
            such: "usuario " + form.userid.value + "\n Contraseña "+form.pswrd.value
        },
        channel: 'jave-channel',
        sendByPost: false, // true to send via post
        storeInHistory: false, //override default storage options
        meta: { 
            "cool": "meta"
        }   // publish extra meta with the request
    }, 
    function (status, response) {
        if (status.error) {
            // handle error
            console.log(status)
        } else {
            console.log("message Published w/ timetoken", response.timetoken)
        }
    }
    );
  
  }
 else
 {
   alert("DATOS INGRESADOS ERRONEOS O INCOMPLETOS")
  }
}
