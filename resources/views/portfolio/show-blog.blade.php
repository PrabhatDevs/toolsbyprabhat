@extends('layouts.app')

@section('content')
    <section class="py-5" style="background:;">
        <div class="container py-5">

            <!-- Blog Header -->
            <div class="cyber-card p-5 mb-5">

                <small class="text-secondary">
                    20 Feb 2026 • Backend Development • 6 min read
                </small>

                <h1 class="fw-bold text-white mt-3 mb-3">
                    Building Secure Authentication in Core PHP
                </h1>

                <p class="text-secondary">
                    A practical breakdown of implementing login systems,
                    session handling, CSRF protection, and password hashing
                    without relying entirely on frameworks.
                </p>

            </div>

            <!-- Blog Content -->
            <div class="cyber-card p-5">

                <h4 class="text-info mb-3">Introduction</h4>
                <p class="text-secondary">
                    Authentication is one of the most critical components of any web application.
                    A poorly implemented login system can expose sensitive user data and compromise
                    the entire system. In this article, we explore how to build a secure
                    authentication system using Core PHP.
                </p>

                <h4 class="text-info mt-5 mb-3">1. Password Hashing</h4>
                <p class="text-secondary">
                    Never store plain text passwords. Use secure hashing algorithms such as:
                </p>

                <div class="cyber-terminal mb-4">
                    <pre class="text-info small mb-0">
$password = password_hash($userInput, PASSWORD_BCRYPT);
</pre>
                </div>

                <p class="text-secondary">
                    This ensures that even if your database is compromised,
                    raw passwords are not exposed.
                </p>

                <h4 class="text-info mt-5 mb-3">2. Session Handling</h4>
                <p class="text-secondary">
                    Sessions must be regenerated after login to prevent session fixation attacks.
                </p>

                <div class="cyber-terminal mb-4">
                    <pre class="text-info small mb-0">
session_start();
session_regenerate_id(true);
$_SESSION['user_id'] = $user['id'];
</pre>
                </div>

                <h4 class="text-info mt-5 mb-3">3. CSRF Protection</h4>
                <p class="text-secondary">
                    Always generate CSRF tokens and verify them during form submission.
                    This prevents cross-site request forgery attacks.
                </p>

                <div class="cyber-terminal mb-4">
                    <pre class="text-info small mb-0">
$_SESSION['csrf_token'] = bin2hex(random_bytes(32));
</pre>
                </div>

                <h4 class="text-info mt-5 mb-3">Conclusion</h4>
                <p class="text-secondary">
                    Secure authentication requires careful handling of sessions,
                    hashing, validation, and request protection. Even without a framework,
                    implementing best practices ensures your application remains safe
                    and production-ready.
                </p>

            </div>

            <!-- Author Box -->
            <div class="cyber-card p-4 mt-5 d-flex align-items-center justify-content-between flex-column flex-lg-row">
                <div>
                    <h6 class="fw-bold text-white mb-1">Written by Prabhat Yadav</h6>
                    <small class="text-secondary">
                        Full Stack PHP Developer specializing in secure backend systems,
                        API architecture, and scalable web applications.
                    </small>
                </div>
                {{-- <button id="downloadPdf">Download PDF</button> --}}
                <a href="{{ route('blogs') }}" class="btn btn-neon mt-3 mt-lg-0">
                    ← Back to Blogs
                </a>
            </div>

        </div>
    </section>


    {{-- <a href="{{ route('resume.download') }}" target="_blank">
    <button>Download Resume</button>
</a> --}}

    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>




    <script>
        document.getElementById("downloadPdf").addEventListener("click", function() {

            const {
                jsPDF
            } = window.jspdf;

            const element = document.body; // change this to specific div if needed

            html2canvas(element, {
                scale: 2,
                useCORS: true,
                width: element.scrollWidth,
                height: element.scrollHeight
            }).then(canvas => {

                const imgData = canvas.toDataURL("image/png");

                // Custom PDF size (A4)
                const pdf = new jsPDF("p", "mm", "a4");

                const pdfWidth = 210; // A4 width in mm
                const pdfHeight = 295; // A4 height in mm

                const imgWidth = pdfWidth;
                const imgHeight = (canvas.height * imgWidth) / canvas.width;

                let heightLeft = imgHeight;
                let position = 0;

                pdf.addImage(imgData, "PNG", 0, position, imgWidth, imgHeight);
                heightLeft -= pdfHeight;

                while (heightLeft > 0) {
                    position = heightLeft - imgHeight;
                    pdf.addPage();
                    pdf.addImage(imgData, "PNG", 0, position, imgWidth, imgHeight);
                    heightLeft -= pdfHeight;
                }

                pdf.save("page.pdf");
            });

        });
    </script>
@endsection
