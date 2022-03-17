async function reg_btn_click() {
	var loginbtn = document.getElementById("login")
    var regbtn = document.getElementById("register")

	console.log('animacio start');
    loginbtn.setAttribute("style", "animation-name: login-reg;")
	regbtn.setAttribute("style", "animation-name: reg-reg;")

	await new Promise(r => setTimeout(r, 600));
	loginbtn.setAttribute("style", "transform: translate(-238%);")
	regbtn.setAttribute("style", "transform: translate(-238%);")
	console.log('animacio end');
}


//turbo mad

