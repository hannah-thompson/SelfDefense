function setFocus() {
    let title = document.getElementById("title");
    title.focus();
}

document.getElementById("title").autofocus;

testSubmit = document.getElementById("testSubmit");

author = document.getElementById("author");
anon = document.getElementById("anon");
if(anon.checked){
    author.disable();
}
