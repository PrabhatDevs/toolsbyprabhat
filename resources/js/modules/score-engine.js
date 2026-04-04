export function updateScoreColor(score) {
    const circle = document.querySelector('.score-circle');

    // Remove all potential color classes
    circle.classList.remove('score-red', 'score-orange', 'score-purple', 'score-green');

    // Add the correct class based on the point thresholds
    if (score <= 25) {
        circle.classList.add('score-red');
    } else if (score <= 50) {
        circle.classList.add('score-orange');
    } else if (score <= 80) {
        circle.classList.add('score-purple');
    } else {
        circle.classList.add('score-green');
    }

    // Update the number inside
    document.getElementById('resumeScore').innerText = score;
}

// Example usage:
// updateScoreColor(45); // This would turn the circle Orange
export function initScoreEngine() {
    let scorePoints = calculateCurrentPoints();
    updateScoreColor(scorePoints);
}

export function calculateCurrentPoints() {
    let score = 15; // Starting Baseline (System Initialized)

    // 1. Check Professional Links (+6 Total)
    const github = document.querySelector('input[name="github"]')?.value.trim();
    const linkedin = document.querySelector('input[name="linkedin"]')?.value.trim();
    const portfolio = document.querySelector('input[name="portfolio"]')?.value.trim();


    if (github || linkedin || portfolio) {
        score += 6;
        toggleGoalStatus('pro-links', true);
    } else {
        toggleGoalStatus('pro-links', false);
    }

    // 2. Check Professional Summary (+14)
    const summary = document.getElementById('professional_summary')?.value.trim();
    if (summary && summary.length > 50) {
        score += 14;
        toggleGoalStatus('point_summary', true);
    } else {
        toggleGoalStatus('point_summary', false);
    }

    // 3. Check Work Experience (+25)
    const allJobInputs = document.querySelectorAll('[id^="employment-"] input');
    const hasWorkExperience = Array.from(allJobInputs).some(input => input.value.trim().length > 0);
    if (hasWorkExperience) {
        score += 25;
        toggleGoalStatus('point_work-exp', true);
    } else {
        toggleGoalStatus('point_work-exp', false);
    }

    // 4. Check Education (+10)
    const allEducationInputs = document.querySelectorAll('[id^="education-"] input');
    const hasEducation = Array.from(allEducationInputs).some(input => input.value.trim().length > 0);
    if (hasEducation) {
        score += 10;
        toggleGoalStatus('point_education', true);
    } else {
        toggleGoalStatus('point_education', false);
    }

    // 5. Check Projects (+20)
    const project = document.querySelector('#projectsWrapper input')?.value.trim();
    if (project) {
        score += 20;
        toggleGoalStatus('point_projects', true);
    } else {
        toggleGoalStatus('point_projects', false);
    }

    // 6. Check Skills (+10)
    // Checking the length of your actual skill tags
    const skillsCount = document.querySelectorAll('#skillsList .cyber-tag').length;
    if (skillsCount > 0) {
        score += 10;
        toggleGoalStatus('point_skills', true);
    } else {
        toggleGoalStatus('point_skills', false);
    }

    return Math.min(score, 100);
}

export function updateScoreUI() {
    const currentScore = calculateCurrentPoints();

    // Update the Number
    const scoreElem = document.getElementById('resumeScore');
    if (scoreElem) scoreElem.innerText = currentScore;

    // Update the Color (using the function we wrote earlier)
    if (typeof updateScoreColor === "function") {
        updateScoreColor(currentScore);
    }


}

export function removeCheckMark(id) {
    let child = document.getElementById(id);
    if (child) {
        child.remove();
    }
}

export function toggleGoalStatus(id, isComplete) {
    const goalElement = document.getElementById(id);
    if (!goalElement) return;

    const checkIcon = goalElement.querySelector('.check');

    if (isComplete) {
        goalElement.classList.add('text-info'); // Glowing text
        goalElement.style.opacity = "1";
        if (checkIcon) {
            checkIcon.innerHTML = '✔';
            checkIcon.classList.add('text-success');
        }
    } else {
        goalElement.classList.remove('text-info');
        goalElement.style.opacity = "0.5";
        if (checkIcon) {
            checkIcon.innerHTML = '○';
            checkIcon.classList.remove('text-success');
        }
    }
}