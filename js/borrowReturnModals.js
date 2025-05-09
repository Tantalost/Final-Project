document.addEventListener('DOMContentLoaded', () => {
    const getElem = (id) => document.getElementById(id);

    const viewmodal = getElem('viewmodal');
    const closeButtons = document.querySelectorAll('.viewmodal .close');

    const borrowModal = getElem('borrowModal');
    const confirmationModal = getElem('confirmationModal');
    const successModal = getElem('successModal');
    const returnmodal = getElem('returnmodal');
    const paymentMethodModal = getElem('paymentMethodModal');
    const payAtLibraryModal = getElem('payAtLibraryModal');
    const gcashPaymentModal = getElem('gcashPaymentModal');
    const authenticationModal = getElem('authenticationModal');
    const verifiedModal = getElem('verifiedModal');
    const successNoOverdueModal = getElem('successNoOverdueModal');

    const openBorrow = getElem('borrowbutton');
    const borrowProceed = getElem('proceed');
    const confirm = getElem('confirm');
    const openReturn = getElem('returnbutton');
    const returnProceedButton = getElem('return-modal-proceed-button');
    const selectGcashButton = getElem('selectGcash');
    const selectPayAtLibraryButton = getElem('selectPayAtLibrary');
    const proceedPayAtLibraryButton = getElem('proceedPayAtLibrary');
    const proceedGcashButton = getElem('proceedGcash');
    const proceedAuthButton = getElem('proceedAuth');

    const daysInput = getElem('days');
    const dueDate = getElem('dueDate');
    const dateBorrowed = getElem('dateBorrowed');
    const alertText = getElem('alertText');
    const returnModalBookList = getElem('return-modal-book-list');
    const borrowModalBookList = getElem('borrow-modal-book-list');
    const modalOverdueWarning = getElem('modal-overdue-warning');

    let currentModalHasOverdue = false;
    const allModalContentDivs = [
        borrowModal, returnmodal, confirmationModal, successModal,
        paymentMethodModal, payAtLibraryModal, gcashPaymentModal,
        authenticationModal, verifiedModal, successNoOverdueModal
    ].filter(Boolean);

    function showModalStep(modalToShow) {
        allModalContentDivs.forEach(step => step.style.display = 'none');
        if (viewmodal) {
            viewmodal.style.display = 'flex';
            viewmodal.classList.add('active');
        }
        if (modalToShow) {
            modalToShow.style.display = 'flex';
        }
    }

    function hideModal() {
        if (viewmodal) {
            viewmodal.style.display = 'none';
            viewmodal.classList.remove('active');
        }
        allModalContentDivs.forEach(step => step.style.display = 'none');
        currentModalHasOverdue = false;
        if (daysInput) daysInput.value = '';
        if (dueDate) dueDate.textContent = '---';
        if (borrowProceed) borrowProceed.disabled = true;
        if (alertText) alertText.style.display = 'none';
    }

    function populateBorrowModal(availableRows) {
        if (!borrowModalBookList) return false;
        borrowModalBookList.innerHTML = '';

        if (!availableRows || availableRows.length === 0) {
            borrowModalBookList.innerHTML = '<p style="padding: 20px; text-align: center;">No available books selected.</p>';
            return false;
        }

        availableRows.forEach(row => {
            const bookInfo = row.querySelector('.book-info');
            if (!bookInfo) return;

            const coverSrc = bookInfo.querySelector('.book-cover')?.src || '';
            const title = bookInfo.querySelector('h4')?.textContent || 'N/A';
            const author = bookInfo.querySelector('p:nth-of-type(1)')?.textContent || 'N/A';
            const publishedDate = bookInfo.querySelector('p:nth-of-type(2)')?.textContent || 'N/A';

            const bookItemHTML = `
                <div class="modal-book-item">
                    <img src="${coverSrc}" alt="${title}" class="book-cover">
                    <div class="modalbookdetails">
                        <h4>${title}</h4>
                        <p>${author}</p>
                        <p>${publishedDate}</p>
                    </div>
                </div>`;
            borrowModalBookList.insertAdjacentHTML('beforeend', bookItemHTML);
        });
        return true;
    }


    function populateReturnModal(selectedRows) {
        if (!returnModalBookList) return false;
        returnModalBookList.innerHTML = '';
        let hasOverdue = false;

        if (!selectedRows || selectedRows.length === 0) {
            returnModalBookList.innerHTML = '<p style="padding: 20px; text-align: center;">No books selected for return.</p>';
            return false;
        }

        selectedRows.forEach(row => {
            const bookInfo = row.querySelector('.book-info');
            const statusDiv = row.querySelector('.not-available, .available, .pending, .overdue');
            const dueDateCell = row.cells[2];

            if (!bookInfo || !statusDiv || !dueDateCell) return;

            const coverSrc = bookInfo.querySelector('.book-cover')?.src || '';
            const title = bookInfo.querySelector('h4')?.textContent || 'N/A';
            const author = bookInfo.querySelector('p:nth-of-type(1)')?.textContent || 'N/A';
            const statusText = statusDiv.textContent.trim();
            const statusClass = statusDiv.className.toLowerCase();
            const dueDate = dueDateCell.textContent.trim();
            const isOverdue = statusClass.includes('overdue') || statusClass.includes('not-available');

            let penaltyText = 'N/A';
            let statusDisplay = statusText;

            if (isOverdue) {
                hasOverdue = true;
                statusDisplay = `<span class="overdue">${statusText}</span>`;
                penaltyText = 'PHP 60.00';
            } else if (statusClass.includes('pending') || statusClass.includes('available')) {
                statusDisplay = `<span class="${statusClass.includes('pending') ? 'pending' : 'available'}">${statusText}</span>`;
            }

            const bookItemHTML = `
                <div class="modal-book-item">
                    <img src="${coverSrc}" alt="${title}" class="book-cover">
                    <div class="modalbookdetails">
                        <h4>${title}</h4>
                        <p>${author}</p>
                        <p>Date Due: ${dueDate}</p>
                        <p>Status: ${statusDisplay}</p>
                        <p>Penalty Fee: ${penaltyText}</p>
                    </div>
                </div>`;
            returnModalBookList.insertAdjacentHTML('beforeend', bookItemHTML);
        });

        if (modalOverdueWarning) {
            modalOverdueWarning.style.display = hasOverdue ? 'block' : 'none';
        }
        return hasOverdue;
    }

    function addClickListener(element, handler) {
        if (element) {
            element.addEventListener('click', handler);
        }
    }

    const today = new Date();
    const options = { year: 'numeric', month: 'long', day: 'numeric' };

    if (dateBorrowed && borrowProceed && daysInput && dueDate && alertText) {
        dateBorrowed.textContent = today.toLocaleDateString(undefined, options);
        borrowProceed.disabled = true;
        addClickListener(daysInput, () => {
            const days = parseInt(daysInput.value);
            const isValid = !isNaN(days) && days >= 1 && days <= 31;
            borrowProceed.disabled = !isValid || !borrowModalBookList || borrowModalBookList.children.length === 0;
            alertText.style.display = isValid ? 'none' : 'block';
            if (isValid) {
                const due = new Date(today);
                due.setDate(today.getDate() + days);
                dueDate.textContent = due.toLocaleDateString(undefined, options);
            } else {
                dueDate.textContent = '---';
            }
        });
    }

    addClickListener(openBorrow, () => {
        const bookTableBody = document.querySelector('.book-table tbody');
        if (!bookTableBody) return;

        const selectedCheckboxes = bookTableBody.querySelectorAll('.checkbox:checked');
        const selectedRows = Array.from(selectedCheckboxes).map(cb => cb.closest('.book-row'));

        if (selectedRows.length === 0) {
            alert("Please select at least one book to borrow.");
            return;
        }

        const availableRows = [];
        const unavailableTitles = [];

        selectedRows.forEach(row => {
            const statusDiv = row.querySelector('.available, .not-available');
            const title = row.querySelector('.book-info h4')?.textContent || 'Unknown Title';
            if (statusDiv && statusDiv.classList.contains('available')) {
                availableRows.push(row);
            } else {
                unavailableTitles.push(title);
            }
        });

        if (unavailableTitles.length > 0) {
            alert(`The following selected book(s) are not available for borrowing:\n- ${unavailableTitles.join('\n- ')}\nPlease uncheck them to proceed.`);
            return;
        }

        if (availableRows.length > 0) {
            if (daysInput) daysInput.value = '';
            if (dueDate) dueDate.textContent = '---';
            if (borrowProceed) borrowProceed.disabled = true;
            if (alertText) alertText.style.display = 'none';

            if (populateBorrowModal(availableRows)) {
                showModalStep(borrowModal);
            } 
        } else {
            lert("No available books selected.");
        }
    });


    addClickListener(borrowProceed, (e) => {
        e.preventDefault();
        if (!daysInput || !daysInput.value || parseInt(daysInput.value) < 1 || parseInt(daysInput.value) > 31) {
            if (alertText) alertText.style.display = 'block';
            return;
        }
        showModalStep(confirmationModal);
    });

    addClickListener(confirm, () => {
        showModalStep(successModal);
    });


    addClickListener(openReturn, () => {
        const bookTableBody = document.querySelector('.book-table tbody');
        if (!bookTableBody) return;
        const selectedCheckboxes = bookTableBody.querySelectorAll('.checkbox:checked');
        const selectedRows = Array.from(selectedCheckboxes).map(cb => cb.closest('.book-row'));

        if (selectedRows.length === 0) {
            alert("Please select at least one book to return.");
            return;
        }
        currentModalHasOverdue = populateReturnModal(selectedRows);
        showModalStep(returnmodal);
    });

    addClickListener(returnProceedButton, () => {
        showModalStep(currentModalHasOverdue ? paymentMethodModal : successNoOverdueModal);
    });

    addClickListener(selectGcashButton, () => showModalStep(gcashPaymentModal));
    addClickListener(selectPayAtLibraryButton, () => showModalStep(payAtLibraryModal));

    addClickListener(proceedPayAtLibraryButton, () => {
        showModalStep(verifiedModal);
    });
    addClickListener(proceedGcashButton, () => {
        showModalStep(authenticationModal);
    });
    addClickListener(proceedAuthButton, () => {
        showModalStep(verifiedModal);
    });


    closeButtons.forEach(button => {
        addClickListener(button, (event) => {
            event.stopPropagation();
            hideModal();
        });
    });

    if (viewmodal) {
        addClickListener(window, (e) => {
            if (e.target === viewmodal) {
                hideModal();
            }
        });
    }

    const urlParams = new URLSearchParams(window.location.search);
    if (urlParams.get('borrow_success') === '1') {
        if (viewmodal && successModal) {
            viewmodal.style.display = 'flex';
            viewmodal.classList.add('active');
            successModal.style.display = 'flex';
        }
    }

    document.querySelectorAll('.modalbtn.close').forEach(btn => {
        btn.addEventListener('click', () => {
            btn.closest('.modal-content, .modal-content2').style.display = 'none';

            const anyOpenModal = document.querySelector('.modal-content[style*="block"], .modal-content2[style*="block"]');
            if (!anyOpenModal) {
                document.getElementById('viewmodal').style.display = 'none';
            }
        });
    });
});
