export function showToast(status, message) {
    const container = document.getElementById('toast-container');
    if (!container) return;

    const toast = document.createElement('div');
    toast.className = 'toast ' + status;
    toast.innerHTML = message;

    container.appendChild(toast);
    void toast.offsetWidth; // Force reflow
    toast.classList.add('show');

    setTimeout(() => {
        toast.classList.remove('show');
        toast.classList.add('hide');
        toast.addEventListener('transitionend', () => {
            toast.remove();
        }, { once: true });
    }, 4000);
}

export async function checkauth() {
    try {
        const url = window.Laravel.authCheckUrl;
        const response = await fetch(url, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': window.Laravel.csrfToken,
                'Accept': 'application/json'
            },
        });
        if (!response.ok) return false;
        const data = await response.json();
        return data.is_login === true;
    } catch (error) {
        console.error("Auth check failed:", error);
        return false;
    }
}

// Global Bridge
window.showToast = showToast;
window.checkauth = checkauth;