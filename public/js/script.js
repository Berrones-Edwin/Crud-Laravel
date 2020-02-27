//navbar
const NotificationsNotRead = document.querySelector('#NotificationsNotRead');
const NotificationsRead = document.querySelector('#NotificationsRead');

const NotificationsNotReadContainer = document.querySelector('#NotificationsNotReadContainer');
const NotificationsReadContainer = document.querySelector('#NotificationsReadContainer');

console.log('click');


NotificationsNotRead.classList.add('active');
NotificationsReadContainer.classList.add('hidde');

NotificationsRead.addEventListener("mouseover",function(){
    console.log('click');
    
})
// btn.addEventListener('click',(event)=>{
//     console.log('click');
    
// })
// NotificationsNotReadContainer.classList.add('hidde');
// NotificationsReadContainer.classList.add('show');

// NotificationsNotRead.classList.add('active');
// NotificationsRead.classList.remove('active');



//   $('#NotificationsNotRead').on('click',function(){
//     console.log('click');
    
//   });