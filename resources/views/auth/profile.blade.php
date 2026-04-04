@extends('layouts.resume_header')

@section('content')
    <style>
        /* Change text color when disabled */
        .cyber-input:disabled {
            color: rgba(255, 255, 255, 0.3) !important;
            /* Faded white/grey text */
            background-color: rgba(255, 255, 255, 0.02) !important;
            /* Darker background */
            border-color: rgba(255, 255, 255, 0.05) !important;
            cursor: not-allowed;
        }

        /* Change placeholder color when disabled */
        .cyber-input:disabled::placeholder {
            color: rgba(128, 128, 128, 0.4) !important;
            /* Very dim grey */
        }

        /* Optional: Remove the "glow" effect if you have one on focus/hover for disabled inputs */
        .cyber-input:disabled:hover {
            box-shadow: none !important;
            transform: none !important;
        }

        /* Custom Cyber Tooltip */
        .tooltip-inner {
            background-color: #0f172a !important;
            /* Your deep dark blue */
            border: 1px solid #00f2ff !important;
            /* Cyan border */
            color: #00f2ff !important;
            box-shadow: 0 0 10px rgba(0, 242, 255, 0.2);
            font-size: 0.75rem;
            padding: 8px 12px;
        }

        .tooltip .tooltip-arrow::before {
            border-top-color: #00f2ff !important;
            /* Match the arrow color to border */
        }
    </style>
    <div class="container pt-0">
        <div class="text-center mb-5">
            <div class="mb-3">
                <span class="status-badge status-live px-3 py-1">
                    <i class='bx bxs-user-circle'></i> SYSTEM USER VERIFIED
                </span>
            </div>
            <h1 class="hero-title gradient-text fw-bold">User Profile Center</h1>
        </div>
        <div class="row g-4">
            <div class="col-lg-4">
                <div class="cyber-card p-4 text-center h-100">
                    <div class="position-relative d-inline-block mb-4">
                        <div class="profile-avatar-wrapper">
                            <img src="{{ auth()->user()->avatar ?? 'https://ui-avatars.com/api/?name=' . urlencode(auth()->user()->name) }}&background=00f2ff&color=000"
                                class="rounded-circle border border-info border-3 p-1 profile_display" width="120"
                                alt="Avatar">
                        </div>
                        <button type="button" data-bs-toggle="modal" data-bs-target="#avatarSelectorModal"
                            class="btn btn-sm btn-neon bg-info text-white position-absolute bottom-0 end-0 rounded-circle p-0 d-flex align-items-center justify-content-center"
                            style="width: 32px; height: 32px;">
                            <i class='bx bxs-camera'></i>
                        </button>
                    </div>

                    <h3 class="text-white fw-bold mb-1 user_name" >{{ auth()->user()->name }}</h3>
                    <p class="text-info small mb-4">{{ auth()->user()->email }}</p>

                    <div class="p-3 border border-secondary rounded section-outbox text-start mb-3">
                        <span class="outbox-label px-2"><i class='bx bxs-zap'></i> Credits</span>
                        <div class="d-flex justify-content-between align-items-center mt-2">
                            <span class="text-secondary">Available PDFs</span>
                            <span class="text-white fw-bold fs-4 pdf_total_count"><span
                                    class="pdf_credit_used">{{ auth()->user()->pdf_exports_used }}</span> /
                                <span class="pdf_total_count"> {{ auth()->user()->pdf_export_balance }}</span>
                        </div>
                        <div class="d-flex justify-content-between align-items-center mt-2">
                            <span class="text-secondary">Available Credits</span>
                            <span class="text-white fw-bold fs-4 pdf_total_count">{{ auth()->user()->used_credits }} /
                            {{ auth()->user()->total_credits }}</span>
                        </div>
                    </div>

                    <a href="{{ route('pricing') }}" class="btn btn-sm btn-neon mt-3">
                        Buy Credits
                    </a>
                </div>
            </div>

            <div class="col-lg-8">
                <div class="cyber-card p-4 p-md-5">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h4 class="gradient-text m-0">Account Identity</h4>
                        <button type="button" id="editProfileBtn" class="btn btn-sm btn-neon" onclick="toggleEdit()">
                            <i class='bx bxs-edit-alt'></i> Edit Profile
                        </button>
                    </div>

                    <form id="profileForm" action="" method="POST">
                        @csrf

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label text-info small">Full Name</label>
                                <input type="text" name="name"
                                    class="form-control full-name cyber-input profile-field"
                                    value="{{ auth()->user()->name }}" disabled>
                            </div>

                            <div class="col-md-6 mb-3">
                                <div class="d-flex align-items-center gap-2 mb-1">
                                    <label class="form-label text-info small mb-0">Contact Number</label>
                                    <i class='bx bx-info-circle text-warning' style="cursor: help; font-size: 0.9rem;"
                                        data-bs-toggle="tooltip" data-bs-placement="top"
                                        title="Required for secure Razorpay payment processing and order tracking."></i>
                                </div>
                                <input type="text" name="phone"
                                    class="form-control contact-no cyber-input profile-field"
                                    value="{{ auth()->user()->phone ?? '' }}" disabled>
                            </div>

                            <div class="col-md-12 mb-3">
                                <label class="form-label text-info small">Email Address</label>
                                <input type="email" class="form-control cyber-input text-danger "
                                    value="{{ auth()->user()->email }}" disabled style="opacity: 0.6; cursor: not-allowed;">
                                <div class="form-text text-secondary small">Email cannot be changed for security reasons.
                                </div>
                            </div>

                            <div class="col-12 mt-4 d-none" id="saveActionArea">
                                <div class="p-3 border border-secondary rounded section-outbox">
                                    <span class="outbox-label px-2 text-warning" style="background: #0f172a;">
                                        <i class='bx bxs-save'></i> Pending Changes
                                    </span>
                                    <div class="d-flex gap-2 mt-2">
                                        <button type="button" class="btn btn-neon flex-grow-1 "
                                            onclick="saveProfile(this)">Update Identity</button>
                                        <button type="button" class="btn btn-danger-outline"
                                            onclick="toggleEdit()">Cancel</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>

                    <hr class="border-secondary my-5">

                    <h4 class="gradient-text mb-4">Security Protocol</h4>
                    <div class="row">
                        <div class="col-md-8">
                            <p class="text-secondary small">Update your access credentials periodically to maintain system
                                integrity.</p>
                        </div>
                        <div class="col-md-4 text-md-end">
                            <button type="button" class="btn btn-sm btn-danger-outline" data-bs-toggle="modal"
                                data-bs-target="#changePasswordModal">
                                Change Password
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="modal fade" id="avatarSelectorModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content cyber-card" style="background: rgba(3, 7, 18, 0.98);">

                <div class="modal-header border-0">
                    <h5 class="modal-title gradient-text">Select Avatar Style & Character</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body p-0">
                    <div class="row g-0">

                        <div class="col-md-3 border-end" style="border-color: rgba(255, 255, 255, 0.05) !important;">
                            <div id="avatar-styles-list" class="list-group list-group-flush code-font p-2"
                                style="max-height: 450px; overflow-y: auto;">
                            </div>
                        </div>

                        <div class="col-md-9 p-3">
                            <div id="active-style-title" class="code-font text-neon-blue small mb-3"></div>

                            <div id="avatar-grid" class="row g-3" style="max-height: 400px; overflow-y: auto;">
                            </div>
                        </div>

                    </div>
                </div>

                <div class="modal-footer border-0">
                    <button type="button" class="btn text-white-50" data-bs-dismiss="modal">Cancel</button>
                </div>

            </div>
        </div>
    </div>


    <div class="modal fade" id="changePasswordModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content cyber-card" style="background: rgba(3, 7, 18, 0.95);">

                <div class="modal-header border-0">
                    <h5 class="modal-title gradient-text">Update Password</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>

                <form id="changePasswordForm">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-4 position-relative">
                            <label class="form-label text-info small code-font">[CURRENT PASSWORD]</label>
                            <input type="password" name="current_password" class="form-control cyber-input"
                                placeholder="••••••••" required>
                            <i class="bx bx-hide eye-icon text-info"
                                style="position: absolute; right: 15px; top: 49px; cursor: pointer; font-size: 1.2rem;"></i>
                        </div>

                        <div class="mb-4 position-relative">
                            <label class="form-label text-info small code-font">[NEW PASSWORD]</label>
                            <input type="password" name="new_password" class="form-control cyber-input"
                                placeholder="••••••••" required>
                            <i class="bx bx-hide eye-icon text-info"
                                style="position: absolute; right: 15px; top: 49px; cursor: pointer;  font-size: 1.2rem;"></i>
                        </div>

                        <div class="mb-2 position-relative">
                            <label class="form-label text-info small code-font">[CONFIRM PASSWORD]</label>
                            <input type="password" name="new_password_confirmation" class="form-control cyber-input"
                                placeholder="••••••••" required>
                            <i class="bx bx-hide eye-icon text-info"
                                style="position: absolute; right: 15px; top: 49px; cursor: pointer; font-size: 1.2rem;"></i>
                        </div>
                    </div>
                    <div class="mb-3 d-flex align-items-center gap-2 px-3">
                        <div class="text-secondary">Forgot Password ?</div>
                        <div><a href="{{ route('password.request') }}" class="text-decoration-none">Reset</a></div>
                    </div>
                    <div class="modal-footer border-0">
                        <button type="button" class="btn btn-danger-outline" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" id="savePasswordBtn" class="btn btn-neon ">Update Now</button>
                    </div>
                </form>

            </div>
        </div>
    </div>

    <div id="toast-container"></div>


    <script>
        // A. Configuration: Extract styles from your image
        const stylesConfig = [{
                key: 'adventurer',
                name: 'Adventurer',
                exampleSeed: 'Max'
            },
            {
                key: 'adventurer-neutral',
                name: 'Adventurer Neutral',
                exampleSeed: 'Zen'
            },
            {
                key: 'avataaars',
                name: 'Avataaars',
                exampleSeed: 'Aneka'
            },
            {
                key: 'avataaars-neutral',
                name: 'Avataaars Neutral',
                exampleSeed: 'Lulu'
            },
            {
                key: 'big-ears',
                name: 'Big Ears',
                exampleSeed: 'Gizmo'
            },
            {
                key: 'big-ears-neutral',
                name: 'Big Ears Neutral',
                exampleSeed: 'Pixel'
            },
            {
                key: 'big-smile',
                name: 'Big Smile',
                exampleSeed: 'Orbit'
            },
            {
                key: 'bottts',
                name: 'Bottts',
                exampleSeed: 'Cyber'
            }
        ];

        // seeds to create variety
        const seeds = ['Aria', 'Zen', 'Nova', 'Rex', 'Cyber', 'Neon', 'Echo', 'Titan', 'Ghost', 'Volt', 'Milo', 'Kiki'];

        let currentStyleKey = stylesConfig[0].key; // Set default style

        // B. Load Styles into the Sidebar
        function loadStyles() {
            const sidebar = document.getElementById('avatar-styles-list');
            sidebar.innerHTML = ''; // Clear

            stylesConfig.forEach(style => {
                const item = document.createElement('button');
                item.className =
                    'list-group-item list-group-item-action cyber-input d-flex align-items-center mb-1 rounded';

                const exampleUrl =
                    `https://api.dicebear.com/9.x/${style.key}/svg?seed=${style.exampleSeed}&backgroundColor=030712`;

                item.innerHTML = `
            <img src="${exampleUrl}" class="rounded-circle me-3" style="width: 24px; height: 24px;">
            <span>${style.name}</span>
        `;

                item.onclick = () => activateStyle(style);
                sidebar.appendChild(item);
            });
        }

        // C. Activate a Style and Load its Avatars
        function activateStyle(style) {
            currentStyleKey = style.key;
            document.getElementById('active-style-title').innerText = `STYLE: ${style.name}`;
            loadAvatarGrid();
        }

        // D. Load the Avatar Grid for the Selected Style
        function loadAvatarGrid() {
            const grid = document.getElementById('avatar-grid');
            grid.innerHTML = ''; // Clear current grid

            // Parameters to match your cyber theme: Dark BG (030712), circular background
            const params = 'backgroundColor=030712&radius=50&p=1';

            seeds.forEach(seed => {
                const url = `https://api.dicebear.com/9.x/${currentStyleKey}/svg?seed=${seed}&${params}`;

                const col = document.createElement('div');
                col.className = 'col-3 mb-3 text-center';
                col.innerHTML = `
            <img src="${url}" 
                 class="img-fluid rounded-circle avatar-option cyber-card p-1" 
                 style="cursor: pointer; transition: 0.3s ease;"
                 onclick="selectAvatar('${url}')">
        `;
                grid.appendChild(col);
            });
        }

        // E. The Selection Function (Update Profile display)
        function selectAvatar(url) {
            // 1. Update the UI Preview immediately
            const profileDisplay = document.querySelectorAll('.profile_display');


            // 2. Send the POST request to save to DB
            fetch("{{ route('profile.avatar.update') }}", {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        'Content-Type': 'application/json',
                        'Accept': 'application/json'
                    },
                    // Send the full DiceBear link as JSON
                    body: JSON.stringify({
                        avatar_url: url
                    })
                })
                .then(async response => {
                    const data = await response.json();
                    console.log(data);
                    if (response.ok) {
                        profileDisplay.forEach(e => {
                            e.src = data.avatar_url
                        });
                        showToast('success', data.message);
                        // Close the modal
                        bootstrap.Modal.getInstance(document.getElementById('avatarSelectorModal')).hide();
                    } else {
                        showToast("error", "UPLOAD FAILED");
                    }
                })
                .catch(() => showToast("error", "NETWORK ERROR"));
        }

        // Initialize on load
        loadStyles();
        loadAvatarGrid(); // Load initial default style avatars
    </script>


    <script>
        async function saveProfile(btn) {
            btn.disabled = true;
            btn.innerHTML = `Updating...`;

            user_names = document.querySelectorAll('.user_name');

            const nameInput = document.querySelector('.full-name');
            const phoneInput = document.querySelector('.contact-no');
            const formData = new FormData();
            formData.append('name', nameInput.value);
            formData.append('phone', phoneInput.value);
            const token = document.querySelector('meta[name="csrf-token"]').content;
            try {
                const response = await fetch("{{ route('profile.update') }}", {
                    method: 'POST', // We use POST but spoof PUT below
                    headers: {
                        'X-CSRF-TOKEN': token,
                        'X-HTTP-Method-Override': 'PUT', // Spoofing PUT for Laravel
                        'Accept': 'application/json'
                    },
                    body: formData
                });
                const result = await response.json();
                if (result.success) {
                    showToast('success', result.message);
user_names.forEach(e=>{
    e.innerText = result.data.name;
})
                    toggleEdit(); // Lock the fields again
                } else {
                    showToast('error', result.message || 'Validation failed');
                }

                btn.disabled = false;
                btn.innerHTML = `UPDATE IDENTITY`;
            } catch (error) {
                showToast('error', 'System Connection Failed');
                btn.disabled = false;
                btn.innerHTML = `UPDATE IDENTITY`;
            }
        }





        function toggleEdit() {
            const fields = document.querySelectorAll('.profile-field');
            const saveArea = document.getElementById('saveActionArea');
            const editBtn = document.getElementById('editProfileBtn');

            // Toggle state
            const isEditing = fields[0].disabled;

            fields.forEach(field => {
                field.disabled = !isEditing;
                if (!isEditing) {
                    field.classList.remove('editing-mode');
                } else {
                    field.classList.add('editing-mode');
                }
            });

            if (isEditing) {
                saveArea.classList.remove('d-none');
                editBtn.innerHTML = "<i class='bx bx-x'></i> Cancel";
                editBtn.classList.replace('btn-neon', 'btn-warning');
            } else {
                saveArea.classList.add('d-none');
                editBtn.innerHTML = "<i class='bx bxs-edit-alt'></i> Edit Profile";
                editBtn.classList.replace('btn-warning', 'btn-neon');
            }
        }

        document.addEventListener('DOMContentLoaded', function() {
            // Initialize all tooltips on the page
            var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
            var tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
                return new bootstrap.Tooltip(tooltipTriggerEl)
            })
        });
    </script>



    <script>
        const form = document.getElementById('changePasswordForm');

        form.addEventListener('submit', function(e) {
            e.preventDefault();

            const btn = document.getElementById('savePasswordBtn');
            const formData = new FormData(form);

            // 1. Disable button
            btn.disabled = true;
            btn.innerText = 'PROCESSING...';

            // 2. Send request
            fetch("{{ route('password.change') }}", {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        'Accept': 'application/json'
                    },
                    body: formData
                })
                .then(response => response.json())
                .then(data => {
                    console.log(data);
                    if (data.success) {
                        showToast('success', data.message);
                        form.reset();
                        bootstrap.Modal.getInstance(document.getElementById('changePasswordModal')).hide();
                    } else {
                        showToast('error', data.message);
                    }
                })
                .catch(error => {
                    showToast('error', error.message);
                })
                .finally(() => {
                    // 3. Reset button
                    btn.disabled = false;
                    btn.innerText = 'Update Now';
                });
        });
    </script>
    <script>
        // Select all eye icons in the form
        const eyeIcons = document.querySelectorAll('.eye-icon');

        eyeIcons.forEach(icon => {
            icon.addEventListener('click', function() {
                // Find the input field right before or next to this icon
                const input = this.parentElement.querySelector('input');

                if (input.type === "password") {
                    input.type = "text";
                    this.classList.replace('bx-hide', 'bx-show');
                    // Optional: add a small neon glow when active
                    this.style.textShadow = "0 0 8px var(--neon-blue)";
                } else {
                    input.type = "password";
                    this.classList.replace('bx-show', 'bx-hide');
                    this.style.textShadow = "none";
                }
            });
        });
    </script>
@endsection
