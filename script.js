var x = null;
var errorMsg = document.getElementById('error');
var xMsg = document.getElementById('x'); // variable to save "X" in div block
var xButtons = document.querySelectorAll(".x_coordinate_button");



function storeVar(value){
	makeButtonRed(value);	   
	x=value;
	xMsg.value = x;
}

function makeButtonRed(number){
	clearAllButtons();
	for (let button of xButtons){
		if (button.value == number){
			button.classList.add("red_button");
		}
	}
}


function clearAllButtons(){
	for (let button of xButtons){
			button.classList.remove("red_button");
	}
}

function validateForm(){

	var y= document.form.y_coordinat.value.replace(",", ".");
	var radius= document.form.radius.value.replace(",", ".");

	if (y.length >= 10 ){
		errorMsg.innerHTML="Много цифр после запятой у 'Y'! Максимальное количество чисел позле запятой 8!";
		return false;
	} 
	if (radius.length >= 10 ){
		errorMsg.innerHTML="Много цифр после запятой у радиуса! Максимальное количество чисел позле запятой 8!";
		return false;
	} 

	
	if ( x == null ){
		
			errorMsg.innerHTML="Некорректное значение 'X'!";
			return false;
		} else if (isNaN(y) || y == "" ||  y >= 3 || y <= -5){
			errorMsg.innerHTML="Некорректное значение 'Y'!";
			return false;
		} else if (isNaN(radius) || radius == "" || radius >= 5 || radius <= 2 ){
			errorMsg.innerHTML="Некорректное значение радиуса!";
			return false;
		} else {
			return true;
}
}

function digitalClock() {
	    var date = new Date(); 
	    var year = date.getFullYear();
	    var month = date.getMonth() + 1;
	    var day = date.getDate();
	    var hours = date.getHours();
	    var minutes = date.getMinutes();
	    var seconds = date.getSeconds();
	   
	       //* добавление ведущих нулей */
	      if (hours < 10) hours = "0" + hours;
	      if (minutes < 10) minutes = "0" + minutes;
	      if (seconds < 10) seconds = "0" + seconds;
	        document.getElementById("id_clock").innerHTML = year + "/" + month + "/" + day + " " + hours + ":" + minutes + ":" + seconds;
	        setTimeout("digitalClock()", 1000);
	   }

