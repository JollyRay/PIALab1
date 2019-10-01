function validate(){
var messegeAboutError="";
var arrayX = []
var arrayR = []
var usersY = document.getElementById('usersY')
var checkboxes = document.querySelectorAll('input[type=checkbox]:checked')

for (var i = 0; i < checkboxes.length; i++) {
	if (checkboxes[i].name=='myCheckboxX[]'){
		arrayX.push(checkboxes[i].value)
	}else{
		arrayR.push(checkboxes[i].value)
	}
}
if (arrayX.length != 1){
	document.getElementById("fieldCheckX").style.backgroundColor = "red"
	messegeAboutError+="Выберите только 1 Х!<br>"
	event.preventDefault()
}else document.getElementById("fieldCheckX").style.backgroundColor = "transparent"
if (arrayR.length != 1){
	document.getElementById("fieldCheckR").style.backgroundColor = "red"
	messegeAboutError+="Выберите только 1 R!<br>"
	event.preventDefault()
}else document.getElementById("fieldCheckR").style.backgroundColor = "transparent"
if (!/^-?[0-2]([.,][0-9]+)?$/.test(usersY.value) && !/^[3-4]([.,][0-9]+)?$/.test(usersY.value)){
	usersY.style.backgroundColor = "red"
	messegeAboutError+="Y - должно быть числом!"
	event.preventDefault()
}else usersY.style.backgroundColor = "transparent"
var placeFromMessege = document.getElementById('messegeAboutError')
placeFromMessege.innerHTML = messegeAboutError
}

function clearTable(){
	document.getElementById("fieldCheckX").style.backgroundColor = "transparent"
	document.getElementById("fieldCheckR").style.backgroundColor = "transparent"
	usersY.style.backgroundColor = "transparent"
}

function proverka(input) { 
    var value = input.value; 
    var rep = /[-;":'a-zA-Zа-яА-Я]/;
    if (rep.test(value)) { 
        value = value.replace(rep, ''); 
        input.value = value; 
    } 
}