(function IIFE() {
  let reviews = [
    {
      stars: 5,
      userName: "Bumble B.",
      location: "Houston, TX",
      review:
        "Super équipage!"
    },
    {
      stars: 5,
      userName: "Olive U.",
      location: "Houston, TX",
      review:
        "Mon sous-sol est enfin sec! Je recommande vivement d'appeler cette entreprise!"
    },
    {
      stars: 5,
      userName: "Barbie Q.",
      location: "Houston, TX",
      review:
        "Super hôtel génial, très bon rapport qualité / prix et mon sous-sol est magnifique!"
    }
  ];

  let flexOrders = [1, 2, 3];
  function next() {
    const allReviews = document.querySelectorAll(".review");
    const previous = "3";
    const current = "2";
    const next = "1";

    for (const review of allReviews) {
      const order = review.getAttribute("data-order");

      switch (order) {
        case current:
          review.setAttribute("data-order", previous);
          break;
        case next:
          review.setAttribute("data-order", current);
          break;
        case previous:
          review.setAttribute("data-order", next);
          break;
      }
    }
  }

  function previous() {
    const allReviews = document.querySelectorAll(".review");
    const previous = "1";
    const current = "2";
    const next = "3";

    for (const review of allReviews) {
      const order = review.getAttribute("data-order");

      switch (order) {
        case current:
          review.setAttribute("data-order", previous);
          break;
        case next:
          review.setAttribute("data-order", current);
          break;
        case previous:
          review.setAttribute("data-order", next);
          break;
      }
    }
  }

  function createReview({ stars, userName, location, review }, index) {
    let ratingsStars = "";
    for (let i = 0; i < stars; i++) {
      ratingsStars += `
              <span class="svg-container">
                    <svg
                      aria-hidden="true"
                      focusable="false"
                      data-prefix="fas"
                      data-icon="star"
                      class="svg-inline--fa fa-star fa-w-18"
                      role="img"
                      xmlns="http://www.w3.org/2000/svg"
                      viewBox="0 0 576 512"
                    >
                      <path
                        fill="#ffd137"
                        d="M259.3 17.8L194 150.2 47.9 171.5c-26.2 3.8-36.7 36.1-17.7 54.6l105.7 103-25 145.5c-4.5 26.3 23.2 46 46.4 33.7L288 439.6l130.7 68.7c23.2 12.2 50.9-7.4 46.4-33.7l-25-145.5 105.7-103c19-18.5 8.5-50.8-17.7-54.6L382 150.2 316.7 17.8c-11.7-23.6-45.6-23.9-57.4 0z"
                      ></path>
                    </svg>
                  </span>
      `;
    }
    let id = `review${index + 1}`;
    return `
     <div class="review" id="${id}" data-order="${index + 1}">
            <!-- Stars and review text -->
            <div class="bubble">
              <div class="stars-container">
              ${ratingsStars}
              </div>
              <p class="review-text">
               ${review}
              </p>
            </div>
            <!-- Stars and reviews end -->
            <!-- User Name And Location -->
            <div class="user-info">
              <div class="user-name">${userName}</div>
              <div class="user-location">${location}</div>
            </div>

            <!-- User Name ends-->
          </div>
    `;
  }

  function loadReviews() {
    let reviewsBox = document.getElementById("reviews");
    let reviewsBoxInnerHTML = "";
    reviews.forEach((review, index) => {
      reviewsBoxInnerHTML += createReview(review, index);
    });
    reviewsBox.innerHTML = reviewsBoxInnerHTML;
  }

  window.onload = function setUp() {
    // Load reviews

    loadReviews();
    document.getElementById("prev-review").addEventListener("click", previous);

    document.getElementById("next-review").addEventListener("click", next);
  };
})();