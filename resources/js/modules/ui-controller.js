export function initUiController() {
    document.querySelectorAll('.custom-tabs .nav-link').forEach(button => {
        button.addEventListener('click', function () {
            document.querySelectorAll('.custom-tabs .nav-link')
                .forEach(btn => btn.classList.remove('active'));

            document.querySelectorAll('.tab-content')
                .forEach(tab => tab.classList.remove('active'));

            this.classList.add('active');

            const tabId = this.getAttribute('data-tab');
            document.getElementById(tabId).classList.add('active');

            // Sync the internal index if user clicks top pills
            currentTabIndex = tabs.indexOf(tabId);
        });
    });
}

export function addProject() {
    const wrapper = document.getElementById('projectsWrapper');
    const index = wrapper.children.length;

    const html = `
        <div class="project-entry border-bottom border-secondary pb-4 mb-4">
            <div class="row">
                <div class="col-md-12 mb-3">
                    <input type="text" name="projects[${index}][title]" class="form-control cyber-input" placeholder="Project Title">
                </div>
                <div class="col-md-12">
                    <textarea name="projects[${index}][description]" rows="3" class="form-control cyber-input" placeholder="Describe your project (comma separated for bullet points)"></textarea>
                </div>
            </div>
        </div>
    `;
    wrapper.insertAdjacentHTML('beforeend', html);
}

// 1. Keep your global variables
const tabs = ['tab-basic', 'tab-summary', 'tab-employment', 'tab-education', 'tab-projects', 'tab-skills',
    'tab-review'
];
let currentTabIndex = 0;

// 2. The ONLY way to change tabs is through this global function
export function changeTab(step) {
    const nextIndex = currentTabIndex + step;

    if (nextIndex < 0 || nextIndex >= tabs.length) return;

    document.getElementById(tabs[currentTabIndex]).classList.remove('active');

    currentTabIndex = nextIndex;
    document.getElementById(tabs[currentTabIndex]).classList.add('active');

    // Assumes updateTabUI exists or is called elsewhere
    if (typeof window.updateTabUI === 'function') {
        window.updateTabUI();
    }
}

export function updateTabUI() {
    const activeTabId = tabs[currentTabIndex];

    // Update Top Navigation Pills (Visual only)
    document.querySelectorAll('#resumeTabs .nav-link').forEach(link => {
        link.classList.toggle('active', link.getAttribute('data-tab') === activeTabId);
    });

    // Handle Back/Next Visibility
    const prevBtn = document.getElementById('prevBtn');
    const nextBtn = document.getElementById('nextBtn');

    if (prevBtn) {
        currentTabIndex === 0 ? prevBtn.classList.add('d-none') : prevBtn.classList.remove('d-none');
    }

    if (nextBtn) {
        currentTabIndex === tabs.length - 1 ? nextBtn.classList.add('d-none') : nextBtn.classList.remove('d-none');
        updateTitle(tabs);
    }
}


// Map Tab IDs to readable Titles and Descriptions

export function updateTitle(tabs) {
    var step_count = document.getElementById('currentStep');
    const tabMetadata = {
        'tab-basic': {
            step: 1,
            desc: 'Basic Information'
        },
        'tab-summary': {
            step: 2,
            desc: 'Professional Summary'
        },
        'tab-employment': {
            step: 3,
            desc: 'Work Experience'
        },
        'tab-education': {
            step: 4,
            desc: 'Education & Certs'
        },
        'tab-projects': {
            step: 5,
            desc: 'Personal Projects'
        },
        'tab-skills': {
            step: 6,
            desc: 'Skills & Strengths'
        },
        'tab-review': {
            step: 7,
            desc: 'Review & Export'
        }
    };

    const activeTabId = tabs[currentTabIndex];
    const data = tabMetadata[activeTabId];
    step_count.innerText = data.step;
    document.querySelector('.step-title').innerText = data.desc;
}

// Attach listener to the entire form container


export function calculatePercentage() {
    // 1. Re-select ALL inputs every time (captures newly added dynamic fields)
    const allFields = document.querySelectorAll('input:not([type="hidden"]), textarea, select');

    // 2. Filter out fields you don't want to track (like the "Skill Input" box itself)
    const trackableFields = Array.from(allFields).filter(field => {
        return !field.classList.contains('cyber-input-minimal'); // Exclude the tag-adder input
    });

    if (trackableFields.length === 0) return;

    let filledCount = 0;

    // 3. Count filled fields
    trackableFields.forEach(field => {
        if (field.value.trim() !== "") {
            filledCount++;
        }
    });

    // 4. Calculate
    const percentage = Math.round((filledCount / trackableFields.length) * 100);

    // Update the UI
    // Update the UI
    const percentElem = document.getElementById('progressPercent');
    if (percentElem) percentElem.innerText = `${percentage}%`;

    // 🟢 TARGET THE PROGRESS BAR HERE
    const progressBar = document.getElementById('progressBar');
    if (progressBar) {
        progressBar.style.width = `${percentage}%`;
    }

    updateBadgeColor(percentage);

    // In modular form, ensure updateScoreUI is called safely
    if (typeof updateScoreUI === "function") {
        updateScoreUI();
    }
}

