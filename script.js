function openModalLogin() {
    document.getElementById("loginModal").style.display = "block";
}

// Fermer la pop-up
function closeModalLogin() {
    document.getElementById("loginModal").style.display = "none";
}

function openModalSignup() {
    document.getElementById('signupModal').style.display = 'block';
    document.getElementById('signup-step1').style.display = 'block';
    document.getElementById('signup-step2').style.display = 'none';
}

function closeModalSignup() {
    document.getElementById('signupModal').style.display = 'none';
}

function goToStep1() {
    document.getElementById('signup-step1').style.display = 'block';
    document.getElementById('signup-step2').style.display = 'none';
}

function goToStep2() {
    // Récupère les données de la première étape
    const name = document.getElementById('name').value;
    const firstname = document.getElementById('firstname').value;
    const mail = document.getElementById('signin-mail').value;
    const pwd = document.getElementById('signin-pwd').value;

    // Vérifie que tous les champs de la première étape sont remplis
    if (!firstname || !name || !mail || !pwd) {
        alert('Veuillez remplir tous les champs de la première étape.');
        return;
    }

    // Vérifie que l'adresse mail est valide
    if (!validateEmail(mail)) {
        alert("Veuillez entrer une adresse email valide.");
        return;
    }

    // Vérifie que le mot de passe est valide
    if (!validatePassword(pwd)) {
        alert("Le mot de passe doit contenir au moins 8 caractères, une majuscule, une minuscule et un chiffre.");
        return;
    }

    // Remplit les champs cachés dans le formulaire de la deuxième étape
    document.getElementById('hidden-name').value = name;
    document.getElementById('hidden-firstname').value = firstname;
    document.getElementById('hidden-mail').value = mail;
    document.getElementById('hidden-pwd').value = pwd;

    // Cache l'étape 1 et affiche l'étape 2
    document.getElementById('signup-step1').style.display = 'none';
    document.getElementById('signup-step2').style.display = 'block';
}



function validateSignupForm(event) {
    const phone = document.getElementById('phone').value;
    const postal = document.getElementById('postal').value;

    if (!/^\d+$/.test(phone) || phone.length < 8 || phone.length > 15) {
        alert("Veuillez entrer un numéro de téléphone valide.");
        event.preventDefault();
        return false;
    }

    if (!/^\d{4,5}$/.test(postal)) {
        alert("Veuillez entrer un code postal valide.");
        event.preventDefault();
        return false;
    }

    return true;
}


function validateLoginForm(event) {
    const email = document.getElementById('login-mail').value;
    const password = document.getElementById('login-pwd').value;

    if (!validateEmail(email)) {
        alert("Veuillez entrer une adresse email valide.");
        event.preventDefault();
        return false;
    }

    if (password.length < 8) {
        alert("Le mot de passe doit contenir au moins 8 caractères.");
        event.preventDefault();
        return false;
    }

    return true;
}


// Validation d'un email avec regex (étudier les correspondances)
function validateEmail(email) {
    const emailRegex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
    return emailRegex.test(email);
}


function validatePassword(password) {
    const passwordRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{8,}$/;
    return passwordRegex.test(password);
}

function openModal(modalId) {
    const modal = document.getElementById(modalId);
    if (modal) {
        modal.style.display = 'flex'; // Affiche la modal
    } else {
        console.error(`Modal with ID ${modalId} not found.`);
    }
}

function closeModal(modalId) {
    const modal = document.getElementById(modalId);
    if (modal) {
        modal.style.display = 'none'; // Cache la modal
    } else {
        console.error(`Modal with ID ${modalId} not found.`);
    }
}

function openModalPost(modalID){
    document.getElementById(modalID).style.display = "flex";
}

function closeModalPost(modalID){
    document.getElementById(modalID).style.display = "none";
}

function toggleMenu() {
    document.querySelector(".navbar ul").classList.toggle("active");
}

// Associer les fonctions de validation aux formulaires 
document.addEventListener("DOMContentLoaded", function () {
    const formStep2 = document.querySelector("#form-step2");
    const loginForm = document.querySelector("#loginModal form");

    if (formStep2) {
        formStep2.addEventListener("submit", validateSignupForm);
    }

    if (loginForm) {
        loginForm.addEventListener("submit", validateLoginForm);
    }
});