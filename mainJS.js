testSubmit = document.getElementById("testSubmit");
testCancel = document.getElementById("testCancel")

author = document.getElementById("author");
anon = document.getElementById("anon");

function submitTest() {
    
    window.location.href = "testimonials.html";
}

function cancel() {
    window.location.href = "testimonials.html";
}

testCancel.addEventListener("click", cancel);
testSubmit.addEventListener("click", submitTest);