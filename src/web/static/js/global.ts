const darkTheme = {
    '--background-color': '#121110',
    '--text-color': '#fff',
    '--secondary-text': '#eee',
    '--light-color': '#bbb',
    '--input-color': 'hsl(30, 6%, 20%)',
    '--blend-mode': 'darken',
    '--img-filter': 'brightness(.4)',
    '--icon-invert': '0',
    '--index-background-url': 'url(../assets/background_dark.jpg)',
};
const lightTheme = {
    '--background-color': '#efe8e2',
    '--text-color': '#111',
    '--secondary-text': '#222',
    '--light-color': '#111',
    '--input-color': 'hsl(29, 21%, 78%)',
    '--blend-mode': 'lighten',
    '--img-filter': 'blur(8px)',
    '--icon-invert': '1',
    '--index-background-url': 'url(../assets/background_light.jpg)',
};
const themeToggle = <HTMLInputElement>document.getElementById('theme-toggle');
if (window.matchMedia != undefined) {
    themeToggle.checked = window.matchMedia(
        '(prefers-color-scheme: dark)'
    ).matches;

    window
        .matchMedia('(prefers-color-scheme: dark)')
        .addEventListener('change', (event) => {
            themeToggle.checked = event.matches;
        });
}

const savedTheme = localStorage.getItem('theme');
const root = document.documentElement;
if (savedTheme == 'dark') {
    for (const key in darkTheme) {
        root.style.setProperty(key, darkTheme[key]);
    }
    themeToggle.checked = true;
} else if (savedTheme == 'light') {
    for (const key in lightTheme) {
        root.style.setProperty(key, lightTheme[key]);
    }
    themeToggle.checked = false;
}

themeToggle.onchange = () => {
    if (themeToggle.checked) {
        for (const key in darkTheme) {
            root.style.setProperty(key, darkTheme[key]);
        }
        localStorage.setItem('theme', 'dark');
    } else {
        for (const key in lightTheme) {
            root.style.setProperty(key, lightTheme[key]);
        }
        localStorage.setItem('theme', 'light');
    }
};

const navbar = document.getElementById('nav');
if (navbar) {
    navbar.classList.add('transparent');
    document.addEventListener('scroll', () => {
        const dist = window.scrollY;
        if (dist > 20) {
            navbar.className = '';
        } else {
            navbar.className = 'transparent';
        }
    });
}

const themeToggleContainer = <HTMLDivElement>(
    document.getElementById('theme-toggle-container')
);
themeToggleContainer.style.display = 'flex';
