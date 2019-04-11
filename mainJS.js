// Authors: Hannah Thompson and Sarah Piekarski


testSubmit = document.getElementById("testSubmit");
testCancel = document.getElementById("testCancel");


//Arrow Function
submitTest = () => {
    let title = document.getElementById("title").value;
    let author = document.getElementById("author").value;
    let testimonial = document.getElementById("testimonial").value;
    if (title === '')
    {
        document.getElementById("title").focus();
        document.getElementById("title-note").innerHTML = "Please provide a title";
        return false;
    }
    else {
        document.getElementById("title-note").innerHTML = "";
        if (author === ''){
            author = "Anonymous";
            //document.getElementById("author").setAttribute("value", "Anonymous");
        }
        if (testimonial === '')
        {
            document.getElementById("testimonial").focus();
            document.getElementById("test-note").innerHTML = "Please provide your testimonial";
            return false;
        }
        else {
            document.getElementById("test-note").innerHTML = "";
            //send data to a database
            //window.location.href = "testimonials.php";
            return true;
        }
    }

};


//Anonymous Function
cancel = function () {
    window.location.href = "testimonials.php";
};

function loadTestimonials(testimonials, user){
    let list = document.getElementById("test-list");
    for(let i=0; i<testimonials.length;i++){
        let item = document.createElement("LI");
        item.className = "card center-wide";
        let card = document.createElement("DIV");
        card.className = "card-body";

        let edit = document.createElement("A");
        edit.href = "editTestimonial.php?title=" + testimonials[i].title;
        edit.innerHTML = "Edit";
        edit.className = "edit-button";

        let del = document.createElement("A");
        del.href = "deleteTestimonial.php?title=" + testimonials[i].title;
        del.innerHTML = "Delete";
        del.className = "delete-button";
        del.value = testimonials[i].title;
        del.onclick = deleteTestimonial;

        let span = document.createElement("SPAN");

        let title = document.createElement("H5");
        title.className = "card-title title";
        let titleVal = document.createTextNode(testimonials[i].title);

        let author = document.createElement("H6");
        title.className = "card-subtitle mb-2 text-muted";
        let authorVal = document.createTextNode("By: " + testimonials[i].author);

        let testimonial = document.createElement("P");
        title.className = "card-text";
        let testVal = document.createTextNode(testimonials[i].testimonial);

        testimonial.appendChild(testVal);
        author.appendChild(authorVal);
        title.appendChild(titleVal);
        //title.addEventListener("click", details);
        title.cursor = "pointer";
        if(user === testimonials[i].username){
            span.appendChild(del);
            span.appendChild(edit);
            title.appendChild(span);
        }
        card.appendChild(title);
        card.appendChild(author);
        card.appendChild(testimonial);
        item.appendChild(card);
        list.appendChild(item);
    }
}


function deleteTestimonial() {
    if(confirm("Are you sure you want to delete?")){
        console.log("Confirmed");
        window.location.href = "deleteTestimonial.php?=" + this.value;
    }
    else{
        this.href = "";
    }
}

if(testSubmit != null && testCancel != null){
    testSubmit.addEventListener("click", submitTest);
    testCancel.addEventListener("click", cancel);
}



author = document.getElementById("author");
anon = document.getElementById("anon");







