var accordeon = document.querySelectorAll(".accordion");
accordeon.forEach(element => {
    element.addEventListener('click',function(){
        var panel = element.parentElement.querySelector('.panel');
        if (panel.style.display === "block") {
            panel.style.display = "none";
        } else {
            panel.style.display = "block";
        }
    })
});