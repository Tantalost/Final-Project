const selectAllCheckbox = document.getElementById('select-all-checkbox');
const checkboxes = document.querySelectorAll('.checkbox');
const button = document.querySelector('.button');
const bottomSelect = document.querySelector('.bottom-select');
const totalCount = document.getElementById('total-count');

function countBooks() {
    const checkedBoxes = Array.from(checkboxes).filter(cb => cb.checked);
    const count = checkedBoxes.length;

    totalCount.textContent = count;

    if (count > 0) {
        bottomSelect.classList.add('active');
    } else {
        bottomSelect.classList.remove('active');
    }

    button.disabled = count === 0;
}

selectAllCheckbox.addEventListener('change', function () {
    checkboxes.forEach(cb => cb.checked = selectAllCheckbox.checked);
    countBooks(); 
});

checkboxes.forEach(cb => {
    cb.addEventListener('change', () => {
        countBooks(); 

        const allChecked = Array.from(checkboxes).every(cb => cb.checked);
        selectAllCheckbox.checked = allChecked;
    });
});
