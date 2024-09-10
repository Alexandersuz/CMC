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
        <!-- Заголовок калькулятора -->
        <header class="header">
            <h1 data-translate="calculator-title">Калькулятор кубов</h1>
            <div class="theme-toggle">
                <!-- Переключатель темы -->
                <i class="fa fa-sun"></i>
                <input type="checkbox" id="theme-switcher">
                <label for="theme-switcher"></label>
                <i class="fa fa-moon"></i>
            </div>
            <!-- Кнопка выбора языка -->
            <button class="language-btn">
                <i class="fa-solid fa-globe"></i>
            </button>
        </header>

        <!-- Инструкции по вводу данных -->
        <div class="example" data-translate="example-text">
            Для измерения объема коробки измерьте его длину (А), ширину (B) и высоту (C) в сантиметрах, и введите полученные данные в соответствующие поля в таблице. После этого таблица вам покажет объём в м³
        </div>

        <!-- Статичный блок с SVG для отображения коробки в разных темах -->
        <div class="package">
            <svg id="package-svg-light" class="theme-svg" viewBox="0 0 512.003 512.003" xmlns="http://www.w3.org/2000/svg">
                <!-- SVG код для светлой темы --> 
                <path d="m256 37.882-71.111 37.3-6.205 14.65-26.205 2.35-71.111 37.3 174.63 306.08 174.63-114.09v-191.99z" fill="#d8ab8c"/>
                <path d="m256 413.07v-191.99l-154.63-81.109-8.745 198.27 163.38 97.316 174.63-91.599v-22.491z" fill="#c38778"/>
                <path d="m101.37 327.42v-187.45l-20-10.491v214.48l174.63 91.6v-22.491l-150.62-79.002c-2.469-1.295-4.016-3.853-4.016-6.641z" fill="#b1705b"/>
                <path d="m152.48 92.182 181.98 95.452 25.066-20.852-174.63-91.6z" fill="#fff0af"/>
                <path d="m327.11 183.78v68.864l32.411-15.69v-70.174h-1e-3z" fill="#ffe07d"/>
                <path d="m329.863 481.621c-1.174 0-2.365-.277-3.478-.86l-42.895-22.5c-3.668-1.924-5.082-6.457-3.158-10.125 1.924-3.669 6.457-5.082 10.125-3.158l19.82 10.396 158.486-83.131-10.642-5.582c-3.668-1.924-5.082-6.457-3.158-10.126 1.924-3.667 6.458-5.08 10.125-3.157l42.895 22.5c3.668 1.924 5.082 6.457 3.158 10.125-1.924 3.669-6.456 5.081-10.125 3.158l-16.107-8.449-158.486 83.131 6.929 3.635c3.668 1.924 5.082 6.457 3.158 10.125-1.34 2.556-3.947 4.018-6.647 4.018zm-147.723 0c-2.699 0-5.307-1.462-6.648-4.019-1.924-3.668-.51-8.201 3.158-10.125l6.929-3.635-158.487-83.131-16.107 8.449c-3.668 1.924-8.201.51-10.125-3.158s-.51-8.201 3.158-10.125l42.895-22.5c3.669-1.924 8.201-.51 10.125 3.157 1.924 3.669.51 8.202-3.158 10.126l-10.642 5.582 158.486 83.131 19.82-10.396c3.668-1.924 8.202-.511 10.125 3.158 1.924 3.668.51 8.201-3.158 10.125l-42.895 22.5c-1.111.583-2.302.861-3.476.861zm73.861-38.563c-1.196 0-2.393-.286-3.484-.858l-174.631-91.6c-2.469-1.295-4.016-3.854-4.016-6.642v-214.476c0-2.788 1.547-5.347 4.016-6.642l174.632-91.6c2.182-1.145 4.786-1.145 6.968 0l70.016 36.726c3.668 1.924 5.082 6.457 3.158 10.125-1.924 3.669-6.457 5.081-10.125 3.158l-66.532-34.898-54.964 28.831 158.485 83.13 54.965-28.83-65.72-34.472c-3.668-1.924-5.082-6.457-3.158-10.125 1.924-3.669 6.457-5.081 10.125-3.158l78.38 41.113c2.469 1.295 4.016 3.854 4.016 6.642v214.477c0 2.788-1.547 5.347-4.016 6.642l-174.632 91.6c-1.089.571-2.286.857-3.483.857zm0-94.217c4.142 0 7.5 3.357 7.5 7.5v66.813l159.632-83.731v-197.539l-56.111 29.433v65.639c0 2.875-1.644 5.498-4.232 6.751l-32.41 15.69c-2.324 1.124-5.064.975-7.252-.396-2.188-1.372-3.516-3.772-3.516-6.354v-56.461l-56.111 29.432v100.725c0 4.143-3.358 7.5-7.5 7.5s-7.5-3.357-7.5-7.5v-100.726l-159.631-83.733v197.539l159.632 83.731v-66.813c-.001-4.142 3.357-7.5 7.499-7.5zm78.611-160.524v52.365l17.41-8.429v-53.068zm-237.096-58.835 158.485 83.131 54.965-28.831-158.485-83.131zm71.111-37.3 158.485 83.131 16.264-8.531-158.485-83.131zm-118.237 243.218c-1.174 0-2.365-.277-3.478-.86l-42.894-22.499c-3.668-1.924-5.082-6.457-3.158-10.125 1.923-3.669 6.456-5.082 10.125-3.158l8.627 4.525.325-197.555-15.567-8.166c-3.668-1.924-5.082-6.457-3.158-10.125 1.924-3.669 6.458-5.081 10.125-3.158l42.895 22.5c3.668 1.924 5.082 6.457 3.158 10.126-1.924 3.667-6.459 5.08-10.125 3.157l-12.34-6.473-.325 197.554 19.28 10.113c3.668 1.924 5.082 6.457 3.158 10.125-1.341 2.557-3.949 4.019-6.648 4.019z"/>
            </svg>
            <svg id="package-svg-dark" class="theme-svg" viewBox="0 0 512.003 512.003" xmlns="http://www.w3.org/2000/svg">
                <!-- SVG код для темной темы -->
           <path d="m256 37.882-71.111 37.3-6.205 14.65-26.205 2.35-71.111 37.3 174.63 306.08 174.63-114.09v-191.99z" fill="#d8ab8c"/>
                <path d="m256 413.07v-191.99l-154.63-81.109-8.745 198.27 163.38 97.316 174.63-91.599v-22.491z" fill="#c38778"/>
                <path d="m101.37 327.42v-187.45l-20-10.491v214.48l174.63 91.6v-22.491l-150.62-79.002c-2.469-1.295-4.016-3.853-4.016-6.641z" fill="#b1705b"/>
                <path d="m152.48 92.182 181.98 95.452 25.066-20.852-174.63-91.6z" fill="#fff0af"/>
                <path d="m327.11 183.78v68.864l32.411-15.69v-70.174h-1e-3z" fill="#ffe07d"/>
                <path d="m329.863 481.621c-1.174 0-2.365-.277-3.478-.86l-42.895-22.5c-3.668-1.924-5.082-6.457-3.158-10.125 1.924-3.669 6.457-5.082 10.125-3.158l19.82 10.396 158.486-83.131-10.642-5.582c-3.668-1.924-5.082-6.457-3.158-10.126 1.924-3.667 6.458-5.08 10.125-3.157l42.895 22.5c3.668 1.924 5.082 6.457 3.158 10.125-1.924 3.669-6.456 5.081-10.125 3.158l-16.107-8.449-158.486 83.131 6.929 3.635c3.668 1.924 5.082 6.457 3.158 10.125-1.34 2.556-3.947 4.018-6.647 4.018zm-147.723 0c-2.699 0-5.307-1.462-6.648-4.019-1.924-3.668-.51-8.201 3.158-10.125l6.929-3.635-158.487-83.131-16.107 8.449c-3.668 1.924-8.201.51-10.125-3.158s-.51-8.201 3.158-10.125l42.895-22.5c3.669-1.924 8.201-.51 10.125 3.157 1.924 3.669.51 8.202-3.158 10.126l-10.642 5.582 158.486 83.131 19.82-10.396c3.668-1.924 8.202-.511 10.125 3.158 1.924 3.668.51 8.201-3.158 10.125l-42.895 22.5c-1.111.583-2.302.861-3.476.861zm73.861-38.563c-1.196 0-2.393-.286-3.484-.858l-174.631-91.6c-2.469-1.295-4.016-3.854-4.016-6.642v-214.476c0-2.788 1.547-5.347 4.016-6.642l174.632-91.6c2.182-1.145 4.786-1.145 6.968 0l70.016 36.726c3.668 1.924 5.082 6.457 3.158 10.125-1.924 3.669-6.457 5.081-10.125 3.158l-66.532-34.898-54.964 28.831 158.485 83.13 54.965-28.83-65.72-34.472c-3.668-1.924-5.082-6.457-3.158-10.125 1.924-3.669 6.457-5.081 10.125-3.158l78.38 41.113c2.469 1.295 4.016 3.854 4.016 6.642v214.477c0 2.788-1.547 5.347-4.016 6.642l-174.632 91.6c-1.089.571-2.286.857-3.483.857zm0-94.217c4.142 0 7.5 3.357 7.5 7.5v66.813l159.632-83.731v-197.539l-56.111 29.433v65.639c0 2.875-1.644 5.498-4.232 6.751l-32.41 15.69c-2.324 1.124-5.064.975-7.252-.396-2.188-1.372-3.516-3.772-3.516-6.354v-56.461l-56.111 29.432v100.725c0 4.143-3.358 7.5-7.5 7.5s-7.5-3.357-7.5-7.5v-100.726l-159.631-83.733v197.539l159.632 83.731v-66.813c-.001-4.142 3.357-7.5 7.499-7.5zm78.611-160.524v52.365l17.41-8.429v-53.068zm-237.096-58.835 158.485 83.131 54.965-28.831-158.485-83.131zm71.111-37.3 158.485 83.131 16.264-8.531-158.485-83.131zm-118.237 243.218c-1.174 0-2.365-.277-3.478-.86l-42.894-22.499c-3.668-1.924-5.082-6.457-3.158-10.125 1.923-3.669 6.456-5.082 10.125-3.158l8.627 4.525.325-197.555-15.567-8.166c-3.668-1.924-5.082-6.457-3.158-10.125 1.924-3.669 6.458-5.081 10.125-3.158l42.895 22.5c3.668 1.924 5.082 6.457 3.158 10.126-1.924 3.667-6.459 5.08-10.125 3.157l-12.34-6.473-.325 197.554 19.28 10.113c3.668 1.924 5.082 6.457 3.158 10.125-1.341 2.557-3.949 4.019-6.648 4.019z" fill="#626262"/>
            </svg>
        </div>

        <!-- Поля ввода для сторон коробки -->
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

        <!-- Сообщение об ошибке -->
        <div class="error-hint" id="error-hint" data-translate="error-hint">
            Значения сторон должны быть больше 0. Пожалуйста, исправьте ошибки и попробуйте снова.
        </div>

        <!-- Результат вычисления объема -->
        <div class="result" id="result" data-translate="volume">Объем: 0 м³</div>

        <!-- Действия -->
        <div class="actions">
            <button class="history-btn" onclick="toggleHistory()" data-translate="history-btn">История</button>
            <button class="reset-btn" onclick="resetCalculator()" data-translate="reset-btn">Сбросить</button>
            <button class="theory-btn" onclick="toggleTheory()" data-translate="theory-btn">Теория</button>
        </div>
    </div>
    
    <!-- Модальное окно для истории расчетов -->
    <div id="history-overlay" class="history-overlay">
        <div class="history-content">
            <button class="close-history-btn" onclick="toggleHistory()" data-translate="close-history">×</button>
            <h2 data-translate="history-title">История расчетов</h2>
            <div id="history-list" class="history-list"></div>
            <button class="clear-history-btn" onclick="clearHistory()" id="clear-history-btn" style="display: none;" data-translate="clear-history">Очистить историю</button>
        </div>
    </div>

    <!-- Модальное окно с теорией -->
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
    
    <!-- Модальное окно для подтверждения очистки истории -->
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
                <button class="lang-btn" onclick="changeLanguage('uz-latn')" data-translate="uzbek-latn">Oʻzbekcha (латиница)</button>
                <button class="lang-btn" onclick="changeLanguage('en')" data-translate="english">English</button>
            </div>
        </div>
    </div>
    
     <!-- Вывод версии -->
    <div class="version">Версия: <span id="version-number"></span></div>

    <!-- Подключение скриптов -->
    <script src="resources/scripts/main.js" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/i18next@latest/i18next.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/i18next-http-backend@latest/i18nextHttpBackend.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/i18next-browser-languagedetector@latest/i18nextBrowserLanguageDetector.min.js"></script>
</body>
</html>
