<?php

namespace Database\Seeders;

use App\Models\ChatQuestions;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class chatBotQuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $questions = [
            [
                'question' => 'What are the school hours?',
                'answer' => 'School hours are from 8:00 AM to 2:00 PM.',
                'category' => 'School Policies'
            ],
            [
                'question' => 'Is there a uniform policy?',
                'answer' => 'Yes, we have a strict uniform policy for all students.',
                'category' => 'School Policies'
            ],
            [
                'question' => "What is the school's policy on homework?",
                'answer' => "Homework policies vary by grade level and teacher, but generally, students are assigned homework to reinforce classroom learning.",
                'category' => 'School Policies'
            ],
            [
                'question' => "What is the school's approach to standardized testing?",
                'answer' => "We follow CBSE guidelines for standardized testing and use the results to assess student progress and inform instruction.",
                'category' => 'School Policies'
            ],
            [
                'question' => "What is the school's policy on bullying?",
                'answer' => "We have a zero-tolerance policy for bullying and take proactive measures to prevent and address bullying incidents.",
                'category' => 'School Policies'
            ],
            [
                'question' => "What is the school's policy on late assignments?",
                'answer' => "We have policies in place regarding late assignments, which may vary depending on the teacher and circumstances.",
                'category' => 'School Policies'
            ],
        
            // Academics
            [
                'question' => "What grades does the school offer?",
                'answer' => "We offer classes from Kindergarten to 12th grade (Starts from 3 years of age on 1st of April).",
                'category' => 'Academics'
            ],
            [
                'question' => "What board is being followed in the school?",
                'answer' => "CBSE.",
                'category' => 'Academics'
            ],
            [
                'question' => "Are there any academic competitions or events?",
                'answer' => "Yes, we participate in various academic competitions and events throughout the year.",
                'category' => 'Academics'
            ],
        
            // Student Services
            [
                'question' => "What extracurricular activities are available?",
                'answer' => "We offer a variety of extracurricular activities and are known for our sports infrastructure.",
                'category' => 'Student Services'
            ],
            [
                'question' => "Is there a school lunch program?",
                'answer' => "Sorry, we don’t have any lunch Program, however Vegetarian food available in School Canteens.",
                'category' => 'Student Services'
            ],
            [
                'question' => "Are there any bus services for students?",
                'answer' => "Yes, we offer air-conditioned bus services for our students.",
                'category' => 'Student Services'
            ],
        
            // Enrollment and Parent Involvement
            [
                'question' => "How do I enroll my child?",
                'answer' => "You can find information on enrollment procedures on our website or contact our admissions office at 9387130617.",
                'category' => 'Enrollment and Parent Involvement'
            ],
            [
                'question' => "How can parents get involved in the school?",
                'answer' => "Parents can get involved through the Parent-Teacher Association (PTA), volunteering opportunities, and attending school events.",
                'category' => 'Enrollment and Parent Involvement'
            ],
        
            // Safety and Security
            [
                'question' => "What safety measures are in place at the school?",
                'answer' => "We have various safety protocols in place, including security personnel, surveillance cameras, and emergency drills.",
                'category' => 'Safety and Security'
            ],
            [
                'question' => "Is there a school nurse on campus?",
                'answer' => "Yes, we have a school nurse available during school hours.",
                'category' => 'Safety and Security'
            ],
        
            // Technology and Resources
            [
                'question' => "What technology resources are available for students?",
                'answer' => "We provide access to computers, smart classes, and other technology resources for educational purposes.",
                'category' => 'Technology and Resources'
            ],
            [
                'question' => "Does the school have a library?",
                'answer' => "Yes, we have a library with a wide range of books and resources for students and teachers.",
                'category' => 'Technology and Resources'
            ],
        
            // Support Services
            [
                'question' => "Does the school offer counseling services?",
                'answer' => "Yes, we have school counselors available to provide academic, career, and personal counseling to students.",
                'category' => 'Support Services'
            ],
            [
                'question' => "What resources are available for students who are struggling academically?",
                'answer' => "We provide academic support through extra classes, study groups, and intervention programs.",
                'category' => 'Support Services'
            ],
        
            // Community Engagement
            [
                'question' => "Are there opportunities for community service or volunteering?",
                'answer' => "Yes, we encourage students to participate in community service projects, and our Green Curriculum provides opportunities for volunteering.",
                'category' => 'Community Engagement'
            ],
            [
                'question' => "Does the school have a social media presence?",
                'answer' => "Yes, we have official social media accounts where we share updates, events, and highlights from the school community.",
                'category' => 'Community Engagement'
            ],
        
            // Miscellaneous
            [
                'question' => "What foreign languages are offered at the school?",
                'answer' => "We do not offer any foreign languages.",
                'category' => 'Miscellaneous'
            ],
            [
                'question' => "Are there any after-school programs available?",
                'answer' => "Yes, we offer various after-school programs, including creche and sports.",
                'category' => 'Miscellaneous'
            ],
            [
                'question' => "What is the student-to-teacher ratio?",
                'answer' => "Our average student-to-teacher ratio is 30:1.",
                'category' => 'Miscellaneous'
            ],
            [
                'question' => "Does the school teachers offer tutoring services?",
                'answer' => "The school does not approve teachers getting engaged in tutorials.",
                'category' => 'Miscellaneous'
            ],
            [
                'question' => "Are there any field trips planned for the school year?",
                'answer' => "Yes, we organize field trips throughout the year to enhance learning experiences for students.",
                'category' => 'Miscellaneous'
            ],
            [
                'question' => "What is the school's policy on medication administration?",
                'answer' => "We are tied up with the nearest hospital which can be reached in minutes. We have procedures in place for administering medication only in accordance with state regulations and parental consent.",
                'category' => 'Miscellaneous'
            ],
            [
                'question' => "How are parents informed of their child's progress?",
                'answer' => "We provide regular progress reports and parent-teacher conferences.",
                'category' => 'Miscellaneous'
            ],
            [
                'question' => "Does the school have a dress code?",
                'answer' => "Yes, we have a dress code policy that promotes a respectful and focused learning environment.",
                'category' => 'Miscellaneous'
            ],
            [
                'question' => "Are there any special events at the school?",
                'answer' => "Yes, we have special events.",
                'category' => 'Miscellaneous'
            ],
            [
                'question' => "What is the school's policy on absences and tardiness?",
                'answer' => "We have attendance policies in place to encourage regular attendance and address absences and tardiness.",
                'category' => 'Miscellaneous'
            ],
            [
                'question' => "What is the school's policy on cell phones and electronic devices?",
                'answer' => "We have policies regarding the use of cell phones and electronic devices to minimize distractions and promote responsible usage. They need to handover at the reception Desk.",
                'category' => 'Miscellaneous'
            ],
            [
                'question' => "Does the school have a social media presence?",
                'answer' => "Yes, we have official social media accounts where we share updates, events, and highlights from the school community.",
                'category' => 'Miscellaneous'
            ],
            [
                'question' => "Are there opportunities for parent-teacher conferences?",
                'answer' => "Yes, we schedule parent-teacher conferences every quarter.",
                'category' => 'Miscellaneous'
            ],
            [
                'question' => "Does the school have a mentorship program?",
                'answer' => "Yes, we offer mentorship programs where older students mentor younger students.",
                'category' => 'Miscellaneous'
            ],
            [
                'question' => "How does the school handle discipline?",
                'answer' => "We have a disciplinary policy in place that emphasizes positive behavior reinforcement and consequences for infractions.",
                'category' => 'Miscellaneous'
            ]
        ];
        foreach ($questions as $question) {
            ChatQuestions::create($question);
        }
    }
}
