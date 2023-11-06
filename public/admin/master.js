const allSideMenu = document.querySelectorAll('#sidebar .side-menu.top li a');

allSideMenu.forEach(item=> {
	const li = item.parentElement;

	item.addEventListener('click', function () {
		allSideMenu.forEach(i=> {
			i.parentElement.classList.remove('active');
		})
		li.classList.add('active');
	})
});




// TOGGLE SIDEBAR
const menuBar = document.querySelector('#content nav .bx.bx-menu');
const sidebar = document.getElementById('sidebar');

menuBar.addEventListener('click', function () {
	sidebar.classList.toggle('hide');
})







const searchButton = document.querySelector('#content nav form .form-input button');
const searchButtonIcon = document.querySelector('#content nav form .form-input button .bx');
const searchForm = document.querySelector('#content nav form');

searchButton.addEventListener('click', function (e) {
	if(window.innerWidth < 576) {
		e.preventDefault();
		searchForm.classList.toggle('show');
		if(searchForm.classList.contains('show')) {
			searchButtonIcon.classList.replace('bx-search', 'bx-x');
		} else {
			searchButtonIcon.classList.replace('bx-x', 'bx-search');
		}
	}
})





if(window.innerWidth < 768) {
	sidebar.classList.add('hide');
} else if(window.innerWidth > 576) {
	searchButtonIcon.classList.replace('bx-x', 'bx-search');
	searchForm.classList.remove('show');
}


window.addEventListener('resize', function () {
	if(this.innerWidth > 576) {
		searchButtonIcon.classList.replace('bx-x', 'bx-search');
		searchForm.classList.remove('show');
	}
})



const switchMode = document.getElementById('switch-mode');

switchMode.addEventListener('change', function () {
	if(this.checked) {
		document.body.classList.add('dark');
	} else {
		document.body.classList.remove('dark');
	}
})


// popp up 

const openBtn = document.getElementById("openModal");
const closeBtn = document.getElementById("closModal");
const closeBtn2 = document.getElementById("closModal2");
const modal = document.getElementById("Modal");

openBtn.addEventListener("click", (e) => {
    modal.classList.add("open");
    console.log("ahmed");
});
closeBtn2.addEventListener("click", (e) => {
    modal.classList.remove("open");
    console.log("closed");
});




// const form = document.getElementById('form');


// form.addEventListener('submit', e => {
//     e.preventDefault();
    
//     // 
//     const isValid = validateInputs();
    
//     if (isValid) {
//         modal.classList.remove("open");
//         console.log("true");
//     } else {
//         console.log("false");
//     }
    
// });

const setError = (element, message) => {
    const inputControl = element.parentElement;
    const errorDisplay = inputControl.querySelector('.error');

    errorDisplay.innerText = message;
    inputControl.classList.add('error');
    inputControl.classList.remove('success')
}

const setSuccess = element => {
    const inputControl = element.parentElement;
    const errorDisplay = inputControl.querySelector('.error');

    errorDisplay.innerText = '';
    inputControl.classList.add('success');
    inputControl.classList.remove('error');
};

// const isValidEmail = email => {
//     const re = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
//     return re.test(String(email).toLowerCase());
// }
// const validateInputs = () => {
//     const usernameValue = username.value.trim();
//     const emailValue = email.value.trim();
//     const passwordValue = password.value.trim();
//     const password2Value = password2.value.trim();

//     let isValid = true; // Assume all inputs are valid by default

//     switch (true) {
//         case usernameValue === '':
//             setError(username, 'Username is required');
//             isValid = false;
//             break;
//         default:
//             setSuccess(username);
//     }

//     switch (true) {
//         case emailValue === '':
//             setError(email, 'Email is required');
//             isValid = false;
//             break;
//         case !isValidEmail(emailValue):
//             setError(email, 'Provide a valid email address');
//             isValid = false;
//             break;
//         default:
//             setSuccess(email);
//     }

//     switch (true) {
//         case passwordValue === '':
//             setError(password, 'Password is required');
//             isValid = false;
//             break;
//         case passwordValue.length < 8:
//             setError(password, 'Password must be at least 8 characters.');
//             isValid = false;
//             break;
//         default:
//             setSuccess(password);
//     }

//     switch (true) {
//         case password2Value === '':
//             setError(password2, 'Please confirm your password');
//             isValid = false;
//             break;
//         case password2Value !== passwordValue:
//             setError(password2, "Passwords don't match");
//             isValid = false;
//             break;
//         default:
//             setSuccess(password2);
//     }

//     return isValid; // Return true if all fields are valid, otherwise return false
// };


