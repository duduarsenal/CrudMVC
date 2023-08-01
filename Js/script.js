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

// var count = 0;
// let slider = document.querySelector('#slider')

// function ClickEsquerdo(){
//   if (count == 0){
//     console.log('limite máximo')
//     console.log('contador = 0')
//   } else if (count == 1){
//     slider.setAttribute('style', 'margin-left: 0');
//     count = 0;
//     console.log('contador = 1')
//   } else if (count == 2){
//     slider.setAttribute('style', 'margin-right: 1024px');
//     count = 1;
//     console.log('contador = 2')
//   }
// }

// function ClickDireito(){
//   if (count == 0){
//     slider.setAttribute('style', 'margin-right: 1024px');
//     count = 1;
//   } else if (count == 1){
//     slider.setAttribute('style', 'margin-right: 2048px');
//     count = 2;
//   } else if (count == 2){
//     console.log('limite máximo')
//   }
// }