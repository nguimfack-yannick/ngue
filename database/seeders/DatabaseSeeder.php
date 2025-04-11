<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use App\Models\User;
use App\Models\Filiere;
use App\Models\Course;
use App\Models\Exam;
use App\Models\Student;
use App\Models\Resultat;

class DatabaseSeeder extends Seeder 
{
    public function run()
    {
        $this->call(FilieresTableSeeder::class);
        $this->call(CoursesTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(StudentsTableSeeder::class);
        $this->call(ExamsTableSeeder::class);
        $this->call(ResultatsTableSeeder::class);
    }
}

// Filiere Seeder
// Filiere Seeder
class FilieresTableSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();
        $names = []; // Tableau pour stocker les noms uniques

        for ($i = 0; $i < 100; $i++) {
            do {
                $name = $faker->word;
            } while (in_array($name, $names)); // Vérifier si le nom est déjà utilisé

            $names[] = $name; // Ajouter le nom au tableau

            DB::table('filieres')->insert([
                'name' => $name,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}

// Course Seeder
class CoursesTableSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();
        for ($i = 0; $i < 100; $i++) {
            DB::table('courses')->insert([
                'name' => $faker->sentence(3),
                'description' => $faker->paragraph,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}

// User Seeder
class UsersTableSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();
        for ($i = 0; $i < 100; $i++) {
            DB::table('users')->insert([
                'name' => $faker->name,
                'email' => $faker->unique()->safeEmail,
                'password' => bcrypt('password'),
                'role' => $faker->randomElement(['admin', 'student']),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}

// Student Seeder
class StudentsTableSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();
        $filieres = Filiere::all();

        for ($i = 0; $i < 100; $i++) {
            DB::table('students')->insert([
                'firstname' => $faker->firstName,
                'lastname' => $faker->lastName,
                'email' => $faker->unique()->safeEmail,
                'mobile' => $faker->phoneNumber,
                'filiere_id' => $faker->randomElement($filieres)->id,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}

// Exam Seeder
class ExamsTableSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();
        $courses = Course::all();

        for ($i = 0; $i < 100; $i++) {
            DB::table('exams')->insert([
                'title' => $faker->sentence(4),
                'date' => $faker->dateTimeBetween('now', '+1 year'),
                'course_id' => $faker->randomElement($courses)->id,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}

// Resultat Seeder
class ResultatsTableSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();
        $students = Student::all();
        $exams = Exam::all();

        for ($i = 0; $i < 100; $i++) {
            DB::table('resultats')->insert([
                'note' => $faker->numberBetween(0, 100),
                'student_id' => $faker->randomElement($students)->id,
                'exam_id' => $faker->randomElement($exams)->id,
                'grade' => $faker->randomElement(['A', 'B', 'C', 'D', 'F']),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}