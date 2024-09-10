// Задайте актуальную версию проекта
const CURRENT_VERSION = '0.0.09'; 

// Обновление версии на странице после загрузки DOM
document.addEventListener('DOMContentLoaded', () => {
    const versionElement = document.getElementById('version-number');
    if (versionElement) {
        versionElement.textContent = CURRENT_VERSION;
    } else {
        console.error('Элемент с id "version-number" не найден.');
    }
});

// Инициализация обработчиков событий на элементах страницы
function initEventListeners() {
    // Привязка обработчиков событий ко всем числовым полям ввода
    document.querySelectorAll('input[type="number"]').forEach(input => {
        input.addEventListener('input', handleInput);   // Обработка изменения значения
        input.addEventListener('focus', showTooltip);   // Показ всплывающей подсказки
        input.addEventListener('blur', hideTooltip);    // Скрытие всплывающей подсказки
    });

    // Привязка обработчика события переключения темы
    const themeSwitcher = document.getElementById('theme-switcher');
    if (themeSwitcher) {
        themeSwitcher.addEventListener('change', handleThemeSwitch);
    }
}

// Обработка изменения значений в полях ввода
function handleInput() {
    // Преобразование значений полей ввода в числа, или 0, если не число
    const sideA = parseFloat(document.getElementById('sideA').value) || 0;
    const sideB = parseFloat(document.getElementById('sideB').value) || 0;
    const sideC = parseFloat(document.getElementById('sideC').value) || 0;

    // Проверка, что все значения положительны
    if (sideA > 0 && sideB > 0 && sideC > 0) {
        calculateVolume(sideA, sideB, sideC); // Вычисление объема и отображение результата
        clearErrors(); // Очистка ошибок
    } else {
        resetResult(); // Сброс результата
        displayErrors(); // Отображение ошибок
    }
}

// Расчет объема и отображение результата
function calculateVolume(sideA, sideB, sideC) {
    const volume = (sideA * sideB * sideC) / 1000000; // Вычисление объема в кубометрах
    const resultDiv = document.getElementById('result');
    if (resultDiv) {
        resultDiv.textContent = `Объем: ${volume.toFixed(3)} м³`;
        resultDiv.classList.add('show'); // Показ результата
    }
}

// Сброс всех полей ввода и результата
function resetCalculator() {
    document.querySelectorAll('input[type="number"]').forEach(input => input.value = '');
    resetResult(); // Сброс результата
    clearErrors(); // Очистка ошибок
}

// Сброс отображения результата
function resetResult() {
    const resultDiv = document.getElementById('result');
    if (resultDiv) {
        resultDiv.textContent = 'Объем: 0 м³';
        resultDiv.classList.remove('show'); // Скрытие результата
    }
}

// Очистка ошибок в полях ввода
function clearErrors() {
    document.querySelectorAll('input[type="number"]').forEach(input => input.classList.remove('error'));
    const errorHint = document.getElementById('error-hint');
    if (errorHint) {
        errorHint.classList.remove('show-error'); // Скрытие сообщения об ошибке
    }
}

// Отображение ошибок в полях ввода
function displayErrors() {
    document.querySelectorAll('input[type="number"]').forEach(input => {
        if (input.value <= 0) {
            input.classList.add('error'); // Добавление класса ошибки
        }
    });
    const errorHint = document.getElementById('error-hint');
    if (errorHint) {
        errorHint.classList.add('show-error'); // Показ сообщения об ошибке
    }
}

// Показ всплывающей подсказки при фокусе на поле ввода
function showTooltip(event) {
    const tooltipId = 'tooltip' + event.target.id.charAt(4); // Получение идентификатора подсказки
    const tooltipElement = document.getElementById(tooltipId);
    if (tooltipElement) {
        tooltipElement.classList.add('show'); // Показ подсказки
    }
}

// Скрытие всплывающей подсказки при потере фокуса
function hideTooltip(event) {
    const tooltipId = 'tooltip' + event.target.id.charAt(4); // Получение идентификатора подсказки
    const tooltipElement = document.getElementById(tooltipId);
    if (tooltipElement) {
        tooltipElement.classList.remove('show'); // Скрытие подсказки
    }
}

// Переключение видимости окна Теории
function toggleTheory() {
    const theoryOverlay = document.getElementById('theory-overlay');
    if (theoryOverlay) {
        theoryOverlay.classList.toggle('open'); // Переключение класса открытия
    }
}

// Обработка переключения темы
function handleThemeSwitch() {
    const themeSwitcher = document.getElementById('theme-switcher');
    const body = document.body;

    // Переключение между светлой и темной темой
    if (themeSwitcher && themeSwitcher.checked) {
        body.classList.add('dark-mode');
        localStorage.setItem('theme', 'dark'); // Сохранение темы в локальное хранилище
    } else {
        body.classList.remove('dark-mode');
        localStorage.setItem('theme', 'light'); // Сохранение темы в локальное хранилище
    }
}

// Инициализация событий и восстановление темы после загрузки DOM
document.addEventListener('DOMContentLoaded', () => {
    initEventListeners(); // Инициализация событий

    // Восстановление темы из локального хранилища
    const savedTheme = localStorage.getItem('theme');
    const body = document.body;
    const themeSwitcher = document.getElementById('theme-switcher');

    requestAnimationFrame(() => {
        if (savedTheme) {
            body.classList.toggle('dark-mode', savedTheme === 'dark');
            if (themeSwitcher) {
                themeSwitcher.checked = savedTheme === 'dark';
            }
        } else {
            body.classList.remove('dark-mode');
            if (themeSwitcher) {
                themeSwitcher.checked = false;
            }
        }
    });
});


/**
 * Переключение видимости секции истории расчетов.
 */
