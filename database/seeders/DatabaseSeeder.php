<?php

namespace Database\Seeders;

use App\Models\Development;
use App\Models\Query;
use App\Models\Service;
use App\Models\SkillSuggestion;
use App\Models\TechStack;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // foreach (range(1, 10) as $i) {
        //     TechStack::create([
        //         'title' => fake()->unique()->jobTitle(),
        //         'category' => fake()->randomElement(['Frontend', 'Backend', 'Database', 'DevOps']),
        //         'percentage' => fake()->numberBetween(50, 100)
        //     ]);
        //     Service::create([
        //         'title' => fake()->unique()->jobTitle(),
        //         'description' => fake()->paragraph(),
        //         'icon' => fake()->randomElement(['fa-solid fa-code', 'fa-solid fa-paintbrush', 'fa-solid fa-chart-line', 'fa-solid fa-mobile-screen-button']),
        //     ]);
        //     Development::create([
        //         'title' => fake()->unique()->sentence(),
        //         'description' => fake()->paragraph(),
        //         'purpose' => fake()->randomElement(['Personal Project', 'Client Work', 'Open Source']),
        //         'stack' => fake()->randomElement(['Laravel', 'React', 'Vue', 'Django']),
        //     ]);
        //     Query::create([
        //         'name' => fake()->name(),
        //         'email' => fake()->unique()->safeEmail(),
        //         'message' => fake()->paragraph(),
        //         'type' => fake()->randomElement(['General Inquiry', 'Project Proposal', 'Feedback']),
        //         'budget' => fake()->randomElement(['< $1000', '$1000 - $5000', '> $5000']),
        //     ]);
        // }

        $professions = [
            [
                'name' => 'Full Stack Developer',
                'skills' => ['PHP', 'Laravel', 'JavaScript', 'Vue.js', 'React.js', 'Node.js', 'MySQL', 'PostgreSQL', 'Tailwind CSS', 'REST API', 'GraphQL', 'Git', 'Docker', 'Redis', 'CI/CD Pipelines']
            ],
            [
                'name' => 'Frontend Developer',
                'skills' => ['React.js', 'Next.js', 'Vue.js', 'TypeScript', 'JavaScript', 'HTML5', 'CSS3', 'SASS', 'Tailwind CSS', 'Redux', 'Figma', 'Vite', 'Responsive Design', 'Web Accessibility (a11y)', 'Jest', 'Cypress']
            ],
            [
                'name' => 'Backend Developer',
                'skills' => ['Node.js', 'Express', 'NestJS', 'Python', 'Django', 'FastAPI', 'Java', 'Spring Boot', 'Go', 'PostgreSQL', 'MongoDB', 'Microservices', 'AWS', 'Unit Testing', 'Nginx', 'Kafka', 'Redis']
            ],
            [
                'name' => 'UI/UX Designer',
                'skills' => ['Figma', 'Adobe XD', 'Sketch', 'Prototyping', 'Wireframing', 'User Research', 'Design Systems', 'Color Theory', 'Typography', 'Usability Testing', 'Interaction Design', 'Information Architecture', 'Framer']
            ],
            [
                'name' => 'Mobile App Developer',
                'skills' => ['Flutter', 'Dart', 'React Native', 'Swift', 'iOS SDK', 'Kotlin', 'Android SDK', 'Firebase', 'App Store Deployment', 'Mobile UI Design', 'SQLite', 'GraphQL', 'Push Notifications']
            ],
            [
                'name' => 'Data Scientist',
                'skills' => ['Python', 'R', 'Machine Learning', 'Pandas', 'NumPy', 'Scikit-Learn', 'TensorFlow', 'PyTorch', 'Data Visualization', 'SQL', 'Tableau', 'Power BI', 'Statistical Analysis', 'NLP', 'Big Data']
            ],
            [
                'name' => 'Data Analyst',
                'skills' => ['SQL', 'Excel', 'Python', 'Tableau', 'Power BI', 'Google Analytics', 'Data Cleaning', 'A/B Testing', 'Statistical Modeling', 'Looker', 'Data Storytelling', 'ETL Processes']
            ],
            [
                'name' => 'DevOps Engineer',
                'skills' => ['Kubernetes', 'Docker', 'Jenkins', 'Terraform', 'CI/CD Pipelines', 'Ansible', 'Linux Administration', 'Cloud Monitoring', 'AWS', 'Azure', 'GCP', 'Prometheus', 'Grafana', 'Bash Scripting']
            ],
            [
                'name' => 'Cloud Architect',
                'skills' => ['AWS', 'Microsoft Azure', 'Google Cloud Platform', 'Serverless Architecture', 'Infrastructure as Code', 'Cloud Security', 'Network Design', 'Disaster Recovery', 'Docker', 'Kubernetes', 'Cost Optimization']
            ],
            [
                'name' => 'Cybersecurity Analyst',
                'skills' => ['Penetration Testing', 'Network Security', 'Ethical Hacking', 'SIEM', 'Firewalls', 'Cryptography', 'Vulnerability Assessment', 'Incident Response', 'Malware Analysis', 'Wireshark', 'Risk Assessment']
            ],
            [
                'name' => 'Blockchain Developer',
                'skills' => ['Solidity', 'Smart Contracts', 'Ethereum', 'Web3.js', 'Rust', 'Go', 'Cryptography', 'Decentralized Apps (dApps)', 'Hyperledger', 'Truffle', 'Hardhat', 'IPFS']
            ],
            [
                'name' => 'Game Developer',
                'skills' => ['Unity', 'C#', 'Unreal Engine', 'C++', '3D Modeling', 'Game Physics', 'Multiplayer Networking', 'Blender', 'Level Design', 'AI for Games', 'OpenGL', 'DirectX', 'WebGL']
            ],
            [
                'name' => 'AI/ML Engineer',
                'skills' => ['Python', 'TensorFlow', 'PyTorch', 'Deep Learning', 'Computer Vision', 'NLP', 'Data Mining', 'Algorithm Design', 'Neural Networks', 'MLOps', 'Model Deployment', 'Hugging Face', 'LangChain']
            ],
            [
                'name' => 'Database Administrator',
                'skills' => ['MySQL', 'PostgreSQL', 'Oracle DB', 'MongoDB', 'Database Tuning', 'Backup & Recovery', 'Data Migration', 'SQL Performance', 'High Availability', 'Security Auditing', 'NoSQL']
            ],
            [
                'name' => 'Digital Marketer',
                'skills' => ['SEO', 'SEM', 'Google Analytics', 'Content Strategy', 'Social Media Ads', 'Email Marketing', 'PPC', 'Copywriting', 'Market Research', 'HubSpot', 'Conversion Rate Optimization', 'A/B Testing']
            ],
            [
                'name' => 'Project Manager',
                'skills' => ['Agile Methodologies', 'Scrum', 'Jira', 'Trello', 'Risk Management', 'Stakeholder Communication', 'Budgeting', 'Project Planning', 'Kanban', 'Asana', 'Confluence', 'Resource Allocation']
            ],
            [
                'name' => 'QA Automation Engineer',
                'skills' => ['Selenium', 'Cypress', 'Playwright', 'Jest', 'Postman', 'Regression Testing', 'Bug Tracking', 'Test Documentation', 'Appium', 'Cucumber', 'JUnit', 'API Testing', 'Performance Testing']
            ],
            [
                'name' => 'Product Manager',
                'skills' => ['Product Strategy', 'Roadmapping', 'User Persona Development', 'Agile', 'Market Analysis', 'Wireframing', 'Data Analysis', 'Stakeholder Management', 'Go-to-Market Strategy', 'Prioritization Frameworks']
            ],
            [
                'name' => 'Java Developer',
                'skills' => ['Java', 'Spring Boot', 'Hibernate', 'Microservices', 'Maven', 'Gradle', 'JUnit', 'Oracle DB', 'JSP', 'Apache Kafka', 'Multithreading', 'RESTful APIs']
            ],
            [
                'name' => 'Junior Laravel Developer',
                'skills' => ['PHP', 'Laravel Basics', 'Eloquent ORM', 'Blade Templating', 'MySQL', 'HTML', 'CSS', 'JavaScript', 'Git', 'Composer', 'Basic MVC']
            ],
            [
                'name' => 'Junior Software Developer',
                'skills' => ['Problem Solving', 'Data Structures', 'Algorithms', 'Basic Git', 'OOP Principles', 'Debugging', 'Unit Testing', 'Command Line', 'Visual Studio Code']
            ],
            [
                'name' => 'Full Stack Web Developer',
                'skills' => ['HTML5', 'CSS3', 'JavaScript', 'Responsive Design', 'Node.js', 'Express', 'MongoDB', 'REST APIs', 'NPM/Yarn', 'Websockets', 'Browser DevTools']
            ],
            [
                'name' => 'Full Stack Software Developer',
                'skills' => ['C#', '.NET Core', 'SQL Server', 'Angular', 'System Design', 'Entity Framework', 'Identity Server', 'Azure DevOps', 'Design Patterns', 'Redis']
            ],
            [
                'name' => 'Python Developer',
                'skills' => ['Python', 'Django', 'Flask', 'FastAPI', 'Pytest', 'Celery', 'PostgreSQL', 'Scripting', 'Pipenv', 'RESTful Design', 'Asynchronous Programming']
            ],
            [
                'name' => 'Embedded Systems Engineer',
                'skills' => ['C', 'C++', 'RTOS', 'Microcontrollers (ARM, AVR)', 'I2C/SPI/UART', 'PCB Design', 'Firmware Development', 'Oscilloscopes', 'Circuit Debugging']
            ],
            [
                'name' => 'Site Reliability Engineer (SRE)',
                'skills' => ['Incident Management', 'Automation', 'Python', 'Go', 'Kubernetes', 'Terraform', 'System Monitoring', 'Linux Internals', 'On-call Rotation']
            ],
            [
                'name' => 'WordPress Developer',
                'skills' => ['PHP', 'WordPress Core', 'Theme Development', 'Plugin Development', 'WooCommerce', 'Elementor', 'WP-CLI', 'MySQL', 'Speed Optimization']
            ],
            [
                'name' => 'Security Engineer',
                'skills' => ['Cloud Security', 'IAM', 'Encryption', 'OAuth2', 'SAML', 'Threat Modeling', 'Network Security', 'Security Auditing', 'Python', 'Go']
            ]
        ];

        // foreach ($professions as $pro) {
        //     SkillSuggestion::updateOrCreate(
        //         ['name' => $pro['name']],
        //         ['skills' => $pro['skills']]
        //     );
        // }

    }
}
