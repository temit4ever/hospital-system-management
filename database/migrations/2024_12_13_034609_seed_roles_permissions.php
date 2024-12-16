<?php

use Illuminate\Database\Migrations\Migration;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;


return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {

        // Create Permissions
        Permission::create(['name' => 'manage clinics']);
        Permission::create(['name' => 'manage departments']);
        Permission::create(['name' => 'manage appointments']);
        Permission::create(['name' => 'manage schedules']);
        Permission::create(['name' => 'manage teams']);
        Permission::create(['name' => 'manage patients']);
        Permission::create(['name' => 'manage settings']);
        Permission::create(['name' => 'view teams']);
        Permission::create(['name' => 'view appointments']);
        Permission::create(['name' => 'view patients']);


        // For Super-admin use to customise some dashboard settings that will be seen by all other user types
        Permission::create(['name' => 'patient']);

        // Create Roles
        $super_admin = Role::create(['name' => 'super-admin']);
        $clinical_admin = Role::create(['name' => 'clinical-admin']);
        $department_admin = Role::create(['name' => 'department-admin']);
        $team_member = Role::create(['name' => 'team-member']);

        // For future use when we decide to allow all patient to directly use the system
        $patient = Role::create(['name' => 'patient-as-user']);

        // Assign Permissions to roles
        $super_admin->givePermissionTo(Permission::all());
        $clinical_admin->givePermissionTo(['manage clinics', 'view appointments', 'manage departments', 'manage teams', 'view patients']);
        $department_admin->givePermissionTo(['view teams', 'manage appointments', 'manage schedules', 'manage patients']);
        $team_member->givePermissionTo(['manage appointments', 'view teams', 'manage patients']);
        $patient->givePermissionTo(['view appointments', 'view patients']);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
