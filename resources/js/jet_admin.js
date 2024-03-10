const applySystemTheme = () => {
    if (window.matchMedia && window.matchMedia('(prefers-color-scheme: dark)').matches) {
        document.body.classList.add('dark');
    } else {
        document.body.classList.remove('dark');
    }
};

const applyDarkModeIfSet = () => {
    let darkMode = localStorage.getItem('darkMode');

    if (darkMode === 'enabled') {
        document.body.classList.add('dark');
    }

    if (darkMode === 'system' || darkMode === null) {
        applySystemTheme();
    }
};

window.toggleDarkMode = function () {
    const body = document.body;
    body.classList.toggle('dark');

    if (body.classList.contains('dark')) {
        localStorage.setItem('darkMode', 'enabled');
    } else {
        localStorage.setItem('darkMode', 'disabled');
    }
}

// listen system theme changes
window.matchMedia('(prefers-color-scheme: dark)').addEventListener('change', e => {
    let darkMode = localStorage.getItem('darkMode');
    if (darkMode === 'system' || darkMode === null) {
        applySystemTheme();
    }
});

document.addEventListener('DOMContentLoaded', (event) => {
    applyDarkModeIfSet();
});

document.addEventListener('livewire:navigated', () => {
    applyDarkModeIfSet();
});