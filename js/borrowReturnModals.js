const viewmodal = document.getElementById('viewmodal');

const closeButtons = document.querySelectorAll('.close');
const confirmationModal = document.getElementById('confirmationModal');
const successModal = document.getElementById('successModal');
const confirm = document.getElementById('confirm');


const openBorrow = document.getElementById('borrowbutton');
const borrowModal = document.getElementById('borrowModal');
const borrowProceed = document.getElementById('proceed');

const daysInput = document.getElementById('days');
const dueDate = document.getElementById('dueDate');
const dateBorrowed = document.getElementById('dateBorrowed');
const alertText = document.getElementById('alertText');

const today = new Date();
const options = { year: 'numeric', month: 'long', day: 'numeric' };

if (dateBorrowed) {
    dateBorrowed.textContent = today.toLocaleDateString(undefined, options);
    borrowProceed.disabled = true;

    daysInput.addEventListener('input', () => {
        const days = parseInt(daysInput.value);

        if (!isNaN(days) && days >= 1 && days <= 31) {
            borrowProceed.disabled = false;
            alertText.style.display = 'none';

            const due = new Date(today);
            due.setDate(today.getDate() + days);
            dueDate.textContent = due.toLocaleDateString(undefined, options);
        } else {
            borrowProceed.disabled = true;
            alertText.style.display = 'block';
            dueDate.textContent = '';
        }
    });
}


if (openBorrow) {
    openBorrow.addEventListener("click", function () {
        viewmodal.style.display = "flex";
        borrowModal.style.display = "flex";
        confirmationModal.style.display = "none";
        successModal.style.display = "none";
    });

    borrowProceed.addEventListener("click", function (e) {
        e.preventDefault();
        borrowModal.style.display = "none";
        confirmationModal.style.display = "flex";
    });
}


const openReturn = document.getElementById('returnbutton');
const returnmodal = document.getElementById('returnmodal');
const returnProceed = document.getElementById('return'); 


if (openReturn) {
    openReturn.addEventListener("click", function () {
        viewmodal.style.display = "flex";
        returnmodal.style.display = "flex";
        confirmationModal.style.display = "none";
        successModal.style.display = "none";
    });

    returnProceed.addEventListener("click", function () {
        returnmodal.style.display = "none";
        confirmationModal.style.display = "flex";
    });
}

confirm.addEventListener("click", function () {
    confirmationModal.style.display = "none";
    successModal.style.display = "flex";
});


closeButtons.forEach(button => {
    button.addEventListener("click", function () {
        viewmodal.style.display = "none";
        if (borrowModal) borrowModal.style.display = "none";
        returnmodal.style.display = "none";
        confirmationModal.style.display = "none";
        successModal.style.display = "none";
    });
});


window.addEventListener("click", function (e) {
    if (e.target == viewmodal) {
        viewmodal.style.display = "none";
        if (borrowModal) borrowModal.style.display = "none";
        returnmodal.style.display = "none";
        confirmationModal.style.display = "none";
        successModal.style.display = "none";
    }
});
