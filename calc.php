<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Калькулятор кубов</title>
    <link rel="stylesheet" href="styles/style.css">
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #e8ecf1;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .calculator {
            background-color: #ffffff;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 3px 10px rgba(0, 0, 0, 0.1);
            text-align: center;
            max-width: 400px;
            width: 100%;
            position: relative;
        }

        h1 {
            font-size: 26px;
            margin-bottom: 25px;
            color: #333;
        }

        .example {
            font-size: 14px;
            color: #666;
            margin-bottom: 20px;
            text-align: center;
        }

        .example img {
            width: 40%; /* Уменьшенный размер иконки */
            margin: 10px auto;
            display: block; /* Центрирование иконки */
        }

        label {
            font-size: 14px;
            color: #666;
            text-align: left;
            display: block;
            margin-bottom: 5px;
        }

        input[type="number"] {
            width: calc(100% - 20px);
            padding: 12px;
            margin: 10px 0;
            border: 1px solid #ddd;
            border-radius: 10px;
            font-size: 18px;
            box-shadow: inset 0 1px 3px rgba(0, 0, 0, 0.1);
            transition: all 0.2s ease;
        }

        input[type="number"]:focus {
            border-color: #28a745;
            outline: none;
            box-shadow: 0 0 8px rgba(40, 167, 69, 0.2);
            transform: scale(1.02);
        }

        input[type="number"]::placeholder {
            color: #999;
        }

        .result {
            margin-top: 30px;
            font-size: 22px;
            font-weight: bold;
            color: #28a745;
            opacity: 0;
            transform: translateY(20px);
            transition: opacity 0.4s ease, transform 0.4s ease;
        }

        .show {
            opacity: 1;
            transform: translateY(0);
        }

        .reset-btn {
            margin-top: 20px;
            padding: 8px 18px;
            background-color: #28a745;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.2s ease, transform 0.1s ease;
        }

        .reset-btn:hover {
            background-color: #218838;
            transform: scale(1.02);
        }

        .reset-btn:active {
            transform: scale(0.98);
        }

        .error {
            border-color: #dc3545;
            box-shadow: 0 0 8px rgba(220, 53, 69, 0.2);
        }

        .error-hint {
            color: #dc3545;
            font-size: 12px;
            text-align: left;
            margin-top: 5px;
            display: none;
            transition: opacity 0.3s ease;
        }

        .show-error {
            display: block;
            opacity: 1;
        }

        .tooltip {
            position: absolute;
            top: 0;
            right: 0;
            background-color: #333;
            color: #fff;
            padding: 5px 10px;
            border-radius: 4px;
            font-size: 12px;
            display: none;
            white-space: nowrap;
        }

        .tooltip.show {
            display: block;
        }

        .input-container {
            position: relative;
        }
    </style>
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

    <script>
        const inputs = document.querySelectorAll('input[type="number"]');
        const resultDiv = document.getElementById('result');
        const errorHint = document.getElementById('error-hint');
        const tooltips = document.querySelectorAll('.tooltip');

        inputs.forEach(input => {
            input.addEventListener('input', handleInput);
            input.addEventListener('focus', showTooltip);
            input.addEventListener('blur', hideTooltip);
        });

        function handleInput() {
            const sideA = parseFloat(document.getElementById('sideA').value) || 0;
            const sideB = parseFloat(document.getElementById('sideB').value) || 0;
            const sideC = parseFloat(document.getElementById('sideC').value) || 0;

            if (sideA > 0 && sideB > 0 && sideC > 0) {
                calculateVolume(sideA, sideB, sideC);
                inputs.forEach(input => input.classList.remove('error'));
                errorHint.classList.remove('show-error');
            } else {
                resultDiv.textContent = 'Объем: 0 м³';
                resultDiv.classList.remove('show');
                inputs.forEach(input => {
                    if (input.value <= 0) {
                        input.classList.add('error');
                    }
                });
                errorHint.classList.add('show-error');
            }
        }

        function calculateVolume(sideA, sideB, sideC) {
            const volume = (sideA * sideB * sideC) / 1000000;
            resultDiv.textContent = `Объем: ${volume.toFixed(3)} м³`;
            resultDiv.classList.add('show');
        }

        function resetCalculator() {
            inputs.forEach(input => input.value = '');
            resultDiv.textContent = 'Объем: 0 м³';
            resultDiv.classList.remove('show');
            inputs.forEach(input => input.classList.remove('error'));
            errorHint.classList.remove('show-error');
        }

        function showTooltip(event) {
            const tooltip = document.getElementById('tooltip' + event.target.id.charAt(4));
            tooltip.classList.add('show');
        }

        function hideTooltip(event) {
            const tooltip = document.getElementById('tooltip' + event.target.id.charAt(4));
            tooltip.classList.remove('show');
        }
    </script>
</body>
</html>
