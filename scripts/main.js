// Ожидание загрузки DOM для привязки событий
document.addEventListener('DOMContentLoaded', () => {
    // Добавляем обработчики событий для всех полей ввода чисел
    document.querySelectorAll('input[type="number"]').forEach(input => {
        input.addEventListener('input', handleInput);  // Обработчик изменения значения
        input.addEventListener('focus', showTooltip);  // Обработчик фокуса на поле
        input.addEventListener('blur', hideTooltip);   // Обработчик потери фокуса
    });
});

// Обрабатываем изменение значения в полях ввода
function handleInput() {
    // Получаем значения из полей ввода и преобразуем их в числа
    const sideA = parseFloat(document.getElementById('sideA').value) || 0;
    const sideB = parseFloat(document.getElementById('sideB').value) || 0;
    const sideC = parseFloat(document.getElementById('sideC').value) || 0;

    // Если все стороны больше нуля, рассчитываем объем
    if (sideA > 0 && sideB > 0 && sideC > 0) {
        calculateVolume(sideA, sideB, sideC); // Расчет объема
        clearErrors(); // Очистка ошибок
    } else {
        resetResult(); // Сброс результата
        displayErrors(); // Отображение ошибок
    }
}

// Рассчитываем объем и отображаем результат
function calculateVolume(sideA, sideB, sideC) {
    // Расчет объема в кубических метрах
    const volume = (sideA * sideB * sideC) / 1000000;
    const resultDiv = document.getElementById('result');
    
    // Отображение результата
    resultDiv.textContent = `Объем: ${volume.toFixed(3)} м³`;
    resultDiv.classList.add('show'); // Показ результата
}

// Сбрасываем значения полей ввода и очищаем ошибки
function resetCalculator() {
    document.querySelectorAll('input[type="number"]').forEach(input => input.value = '');
    resetResult(); // Сброс результата
    clearErrors(); // Очистка ошибок
}

// Сбрасываем отображение результата
function resetResult() {
    const resultDiv = document.getElementById('result');
    resultDiv.textContent = 'Объем: 0 м³';
    resultDiv.classList.remove('show'); // Скрытие результата
}

// Очищаем все ошибки в полях ввода
function clearErrors() {
    document.querySelectorAll('input[type="number"]').forEach(input => input.classList.remove('error'));
    document.getElementById('error-hint').classList.remove('show-error');
}

// Отображаем ошибки, если значения полей некорректны
function displayErrors() {
    document.querySelectorAll('input[type="number"]').forEach(input => {
        if (input.value <= 0) {
            input.classList.add('error'); // Добавление класса ошибки
        }
    });
    document.getElementById('error-hint').classList.add('show-error'); // Показ сообщения об ошибке
}

// Показ всплывающей подсказки при фокусе на поле ввода
function showTooltip(event) {
    document.getElementById('tooltip' + event.target.id.charAt(4)).classList.add('show');
}

// Скрытие всплывающей подсказки при потере фокуса на поле ввода
function hideTooltip(event) {
    document.getElementById('tooltip' + event.target.id.charAt(4)).classList.remove('show');
}

// Функция для переключения видимости окна Теории
function toggleTheory() {
    const overlay = document.getElementById('theory-overlay');
    overlay.classList.toggle('open');
}
