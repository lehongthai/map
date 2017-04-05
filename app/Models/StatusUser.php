<?php
/**
 * Created by PhpStorm.
 * User: PC
 * Date: 4/1/2017
 * Time: 8:22 AM
 */

namespace App\Models;


use App\User;
use Illuminate\Support\Facades\DB;

class StatusUser extends \Illuminate\Database\Eloquent\Model
{
    protected $table = 'user_status';
    protected $fillable = ['user_id', 'status', 'created_at', 'date'];

    public static function getStatusUser($user_id, $start, $end)
    {
        $sql = 'SELECT u.name, s.status, s.date 
                  FROM user_status as s 
                  LEFT JOIN users as u 
                    ON u.id = s.user_id 
                  WHERE s.date BETWEEN "' . $start . '" AND "' . $end . '" 
                  AND u.id = ' . $user_id;
        return DB::select($sql);
    }

    /**
     * @param $timeoff
     * @return bool
     */
    public function updateStatus($timeoff, $token)
    {
        $uid = StatusUser::getIdIdByToken($token);
        if ($timeoff == null) {
            return true;
        }
        $dateOff = convertStringDate2String($timeoff, 'Y-m-d H:i:s', 'Y-m-d');
        $nowTime = date('Y-m-d');
        if (strtotime($dateOff) < strtotime($nowTime)) {
            $timeOffStart = convertStringDate2String($timeoff, 'Y-m-d H:i:s', 'H:i:s');
            $timeOffEnd = '23:59:59';
            $timeOffStartNewDate = '00:00:00';
            $timeOffEndNewDate = date('H:i:s');
            $this->createStatus($dateOff, $timeOffStart, $timeOffEnd, $timeOffStartNewDate, $timeOffEndNewDate, $uid);
        }else{
            $timeOffStart = convertStringDate2String($timeoff, 'Y-m-d H:i:s', 'H:i:s');
            $timeOffEnd = date('H:i:s');
            $this->createStatus($dateOff, $timeOffStart, $timeOffEnd, null, null, $uid);
        }
    }

    /**
     * @param $date
     * @param $timeOffStart
     * @param $timeOffEnd
     * @param $timeOffStartNewDate
     * @param $timeOffEndNewDate
     * @param $uid
     */
    private function createStatus($date, $timeOffStart, $timeOffEnd, $timeOffStartNewDate=null, $timeOffEndNewDate=null, $uid)
    {
        $status = StatusUser::where('date', $date)->where('user_id', $uid)->first();
        $dataTime = $this->getDate($timeOffStart, $timeOffEnd, $timeOffStartNewDate, $timeOffEndNewDate);
        if (!$status) {
            $statusNew = new StatusUser();
            $statusNew-> user_id = $uid;
            $statusNew->date = $date;
            $statusNew->status = json_encode($dataTime);
            $statusNew->save();
        } else {
            $oldStatus = json_decode($status->status, true);
            $dataUpdate = array_merge($oldStatus, $dataTime);
            $status->status = json_encode($dataUpdate);
            $status->save();
        }
    }

    /**
     * @param $token
     * @return mixed
     */
    private function getIdIdByToken($token)
    {
        return User::where('mobile_token', $token)->first()->id;
    }

    /**
     * @param $timeOffStart
     * @param $timeOffEnd
     * @param null $timeOffStartNewDate
     * @param null $timeOffEndNewDate
     * @return array
     */
    private function getDate($timeOffStart, $timeOffEnd, $timeOffStartNewDate=null, $timeOffEndNewDate=null){
        if ($timeOffStartNewDate != null && $timeOffEndNewDate != null){
            $dataTime = [
                [
                    'off' => [
                        'start' => $timeOffStart,
                        'end' => $timeOffEnd
                    ]
                ],
                [
                    'off' => [
                        'start' => $timeOffStartNewDate,
                        'end' => $timeOffEndNewDate
                    ]
                ]
            ];
        }else{
            $dataTime = [
                [
                    'off' => [
                        'start' => $timeOffStart,
                        'end' => $timeOffEnd
                    ]
                ]
            ];
        }
        return $dataTime;
    }
}