//navbar
const NotificationsNotRead = document.querySelector('#NotificationsNotRead');
const NotificationsRead = document.querySelector('#NotificationsRead');

const NotificationsNotReadContainer = document.querySelector('#NotificationsNotReadContainer');
const NotificationsReadContainer = document.querySelector('#NotificationsReadContainer');

console.log('click');

NotificationsNotRead.classList.add('active');
NotificationsReadContainer.classList.add('hidde');


NotificationsRead.addEventListener("click", function () {
    
    NotificationsNotRead.classList.remove('active');
    NotificationsRead.classList.add('active');

    NotificationsReadContainer.classList.remove('hidde');
    NotificationsNotReadContainer.classList.add('hidde');

})


NotificationsNotRead.addEventListener("click", function () {
    
    NotificationsNotRead.classList.add('active');
    NotificationsRead.classList.remove('active');

    NotificationsReadContainer.classList.add('hidde');
    NotificationsNotReadContainer.classList.remove('hidde');

})
