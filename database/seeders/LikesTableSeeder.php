<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LikesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        DB::table('likes')->delete();
        
        DB::table('likes')->insert(array (
            0 => 
            array (
                'id' => 1,
                'user_id' => 1,
                'likeable_type' => 'App\\Models\\Nudge',
                'likeable_id' => 8,
                'created_at' => '2024-03-03 10:59:11',
                'updated_at' => '2024-03-03 10:59:11',
            ),
            1 => 
            array (
                'id' => 3,
                'user_id' => 1,
                'likeable_type' => 'App\\Models\\Nudge',
                'likeable_id' => 4,
                'created_at' => '2024-03-03 11:13:18',
                'updated_at' => '2024-03-03 11:13:18',
            ),
            2 => 
            array (
                'id' => 4,
                'user_id' => 1,
                'likeable_type' => 'App\\Models\\Nudge',
                'likeable_id' => 12,
                'created_at' => '2024-03-03 11:20:08',
                'updated_at' => '2024-03-03 11:20:08',
            ),
            3 => 
            array (
                'id' => 5,
                'user_id' => 1,
                'likeable_type' => 'App\\Models\\Nudge',
                'likeable_id' => 13,
                'created_at' => '2024-03-03 11:20:31',
                'updated_at' => '2024-03-03 11:20:31',
            ),
            4 => 
            array (
                'id' => 13,
                'user_id' => 22,
                'likeable_type' => 'App\\Models\\Nudge',
                'likeable_id' => 7,
                'created_at' => '2024-03-03 13:08:15',
                'updated_at' => '2024-03-03 13:08:15',
            ),
            5 => 
            array (
                'id' => 14,
                'user_id' => 22,
                'likeable_type' => 'App\\Models\\Nudge',
                'likeable_id' => 13,
                'created_at' => '2024-03-03 13:08:52',
                'updated_at' => '2024-03-03 13:08:52',
            ),
            6 => 
            array (
                'id' => 18,
                'user_id' => 54,
                'likeable_type' => 'App\\Models\\Nudge',
                'likeable_id' => 7,
                'created_at' => '2024-03-03 14:17:18',
                'updated_at' => '2024-03-03 14:17:18',
            ),
            7 => 
            array (
                'id' => 19,
                'user_id' => 54,
                'likeable_type' => 'App\\Models\\Nudge',
                'likeable_id' => 8,
                'created_at' => '2024-03-03 14:17:29',
                'updated_at' => '2024-03-03 14:17:29',
            ),
            8 => 
            array (
                'id' => 20,
                'user_id' => 53,
                'likeable_type' => 'App\\Models\\Nudge',
                'likeable_id' => 8,
                'created_at' => '2024-03-03 16:11:52',
                'updated_at' => '2024-03-03 16:11:52',
            ),
            9 => 
            array (
                'id' => 24,
                'user_id' => 54,
                'likeable_type' => 'App\\Models\\Nudge',
                'likeable_id' => 12,
                'created_at' => '2024-03-03 20:00:47',
                'updated_at' => '2024-03-03 20:00:47',
            ),
            10 => 
            array (
                'id' => 25,
                'user_id' => 1,
                'likeable_type' => 'App\\Models\\Nudge',
                'likeable_id' => 14,
                'created_at' => '2024-03-03 20:12:06',
                'updated_at' => '2024-03-03 20:12:06',
            ),
            11 => 
            array (
                'id' => 26,
                'user_id' => 1,
                'likeable_type' => 'App\\Models\\Nudge',
                'likeable_id' => 15,
                'created_at' => '2024-03-03 20:13:47',
                'updated_at' => '2024-03-03 20:13:47',
            ),
            12 => 
            array (
                'id' => 29,
                'user_id' => 1,
                'likeable_type' => 'App\\Models\\Nudge',
                'likeable_id' => 16,
                'created_at' => '2024-03-05 09:32:50',
                'updated_at' => '2024-03-05 09:32:50',
            ),
            13 => 
            array (
                'id' => 30,
                'user_id' => 1,
                'likeable_type' => 'App\\Models\\Nudge',
                'likeable_id' => 18,
                'created_at' => '2024-03-06 07:07:16',
                'updated_at' => '2024-03-06 07:07:16',
            ),
            14 => 
            array (
                'id' => 31,
                'user_id' => 62,
                'likeable_type' => 'App\\Models\\Nudge',
                'likeable_id' => 9,
                'created_at' => '2024-03-06 14:02:00',
                'updated_at' => '2024-03-06 14:02:00',
            ),
            15 => 
            array (
                'id' => 32,
                'user_id' => 1,
                'likeable_type' => 'App\\Models\\Nudge',
                'likeable_id' => 20,
                'created_at' => '2024-03-06 16:29:20',
                'updated_at' => '2024-03-06 16:29:20',
            ),
            16 => 
            array (
                'id' => 33,
                'user_id' => 1,
                'likeable_type' => 'App\\Models\\Nudge',
                'likeable_id' => 25,
                'created_at' => '2024-03-07 08:16:31',
                'updated_at' => '2024-03-07 08:16:31',
            ),
            17 => 
            array (
                'id' => 34,
                'user_id' => 54,
                'likeable_type' => 'App\\Models\\Nudge',
                'likeable_id' => 22,
                'created_at' => '2024-03-07 08:42:09',
                'updated_at' => '2024-03-07 08:42:09',
            ),
            18 => 
            array (
                'id' => 35,
                'user_id' => 1,
                'likeable_type' => 'App\\Models\\Nudge',
                'likeable_id' => 28,
                'created_at' => '2024-03-07 11:49:23',
                'updated_at' => '2024-03-07 11:49:23',
            ),
            19 => 
            array (
                'id' => 36,
                'user_id' => 1,
                'likeable_type' => 'App\\Models\\Nudge',
                'likeable_id' => 31,
                'created_at' => '2024-03-08 08:38:17',
                'updated_at' => '2024-03-08 08:38:17',
            ),
            20 => 
            array (
                'id' => 37,
                'user_id' => 1,
                'likeable_type' => 'App\\Models\\Nudge',
                'likeable_id' => 27,
                'created_at' => '2024-03-08 13:21:43',
                'updated_at' => '2024-03-08 13:21:43',
            ),
            21 => 
            array (
                'id' => 38,
                'user_id' => 1,
                'likeable_type' => 'App\\Models\\Nudge',
                'likeable_id' => 7,
                'created_at' => '2024-03-08 19:16:58',
                'updated_at' => '2024-03-08 19:16:58',
            ),
            22 => 
            array (
                'id' => 39,
                'user_id' => 58,
                'likeable_type' => 'App\\Models\\Nudge',
                'likeable_id' => 31,
                'created_at' => '2024-03-08 22:55:44',
                'updated_at' => '2024-03-08 22:55:44',
            ),
            23 => 
            array (
                'id' => 40,
                'user_id' => 33,
                'likeable_type' => 'App\\Models\\Nudge',
                'likeable_id' => 32,
                'created_at' => '2024-03-09 07:16:06',
                'updated_at' => '2024-03-09 07:16:06',
            ),
            24 => 
            array (
                'id' => 42,
                'user_id' => 73,
                'likeable_type' => 'App\\Models\\Nudge',
                'likeable_id' => 8,
                'created_at' => '2024-03-09 18:01:06',
                'updated_at' => '2024-03-09 18:01:06',
            ),
            25 => 
            array (
                'id' => 43,
                'user_id' => 75,
                'likeable_type' => 'App\\Models\\Nudge',
                'likeable_id' => 27,
                'created_at' => '2024-03-09 20:00:36',
                'updated_at' => '2024-03-09 20:00:36',
            ),
            26 => 
            array (
                'id' => 44,
                'user_id' => 1,
                'likeable_type' => 'App\\Models\\Nudge',
                'likeable_id' => 34,
                'created_at' => '2024-03-09 20:16:22',
                'updated_at' => '2024-03-09 20:16:22',
            ),
            27 => 
            array (
                'id' => 45,
                'user_id' => 1,
                'likeable_type' => 'App\\Models\\Nudge',
                'likeable_id' => 35,
                'created_at' => '2024-03-09 20:55:01',
                'updated_at' => '2024-03-09 20:55:01',
            ),
            28 => 
            array (
                'id' => 46,
                'user_id' => 76,
                'likeable_type' => 'App\\Models\\Nudge',
                'likeable_id' => 2,
                'created_at' => '2024-03-10 09:29:54',
                'updated_at' => '2024-03-10 09:29:54',
            ),
            29 => 
            array (
                'id' => 48,
                'user_id' => 78,
                'likeable_type' => 'App\\Models\\Nudge',
                'likeable_id' => 22,
                'created_at' => '2024-03-10 17:37:12',
                'updated_at' => '2024-03-10 17:37:12',
            ),
            30 => 
            array (
                'id' => 49,
                'user_id' => 85,
                'likeable_type' => 'App\\Models\\Nudge',
                'likeable_id' => 35,
                'created_at' => '2024-03-11 12:51:34',
                'updated_at' => '2024-03-11 12:51:34',
            ),
            31 => 
            array (
                'id' => 50,
                'user_id' => 87,
                'likeable_type' => 'App\\Models\\Nudge',
                'likeable_id' => 31,
                'created_at' => '2024-03-11 13:28:17',
                'updated_at' => '2024-03-11 13:28:17',
            ),
            32 => 
            array (
                'id' => 51,
                'user_id' => 88,
                'likeable_type' => 'App\\Models\\Nudge',
                'likeable_id' => 3,
                'created_at' => '2024-03-11 14:21:00',
                'updated_at' => '2024-03-11 14:21:00',
            ),
            33 => 
            array (
                'id' => 52,
                'user_id' => 1,
                'likeable_type' => 'App\\Models\\Nudge',
                'likeable_id' => 39,
                'created_at' => '2024-03-11 16:52:18',
                'updated_at' => '2024-03-11 16:52:18',
            ),
            34 => 
            array (
                'id' => 54,
                'user_id' => 89,
                'likeable_type' => 'App\\Models\\Nudge',
                'likeable_id' => 32,
                'created_at' => '2024-03-12 10:44:39',
                'updated_at' => '2024-03-12 10:44:39',
            ),
            35 => 
            array (
                'id' => 55,
                'user_id' => 89,
                'likeable_type' => 'App\\Models\\Nudge',
                'likeable_id' => 27,
                'created_at' => '2024-03-12 10:44:51',
                'updated_at' => '2024-03-12 10:44:51',
            ),
            36 => 
            array (
                'id' => 56,
                'user_id' => 89,
                'likeable_type' => 'App\\Models\\Nudge',
                'likeable_id' => 35,
                'created_at' => '2024-03-12 10:45:35',
                'updated_at' => '2024-03-12 10:45:35',
            ),
            37 => 
            array (
                'id' => 57,
                'user_id' => 3,
                'likeable_type' => 'App\\Models\\Nudge',
                'likeable_id' => 4,
                'created_at' => '2024-03-12 20:42:33',
                'updated_at' => '2024-03-12 20:42:33',
            ),
            38 => 
            array (
                'id' => 59,
                'user_id' => 32,
                'likeable_type' => 'App\\Models\\Nudge',
                'likeable_id' => 13,
                'created_at' => '2024-03-13 08:42:47',
                'updated_at' => '2024-03-13 08:42:47',
            ),
            39 => 
            array (
                'id' => 60,
                'user_id' => 32,
                'likeable_type' => 'App\\Models\\Nudge',
                'likeable_id' => 35,
                'created_at' => '2024-03-13 14:58:45',
                'updated_at' => '2024-03-13 14:58:45',
            ),
            40 => 
            array (
                'id' => 61,
                'user_id' => 99,
                'likeable_type' => 'App\\Models\\Nudge',
                'likeable_id' => 6,
                'created_at' => '2024-03-15 15:28:59',
                'updated_at' => '2024-03-15 15:28:59',
            ),
            41 => 
            array (
                'id' => 62,
                'user_id' => 22,
                'likeable_type' => 'App\\Models\\Nudge',
                'likeable_id' => 46,
                'created_at' => '2024-03-16 11:43:53',
                'updated_at' => '2024-03-16 11:43:53',
            ),
        ));
        
        
    }
}