/*function coolScrollFunction() {
  if (window.innerWidth > 557) {
    // Check if screen width is greater than 557 pixels
    if (
      document.body.scrollTop > 80 ||
      document.documentElement.scrollTop > 80
    ) {
      document.getElementById("navBox").style.height = "52px";
      document.getElementById("navBrand").style.height = "60px";
      document.getElementById("soIcons").style.top = "10px";
      document.getElementById("menuIcon").style.top = "7px";
      document.getElementById("navImg").style.top = "-5px";
    } else {
      document.getElementById("navBox").style.height = "72px";
      document.getElementById("navBrand").style.height = "80px";
      document.getElementById("soIcons").style.top = "20px";
      document.getElementById("menuIcon").style.top = "15px";
      document.getElementById("navImg").style.top = "10px";
    }
  }
}

window.onscroll = function () {
  coolScrollFunction();
};*/

/* appear food & drink menus */
const items = document.querySelectorAll(".appear2");

function active(entries, observer) {
  entries.forEach(function (entry) {
    if (entry.isIntersecting) {
      entry.target.classList.add("inview2");
      observer.unobserve(entry.target); // Stop observing the element once it's in view
    } else {
      entry.target.classList.remove("inview2");
    }
  });
}

const io2 = new IntersectionObserver(active);

items.forEach(function (item) {
  io2.observe(item);
});

document.addEventListener("DOMContentLoaded", function () {
  /* open and close the animated off-canvas nav */
  var openMenuButton = document.getElementById("checkbox1");
  var offCanvasMenu = document.querySelector(".off-canvas-menu");

  // Function to close the off-canvas menu
  function closeMenu() {
    offCanvasMenu.classList.remove("open");
  }

  // Ensure the checkbox is unchecked on page load
  openMenuButton.checked = false;

  // Add a click event listener to the openMenuButton
  openMenuButton.addEventListener("click", function () {
    offCanvasMenu.classList.toggle("open");
  });

  // Ensure the menu is closed when the page is fully loaded
  closeMenu();

  // Get a reference to the checkbox element
  const checkbox = document.getElementById("checkbox1");

  // Add an event listener to listen for changes in the checkbox state
  // body overflow scroll
  var offCanvasMenu = document.getElementById("off-canvas-menu");

  // Function to update body overflow property
  function updateBodyOverflow() {
    if (offCanvasMenu.classList.contains("open")) {
      // If it has the class, set body overflow to hidden
      document.body.style.overflow = "hidden";
    } else {
      // If it doesn't have the class, set body overflow to scroll
      document.body.style.overflow = "scroll";
    }
  }

  // Function to check viewport width
  function isMobile() {
    return window.innerWidth <= 574;
  }

  // Call the function on page load
  updateBodyOverflow();

  // Add an event listener to handle changes in the "open" class
  offCanvasMenu.addEventListener("click", function () {
    // Toggle the "open" class on each click
    offCanvasMenu.classList.toggle("open");

    // Update the body overflow property if the viewport width is up to 574 pixels
    if (isMobile()) {
      updateBodyOverflow();
    }
  });

  // Add a resize event listener to update the body overflow property on window resize
  window.addEventListener("resize", function () {
    // Update the body overflow property if the viewport width is up to 574 pixels
    if (isMobile()) {
      updateBodyOverflow();
    }
  });
  // end
});

// Change colors of text-content blocks

document.addEventListener("DOMContentLoaded", function () {
  // Define the classes for each animated gradient
  const gradientClasses = [
    "color-box-green",
    "color-box-red",
    "color-box-blue",
    "color-box-yellow",
  ];
  // Get all elements with the class 'color-box'
  const colorBoxes = document.querySelectorAll(".color-box");

  // Iterate over each 'color-box' element
  colorBoxes.forEach((el, index) => {
    // Add the class to apply the animated gradient
    el.classList.add(gradientClasses[index % gradientClasses.length]);
  });
});
// colors of text-content end
// anmate logos over images
document.addEventListener("DOMContentLoaded", () => {
  // Define the callback function for the Intersection Observer
  const observerCallback = (entries, observer) => {
    entries.forEach((entry) => {
      // Check if the element is in view
      if (entry.isIntersecting) {
        // Add a class that starts the animation
        entry.target.classList.add("start-animation");
        // Stop observing the element after animation starts
        observer.unobserve(entry.target);
      }
    });
  };

  // Set up the Intersection Observer options
  const observerOptions = {
    root: null, // observe changes in the viewport
    rootMargin: "0px",
    threshold: 0.1, // callback will be invoked when 10% of the target is visible
  };

  // Create the Intersection Observer
  const observer = new IntersectionObserver(observerCallback, observerOptions);

  // Get all elements with the 'feature-logo' class
  const logos = document.querySelectorAll(".feature-logo");

  // Observe each 'feature-logo' element
  logos.forEach((logo) => {
    observer.observe(logo);
  });
});
// animate logos end
