//** I CALL THE API WHICH HAS RETREIVED THE INFORMATION FROM PHP AND ENCODED IT INTO JSON */
const url1 = "./api/apiShots.php";
//** I USE THE ASYNC FUNCTION TO ENSURE THE INSTRUCTIONS OF THE FUNCTION ARE NOT CARRIED OUT SIMULTANEOUSLY*/
async function showAssoc(){
//** I USE THE FETCH WHICH CONTAINS GET TO RECUPERATE THE INFORMATION FROM THE API */
const associ = await fetch(url1);
//** I THEN INSTRUCT JS TO USE THE JSON CONTAINED IN THE FIRST VARIABLE STOCKING MY REQUEST IN A SECOND */
const details = await associ.json();
//** HERE I CREATE A FOR LOOP TO TOUR THE JSON AND RECUPERATE THE INFORMATION. AS THE JSON iS INDEXED 
//** I DECLARE [0] AFTER THE VARIABLE */
for(let y in details[0]){
//** I CREATE THE HTML ELEMENTS REQUIRED I CREATE STOCK THEN APPEND AS I THERE IS A PROBLEM IT 
//** THE USER IS NOT LEFT WITH AN EMPTY HTML ELEMENT AS THE SCOPE WOULD MAKE THIS HAPPEN */
    let section = document.getElementById("show_shot");
    let article = document.createElement("article");
    let figure = document.createElement("figure");
    let image = document.createElement("img");
    let name = document.createElement("P");
    let keyword = document.createElement("strong");
    let description = document.createElement("P");
    let need = document.createElement("P");
    let first = document.createElement("P");
    let second = document.createElement("P");
    let third = document.createElement("P");
    let form = document.createElement("form");
    let idhide = document.createElement("input");
//** I STOCK THE SEO OF THE PAGE IN A VARIABLE AS THIS WILL BE EASY TO CHANGE AS TRENDS CHANGE */
    let seo =" shooter";
//** STOCKAGE OF THE CREATED HTML ELEMENTS USING DATA RETREIVED FROM THE JSON AS I AM IN THE LOOP THIS WILL CREATE
//** AS MANY ITEMS AS ARE FOUND IN THE JSON*/
    image.setAttribute("src","./image/"+details[0][y].image_partyitem+"");
    image.setAttribute("alt", seo);
    name.textContent+= ""+details[0][y].name_partyitem+"";
    keyword.textContent=seo;
    keyword.style.fontWeight="normal";
    description.textContent+=""+details[0][y].description_partyitem+"";
    need.textContent+="Tu auras besoin:";
    first.textContent+=""+details[1][y].one+"";
    second.textContent+=""+details[2][y].two+"";
    third.textContent+=""+details[3][y].three+"";
    form.setAttribute("action","");
    form.setAttribute("method","post");
    idhide.setAttribute("type","hidden");
    idhide.setAttribute("name","id_partyitem");
    idhide.setAttribute("value",""+details[0][y].id_partyitem+"");
//** I APPEND THE HTML ELEMENTS TO THE PARENT CONTAINER IN THE VIEW */
    section.appendChild(article);
    article.appendChild(figure);
    figure.appendChild(image);
    article.appendChild(name);
    name.appendChild(keyword);
    article.appendChild(description);
    article.appendChild(need);
    article.appendChild(first);
    article.appendChild(second);
    article.appendChild(third);
    article.appendChild(form);
    form.appendChild(idhide);

//**  AS I REWARD REGISTERED USERS WITH A STOCKAGE SPACE FOR IDEAS THEY LIKE I USE THE APPEARANCE OF 
//** A DYNAMIC PARAGRAPH, THE CONTENT CHANGES ACCORDING TO THE USER TYPE. IF THE PARAGRAPH IS PRESENT 
//** THAT MEANS THE USER TYPE IS REGISTERED AND I ALLOW THEM ACCESS TO THE STOCKAGE SPACE BY CREATING A BUTTON
//** AND APPENDING IT TO THE PARENT */ 
 let rights = document.getElementById("breadcrumb");
if(rights){
        let saveItem = document.createElement("input");
        saveItem.setAttribute("type","submit");
        saveItem.setAttribute("name","add_plan");
        saveItem.setAttribute("value","Ajouter au planner");
        form.appendChild(saveItem);
        }          
    }
}
showAssoc();

    
