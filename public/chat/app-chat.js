const chatButton = document.querySelector('.chatbox__button');
const chatContent = document.querySelector('.chatbox__support');
const videoTrig = document.querySelector('a[data-type=iframe]');
const closerIc = document.querySelector('#closer-ic');
const chatIfr = document.querySelector('#chat-items');
const icons = {
    isClicked: '<img src="/chat/images/icons/chatbox-icon.svg" />',
    isNotClicked: '<img src="/chat/images/icons/chatbox-icon.svg" />'
}
const chatbox = new InteractiveChatbox(chatButton, closerIc, chatContent, icons);
chatbox.display();
chatbox.toggleIcon(false, chatButton);

videoTrig.addEventListener("click", function(e){
    setTimeout(function(){
        const ifVid = document.querySelector('iframe.mfp-iframe')
        if(ifVid != undefined){
            ifVid.src = "https://www.youtube.com/embed/L8mTO7q71iQ?autoplay=1";
            console.log("video is set")
        }
    }, 3000);
});

chatIfr.contentWindow.location.reload();

