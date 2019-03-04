let testimonialList = [
    {title: "Testimonial 1", author: "Anonymous", testimonial: "Lorem ipsum dolor sit amet, falli quidam singulis ei sea, esse mutat moderatius in sed.\n" +
            "                Cu sed doctus praesent dissentiet, cum ei graece fabulas dissentiet. Sumo falli eu sit, est tibique\n" +
            "                apeirian ei. At wisi consequat per, ut erant munere necessitatibus nec.\n" +
            "\n" +
            "                Cum cu periculis definitiones reprehendunt, id his soluta minimum liberavisse. An petentium efficiendi\n" +
            "                quaerendum eum, pro te fabulas invidunt complectitur. Choro lobortis ex mei, no quot legere laoreet mei.\n" +
            "                Eum no laoreet quaerendum."},
    {title: "Testimonial 2", author: "Author 2", testimonial: "Altera ancillae sit te, ius ei veniam quaeque percipitur. Pro ne errem nihil lucilius,\n" +
            "                eum id homero propriae dissentiet. Id aliquip labitur eum, pro id dico iusto pertinacia, inani\n" +
            "                intellegat has te. Option invidunt te vel, nisl munere tritani ut per. Sit ex solum virtute. At epicurei\n" +
            "                molestiae est, no sit animal legimus."}
    ];

testSubmit = document.getElementById("testSubmit");
testCancel = document.getElementById("testCancel");

function submitTest() {
    let title = document.getElementById("title").value;
    let author = document.getElementById("author").value;
    let testimonial = document.getElementById("testimonial").value;
    if (title === '')
    {
        document.getElementById("title").focus();
        document.getElementById("title-note").innerHTML = "Please provide a title";
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
        }
        else {
            document.getElementById("test-note").innerHTML = "";
            created = {"test": title, "author": author, "testimonial": testimonial};
            testimonialList.push(created);
        //    send data to a database
            window.location.href = "testimonials.html";
        }
    }

}

function cancel() {
    window.location.href = "testimonials.html";
}

function loadTestimonials(){
    let list = document.getElementById("test-list");
    for(let i=0; i<testimonialList.length;i++){
        let item = document.createElement("LI");
        item.className = "card center-wide";
        let card = document.createElement("DIV");
        card.className = "card-body";

        let title = document.createElement("H5");
        title.className = "card-title title";
        let titleVal = document.createTextNode(testimonialList[i].title);

        let author = document.createElement("H6");
        title.className = "card-subtitle mb-2 text-muted";
        let authorVal = document.createTextNode("By: " + testimonialList[i].author);

        let testimonial = document.createElement("P");
        title.className = "card-text";
        let testVal = document.createTextNode(testimonialList[i].testimonial);

        testimonial.appendChild(testVal);
        author.appendChild(authorVal);
        title.appendChild(titleVal);
        title.addEventListener("click", details);
        title.cursor = "pointer";
        card.appendChild(title);
        card.appendChild(author);
        card.appendChild(testimonial);
        item.appendChild(card);
        list.appendChild(item);
    }
}

function details() {
    window.location.href = "focusTestimonial.html";
}

if(testSubmit != null && testCancel != null){
    testSubmit.addEventListener("click", submitTest);
    testCancel.addEventListener("click", cancel);
}



author = document.getElementById("author");
anon = document.getElementById("anon");






