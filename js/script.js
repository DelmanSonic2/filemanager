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
var templatearr = document.querySelectorAll(".add_file");
templatearr.forEach(element => {
    element.addEventListener('click',function(){
        var dn = document.querySelector('.dn');
        dn.style.display = 'flex';
        var attr = element.getAttribute('template');
        var tmp = document.querySelector('.input_template');
        tmp.value = attr;
    })
});