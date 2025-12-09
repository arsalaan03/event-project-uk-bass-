
// header
 AOS.init();

window.onscroll = function() {
  myFunction()
};
var header = document.getElementById("myHeader");
var sticky = header.offsetTop;

function myFunction() {
  if (window.pageYOffset >=120) {
    header.classList.add("sticky");
  } else {
    header.classList.remove("sticky");
  }
}

 const displayImage = document.getElementById("displayImage");
  const caption = document.querySelector(".caption");
  const thumbnails = document.querySelectorAll(".thumb");

  thumbnails.forEach(thumb => {
    thumb.addEventListener("click", () => {
      displayImage.src = thumb.src;
      caption.textContent = thumb.dataset.caption;
    });
  });



  document.getElementById("searchInput").addEventListener("focus", function () {
    document.getElementById("trendingBox").style.display = "block";
});

document.addEventListener("click", function (e) {
    if (!e.target.closest('.search-wrapper')) {
        document.getElementById("trendingBox").style.display = "none";
    }
});  


$('#locationSelect').select2({ width: '200px' });



$('.uk-slider').owlCarousel({
    loop: true,
    autoplay: true,
    margin: 20,
    dots: false,
    nav: false,
    stagePadding: 80,
    responsive: {
        0: { items: 1, margin: 10, stagePadding: 40 },
        600: { items: 2, stagePadding: 60 },
        1000: { items: 3, stagePadding: 80 }
    }
});

// Custom Buttons
$('.uk-prev').click(function() {
    $('.uk-slider').trigger('prev.owl.carousel');
});

$('.uk-next').click(function() {
    $('.uk-slider').trigger('next.owl.carousel');
});