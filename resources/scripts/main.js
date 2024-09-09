// Функция для инициализации событий
function initEventListeners() {
    document.querySelectorAll('input[type="number"]').forEach(input => {
        input.addEventListener('input', handleInput);
        input.addEventListener('focus', showTooltip);
        input.addEventListener('blur', hideTooltip);
    });

    const themeSwitcher = document.getElementById('theme-switcher');
    themeSwitcher.addEventListener('change', handleThemeSwitch);
}

// Обработка изменения значения в полях ввода
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

// Расчет объема и отображение результата
function calculateVolume(sideA, sideB, sideC) {
    const volume = (sideA * sideB * sideC) / 1000000;
    const resultDiv = document.getElementById('result');
    resultDiv.textContent = `Объем: ${volume.toFixed(3)} м³`;
    resultDiv.classList.add('show');
}

// Сброс калькулятора
function resetCalculator() {
    document.querySelectorAll('input[type="number"]').forEach(input => input.value = '');
    resetResult();
    clearErrors();
}

// Сброс результата
function resetResult() {
    const resultDiv = document.getElementById('result');
    resultDiv.textContent = 'Объем: 0 м³';
    resultDiv.classList.remove('show');
}

// Очистка ошибок
function clearErrors() {
    document.querySelectorAll('input[type="number"]').forEach(input => input.classList.remove('error'));
    document.getElementById('error-hint').classList.remove('show-error');
}

// Отображение ошибок
function displayErrors() {
    document.querySelectorAll('input[type="number"]').forEach(input => {
        if (input.value <= 0) {
            input.classList.add('error');
        }
    });
    document.getElementById('error-hint').classList.add('show-error');
}

// Показ всплывающей подсказки
function showTooltip(event) {
    const tooltipId = 'tooltip' + event.target.id.charAt(4);
    document.getElementById(tooltipId).classList.add('show');
}

// Скрытие всплывающей подсказки
function hideTooltip(event) {
    const tooltipId = 'tooltip' + event.target.id.charAt(4);
    document.getElementById(tooltipId).classList.remove('show');
}

// Переключение видимости окна Теории
function toggleTheory() {
    document.getElementById('theory-overlay').classList.toggle('open');
}

// Обработка переключения темы
function handleThemeSwitch() {
    const themeSwitcher = document.getElementById('theme-switcher');
    const body = document.body;

    if (themeSwitcher.checked) {
        body.classList.add('dark-mode');
        localStorage.setItem('theme', 'dark');
    } else {
        body.classList.remove('dark-mode');
        localStorage.setItem('theme', 'light');
    }
}

// Инициализация событий после загрузки DOM
document.addEventListener('DOMContentLoaded', () => {
    initEventListeners();

    const savedTheme = localStorage.getItem('theme');
    const body = document.body;
    const themeSwitcher = document.getElementById('theme-switcher');

    if (savedTheme) {
        body.classList.toggle('dark-mode', savedTheme === 'dark');
        themeSwitcher.checked = savedTheme === 'dark';
    } else {
        body.classList.remove('dark-mode');
        themeSwitcher.checked = false;
    }
});

