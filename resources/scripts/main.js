// Версия проекта
document.addEventListener('DOMContentLoaded', () => {
    const currentVersion = '0.0.06'; // Задайте актуальную версию здесь
    const versionElement = document.getElementById('version-number');
    if (versionElement) {
        versionElement.textContent = currentVersion;
    } else {
        console.error('Элемент с id "version-number" не найден.');
    }
});

// Функция для инициализации событий на элементах страницы
function initEventListeners() {
    // Привязка обработчиков событий ко всем числовым полям ввода
    document.querySelectorAll('input[type="number"]').forEach(input => {
        input.addEventListener('input', handleInput);   // Обработка изменения значения
        input.addEventListener('focus', showTooltip);   // Показ всплывающей подсказки
        input.addEventListener('blur', hideTooltip);    // Скрытие всплывающей подсказки
    });

    // Привязка обработчика события переключения темы
    const themeSwitcher = document.getElementById('theme-switcher');
    themeSwitcher.addEventListener('change', handleThemeSwitch);
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
    resultDiv.textContent = `Объем: ${volume.toFixed(3)} м³`;
    resultDiv.classList.add('show'); // Показ результата
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
    resultDiv.textContent = 'Объем: 0 м³';
    resultDiv.classList.remove('show'); // Скрытие результата
}

// Очистка ошибок в полях ввода
function clearErrors() {
    document.querySelectorAll('input[type="number"]').forEach(input => input.classList.remove('error'));
    document.getElementById('error-hint').classList.remove('show-error'); // Скрытие сообщения об ошибке
}

// Отображение ошибок в полях ввода
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
    const tooltipId = 'tooltip' + event.target.id.charAt(4); // Получение идентификатора подсказки
    document.getElementById(tooltipId).classList.add('show'); // Показ подсказки
}

// Скрытие всплывающей подсказки при потере фокуса
function hideTooltip(event) {
    const tooltipId = 'tooltip' + event.target.id.charAt(4); // Получение идентификатора подсказки
    document.getElementById(tooltipId).classList.remove('show'); // Скрытие подсказки
}

// Переключение видимости окна Теории
function toggleTheory() {
    document.getElementById('theory-overlay').classList.toggle('open'); // Переключение класса открытия
}

// Обработка переключения темы
function handleThemeSwitch() {
    const themeSwitcher = document.getElementById('theme-switcher');
    const body = document.body;

    // Переключение между светлой и темной темой
    if (themeSwitcher.checked) {
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
            themeSwitcher.checked = savedTheme === 'dark';
        } else {
            body.classList.remove('dark-mode');
            themeSwitcher.checked = false;
        }
    });
});






// Переключение видимости секции истории расчетов
function toggleHistory() {
    document.getElementById('history-overlay').classList.toggle('open');
    updateClearHistoryButtonVisibility(); // Обновляем видимость кнопки при открытии окна
}



// Сохранение расчета в историю
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




// Очистка истории расчетов с подтверждением
function clearHistory() {
    if (confirm('Вы уверены, что хотите очистить историю расчетов?')) {
        document.getElementById('history-list').innerHTML = '';
        updateClearHistoryButtonVisibility(); // Обновляем видимость кнопки после очистки
    }
}

// Обновление видимости кнопки "Очистить историю"
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

// Обработка изменения значения в полях ввода
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






// Показ модального окна
function openClearHistoryModal() {
    document.getElementById('clear-history-modal').style.display = 'flex'; // Меняем на 'flex', чтобы окно отображалось
}

// Скрытие модального окна
function closeModal() {
    document.getElementById('clear-history-modal').style.display = 'none'; // Скрываем окно
}

// Подтверждение очистки истории
function confirmClearHistory() {
    document.getElementById('history-list').innerHTML = ''; // Очищаем историю
    updateClearHistoryButtonVisibility(); // Обновляем видимость кнопки после очистки
    closeModal(); // Закрываем модальное окно
}

// Вызываем показ модального окна только при нажатии на кнопку "Очистить историю"
function clearHistory() {
    openClearHistoryModal();
}





// Инициализация i18next
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

// Обновление содержимого
function updateContent() {
  document.querySelectorAll('[data-translate]').forEach(function(element) {
    element.innerText = i18next.t(element.getAttribute('data-translate'));
  });
}

// Изменение языка
function changeLanguage(lng) {
  i18next.changeLanguage(lng, () => {
    updateContent();
    document.querySelector('.language-modal-overlay').classList.remove('open');
    localStorage.setItem('language', lng);
  });
}

// События после загрузки страницы
document.addEventListener('DOMContentLoaded', function() {
  const savedLanguage = localStorage.getItem('language');
  if (savedLanguage) {
    i18next.changeLanguage(savedLanguage, updateContent);
  }

    const languageBtn = document.querySelector('.language-btn');
    const modalOverlay = document.querySelector('.language-modal-overlay');
    const modalCloseBtn = document.querySelector('.language-modal-close-btn');

    // Открыть модальное окно
    languageBtn.addEventListener('click', function() {
        modalOverlay.classList.add('open');
    });

    // Закрыть модальное окно при клике на кнопку закрытия
    modalCloseBtn.addEventListener('click', function() {
        modalOverlay.classList.remove('open');
    });

    // Закрыть модальное окно при клике за его пределами
    modalOverlay.addEventListener('click', function(event) {
        if (event.target === modalOverlay) {
            modalOverlay.classList.remove('open');
        }
    });
});