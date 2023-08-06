
function add() {
    location.replace("file:///C:/laragon/www/pms/add.html")
  }

  function edit() {
    location.replace("file:///C:/laragon/www/pms/edit.html")
  }
  function deleted() {
    let text = "Press a button!\nEither OK or Cancel.";
    if (confirm(text) === true) {
      popup=` <div class="alert alert-warning alert-dismissible fade show" role="alert">
      <strong>You pressed OK!</strong> 
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>`
    
    } else {
      popup=` <div class="alert alert-danger alert-dismissible fade show" role="alert">
      <strong>You canceled!
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>`
    }
    document.getElementById("demo").innerHTML = popup;
  }
  // navItems Active
  function changeColor(element) {
    // Remove the "active" class from all nav-items
    const navItems = document.getElementsByClassName('nav-link');
    for (let i = 0; i < navItems.length; i++) {
      navItems[i].classList.remove('activeclr');
    }
    
    // Add the "active" class to the clicked nav-item
    element.classList.add('activeclr');
  }
  // navItems Active
//  new project button disabled
 var checker = document.getElementById('gridCheck');
var sendbtn = document.getElementById('pjtbtn');
checker.onchange = function() {
  sendbtn.enable === this.checked;
};
//  new project button disabled

