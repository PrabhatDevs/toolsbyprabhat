@extends('layouts/resume_header')
@section('content')
    <div class="container py-5">
        @if(count($downloads) > 0)
            <div class="d-flex justify-content-between align-items-center mb-5">
                <div>
                    <h2 class="gradient-text mb-0">DOWNLOADED_DOCUMENTS</h2>
                </div>

            </div>
        @endif
    
        <div class="row g-4">


            @forelse ($downloads as $resume)
                <div class="col-md-6 col-lg-4">
                    <div class="cyber-card p-4 position-relative overflow-hidden">
                        <div class="position-absolute top-0 end-0 p-2">
                            <span class="badge bg-dark text-info border border-info small code-font">SYNCED</span>
                        </div>

                        <div class="d-flex align-items-center mb-3">
                            <div class="resume-icon me-3">
                                <i class='bx bxs-file-pdf text-danger fs-1'></i>
                            </div>
                            <div>
                                <h5 class="mb-0 text-white code-font text-truncate" style="max-width: 180px;">
                                    {{ $resume->file_name ?? 'Unknown' }}
                                </h5>
                                <small class="text-white-50">{{ $resume->created_at->diffForHumans() }} |
                                    {{ $resume->file_size ?? 'Null' }}</small>
                            </div>
                        </div>

                        <hr class="border-secondary opacity-25">

                        <div class="d-flex justify-content-between align-items-center">
                            <div class="btn-group">
                                <a href="{{ route('resume.view', $resume->id) }}" target="_blank"
                                    class="btn btn-sm text-secondary btn-cyber-outline">
                                    <i class='bx bx-show-alt'></i> VIEW
                                </a>
                                <a href="{{ route('resume.download', ['id' => $resume->id, 's' => $resume->file_name ?? 'resume']) }}"
                                    class="btn btn-sm text-secondary btn-cyber-outline">
                                    <i class='bx bx-download'></i>
                                </a>
                            </div>

                            <button class="btn btn-link text-danger p-0 border-0 shadow-none delete-resume"
                                data-url="{{ route('resume.delete', $resume->id) }}" title="Delete_DATA">
                                <i class='bx bx-trash-alt fs-5'></i>
                            </button>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12 text-center py-5">
                    <div class="cyber-card p-5" style="border: 1px dashed rgba(0, 242, 255, 0.2);">
                        <div class="mb-3">
                            <i class='bx bx-folder-open text-secondary opacity-50' style="font-size: 5rem;"></i>
                        </div>
                        <h4 class="text-white-50 code-font">NO_DOWNLOADS_FOUND</h4>
                        <p class="text-secondary small">Your archive is currently empty. Generate a resume to see it here.
                        </p>
                        <a href="{{ route('tools.resume.index') }}" class="btn btn-neon btn-sm mt-3">
                            <i class='bx bx-plus'></i> Start Building
                        </a>
                    </div>
                </div>
            @endforelse
        </div>
    </div>

    <script>
        document.querySelectorAll('.delete-resume').forEach(button => {
            button.addEventListener('click', async function() {
                const url = this.getAttribute('data-url');
                const card = this.closest('.col-md-6');

                // if (!confirm('SYSTEM_ACCESS: Confirm permanent data Delete?')) return;

                // Pull CSRF token from the meta tag
                const token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

                try {
                    // Loading State
                    const originalIcon = this.innerHTML;
                    this.innerHTML = "<i class='bx bx-loader-alt bx-spin'></i>";

                    const response = await fetch(url, {
                        method: 'DELETE',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': token,
                            'Accept': 'application/json' // Ensures Laravel returns JSON
                        },

                    });

                    const data = await response.json();

                    if (data.success) {
                        showToast('success', data.message);
                    }
                    if (data.success) {
                        // Neon Dissolve Effect
                        card.style.transition = "all 0.6s cubic-bezier(0.4, 0, 0.2, 1)";
                        card.style.opacity = "0";
                        card.style.filter = "blur(15px) brightness(2)";
                        card.style.transform = "scale(0.8) translateY(40px)";

                        setTimeout(() => card.remove(), 600);
                    } else {
                        throw new Error(data.message || 'Delete failed');
                        this.innerHTML = "<i class='bx bx-loader-alt bx-spin'></i>";
                    }

                } catch (error) {
                    showToast('error', 'Delete Failed!');
                    // console.error("Delete_FAILURE:", error);
                    // alert("CRITICAL_ERROR: Unauthorized or System Offline.");
                    this.innerHTML = originalIcon;
                }
            });
        });
    </script>
@endsection
