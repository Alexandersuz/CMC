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

    <script>
        document.querySelectorAll('input[type="number"]').forEach(input => {
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
    </script>
</body>
</html>
