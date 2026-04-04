
function showToast(status, message) {

    const container = document.getElementById('toast-container');
    if (!container) return;

    const toast = document.createElement('div');
    toast.className = 'toast ' + status;
    toast.innerHTML = message;

    container.appendChild(toast);

    // Force reflow to trigger animation
    void toast.offsetWidth;

    toast.classList.add('show');

    // Hide after 4 seconds
    setTimeout(() => {
        toast.classList.remove('show');
        toast.classList.add('hide');

        toast.addEventListener('transitionend', () => {
            toast.remove();
        }, { once: true });

    }, 4000);
}

// window.addEventListener('load', function () {
//     const cleanUrl = window.location.origin + window.location.pathname;
//     window.history.replaceState({}, document.title, cleanUrl);
// });

// Store the timestamp when the user leaves or the page loads
let lastActive = Date.now();

document.addEventListener("visibilitychange", () => {
    if (document.visibilityState === 'visible') {
        const threeHours = 3 * 60 * 60 * 1000; // 3 hours in milliseconds
        const currentTime = Date.now();

        if (currentTime - lastActive > threeHours) {
            // Refresh the page to sync session and preview
            window.location.reload();
        }
    } else {
        // Update the last active time when they leave the tab
        lastActive = Date.now();
    }
});

window.onfocus = function () {
    const lastSeen = localStorage.getItem('last_visit_time');
    const now = Date.now();
    const limit = 3 * 60 * 60 * 1000;

    if (lastSeen && (now - lastSeen > limit)) {
        localStorage.setItem('last_visit_time', now);
        window.location.reload();
    }
};

// Update timestamp periodically while they are typing
setInterval(() => {
    localStorage.setItem('last_visit_time', Date.now());
}, 5000);



async function checkauth() {
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
        // If response is 401 (Unauthorized) or 403 (Unverified), return false
        if (!response.ok) {
            return false;
        }
        const data = await response.json();

        // Return true only if is_login is present and true
        return data.is_login === true;

    } catch (error) {
        console.error("Auth check failed:", error);
        return false; // Return false on network/server error
    }
}