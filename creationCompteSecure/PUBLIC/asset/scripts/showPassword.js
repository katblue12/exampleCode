//** STOCK THE VARIABLES WITH THE INTERCHANGABLE CONTENT OF THE BUTTON */
let y = "Cacher le mot de passe";
let z = "Voir le mot de passe";

//** RECUPERATE ALL HTML ELEMENTS THAT HAVE THE CLASS NAMES DISPLAYED IN THE BRACKETS AND ADD THEM TO THE CLASSLIST */
let see = document.querySelector(".view");
let hide = document.querySelector(".hide");

let viewType = document.querySelector(".viewPass");
let hideType = document.querySelector(".hidePass");
let viewShow = document.querySelector(".passShow");
let viewHide = document.querySelector(".passHide");

//** ADD AN EVENT LISTENER, TYPE CLICK, TO THE BUTTON */
see.addEventListener("click", function(){
    if(see.classList.contains("view")){
//** MODIFY THE TYPE OF THE INPUT FROM PASSWORD TO TEXT TO SEE THE PASSWORD ON CLEAR */
        viewType.type = "text";
        viewShow.type = "text";
//** MODIFY THE CONTENT OF THE BUTTON TO HIDE PASSWORD */
        see.textContent = y;
        see.classList.toggle("hide");
        see.classList.toggle("view");

        viewType.classList.toggle("hidePass");
        viewType.classList.toggle("viewPass");
        viewShow.classList.toggle("hidePass");
        viewShow.classList.toggle("viewPass");
    
    }else if(see.classList.contains("hide")){
//** MODIFY THE INPUT TYPE TO PASSWORD TO HIDE THE CONTENT */
        viewType.type = "password";
        viewShow.type = "password";
//** MODIFY THE CONTENT TO SHOW PASSWORD */
        see.textContent = z;
        see.classList.toggle("view");
        see.classList.toggle("hide");

        viewType.classList.toggle("viewPass");
        viewType.classList.toggle("hidePass");
        viewShow.classList.toggle("viewPass");
        viewShow.classList.toggle("hidepass");

    }

});


