<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Калькулятор кубов</title>
    <link rel="stylesheet" href="styles/style.css">
</head>
<body>
    <div class="calculator">
        <h1>Калькулятор кубов</h1>
        <div class="example">
            Для измерения объема коробки измерьте его длину (А), ширину (B) и высоту (C) в сантиметрах, и введите полученные данные в таблицу:
            <img src="/package.svg" alt="Пример измерения сторон">
        </div>
        <div class="input-container">
            <label for="sideA">Введите длину стороны A (см):</label>
            <input type="number" id="sideA" placeholder="Сторона A" min="0" step="any" aria-describedby="error-hint">
            <div class="tooltip" id="tooltipA">Введите длину стороны A в сантиметрах.</div>
        </div>
        <div class="input-container">
            <label for="sideB">Введите длину стороны B (см):</label>
            <input type="number" id="sideB" placeholder="Сторона B" min="0" step="any" aria-describedby="error-hint">
            <div class="tooltip" id="tooltipB">Введите длину стороны B в сантиметрах.</div>
        </div>
        <div class="input-container">
            <label for="sideC">Введите длину стороны C (см):</label>
            <input type="number" id="sideC" placeholder="Сторона C" min="0" step="any" aria-describedby="error-hint">
            <div class="tooltip" id="tooltipC">Введите длину стороны C в сантиметрах.</div>
        </div>
        <div class="error-hint" id="error-hint">Значения сторон должны быть больше 0.</div>
        <div class="result" id="result">Объем: 0 м³</div>
        <button class="reset-btn" onclick="resetCalculator()">Сбросить</button>
    </div>

    <script src="scripts/main.js"></script>
</body>
</html>
