<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Account;
use App\Models\Contact;
use App\Models\Organization;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\PermissionRegistrar;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        // create permissions
        // Permission::create(['name' => 'edit articles']);
        Permission::create(['name' => 'submit forms']);
        Permission::create(['name' => 'publish forms']);
        Permission::create(['name' => 'unpublish forms']);

        // create roles and assign existing permissions
        $role1 = Role::create(['name' => 'meduser']);
        $role1->givePermissionTo('submit forms');
        // $role1->givePermissionTo('delete articles');

        $role2 = Role::create(['name' => 'admin']);
        $role2->givePermissionTo('publish forms');
        $role2->givePermissionTo('unpublish forms');

        $role3 = Role::create(['name' => 'Super-Admin']);

        $account = Account::create(['name' => 'Acme Corporation']);

        $user = User::factory()->create([
            'account_id' => $account->id,
            'first_name' => 'John',
            'last_name' => 'Doe',
            'email' => 'johndoe@example.com',
            'password' => 'secret',
            'owner' => true,
        ]);

        $user->assignRole($role3);

        $user2 = User::factory(5)->create(['account_id' => $account->id]);
        $user2->each(fn($user) => $user->assignRole($role1));
        $user2->each(fn($user) => $user->givePermissionTo('submit forms'));

        $organizations = Organization::factory(100)
            ->create(['account_id' => $account->id]);

        Contact::factory(100)
            ->create(['account_id' => $account->id])
            ->each(function ($contact) use ($organizations) {
                $contact->update(['organization_id' => $organizations->random()->id]);
            });
    }
}
