let liveUpdate = () => {
    var pusher = new Pusher('56af78128c04dde0a0f2', {
        cluster: 'ap1'
      });
     
      var channel = pusher.subscribe('threadpost-channel');
      channel.bind('newThreadPost', function(data) {
         let threadContentContainer = document.querySelector(".threadContentContainer");
     
         let threadContent = document.createElement("div");
         threadContent.classList = `threadContent ${data.newThread.category}`;
     
         let avatarTextsContainer = document.createElement("div")
         avatarTextsContainer.classList = "avatarTextsContainer"
     
         let threadUserAvatar = document.createElement("div");
         threadUserAvatar.classList = "threadUserAvatar";
     
         let userImg = document.createElement("img");
         userImg.src = ".//images/Avatar Users2_20.png";
     
         let userName = document.createElement("span")
         userName.textContent = data.newThread.username
     
         let threadTextsContainer = document.createElement("div");
         threadTextsContainer.classList = "threadTextsContainer";
     
         let threadTexts = document.createElement("div");
         threadTexts.classList = "threadTexts";
     
         let postTitle = document.createElement("span");
         postTitle.style.fontSize = "larger";
         postTitle.textContent = data.newThread.title;
     
         let category = document.createElement("span");
         category.textContent = data.newThread.category;
     
         let postContent = document.createElement("span");
         postContent.textContent = data.newThread.threadpost;
     
         let threadReaction = document.createElement("div");
         threadReaction.classList = "threadReaction";
     
         let thumbsUpDownContainer = document.createElement ("div")
         thumbsUpDownContainer.classList = "thumbsUpDownContainer"
     
         let threadThumbsUp = document.createElement("div");
         threadThumbsUp.classList = "threadThumbsUp";
     
         let thumbsUpIcon = document.createElement("i");
         thumbsUpIcon.classList = "fa-regular fa-thumbs-up";
         //   thumbsUpIcon.id = `like${thread.postId}`
         //   thumbsUpIcon.addEventListener("click", liked)
     
         let threadThumbsDown = document.createElement("div");
         threadThumbsDown.classList = "threadThumbsDown";
     
         let thumbsDownIcon = document.createElement("i")
         thumbsDownIcon.classList = "fa-regular fa-thumbs-down";
         //   thumbsDownIcon.id = `dislike${thread.postId}`
         //   thumbsDownIcon.addEventListener("click", disliked)
     
         let replyBtnContainer = document.createElement("div")
         replyBtnContainer.classList = `replyBtnContainer` //${thread.batchClass}
         //   replyBtnContainer.id = thread.postId;
     
         let replyIcon = document.createElement("i")
         replyIcon.classList = "fa-solid fa-comment-dots"
     
         threadContentContainer.insertAdjacentElement("afterbegin", threadContent);
         threadContent.insertAdjacentElement("afterbegin", avatarTextsContainer)
         avatarTextsContainer.insertAdjacentElement("afterbegin", threadUserAvatar);
         threadUserAvatar.insertAdjacentElement("afterbegin", userImg);
         threadUserAvatar.insertAdjacentElement("beforeend", userName)
         avatarTextsContainer.insertAdjacentElement("beforeend", threadTextsContainer);
         threadTextsContainer.insertAdjacentElement("afterbegin", threadTexts)
         threadTexts.insertAdjacentElement("afterbegin", category);
         threadTexts.insertAdjacentElement("beforeend", postTitle);
         threadTexts.insertAdjacentElement("beforeend", postContent);
         threadContent.insertAdjacentElement("beforeend", threadReaction);
         threadReaction.insertAdjacentElement("afterbegin", thumbsUpDownContainer)
         thumbsUpDownContainer.insertAdjacentElement("afterbegin", threadThumbsUp);
         threadThumbsUp.insertAdjacentElement("afterbegin", thumbsUpIcon);
         thumbsUpDownContainer.insertAdjacentElement("beforeend", threadThumbsDown);
         threadThumbsDown.insertAdjacentElement("afterbegin", thumbsDownIcon);
         threadReaction.insertAdjacentElement("beforeend", replyBtnContainer)
         replyBtnContainer.insertAdjacentElement("afterbegin", replyIcon)
     
         let latestTitle = document.querySelector('.latestTitle');
         latestTitle.textContent = data.newThread.title;
     
         let latestUsername = document.querySelector('.p-1');
         latestUsername.textContent = `By: ${data.newThread.username}`;
     
      });
}

export default liveUpdate;