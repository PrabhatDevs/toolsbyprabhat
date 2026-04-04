// Internal state (private to this module)
let skills = [];

export function initSkillEngine() {
    const skillInput = document.getElementById('skillInput');
    if (!skillInput) return;

    skillInput.addEventListener('keydown', (e) => {
        if (e.key === ',' || e.key === 'Enter') {
            e.preventDefault();
            const value = skillInput.value.trim().replace(/,/g, '');

            if (value !== "" && !skills.includes(value)) {
                skills.push(value);
                renderTags();
                if (window.updateScoreUI) window.updateScoreUI();
            }
            skillInput.value = '';
        }
    });

    let debounceTimer;
    skillInput.addEventListener('input', () => {
        const query = skillInput.value.trim();

        // Clear the timer every time the user types
        clearTimeout(debounceTimer);

        // Only fetch if the user has typed 2+ characters
        if (query.length >= 2) {
            debounceTimer = setTimeout(() => {
                fetchAiSuggestions(query);
            }, 600);
        } else {
            document.getElementById('aiSuggestions').classList.add('d-none');
        }
    });
}

export function addTag(label) {
    if (!skills.includes(label)) {
        skills.push(label);
        renderTags();
    }
}

export function removeTag(index) {
    skills.splice(index, 1);
    renderTags();
    if (window.updateScoreUI) window.updateScoreUI();
}

export function renderTags() {
    const skillsList = document.getElementById('skillsList');
    const hiddenInput = document.getElementById('hiddenSkillsInput');
    if (!skillsList || !hiddenInput) return;

    skillsList.innerHTML = '';
    skills.forEach((skill, index) => {
        const tag = document.createElement('div');
        tag.className = 'cyber-tag';
        // Note: removeTag is called from window.removeTag
        tag.innerHTML = `${skill} <span class="remove-btn" onclick="removeTag(${index})">×</span>`;
        skillsList.appendChild(tag);
    });

    hiddenInput.value = skills.join(',');
}


  


export async function fetchAiSuggestions(query) {
    const summaryTextarea = document.getElementById('professional_summary').value;
    const professional_role = document.getElementById('professional_role').value;
    try {
        const response = await fetch('/ai/suggest-skills', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
            },
            body: JSON.stringify({
                query: query,
                summary: summaryTextarea,
                role: professional_role,
            })
        });

        const data = await response.json();

        if (data.suggestions && data.suggestions.length > 0) {
            displaySuggestions(data.suggestions);
        }
    } catch (error) {
        console.error("AI_FETCH_ERROR:", error);

    }
}

export function displaySuggestions(list) {
    const container = document.getElementById('aiSuggestions');
    const suggestionList = document.getElementById('suggestionList');

    container.classList.remove('d-none');
    suggestionList.innerHTML = ''; // Clear old ones

    list.forEach(skill => {
        const btn = document.createElement('button');
        btn.type = 'button';
        btn.className = 'btn btn-sm suggested_btn me-2 mb-2';
        btn.innerHTML = `<i class='bx bx-plus'></i> ${skill}`;

        // Add to your tag system when clicked
        btn.onclick = () => {
            addTag(skill); // Calls your existing addTag function
            container.classList.add('d-none'); // Hide after selection
            skillInput.value = '';
            skillInput.focus();
        };
        suggestionList.appendChild(btn);
    });
}