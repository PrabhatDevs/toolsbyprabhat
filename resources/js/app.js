import './bootstrap';

import { initiateAtsScan, showAtsReportModal } from './modules/ats-scanner';
import { initSkillEngine, fetchAiSuggestions } from './modules/skill-engine';
import {
    initUiController,
    addProject,
    changeTab,
    updateTabUI,
    updateTitle,
    calculatePercentage,
    addEmployment,
    toggleCurrentJob,
    addEducation,
    addSkill,
    togglePresent,
    changeLevel,
    removeSection,
    openResultRoute,
    submitForm

} from './modules/ui-controller';
import {
    initScoreEngine,
    updateScoreUI,
    removeCheckMark,
    toggleGoalStatus
    
} from './modules/score-engine';
 

window.submitForm = submitForm;
window.changeTab = changeTab;
window.initiateAtsScan = initiateAtsScan;
window.showAtsReportModal = showAtsReportModal;
window.fetchAiSuggestions = fetchAiSuggestions;
window.addProject = addProject;
window.updateTabUI = updateTabUI;
window.updateTitle = updateTitle;
window.calculatePercentage = calculatePercentage;
window.addEmployment = addEmployment;
window.toggleCurrentJob = toggleCurrentJob;
window.addEducation = addEducation;
window.addSkill = addSkill;
window.togglePresent = togglePresent;
window.changeLevel = changeLevel;
window.removeSection = removeSection;
window.openResultRoute = openResultRoute;
window.updateScoreUI = updateScoreUI;
window.removeCheckMark = removeCheckMark;
window.toggleGoalStatus = toggleGoalStatus;

// import './modules/expand-summary';
document.addEventListener('DOMContentLoaded', () => {
    initUiController();
    initSkillEngine();
    submitForm();
    initScoreEngine();
   


    document.addEventListener('input', (e) => {
        if (e.target.matches('input, textarea, select')) {
            calculatePercentage();
        }
    });
    // updateTabUI();
});