export function updateBadgeColor(percentage) {
    const badge = document.querySelector('.step-percent');

    if (!badge) return;


    let color, bgColor;

    if (percentage < 20) {
        // 0-19%: Critical Red
        color = "#ff0000";
        bgColor = "rgba(255, 77, 77, 0.1)";
    } else if (percentage < 40) {
        // 20-39%: Deep Orange
        color = "#ff8c00";
        bgColor = "rgba(255, 140, 0, 0.15)";
    } else if (percentage < 60) {
        // 40-59%: Cyber Yellow
        color = "#ffcc00";
        bgColor = "rgba(255, 204, 0, 0.15)";
    } else if (percentage < 80) {
        // 60-79%: Lime Green
        color = "#adff2f";
        bgColor = "rgba(173, 255, 47, 0.15)";
    } else if (percentage < 100) {
        // 80-99%: Your Signature Cyber Cyan
        color = "#00f2ff";
        bgColor = "rgba(0, 242, 255, 0.15)";
    } else {
        // 100%: Ultimate Emerald (Completion Glow)
        color = "#00ff88";
        bgColor = "rgba(0, 255, 136, 0.2)";
        badge.style.boxShadow = "0 0 15px rgba(0, 255, 136, 0.4)"; // Final Glow
    }

    badge.style.color = color;
    badge.style.backgroundColor = bgColor;
    badge.style.border = `1px solid ${color}4d`; // 30% opacity border for extra "pop"
}

let employmentCount = 0;

export function toggleCurrentJob(id) {
    const endDateInput = document.getElementById(`end-date-${id}`);
    const checkbox = document.getElementById(`current-${id}`);

    if (checkbox.checked) {
        endDateInput.disabled = true;
        endDateInput.value = '';
    } else {
        endDateInput.disabled = false;
    }
}

export function updateEmploymentNumbers() {
    const titles = document.querySelectorAll('.employment-title');
    titles.forEach((title, index) => {
        title.innerText = `Employment ${index + 1}`;
    });

}

export function updateEducationNumbers() {
    const titles = document.querySelectorAll('.education-title');
    titles.forEach((title, index) => {
        title.innerText = `Education ${index + 1}`;
    })
}



export function addEmployment() {
    employmentCount++;
    document.getElementById('employmentWrapper').insertAdjacentHTML('beforeend', `
    <div class="job-card mb-4 p-4 position-relative " id="employment-${employmentCount}">

        <button type="button"
                class="btn btn-sm btn-danger position-absolute top-0 end-0 m-3"
                onclick="removeSection('employment-${employmentCount}')">
            ✕
        </button>

        <div class="d-flex align-items-center mb-3">
            <div class="job-icon me-3">💼</div>
            <h5 class="mb-0 gradient-text employment-title">Employment ${employmentCount}</h5>
        </div>

        <div class="row">
            <div class="col-md-6 mb-3">
                <label class="form-label text-info">Job Title</label>
                <input type="text"
                       name="employment[${employmentCount}][job_title]"
                       class="form-control cyber-input"
                       placeholder="Senior Laravel Developer">
            </div>

            <div class="col-md-6 mb-3">
                <label class="form-label text-info">Employer</label>
                <input type="text"
                       name="employment[${employmentCount}][employer]"
                       class="form-control cyber-input"
                       placeholder="Company Name">
            </div>
        </div>

        <div class="row align-items-end">
            <div class="col-md-5 mb-3">
                <label class="form-label text-info">Start Date</label>
                <input type="date"
                       name="employment[${employmentCount}][start_date]"
                       class="form-control cyber-input">
            </div>

            <div class="col-md-5 mb-3">
                <label class="form-label text-info">End Date</label>
                <input type="date"
                       id="end-date-${employmentCount}"
                       name="employment[${employmentCount}][end_date]"
                       class="form-control cyber-input">
            </div>

            <div class="col-md-2 mb-3 d-flex align-items-center">
                <div class="form-check mt-4">
                    <input class="form-check-input"
                           type="checkbox"
                           onchange="toggleCurrentJob(${employmentCount})"
                           id="current-${employmentCount}">
                    <label class="form-check-label text-secondary small">
                        Currently Working
                    </label>
                </div>
            </div>
        </div>

        <div class="mb-3">
            <label class="form-label text-info">City</label>
            <input type="text"
                   name="employment[${employmentCount}][city]"
                   class="form-control cyber-input"
                   placeholder="City, State">
        </div>

        <div>
            <label class="form-label text-info">Description</label>
            <textarea name="employment[${employmentCount}][description]"
                      rows="4"
                      class="form-control cyber-input"
                      placeholder="Describe your responsibilities, achievements, measurable results..."></textarea>
        </div>

    </div>
`);
    updateEmploymentNumbers();
    updateScoreUI();
}


