document.addEventListener('DOMContentLoaded', () => { 
    const filterAllButton = document.getElementById('filter-all');
    const filterBorrowedButton = document.getElementById('filter-borrowed');
    const filterReturnedButton = document.getElementById('filter-returned');
    const bookTableBody = document.querySelector('.book-table tbody');

    const filterElements = [filterAllButton, filterBorrowedButton, filterReturnedButton];

    
    function setActiveFilter(activeElement) {
        filterElements.forEach(element => {
            if (element) { 
                element.classList.remove('active-filter');
            }
        });
        if (activeElement) {
            activeElement.classList.add('active-filter');
        }
    }

    function filterBooks(filterType) {
        const bookRows = bookTableBody.querySelectorAll('.book-row');

        if (bookRows.length === 0) {
            return; 
        }

        let visibleRowCount = 0; 

        bookRows.forEach(row => {
            const statusCell = row.children[3];
            const statusElement = statusCell ? statusCell.querySelector('div') : null;

            if (!statusElement) {
                row.style.display = 'none'; 
                return;
            }
        
            const status = statusElement.textContent.trim().toLowerCase();
            let showRow = false; 

            switch (filterType) {
                case 'all':
                    showRow = true;
                    break;
                case 'borrowed':
                    showRow = (status === 'pending' || status === 'overdue');
                    break;
                case 'returned':
                    showRow = (status === 'returned');
                    break;
                default:
                    showRow = true;
            }

            row.style.display = showRow ? 'table-row' : 'none';

            if (showRow) {
                visibleRowCount++; 
            }
        });
    }

    function addFilterListener(element, filterType) {
        if (element) {
            element.addEventListener('click', () => {
                filterBooks(filterType);
                setActiveFilter(element);
            });
        }
    }
    addFilterListener(filterAllButton, 'all');
    addFilterListener(filterBorrowedButton, 'borrowed');
    addFilterListener(filterReturnedButton, 'returned');

    if (filterAllButton) {
        filterBooks('all'); 
        setActiveFilter(filterAllButton); 
    } else {
        filterBooks('all');
    }
}); 
