<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Калькулятор кубов</title>
    <link rel="stylesheet" href="styles/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
    <div class="calculator">
        <div class="header">
            <h1>Калькулятор кубов</h1>
            <div class="theme-toggle">
                <i class="fa fa-sun"></i>
                <input type="checkbox" id="theme-switcher">
                <label for="theme-switcher"></label>
                <i class="fa fa-moon"></i>
            </div>
        </div>

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

        <div class="error-hint" id="error-hint">
            Значения сторон должны быть больше 0. Пожалуйста, исправьте ошибки и попробуйте снова.
        </div>

        <div class="result" id="result">Объем: 0 м³</div>

        <div class="actions">
            <button class="reset-btn" onclick="resetCalculator()">Сбросить</button>
            <button class="theory-btn" onclick="toggleTheory()">Теория</button>
        </div>
    </div>

    <!-- Выезжающее окно с информацией -->
    <div class="theory-overlay" id="theory-overlay">
        <div class="theory-content">
            <button class="close-btn" onclick="toggleTheory()">×</button>
            <h2>Коробка и её объём</h2>
            <p>Коробка представляет собой прямоугольный параллелепипед с длиной <strong>A</strong>, шириной <strong>B</strong> и высотой (глубиной) <strong>C</strong>. Для вычисления её объёма используется следующая формула:</p>
            <p><strong>Формула:</strong></p>
            <p class="math-formula">V = A × B × C</p>
            <p><strong>Пример расчёта:</strong></p>
            <p>Предположим, что у нас есть коробка с шириной <strong>25 см</strong>, высотой <strong>15 см</strong> и глубиной <strong>18,5 см</strong>. Чтобы вычислить её объём, подставим значения в формулу:</p>
            <p class="math-formula">V = 25 × 15 × 18,5 = 6 937,5 см³</p>
            <p>Если нужно перевести объём в кубометры, разделите результат на <strong>1 000 000</strong>:</p>
            <p class="math-formula">V = 6 937,5 / 1 000 000 = 0,0069375 ≈ 0,007 м³</p>
        </div>
    </div>

    <div class="version">Версия: 0.0.03</div>
    
    <script src="scripts/main.js"></script>
</body>
</html>
