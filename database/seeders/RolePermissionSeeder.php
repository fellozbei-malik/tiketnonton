<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // Ambil semua permissions yang ada di database dengan guard 'web'
        $allPermissions = Permission::where('guard_name', 'web')->get();

        // 1. Buat Role Super Admin (Punya semua akses)
        $superAdmin = Role::firstOrCreate(['name' => 'Super Admin', 'guard_name' => 'web']);
        $superAdmin->syncPermissions($allPermissions);

        // 2. Buat Role Event Manager (Manajemen Acara, Kategori, Tiket, dan Harga)
        $eventManager = Role::firstOrCreate(['name' => 'Event Manager', 'guard_name' => 'web']);
        $eventPermissions = $allPermissions->filter(function ($permission) {
            return str_contains($permission->name, 'Event') || 
                   str_contains($permission->name, 'EventCategory') || 
                   str_contains($permission->name, 'Ticket') || 
                   str_contains($permission->name, 'PriceComponent');
        });
        $eventManager->syncPermissions($eventPermissions);

        // 3. Buat Role Order Manager (Manajemen Pesanan dan Transaksi)
        $orderManager = Role::firstOrCreate(['name' => 'Order Manager', 'guard_name' => 'web']);
        $orderPermissions = $allPermissions->filter(function ($permission) {
            return str_contains($permission->name, 'Order') || 
                   str_contains($permission->name, 'OrderItem');
        });
        $orderManager->syncPermissions($orderPermissions);

        // 4. Buat Role Blog Author (Manajemen Artikel/Post)
        $blogAuthor = Role::firstOrCreate(['name' => 'Blog Author', 'guard_name' => 'web']);
        $blogPermissions = $allPermissions->filter(function ($permission) {
            return str_contains($permission->name, 'Post');
        });
        $blogAuthor->syncPermissions($blogPermissions);

        // 5. Buat Role Customer Support (Manajemen Pesan dan Permintaan Partner)
        $customerSupport = Role::firstOrCreate(['name' => 'Customer Support', 'guard_name' => 'web']);
        $supportPermissions = $allPermissions->filter(function ($permission) {
            return str_contains($permission->name, 'HelpCenterMessage') || 
                   str_contains($permission->name, 'PartnerRequest');
        });
        $customerSupport->syncPermissions($supportPermissions);

        // Hapus role 'admin' lama yang mungkin nyangkut (agar bersih)
        $oldAdminRole = Role::where('name', 'admin')->first();
        if ($oldAdminRole) {
            // Pindahkan user yang pakai role lama ke Super Admin
            foreach ($oldAdminRole->users as $user) {
                $user->assignRole('Super Admin');
                $user->removeRole('admin');
            }
            $oldAdminRole->delete();
        }

        // Hapus permission yang bernama 'admin' (karena ini salah generate)
        $wrongPermission = Permission::where('name', 'admin')->first();
        if ($wrongPermission) {
            $wrongPermission->delete();
        }

        // Pastikan akun utama kita menjadi Super Admin
        $adminUser = User::where('email', 'admin@admin.com')->first();
        if ($adminUser) {
            $adminUser->assignRole('Super Admin');
        }

        echo "Berhasil membuat grup peran (Super Admin, Event Manager, Order Manager, Blog Author, Customer Support) dan membagikan izinnya!\n";
    }
}
