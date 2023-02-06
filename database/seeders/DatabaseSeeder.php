<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Course;
use App\Models\Curriculum;
use App\Models\Lead;
use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //default permission
        $defaultPermissions = ['lead-management', 'create-admin', 'user-management', 'communication-management', 'lesson-management'];
        foreach($defaultPermissions as $permission) {
            Permission::create([
                'name' => $permission
            ]);
        }

        //creating role
        $this->create_user_with_role('Super Admin', 'Super Admin', 'super-admin@lms.test');
        $this->create_user_with_role('Communication', 'Communication Team', 'communication@lms.test');
        $teacher = $this->create_user_with_role('Teacher', 'Teacher', 'teacher@lms.test');
        $leads = $this->create_user_with_role('Leads', 'Leads', 'leads@lms.test');


        // create leads
        Lead::factory(100)->create();

        $courses = [
            [
                'name' => 'Laravel',
                'slug' => 'Laravel',
                'description' => 'Laravel is a web application framework with expressive, elegant syntax. We’ve already laid the foundation — freeing you to create without sweating the small things.',
                'image' => 'https://i.ytimg.com/vi/ImtZ5yENzgE/maxresdefault.jpg',
                'price' => 500.00,
                'end_date' =>'2023-01-30',
                'user_id' => $teacher->id
            ],
            [
                'name' => 'Vue 3',
                'slug' => 'Vue 3',
                'description' => 'Vue is a web application framework with expressive, elegant syntax. We’ve already laid the foundation — freeing you to create without sweating the small things.',
                'image' => 'https://i.ytimg.com/vi/ImtZ5yENzgE/maxresdefault.jpg',
                'price' => 850.00,
                'end_date' =>'2023-02-06',
                'user_id' => $teacher->id
            ],
            [
                'name' => 'Nuxt 3',
                'slug' => 'Nuxt 3',
                'description' => 'Nuxt is a web application framework with expressive, elegant syntax. We’ve already laid the foundation — freeing you to create without sweating the small things.',
                'image' => 'https://i.ytimg.com/vi/ImtZ5yENzgE/maxresdefault.jpg',
                'price' => 650.00,
                'end_date' =>'2023-03-06',
                'user_id' => $teacher->id
            ]
        ];

        foreach($courses as $item) {
            Course::create([
                'name' => $item['name'],
                'slug' => $item['slug'],
                'description' => $item['description'],
                'image' => $item['image'],
                'end_date' => $item['end_date'],
                'price' => $item['price'],
                'user_id' => $item['user_id'],
            ]);
        }


        Curriculum::factory(10)->create();

    }

    private function create_user_with_role($type, $name, $email) {
        $role = Role::create([
            'name' => $type
        ]);
        $user = User::create([
            'name' => $name,
            'email' => $email,
            'password' => bcrypt('password')
        ]);
        if($type == 'Super Admin') {
            $role->givePermissionTo(Permission::all());
        }
        elseif($type == 'Leads') {
            $role->givePermissionTo('lead-management');
        }
        elseif($type == 'Communication') {
            $role->givePermissionTo('communication-management');
        }
        elseif($type == 'Teacher') {
            $role->givePermissionTo('lesson-management');
        }
        $user->assignRole($role);
        return $user;
    }
}
