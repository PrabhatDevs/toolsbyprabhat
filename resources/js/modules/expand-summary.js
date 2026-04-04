document.getElementById('expandSummaryBtn').addEventListener('click', async function () {

    const summaryTextarea = document.getElementById('professional_summary');
    const originalText = summaryTextarea.value;

    try {
        this.disabled = true;
        this.innerText = "Expanding...";

        const response = await fetch("/resume/pro_summary", {
            method: 'POST',
            credentials: 'same-origin',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({
                current_summary: summaryTextarea.value
            })
        });

        const data = await response.json();
        if (!response.ok || !data.success) {
            throw new Error(data.message || 'Failed to expand summary.');
        }


        if (data.remaining_credits !== undefined) {
           const credits = document.querySelectorAll('.credits_count');
            credits.forEach(e => {
                e.innerText = data.used_credits;
            });
        }
        summaryTextarea.value = data.expanded_summary;
        updateScoreUI();

    } catch (error) {
        showToast('error', error.message || 'Failed to expand summary. Please try again.');
    } finally {
        this.disabled = false;
        this.innerText = "✨ Expand with AI";
    }

});