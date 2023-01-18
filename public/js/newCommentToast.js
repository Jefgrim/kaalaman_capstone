var pusher = new Pusher('56af78128c04dde0a0f2', {
    cluster: 'ap1'
  });

var channel = pusher.subscribe('comments-channel');
channel.bind('newReplyPost', function() {
  let toast = document.querySelector(".toast")
  let myToast = new bootstrap.Toast(toast);
  myToast.show()
});