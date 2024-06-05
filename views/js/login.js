
console.log("js-on");
 

function passerror(){
    var status = document.getElementById('ken').innerText +="\nPassword is not correct !";
    var status = document.getElementById('ken').classList.add('blockerror');
};

function blockerror(){
    console.log("blockerror")
   
    var status = document.getElementById('ken').innerText +="\nYour  account  is  blocked ! \n Please contact the admin";
    var status = document.getElementById('ken').classList.add('blockerror');
    // const para = document.createElement("p");
    // const textNode = document.createTextNode(" ");
    // para.appendChild(textNode);
    // var status = document.getElementById('ken').appendChild(para);
};

function mailsent(){
    var status = document.getElementById('ken').innerText +="\nEmail Sent, go get your Pass!";
    var status = document.getElementById('ken').classList.add('mail');
};

function mailsent(){
    var status = document.getElementById('ken').innerText +="\nEmail Sent, go get your Pass!";
    var status = document.getElementById('ken').classList.add('mail');
};



const inputt = document.getElementById("inputPassword");
const log = document.getElementById("inputPasswordConfirm");
const log2 = document.getElementById("textcpass");

console.log(inputt.value);

console.log(log2.value);
//log.addEventListener("input", updateValue);

// function updateValue(e) {
//     console.log("dansc");
//   log.textContent = e.target.value;
// }
if(log)
{
    log.addEventListener("input", (e) => {
        if(inputt.value==log.value){
            console.log(" kifkif")
            log2.textContent="similaire";
        }else{
            console.log("mouch kifkif")
            log2.textContent="non similaire";
        }
        console.log("dansc");
      });
}

if(log)
{

}

