@extends('layouts.resume_header')
@section('title', 'Innovative Web Solutions | Tools by Prabhat')
@section('meta_description',
    'Explore my latest Laravel projects, including e-commerce platforms and custom management
    systems.')
@section('content')
    <div class="container py-0">

        <div class="text-center mb-5 py-4">
            <div class="mb-3">
                <span class="status-badge status-live px-3 py-1">
                    <i class='bx bxs-zap'></i> AI ENGINE READY
                </span>
            </div>

            <h1 class="hero-title gradient-text fw-bold display-4">AI Resume Architect</h1>

            <p class="text-secondary mx-auto mt-3" style="max-width: 700px; font-size: 1.1rem;">
                Stop sending resumes into a black hole. I’ve engineered this system to
                <span class="text-white fw-bold">bypass automated filters</span> and get you
                straight to the interview.
            </p>
        </div>

        <div class="row">

            <div class="col-lg-8  col-12 resume-left" id="resume-left">

                <div class="cyber-card p-3 p-md-5 resume-left-inner">

                    <!-- Tabs Navigation -->
                    <div class="ai-step-header mb-4 d-flex align-items-center justify-content-between gap-3 flex-wrap">

                        <div class="step-pill mb-0">
                            Step <span id="currentStep">1</span> of 7
                        </div>

                        <div class="d-flex align-items-center gap-3 flex-grow-1 justify-content-center">
                            <div class="step-dots d-flex gap-1">
                                <span class="dot active"></span>
                                <span class="dot active"></span>
                                <span class="dot"></span>
                            </div>

                            <div class="step-title fw-bold">Basic Information</div>

                            <div class="progress-track flex-grow-1" style="max-width: 200px;">
                                <div class="progress-fill" id="progressBar" style="width: 5%;"></div>
                            </div>
                        </div>

                        <div class="step-percent text-nowrap">
                            <span id="progressPercent">0%</span> Complete
                        </div>

                    </div>


                    {{-- <ul class="nav nav-pills mb-4 gap-2 custom-tabs" id="resumeTabs">
                        <li class="nav-item"><button class="nav-link active" data-tab="tab-basic">Basic</button></li>
                        <li class="nav-item"><button class="nav-link" data-tab="tab-summary">Summary</button></li>
                        <li class="nav-item"><button class="nav-link" data-tab="tab-employment">Work</button></li>
                        <li class="nav-item"><button class="nav-link" data-tab="tab-education">Education</button></li>
                        <li class="nav-item"><button class="nav-link" data-tab="tab-projects">Projects</button></li>
                        <li class="nav-item"><button class="nav-link" data-tab="tab-skills">Skills</button></li>
                        <li class="nav-item"><button class="nav-link" data-tab="tab-review">Review</button></li>
                    </ul> --}}

                    <form id="resumeForm" enctype="multipart/form-data" novalidate>
                        @csrf

                        <!-- ================= BASIC (Sidebar Data) ================= -->
                        <div class="tab-content active" id="tab-basic">
                            <h4 class="gradient-text mb-4">Basic Information</h4>

                            <div class="row">
                                <div class="col-md-6 mb-3 col-7">
                                    <input type="text" name="first_name" class="form-control cyber-input"
                                        placeholder="First Name">
                                </div>

                                <div class="col-md-6 mb-3 col-5">
                                    <input type="text" name="last_name" class="form-control cyber-input"
                                        placeholder="Last Name">
                                </div>

                                <div class="col-md-12 mb-3">
                                    <input type="text" name="job_target" class="form-control cyber-input"
                                        placeholder="Professional Role (e.g. Full Stack Developer)" id="professional_role">
                                </div>

                                <div class="col-md-6 mb-3 col-6">
                                    <input type="email" name="email" class="form-control cyber-input"
                                        placeholder="Email">
                                </div>

                                <div class="col-md-6 mb-3 col-6">
                                    <input type="text" name="phone" class="form-control cyber-input"
                                        placeholder="Phone">
                                </div>

                                <div class="col-md-6 mb-3 col-7">
                                    <input type="text" name="city" class="form-control cyber-input"
                                        placeholder="City">
                                </div>

                                <div class="col-md-6 mb-3 col-5">
                                    <input type="text" name="country" class="form-control cyber-input"
                                        placeholder="Country">
                                </div>



                                <div class="col-12 ">
                                    <div class="p-4 border border-secondary rounded position-relative section-outbox">
                                        <span
                                            class="position-absolute top-0 start-0 translate-middle-y ms-3 px-3 outbox-label">
                                            <i class='bx bx-link-alt'></i> Professional Links
                                        </span>

                                        <div class="row pt-2">
                                            <div class="col-md-4 mb-3">
                                                <label class="form-label text-info small mb-1">Portfolio</label>
                                                <input type="url" name="portfolio" class="form-control cyber-input"
                                                    placeholder="https://mrprabhat.com">
                                            </div>

                                            <div class="col-md-4 mb-3">
                                                <label class="form-label text-info small mb-1">LinkedIn</label>
                                                <input type="url" name="linkedin" class="form-control cyber-input"
                                                    placeholder="https://linkedin.com/in/username">
                                            </div>

                                            <div class="col-md-4 mb-3">
                                                <label class="form-label text-info small mb-1">GitHub</label>
                                                <input type="url" name="github" class="form-control cyber-input"
                                                    placeholder="https://github.com/username">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <!-- ================= SUMMARY (Main Top Section) ================= -->
                        <div class="tab-content" id="tab-summary">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <h4 class="gradient-text m-0">Professional Summary</h4>
                                @if ($isPaid === 'YES')
                                    <button type="button" id="expandSummaryBtn" class="btn btn-sm btn-neon shadow-sm">
                                        ✨ Expand with AI
                                    </button>
                                @else
                                    <div class="d-inline-block" data-bs-toggle="tooltip"
                                        title="Upgrade to PDF Bundle to unlock AI expansion">
                                        <button type="button" class="btn btn-sm btn-outline-secondary opacity-50 pe-none"
                                            style="cursor: not-allowed;" disabled>
                                            <i class='bx bxs-lock-alt me-1'></i> ✨ Unlock AI Expand
                                        </button>
                                    </div>
                                @endif
                            </div>

                            <textarea name="professional_summary" rows="6" class="form-control cyber-input"
                                placeholder="Write a powerful professional summary..." id="professional_summary"></textarea>
                        </div>

                        <!-- ================= EMPLOYMENT ================= -->
                        <div class="tab-content" id="tab-employment">
                            <h4 class="gradient-text mb-4">Work Experience</h4>

                            <div id="employmentWrapper"></div>

                            <button type="button" class="btn btn-neon mt-1" onclick="addEmployment()">
                                + Add Work Experience
                            </button>
                        </div>

                        <!-- ================= EDUCATION ================= -->
                        <div class="tab-content" id="tab-education">
                            <h4 class="gradient-text mb-4">Education</h4>

                            <div id="educationWrapper"></div>

                            <button type="button" class="btn btn-neon mt-1" onclick="addEducation()">
                                + Add Education
                            </button>
                        </div>

                        {{-- ====================== PROJECTS ================================ --}}
                        <div class="tab-content" id="tab-projects">
                            <h4 class="gradient-text mb-4">Personal Projects</h4>
                            <div id="projectsWrapper">
                            </div>
                            <button type="button" class="btn btn-neon mt-1" onclick="addProject()">
                                + Add Project
                            </button>
                        </div>


                        <style>

                        </style>

                        <!-- ================= SKILLS + STRENGTHS (Sidebar Section) ================= -->
                        <div class="tab-content" id="tab-skills">
                            <h4 class="gradient-text mb-4">Skills</h4>

                            {{-- <div id="skillsWrapper"></div>
                            <button type="button" class="btn btn-neon mt-3 mb-4" onclick="addSkill()">
                                + Add Skill
                            </button> --}}

                            <div class="cyber-tag-container mb-3">
                                <div id="skillsList" class="d-flex flex-wrap gap-2"></div>
                                <input type="text" id="skillInput" class="cyber-input-minimal"
                                    placeholder="Type skill and press Comma or Enter...">
                            </div>

                            <input type="hidden" name="skills" id="hiddenSkillsInput">

                            <div id="aiSuggestions" class="mt-2 d-none">
                                <small class="text-secondary d-block mb-2"> SUGGESTED_SKILLS:</small>
                                <div id="suggestionList" class="d-flex flex-wrap gap-2"></div>
                            </div>

                            <h4 class="gradient-text mb-4 mt-4">Strengths</h4>

                            <textarea name="strengths" rows="4" class="form-control cyber-input"
                                placeholder="Example: Clean Code Architecture, Problem Solving, Leadership..."></textarea>
                        </div>

                        <!-- ================= REVIEW ================= -->
                        <div class="tab-content" id="tab-review">
                            <h4 class="gradient-text mb-4">Review & Generate</h4>
                            <p class="text-secondary">
                                Make sure everything looks correct before generating your resume.
                            </p>

                            <button type="submit" id="generateBtn" class="btn btn-neon w-100">
                                <span id="btnText">🚀 Generate Resume</span>
                                <span id="btnLoader" class="d-none">
                                    <span class="spinner-border spinner-border-sm me-2"></span>
                                    Generating...
                                </span>
                            </button>
                        </div>
                        <div class="d-flex justify-content-between mt-5 pt-4 border-top border-secondary">
                            <button type="button" id="prevBtn" class="btn btn-warning d-none"
                                onclick="changeTab(-1)">
                                <i class='bx bx-left-arrow-alt me-2'></i> Back
                            </button>

                            <button type="button" id="nextBtn" class="btn btn-neon ms-auto" onclick="changeTab(1)">
                                Next <i class='bx bx-right-arrow-alt ms-2'></i>
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- RIGHT SIDE - LIVE PREVIEW -->
            <div class="col-lg-4 mt-5 mt-lg-0 resume-right" id="resume-right">

                <div class="cyber-card p-4 p-md-4 ai-side-panel">

                    <!-- SCORE HEADER -->
                    <div class="score-header d-flex align-items-center mb-4">

                        <div class="score-circle">
                            <span id="resumeScore">15</span>
                        </div>

                        <div class="ms-3">
                            <h6 class="mb-0 text-white fw-bold">Great Start!</h6>
                            <small class="text-secondary">Let's make it shine!</small>
                        </div>

                    </div>

                    <!-- MAIN TIP -->
                    <div class="ai-tip-box mb-4">
                        <div class="d-flex align-items-start">
                            <span class="me-2">💡</span>
                            <div>
                                <div class="fw-bold text-info">Fill out all sections</div>
                                <small class="text-secondary">
                                    to bypass <span class="text-white fw-bold">automated resume filters</span>.
                                </small>
                            </div>
                        </div>
                    </div>

                    <!-- GOALS -->
                    <div class="goal-box mb-4">
                        <h6 class="text-info mb-3">🧪 Goals!</h6>

                        <div class="goal-item" id="pro-links">
                            <span class="check">✔</span>
                            <span><b>+6 Score</b> Add professional links</span>
                        </div>

                        <div class="goal-item" id="point_summary">
                            <span class="check">✔</span>
                            <span><b>+14 Score</b> Add a professional summary</span>
                        </div>

                        <div class="goal-item" id="point_work-exp">
                            <span class="check">✔</span>
                            <span><b>+25 Score</b> Add work experience</span>
                        </div>

                        <div class="goal-item" id="point_education">
                            <span class="check">✔</span>
                            <span><b>+10 Score</b> Add Education</span>
                        </div>

                        <div class="goal-item" id="point_projects">
                            <span class="check">✔</span>
                            <span><b>+20 Score</b> Personal Projects</span>
                        </div>

                        <div class="goal-item" id="point_skills">
                            <span class="check">✔</span>
                            <span><b>+10 Score</b> Add Skills & Strengths</span>
                        </div>
                    </div>



                    <div class="mt-4 p-3 goal-box">
                        <div class="mb-3">
                            <div class="d-flex justify-content-between align-items-center">
                                <h6 class="text-white mb-0 small fw-bold">Resume Optimization</h6>
                                <div class="badge bg-info text-dark" id="atsBadge">READY</div>
                            </div>
                            <small class="text-secondary mt-4" style="font-size: 11px; line-height: 1.1; display: block;">
                                Check how well your resume performs against employer filters.
                            </small>

                        </div>

                        @if ($isPaid === 'YES')
                            <button type="button" onclick="initiateAtsScan()"
                                class="btn btn-outline-info w-100 py-2 cyber-scan-btn">
                                <i class='bx bx-radar bx-tada me-2'></i> RUN SMART SCAN
                            </button>
                        @else
                            <div class="w-100" data-bs-toggle="tooltip" title="Upgrade to Pro Plan for ATS Smart Scan">
                                <button type="button"
                                    class="btn btn-outline-secondary w-100 py-2 opacity-50 cursor-not-allowed" disabled>
                                    <i class='bx bxs-lock-alt me-2'></i> SMART SCAN [RESTRICTED]
                                </button>
                            </div>
                        @endif
                    </div>
                </div>

            </div>

        </div>

        <div class="modal fade" id="atsReportModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content bg-dark border-info border-opacity-25 shadow-lg">
                    <div class="modal-header border-secondary border-opacity-25 pb-0">
                        <h5 class="modal-title text-info fw-bold">
                            <i class='bx bx-radar bx-tada me-2'></i> AI ARCHITECT: SCAN REPORT
                        </h5>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body p-4">
                        <div class="row align-items-center mb-4">
                            <div class="col-md-4 text-center border-end border-secondary border-opacity-25">
                                <div class="display-4 fw-bold text-white mb-0" id="reportScore">0</div>
                                <small class="text-secondary text-uppercase tracking-wider"
                                    style="font-size: 10px;">Optimization Score</small>
                            </div>
                            <div class="col-md-8">
                                <h6 class="text-white mb-1" id="reportStatus">Status: Processing...</h6>
                                <p class="text-secondary small mb-0" id="reportSummary">Analysis complete. System has
                                    identified critical improvements below.</p>
                            </div>
                        </div>

                        <div class="mb-4">
                            <h6 class="text-info small fw-bold text-uppercase mb-3">Critical Improvements</h6>
                            <ul class="list-group list-group-flush bg-transparent" id="reportTipsList">
                            </ul>
                        </div>

                        <div>
                            <h6 class="text-info small fw-bold text-uppercase mb-3">Recommended Keywords</h6>
                            <div class="d-flex flex-wrap gap-2" id="reportKeywordsList">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer border-top border-secondary border-opacity-25">
                        <button type="button" class="btn btn-outline-info btn-sm px-4" data-bs-dismiss="modal">Close &
                            Optimize</button>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>
   

@endsection
