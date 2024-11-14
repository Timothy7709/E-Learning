document.addEventListener('DOMContentLoaded', function () {
    // Get existing cart items from localStorage
    var existingCartItems = JSON.parse(localStorage.getItem('cartItems')) || [];

    // Display cart items on the cart.html page
    var cartItemsContainer = document.querySelector('.mycourse');

    existingCartItems.forEach(function (item) {
        var cartRow = document.createElement('div');
        cartRow.classList.add('course-row');

        var cartRowContents = `
            <div class="card">
                <img src="${item.imageSrc}" class="card-img-top" alt="...">
                <div class="card-body">
                    <h3 class="CourseTitle">${item.title}</h3>
                    <p class="card-text">${item.description}</p>
                    <button type="button" class="btn WatchBtn" style="display: flex; margin-left: auto; background-color: rgb(255, 94, 0); color: #eaeaea;" href="Lessons/lessons.html">Watch Course</button>
                </div>
            </div>
        `;

        cartRow.innerHTML = cartRowContents;
        cartItemsContainer.append(cartRow);

        // Add event listener for 'Watch Course' button
        cartRow.querySelector('.WatchBtn').addEventListener('click', LessonLink);
    });
});

function LessonLink(event) {
//     // Handle click on 'Watch Course' button
//     // Add your logic here
    // window.location.href = `../Lessons/lessons.html?title=${encodeURIComponent(courseTitle)}`;
    window.location.href = '../Lessons/lessons.html';
}
