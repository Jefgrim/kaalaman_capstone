let liveUpdate = () => {
    var pusher = new Pusher('56af78128c04dde0a0f2', {
        cluster: 'ap1'
      });
     
      var channel = pusher.subscribe('threadpost-channel');
      channel.bind('newThreadPost', function(data) {
        let toast = document.querySelector(".toast")
        let myToast = new bootstrap.Toast(toast);
        myToast.show()

        let latestTitle = document.querySelector('.latestTitle');
         latestTitle.textContent = data.newThread.title;
     
         let latestUsername = document.querySelector('.p-1');
         latestUsername.textContent = `By: ${data.newThread.username}`;
      });
    }

export default liveUpdate;