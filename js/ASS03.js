document.addEventListener("DOMContentLoaded", function () {
    var users = document.getElementById('btn').textContent;
  
    var projects = document.getElementById("adp");
    var conferences = document.getElementById("rep");
    var projects2 = document.getElementById("ddp");
    var conferences2 = document.getElementById("dep");
  
    if (users === "Admin") {
      projects.style.display = "block";
      conferences.style.display = "block";
      projects2.style.display = "block";
      conferences2.style.display = "block";
    } 
    else {
      projects.style.display = "none";
      conferences.style.display = "none";
      projects2.style.display = "none";
      conferences2.style.display = "none";
    }
  });
  