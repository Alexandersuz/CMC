<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title data-translate="page-title">Калькулятор кубов</title>
    <link rel="stylesheet" href="resources/styles/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
    <div class="calculator">
        <div class="header">
            <h1 data-translate="calculator-title">Калькулятор кубов</h1>
            <div class="theme-toggle">
                <i class="fa fa-sun"></i>
                <input type="checkbox" id="theme-switcher">
                <label for="theme-switcher"></label>
                <i class="fa fa-moon"></i>
            </div>
            <button class="language-btn">
                <i class="fa-solid fa-globe"></i>
            </button>
        </div>

        <div class="example" data-translate="example-text">
            Для измерения объема коробки измерьте его длину (А), ширину (B) и высоту (C) в сантиметрах, и введите полученные данные в соответствующие поля в таблице. После этого таблица вам покажет объём в м³
        </div>

        <div class="input-container">
            <input type="number" id="sideA" placeholder="Длина стороны A" min="0" step="any" aria-describedby="error-hint">
            <div class="tooltip" id="tooltipA" data-translate="tooltip-a">Введите длину стороны A в сантиметрах.</div>
            <label for="sideA" data-translate="length-side-a">Введите длину стороны A (см):</label>
        </div>

        <div class="input-container">
            <input type="number" id="sideB" placeholder="Ширина стороны B" min="0" step="any" aria-describedby="error-hint">
            <div class="tooltip" id="tooltipB" data-translate="tooltip-b">Введите длину стороны B в сантиметрах.</div>
            <label for="sideB" data-translate="length-side-b">Введите длину стороны B (см):</label>
        </div>

        <div class="input-container">
            <input type="number" id="sideC" placeholder="Высота стороны C" min="0" step="any" aria-describedby="error-hint">
            <div class="tooltip" id="tooltipC" data-translate="tooltip-c">Введите длину стороны C в сантиметрах.</div>
            <label for="sideC" data-translate="length-side-c">Введите длину стороны C (см):</label>
        </div>

        <div class="error-hint" id="error-hint" data-translate="error-hint">
            Значения сторон должны быть больше 0. Пожалуйста, исправьте ошибки и попробуйте снова.
        </div>

        <div class="result" id="result" data-translate="volume">Объем: 0 м³</div>

        <div class="actions">
            <button class="history-btn" onclick="toggleHistory()" data-translate="history-btn">История</button>
            <button class="reset-btn" onclick="resetCalculator()" data-translate="reset-btn">Сбросить</button>
            <button class="theory-btn" onclick="toggleTheory()" data-translate="theory-btn">Теория</button>
        </div>
    </div>
    
    <!-- Секция истории расчетов -->
    <div id="history-overlay" class="history-overlay">
        <div class="history-content">
            <button class="close-history-btn" onclick="toggleHistory()" data-translate="close-history">×</button>
            <h2 data-translate="history-title">История расчетов</h2>
            <div id="history-list" class="history-list"></div>
            <button class="clear-history-btn" onclick="clearHistory()" id="clear-history-btn" style="display: none;" data-translate="clear-history">Очистить историю</button>
        </div>
    </div>

   <!-- Секция с теорией -->
    <div class="theory-overlay" id="theory-overlay">
        <div class="theory-content">
            <button class="close-btn" onclick="toggleTheory()" data-translate="close-theory">×</button>
            <h2 data-translate="theory-title">Коробка и её объём</h2>
            <p data-translate="theory-description">Коробка представляет собой прямоугольный параллелепипед с длиной <strong>A</strong>, шириной <strong>B</strong> и высотой (глубиной) <strong>C</strong>. Для вычисления её объёма используется следующая формула:</p>
            <p data-translate="formula-title"><strong>Формула:</strong></p>
            <p class="math-formula">V = A × B × C</p>
            <p data-translate="example-title"><strong>Пример расчёта:</strong></p>
            <p data-translate="example-description">Предположим, что у нас есть коробка с шириной <strong>25 см</strong>, высотой <strong>15 см</strong> и глубиной <strong>18,5 см</strong>. Чтобы вычислить её объём, подставим значения в формулу:</p>
            <p class="math-formula">V = 25 × 15 × 18,5 = 6 937,5 см³</p>
            <p data-translate="conversion-description">Если нужно перевести объём в кубометры, разделите результат на <strong>1 000 000</strong>:</p>
            <p class="math-formula">V = 6 937,5 / 1 000 000 = 0,0069375 ≈ 0,007 м³</p>
        </div>
    </div>
    
    <!-- Модальное окно для подтверждения очистки -->
    <div id="clear-history-modal" class="modal-overlay" style="display: none;">
        <div class="modal-content">
            <p data-translate="clear-history-confirmation">Вы уверены, что хотите очистить историю расчетов?</p>
            <div class="modal-buttons">
                <button class="confirm-clear-btn" onclick="confirmClearHistory()" data-translate="confirm">Да</button>
                <button class="cancel-clear-btn" onclick="closeModal()" data-translate="cancel">Отмена</button>
            </div>
        </div>
    </div>

<!-- Модальное окно для выбора языка -->
<div class="language-modal-overlay">
    <div class="language-modal-content">
        <button class="language-modal-close-btn" aria-label="Закрыть модальное окно">×</button>
        <h2 data-translate="select-language">Выберите язык</h2>
        <div class="language-options">
            <button class="lang-btn" onclick="changeLanguage('ru')" data-translate="russian">Русский</button>
            <button class="lang-btn" onclick="changeLanguage('uz-cyrl')" data-translate="uzbek-cyrl">Ўзбекча (кириллица)</button>
            <button class="lang-btn" onclick="changeLanguage('uz-latn')" data-translate="uzbek-latn">Oʻzbekcha (лотин)</button>
            <button class="lang-btn" onclick="changeLanguage('en')" data-translate="english">English</button>
        </div>
    </div>
</div>


<div class="version">Версия: <span id="version-number"></span></div>
    


    <!-- i18next -->
    <script src="https://cdn.jsdelivr.net/npm/i18next@latest/i18next.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/i18next-http-backend@latest/i18nextHttpBackend.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/i18next-browser-languagedetector@latest/i18nextBrowserLanguageDetector.min.js"></script>
    <script src="resources/scripts/main.js"></script>
</body>
</html>
