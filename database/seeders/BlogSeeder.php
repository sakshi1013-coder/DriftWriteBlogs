<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Blog;
use App\Models\Category;
use Carbon\Carbon;

class BlogSeeder extends Seeder
{
    public function run(): void
    {
        $blogs = [
            [
                'category' => 'admit-card',
                'title' => 'SSC CGL 2024 Admit Card Released – Download Now',
                'short_description' => 'The Staff Selection Commission has released the SSC CGL 2024 Tier-I admit card. Candidates can download it from the official website using their registration ID and date of birth.',
                'content' => '<p>The <strong>Staff Selection Commission (SSC)</strong> has officially released the <strong>SSC CGL 2024 Tier-I Admit Card</strong>. All registered candidates can now download their hall ticket from the official SSC website.</p>

<h2>How to Download SSC CGL 2024 Admit Card</h2>
<ol>
<li>Visit the official SSC website: <strong>ssc.gov.in</strong></li>
<li>Click on "Admit Card" section in the top menu</li>
<li>Select "SSC CGL 2024 Tier-I Admit Card"</li>
<li>Enter your <strong>Registration ID</strong> and <strong>Date of Birth</strong></li>
<li>Click on Submit and download your admit card</li>
<li>Take a printout for exam day</li>
</ol>

<h2>Important Details on Admit Card</h2>
<ul>
<li>Candidate Name and Roll Number</li>
<li>Exam Date, Time and Venue</li>
<li>Reporting Time (30 minutes before exam)</li>
<li>Candidate Photograph and Signature</li>
<li>Important Instructions</li>
</ul>

<h2>Documents Required at Exam Center</h2>
<p>Candidates must carry the following documents:</p>
<ul>
<li>Printed Admit Card</li>
<li>Original Photo ID (Aadhaar/PAN/Passport/Voter ID)</li>
<li>2 Passport-size photographs</li>
</ul>

<p><strong>Note:</strong> Candidates without admit card will not be allowed to appear in the exam. Keep the admit card safe until the final result is announced.</p>',
                'published_at' => Carbon::now()->subDays(2),
            ],
            [
                'category' => 'result',
                'title' => 'UPSC Civil Services Prelims 2024 Result Declared',
                'short_description' => 'The Union Public Service Commission has declared the UPSC CSE Prelims 2024 result. Over 14,000 candidates have qualified for the Mains examination.',
                'content' => '<p>The <strong>Union Public Service Commission (UPSC)</strong> has officially declared the <strong>Civil Services Preliminary Examination 2024 result</strong>. Candidates who appeared in the exam can check their result on the UPSC official website.</p>

<h2>UPSC CSE Prelims 2024 – Key Highlights</h2>
<ul>
<li>Total candidates appeared: <strong>9.13 Lakh</strong></li>
<li>Candidates qualified for Mains: <strong>14,624</strong></li>
<li>Cut-off marks (General category): <strong>98.66</strong> (out of 200)</li>
<li>Cut-off marks (OBC): <strong>96.66</strong></li>
<li>Cut-off marks (SC): <strong>84.66</strong></li>
<li>Cut-off marks (ST): <strong>82.34</strong></li>
</ul>

<h2>How to Check Result</h2>
<ol>
<li>Visit <strong>upsc.gov.in</strong></li>
<li>Click on "What\'s New" section</li>
<li>Find the link for CSE Prelims 2024 Result</li>
<li>Download the PDF and search your Roll Number</li>
</ol>

<h2>Next Step – UPSC Mains 2024</h2>
<p>Qualified candidates must now prepare for the UPSC Civil Services Mains examination which consists of 9 papers including essay, general studies (4 papers), optional subject (2 papers), and qualifying language papers.</p>

<p>The UPSC Mains 2024 is scheduled to be held in <strong>September 2024</strong>. Candidates should download the Mains application form from upsc.gov.in.</p>',
                'published_at' => Carbon::now()->subDays(5),
            ],
            [
                'category' => 'recruitment',
                'title' => 'Railway RRB NTPC 2024 Recruitment: 11,558 Vacancies Announced',
                'short_description' => 'Indian Railways has announced 11,558 vacancies under RRB NTPC 2024. Applications open for Graduate and Undergraduate level posts across various zones.',
                'content' => '<p>The <strong>Railway Recruitment Board (RRB)</strong> has released the official notification for <strong>RRB NTPC 2024</strong> recruitment with a total of <strong>11,558 vacancies</strong> across various non-technical popular categories.</p>

<h2>RRB NTPC 2024 – Vacancy Details</h2>
<table>
<tr><th>Post Name</th><th>Vacancies</th><th>Pay Level</th></tr>
<tr><td>Junior Clerk cum Typist</td><td>990</td><td>Level 2</td></tr>
<tr><td>Accounts Clerk cum Typist</td><td>361</td><td>Level 2</td></tr>
<tr><td>Junior Time Keeper</td><td>18</td><td>Level 2</td></tr>
<tr><td>Trains Clerk</td><td>20</td><td>Level 2</td></tr>
<tr><td>Commercial cum Ticket Clerk</td><td>2,022</td><td>Level 3</td></tr>
<tr><td>Station Master</td><td>994</td><td>Level 6</td></tr>
<tr><td>Goods Guard</td><td>3,144</td><td>Level 5</td></tr>
<tr><td>Senior Commercial cum Ticket Clerk</td><td>2,009</td><td>Level 5</td></tr>
</table>

<h2>Eligibility Criteria</h2>
<p><strong>Age Limit:</strong> 18-33 years (relaxation as per government norms)</p>
<p><strong>Educational Qualification:</strong></p>
<ul>
<li>Graduate posts: Any recognized degree</li>
<li>Undergraduate posts: 12th pass or equivalent</li>
</ul>

<h2>How to Apply</h2>
<ol>
<li>Visit <strong>rrbcdg.gov.in</strong> or your regional RRB website</li>
<li>Register with valid email and mobile number</li>
<li>Fill the application form with correct details</li>
<li>Upload photograph and signature</li>
<li>Pay the application fee online</li>
<li>Submit and take printout of confirmation</li>
</ol>',
                'published_at' => Carbon::now()->subDays(1),
            ],
            [
                'category' => 'syllabus',
                'title' => 'SSC CHSL 2024 Syllabus and Exam Pattern – Complete Guide',
                'short_description' => 'Detailed syllabus and exam pattern for SSC CHSL 2024 Tier-I and Tier-II exams. Know all topics, marks distribution, and preparation strategy.',
                'content' => '<p>The <strong>Staff Selection Commission Combined Higher Secondary Level (SSC CHSL) 2024</strong> exam consists of two tiers. Here is the complete syllabus and exam pattern.</p>

<h2>SSC CHSL Tier-I Exam Pattern</h2>
<table>
<tr><th>Section</th><th>Questions</th><th>Marks</th><th>Time</th></tr>
<tr><td>General Intelligence & Reasoning</td><td>25</td><td>50</td><td rowspan="4">60 minutes</td></tr>
<tr><td>General Awareness</td><td>25</td><td>50</td></tr>
<tr><td>Quantitative Aptitude</td><td>25</td><td>50</td></tr>
<tr><td>English Language</td><td>25</td><td>50</td></tr>
<tr><td><strong>Total</strong></td><td><strong>100</strong></td><td><strong>200</strong></td><td></td></tr>
</table>

<h2>Tier-I Syllabus</h2>
<h3>General Intelligence & Reasoning</h3>
<ul>
<li>Analogies, Similarities and Differences</li>
<li>Space Visualization, Spatial Orientation</li>
<li>Problem Solving, Analysis, Judgment</li>
<li>Coding-Decoding, Number Series</li>
<li>Blood Relations, Direction Sense</li>
</ul>

<h3>Quantitative Aptitude</h3>
<ul>
<li>Number Systems, Computation of Whole Numbers</li>
<li>Percentage, Ratio & Proportion</li>
<li>Square Roots, Averages, Interest</li>
<li>Profit and Loss, Discount</li>
<li>Geometry, Trigonometry, Statistics</li>
</ul>

<h3>English Language</h3>
<ul>
<li>Spot the Error, Fill in the Blanks</li>
<li>Synonyms, Antonyms, Spelling</li>
<li>Idioms & Phrases, One Word Substitution</li>
<li>Reading Comprehension, Para Jumbles</li>
</ul>

<h2>Preparation Tips</h2>
<p>Focus on <strong>NCERT books</strong> for General Awareness, practice <strong>previous year papers</strong> for Aptitude, and read English newspapers daily for improving language skills.</p>',
                'published_at' => Carbon::now()->subDays(7),
            ],
            [
                'category' => 'answer-key',
                'title' => 'IBPS PO 2024 Preliminary Exam Answer Key Released',
                'short_description' => 'IBPS has released the provisional answer key for PO Preliminary exam 2024. Candidates can raise objections against any incorrect answers within the stipulated time.',
                'content' => '<p>The <strong>Institute of Banking Personnel Selection (IBPS)</strong> has released the <strong>provisional answer key</strong> for the IBPS PO Preliminary Examination 2024. Candidates who appeared in the exam can now view the answer key and raise objections if any.</p>

<h2>How to Download IBPS PO Answer Key</h2>
<ol>
<li>Go to the official website: <strong>ibps.in</strong></li>
<li>Click on "CRP PO/MT" section</li>
<li>Look for "Provisional Answer Key" link</li>
<li>Login with your Registration Number and Password</li>
<li>View and download the answer key</li>
</ol>

<h2>How to Raise Objections</h2>
<p>If you find any incorrect answer in the answer key, you can raise an objection by:</p>
<ol>
<li>Login to the IBPS website</li>
<li>Navigate to the "Challenge Answer Key" section</li>
<li>Select the question you want to challenge</li>
<li>Provide your justification with valid reference</li>
<li>Pay ₹200 per question challenged (refundable if accepted)</li>
</ol>

<h2>IBPS PO 2024 Exam Analysis</h2>
<p>The exam was conducted in multiple shifts. Overall difficulty level was <strong>Moderate to Difficult</strong>.</p>
<ul>
<li><strong>Reasoning Ability:</strong> Moderate (Puzzles and Seating Arrangement dominated)</li>
<li><strong>Quantitative Aptitude:</strong> Difficult (DI was calculative)</li>
<li><strong>English Language:</strong> Moderate (Reading Comprehension was long)</li>
</ul>

<p><strong>Expected Cut-off:</strong> 45-50 marks (General Category)</p>',
                'published_at' => Carbon::now()->subDays(3),
            ],
            [
                'category' => 'exam-date',
                'title' => 'NEET UG 2024 Exam Schedule – Complete Timetable',
                'short_description' => 'NTA has released the official exam schedule for NEET UG 2024. Check exam date, application dates, admit card release, and result declaration schedule.',
                'content' => '<p>The <strong>National Testing Agency (NTA)</strong> has released the complete examination schedule for <strong>NEET UG 2024</strong>. Here are all the important dates candidates need to know.</p>

<h2>NEET UG 2024 – Important Dates</h2>
<table>
<tr><th>Event</th><th>Date</th></tr>
<tr><td>Notification Release</td><td>February 9, 2024</td></tr>
<tr><td>Application Form Start</td><td>February 9, 2024</td></tr>
<tr><td>Application Form Last Date</td><td>March 9, 2024</td></tr>
<tr><td>Application Correction Window</td><td>March 11-14, 2024</td></tr>
<tr><td>Admit Card Release</td><td>May 3, 2024</td></tr>
<tr><td>NEET UG Exam Date</td><td><strong>May 5, 2024</strong></td></tr>
<tr><td>Provisional Answer Key</td><td>June 2024</td></tr>
<tr><td>Result Declaration</td><td>June 2024</td></tr>
<tr><td>Counselling Start</td><td>July 2024</td></tr>
</table>

<h2>NEET UG 2024 – Exam Pattern</h2>
<table>
<tr><th>Subject</th><th>Questions</th><th>Marks</th></tr>
<tr><td>Physics</td><td>50</td><td>180</td></tr>
<tr><td>Chemistry</td><td>50</td><td>180</td></tr>
<tr><td>Biology (Botany + Zoology)</td><td>100</td><td>360</td></tr>
<tr><td><strong>Total</strong></td><td><strong>200</strong></td><td><strong>720</strong></td></tr>
</table>

<h2>Marking Scheme</h2>
<ul>
<li><strong>+4</strong> marks for each correct answer</li>
<li><strong>-1</strong> mark for each incorrect answer</li>
<li><strong>0</strong> for unattempted questions</li>
</ul>

<p>The exam will be held in <strong>Pen and Paper mode</strong> (offline) across 499 cities in India and 14 cities abroad.</p>',
                'published_at' => Carbon::now()->subDays(4),
            ],
            [
                'category' => 'recruitment',
                'title' => 'UPSC CAPF AC 2024: 506 Vacancies – Apply Before Deadline',
                'short_description' => 'UPSC has announced 506 vacancies for Assistant Commandant posts in Central Armed Police Forces. Graduate candidates can apply before the closing date.',
                'content' => '<p>The <strong>Union Public Service Commission (UPSC)</strong> has released the notification for <strong>Central Armed Police Forces (CAPF) Assistant Commandant 2024</strong> with <strong>506 vacancies</strong> in BSF, CRPF, CISF, SSB, and ITBP.</p>

<h2>Vacancy Breakdown</h2>
<table>
<tr><th>Force</th><th>Vacancies</th></tr>
<tr><td>BSF (Border Security Force)</td><td>157</td></tr>
<tr><td>CRPF (Central Reserve Police Force)</td><td>185</td></tr>
<tr><td>CISF (Central Industrial Security Force)</td><td>91</td></tr>
<tr><td>SSB (Sashastra Seema Bal)</td><td>42</td></tr>
<tr><td>ITBP (Indo-Tibetan Border Police)</td><td>31</td></tr>
</table>

<h2>Eligibility</h2>
<ul>
<li><strong>Age:</strong> 20-25 years as on August 1, 2024</li>
<li><strong>Education:</strong> Bachelor\'s degree from recognized university</li>
<li><strong>Physical Standards:</strong> Height, chest, and eye sight as per CAPF norms</li>
</ul>

<h2>Selection Process</h2>
<ol>
<li>Written Examination (Paper-I: General Ability & Intelligence, Paper-II: General Studies)</li>
<li>Physical Standards Test (PST) and Physical Efficiency Test (PET)</li>
<li>Medical Standards Test</li>
<li>Interview/Personality Test</li>
</ol>

<p>Apply online at <strong>upsconline.gov.in</strong> before the closing date.</p>',
                'published_at' => Carbon::now()->subDays(6),
            ],
            [
                'category' => 'result',
                'title' => 'SBI PO 2024 Final Result Out – Check Merit List',
                'short_description' => 'State Bank of India has released the SBI PO 2024 Final Result after the Interview round. Candidates can check the merit list on sbi.co.in.',
                'content' => '<p>The <strong>State Bank of India (SBI)</strong> has released the <strong>SBI PO 2024 Final Result</strong> after the completion of Mains examination and Group Exercise & Interview round. Candidates can now check their final selection status on the official SBI website.</p>

<h2>How to Check SBI PO 2024 Final Result</h2>
<ol>
<li>Visit <strong>sbi.co.in/careers</strong></li>
<li>Look for "SBI PO 2024 Final Result" link</li>
<li>Click on the result link</li>
<li>Enter your Roll Number and Registration Number</li>
<li>Check your result and download the merit list PDF</li>
</ol>

<h2>SBI PO 2024 – Selection Stats</h2>
<ul>
<li>Total vacancies: <strong>2,000</strong></li>
<li>Candidates appeared in Mains: <strong>23,847</strong></li>
<li>Candidates called for Interview: <strong>4,000</strong></li>
<li>Final selections: <strong>2,000</strong></li>
</ul>

<h2>What Next for Selected Candidates?</h2>
<p>Selected candidates will receive their <strong>appointment letters</strong> via their registered email and post within 15 days. The joining formalities include:</p>
<ul>
<li>Medical examination at designated SBI hospital</li>
<li>Document verification</li>
<li>Pre-joining training of 2 weeks</li>
<li>Posting to allotted circle/branch</li>
</ul>

<p>The starting salary of SBI PO is <strong>₹41,960/- per month</strong> (Basic Pay) plus allowances, making the CTC approximately ₹13 LPA.</p>',
                'published_at' => Carbon::now()->subDays(8),
            ],
            [
                'category' => 'admit-card',
                'title' => 'CTET December 2024 Admit Card – Download Hall Ticket',
                'short_description' => 'CBSE has released the CTET December 2024 admit card. Candidates appearing for Paper-I and Paper-II can download their hall ticket from ctet.nic.in.',
                'content' => '<p>The <strong>Central Board of Secondary Education (CBSE)</strong> has released the <strong>CTET December 2024 Admit Card</strong>. Candidates registered for Central Teacher Eligibility Test can now download their hall ticket from the official CTET website.</p>

<h2>CTET 2024 – Exam Details</h2>
<table>
<tr><th>Detail</th><th>Information</th></tr>
<tr><td>Exam Name</td><td>Central Teacher Eligibility Test (CTET)</td></tr>
<tr><td>Conducting Body</td><td>Central Board of Secondary Education</td></tr>
<tr><td>Exam Date</td><td>December 2024</td></tr>
<tr><td>Mode</td><td>Online (Computer Based Test)</td></tr>
<tr><td>Duration</td><td>2.5 hours per paper</td></tr>
</table>

<h2>Steps to Download CTET Admit Card</h2>
<ol>
<li>Go to <strong>ctet.nic.in</strong></li>
<li>Click on "Download Admit Card" link on the homepage</li>
<li>Enter your Application Number and Date of Birth</li>
<li>Enter the Captcha code</li>
<li>Click on "Download Admit Card"</li>
<li>Save and Print the Admit Card</li>
</ol>

<h2>Exam Day Instructions</h2>
<ul>
<li>Reach exam center at least 30 minutes early</li>
<li>Carry printed admit card and original photo ID</li>
<li>Electronic devices are strictly prohibited</li>
<li>Follow COVID-19 guidelines if applicable</li>
</ul>

<p>CTET certificate is valid for <strong>lifetime</strong> and is accepted by all Kendriya Vidyalayas, Navodaya Vidyalayas, and Central Government schools.</p>',
                'published_at' => Carbon::now()->subDays(10),
            ],
            [
                'category' => 'syllabus',
                'title' => 'IBPS Clerk 2024 Syllabus – Prelims & Mains Complete Topics',
                'short_description' => 'Complete syllabus for IBPS Clerk 2024 Preliminary and Main examination. Includes all topics for Reasoning, Quantitative Aptitude, English, and General Awareness.',
                'content' => '<p>The <strong>IBPS Clerk 2024</strong> recruitment exam consists of two phases – Preliminary and Main. Here is the complete and updated syllabus for both stages.</p>

<h2>IBPS Clerk Prelims Syllabus & Pattern</h2>
<table>
<tr><th>Subject</th><th>Questions</th><th>Marks</th><th>Time</th></tr>
<tr><td>English Language</td><td>30</td><td>30</td><td>20 min</td></tr>
<tr><td>Numerical Ability</td><td>35</td><td>35</td><td>20 min</td></tr>
<tr><td>Reasoning Ability</td><td>35</td><td>35</td><td>20 min</td></tr>
<tr><td><strong>Total</strong></td><td><strong>100</strong></td><td><strong>100</strong></td><td><strong>60 min</strong></td></tr>
</table>

<h2>Reasoning Ability Topics</h2>
<ul>
<li>Puzzles and Seating Arrangement</li>
<li>Direction Sense, Blood Relations</li>
<li>Inequalities, Syllogism</li>
<li>Input-Output, Coding-Decoding</li>
<li>Order and Ranking, Alphanumeric Series</li>
</ul>

<h2>Numerical Ability Topics</h2>
<ul>
<li>Number Series, Data Interpretation</li>
<li>Simplification and Approximation</li>
<li>Quadratic Equations</li>
<li>Profit-Loss, SI/CI, Time-Work</li>
<li>Speed-Distance-Time, Mensuration</li>
</ul>

<h2>English Language Topics</h2>
<ul>
<li>Reading Comprehension</li>
<li>Cloze Test, Fill in the Blanks</li>
<li>Error Spotting, Para Jumbles</li>
<li>Word Swap, Match the Column</li>
</ul>

<h2>Books for Preparation</h2>
<ul>
<li>R.S. Aggarwal – Quantitative Aptitude</li>
<li>M.K. Pandey – Analytical Reasoning</li>
<li>Wren & Martin – High School English Grammar</li>
<li>Manorama Year Book – General Awareness</li>
</ul>',
                'published_at' => Carbon::now()->subDays(12),
            ],
        ];

        foreach ($blogs as $blogData) {
            $category = Category::where('slug', $blogData['category'])->first();
            if (!$category) continue;

            Blog::updateOrCreate(
                ['slug' => \Illuminate\Support\Str::slug($blogData['title'])],
                [
                    'title' => $blogData['title'],
                    'short_description' => $blogData['short_description'],
                    'content' => $blogData['content'],
                    'category_id' => $category->id,
                    'published_at' => $blogData['published_at'],
                    'is_published' => true,
                ]
            );
        }
    }
}
