document.querySelector('.dropdown-button').addEventListener('click', function () {
    const dropdown = document.querySelector('.dropdown-content');
    dropdown.style.display = (dropdown.style.display === 'block') ? 'none' : 'block';
});
