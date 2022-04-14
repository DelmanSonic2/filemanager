var accordeon = document.querySelectorAll(".accordion");
accordeon.forEach(element => {
    element.addEventListener('click', function () {
        var panel = element.parentElement.querySelector('.panel');
        if (panel.style.display === "block") {
            panel.style.display = "none";
        } else {
            panel.style.display = "block";
        }
    })
});

var dn = document.querySelector('.dn');

var fn = document.querySelector('.add_file_form');
var templatearr = document.querySelectorAll(".add_file");
templatearr.forEach(element => {
    element.addEventListener('click', function () {
        dn.style.display = 'flex';
        var attr = element.getAttribute('template');
        var tmp = document.querySelector('.input_template');
        tmp.value = attr+"/new_file";
        fn.style.display = 'flex';
    })
});


var rvtn = document.querySelector('.rename_template_null');
var rvt = document.querySelector('.rename_template');
var rn = document.querySelector('.rename_file_form');
var renamed = document.querySelectorAll('.rename');
renamed.forEach(element => {
    element.addEventListener('click', function () {
        rn.style.display = 'flex';
        dn.style.display = 'flex';
        rvtn.value = element.getAttribute('template');
        rvt.value = element.getAttribute('template');
    })
});

var fdn = document.querySelector('.add_folder_form');
var templatearr = document.querySelectorAll(".add_folder");
templatearr.forEach(element => {
    element.addEventListener('click', function () {
        dn.style.display = 'flex';
        var attr = element.getAttribute('template');
        var tmp = document.querySelector('.input_template_folder');
        tmp.value = attr+"/new_folder";
        fdn.style.display = 'flex';
    })
});


dn.addEventListener('dblclick', function () {
    dn.style.display = 'none';
    fn.style.display = 'none';
    rn.style.display = 'none';
    fdn.style.display= 'none';
})