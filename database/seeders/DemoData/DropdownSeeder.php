<?php

namespace Database\Seeders\DemoData;

use App\Library\Enum;
use App\Models\Config;
use Illuminate\Database\Seeder;

class DropdownSeeder extends Seeder
{
    public function run()
    {
        $records = self::getRecords();

        foreach ($records as $record) {
            $values = getDropdown($record['dropdown']);
            $values[] = $record['name'];
            self::updateConfig($record['dropdown'], json_encode($values, true));
        }
    }

    private static function getRecords()
    {
        return [
            /*CONFIG_DROPDOWN_JOB_TITLE*/
            [
                'name'     => 'Headmaster', // Principal
                'dropdown' => Enum::CONFIG_DROPDOWN_DESIGNATION,
            ],
            [
                'name'     => 'Assistant Headmaster', // Vice Principal
                'dropdown' => Enum::CONFIG_DROPDOWN_DESIGNATION,
            ],
            [
                'name'     => 'Head of Department (HOD)', // for specific subjects, mainly in colleges
                'dropdown' => Enum::CONFIG_DROPDOWN_DESIGNATION,
            ],
            [
                'name'     => 'Senior Teacher', // Senior Lecturer
                'dropdown' => Enum::CONFIG_DROPDOWN_DESIGNATION,
            ],
            [
                'name'     => 'Assistant Teacher', // Lecturer
                'dropdown' => Enum::CONFIG_DROPDOWN_DESIGNATION,
            ],
        ];
    }

    private static function updateConfig(string $key, string $value)
    {
        $config = Config::firstOrNew(['key' => $key]);
        $config->value = $value;
        $config->save();

    }
}
