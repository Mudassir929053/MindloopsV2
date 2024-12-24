window.addEventListener('load', function () {
    // Hide the preloader when the page is fully loaded.
    // document.getElementById('preloader').style.display = 'none';
    //   document.getElementById('preloader').style.display = 'none';
  });

  
// Function to check internet speed.
function checkInternetSpeed(callback) {
    var startTime = new Date().getTime();
    var xhr = new XMLHttpRequest();
    xhr.open('GET', 'https://mindloops.org', true);
    
    xhr.onreadystatechange = function () {
      if (xhr.readyState === 4 && xhr.status === 200) {
        var endTime = new Date().getTime();
        var duration = endTime - startTime;
        callback(duration);
      }
    };
    
    xhr.send();
  }

  // Function to show loader if internet is slow.
  function showLoaderIfSlow() {
    checkInternetSpeed(function (responseTime) {
      if (responseTime > 3000) { // Adjust the threshold as needed (in milliseconds).
        // Show your loader here.
        document.getElementById('slow-internet-loader').style.display = 'block';
      }
    });
  }

  // Call the function to check for slow internet and show the loader.
  showLoaderIfSlow();



  

  $(document).ready(function(){
    // Check if the cookie "accept_cookies" is not set
    if(!getCookie("accept_cookies")) {
        // Show the cookies acceptance modal
        $("#cookiesModal").modal("show");
    }

    // Function to set a cookie with a given name and value
    function setCookie(name, value, days) {
        var expires = "";
        if (days) {
            var date = new Date();
            date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
            expires = "; expires=" + date.toUTCString();
        }
        document.cookie = name + "=" + value + expires + "; path=/";
    }

    // Function to get the value of a cookie by name
    function getCookie(name) {
        var nameEQ = name + "=";
        var cookies = document.cookie.split(';');
        for(var i = 0; i < cookies.length; i++) {
            var cookie = cookies[i];
            while (cookie.charAt(0) == ' ') {
                cookie = cookie.substring(1, cookie.length);
            }
            if (cookie.indexOf(nameEQ) == 0) {
                return cookie.substring(nameEQ.length, cookie.length);
            }
        }
        return null;
    }

    // Event handler for accepting cookies
    $("#accept-cookies").click(function() {
        // Set the "accept_cookies" cookie with a value of "true" that expires in 365 days
        setCookie("accept_cookies", "true", 365);
    });
});

