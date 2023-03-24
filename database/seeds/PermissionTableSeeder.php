<?php
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
class PermissionTableSeeder extends Seeder
{
/**
* Run the database seeds.
*
* @return void
*/
public function run()
{
$permissions = [
'دخول_نحال',
'اضافة_عسل',
'حذف _عسل',
'طلب_سيارة',
'دخول_تاجر',
'شراء_عسل',
'دخول_تجهيزات',
'اضافة_تجهيزات',
'دخول_سائق'
];
foreach ($permissions as $permission) {
Permission::create(['name' => $permission]);
}
}
}
