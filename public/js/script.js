const NotificationsNotRead = document.querySelector('#NotificationsNotRead');
const NotificationsNotReadContainer = document.querySelector('#NotificationsNotReadContainer');
const NotificationsRead = document.querySelector('#NotificationsRead');
const NotificationsReadContainer = document.querySelector('#NotificationsReadContainer');

// NotificationsNotReadContainer.classList.add('hidde');
NotificationsNotRead.classList.add('active');
NotificationsReadContainer.classList.add('hidde');


NotificationsNotRead.addEventListener('click',()=>{
    
    NotificationsNotReadContainer.classList.add('hidde');
    NotificationsReadContainer.classList.add('show');

    NotificationsNotRead.classList.add('active');
    NotificationsRead.classList.remove('active')
})