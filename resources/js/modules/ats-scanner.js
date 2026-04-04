export async function initiateAtsScan() {
    const scanBtn = document.querySelector('.cyber-scan-btn');
    const badge = document.getElementById('atsBadge');
    const resumeForm = document.getElementById('resumeForm');

    // 1. SELECT ALL TRACKABLE FIELDS
    const allFields = resumeForm.querySelectorAll('input:not([type="hidden"]), textarea, select');

    // 2. FILTER FILLED FIELDS
    const filledFields = Array.from(allFields).filter(field => field.value.trim() !== "");

    // 3. GATEKEEPER CHECK (Before changing UI state)
    if (filledFields.length < 12) {
        scanBtn.classList.add('btn-shake');
        // badge.innerText = "DATA INSUFFICIENT";
        // badge.className = "badge bg-danger text-white";

        const missing = 12 - filledFields.length;
        showToast("error", `The Architect requires more data. Please fill at least ${missing} more fields.`);

        setTimeout(() => scanBtn.classList.remove('btn-shake'), 500);
        return; // HALT
    }

    // 4. ENTER LOADING STATE (Only if data is sufficient)
    scanBtn.disabled = true;
    scanBtn.innerHTML = `<span class="spinner-border spinner-border-sm me-2"></span> ANALYZING SYSTEM...`;
    badge.innerText = "SCANNING";
    badge.className = "badge bg-warning text-dark";

    try {
        // 5. PREPARE DATA
        const formData = new FormData(resumeForm);

        // 6. FETCH FROM LARAVEL
        const response = await fetch("/resume/score_check", {
            method: 'POST',
            body: formData,
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute(
                    'content'),
                'Accept': 'application/json'
            }
        });

        const result = await response.json();
        // console.log("ATS_SCAN_RESULT:", result);
        // 7. HANDLE RESPONSE
        if (response.ok && result.success) {
            showToast("success", "Scan Complete! System Analysis updated.");
           const credits = document.querySelectorAll('.credits_count');
            credits.forEach(e => {
                e.innerText = result.used_credits;
            });
            // Call your UI update functions here
            // if (typeof updateScanUI === "function") {
            //     updateScanUI(result.score, result.status);
            // }

            // If you have a modal to show tips:
            // Pass everything to the report modal
            showAtsReportModal(
                result.tips,
                result.keywords,
                result.score,
                result.status
            );

            badge.innerText = "READY";
            badge.className = "badge bg-info text-dark";
            scanBtn.disabled = false;
            scanBtn.innerHTML = `<i class='bx bx-radar bx-tada me-2'></i> RUN SMART SCAN`;
        } else {
            // Handle Backend Validation Errors
            showToast("error", result.message || "The Architect found an error in the data stream.");
            badge.innerText = 'INCOMPLETE';
            badge.className = "badge bg-danger text-white";
        }

    } catch (error) {
        console.error("ATS_SCAN_CRITICAL_ERROR:", error);
        showToast("error", "Connection lost. The AI Architect is unreachable.");
        badge.innerText = 'OFFLINE';
        badge.className = "badge bg-secondary text-white";
    } finally {
        // 8. RESET BUTTON STATE
        scanBtn.disabled = false;
        scanBtn.innerHTML = `<i class='bx bx-radar bx-tada me-2'></i> RUN SMART SCAN`;
    }
}
export function showAtsReportModal(tips, keywords, score, status) {
    const reportModal = new bootstrap.Modal(document.getElementById('atsReportModal'));

    // 1. Update Score and Status
    document.getElementById('reportScore').innerText = score;
    document.getElementById('reportStatus').innerText = `Status: ${status}`;

    // 2. Clear and Populate Tips
    const tipsContainer = document.getElementById('reportTipsList');
    tipsContainer.innerHTML = '';
    tips.forEach(tip => {
        const li = document.createElement('li');
        li.className = "list-group-item bg-transparent text-secondary border-0 ps-0 pb-2 small";
        li.innerHTML = `<i class='bx bx-right-arrow-alt text-info me-2'></i> ${tip}`;
        tipsContainer.appendChild(li);
    });

    // 3. Clear and Populate Keywords
    const keywordContainer = document.getElementById('reportKeywordsList');
    keywordContainer.innerHTML = '';
    keywords.forEach(keyword => {
        const span = document.createElement('span');
        span.className = "badge border border-info border-opacity-25 text-info fw-normal p-2";
        span.style.fontSize = "11px";
        span.innerText = keyword;
        keywordContainer.appendChild(span);
    });

    // 4. Show the Modal
    reportModal.show();
}