// // // const cartIcon =document.querySelector("#cart-icon");
// const courses = document.querySelector(".course");
// // // const closeCart =document.querySelector("#cart-close");
// let itemsAdded = [];

// // cartIcon.addEventListener('click',()=> {
// //     cart.classList.add("active");
// // })

// if(document.readyState == 'loading'){
//     document.addEventListener('DOMContentLoaded',start);
// }else{
//     start();
// }

// function start(){
//     const cart = document.querySelector(".course");

//     addEvents();
//     retrieveCartItems(); // Retrieve cart items from storage
// }

// function update(){
//     addEvents();
//     saveCartItems();
// }

// function addEvents() {
//     // Add item to cart
//     let addCart_btns = document.querySelectorAll('.add-cart');
//     addCart_btns.forEach(btn => {
//       btn.addEventListener('click', handle_addCartItem);
//     });
// }

// function handle_addCartItem(event){
//     let button = event.target;
//     let cardcontent = button.parentElement;
//     let title = cardcontent.querySelector(".CourseTitle").innerHTML;
//     let description = cardcontent.querySelector(".card-text").innerHTML;
//     let imgSrc = cardcontent.parentElement.querySelector('.card-img-top').src;
//     console.log(title,description,imgSrc);

//     let newToAdd = {
//         title,
//         description,
//         imgSrc
//     };

//     if (itemsAdded.find(el => el.title == newToAdd.title)) {
//         alert("This Item Is Already Exist In The Cart!");
//         return;
//     }else {
//         itemsAdded.push(newToAdd);
//     }

//     let cartBoxElement = CartBoxComponent(title, description, imgSrc);
//     let newNode = document.createElement("div");
//     newNode.innerHTML = cartBoxElement;
//     const cartContent = courses.querySelector(".cart-row");
//     cartContent.appendChild(newNode);

//     update();
// }

// function CartBoxComponent(title,description,imgSrc){
//     return `
//     <div class="cart-box">
//     <img src="${imgSrc}" alt="" class="card-img-top">
//     <div class="details-box">
//         <div class="cart-product-title">${title}</div>
//         <div class="cart-description">${description}</div>
//     </div>
//     </div>`;
// }

// function saveCartItems() {
//     localStorage.setItem('cartItems', JSON.stringify(itemsAdded));
//   }

// function retrieveCartItems() {
//     const storedItems = localStorage.getItem('cartItems');
//     if (storedItems) {
//       itemsAdded = JSON.parse(storedItems);
//       for (const item of itemsAdded) {
//         let cartBoxElement = CartBoxComponent(item.title, item.description, item.imgSrc);
//         let newNode = document.createElement("div");
//         newNode.innerHTML = cartBoxElement;
//         const cartContent = courses.querySelector(".cart-row");
//         cartContent.appendChild(newNode);
//       }
//     }
//   }

// enroll.js

// Function to handle the enrollment when the button is clicked
// enroll.js

// enroll.js

// enroll.js

// function enrollCourse(course) {
//     try {
//       let enrolledCourses = JSON.parse(localStorage.getItem('enrolledCourses')) || [];

//       if (!enrolledCourses.includes(course.title)) {
//         enrolledCourses.push(course.title);
//         localStorage.setItem('enrolledCourses', JSON.stringify(enrolledCourses));
//         console.log(`Enrolled in course: ${course.title}`);
//         displayEnrolledCourse(course);
//       } else {
//         console.log(`Already enrolled in course: ${course.title}`);
//       }
//     } catch (error) {
//       console.error('Error in enrollCourse:', error);
//     }
//   }

//   // testLocalStorage.js
// localStorage.setItem('testKey', 'testValue');
// const retrievedValue = localStorage.getItem('testKey');
// console.log('Retrieved Value:', retrievedValue);

//   document.querySelectorAll('.add-cart').forEach((button) => {
//     button.addEventListener('click', function () {
//       try {
//         const card = this.closest('.card');
//         const course = {
//           title: card.querySelector('.CourseTitle').innerText,
//           description: card.querySelector('.card-text').innerText,
//           image: card.querySelector('.card-img-top').getAttribute('src'),
//           // Add more properties as needed
//         };

//         enrollCourse(course);
//       } catch (error) {
//         console.error('Error in button click event:', error);
//       }
//     });
//   });

//   function displayEnrolledCourse(course) {
//     try {
//       const myCoursesContainer = document.querySelector('.mycourse');

//       const courseElement = document.createElement('div');
//       courseElement.classList.add('enrolled-course');

//       const courseHtml = `
//         <div class="card" style="width: 18rem;">
//           <img src="${course.image}" class="card-img-top" alt="${course.title}">
//           <div class="card-body">
//             <h3 class="CourseTitle">${course.title}</h3>
//             <p class="card-text">${course.description}</p>
//             <a href="/link-to-course-details" class="btn btn-primary">Details</a>
//           </div>
//         </div>
//       `;

//       courseElement.innerHTML = courseHtml;
//       myCoursesContainer.appendChild(courseElement);
//     } catch (error) {
//       console.error('Error in displayEnrolledCourse:', error);
//     }
//   }

// if(document.readyState == 'loading'){
//     document.addEventListener('DOMContentLoaded', ready);
// }else{
//     ready();
// }

// function ready(){
//     var storedCartItems = localStorage.getItem('cartItems');

