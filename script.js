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

    // Remplit les champs cachés dans le formulaire de la deuxième étape
    document.getElementById('hidden-name').value = name;
    document.getElementById('hidden-firstname').value = firstname;
    document.getElementById('hidden-mail').value = mail;
    document.getElementById('hidden-pwd').value = pwd;

    // Cache l'étape 1 et affiche l'étape 2
    document.getElementById('signup-step1').style.display = 'none';
    document.getElementById('signup-step2').style.display = 'block';
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