function toggleHistory() {
    document.getElementById('history-overlay').classList.toggle('open');
    updateClearHistoryButtonVisibility(); // Обновляем видимость кнопки при открытии окна
}

/**
 * Сохранение расчета в историю.
 * @param {number} sideA - Длина первой стороны.
 * @param {number} sideB - Длина второй стороны.
 * @param {number} sideC - Длина третьей стороны.
 * @param {number} volume - Объем расчета.
 */
function saveCalculation(sideA, sideB, sideC, volume) {
    const now = new Date();
    const date = now.toLocaleDateString();
    const time = now.toLocaleTimeString();
    const historyList = document.getElementById('history-list');

    const historyItem = document.createElement('div');
    historyItem.classList.add('history-item');
    historyItem.innerHTML = `
        <div class="history-header">
            <span class="history-time">Время: ${time}</span>
            <span class="history-date">Дата: ${date}</span>
        </div>
        <div>А: ${sideA} м</div>
        <div>В: ${sideB} м</div>
        <div>С: ${sideC} м</div>
        <div class="history-volume">Объем: ${volume.toFixed(3)} м³</div>
    `;
    
    historyList.appendChild(historyItem);
    updateClearHistoryButtonVisibility(); // Обновляем видимость кнопки после добавления расчета
}

/**
 * Очистка истории расчетов с подтверждением.
 */
function clearHistory() {
    if (confirm('Вы уверены, что хотите очистить историю расчетов?')) {
        document.getElementById('history-list').innerHTML = '';
        updateClearHistoryButtonVisibility(); // Обновляем видимость кнопки после очистки
    }
}

/**
 * Обновление видимости кнопки "Очистить историю".
 */
function updateClearHistoryButtonVisibility() {
    const historyList = document.getElementById('history-list');
    const clearHistoryBtn = document.getElementById('clear-history-btn');
    const minHistoryItemsForClearBtn = 5; // Минимальное количество расчетов для отображения кнопки

    if (historyList.children.length >= minHistoryItemsForClearBtn) {
        clearHistoryBtn.style.display = 'block';
    } else {
        clearHistoryBtn.style.display = 'none';
    }
}

/**
 * Обработка изменения значения в полях ввода и сохранение расчета в историю.
 */
function handleInput() {
    const sideA = parseFloat(document.getElementById('sideA').value) || 0;
    const sideB = parseFloat(document.getElementById('sideB').value) || 0;
    const sideC = parseFloat(document.getElementById('sideC').value) || 0;

    if (sideA > 0 && sideB > 0 && sideC > 0) {
        const volume = (sideA * sideB * sideC) / 1000000;
        calculateVolume(sideA, sideB, sideC);
        saveCalculation(sideA, sideB, sideC, volume); // Сохраняем расчет в историю
        clearErrors();
    } else {
        resetResult();
        displayErrors();
    }
}

/**
 * Показ модального окна для подтверждения очистки истории.
 */
function openClearHistoryModal() {
    document.getElementById('clear-history-modal').style.display = 'flex'; // Меняем на 'flex', чтобы окно отображалось
}

/**
 * Скрытие модального окна.
 */
function closeModal() {
    document.getElementById('clear-history-modal').style.display = 'none'; // Скрываем окно
}

/**
 * Подтверждение очистки истории и закрытие модального окна.
 */
function confirmClearHistory() {
    document.getElementById('history-list').innerHTML = ''; // Очищаем историю
    updateClearHistoryButtonVisibility(); // Обновляем видимость кнопки после очистки
    closeModal(); // Закрываем модальное окно
}

/**
 * Показ модального окна для очистки истории по нажатию кнопки.
 */
function clearHistory() {
    openClearHistoryModal();
}

/**
 * Инициализация i18next для мультиязычности.
 */
i18next
  .use(i18nextHttpBackend)
  .use(i18nextBrowserLanguageDetector)
  .init({
    fallbackLng: 'ru', // Язык по умолчанию
    backend: {
      loadPath: '/resources/locale/{{lng}}.json'
    },
    detection: {
      order: ['localStorage', 'navigator'],
      caches: ['localStorage']
    }
  }, function(err, t) {
    if (err) return console.error(err);
    updateContent();
  });

/**
 * Обновление содержимого страницы в соответствии с выбранным языком.
 */
function updateContent() {
  document.querySelectorAll('[data-translate]').forEach(function(element) {
    element.innerText = i18next.t(element.getAttribute('data-translate'));
  });
}

/**
 * Изменение языка интерфейса.
 * @param {string} lng - Код языка для изменения.
 */
function changeLanguage(lng) {
  i18next.changeLanguage(lng, () => {
    updateContent();
    document.querySelector('.language-modal-overlay').classList.remove('open');
    localStorage.setItem('language', lng);
  });
}

/**
 * Обработка событий после загрузки страницы.
 */
document.addEventListener('DOMContentLoaded', function() {
  const savedLanguage = localStorage.getItem('language');
  if (savedLanguage) {
    i18next.changeLanguage(savedLanguage, updateContent);
  }

  const languageBtn = document.querySelector('.language-btn');
  const modalOverlay = document.querySelector('.language-modal-overlay');
  const modalCloseBtn = document.querySelector('.language-modal-close-btn');

  // Открытие модального окна для выбора языка
  languageBtn.addEventListener('click', function() {
      modalOverlay.classList.add('open');
  });

  // Закрытие модального окна при клике на кнопку закрытия
  modalCloseBtn.addEventListener('click', function() {
      modalOverlay.classList.remove('open');
  });

  // Закрытие модального окна при клике за его пределами
  modalOverlay.addEventListener('click', function(event) {
      if (event.target === modalOverlay) {
          modalOverlay.classList.remove('open');
      }
  });
});
