testSubmit = document.getElementById("testSubmit");
testCancel = document.getElementById("testCancel")

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
        if (testimonial === '')
        {
            document.getElementById("test").focus();
            document.getElementById("test-note").innerHTML = "Please provide your testimonial";
        }
        else {
            document.getElementById("test-note").innerHTML = "";
            var rowdata = [title, author, testimonial];
        //    sent this rowdata to a database
        }
    }
    window.location.href = "testimonials.html";
}

function cancel() {
    window.location.href = "testimonials.html";
}

testCancel.addEventListener("click", cancel);
testSubmit.addEventListener("click", submitTest);


author = document.getElementById("author");
anon = document.getElementById("anon");

loadTestList = function(){
    let card = document.createElement("div");
    card.className = "card";
    let body = document.createElement("div");
    let title = document.createTextNode()
}
testList = document.getElementById("test-list");
testList.addEventListener("load", loadTestList);