let educationCount = 0;

export function addEducation() {
    educationCount++;
    document.getElementById('educationWrapper').insertAdjacentHTML('beforeend', `
    <div class="edu-card mb-4 p-4 position-relative" id="education-${educationCount}">

        <button type="button"
                class="btn btn-sm btn-danger position-absolute top-0 end-0 m-3"
                onclick="removeSection('education-${educationCount}')">
            ✕
        </button>

        <div class="d-flex align-items-center mb-3">
            <div class="edu-icon me-3">🎓</div>
            <h5 class="mb-0 gradient-text education-title">Education ${educationCount}</h5>
        </div>

        <div class="row">
            <div class="col-md-6 mb-3">
                <label class="form-label text-info">School</label>
                <input type="text"
                       name="education[${educationCount}][school]"
                       class="form-control cyber-input"
                       placeholder="University / School Name">
            </div>

            <div class="col-md-6 mb-3">
                <label class="form-label text-info">Degree</label>
                <input type="text"
                       name="education[${educationCount}][degree]"
                       class="form-control cyber-input"
                       placeholder="Degree / Field of Study">
            </div>
        </div>

        <div class="row">
           <div class="col-md-6 mb-3">
    <label class="form-label text-info mb-2">Start Date</label>
    
    <div class="row g-2">
        <div class="col-7">
            <select name="education[${educationCount}][start_month]" 
                    class="form-select cyber-input month-selector"
                    required>
                <option value="" selected disabled>Month</option>
                <option value="Jan">January</option>
                <option value="Feb">February</option>
                <option value="Mar">March</option>
                <option value="Apr">April</option>
                <option value="May">May</option>
                <option value="Jun">June</option>
                <option value="Jul">July</option>
                <option value="Aug">August</option>
                <option value="Sep">September</option>
                <option value="Oct">October</option>
                <option value="Nov">November</option>
                <option value="Dec">December</option>
            </select>
        </div>
        <div class="col-5">
            <select name="education[${educationCount}][start_year]" 
                    class="form-select cyber-input year-selector"
                    required>
                <option value="" selected disabled>Year</option>
                ${generateYearOptions()}
            </select>
        </div>
    </div>
</div>

         <div class="col-md-6 mb-3">
    <div class="d-flex justify-content-between align-items-center mb-2">
        <label class="form-label text-info mb-0">End Date</label>
        <div class="form-check form-switch">
            <input class="form-check-input cyber-switch" 
                   type="checkbox" 
                   id="present_edu_${educationCount}"
                   onchange="togglePresent(this, ${educationCount})">
            <label class="form-check-label text-info small" for="present_edu_${educationCount}">Currently Studying</label>
        </div>
    </div>

    <div class="row g-2" id="date_group_${educationCount}">
        <div class="col-7">
            <select name="education[${educationCount}][end_month]" 
                    class="form-select cyber-input month-selector">
                <option value="">Month</option>
                <option value="01">January</option>
                <option value="02">February</option>
                <option value="03">March</option>
                <option value="04">April</option>
                <option value="05">May</option>
                <option value="06">June</option>
                <option value="07">July</option>
                <option value="08">August</option>
                <option value="09">September</option>
                <option value="10">October</option>
                <option value="11">November</option>
                <option value="12">December</option>
            </select>
        </div>
        <div class="col-5">
            <select name="education[${educationCount}][end_year]" 
                    class="form-select cyber-input year-selector">
                <option value="">Year</option>
                ${generateYearOptions()}
            </select>
        </div>
    </div>
</div>
        </div>

        <div class="mb-3">
            <label class="form-label text-info">City</label>
            <input type="text"
                   name="education[${educationCount}][city]"
                   class="form-control cyber-input"
                   placeholder="City">
        </div>

        <div>
            <label class="form-label text-info">Description</label>
            <textarea name="education[${educationCount}][description]"
                      rows="3"
                      class="form-control cyber-input"
                      placeholder="Achievements, honors, relevant coursework..."></textarea>
        </div>

    </div>
`);
    updateEducationNumbers();
    updateScoreUI();
}

let skillCount = 0;

