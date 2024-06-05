function allLetter(word) {
    var letters = /^[A-Za-z]+$/;
    if (word.match(letters)) {
      return true;
    } else {
      return false;
    }
  }
  
  function verif() {
    let firstName = document.getElementById("firstName").value;
    let lastName = document.getElementById("lastName").value;
    let address = document.getElementById("address").value;
    let dob = document.getElementById("dob").value;
    let category = document.getElementById("category").value;
  
    if (firstName === "") {
      alert("First name cannot be empty");
      return false;
    }
  
    if (allLetter(firstName) === false) {
      alert("First name can only contain alphabets");
      return false;
    }
  
    if (lastName === "") {
      alert("Last name cannot be empty");
      return false;
    }
  
    if (allLetter(lastName) === false) {
      alert("Last name can only contain alphabets");
      return false;
    }
  
    if (address === "") {
      alert("Address cannot be empty");
      return false;
    }
  
    if (dob === "") {
      alert("Date of birth cannot be empty");
      return false;
    }

    if (category === "") {
      alert("Category cannot be empty");
      return false;
    }
  
    return true;
  }
  