//     if (storedCartItems) {
//         document.querySelector('.courses').innerHTML = storedCartItems;
//         // Add event listeners for 'Watch Course' buttons
//         var watchButtons = document.querySelectorAll('.WatchBtn');
//         watchButtons.forEach(function (button) {
//             button.addEventListener('click', LessonLink);
//         });
//     }

//     var LessonList = document.getElementsByClassName('WatchBtn')
//     for (var i = 0;i < LessonList.length;i++){
//         var button = LessonList[i]
//         button.addEventListener('click', LessonLink)
//     }

//     var addToCartButtons = document.getElementsByClassName('enrollBtn')
//     for (var i = 0;i < addToCartButtons.length;i++){
//         var button = addToCartButtons[i]
//         button.addEventListener('click',addToCartClicked)
//     }
// }

// function LessonLink(event){

// }

// function addToCartClicked(event){
//     var button = event.target
//     var course = button.parentElement.parentElement
//     var title = course.getElementsByClassName('CourseTitle')[0].innerText
//     var description = course.getElementsByClassName('card-text')[0].innerText
//     var imageSrc = course.getElementsByClassName('card-img-top')[0].src
//     console.log(title,description,imageSrc)

//     var existingCartItems = localStorage.getItem('cartItems') || '';
//     if (existingCartItems.includes(title)) {
//         alert("This item is already added in the course list.");
//         return;
//     }

//     addItemToCart(title,description,imageSrc)
// }

// function addItemToCart(title,description,imageSrc){
//     var cartRow = document.createElement('div')
//     cartRow.classList.add('course-row')
//     var cartItems = document.getElementsByClassName('mycourse')[0]
//     // var cartItemNames = cartItems.getElementsByClassName('CourseTitle')
//     // for(var i = 0; i<cartItemNames.length;i++){
//     //     if(cartItemNames[i].innerText == title){
//     //         alert("This item is already added in the course list.")
//     //         return
//     //     }
//     // }
//     var cartRowContents =`
//         <div class="card" style="width: 18rem;">
//             <img src="${imageSrc}" class="card-img-top" alt="...">
//             <div class="card-body">
//             <h3 class="CourseTitle">${title}</h3>
//             <p class="card-text">${description}</p>
//             <button type="button" class="btn WatchBtn" style="display: flex; margin-left: auto; background-color: rgb(255, 94, 0); color: #eaeaea;">Watch Course</button>
//             </div>
//         </div>
//     `;
//     cartRow.innerHTML = cartRowContents
//     cartItems.append(cartRow)

//     localStorage.setItem('cartItems', cartItems.innerHTML);

//     cartRow.getElementsByClassName('WatchBtn')[0].addEventListener('click',LessonList)

//     window.location.href = `mycourses.html?title=${encodeURIComponent(title)}&description=${encodeURIComponent(description)}&imageSrc=${encodeURIComponent(imageSrc)}`;
// }

document.addEventListener("DOMContentLoaded", function () {
  // Check for stored cart items on page load
  var storedCartItems = localStorage.getItem("cartItems");
  if (storedCartItems) {
    document.querySelector(".course").innerHTML = storedCartItems;
    // Add event listeners for 'Watch Course' buttons
    var watchButtons = document.querySelectorAll(".WatchBtn");
    watchButtons.forEach(function (button) {
      button.addEventListener("click", LessonLink);
    });
  }

  var LessonList = document.getElementsByClassName("WatchBtn");
  for (var i = 0; i < LessonList.length; i++) {
    var button = LessonList[i];
    button.addEventListener("click", LessonLink);
  }

  var addToCartButtons = document.getElementsByClassName("enrollBtn");
  for (var i = 0; i < addToCartButtons.length; i++) {
    var button = addToCartButtons[i];
    button.addEventListener("click", addToCartClicked);
  }
});

function LessonLink(event) {
  //     // Handle click on 'Watch Course' button
  //     // Add your logic here
  // window.location.href = `../Lessons/lessons.html?title=${encodeURIComponent(courseTitle)}`;
  window.location.href = "../Lessons/lessons.html";
}

function addToCartClicked(event) {
  var button = event.target;
  var course = button.parentElement.parentElement;
  var title = course.getElementsByClassName("CourseTitle")[0].innerText;
  var description = course.getElementsByClassName("card-text")[0].innerText;
  var imageSrc = course.getElementsByClassName("card-img-top")[0].src;

  // Check for existing cart items
  var existingCartItems = JSON.parse(localStorage.getItem("cartItems")) || [];
  var isDuplicate = existingCartItems.some((item) => item.title === title);

  if (isDuplicate) {
    alert("This item is already added in the course list.");
    return;
  }

  addItemToCart(title, description, imageSrc);
}

function addItemToCart(title, description, imageSrc) {
  var cartItem = {
    title: title,
    description: description,
    imageSrc: imageSrc,
  };

  // Get existing cart items from localStorage
  var existingCartItems = JSON.parse(localStorage.getItem("cartItems")) || [];

  // Add the new item to the cart
  existingCartItems.push(cartItem);

  // Save updated cart items to localStorage
  localStorage.setItem("cartItems", JSON.stringify(existingCartItems));

  // Redirect to cart.html
  // window.location.href = 'Elearning/mycourses.html';
}
