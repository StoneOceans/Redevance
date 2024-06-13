<?php
  
namespace Database\Seeders;
  
use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
  
class CreateAdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Ensure that the user does not already exist
        $user = User::firstOrCreate([
            'email' => 'admin@gmail.com' // Checking by email to ensure uniqueness
        ], [
            'name' => 'Admin',
            'password' => bcrypt('adminmdp1234')
        ]);
        
        // Ensure that the role does not already exist
        $role = Role::firstOrCreate([
            'name' => 'Admin'
        ]);
         
        // Get all permissions or ensure some default permissions exist
        $permissions = Permission::pluck('id')->all();

        // Check if there are no permissions, create some defaults
        if (empty($permissions)) {
            // Example permissions creation if none exist
            $permissions = [
                'view_dashboard',
                'manage_users',
                'manage_roles'
            ];
            
            foreach ($permissions as $permName) {
                Permission::firstOrCreate(['name' => $permName, 'guard_name' => 'web']);
            }

            // Re-fetch permissions IDs
            $permissions = Permission::pluck('id')->all();
        }
        
        // Sync permissions to role
        $role->syncPermissions($permissions);
         
        // Assign role to user
        $user->assignRole($role->name); // Use role name instead of ID
    }
}
