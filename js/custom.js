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
  // ========== Nav Start =========
  // Variables for the open menu button and the off-canvas menu
  var openMenuButton = document.getElementById("checkbox1");
  var offCanvasMenu = document.querySelector(".off-canvas-menu");

  // Function to toggle the 'open' class of the off-canvas menu
  openMenuButton.addEventListener("click", function () {
    if (offCanvasMenu.classList.contains("open")) {
      offCanvasMenu.classList.remove("open");
    } else {
      offCanvasMenu.classList.add("open");
    }
  });

  // ========== Nav End =========
});
// animate logos end

document.addEventListener("DOMContentLoaded", function () {
  function handleEntry(entries, observer) {
    for (var i = 0; i < entries.length; i++) {
      if (entries[i].isIntersecting) {
        entries[i].target.classList.add("is-visible");
        observer.unobserve(entries[i].target); // Ensures animation only happens once
      }
    }
  }

  if ("IntersectionObserver" in window) {
    // IntersectionObserver is supported
    const observer = new IntersectionObserver(handleEntry, { threshold: 0.1 });

    var containers = document.querySelectorAll(".animate-container");
    for (var i = 0; i < containers.length; i++) {
      observer.observe(containers[i]);
    }

    const textContentItems = document.querySelectorAll(".text-content-inner");
    for (var i = 0; i < textContentItems.length; i++) {
      observer.observe(textContentItems[i]);
    }
  } else {
    // Fallback: IntersectionObserver is not supported
    // Add 'is-visible' class immediately to both image containers and text content
    var containers = document.querySelectorAll(".animate-container");
    for (var i = 0; i < containers.length; i++) {
      containers[i].classList.add("is-visible");
    }

    var textContentItems = document.querySelectorAll(".text-content-inner");
    for (var i = 0; i < textContentItems.length; i++) {
      textContentItems[i].classList.add("text-content-inner-visible"); // Make sure this class adjusts the style appropriately
    }
  }
});
