document.addEventListener('DOMContentLoaded', () => {
    document.querySelectorAll('input[type="number"]').forEach(input => {
        input.addEventListener('input', handleInput);
        input.addEventListener('focus', showTooltip);
        input.addEventListener('blur', hideTooltip);
    });
});

function handleInput() {
    const sideA = parseFloat(document.getElementById('sideA').value) || 0;
    const sideB = parseFloat(document.getElementById('sideB').value) || 0;
    const sideC = parseFloat(document.getElementById('sideC').value) || 0;

    if (sideA > 0 && sideB > 0 && sideC > 0) {
        calculateVolume(sideA, sideB, sideC);
        clearErrors();
    } else {
        resetResult();
        displayErrors();
    }
}

function calculateVolume(sideA, sideB, sideC) {
    const volume = (sideA * sideB * sideC) / 1000000;
    const resultDiv = document.getElementById('result');
    resultDiv.textContent = `Объем: ${volume.toFixed(3)} м³`;
    resultDiv.classList.add('show');
}

function resetCalculator() {
    document.querySelectorAll('input[type="number"]').forEach(input => input.value = '');
    resetResult();
    clearErrors();
}

function resetResult() {
    const resultDiv = document.getElementById('result');
    resultDiv.textContent = 'Объем: 0 м³';
    resultDiv.classList.remove('show');
}

function clearErrors() {
    document.querySelectorAll('input[type="number"]').forEach(input => input.classList.remove('error'));
    document.getElementById('error-hint').classList.remove('show-error');
}

function displayErrors() {
    document.querySelectorAll('input[type="number"]').forEach(input => {
        if (input.value <= 0) {
            input.classList.add('error');
        }
    });
    document.getElementById('error-hint').classList.add('show-error');
}

function showTooltip(event) {
    document.getElementById('tooltip' + event.target.id.charAt(4)).classList.add('show');
}

function hideTooltip(event) {
    document.getElementById('tooltip' + event.target.id.charAt(4)).classList.remove('show');
}
