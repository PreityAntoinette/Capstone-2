
let activeTableId = 'table1'; // Default active table name
// Get references to HTML elements

const searchInput = document.getElementById('searchInput');
const entriesPerPageSelect = document.getElementById('entriesPerPage');
const paginationDiv = document.getElementById('pagination');
const paginationLabelDiv = document.getElementById('pagination-label');
const clearButton = document.getElementById('clearButton');


// Initialize variables
let currentPage = 1;
let entriesPerPage = parseInt(entriesPerPageSelect.value);
let selectedEntriesPerPage = entriesPerPage; // Store selected entries per page
let totalRowCount = 0; // Store total row count

// Parse the query parameter from the URL
const urlParams = new URLSearchParams(window.location.search);
const queryActiveTableId = urlParams.get('activeTableId');

// Check if there's a queryActiveContainerId from the URL
if (queryActiveTableId) {
  // Set the active container based on the URL parameter
  showTable(queryActiveTableId);
}
//table group
function showTable(tableId) {
  searchInput.value = '';
  // Store the current page and selected entries per page
  const previousPage = currentPage;
  const previousEntriesPerPage = selectedEntriesPerPage;
    // Remove 'active' class from all table groups
    const tables = document.getElementsByClassName('table-group-container');
    for (const table of tables) {
        table.classList.remove('active');
    }

    // Add 'active' class to the selected table group
    const selectedTable = document.getElementById(tableId);
    selectedTable.classList.add('active');

    // Update the activeTablename
    activeTableId = tableId;

    const buttons = document.getElementsByClassName('btnClass');
    for (const button of buttons) {
        button.classList.remove('active');
    }

    const selectedButton = document.querySelector(`[onclick="showTable('${tableId}')"]`);
    selectedButton.classList.add('active');
    currentPage = previousPage;
    entriesPerPage = previousEntriesPerPage;
    updateTable();
    updatePagination();
}




// Function to update the table based on the search input and pagination
function updateTable() {
    const table = document.getElementById(activeTableId); // Reference the active table
    const filter = searchInput.value.trim().toLowerCase();
    const rows = table.getElementsByTagName('tr');
    let visibleRowCount = 0;
    let hasVisibleRows = false;

    // Loop through rows and check visibility based on search filter
    Array.from(rows).forEach((row, i) => {
        if (i === 0) return; // Skip header row
        const cols = row.getElementsByTagName('td');
        const visible = Array.from(cols).some(cell => cell.innerHTML.toLowerCase().includes(filter));

        if (visible) {
            const display = (visibleRowCount >= (currentPage - 1) * selectedEntriesPerPage && visibleRowCount < currentPage * selectedEntriesPerPage) ? '' : 'none';
            row.style.display = display;
            visibleRowCount++;
            hasVisibleRows = true;
        } else {
            row.style.display = 'none';
        }
    });
   
    // Update pagination
    totalRowCount = visibleRowCount;
    updatePagination();
}

/// Function to update pagination links with ellipsis in the center
function updatePagination() {
    const pageCount = Math.ceil(totalRowCount / selectedEntriesPerPage);
    let links = '';

    if (pageCount >= 1) {
        const maxButtons = 5; // Maximum number of pagination buttons to display

        if (pageCount <= maxButtons) {
            // If there are fewer pages than the maximum number of buttons, display all pages
            for (let i = 1; i <= pageCount; i++) {
                const isActive = i === currentPage;
                const activeClass = isActive ? 'active' : '';
                links += `<a href="#" onclick="goToPage(${i})" class="${activeClass}">${i}</a>`;
            }
        } else {
            // Display the first two pages
            links += `<a href="#" onclick="goToPage(1)" class="${currentPage === 1 ? 'active' : ''}">1</a>`;
            links += `<a href="#" onclick="goToPage(2)" class="${currentPage === 2 ? 'active' : ''}">2</a>`;

            // Display ellipsis if currentPage is not too close to the beginning
            if (currentPage > 3) {
                links += `<span>..</span>`;
            }

            // Display the current page and the two pages before and after it
            for (let i = Math.max(3, currentPage - 1); i <= Math.min(pageCount - 2, currentPage + 1); i++) {
                const isActive = i === currentPage;
                const activeClass = isActive ? 'active' : '';
                links += `<a href="#" onclick="goToPage(${i})" class="${activeClass}">${i}</a>`;
            }

            // Display ellipsis if currentPage is not too close to the end
            if (currentPage < pageCount - 2) {
                links += `<span>..</span>`;
            }

            // Display the last two pages
            links += `<a href="#" onclick="goToPage(${pageCount - 1})" class="${currentPage === pageCount - 1 ? 'active' : ''}">${pageCount - 1}</a>`;
            links += `<a href="#" onclick="goToPage(${pageCount})" class="${currentPage === pageCount ? 'active' : ''}">${pageCount}</a>`;
        }

        // Add "Previous" and "Next" buttons
        links = `<a href="#" onclick="goToPage(${currentPage - 1})" class="${currentPage === 1 ? 'disabled' : ''}">Previous</a>${links}<a href="#" onclick="goToPage(${currentPage + 1})" class="${currentPage === pageCount ? 'disabled' : ''}">Next</a>`;
    } else {
        links = 'No results found';
    }

    paginationDiv.innerHTML = `${links}`;
    paginationLabelDiv.innerHTML = `Page ${currentPage} of ${pageCount}`;
}
// Function to go to a specific page
function goToPage(pageNumber) {
    currentPage = pageNumber;
    updateTable();
}

// Function to clear search input
function clearSearchInput() {
    searchInput.value = '';
    clearButton.style.display = 'none';
    updateTable();
}

// Event listeners
searchInput.addEventListener('input', () => {
    currentPage = 1;
    updateTable();
    clearButton.style.display = searchInput.value ? 'block' : 'none';
});

clearButton.addEventListener('click', clearSearchInput);

entriesPerPageSelect.addEventListener('change', () => {
    currentPage = 1;
    selectedEntriesPerPage = parseInt(entriesPerPageSelect.value);
    updateTable();
    updatePagination();
});

// Initialize the table
updateTable();


// Get references to the button group container and buttons
const buttonGroupContainerScroll = document.querySelector('.button-group-container');
const buttonsScroll = document.querySelectorAll('.btnClass');

// Add click event listeners to the buttons
buttonsScroll.forEach((button) => {
  button.addEventListener('click', () => {
    // Calculate the scroll position to center the clicked button
    const buttonOffsetScroll = button.offsetLeft;
    const containerWidthScroll = buttonGroupContainerScroll.clientWidth;
    const buttonWidthScroll = button.offsetWidth;
    
    // Calculate the scroll position to center the button
    const scrollPositionScroll = buttonOffsetScroll - (containerWidthScroll - buttonWidthScroll) / 2;
    
    // Set the scroll position of the container to center the clicked button with smooth scrolling
    buttonGroupContainerScroll.scrollTo({
      left: scrollPositionScroll,
      behavior: 'smooth', // Add smooth scrolling effect
    });
  });
});
