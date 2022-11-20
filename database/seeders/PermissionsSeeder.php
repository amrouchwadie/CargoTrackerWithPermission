<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Junges\ACL\Models\Group;
use App\Models\User;

class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('permissions')->insert([
            ['name' => 'ajouter transaction', 'slug' => 'can-add-ship', 'description' => 'Ship permissions'],
            ['name' => 'editer transaction', 'slug' => 'can-edit-ship', 'description' => 'Ship permissions'],
            ['name' => 'supprimer transaction', 'slug' => 'can-delete-ship', 'description' => 'Ship permissions'],
            ['name' => 'restaurer transaction', 'slug' => 'can-restore-ship', 'description' => 'Ship permissions'],
            ['name' => 'gestion transactions', 'slug' => 'can-index-ship', 'description' => 'Ship permissions'],

            ['name' => 'ajouter bus', 'slug' => 'can-add-bus', 'description' => 'Bus permissions'],
            ['name' => 'supprimer bus', 'slug' => 'can-delete-bus', 'description' => 'Bus permissions'],
            ['name' => 'gestion buses', 'slug' => 'can-index-bus', 'description' => 'Bus permissions'],

            ['name' => 'ajouter location', 'slug' => 'can-add-location', 'description' => 'Location permissions'],
            ['name' => 'supprimer location', 'slug' => 'can-delete-location', 'description' => 'Location permissions'],
            ['name' => 'gestion locations', 'slug' => 'can-index-location', 'description' => 'Location permissions'],

            ['name' => 'ajouter Bus-Document', 'slug' => 'can-add-busdoc', 'description' => 'BusDocument permissions'],
            ['name' => 'editer Bus-Document', 'slug' => 'can-edit-busdoc', 'description' => 'BusDocument permissions'],
            ['name' => 'supprimer Bus-Document', 'slug' => 'can-delete-busdoc', 'description' => 'BusDocument permissions'],
            ['name' => 'gestion Bus-Document', 'slug' => 'can-index-busdoc', 'description' => 'BusDocument permissions'],

            ['name' => 'ajouter utilisateur', 'slug' => 'can-add-user', 'description' => 'User permissions'],
            ['name' => 'editer utilisateur', 'slug' => 'can-edit-user', 'description' => 'User permissions'],
            ['name' => 'supprimer utilisateur', 'slug' => 'can-delete-user', 'description' => 'User permissions'],
            ['name' => 'gestion utilisateurs', 'slug' => 'can-index-user', 'description' => 'User permissions'],

            ['name' => 'ajouter role', 'slug' => 'can-add-role', 'description' => 'Role permissions'],
            ['name' => 'editer role', 'slug' => 'can-edit-role', 'description' => 'Role permissions'],
            ['name' => 'supprimer role', 'slug' => 'can-delete-role', 'description' => 'Role permissions'],
            ['name' => 'gestion role', 'slug' => 'can-index-role', 'description' => 'Role permissions'],

        ]);
        Group::insert([
            ['name' => 'admin', 'slug' => 'admin', 'description' => 'This is the group admin'],
        ]);

        $group = Group::find(1);
        $group->assignPermissions([
            'can-add-ship', 'can-edit-ship', 'can-delete-ship', 'can-restore-ship',
            'can-index-ship', 'can-add-bus', 'can-delete-bus', 'can-index-bus', 'can-add-location',
            'can-delete-location', 'can-index-location', 'can-add-busdoc', 'can-edit-busdoc', 'can-delete-busdoc',
            'can-index-busdoc', 'can-add-user', 'can-edit-user', 'can-delete-user', 'can-index-user',
            'can-add-role', 'can-edit-role', 'can-delete-role', 'can-index-role'
        ]);
        $user = User::find(1);
        $user->assignGroup('admin');
    }
}
