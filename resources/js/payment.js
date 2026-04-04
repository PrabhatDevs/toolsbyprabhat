function showSuccess(aiCredits, pdfCredits) {
    // 1. Update the counts in the modal
    document.getElementById('success_ai_credits').innerText = aiCredits;
    document.getElementById('success_pdf_credits').innerText = pdfCredits;

    // 2. Show the Modal
    const successModal = new bootstrap.Modal(document.getElementById('successModal'));
    successModal.show();

    // 3. Optional: Trigger a small confetti or sound effect
    console.log("System Upgrade Successful");
}

document.querySelectorAll('.buy-credits').forEach(btn => {
    btn.addEventListener('click', async function () {
        // 1. Initial UI Feedback
        const originalText = this.innerHTML;
        this.disabled = true;
        this.innerHTML = `<span class="spinner-border spinner-border-sm"></span> Processing...`;

        try {
            // 2. Authorization Check
            const isAuthenticated = await checkauth();

            if (!isAuthenticated) {
                showToast('error', 'Unauthorized access. Please login to continue.');
                this.disabled = false;
                this.innerHTML = originalText;
                return;
            }
            showToast('success', 'Authorization verified. Proceeding...');

            // 3. Extract Dynamic Data from Button Attributes
            // These values are updated by your toggle logic or initial Blade render
            const amount = this.dataset.amount;
            const type = this.dataset.type; // e.g., 'starter', 'pdf_bundle'
            const userEmail = this.dataset.email; // Grab email from data-email
            const userName = this.dataset.name;
            const currency = this.dataset.currency;
            const url = this.dataset.url;
            // Detect currency based on the active toggle state
            // const activeToggle = document.querySelector('.toggle-btn.active');
            // Blade will convert true to 1 and false to 0
            // const isIndia = {{ $isIndia ? 'true' : 'false' }};
            // const currency = isIndia ? 'INR' : 'USD';

            // 4. Create Order on Server
            const response = await fetch(url, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')
                        .content
                },
                body: JSON.stringify({
                    amount,
                    type,
                    currency
                })
            });

            const order = await response.json();
            if (!response.ok || !order.order_id) {
                throw new Error(order.message || 'Failed to initialize payment gateway.');
            }

            // 5. Initialize Razorpay Gateway
            const options = {
                key: import.meta.env.VITE_RAZORPAY_KEY, // Use Vite environment variable
                amount: order.amount,
                currency: order.currency,
                order_id: order.order_id,
                name: "Tools By Prabhat",
                description: `Service Upgrade: ${type.replace('_', ' ').toUpperCase()}`,
                prefill: {
                    email: userEmail,
                    name: userName
                },
                theme: {
                    color: "#653bff" // Brand cyan matching your cyber theme
                },
                handler: async function (payment) {
                    showToast('info', 'Verifying transaction...');

                    // 6. Verify Payment on Server
                    const verifyResponse = await fetch('/verify-payment', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector(
                                'meta[name="csrf-token"]').content
                        },
                        body: JSON.stringify({
                            ...payment,
                            type
                        })
                    });

                    const result = await verifyResponse.json();

                    if (result.success) {
                        showToast('success', 'Transmission complete. System upgraded.');
                        showSuccess(result.ai_credits, result.pdf_credits);
                        // Update UI Counters dynamically
                        document.querySelectorAll('.pdf_credit_used').forEach(e => e
                            .innerText = result.pdf_used);
                        document.querySelectorAll('.pdf_total_count').forEach(e => e
                            .innerText = result.pdf_total);
                        setTimeout(() => location.reload(), 1700);
                    } else {
                        showToast('error', result.message || 'Verification failed.');
                    }
                },
                "modal": {
                    "ondismiss": function () {
                        // Re-enable button if user closes the modal without paying
                        btn.disabled = false;
                        btn.innerHTML = originalText;
                    }
                }
            };

            const rzp = new Razorpay(options);
            rzp.open();

        } catch (error) {
            console.error('Payment Error:', error);
            showToast('error', error.message || 'System error. Please contact support.');
            this.disabled = false;
            this.innerHTML = originalText;
        }
    });
})
