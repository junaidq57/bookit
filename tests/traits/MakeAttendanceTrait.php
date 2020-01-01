<?php

use Faker\Factory as Faker;
use App\Models\Attendance;
use App\Repositories\Admin\AttendanceRepository;

trait MakeAttendanceTrait
{
    /**
     * Create fake instance of Attendance and save it in database
     *
     * @param array $attendanceFields
     * @return Attendance
     */
    public function makeAttendance($attendanceFields = [])
    {
        /** @var AttendanceRepository $attendanceRepo */
        $attendanceRepo = App::make(AttendanceRepository::class);
        $theme = $this->fakeAttendanceData($attendanceFields);
        return $attendanceRepo->create($theme);
    }

    /**
     * Get fake instance of Attendance
     *
     * @param array $attendanceFields
     * @return Attendance
     */
    public function fakeAttendance($attendanceFields = [])
    {
        return new Attendance($this->fakeAttendanceData($attendanceFields));
    }

    /**
     * Get fake data of Attendance
     *
     * @param array $postFields
     * @return array
     */
    public function fakeAttendanceData($attendanceFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'user_id' => $fake->word,
            'time_in' => $fake->word,
            'time_out' => $fake->word,
            'job_date' => $fake->date('Y-m-d H:i:s'),
            'created_at' => $fake->date('Y-m-d H:i:s'),
            'updated_at' => $fake->date('Y-m-d H:i:s'),
            'deleted_at' => $fake->date('Y-m-d H:i:s')
        ], $attendanceFields);
    }
}
