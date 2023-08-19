
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