export function addSkill() {
    skillCount++;
    document.getElementById('skillsWrapper').insertAdjacentHTML('beforeend', `
    <div class="cyber-skill-card mb-3 p-4" id="skill-${skillCount}">
        
        <div class="d-flex justify-content-between align-items-center mb-3">
            <input type="text"
                   name="skills[${skillCount}][name]"
                   class="form-control cyber-input skill-input"
                   placeholder="Enter Skill Name">

            <button type="button"
                    class="btn btn-sm btn-danger ms-3"
                    onclick="removeSection('skill-${skillCount}')">
                ✕
            </button>
        </div>

        <div class="d-flex align-items-center justify-content-between">

            <div class="skill-level-controls">
                <button type="button"
                        class="level-btn minus"
                        onclick="changeLevel(${skillCount}, -1)">
                    −
                </button>

                <div class="skill-stars" id="skill-stars-${skillCount}">
                    ${[1, 2, 3, 4, 5].map(i => `<span class="star active">★</span>`).join('')}
                </div>

                <button type="button"
                        class="level-btn plus"
                        onclick="changeLevel(${skillCount}, 1)">
                        +
                        </button>
                        </div>
                        
                        </div>
                        
                        <input type="hidden"
                        name="skills[${skillCount}][level]"
                        id="skill-input-${skillCount}"
                        value="3">
                        
                        </div>
                        `);
    updateScoreUI();
}

export function togglePresent(checkbox, id) {
    const container = document.getElementById(`date_group_${id}`);
    const selectors = container.querySelectorAll('select');

    selectors.forEach(select => {
        if (checkbox.checked) {
            select.disabled = true;
            select.value = ""; // Clear selection
            select.style.opacity = "0.4";
            select.parentElement.style.filter = "grayscale(1)";
        } else {
            select.disabled = false;
            select.style.opacity = "1";
            select.parentElement.style.filter = "none";
        }
    });
}

// Simple helper to generate years from 1990 to current
export function generateYearOptions() {
    let years = '';
    const currentYear = new Date().getFullYear();
    for (let i = currentYear; i >= 1990; i--) {
        years += `<option value="${i}">${i}</option>`;
    }
    return years;
}



export function changeLevel(id, change) {
    const input = document.getElementById(`skill-input-${id}`);
    const starsContainer = document.getElementById(`skill-stars-${id}`);
    let level = parseInt(input.value);

    level += change;
    if (level < 1) level = 1;
    if (level > 5) level = 5;

    input.value = level;


    const stars = starsContainer.querySelectorAll('.star');

    stars.forEach((star, index) => {
        if (index < level) {
            star.classList.add('active');
        } else {
            star.classList.remove('active');
        }
    });
}

export function removeSection(id) {
    document.getElementById(id).remove();
    updateEmploymentNumbers();
    updateEducationNumbers();
    updateScoreUI();
}

export function openResultRoute(data) {
    // Create a form dynamically
    const form = document.createElement('form');
    form.method = 'POST';
    form.action = `/resume/preview`;
    form.target = '_blank'; // Opens in new tab

    // Add CSRF token for Laravel
    const csrf = document.createElement('input');
    csrf.type = 'hidden';
    csrf.name = '_token';
    csrf.value = document.querySelector('meta[name="csrf-token"]').content;
    form.appendChild(csrf);

    // Add the data (converted to a string if it's an object)
    const input = document.createElement('input');
    input.type = 'hidden';
    input.name = 'resume_data';
    input.value = JSON.stringify(data);
    form.appendChild(input);

    document.body.appendChild(form);
    form.submit();
    document.body.removeChild(form); // Clean up
}
export function submitForm() {
    // submitting form and generating preview logic will come here
    let resumeForm = document.getElementById('resumeForm');

    resumeForm.addEventListener('submit', async function (e) {

        e.preventDefault();

        const previewContainer = document.getElementById('livePreviewContainer');
        const btn = document.getElementById('generateBtn');
        const btnText = document.getElementById('btnText');
        const btnLoader = document.getElementById('btnLoader');

        let formData = new FormData(resumeForm);

        try {

            // 🔥 Disable button + show spinner
            btn.disabled = true;
            btnText.classList.add('d-none');
            btnLoader.classList.remove('d-none');

            // 🔥 Show right side loader

            const response = await fetch("/resume-builder", {
                method: 'POST',
                credentials: 'same-origin',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                },
                body: formData
            });

            const data = await response.json();
            if (!data.success) {
                showToast('error', data.message);
                // 🔥 Disable button + show spinner
                // 🔥 Show right side loader

                return;
            } else {
                if (data.used_credits) {
                  const  credits = document.querySelectorAll('.credits_count');
                    credits.forEach(e => {
                        e.innerText = data.used_credits;
                    });
                }
                openResultRoute(data.html);
            }

        } catch (error) {
            showToast('error', 'Failed to generate resume. Please try again.');
        } finally {

            // 🔥 Restore button
            btn.disabled = false;
            btnText.classList.remove('d-none');
            btnLoader.classList.add('d-none');
        }

    });
}