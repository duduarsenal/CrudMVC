function msgError(msg) {
    let msgError = document.querySelector("#msgError");
  
    msgError.innerHTML = msg;
    msgError.setAttribute("style", "opacity: 1");
}

function msgSucess(msg) {
    let msgSucess = document.querySelector("#msgSucess")
  
    msgSucess.innerHTML = msg;
    msgSucess.setAttribute("style", "opacity: 1");
  }

function sidebarOpen() {
    document.getElementById("mySidebar").style.display = "flex";
}

function sidebarClose() {
    document.getElementById("mySidebar").style.display = "none";
}
