<?php

namespace Database\Seeders;

use App\Models\Listing;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;

class ListingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $seedListings = [
            [
                'user_id' => 111,
                'title' => 'Data Scientist',
                'description' => 'Exciting opportunity to join our team in leveraging data to drive insights and innovation.',
                'salary' => '$90,000 - $110,000 AUD annually',
                'tags' => 'Data Science, Analytics, Innovation',
                'company' => 'Insightful Solutions',
                'address' => '789 King Street',
                'city' => 'Sydney',
                'state' => 'New South Wales',
                'phone' => '(02) 9876 5432',
                'email' => 'careers@insightfulsolutions.com.au',
                'requirements' => 'Bachelor\'s degree in Computer Science, Mathematics, or related field; 3+ years of experience in data science or analytics; Proficiency in Python, R, and SQL; Strong analytical and problem-solving skills; Excellent communication and teamwork abilities',
                'benefits' => 'Competitive salary; Flexible work arrangements; Health and wellness benefits; Ongoing learning and development opportunities',
                'created_at' => Carbon::parse('2024-04-24 09:30:00'),
                'status' => 'current',
            ],
            [
                'user_id' => 111,
                'title' => 'Mining Engineer',
                'description' => 'Exciting opportunity to work in the mining industry in Western Australia, contributing to the extraction and processing of valuable resources.',
                'salary' => '$100,000 - $120,000 AUD annually',
                'tags' => 'Mining, Engineering, Resources',
                'company' => 'Outback Mining Co.',
                'address' => '456 Desert Highway',
                'city' => 'Kalgoorlie',
                'state' => 'Western Australia',
                'phone' => '(08) 7654 3210',
                'email' => 'careers@outbackmining.com.au',
                'requirements' => 'Bachelor\'s degree in Mining Engineering or related field; 3+ years of experience in the mining industry; Knowledge of mine planning and scheduling software; Strong safety focus; Excellent teamwork and communication skills',
                'benefits' => 'Competitive salary; Performance-based bonuses; Opportunities for career progression; Employee assistance program; Health and wellness initiatives',
                'created_at' => Carbon::parse('2024-04-26 09:45:00'),
                'status' => 'outdated',
            ],
            [
                'user_id' => 111,
                'title' => 'Civil Engineer',
                'description' => 'Exciting opportunity to be part of major infrastructure projects in Western Australia.',
                'salary' => '$80,000 - $100,000 AUD annually',
                'tags' => 'Civil Engineering, Infrastructure, Construction',
                'company' => 'West Coast Engineering',
                'address' => '321 Harbour Road',
                'city' => 'Perth',
                'state' => 'Western Australia',
                'phone' => '(08) 8765 4321',
                'email' => 'jobs@westcoastengineering.com.au',
                'requirements' => 'Bachelor\'s degree in Civil Engineering or related field; 5+ years of experience in civil engineering; Knowledge of relevant software such as AutoCAD and Civil 3D; Strong problem-solving abilities; Excellent project management skills',
                'benefits' => 'Competitive salary; Opportunities for career advancement; Supportive work environment; Health and wellness programs; Employee training and development',
                'created_at' => Carbon::parse('2024-04-25 10:00:00'),
                'status' => 'current',
            ],
            [
                'user_id' => 111,
                'title' => 'Data Scientist',
                'description' => 'Exciting opportunity to join our team in leveraging data to drive insights and innovation.',
                'salary' => '$90,000 - $110,000 AUD annually',
                'tags' => 'Data Science, Analytics, Innovation',
                'company' => 'Insightful Solutions',
                'address' => '789 King Street',
                'city' => 'Sydney',
                'state' => 'New South Wales',
                'phone' => '(02) 9876 5432',
                'email' => 'careers@insightfulsolutions.com.au',
                'requirements' => 'Bachelor\'s degree in Computer Science, Mathematics, or related field; 3+ years of experience in data science or analytics; Proficiency in Python, R, and SQL; Strong analytical and problem-solving skills; Excellent communication and teamwork abilities',
                'benefits' => 'Competitive salary; Flexible work arrangements; Health and wellness benefits; Ongoing learning and development opportunities',
                'created_at' => Carbon::parse('2024-04-24 09:30:00'),
                'status' => 'current',
            ],
            [
                'user_id' => 111,
                'title' => 'Software Developer',
                'description' => 'Exciting opportunity to be part of a dynamic software development team and contribute to the creation of innovative solutions.',
                'salary' => '$85,000 - $100,000 AUD annually',
                'tags' => 'Software Development, Programming',
                'company' => 'Tech Innovations Pty Ltd',
                'address' => '789 Innovation Drive',
                'city' => 'Canberra',
                'state' => 'Australian Capital Territory',
                'phone' => '(02) 9876 5432',
                'email' => 'careers@techinnovations.com.au',
                'requirements' => 'Bachelor\'s degree in Computer Science or related field; 3+ years of experience in software development; Proficiency in Java, Python, and SQL; Strong problem-solving skills; Excellent teamwork and communication abilities',
                'benefits' => 'Competitive salary; Flexible work arrangements; Opportunities for career growth; Health and wellness benefits; Professional development programs',
                'created_at' => Carbon::parse('2024-05-01 10:30:00'),
                'status' => 'current',
            ],
            [
                'user_id' => 111,
                'title' => 'Registered Nurse',
                'description' => 'Rewarding opportunity to join our healthcare team and provide compassionate care to patients.',
                'salary' => '$65,000 - $80,000 AUD annually',
                'tags' => 'Healthcare, Nursing, Registered Nurse',
                'company' => 'Compassionate Care Hospital',
                'address' => '456 Care Avenue',
                'city' => 'Adelaide',
                'state' => 'South Australia',
                'phone' => '(08) 7654 3210',
                'email' => 'jobs@compassionatecarehospital.com.au',
                'requirements' => 'Bachelor\'s degree in Nursing; Current registration as a Registered Nurse with AHPRA; Experience in acute care preferred; Strong clinical assessment and decision-making skills; Compassionate and patient-centered approach',
                'benefits' => 'Competitive salary; Shift allowances; Professional development opportunities; Supportive work environment; Employee assistance program',
                'created_at' => Carbon::now()->subHours(random_int(1, 24 * 7 * 6)),
                'status' => 'current',
            ],
            [
                'user_id' => 111,
                'title' => 'Senior Financial Analyst',
                'description' => 'Exciting opportunity to join our finance team and drive financial analysis and reporting processes.',
                'salary' => '$90,000 - $110,000 AUD annually',
                'tags' => 'Finance, Analyst, Reporting',
                'company' => 'Capital Insight Group',
                'address' => '123 Finance Street',
                'city' => 'Brisbane',
                'state' => 'Queensland',
                'phone' => '(07) 8765 4321',
                'email' => 'careers@capitalinsightgroup.com.au',
                'requirements' => 'Bachelor\'s degree in Finance, Accounting, or related field; 5+ years of experience in financial analysis; Advanced Excel skills; Strong analytical and problem-solving abilities; Excellent communication and presentation skills',
                'benefits' => 'Competitive salary; Performance-based bonuses; Opportunities for career advancement; Health and wellness benefits; Flexible work arrangements',
                'created_at' => Carbon::now()->subHours(random_int(1, 24 * 7 * 6)),
                'status' => 'current',
            ],
        ];

        foreach ($seedListings as $seedListing) {
            $listing = Listing::create($seedListing);
        }
    }
}
