document.addEventListener('DOMContentLoaded', () => {
    const values = document.querySelectorAll('.ui-slider-handle');
    const minSalary = document.getElementById('min_salary');
    const maxSalary = document.getElementById('max_salary');

    minSalary.setAttribute('value', values[0].style.left);
    maxSalary.setAttribute('value', values[1].style.left);

    document.getElementById('my-form').addEventListener('submit', () => {
        minSalary.setAttribute('value', values[0].style.left);
        maxSalary.setAttribute('value', values[1].style.left);

        // localStorage.setItem('minSalary', values[0].style.left);
        // localStorage.setItem('maxSalary', values[1].style.left);
    });

    // console.log(values[0].style.left = localStorage.getItem('minSalary'));
    // console.log(values[1].style.left = localStorage.getItem('maxSalary'));
});